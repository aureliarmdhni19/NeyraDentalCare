document.addEventListener('DOMContentLoaded', () => {

    // 1. Navbar scroll effect
    const header = document.querySelector('header');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            header.style.padding = '0.5rem 5%';
            header.querySelector('.navbar').style.background = 'rgba(255, 255, 255, 0.4)';
        } else {
            header.style.padding = '1rem 5%';
            header.querySelector('.navbar').style.background = 'var(--glass-bg)';
        }
    });

    // 2. Smooth scrolling for internal anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            if(targetId === '#') return;
            const targetElement = document.querySelector(targetId);
            if(targetElement) {
                targetElement.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // 3. Optional Micro-interactions / Animations using Intersection Observer
    const observerOptions = {
        threshold: 0.1,
        rootMargin: "0px 0px -50px 0px"
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Apply observer to cards and sections for fade-in effect
    document.querySelectorAll('.layanan-card, .tentang-text, .tentang-img, .reservasi-form, .map-container, .tim-card, .jam-operasional').forEach((el, index) => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(30px)';
        el.style.transition = `all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275) ${index * 0.1}s`;
        observer.observe(el);
    });

    // 4. Initialize Swiper Slider (Moved from HTML)
    // Ensures the Swiper slider on the homepage works flawlessly
    if (document.querySelector('.mySwiper')) {
        new Swiper(".mySwiper", {
            effect: "slide",
            grabCursor: true,
            slidesPerView: 1,
            spaceBetween: 30,
            breakpoints: {
                768: { slidesPerView: 2 },
                1024: { slidesPerView: 3 }
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            loop: true,
            keyboard: {
                enabled: true,
            }
        });
    }

});
