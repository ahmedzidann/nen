const articlesWrapper = document.querySelector('.articles-wrapper');
const nextButton = document.getElementById('next');
const prevButton = document.getElementById('prev');

let currentIndex = 0;

nextButton.addEventListener('click', () => {
    const articles = document.querySelectorAll('.article');
    if (currentIndex < articles.length - 1) {
        currentIndex++;
        articlesWrapper.style.transform = `translateX(-${currentIndex * 100}%)`;
    }
});

prevButton.addEventListener('click', () => {
    if (currentIndex > 0) {
        currentIndex--;
        articlesWrapper.style.transform = `translateX(-${currentIndex * 100}%)`;
    }
});
