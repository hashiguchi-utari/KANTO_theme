/*浮かぶようなアニメーション*/
const floatTexts = document.querySelectorAll(".float-text");

const observer = new IntersectionObserver(
  (entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add("is-show");
      }
    });
  },
  {
    threshold: 0.2,
  },
);

floatTexts.forEach((text) => {
  observer.observe(text);
});

/* お知らせページのページネーションをページ更新せずに更新 */
document.addEventListener("DOMContentLoaded", () => {
  const newsContent = document.querySelector("#front-news-content");

  if (!newsContent) return;

  // お知らせを取得して表示する関数
  const loadNews = async (url) => {
    newsContent.classList.add("is-loading");

    try {
      const response = await fetch(url);

      if (!response.ok) {
        throw new Error("通信に失敗しました");
      }

      const html = await response.text();

      const parser = new DOMParser();
      const doc = parser.parseFromString(html, "text/html");

      const newContent = doc.querySelector("#front-news-content");

      if (!newContent) {
        throw new Error("お知らせ部分が見つかりません");
      }

      newsContent.innerHTML = newContent.innerHTML;
    } catch (error) {
      console.error(error);
    } finally {
      newsContent.classList.remove("is-loading");
    }
  };

  // ページネーションをクリック
  newsContent.addEventListener("click", async (event) => {
    const link = event.target.closest(".pagination a");

    if (!link) return;

    event.preventDefault();

    const url = link.href;

    // Ajaxでページを取得
    await loadNews(url);

    // ブラウザの履歴に追加
    window.history.pushState({}, "", url);
  });

  // ブラウザの「戻る」「進む」
  window.addEventListener("popstate", () => {
    loadNews(window.location.href);
  });
});

/*画像1－4の動的スクロールアニメ*/
document.addEventListener("DOMContentLoaded", () => {
  const images = document.querySelectorAll(
    ".front-kanto .front_img1, " +
      ".front-kanto .front_img2, " +
      ".front-kanto .front_img3, " +
      ".front-kanto .front_img4",
  );

  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("is-show");

          // 1回発火したら監視終了
          observer.unobserve(entry.target);
        }
      });
    },
    {
      // 画像が50%見えたら発火
      threshold: 0.5,
    },
  );

  images.forEach((image) => {
    observer.observe(image);
  });
});
