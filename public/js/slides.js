// ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓ MSP 운영관리 메인 Slides ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
class Slider {
    constructor() {
        this.slideIndex = 0;
        this.slides = document.querySelectorAll('.menu-item');
        this.slider = document.querySelector('.image-slider');
        this.initialize();
    }

    initialize() {
        this.updateSliderWidth();
        this.attachEventListeners();
    }

    updateSliderWidth() {
        // 슬라이더의 너비를 모든 슬라이드의 총합 너비로 설정
        const totalWidth = this.slides[0].clientWidth * this.slides.length;
        this.slider.style.width = `${totalWidth}px`;
    }

    showSlide(index) {  // 슬라이드 이동
        const slideWidth = document.querySelector('.image-slider-wrapper').offsetWidth;
        const moveWidth = (-slideWidth * index);
        this.slider.style.transform = `translateX(${moveWidth}px)`;
    }

    navigate(direction) {
        if (direction === 'prev' && this.slideIndex > 0) {
            // slideIndex가 0보다 큰 경우에만 감소
            this.slideIndex--;
        } else if (direction === 'next' && this.slideIndex < this.slides.length - 2) {
            // 슬라이드의 총 갯수에서 1을 뺀 값보다 작은 경우만 slideIndex를 증가
            this.slideIndex++;
        }
        this.showSlide(this.slideIndex);
    }

    attachEventListeners() {
        document.querySelector('.prev').addEventListener('click', () => this.navigate('prev'));
        document.querySelector('.next').addEventListener('click', () => this.navigate('next'));
    }
}

document.addEventListener('DOMContentLoaded', function() {
    new Slider();
});