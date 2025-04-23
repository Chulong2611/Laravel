import './bootstrap';

import Swiper from 'swiper';
import 'swiper/swiper-bundle.css';

// Swiper banner
const swiper = new Swiper('.swiper', {
    loop: true,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },
    effect: 'fade',
});

// Scroll category buttons
document.addEventListener('DOMContentLoaded', function () {
    const container = document.querySelector('.cate');
    document.querySelector('.cat-btn-next')?.addEventListener('click', () => {
        container.scrollBy({ left: 140, behavior: 'smooth' });
    });

    document.querySelector('.cat-btn-prev')?.addEventListener('click', () => {
        container.scrollBy({ left: -140, behavior: 'smooth' });
    });
});
