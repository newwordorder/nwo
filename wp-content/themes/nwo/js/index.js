
var slide1 = new sliderEffect({
    parent: document.querySelector('.slider'),
    intensity: 0.2,
    images: ['https://images.unsplash.com/photo-1544946632-b73cacef16ad','https://images.unsplash.com/photo-1544906331-ebabd2fe0997'],
    displacements: ['https://images.unsplash.com/photo-1544906331-ebabd2fe0997'],
    slides: document.querySelectorAll('.slide'),
    hover: false,
    line: document.querySelector('.line')
});

document.querySelector('.next').addEventListener('click', slide1.next);
document.querySelector('.previous').addEventListener('click', slide1.previous);

