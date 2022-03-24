const btnBurger = document.querySelector('.btn-hamburger');
const bottomMenu = document.querySelector('.menu-bottom');

btnBurger.addEventListener('click', () => {
    bottomMenu.classList.toggle('menu-bottom__active');
    btnBurger.classList.toggle('btn-hamburger_active');
})

$('.alert').fadeOut(5000);

$('.hero-btn').on('click', () => {
    document.querySelector('.products-section').scrollIntoView({
        behavior: 'smooth',
        block: 'start'
    });
});

$('.footer-btn').on('click', () => {
    document.querySelector('.products-section').scrollIntoView({
        behavior: 'smooth',
        block: 'start'
    });
});
