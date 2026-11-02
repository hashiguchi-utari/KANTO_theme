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

/* header・footerのお問い合わせから、準備中ポップアップを開閉します。 */
document.addEventListener("DOMContentLoaded", () => {
  const modal = document.querySelector("#contact-preparing-modal");
  const triggers = document.querySelectorAll(".js-contact-preparing");

  if (!modal || triggers.length === 0) {
    return;
  }

  const closeButton = modal.querySelector("[data-contact-modal-close]");
  let lastFocusedElement = null;

  const closeModal = () => {
    modal.hidden = true;
    document.body.classList.remove("is-contact-modal-open");

    if (lastFocusedElement) {
      lastFocusedElement.focus();
    }
  };

  const openModal = (trigger) => {
    lastFocusedElement = trigger;
    modal.hidden = false;
    document.body.classList.add("is-contact-modal-open");

    if (closeButton) {
      closeButton.focus();
    }
  };

  triggers.forEach((trigger) => {
    trigger.addEventListener("click", (event) => {
      event.preventDefault();
      openModal(trigger);
    });

    // リンクをボタンとして使うため、Spaceキーでも開けるようにします。
    trigger.addEventListener("keydown", (event) => {
      if (event.key === " ") {
        event.preventDefault();
        openModal(trigger);
      }
    });
  });

  if (closeButton) {
    closeButton.addEventListener("click", closeModal);
  }

  // ポップアップの外側を押した場合も閉じます。
  modal.addEventListener("click", (event) => {
    if (event.target === modal) {
      closeModal();
    }
  });

  // キーボード利用者はEscキーでも元のページへ戻れます。
  document.addEventListener("keydown", (event) => {
    if (event.key === "Escape" && !modal.hidden) {
      closeModal();
    }

    // 開いている間はフォーカスが背後のページへ移動しないようにします。
    if (event.key === "Tab" && !modal.hidden && closeButton) {
      event.preventDefault();
      closeButton.focus();
    }
  });
});
