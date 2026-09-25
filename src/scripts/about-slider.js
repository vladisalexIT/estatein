export default function initClientsSlider() {
  const currentNumElem = document.querySelector('.js-slider-current');
  const btnPrev = document.querySelector('.js-slider-prev');
  const btnNext = document.querySelector('.js-slider-next');
  const sliderGrid = document.querySelector('.js-slider-grid');
  const totalNumElem = document.querySelector('.about-clients__total');

  const flatData = [
    { date: "Since 2019", company: "ABC Corporation", domain: "Commercial Real Estate", category: "Luxury Home Development", text: "Estatein's expertise in finding the perfect office space for our expanding operations was invaluable. They truly understand our business needs." },
    { date: "Since 2018", company: "GreenTech Enterprises", domain: "Commercial Real Estate", category: "Retail Space", text: "Estatein's ability to identify prime retail locations helped us expand our brand presence. They are a trusted partner in our growth." },
    { date: "Since 2021", company: "Apex Global", domain: "Residential Logistics", category: "Smart Warehousing", text: "They streamlined our entire property search. The team was sharp, fast, and delivered exactly what our tech hubs required." },
    { date: "Since 2020", company: "Nova Development", domain: "Urban Architecture", category: "Eco-Friendly Housing", text: "Incredible attention to environmental standards. Estatein helped us source land plots that perfectly fit our green agenda." },
    { date: "Since 2022", company: "Skyline Ventures", domain: "Hospitality Industry", category: "Boutique Hotels", text: "Finding premium locations for our luxury hotel chain seemed impossible until we partnered with Estatein. Absolute pros." },
    { date: "Since 2017", company: "Quantum Labs", domain: "Industrial Tech", category: "R&D Facilities", text: "Securing lab space with strict zoning laws was tough. Estatein handled the legal complexities flawlessly." },
    { date: "Since 2019", company: "ABC Corporation", domain: "Commercial Real Estate", category: "Luxury Home Development", text: "Estatein's expertise in finding the perfect office space for our expanding operations was invaluable. They truly understand our business needs." },
    { date: "Since 2018", company: "GreenTech Enterprises", domain: "Commercial Real Estate", category: "Retail Space", text: "Estatein's ability to identify prime retail locations helped us expand our brand presence. They are a trusted partner in our growth." },
    { date: "Since 2021", company: "Apex Global", domain: "Residential Logistics", category: "Smart Warehousing", text: "They streamlined our entire property search. The team was sharp, fast, and delivered exactly what our tech hubs required." },
    { date: "Since 2020", company: "Nova Development", domain: "Urban Architecture", category: "Eco-Friendly Housing", text: "Incredible attention to environmental standards. Estatein helped us source land plots that perfectly fit our green agenda." },
    { date: "Since 2022", company: "Skyline Ventures", domain: "Hospitality Industry", category: "Boutique Hotels", text: "Finding premium locations for our luxury hotel chain seemed impossible until we partnered with Estatein. Absolute pros." },
    { date: "Since 2017", company: "Quantum Labs", domain: "Industrial Tech", category: "R&D Facilities", text: "Securing lab space with strict zoning laws was tough. Estatein handled the legal complexities flawlessly." },
    { date: "Since 2019", company: "ABC Corporation", domain: "Commercial Real Estate", category: "Luxury Home Development", text: "Estatein's expertise in finding the perfect office space for our expanding operations was invaluable. They truly understand our business needs." },
    { date: "Since 2018", company: "GreenTech Enterprises", domain: "Commercial Real Estate", category: "Retail Space", text: "Estatein's ability to identify prime retail locations helped us expand our brand presence. They are a trusted partner in our growth." },
    { date: "Since 2021", company: "Apex Global", domain: "Residential Logistics", category: "Smart Warehousing", text: "They streamlined our entire property search. The team was sharp, fast, and delivered exactly what our tech hubs required." },
    { date: "Since 2020", company: "Nova Development", domain: "Urban Architecture", category: "Eco-Friendly Housing", text: "Incredible attention to environmental standards. Estatein helped us source land plots that perfectly fit our green agenda." },
    { date: "Since 2022", company: "Skyline Ventures", domain: "Hospitality Industry", category: "Boutique Hotels", text: "Finding premium locations for our luxury hotel chain seemed impossible until we partnered with Estatein. Absolute pros." },
    { date: "Since 2017", company: "Quantum Labs", domain: "Industrial Tech", category: "R&D Facilities", text: "Securing lab space with strict zoning laws was tough. Estatein handled the legal complexities flawlessly." },
    { date: "Since 2019", company: "ABC Corporation", domain: "Commercial Real Estate", category: "Luxury Home Development", text: "Estatein's expertise in finding the perfect office space for our expanding operations was invaluable. They truly understand our business needs." },
    { date: "Since 2018", company: "GreenTech Enterprises", domain: "Commercial Real Estate", category: "Retail Space", text: "Estatein's ability to identify prime retail locations helped us expand our brand presence. They are a trusted partner in our growth." }
  ];

  if (currentNumElem && btnPrev && btnNext && sliderGrid && totalNumElem) {
    let currentPage = 1;
    let isMobile = window.innerWidth <= 767.98;
    
    let totalPages = isMobile ? flatData.length : Math.ceil(flatData.length / 2);
    totalNumElem.textContent = `of ${totalPages}`;

    sliderGrid.style.transition = 'transform 0.35s cubic-bezier(0.25, 1, 0.5, 1), opacity 0.35s ease';

    // Функция отрисовки контента в зависимости от экрана
    const changeCardContent = (pageIndex) => {
      const cards = sliderGrid.querySelectorAll('.client-card');
      
      if (window.innerWidth <= 767.98) {
        // Режим мобилки
        const data = flatData[pageIndex];
        if (data && cards[0]) {
          cards[0].querySelector('.js-card-date').textContent = data.date;
          cards[0].querySelector('.js-card-company').textContent = data.company;
          cards[0].querySelector('.js-card-domain').textContent = data.domain;
          cards[0].querySelector('.js-card-category').textContent = data.category;
          cards[0].querySelector('.js-card-text').textContent = data.text;
        }
      } else {
        // Режим десктопа
        const firstIndex = pageIndex * 2;
        cards.forEach((card, cardIndex) => {
          const data = flatData[firstIndex + cardIndex];
          if (!data) return;
          card.querySelector('.js-card-date').textContent = data.date;
          card.querySelector('.js-card-company').textContent = data.company;
          card.querySelector('.js-card-domain').textContent = data.domain;
          card.querySelector('.js-card-category').textContent = data.category;
          card.querySelector('.js-card-text').textContent = data.text;
        });
      }
    };

    const switchSlide = (newPage, direction) => {
      currentPage = newPage;
      const offset = direction === 'next' ? '-80px' : '80px';
      sliderGrid.style.transform = `translateX(${offset})`;
      sliderGrid.style.opacity = '0';

      setTimeout(() => {
        currentNumElem.textContent = String(currentPage).padStart(2, '0');
        changeCardContent(currentPage - 1);

        const resetOffset = direction === 'next' ? '80px' : '-80px';
        sliderGrid.style.transition = 'none';
        sliderGrid.style.transform = `translateX(${resetOffset})`;

        requestAnimationFrame(() => {
          setTimeout(() => {
            sliderGrid.style.transition = 'transform 0.35s cubic-bezier(0.25, 1, 0.5, 1), opacity 0.35s ease';
            sliderGrid.style.transform = 'translateX(0)';
            sliderGrid.style.opacity = '1';
          }, 20);
        });
      }, 180);
    };

    // Слушатель изменения размера экрана (пересчитываем страницы при повороте телефона)
    window.addEventListener('resize', () => {
      const checkMobile = window.innerWidth <= 767.98;
      if (checkMobile !== isMobile) {
        isMobile = checkMobile;
        currentPage = 1;
        totalPages = isMobile ? flatData.length : Math.ceil(flatData.length / 2);
        totalNumElem.textContent = `of ${totalPages}`;
        currentNumElem.textContent = '01';
        changeCardContent(0);
      }
    });

    btnNext.addEventListener('click', () => {
      const nextPage = currentPage < totalPages ? currentPage + 1 : 1;
      switchSlide(nextPage, 'next');
    });

    btnPrev.addEventListener('click', () => {
      const prevPage = currentPage > 1 ? currentPage - 1 : totalPages;
      switchSlide(prevPage, 'prev');
    });
  }
}