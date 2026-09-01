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
