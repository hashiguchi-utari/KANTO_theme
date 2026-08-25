document.addEventListener("DOMContentLoaded", () => {
  const fadeElements = document.querySelectorAll(".fade_up_trigger");
  
  const processObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        // 画面内に入ったらクラスを付与（フェードアップと斜め線伸長が同時にはじまる）
        entry.target.classList.add("is_active");
      }
    });
  }, {
    root: null,
    rootMargin: "0px 0px -15% 0px", // 画面下部から15%入った位置で開始
    threshold: 0.1
  });

  fadeElements.forEach(el => processObserver.observe(el));
});