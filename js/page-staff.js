// スタッフページ専用の処理を記述します。

document.addEventListener('DOMContentLoaded', () => {
    const cards = document.querySelectorAll('.card');
    const isSP = () => window.innerWidth <= 699;

    cards.forEach((card) => {
        const mainImg = card.querySelector('#mainimg img');
        const thumbnails = card.querySelectorAll('.thumbnails .thumb');
        const thumbnailsContainer = card.querySelector('.thumbnails');
        if (thumbnails.length === 0) return;
        let currentIndex = 0;
        let autoSlideInterval = null;


        function updateThumbnailsSlider(index) {
            currentIndex = index;
            const targetThumb = thumbnails[currentIndex];
            thumbnails.forEach((thumb, i) => {
                thumb.classList.toggle('active', i === currentIndex);
            });

            
            if (isSP() && targetThumb) {
                thumbnailsContainer.scrollTo({
                    left: targetThumb.offsetLeft - thumbnailsContainer.offsetLeft,
                    behavior: 'smooth'
                });
            }
        }

        function changeImage(index) {
            const targetThumb = thumbnails[index];
            if (mainImg && targetThumb) {
                mainImg.src = targetThumb.src;
            }
            
            updateThumbnailsSlider(index);
        }

        function startAutoSlide() {
            if (!autoSlideInterval && isSP()) {
                autoSlideInterval = setInterval(() => {
                    const nextIndex = (currentIndex + 1) % thumbnails.length;
                    updateThumbnailsSlider(nextIndex);
                }, 3000);
            }
        }
        function stopAutoSlide() {
            if (autoSlideInterval) {
                clearInterval(autoSlideInterval);
                autoSlideInterval = null;
            }
        }

        thumbnails.forEach((thumb, index) => {
            thumb.addEventListener('click', () => {
                changeImage(index);
                if (isSP()) {
                    stopAutoSlide();
                    startAutoSlide();
                }
            });
        });

        updateThumbnailsSlider(0);
        startAutoSlide();
        window.addEventListener('resize', () => {
            if (isSP()) {
                startAutoSlide();
            } else {
                stopAutoSlide();
            }
        });
    });
    

    
});



const observerOptions = {
    root: null,
    rootMargin: '0px 0px -50px 0px',
    threshold: 0.2
};

const observer = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('is-show');
        } else {
            entry.target.classList.remove('is-show');
        }
    });
}, observerOptions);

const targetImages = document.querySelectorAll('.card');
targetImages.forEach(card => observer.observe(card));