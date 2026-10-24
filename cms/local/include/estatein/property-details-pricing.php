<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

require_once __DIR__ . '/property-data.php';

/**
 * Денежные суммы возвращаются в центах.
 * down_payment_rate возвращается в сотых долях процента:
 * 20% = 2000.
 *
 * null означает, что значение отсутствует или некорректно.
 */
function estateinGetDemoPropertyPricing(
    int $iblockId,
    int $elementId
): array {
    $data = array_fill_keys(
        [
            'listing_price',
            'transfer_tax',
            'legal_fees',
            'home_inspection',
            'insurance_annual',
            'property_tax_monthly',
            'hoa_monthly',
            'down_payment_rate',
            'down_payment',
            'mortgage_amount',
            'additional_fees',
            'insurance_monthly',
        ],
        null
    );

    if (
        $iblockId <= 0
        || $elementId <= 0
        || !\Bitrix\Main\Loader::includeModule('iblock')
    ) {
        return $data;
    }

    $result = \CIBlockElement::GetList(
        [],
        [
            'IBLOCK_ID' => $iblockId,
            'ID' => $elementId,
            'ACTIVE' => 'Y',
            'ACTIVE_DATE' => 'Y',
            'CHECK_PERMISSIONS' => 'Y',
            'MIN_PERMISSION' => 'R',
        ],
        false,
        ['nTopCount' => 1],
        [
            'ID',
            'IBLOCK_ID',
        ]
    );

    $element = $result->GetNextElement(false, false);

    if (!$element) {
        return $data;
    }

    $properties = $element->GetProperties();

    /**
     * Переводит десятичное число в целые сотые доли.
     *
     * Ограничение: до 10 цифр в целой части,
     * не более двух знаков после десятичного разделителя.
     */
    $parseHundredths = static function (string $value): ?int {
        $value = trim($value);

        if (
            preg_match(
                '/\A([0-9]{1,10})(?:[.,]([0-9]{1,2}))?\z/',
                $value,
                $matches
            ) !== 1
        ) {
            return null;
        }

        $whole = (int)$matches[1];

        $fraction = (int)str_pad(
            $matches[2] ?? '',
            2,
            '0',
            STR_PAD_RIGHT
        );

        return $whole * 100 + $fraction;
    };

    $readAmount = static function (string $code) use (
        $properties,
        $parseHundredths
    ): ?int {
        return $parseHundredths(
            estateinGetPropertyValue(
                $properties,
                [$code]
            )
        );
    };

    $data['listing_price'] = $parseHundredths(
        estateinGetPropertyValue(
            $properties,
            [
                'PRICE',
                'PROPERTY_PRICE',
                'COST',
            ]
        )
    );

    $propertyMap = [
        'transfer_tax' => 'PD_TRANSFER_TAX',
        'legal_fees' => 'PD_LEGAL_FEES',
        'home_inspection' => 'PD_HOME_INSPECTION',
        'insurance_annual' => 'PD_INSURANCE_ANNUAL',
        'property_tax_monthly' => 'PD_TAX_MONTHLY',
        'hoa_monthly' => 'PD_HOA_MONTHLY',
    ];

    foreach ($propertyMap as $key => $propertyCode) {
        $data[$key] = $readAmount($propertyCode);
    }

    $downPaymentRate = $readAmount(
        'PD_DOWN_PAYMENT_PERCENT'
    );

    if (
        $downPaymentRate !== null
        && $downPaymentRate <= 10000
    ) {
        $data['down_payment_rate'] = $downPaymentRate;
    }

    if (
        $data['listing_price'] !== null
        && $data['down_payment_rate'] !== null
    ) {
        $data['down_payment'] = intdiv(
            $data['listing_price']
                * $data['down_payment_rate']
                + 5000,
            10000
        );

        $data['mortgage_amount'] =
            $data['listing_price']
            - $data['down_payment'];
    }

    $additionalFeeParts = [
        $data['transfer_tax'],
        $data['legal_fees'],
        $data['home_inspection'],
        $data['insurance_annual'],
    ];

    if (!in_array(null, $additionalFeeParts, true)) {
        $data['additional_fees'] = array_sum(
            $additionalFeeParts
        );
    }

    if ($data['insurance_annual'] !== null) {
        $data['insurance_monthly'] = intdiv(
            $data['insurance_annual'] + 6,
            12
        );
    }

    return $data;
}