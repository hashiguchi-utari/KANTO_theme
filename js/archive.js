/* カテゴリーの絞り込み機能 */
document.addEventListener('DOMContentLoaded', function() {

  const links = document.querySelectorAll('.archive-filter__link');
  const archiveList = document.querySelector('#archive-list');

  if (!archiveList) {
    return;
  }


  /*
   * 20260828_橋口修正_ページを開いた直後に全画像を表示するのではなく、スクロールして
   * 画像の20％以上が画面内へ入った時だけis-showを追加します。CSS側の動きと組み合わせて、
   * 画像が下から上がりながら徐々に表示されるフェードアップになります。
   * ==========================================
   */
  function observeFadeUpItems(items) {

    // 20260828_橋口修正_端末で「動きを減らす」が設定されている場合や、スクロール検知に
    // 対応していない古いブラウザでは画像が非表示のままにならないよう、すぐに表示します。
    const shouldSkipAnimation =
      window.matchMedia('(prefers-reduced-motion: reduce)').matches ||
      !('IntersectionObserver' in window);

    if (shouldSkipAnimation) {
      items.forEach(function(item) {
        item.classList.add('is-show');
      });
      return;
    }

    const fadeObserver = new IntersectionObserver(function(entries, observer) {

      entries.forEach(function(entry) {

        if (entry.isIntersecting) {
          entry.target.classList.add('is-show');
          observer.unobserve(entry.target);
        }

      });

    }, {
      threshold: 0.2
    });

    items.forEach(function(item) {
      fadeObserver.observe(item);
    });

  }

  // 20260828_橋口修正_ページを開いた時に表示されている記事画像を、スクロール検知の対象へ登録します。
  observeFadeUpItems(
    archiveList.querySelectorAll('.fade-up')
  );


  /*
   * カテゴリー絞り込み
   * ==========================================
   */
  links.forEach(function(link) {

    link.addEventListener('click', function(event) {

      event.preventDefault();

      const category = this.dataset.category;


      // active切り替え
      links.forEach(function(item) {
        item.classList.remove('is-active');
      });

      this.classList.add('is-active');


      // ローディング
      archiveList.classList.add('is-loading');


      // Ajaxデータ
      const formData = new FormData();

      formData.append('action', 'archive_filter');
      formData.append('category', category);


      // WordPressへ送信
      fetch(archiveAjax.ajaxurl, {
        method: 'POST',
        body: formData
      })

      .then(function(response) {

        if (!response.ok) {
          throw new Error('Ajax error');
        }

        return response.text();

      })

      .then(function(html) {

        // 記事一覧を入れ替える
        archiveList.innerHTML = html;


        // ローディング終了
        archiveList.classList.remove('is-loading');


        // 20260828_橋口修正_カテゴリを選択すると記事HTMLが新しく入れ替わるため、入れ替え後の
        // 画像も改めてスクロール検知へ登録し、初期表示と同じフェードアップを適用します。
        const fadeItems =
          archiveList.querySelectorAll('.fade-up');

        observeFadeUpItems(fadeItems);

      })

      .catch(function(error) {

        console.error(
          'カテゴリー絞り込みエラー:',
          error
        );

        archiveList.classList.remove('is-loading');

      });

    });

  });

});
