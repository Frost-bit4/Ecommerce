
const productSlider = document.querySelector('.product-slider');
const products = document.querySelectorAll('.product');

let scrollAmount = 0;

document.querySelector('.product-slider').addEventListener('scroll', (e) => {
    scrollAmount = e.target.scrollLeft;
});

document.querySelector('.product-slider').addEventListener('click', () => {
    if (scrollAmount < productSlider.scrollWidth - productSlider.clientWidth) {
        scrollAmount += products[0].offsetWidth;
        productSlider.scrollTo({
            top: 0,
            left: scrollAmount,
            behavior: 'smooth'
        });
    }
});
