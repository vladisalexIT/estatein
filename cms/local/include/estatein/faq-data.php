<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

if (!function_exists('estateinGetFaqs')) {
    function estateinGetFaqs(int $iblockId): array
    {
        if ($iblockId <= 0) {
            return [];
        }

        if (!\Bitrix\Main\Loader::includeModule('iblock')) {
            return [];
        }

        $faqs = [];

        $elementResult = \CIBlockElement::GetList(
            [
                'SORT' => 'ASC',
                'ID' => 'ASC',
            ],
            [
                'IBLOCK_ID' => $iblockId,
                'ACTIVE' => 'Y',
                'ACTIVE_DATE' => 'Y',
            ],
            false,
            false,
            [
                'ID',
                'IBLOCK_ID',
                'NAME',
                'DETAIL_TEXT',
                'DETAIL_TEXT_TYPE',
            ]
        );

        while ($element = $elementResult->Fetch()) {
            $linkUrl = '';

            $propertyResult = \CIBlockElement::GetProperty(
                $iblockId,
                (int)$element['ID'],
                [],
                [
                    'CODE' => 'LINK_URL',
                ]
            );

            if ($property = $propertyResult->Fetch()) {
                $linkUrl = trim((string)$property['VALUE']);
            }

            $answer = (string)$element['DETAIL_TEXT'];

            if (strtolower((string)$element['DETAIL_TEXT_TYPE']) === 'html') {
                $answerHtml = $answer;
            } else {
                $answerHtml = nl2br(
                    htmlspecialcharsbx($answer)
                );
            }

            $faqs[] = [
                'question' => (string)$element['NAME'],
                'answer_html' => $answerHtml,
                'link_url' => $linkUrl,
            ];
        }

        return $faqs;
    }
}