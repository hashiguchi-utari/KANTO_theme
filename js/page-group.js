/**
 * グループ紹介ページのメッセージを順番にフェードアップ表示します。
 */
document.addEventListener('DOMContentLoaded', () => {
  const messages = document.querySelectorAll('.group-hero__message');

  if (!messages.length) {
    return;
  }

  messages.forEach((message, index) => {
    message.classList.add('is-fade-up-ready');
    // 2つ目のメッセージを少し遅らせ、順番にじわっと表示します。
    message.style.setProperty('--group-message-delay', `${index * 0.45}s`);
  });

  // 初期状態をブラウザに一度描画させてから、フェードアップを開始します。
  // 読み込みが速い環境でも開始前と開始後が同時に描画されないよう少し間を空けます。
  void messages[0].offsetHeight;
  window.setTimeout(() => {
    messages.forEach((message) => {
      message.classList.add('is-fade-up-visible');
    });
  }, 250);
});

/**
 * SP版のSeta・UTARI紹介画像を、1枚ずつ自動で切り替えます。
 * CSSが読み込めない場合は元の縦並びが残るよう、JavaScript有効時だけクラスを付けます。
 */
document.addEventListener('DOMContentLoaded', () => {
  const galleries = document.querySelectorAll(
    '.group-service__gallery--seta, .group-service__gallery--utari'
  );
  const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  galleries.forEach((gallery) => {
    const slides = Array.from(gallery.children);

    if (slides.length < 2) {
      return;
    }

    let currentIndex = 0;
    gallery.classList.add('is-slideshow');
    slides[0].classList.add('is-active');

    if (reduceMotion) {
      return;
    }

    window.setInterval(() => {
      slides[currentIndex].classList.remove('is-active');
      currentIndex = (currentIndex + 1) % slides.length;
      slides[currentIndex].classList.add('is-active');
    }, 3500);
  });
});
