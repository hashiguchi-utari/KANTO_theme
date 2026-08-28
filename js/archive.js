/* カテゴリーの絞り込み機能 */
document.addEventListener('DOMContentLoaded', function() {

  const links = document.querySelectorAll('.archive-filter__link');
  const archiveList = document.querySelector('#archive-list');
  const pagination = document.querySelector('#archive-pagination');


  /*
   * 初回表示時のfade-up
   * ==========================================
   */
  const initialFadeItems =
    archiveList.querySelectorAll('.fade-up');

  requestAnimationFrame(function() {

    initialFadeItems.forEach(function(item) {
      item.classList.add('is-show');
    });

  });


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


        // 絞り込み中はページネーションを消す
        if (pagination) {
          pagination.style.display = 'none';
        }


        // ローディング終了
        archiveList.classList.remove('is-loading');


        // Ajax後のfade-up
        const fadeItems =
          archiveList.querySelectorAll('.fade-up');

        requestAnimationFrame(function() {

          fadeItems.forEach(function(item) {
            item.classList.add('is-show');
          });

        });

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