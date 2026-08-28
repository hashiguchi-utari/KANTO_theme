// スタッフページ専用の処理を記述します。

document.addEventListener('DOMContentLoaded', () => {
    const mainImg = document.querySelector('#mainimg img');
    const thumbnails = document.querySelectorAll('.thumbnails .thumb');

    thumbnails.forEach(thumb => {
        thumb.addEventListener('click', () => {
            mainImg.src = thumb.src;
        });
    });
});