const track = document.querySelector('.slides');
const slides = document.querySelectorAll('.slide');
const slideCount = slides.length;
const pagination = document.querySelector('.slider-pagination');

let currentIndex = 0;

for (let i=0; i<slideCount; i++) {
    const dot = document.createElement('span');
    if (i === 0) dot.classList.add('active');
    dot.addEventListener('click', () => {
        currentIndex = i;
        updateSlide();
        resetInterval();
    });
    pagination.appendChild(dot);
}

const dots = document.querySelectorAll('.slider-pagination span');

function updateSlide() {
    track.style.transform = `translateX(-${currentIndex * 100}%)`;
    dots.forEach(dot => dot.classList.remove('active'));
    dots[currentIndex].classList.add('active');
}

let slideInterval = setInterval(nextSlide, 5000);

function nextSlide() {
    currentIndex = (currentIndex + 1) % slideCount;
    updateSlide();
}

function resetInterval() {
    clearInterval(slideInterval);
    slideInterval = setInterval(nextSlide, 5000);
}