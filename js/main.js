/*ハンバーガーメニューの開閉*/
document.addEventListener("DOMContentLoaded", () => {
  const headerMenu = document.querySelector(".header-menu");
  const hamburger = document.querySelector(".hamburger");
  const navItems = document.querySelector(".nav-items");

  if (headerMenu && hamburger && navItems) {
    headerMenu.addEventListener("click", (e) => {
      e.preventDefault();
      e.stopPropagation();
      hamburger.classList.toggle("is-open");
      navItems.classList.toggle("is-open");
    });
    const navLinks = navItems.querySelectorAll("a");
    navLinks.forEach((link) => {
      link.addEventListener("click", () => {
        hamburger.classList.remove("is-open");
        navItems.classList.remove("is-open");
      });
    });

    document.addEventListener("click", (e) => {
      if (navItems.classList.contains("is-open")) {
        if (!navItems.contains(e.target) && !headerMenu.contains(e.target)) {
          hamburger.classList.remove("is-open");
          navItems.classList.remove("is-open");
        }
      }
    });
  }
});

// aタグをドラッグすると他の操作ができなくなるバグの対策コードです。これを消すとheaderのロゴやリンクはこちらのボタンでマウスをドラッグすると操作ができなくなるバグが起きます。
document.addEventListener("dragstart", (event) => {
  if (event.target.closest("a")) {
    event.preventDefault();
  }
});
