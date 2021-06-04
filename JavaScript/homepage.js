const carouselItems = document.querySelectorAll('.carousel-item');

carouselItems[0].addEventListener('click', () => {
    window.location.href = ("product_page.php?number=13");
});

carouselItems[1].addEventListener('click', () => {
    window.location.href = ("product_page.php?number=7");
});

carouselItems[2].addEventListener('click', () => {
    window.location.href = ("product_page.php?number=4");
});