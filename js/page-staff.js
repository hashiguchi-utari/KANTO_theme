// スタッフページ専用の処理を記述します。

document.addEventListener('DOMContentLoaded', () => {
    const cards = document.querySelectorAll('.card');
    const isSP = () => window.innerWidth <= 699;

    cards.forEach((card) => {
        const mainImg = card.querySelector('#mainimg img');
        const thumbnails = card.querySelectorAll('.thumbnails .thumb');
        if (thumbnails.length === 0) return;
        let currentIndex = 0;
        let autoSlideInterval = null;

        function changeImage(index) {
            currentIndex = index;
            const targetThumb = thumbnails[currentIndex];
            if (mainImg) {
                mainImg.src = targetThumb.src;
            }
            thumbnails.forEach((thumb, i) => {
                thumb.classList.toggle('active', i === currentIndex);
            });
        }

        function startAutoSlide() {
            if (!autoSlideInterval && isSP()) {
                autoSlideInterval = setInterval(() => {
                    const nextIndex = (currentIndex + 1) % thumbnails.length;
                    changeImage(nextIndex);
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

        changeImage(0);
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