document.addEventListener("DOMContentLoaded", () => {
  // 1. 大見出し ＆ サークル用の検知（少し早めにパッと出現させて線を伸ばす）
  const circleElements = document.querySelectorAll(".fade_up_trigger, .fade_up_trigger_circle");
  const circleObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add("is_active");
      }
    });
  }, {
    root: null,
    rootMargin: "0px 0px -1% 0px", // 画面下部から1%でもサークル圏内に入ったら開始
    threshold: 0.1
  });
  circleElements.forEach(el => circleObserver.observe(el));

  // 2. 隣の文章（テキスト群）用の検知【調整】
  const textElements = document.querySelectorAll(".fade_up_trigger_text");
  const textObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add("is_active");
      }
    });
  }, {
    root: null,
    /* 【目視フェードアップ設定】 */
    /* 画面下部から25%（ブラウザの約1/4の高さ）で上にスクロールされる */
    /* テキストブロック全体ディスプレイ上に入ったタイミングを感知してフェードアップ */
    rootMargin: "0px 0px -25% 0px", 
    threshold: 0.2 // 要素がしっかり画面内に入り込んでいることを保証
  });
  textElements.forEach(el => textObserver.observe(el));
});