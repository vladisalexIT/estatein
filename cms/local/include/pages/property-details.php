<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
?>
<section class="property-gallery" id="property-gallery" aria-labelledby="property-gallery-title" data-property-gallery>
  <div class="property-gallery__container container">
    <header class="property-gallery__header">
      <div class="property-gallery__identity">
        <h1 class="property-gallery__title" id="property-gallery-title">
          Seaside Serenity Villa
        </h1>

        <p class="property-gallery__location">
          <svg class="property-gallery__location-icon" width="24" height="24" viewBox="0 0 24 24" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd"
              d="M11.5397 22.351C11.57 22.3685 11.5937 22.3821 11.6105 22.3915L11.6384 22.4071C11.8613 22.5294 12.1378 22.5285 12.3608 22.4075L12.3895 22.3915C12.4063 22.3821 12.43 22.3685 12.4603 22.351C12.5207 22.316 12.607 22.265 12.7155 22.1982C12.9325 22.0646 13.2388 21.8676 13.6046 21.6091C14.3351 21.0931 15.3097 20.3274 16.2865 19.3273C18.2307 17.3368 20.25 14.3462 20.25 10.5C20.25 5.94365 16.5563 2.25 12 2.25C7.44365 2.25 3.75 5.94365 3.75 10.5C3.75 14.3462 5.76932 17.3368 7.71346 19.3273C8.69025 20.3274 9.66491 21.0931 10.3954 21.6091C10.7612 21.8676 11.0675 22.0646 11.2845 22.1982C11.393 22.265 11.4793 22.316 11.5397 22.351ZM12 13.5C13.6569 13.5 15 12.1569 15 10.5C15 8.84315 13.6569 7.5 12 7.5C10.3431 7.5 9 8.84315 9 10.5C9 12.1569 10.3431 13.5 12 13.5Z"
              fill="white" />
          </svg>

          <span>Malibu, California</span>
        </p>
      </div>

      <p class="property-gallery__price">
        <span class="property-gallery__price-label">
          Price
        </span>

        <strong class="property-gallery__price-value">
          $1,250,000
        </strong>
      </p>
    </header>

    <div class="property-gallery__box">
      <nav class="property-gallery__thumbnails" aria-label="Choose a property gallery slide">
        <ul class="property-gallery__thumbnail-list">
          <li class="property-gallery__thumbnail-item">
            <button class="property-gallery__thumbnail is-active" type="button" data-gallery-thumb="0"
              aria-label="Show gallery slide 1" aria-current="true">
              <img src="/local/templates/estatein/assets/seaside-serenity-villa-BMOJRHhy.webp" alt="" width="160" height="100"
                loading="eager" decoding="async" aria-hidden="true" />
            </button>
          </li>

          <li class="property-gallery__thumbnail-item">
            <button class="property-gallery__thumbnail" type="button" data-gallery-thumb="1"
              aria-label="Show gallery slide 2" aria-current="false">
              <img src="/local/templates/estatein/assets/seaside-serenity-villa-BMOJRHhy.webp" alt="" width="160" height="100"
                loading="lazy" decoding="async" aria-hidden="true" />
            </button>
          </li>

          <li class="property-gallery__thumbnail-item">
            <button class="property-gallery__thumbnail" type="button" data-gallery-thumb="2"
              aria-label="Show gallery slide 3" aria-current="false">
              <img src="/local/templates/estatein/assets/seaside-serenity-villa-BMOJRHhy.webp" alt="" width="160" height="100"
                loading="lazy" decoding="async" aria-hidden="true" />
            </button>
          </li>

          <li class="property-gallery__thumbnail-item">
            <button class="property-gallery__thumbnail" type="button" data-gallery-thumb="3"
              aria-label="Show gallery slide 4" aria-current="false">
              <img src="/local/templates/estatein/assets/seaside-serenity-villa-BMOJRHhy.webp" alt="" width="160" height="100"
                loading="lazy" decoding="async" aria-hidden="true" />
            </button>
          </li>

          <li class="property-gallery__thumbnail-item">
            <button class="property-gallery__thumbnail" type="button" data-gallery-thumb="4"
              aria-label="Show gallery slide 5" aria-current="false">
              <img src="/local/templates/estatein/assets/seaside-serenity-villa-BMOJRHhy.webp" alt="" width="160" height="100"
                loading="lazy" decoding="async" aria-hidden="true" />
            </button>
          </li>

          <li class="property-gallery__thumbnail-item">
            <button class="property-gallery__thumbnail" type="button" data-gallery-thumb="5"
              aria-label="Show gallery slide 6" aria-current="false">
              <img src="/local/templates/estatein/assets/seaside-serenity-villa-BMOJRHhy.webp" alt="" width="160" height="100"
                loading="lazy" decoding="async" aria-hidden="true" />
            </button>
          </li>

          <li class="property-gallery__thumbnail-item">
            <button class="property-gallery__thumbnail" type="button" data-gallery-thumb="6"
              aria-label="Show gallery slide 7" aria-current="false">
              <img src="/local/templates/estatein/assets/seaside-serenity-villa-BMOJRHhy.webp" alt="" width="160" height="100"
                loading="lazy" decoding="async" aria-hidden="true" />
            </button>
          </li>

          <li class="property-gallery__thumbnail-item">
            <button class="property-gallery__thumbnail" type="button" data-gallery-thumb="7"
              aria-label="Show gallery slide 8" aria-current="false">
              <img src="/local/templates/estatein/assets/seaside-serenity-villa-BMOJRHhy.webp" alt="" width="160" height="100"
                loading="lazy" decoding="async" aria-hidden="true" />
            </button>
          </li>
        </ul>
      </nav>

      <div class="property-gallery__slider swiper" data-gallery-swiper
        aria-label="Seaside Serenity Villa gallery slides">
        <ul class="property-gallery__slides swiper-wrapper">
          <li class="property-gallery__slide swiper-slide">
            <figure class="property-gallery__media">
              <img class="property-gallery__image" src="/local/templates/estatein/assets/seaside-serenity-villa-BMOJRHhy.webp"
                alt="Exterior view of Seaside Serenity Villa with a private swimming pool" width="733" height="583"
                loading="eager" decoding="async" />
            </figure>

            <figure class="property-gallery__media">
              <img class="property-gallery__image" src="/local/templates/estatein/assets/metropolitan-haven-CktEm9H_.webp"
                alt="Living room and dining area inside Seaside Serenity Villa" width="733" height="583" loading="eager"
                decoding="async" />
            </figure>
          </li>

          <li class="property-gallery__slide swiper-slide">
            <figure class="property-gallery__media">
              <img class="property-gallery__image" src="/local/templates/estatein/assets/seaside-serenity-villa-BMOJRHhy.webp"
                alt="Exterior view of Seaside Serenity Villa surrounded by greenery" width="733" height="583"
                loading="lazy" decoding="async" />
            </figure>

            <figure class="property-gallery__media">
              <img class="property-gallery__image" src="/local/templates/estatein/assets/metropolitan-haven-CktEm9H_.webp"
                alt="Open-plan living area inside Seaside Serenity Villa" width="733" height="583" loading="lazy"
                decoding="async" />
            </figure>
          </li>

          <li class="property-gallery__slide swiper-slide">
            <figure class="property-gallery__media">
              <img class="property-gallery__image" src="/local/templates/estatein/assets/seaside-serenity-villa-BMOJRHhy.webp"
                alt="Modern architecture of Seaside Serenity Villa" width="733" height="583" loading="lazy"
                decoding="async" />
            </figure>

            <figure class="property-gallery__media">
              <img class="property-gallery__image" src="/local/templates/estatein/assets/metropolitan-haven-CktEm9H_.webp"
                alt="Bright interior of Seaside Serenity Villa" width="733" height="583" loading="lazy"
                decoding="async" />
            </figure>
          </li>

          <li class="property-gallery__slide swiper-slide">
            <figure class="property-gallery__media">
              <img class="property-gallery__image" src="/local/templates/estatein/assets/seaside-serenity-villa-BMOJRHhy.webp"
                alt="Poolside exterior of Seaside Serenity Villa" width="733" height="583" loading="lazy"
                decoding="async" />
            </figure>

            <figure class="property-gallery__media">
              <img class="property-gallery__image" src="/local/templates/estatein/assets/metropolitan-haven-CktEm9H_.webp"
                alt="Kitchen and dining area inside Seaside Serenity Villa" width="733" height="583" loading="lazy"
                decoding="async" />
            </figure>
          </li>

          <li class="property-gallery__slide swiper-slide">
            <figure class="property-gallery__media">
              <img class="property-gallery__image" src="/local/templates/estatein/assets/seaside-serenity-villa-BMOJRHhy.webp"
                alt="Front elevation of Seaside Serenity Villa" width="733" height="583" loading="lazy"
                decoding="async" />
            </figure>

            <figure class="property-gallery__media">
              <img class="property-gallery__image" src="/local/templates/estatein/assets/metropolitan-haven-CktEm9H_.webp"
                alt="Comfortable lounge inside Seaside Serenity Villa" width="733" height="583" loading="lazy"
                decoding="async" />
            </figure>
          </li>

          <li class="property-gallery__slide swiper-slide">
            <figure class="property-gallery__media">
              <img class="property-gallery__image" src="/local/templates/estatein/assets/seaside-serenity-villa-BMOJRHhy.webp"
                alt="Seaside Serenity Villa exterior at pool level" width="733" height="583" loading="lazy"
                decoding="async" />
            </figure>

            <figure class="property-gallery__media">
              <img class="property-gallery__image" src="/local/templates/estatein/assets/metropolitan-haven-CktEm9H_.webp"
                alt="Dining space inside Seaside Serenity Villa" width="733" height="583" loading="lazy"
                decoding="async" />
            </figure>
          </li>

          <li class="property-gallery__slide swiper-slide">
            <figure class="property-gallery__media">
              <img class="property-gallery__image" src="/local/templates/estatein/assets/seaside-serenity-villa-BMOJRHhy.webp"
                alt="Contemporary exterior details of Seaside Serenity Villa" width="733" height="583" loading="lazy"
                decoding="async" />
            </figure>

            <figure class="property-gallery__media">
              <img class="property-gallery__image" src="/local/templates/estatein/assets/metropolitan-haven-CktEm9H_.webp"
                alt="Interior details of Seaside Serenity Villa" width="733" height="583" loading="lazy"
                decoding="async" />
            </figure>
          </li>

          <li class="property-gallery__slide swiper-slide">
            <figure class="property-gallery__media">
              <img class="property-gallery__image" src="/local/templates/estatein/assets/seaside-serenity-villa-BMOJRHhy.webp"
                alt="Complete exterior view of Seaside Serenity Villa" width="733" height="583" loading="lazy"
                decoding="async" />
            </figure>

            <figure class="property-gallery__media">
              <img class="property-gallery__image" src="/local/templates/estatein/assets/metropolitan-haven-CktEm9H_.webp"
                alt="Complete interior view of Seaside Serenity Villa" width="733" height="583" loading="lazy"
                decoding="async" />
            </figure>
          </li>
        </ul>
      </div>

      <div class="property-gallery__controls" aria-label="Property gallery controls">
        <button class="property-gallery__arrow property-gallery__arrow--previous" type="button" data-gallery-prev
          aria-label="Previous gallery slide"></button>

        <div class="property-gallery__pagination" data-gallery-pagination aria-label="Gallery pagination"></div>

        <button class="property-gallery__arrow property-gallery__arrow--next" type="button" data-gallery-next
          aria-label="Next gallery slide"></button>
      </div>
    </div>

    <div class="property-gallery__details" data-gallery-details aria-live="polite" aria-atomic="true">
      <article class="property-gallery__info-panel is-active" data-gallery-info="0">
        <div class="property-gallery__description">
          <h2 class="property-gallery__info-title">
            Description
          </h2>

          <p class="property-gallery__info-text">
            Discover your own piece of paradise with the Seaside Serenity
            Villa. With an open floor plan, breathtaking ocean views from every
            room, and direct access to a pristine sandy beach, this property is
            the epitome of coastal living.
          </p>

          <dl class="property-gallery__stats">
            <div class="property-gallery__stat">
              <dt class="property-gallery__stat-label">
                Bedrooms
              </dt>
              <dd class="property-gallery__stat-value">
                04
              </dd>
            </div>

            <div class="property-gallery__stat">
              <dt class="property-gallery__stat-label">
                Bathrooms
              </dt>
              <dd class="property-gallery__stat-value">
                03
              </dd>
            </div>

            <div class="property-gallery__stat">
              <dt class="property-gallery__stat-label">
                Area
              </dt>
              <dd class="property-gallery__stat-value">
                2,500 Square Feet
              </dd>
            </div>
          </dl>
        </div>

        <div class="property-gallery__amenities">
          <h2 class="property-gallery__info-title">
            Key Features and Amenities
          </h2>

          <ul class="property-gallery__amenity-list">
            <li class="property-gallery__amenity">
              Expansive oceanfront terrace for outdoor entertaining
            </li>
            <li class="property-gallery__amenity">
              Gourmet kitchen with top-of-the-line appliances
            </li>
            <li class="property-gallery__amenity">
              Private beach access for morning strolls and sunset views
            </li>
            <li class="property-gallery__amenity">
              Master suite with a spa-inspired bathroom and ocean-facing balcony
            </li>
            <li class="property-gallery__amenity">
              Private garage and ample storage space
            </li>
          </ul>
        </div>
      </article>

      <article class="property-gallery__info-panel" data-gallery-info="1" hidden>
        <div class="property-gallery__description">
          <h2 class="property-gallery__info-title">
            Description
          </h2>

          <p class="property-gallery__info-text">
            The villa opens into a calm and welcoming living environment where
            generous glazing connects the interior with the surrounding coastal
            landscape. Every room is arranged to make daily life feel bright,
            private, and effortless.
          </p>

          <dl class="property-gallery__stats">
            <div class="property-gallery__stat">
              <dt class="property-gallery__stat-label">
                Bedrooms
              </dt>
              <dd class="property-gallery__stat-value">
                04
              </dd>
            </div>

            <div class="property-gallery__stat">
              <dt class="property-gallery__stat-label">
                Bathrooms
              </dt>
              <dd class="property-gallery__stat-value">
                03
              </dd>
            </div>

            <div class="property-gallery__stat">
              <dt class="property-gallery__stat-label">
                Area
              </dt>
              <dd class="property-gallery__stat-value">
                2,500 Square Feet
              </dd>
            </div>
          </dl>
        </div>

        <div class="property-gallery__amenities">
          <h2 class="property-gallery__info-title">
            Key Features and Amenities
          </h2>

          <ul class="property-gallery__amenity-list">
            <li class="property-gallery__amenity">
              Floor-to-ceiling windows with panoramic natural light
            </li>
            <li class="property-gallery__amenity">
              Seamless connection between the lounge and outdoor terrace
            </li>
            <li class="property-gallery__amenity">
              Quiet family-oriented coastal neighborhood
            </li>
            <li class="property-gallery__amenity">
              Premium stone and timber finishes throughout the home
            </li>
            <li class="property-gallery__amenity">
              Separate utility and service areas
            </li>
          </ul>
        </div>
      </article>

      <article class="property-gallery__info-panel" data-gallery-info="2" hidden>
        <div class="property-gallery__description">
          <h2 class="property-gallery__info-title">
            Description
          </h2>

          <p class="property-gallery__info-text">
            Designed for relaxed hosting, this layout gives the main living
            spaces a direct relationship with the pool deck. The result is a
            property that feels equally suitable for quiet mornings and
            memorable gatherings.
          </p>

          <dl class="property-gallery__stats">
            <div class="property-gallery__stat">
              <dt class="property-gallery__stat-label">
                Bedrooms
              </dt>
              <dd class="property-gallery__stat-value">
                04
              </dd>
            </div>

            <div class="property-gallery__stat">
              <dt class="property-gallery__stat-label">
                Bathrooms
              </dt>
              <dd class="property-gallery__stat-value">
                03
              </dd>
            </div>

            <div class="property-gallery__stat">
              <dt class="property-gallery__stat-label">
                Area
              </dt>
              <dd class="property-gallery__stat-value">
                2,500 Square Feet
              </dd>
            </div>
          </dl>
        </div>

        <div class="property-gallery__amenities">
          <h2 class="property-gallery__info-title">
            Key Features and Amenities
          </h2>

          <ul class="property-gallery__amenity-list">
            <li class="property-gallery__amenity">
              Heated outdoor swimming pool with lounge deck
            </li>
            <li class="property-gallery__amenity">
              Outdoor dining area with built-in lighting
            </li>
            <li class="property-gallery__amenity">
              Private landscaped garden
            </li>
            <li class="property-gallery__amenity">
              Multiple entertaining zones connected by open walkways
            </li>
            <li class="property-gallery__amenity">
              Secure gated entrance
            </li>
          </ul>
        </div>
      </article>

      <article class="property-gallery__info-panel" data-gallery-info="3" hidden>
        <div class="property-gallery__description">
          <h2 class="property-gallery__info-title">
            Description
          </h2>

          <p class="property-gallery__info-text">
            This view highlights the villa's connection to the water and the
            surrounding terrain. The architectural composition balances privacy
            with open views, creating a distinctive modern coastal residence.
          </p>

          <dl class="property-gallery__stats">
            <div class="property-gallery__stat">
              <dt class="property-gallery__stat-label">
                Bedrooms
              </dt>
              <dd class="property-gallery__stat-value">
                04
              </dd>
            </div>

            <div class="property-gallery__stat">
              <dt class="property-gallery__stat-label">
                Bathrooms
              </dt>
              <dd class="property-gallery__stat-value">
                03
              </dd>
            </div>

            <div class="property-gallery__stat">
              <dt class="property-gallery__stat-label">
                Area
              </dt>
              <dd class="property-gallery__stat-value">
                2,500 Square Feet
              </dd>
            </div>
          </dl>
        </div>

        <div class="property-gallery__amenities">
          <h2 class="property-gallery__info-title">
            Key Features and Amenities
          </h2>

          <ul class="property-gallery__amenity-list">
            <li class="property-gallery__amenity">
              Elevated outdoor dining terrace
            </li>
            <li class="property-gallery__amenity">
              Uninterrupted views toward the coastline
            </li>
            <li class="property-gallery__amenity">
              Private swimming pool with sun deck
            </li>
            <li class="property-gallery__amenity">
              Carefully planned evening lighting
            </li>
            <li class="property-gallery__amenity">
              Low-maintenance modern landscaping
            </li>
          </ul>
        </div>
      </article>

      <article class="property-gallery__info-panel" data-gallery-info="4" hidden>
        <div class="property-gallery__description">
          <h2 class="property-gallery__info-title">
            Description
          </h2>

          <p class="property-gallery__info-text">
            The interior concept combines warm materials, clean lines, and
            carefully framed views. The open living zone creates a comfortable
            flow between the kitchen, dining area, and lounge.
          </p>

          <dl class="property-gallery__stats">
            <div class="property-gallery__stat">
              <dt class="property-gallery__stat-label">
                Bedrooms
              </dt>
              <dd class="property-gallery__stat-value">
                04
              </dd>
            </div>

            <div class="property-gallery__stat">
              <dt class="property-gallery__stat-label">
                Bathrooms
              </dt>
              <dd class="property-gallery__stat-value">
                03
              </dd>
            </div>

            <div class="property-gallery__stat">
              <dt class="property-gallery__stat-label">
                Area
              </dt>
              <dd class="property-gallery__stat-value">
                2,500 Square Feet
              </dd>
            </div>
          </dl>
        </div>

        <div class="property-gallery__amenities">
          <h2 class="property-gallery__info-title">
            Key Features and Amenities
          </h2>

          <ul class="property-gallery__amenity-list">
            <li class="property-gallery__amenity">
              Custom kitchen with premium integrated appliances
            </li>
            <li class="property-gallery__amenity">
              Open-plan lounge with direct terrace access
            </li>
            <li class="property-gallery__amenity">
              Natural stone flooring in the main living areas
            </li>
            <li class="property-gallery__amenity">
              Designer lighting and built-in storage
            </li>
            <li class="property-gallery__amenity">
              Dedicated dining area for eight guests
            </li>
          </ul>
        </div>
      </article>

      <article class="property-gallery__info-panel" data-gallery-info="5" hidden>
        <div class="property-gallery__description">
          <h2 class="property-gallery__info-title">
            Description
          </h2>

          <p class="property-gallery__info-text">
            Natural textures and a restrained palette give the interior a
            timeless feel. The living spaces are designed to remain practical
            for everyday use while preserving the atmosphere of a luxury
            retreat.
          </p>

          <dl class="property-gallery__stats">
            <div class="property-gallery__stat">
              <dt class="property-gallery__stat-label">
                Bedrooms
              </dt>
              <dd class="property-gallery__stat-value">
                04
              </dd>
            </div>

            <div class="property-gallery__stat">
              <dt class="property-gallery__stat-label">
                Bathrooms
              </dt>
              <dd class="property-gallery__stat-value">
                03
              </dd>
            </div>

            <div class="property-gallery__stat">
              <dt class="property-gallery__stat-label">
                Area
              </dt>
              <dd class="property-gallery__stat-value">
                2,500 Square Feet
              </dd>
            </div>
          </dl>
        </div>

        <div class="property-gallery__amenities">
          <h2 class="property-gallery__info-title">
            Key Features and Amenities
          </h2>

          <ul class="property-gallery__amenity-list">
            <li class="property-gallery__amenity">
              Soft layered lighting for day and evening comfort
            </li>
            <li class="property-gallery__amenity">
              Fully equipped modern kitchen
            </li>
            <li class="property-gallery__amenity">
              Flexible dining and work-from-home zone
            </li>
            <li class="property-gallery__amenity">
              High-quality acoustic insulation
            </li>
            <li class="property-gallery__amenity">
              Built-in climate control
            </li>
          </ul>
        </div>
      </article>

      <article class="property-gallery__info-panel" data-gallery-info="6" hidden>
        <div class="property-gallery__description">
          <h2 class="property-gallery__info-title">
            Description
          </h2>

          <p class="property-gallery__info-text">
            The villa's private spaces are arranged to offer calm separation
            from the social areas. Thoughtful planning ensures that every room
            benefits from natural light, storage, and a strong sense of privacy.
          </p>

          <dl class="property-gallery__stats">
            <div class="property-gallery__stat">
              <dt class="property-gallery__stat-label">
                Bedrooms
              </dt>
              <dd class="property-gallery__stat-value">
                04
              </dd>
            </div>

            <div class="property-gallery__stat">
              <dt class="property-gallery__stat-label">
                Bathrooms
              </dt>
              <dd class="property-gallery__stat-value">
                03
              </dd>
            </div>

            <div class="property-gallery__stat">
              <dt class="property-gallery__stat-label">
                Area
              </dt>
              <dd class="property-gallery__stat-value">
                2,500 Square Feet
              </dd>
            </div>
          </dl>
        </div>

        <div class="property-gallery__amenities">
          <h2 class="property-gallery__info-title">
            Key Features and Amenities
          </h2>

          <ul class="property-gallery__amenity-list">
            <li class="property-gallery__amenity">
              Quiet master bedroom suite
            </li>
            <li class="property-gallery__amenity">
              Spa-inspired bathroom with freestanding tub
            </li>
            <li class="property-gallery__amenity">
              Private balcony with coastal views
            </li>
            <li class="property-gallery__amenity">
              Generous wardrobe and storage space
            </li>
            <li class="property-gallery__amenity">
              Separate guest accommodation
            </li>
          </ul>
        </div>
      </article>

      <article class="property-gallery__info-panel" data-gallery-info="7" hidden>
        <div class="property-gallery__description">
          <h2 class="property-gallery__info-title">
            Description
          </h2>

          <p class="property-gallery__info-text">
            The complete property experience brings together architecture,
            comfort, and location. Seaside Serenity Villa is designed for
            buyers who value privacy, refined materials, and a direct
            relationship with the coast.
          </p>

          <dl class="property-gallery__stats">
            <div class="property-gallery__stat">
              <dt class="property-gallery__stat-label">
                Bedrooms
              </dt>
              <dd class="property-gallery__stat-value">
                04
              </dd>
            </div>

            <div class="property-gallery__stat">
              <dt class="property-gallery__stat-label">
                Bathrooms
              </dt>
              <dd class="property-gallery__stat-value">
                03
              </dd>
            </div>

            <div class="property-gallery__stat">
              <dt class="property-gallery__stat-label">
                Area
              </dt>
              <dd class="property-gallery__stat-value">
                2,500 Square Feet
              </dd>
            </div>
          </dl>
        </div>

        <div class="property-gallery__amenities">
          <h2 class="property-gallery__info-title">
            Key Features and Amenities
          </h2>

          <ul class="property-gallery__amenity-list">
            <li class="property-gallery__amenity">
              Complete indoor and outdoor entertainment arrangement
            </li>
            <li class="property-gallery__amenity">
              Private pool and direct beach access
            </li>
            <li class="property-gallery__amenity">
              Premium appliances and designer finishes
            </li>
            <li class="property-gallery__amenity">
              Secure parking and private entrance
            </li>
            <li class="property-gallery__amenity">
              Fully integrated smart-home features
            </li>
          </ul>
        </div>
      </article>
    </div>
  </div>
</section>
    <section class="property-details-inquiry" id="property-details-inquiry"
  aria-labelledby="property-details-inquiry-title">
  <div class="property-details-inquiry__container container">
    <div class="property-details-inquiry__layout">
      <div class="property-details-inquiry__intro">
        <img class="property-details-inquiry__decoration" src="data:image/svg+xml,%3csvg%20width='69'%20height='30'%20viewBox='0%200%2069%2030'%20fill='none'%20xmlns='http://www.w3.org/2000/svg'%3e%3cg%20clip-path='url(%23clip0_75_930)'%3e%3cpath%20d='M15%2030.0166C23.2843%2030.0166%2030%2023.3009%2030%2015.0166C30%206.73233%2023.2843%200.0166836%2015%200.0166836C6.71573%200.0166836%200%206.73233%200%2015.0166C0%2023.3009%206.71573%2030.0166%2015%2030.0166Z'%20fill='%23666666'/%3e%3cpath%20d='M0%2045C8.28427%2045%2015%2038.2843%2015%2030C15%2021.7157%208.28427%2015%200%2015C-8.28427%2015%20-15%2021.7157%20-15%2030C-15%2038.2843%20-8.28427%2045%200%2045Z'%20fill='%23141414'/%3e%3cpath%20d='M30%2045C38.2843%2045%2045%2038.2843%2045%2030C45%2021.7157%2038.2843%2015%2030%2015C21.7157%2015%2015%2021.7157%2015%2030C15%2038.2843%2021.7157%2045%2030%2045Z'%20fill='%23141414'/%3e%3cpath%20d='M0%2015C8.28427%2015%2015%208.28427%2015%200C15%20-8.28427%208.28427%20-15%200%20-15C-8.28427%20-15%20-15%20-8.28427%20-15%200C-15%208.28427%20-8.28427%2015%200%2015Z'%20fill='%23141414'/%3e%3cpath%20d='M30%2015C38.2843%2015%2045%208.28427%2045%200C45%20-8.28427%2038.2843%20-15%2030%20-15C21.7157%20-15%2015%20-8.28427%2015%200C15%208.28427%2021.7157%2015%2030%2015Z'%20fill='%23141414'/%3e%3c/g%3e%3cg%20clip-path='url(%23clip1_75_930)'%3e%3cpath%20d='M45%2024.01C49.9706%2024.01%2054%2019.9805%2054%2015.01C54%2010.0394%2049.9706%206.01001%2045%206.01001C40.0294%206.01001%2036%2010.0394%2036%2015.01C36%2019.9805%2040.0294%2024.01%2045%2024.01Z'%20fill='%23333333'/%3e%3cpath%20d='M36%2033C40.9706%2033%2045%2028.9706%2045%2024C45%2019.0294%2040.9706%2015%2036%2015C31.0294%2015%2027%2019.0294%2027%2024C27%2028.9706%2031.0294%2033%2036%2033Z'%20fill='%23141414'/%3e%3cpath%20d='M54%2033C58.9706%2033%2063%2028.9706%2063%2024C63%2019.0294%2058.9706%2015%2054%2015C49.0294%2015%2045%2019.0294%2045%2024C45%2028.9706%2049.0294%2033%2054%2033Z'%20fill='%23141414'/%3e%3cpath%20d='M36%2015C40.9706%2015%2045%2010.9706%2045%206C45%201.02944%2040.9706%20-3%2036%20-3C31.0294%20-3%2027%201.02944%2027%206C27%2010.9706%2031.0294%2015%2036%2015Z'%20fill='%23141414'/%3e%3cpath%20d='M54%2015C58.9706%2015%2063%2010.9706%2063%206C63%201.02944%2058.9706%20-3%2054%20-3C49.0294%20-3%2045%201.02944%2045%206C45%2010.9706%2049.0294%2015%2054%2015Z'%20fill='%23141414'/%3e%3c/g%3e%3cg%20clip-path='url(%23clip2_75_930)'%3e%3cpath%20d='M64.2%2019.2046C66.5196%2019.2046%2068.4%2017.3242%2068.4%2015.0046C68.4%2012.6851%2066.5196%2010.8047%2064.2%2010.8047C61.8804%2010.8047%2060%2012.6851%2060%2015.0046C60%2017.3242%2061.8804%2019.2046%2064.2%2019.2046Z'%20fill='%23333333'/%3e%3cpath%20d='M59.9998%2023.4C62.3194%2023.4%2064.1998%2021.5196%2064.1998%2019.2C64.1998%2016.8804%2062.3194%2015%2059.9998%2015C57.6802%2015%2055.7998%2016.8804%2055.7998%2019.2C55.7998%2021.5196%2057.6802%2023.4%2059.9998%2023.4Z'%20fill='%23141414'/%3e%3cpath%20d='M68.3997%2023.4C70.7193%2023.4%2072.5997%2021.5196%2072.5997%2019.2C72.5997%2016.8804%2070.7193%2015%2068.3997%2015C66.0801%2015%2064.1997%2016.8804%2064.1997%2019.2C64.1997%2021.5196%2066.0801%2023.4%2068.3997%2023.4Z'%20fill='%23141414'/%3e%3cpath%20d='M59.9998%2015C62.3194%2015%2064.1998%2013.1196%2064.1998%2010.8C64.1998%208.4804%2062.3194%206.6%2059.9998%206.6C57.6802%206.6%2055.7998%208.4804%2055.7998%2010.8C55.7998%2013.1196%2057.6802%2015%2059.9998%2015Z'%20fill='%23141414'/%3e%3cpath%20d='M68.3997%2015C70.7193%2015%2072.5997%2013.1196%2072.5997%2010.8C72.5997%208.4804%2070.7193%206.6%2068.3997%206.6C66.0801%206.6%2064.1997%208.4804%2064.1997%2010.8C64.1997%2013.1196%2066.0801%2015%2068.3997%2015Z'%20fill='%23141414'/%3e%3c/g%3e%3cdefs%3e%3cclipPath%20id='clip0_75_930'%3e%3crect%20width='30'%20height='30'%20fill='white'/%3e%3c/clipPath%3e%3cclipPath%20id='clip1_75_930'%3e%3crect%20width='18'%20height='18'%20fill='white'%20transform='translate(36%206)'/%3e%3c/clipPath%3e%3cclipPath%20id='clip2_75_930'%3e%3crect%20width='8.4'%20height='8.4'%20fill='white'%20transform='translate(60%2010.8)'/%3e%3c/clipPath%3e%3c/defs%3e%3c/svg%3e" alt=""
          width="69" height="30" loading="lazy" decoding="async" aria-hidden="true" />

        <h2 class="property-details-inquiry__title" id="property-details-inquiry-title">
          Inquire About Seaside Serenity Villa
        </h2>

        <p class="property-details-inquiry__description">
          Interested in this property? Fill out the form below, and our real
          estate experts will get back to you with more details, including
          scheduling a viewing and answering any questions you may have.
        </p>
      </div>

      <div class="property-details-inquiry__form-card">
        <form class="property-details-inquiry__form" data-js-form action="" method="post" autocomplete="on" novalidate>
          <div class="property-details-inquiry__fields">
            <div class="form-field">
              <label class="form-field__label" for="property-details-first-name">
                First Name
              </label>

              <input class="form-field__control" id="property-details-first-name" name="first_name" type="text"
                placeholder="Enter First Name" autocomplete="given-name" required />
                <div data-js-form-field-errors></div>
            </div>

            <div class="form-field">
              <label class="form-field__label" for="property-details-last-name">
                Last Name
              </label>

              <input class="form-field__control" id="property-details-last-name" name="last_name" type="text"
                placeholder="Enter Last Name" autocomplete="family-name" required />
                <div data-js-form-field-errors></div>
            </div>

            <div class="form-field">
              <label class="form-field__label" for="property-details-email">
                Email
              </label>

              <input class="form-field__control" id="property-details-email" name="email" type="email"
                placeholder="Enter your Email" autocomplete="email" inputmode="email" required />
                <div data-js-form-field-errors></div>
            </div>

            <div class="form-field">
              <label class="form-field__label" for="property-details-phone">
                Phone
              </label>
              <input class="form-field__control" id="property-details-phone" name="phone" type="tel"
                placeholder="Enter Phone Number" autocomplete="tel" inputmode="tel" required />
                <div data-js-form-field-errors></div>
            </div>

            <div class="form-field form-field--wide">
              <label class="form-field__label" for="property-details-selected-property">
                Selected Property
              </label>
              <div class="property-details-inquiry__selected-control">
                <select class="form-field__control form-field__control--select js-custom-select"
                  data-select-theme="form" id="property-details-selected-property" name="selected_property" required>
                  <option value="Seaside Serenity Villa, Malibu, California" selected>Seaside Serenity Villa, Malibu,
                    California</option>
                  <option value="Metropolitan Haven, New York City, NY">Metropolitan Haven, New York City, NY</option>
                  <option value="Rustic Retreat Cottage, Aspen, Colorado">Rustic Retreat Cottage, Aspen, Colorado
                  </option>
                  <option value="Coastal Elegance, Miami, Florida">Coastal Elegance, Miami, Florida</option>
                  <option value="Urban Vista Apartment, Chicago, Illinois">Urban Vista Apartment, Chicago, Illinois
                  </option>
                  <option value="Countryside Haven, Austin, Texas">Countryside Haven, Austin, Texas</option>
                  <option value="Modern Loft, Los Angeles, CA">Modern Loft, Los Angeles, CA</option>
                  <option value="Mountain View Estate, Boulder, CO">Mountain View Estate, Boulder, CO</option>
                  <option value="Desert Oasis Villa, Phoenix, Arizona">Desert Oasis Villa, Phoenix, Arizona</option>
                </select>
              </div>
              <div data-js-form-field-errors></div>
            </div>

            <div class="form-field form-field--wide">
              <label class="form-field__label" for="property-details-message">
                Message
              </label>

              <textarea class="form-field__control form-field__control--textarea" id="property-details-message"
                name="message" placeholder="Enter your Message here..." rows="5" required></textarea>
                <div data-js-form-field-errors></div>
            </div>
          </div>

          <div class="property-details-inquiry__footer">
            <div class="agreement">
              <input class="agreement__checkbox visually-hidden" type="checkbox" id="property-details-privacy-policy"
                name="privacy_agreement" required />

              <label class="agreement__label" for="property-details-privacy-policy">
                I agree with
                <span class="agreement__link">
                  Terms of Use
                </span>
                and
                <span class="agreement__link">
                  Privacy Policy
                </span>
              </label>
              <div data-js-form-field-errors></div>
            </div>

            <button class="property-details-inquiry__submit button button--accent" type="submit">
              Send Your Message
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
    <section class="pricing" id="pricing" aria-labelledby="pricing-title">
  <div class="pricing__container container">
    <img class="pricing__decoration" src="data:image/svg+xml,%3csvg%20width='69'%20height='30'%20viewBox='0%200%2069%2030'%20fill='none'%20xmlns='http://www.w3.org/2000/svg'%3e%3cg%20clip-path='url(%23clip0_104_11388)'%3e%3cpath%20d='M15%2030.0166C23.2843%2030.0166%2030%2023.3009%2030%2015.0166C30%206.73234%2023.2843%200.0166931%2015%200.0166931C6.71573%200.0166931%200%206.73234%200%2015.0166C0%2023.3009%206.71573%2030.0166%2015%2030.0166Z'%20fill='%23666666'/%3e%3cpath%20d='M0%2045C8.28427%2045%2015%2038.2843%2015%2030C15%2021.7157%208.28427%2015%200%2015C-8.28427%2015%20-15%2021.7157%20-15%2030C-15%2038.2843%20-8.28427%2045%200%2045Z'%20fill='%23141414'/%3e%3cpath%20d='M30%2045C38.2843%2045%2045%2038.2843%2045%2030C45%2021.7157%2038.2843%2015%2030%2015C21.7157%2015%2015%2021.7157%2015%2030C15%2038.2843%2021.7157%2045%2030%2045Z'%20fill='%23141414'/%3e%3cpath%20d='M0%2015C8.28427%2015%2015%208.28427%2015%200C15%20-8.28427%208.28427%20-15%200%20-15C-8.28427%20-15%20-15%20-8.28427%20-15%200C-15%208.28427%20-8.28427%2015%200%2015Z'%20fill='%23141414'/%3e%3cpath%20d='M30%2015C38.2843%2015%2045%208.28427%2045%200C45%20-8.28427%2038.2843%20-15%2030%20-15C21.7157%20-15%2015%20-8.28427%2015%200C15%208.28427%2021.7157%2015%2030%2015Z'%20fill='%23141414'/%3e%3c/g%3e%3cg%20clip-path='url(%23clip1_104_11388)'%3e%3cpath%20d='M45%2024.01C49.9706%2024.01%2054%2019.9805%2054%2015.01C54%2010.0394%2049.9706%206.01001%2045%206.01001C40.0294%206.01001%2036%2010.0394%2036%2015.01C36%2019.9805%2040.0294%2024.01%2045%2024.01Z'%20fill='%23333333'/%3e%3cpath%20d='M36%2033C40.9706%2033%2045%2028.9706%2045%2024C45%2019.0294%2040.9706%2015%2036%2015C31.0294%2015%2027%2019.0294%2027%2024C27%2028.9706%2031.0294%2033%2036%2033Z'%20fill='%23141414'/%3e%3cpath%20d='M54%2033C58.9706%2033%2063%2028.9706%2063%2024C63%2019.0294%2058.9706%2015%2054%2015C49.0294%2015%2045%2019.0294%2045%2024C45%2028.9706%2049.0294%2033%2054%2033Z'%20fill='%23141414'/%3e%3cpath%20d='M36%2015C40.9706%2015%2045%2010.9706%2045%206C45%201.02944%2040.9706%20-3%2036%20-3C31.0294%20-3%2027%201.02944%2027%206C27%2010.9706%2031.0294%2015%2036%2015Z'%20fill='%23141414'/%3e%3cpath%20d='M54%2015C58.9706%2015%2063%2010.9706%2063%206C63%201.02944%2058.9706%20-3%2054%20-3C49.0294%20-3%2045%201.02944%2045%206C45%2010.9706%2049.0294%2015%2054%2015Z'%20fill='%23141414'/%3e%3c/g%3e%3cg%20clip-path='url(%23clip2_104_11388)'%3e%3cpath%20d='M64.2%2019.2046C66.5196%2019.2046%2068.4%2017.3242%2068.4%2015.0046C68.4%2012.685%2066.5196%2010.8047%2064.2%2010.8047C61.8804%2010.8047%2060%2012.685%2060%2015.0046C60%2017.3242%2061.8804%2019.2046%2064.2%2019.2046Z'%20fill='%23333333'/%3e%3cpath%20d='M60.0008%2023.4C62.3204%2023.4%2064.2008%2021.5196%2064.2008%2019.2C64.2008%2016.8804%2062.3204%2015%2060.0008%2015C57.6812%2015%2055.8008%2016.8804%2055.8008%2019.2C55.8008%2021.5196%2057.6812%2023.4%2060.0008%2023.4Z'%20fill='%23141414'/%3e%3cpath%20d='M68.3992%2023.4C70.7188%2023.4%2072.5992%2021.5196%2072.5992%2019.2C72.5992%2016.8804%2070.7188%2015%2068.3992%2015C66.0796%2015%2064.1992%2016.8804%2064.1992%2019.2C64.1992%2021.5196%2066.0796%2023.4%2068.3992%2023.4Z'%20fill='%23141414'/%3e%3cpath%20d='M60.0008%2015C62.3204%2015%2064.2008%2013.1196%2064.2008%2010.8C64.2008%208.48038%2062.3204%206.59998%2060.0008%206.59998C57.6812%206.59998%2055.8008%208.48038%2055.8008%2010.8C55.8008%2013.1196%2057.6812%2015%2060.0008%2015Z'%20fill='%23141414'/%3e%3cpath%20d='M68.3992%2015C70.7188%2015%2072.5992%2013.1196%2072.5992%2010.8C72.5992%208.48038%2070.7188%206.59998%2068.3992%206.59998C66.0796%206.59998%2064.1992%208.48038%2064.1992%2010.8C64.1992%2013.1196%2066.0796%2015%2068.3992%2015Z'%20fill='%23141414'/%3e%3c/g%3e%3cdefs%3e%3cclipPath%20id='clip0_104_11388'%3e%3crect%20width='30'%20height='30'%20fill='white'/%3e%3c/clipPath%3e%3cclipPath%20id='clip1_104_11388'%3e%3crect%20width='18'%20height='18'%20fill='white'%20transform='translate(36%206)'/%3e%3c/clipPath%3e%3cclipPath%20id='clip2_104_11388'%3e%3crect%20width='8.4'%20height='8.4'%20fill='white'%20transform='translate(60%2010.8)'/%3e%3c/clipPath%3e%3c/defs%3e%3c/svg%3e" alt="" width="68" height="30"
      loading="lazy" decoding="async" aria-hidden="true" draggable="false">

    <header class="pricing__header">
      <h2 class="pricing__title" id="pricing-title">
        Comprehensive Pricing Details
      </h2>

      <p class="pricing__subtitle">
        At Estatein, transparency is key. We want you to have a clear understanding of all
        costs associated with your property investment. Below, we break down the pricing
        for Seaside Serenity Villa to help you make an informed decision.
      </p>
    </header>

    <aside class="pricing__note" aria-labelledby="pricing-note-label">
      <strong class="pricing__note-label" id="pricing-note-label">
        Note
      </strong>

      <p class="pricing__note-text">
        The figures provided above are estimates and may vary depending on the property,
        location, and individual circumstances.
      </p>
    </aside>

    <div class="pricing__grid">
      <div class="pricing__summary">
        <dl class="pricing__summary-list">
          <dt class="pricing__summary-label">
            Listing Price
          </dt>

          <dd class="pricing__summary-value">
            <data value="1250000" data-currency="USD">
              $1,250,000
            </data>
          </dd>
        </dl>
      </div>

      <div class="pricing__blocks">
        <article class="pricing-card" aria-labelledby="pricing-additional-fees-title">
          <header class="pricing-card__header">
            <h3 class="pricing-card__title" id="pricing-additional-fees-title">
              Additional Fees
            </h3>

            <a class="pricing-card__btn" href="/properties/#inquiry" aria-label="Learn more about additional fees">
              Learn More
            </a>
          </header>

          <div class="pricing-card__rows">
            <div class="pricing-card__row">
              <dl class="pricing-card__item">
                <dt class="pricing-card__label">
                  Property Transfer Tax
                </dt>

                <dd class="pricing-card__details">
                  <data class="pricing-card__price" value="25000" data-currency="USD">
                    $25,000
                  </data>

                  <span class="pricing-card__badge">
                    Based on the sale price and local regulations
                  </span>
                </dd>
              </dl>

              <dl class="pricing-card__item">
                <dt class="pricing-card__label">
                  Legal Fees
                </dt>

                <dd class="pricing-card__details">
                  <data class="pricing-card__price" value="3000" data-currency="USD">
                    $3,000
                  </data>

                  <span class="pricing-card__badge">
                    Approximate cost for legal services, including title transfer
                  </span>
                </dd>
              </dl>
            </div>

            <div class="pricing-card__row">
              <dl class="pricing-card__item">
                <dt class="pricing-card__label">
                  Home Inspection
                </dt>

                <dd class="pricing-card__details">
                  <data class="pricing-card__price" value="500" data-currency="USD">
                    $500
                  </data>

                  <span class="pricing-card__badge">
                    Recommended for due diligence
                  </span>
                </dd>
              </dl>

              <dl class="pricing-card__item">
                <dt class="pricing-card__label">
                  Property Insurance
                </dt>

                <dd class="pricing-card__details">
                  <data class="pricing-card__price" value="1200" data-currency="USD">
                    $1,200
                  </data>

                  <span class="pricing-card__badge">
                    Annual cost for comprehensive property insurance
                  </span>
                </dd>
              </dl>
            </div>

            <div class="pricing-card__row pricing-card__row--single">
              <dl class="pricing-card__item">
                <dt class="pricing-card__label">
                  Mortgage Fees
                </dt>

                <dd class="pricing-card__details">
                  <span class="pricing-card__price">
                    Varies
                  </span>

                  <span class="pricing-card__badge">
                    If applicable, consult with your lender for specific details
                  </span>
                </dd>
              </dl>
            </div>
          </div>
        </article>

        <article class="pricing-card" aria-labelledby="pricing-monthly-costs-title">
          <header class="pricing-card__header">
            <h3 class="pricing-card__title" id="pricing-monthly-costs-title">
              Monthly Costs
            </h3>

            <a class="pricing-card__btn" href="/properties/#inquiry" aria-label="Learn more about monthly costs">
              Learn More
            </a>
          </header>

          <div class="pricing-card__rows">
            <div class="pricing-card__row pricing-card__row--single">
              <dl class="pricing-card__item">
                <dt class="pricing-card__label">
                  Property Taxes
                </dt>

                <dd class="pricing-card__details">
                  <data class="pricing-card__price" value="1250" data-currency="USD">
                    $1,250
                  </data>

                  <span class="pricing-card__badge">
                    Approximate monthly property tax based on the sale price and local rates
                  </span>
                </dd>
              </dl>
            </div>

            <div class="pricing-card__row pricing-card__row--single">
              <dl class="pricing-card__item">
                <dt class="pricing-card__label">
                  Homeowners' Association Fee
                </dt>

                <dd class="pricing-card__details">
                  <data class="pricing-card__price" value="300" data-currency="USD">
                    $300
                  </data>

                  <span class="pricing-card__badge">
                    Monthly fee for common area maintenance and security
                  </span>
                </dd>
              </dl>
            </div>
          </div>
        </article>

        <article class="pricing-card" aria-labelledby="pricing-initial-costs-title">
          <header class="pricing-card__header">
            <h3 class="pricing-card__title" id="pricing-initial-costs-title">
              Total Initial Costs
            </h3>

            <a class="pricing-card__btn" href="/properties/#inquiry" aria-label="Learn more about total initial costs">
              Learn More
            </a>
          </header>

          <div class="pricing-card__rows">
            <div class="pricing-card__row">
              <dl class="pricing-card__item">
                <dt class="pricing-card__label">
                  Listing Price
                </dt>

                <dd class="pricing-card__details">
                  <data class="pricing-card__price" value="1250000" data-currency="USD">
                    $1,250,000
                  </data>
                </dd>
              </dl>

              <dl class="pricing-card__item">
                <dt class="pricing-card__label">
                  Additional Fees
                </dt>

                <dd class="pricing-card__details">
                  <data class="pricing-card__price" value="29700" data-currency="USD">
                    $29,700
                  </data>

                  <span class="pricing-card__badge">
                    Property transfer tax, legal fees, inspection, insurance
                  </span>
                </dd>
              </dl>
            </div>

            <div class="pricing-card__row">
              <dl class="pricing-card__item">
                <dt class="pricing-card__label">
                  Down Payment
                </dt>

                <dd class="pricing-card__details">
                  <data class="pricing-card__price" value="250000" data-currency="USD">
                    $250,000
                  </data>

                  <span class="pricing-card__badge">
                    20%
                  </span>
                </dd>
              </dl>

              <dl class="pricing-card__item">
                <dt class="pricing-card__label">
                  Mortgage Amount
                </dt>

                <dd class="pricing-card__details">
                  <data class="pricing-card__price" value="1000000" data-currency="USD">
                    $1,000,000
                  </data>

                  <span class="pricing-card__badge">
                    If applicable
                  </span>
                </dd>
              </dl>
            </div>
          </div>
        </article>

        <article class="pricing-card" aria-labelledby="pricing-monthly-expenses-title">
          <header class="pricing-card__header">
            <h3 class="pricing-card__title" id="pricing-monthly-expenses-title">
              Monthly Expenses
            </h3>

            <a class="pricing-card__btn" href="/properties/#inquiry" aria-label="Learn more about monthly expenses">
              Learn More
            </a>
          </header>

          <div class="pricing-card__rows">
            <div class="pricing-card__row">
              <dl class="pricing-card__item">
                <dt class="pricing-card__label">
                  Property Taxes
                </dt>

                <dd class="pricing-card__details">
                  <data class="pricing-card__price" value="1250" data-currency="USD">
                    $1,250
                  </data>
                </dd>
              </dl>

              <dl class="pricing-card__item">
                <dt class="pricing-card__label">
                  Homeowners' Association Fee
                </dt>

                <dd class="pricing-card__details">
                  <data class="pricing-card__price" value="300" data-currency="USD">
                    $300
                  </data>
                </dd>
              </dl>
            </div>

            <div class="pricing-card__row">
              <dl class="pricing-card__item">
                <dt class="pricing-card__label">
                  Mortgage Payment
                </dt>

                <dd class="pricing-card__details">
                  <span class="pricing-card__price">
                    Varies based on terms and interest rate
                  </span>

                  <span class="pricing-card__badge">
                    If applicable
                  </span>
                </dd>
              </dl>

              <dl class="pricing-card__item">
                <dt class="pricing-card__label">
                  Property Insurance
                </dt>

                <dd class="pricing-card__details">
                  <data class="pricing-card__price" value="100" data-currency="USD">
                    $100
                  </data>

                  <span class="pricing-card__badge">
                    Approximate monthly cost
                  </span>
                </dd>
              </dl>
            </div>
          </div>
        </article>
      </div>
    </div>
  </div>
</section>
    <section
    class="faq-section"
    aria-labelledby="faq-title"
    id="faq"
    data-js-slider
    data-slider-slides-desktop="3"
    data-slider-slides-tablet="2"
    data-slider-slides-mobile="1"
    data-slider-group-desktop="3"
    data-slider-group-tablet="2"
    data-slider-group-mobile="1"
    data-slider-loop="false"
>
    <div class="faq-section__inner container">
        <img
            class="faq-section__decoration"
            src="data:image/svg+xml,%3csvg%20width='69'%20height='30'%20viewBox='0%200%2069%2030'%20fill='none'%20xmlns='http://www.w3.org/2000/svg'%3e%3cg%20clip-path='url(%23clip0_75_930)'%3e%3cpath%20d='M15%2030.0166C23.2843%2030.0166%2030%2023.3009%2030%2015.0166C30%206.73233%2023.2843%200.0166836%2015%200.0166836C6.71573%200.0166836%200%206.73233%200%2015.0166C0%2023.3009%206.71573%2030.0166%2015%2030.0166Z'%20fill='%23666666'/%3e%3cpath%20d='M0%2045C8.28427%2045%2015%2038.2843%2015%2030C15%2021.7157%208.28427%2015%200%2015C-8.28427%2015%20-15%2021.7157%20-15%2030C-15%2038.2843%20-8.28427%2045%200%2045Z'%20fill='%23141414'/%3e%3cpath%20d='M30%2045C38.2843%2045%2045%2038.2843%2045%2030C45%2021.7157%2038.2843%2015%2030%2015C21.7157%2015%2015%2021.7157%2015%2030C15%2038.2843%2021.7157%2045%2030%2045Z'%20fill='%23141414'/%3e%3cpath%20d='M0%2015C8.28427%2015%2015%208.28427%2015%200C15%20-8.28427%208.28427%20-15%200%20-15C-8.28427%20-15%20-15%20-8.28427%20-15%200C-15%208.28427%20-8.28427%2015%200%2015Z'%20fill='%23141414'/%3e%3cpath%20d='M30%2015C38.2843%2015%2045%208.28427%2045%200C45%20-8.28427%2038.2843%20-15%2030%20-15C21.7157%20-15%2015%20-8.28427%2015%200C15%208.28427%2021.7157%2015%2030%2015Z'%20fill='%23141414'/%3e%3c/g%3e%3cg%20clip-path='url(%23clip1_75_930)'%3e%3cpath%20d='M45%2024.01C49.9706%2024.01%2054%2019.9805%2054%2015.01C54%2010.0394%2049.9706%206.01001%2045%206.01001C40.0294%206.01001%2036%2010.0394%2036%2015.01C36%2019.9805%2040.0294%2024.01%2045%2024.01Z'%20fill='%23333333'/%3e%3cpath%20d='M36%2033C40.9706%2033%2045%2028.9706%2045%2024C45%2019.0294%2040.9706%2015%2036%2015C31.0294%2015%2027%2019.0294%2027%2024C27%2028.9706%2031.0294%2033%2036%2033Z'%20fill='%23141414'/%3e%3cpath%20d='M54%2033C58.9706%2033%2063%2028.9706%2063%2024C63%2019.0294%2058.9706%2015%2054%2015C49.0294%2015%2045%2019.0294%2045%2024C45%2028.9706%2049.0294%2033%2054%2033Z'%20fill='%23141414'/%3e%3cpath%20d='M36%2015C40.9706%2015%2045%2010.9706%2045%206C45%201.02944%2040.9706%20-3%2036%20-3C31.0294%20-3%2027%201.02944%2027%206C27%2010.9706%2031.0294%2015%2036%2015Z'%20fill='%23141414'/%3e%3cpath%20d='M54%2015C58.9706%2015%2063%2010.9706%2063%206C63%201.02944%2058.9706%20-3%2054%20-3C49.0294%20-3%2045%201.02944%2045%206C45%2010.9706%2049.0294%2015%2054%2015Z'%20fill='%23141414'/%3e%3c/g%3e%3cg%20clip-path='url(%23clip2_75_930)'%3e%3cpath%20d='M64.2%2019.2046C66.5196%2019.2046%2068.4%2017.3242%2068.4%2015.0046C68.4%2012.6851%2066.5196%2010.8047%2064.2%2010.8047C61.8804%2010.8047%2060%2012.6851%2060%2015.0046C60%2017.3242%2061.8804%2019.2046%2064.2%2019.2046Z'%20fill='%23333333'/%3e%3cpath%20d='M59.9998%2023.4C62.3194%2023.4%2064.1998%2021.5196%2064.1998%2019.2C64.1998%2016.8804%2062.3194%2015%2059.9998%2015C57.6802%2015%2055.7998%2016.8804%2055.7998%2019.2C55.7998%2021.5196%2057.6802%2023.4%2059.9998%2023.4Z'%20fill='%23141414'/%3e%3cpath%20d='M68.3997%2023.4C70.7193%2023.4%2072.5997%2021.5196%2072.5997%2019.2C72.5997%2016.8804%2070.7193%2015%2068.3997%2015C66.0801%2015%2064.1997%2016.8804%2064.1997%2019.2C64.1997%2021.5196%2066.0801%2023.4%2068.3997%2023.4Z'%20fill='%23141414'/%3e%3cpath%20d='M59.9998%2015C62.3194%2015%2064.1998%2013.1196%2064.1998%2010.8C64.1998%208.4804%2062.3194%206.6%2059.9998%206.6C57.6802%206.6%2055.7998%208.4804%2055.7998%2010.8C55.7998%2013.1196%2057.6802%2015%2059.9998%2015Z'%20fill='%23141414'/%3e%3cpath%20d='M68.3997%2015C70.7193%2015%2072.5997%2013.1196%2072.5997%2010.8C72.5997%208.4804%2070.7193%206.6%2068.3997%206.6C66.0801%206.6%2064.1997%208.4804%2064.1997%2010.8C64.1997%2013.1196%2066.0801%2015%2068.3997%2015Z'%20fill='%23141414'/%3e%3c/g%3e%3cdefs%3e%3cclipPath%20id='clip0_75_930'%3e%3crect%20width='30'%20height='30'%20fill='white'/%3e%3c/clipPath%3e%3cclipPath%20id='clip1_75_930'%3e%3crect%20width='18'%20height='18'%20fill='white'%20transform='translate(36%206)'/%3e%3c/clipPath%3e%3cclipPath%20id='clip2_75_930'%3e%3crect%20width='8.4'%20height='8.4'%20fill='white'%20transform='translate(60%2010.8)'/%3e%3c/clipPath%3e%3c/defs%3e%3c/svg%3e"
            alt=""
            width="69"
            height="30"
            aria-hidden="true"
        />

        <div class="faq-section__header section-header">
            <div class="section-header__content">
                <h2
                    class="section-header__title"
                    id="faq-title"
                >
                    Frequently Asked Questions
                </h2>

                <p class="section-header__description">
                    Find answers to common questions about Estatein's
                    services, property listings, and the real estate
                    process. We're here to provide clarity and assist
                    you every step of the way.
                </p>
            </div>

            <a
                class="section-header__action button button--dark"
                href="/#faq"
            >
                View All FAQ’s
            </a>
        </div>

        <div
            class="faq-section__slider slider swiper"
            data-js-slider-swiper
        >
            <ul class="swiper-wrapper">
                <li class="swiper-slide">
                    <article class="faq-card">
                        <div class="faq-card__content">
                            <h3 class="faq-card__title">
                                How do I search for properties on
                                Estatein?
                            </h3>

                            <p class="faq-card__description">
                                Learn how to use our user-friendly search
                                tools to find properties that match your
                                criteria.
                            </p>
                        </div>

                        <a
                            class="faq-card__link button button--gray"
                            href="/properties/"
                            aria-label="Read more about searching for properties on Estatein"
                        >
                            Read More
                        </a>
                    </article>
                </li>

                <li class="swiper-slide">
                    <article class="faq-card">
                        <div class="faq-card__content">
                            <h3 class="faq-card__title">
                                What documents do I need to sell my
                                property through Estatein?
                            </h3>

                            <p class="faq-card__description">
                                Find out about the necessary documentation
                                for listing and selling your property with
                                us.
                            </p>
                        </div>

                        <a
                            class="faq-card__link button button--gray"
                            href="/services/#unlock-value"
                            aria-label="Read more about documents needed to sell a property"
                        >
                            Read More
                        </a>
                    </article>
                </li>

                <li class="swiper-slide">
                    <article class="faq-card">
                        <div class="faq-card__content">
                            <h3 class="faq-card__title">
                                How can I contact an Estatein agent?
                            </h3>

                            <p class="faq-card__description">
                                Discover the different ways you can get
                                in touch with our experienced agents.
                            </p>
                        </div>

                        <a
                            class="faq-card__link button button--gray"
                            href="/contacts/#contact-form"
                            aria-label="Read more about contacting an Estatein agent"
                        >
                            Read More
                        </a>
                    </article>
                </li>

                <li class="swiper-slide">
                    <article class="faq-card">
                        <div class="faq-card__content">
                            <h3 class="faq-card__title">
                                How do I search for properties on
                                Estatein?
                            </h3>

                            <p class="faq-card__description">
                                Learn how to use our user-friendly search
                                tools to find properties that match your
                                criteria.
                            </p>
                        </div>

                        <a
                            class="faq-card__link button button--gray"
                            href="/properties/"
                            aria-label="Read more about searching for properties on Estatein"
                        >
                            Read More
                        </a>
                    </article>
                </li>

                <li class="swiper-slide">
                    <article class="faq-card">
                        <div class="faq-card__content">
                            <h3 class="faq-card__title">
                                How do I search for properties on
                                Estatein?
                            </h3>

                            <p class="faq-card__description">
                                Learn how to use our user-friendly search
                                tools to find properties that match your
                                criteria.
                            </p>
                        </div>

                        <a
                            class="faq-card__link button button--gray"
                            href="/properties/"
                            aria-label="Read more about searching for properties on Estatein"
                        >
                            Read More
                        </a>
                    </article>
                </li>

                <li class="swiper-slide">
                    <article class="faq-card">
                        <div class="faq-card__content">
                            <h3 class="faq-card__title">
                                How do I search for properties on
                                Estatein?
                            </h3>

                            <p class="faq-card__description">
                                Learn how to use our user-friendly search
                                tools to find properties that match your
                                criteria.
                            </p>
                        </div>

                        <a
                            class="faq-card__link button button--gray"
                            href="/properties/"
                            aria-label="Read more about searching for properties on Estatein"
                        >
                            Read More
                        </a>
                    </article>
                </li>

                <li class="swiper-slide">
                    <article class="faq-card">
                        <div class="faq-card__content">
                            <h3 class="faq-card__title">
                                How do I search for properties on
                                Estatein?
                            </h3>

                            <p class="faq-card__description">
                                Learn how to use our user-friendly search
                                tools to find properties that match your
                                criteria.
                            </p>
                        </div>

                        <a
                            class="faq-card__link button button--gray"
                            href="/properties/"
                            aria-label="Read more about searching for properties on Estatein"
                        >
                            Read More
                        </a>
                    </article>
                </li>

                <li class="swiper-slide">
                    <article class="faq-card">
                        <div class="faq-card__content">
                            <h3 class="faq-card__title">
                                How do I search for properties on
                                Estatein?
                            </h3>

                            <p class="faq-card__description">
                                Learn how to use our user-friendly search
                                tools to find properties that match your
                                criteria.
                            </p>
                        </div>

                        <a
                            class="faq-card__link button button--gray"
                            href="/properties/"
                            aria-label="Read more about searching for properties on Estatein"
                        >
                            Read More
                        </a>
                    </article>
                </li>

                <li class="swiper-slide">
                    <article class="faq-card">
                        <div class="faq-card__content">
                            <h3 class="faq-card__title">
                                How do I search for properties on
                                Estatein?
                            </h3>

                            <p class="faq-card__description">
                                Learn how to use our user-friendly search
                                tools to find properties that match your
                                criteria.
                            </p>
                        </div>

                        <a
                            class="faq-card__link button button--gray"
                            href="/properties/"
                            aria-label="Read more about searching for properties on Estatein"
                        >
                            Read More
                        </a>
                    </article>
                </li>
            </ul>
        </div>

        <div class="faq-section__footer slider__footer">
            <a
                class="slider__mobile-action button button--dark"
                href="/#faq"
            >
                View All FAQs
            </a>

            <p
                class="slider__counter"
                aria-live="polite"
                aria-atomic="true"
            >
                <span
                    class="slider__counter-current"
                    data-js-slider-current
                >
                    01
                </span>
                of
                <span data-js-slider-total>06</span>
            </p>

            <div
                class="slider__navigation"
                aria-label="FAQ slider controls"
            >
                <button
                    class="slider__button slider__button--previous"
                    type="button"
                    aria-label="Previous FAQ group"
                    data-js-slider-prev
                ></button>

                <button
                    class="slider__button slider__button--next"
                    type="button"
                    aria-label="Next FAQ group"
                    data-js-slider-next
                ></button>
            </div>
        </div>
    </div>
</section>
