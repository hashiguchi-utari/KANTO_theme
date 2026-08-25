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
    message.style.setProperty('--group-message-delay', `${index * 0.25}s`);
  });

  // 初期状態を反映した次の描画タイミングでアニメーションを開始します。
  requestAnimationFrame(() => {
    requestAnimationFrame(() => {
      messages.forEach((message) => {
        message.classList.add('is-fade-up-visible');
      });
    });
  });
});
