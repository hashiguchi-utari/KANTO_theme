<?php get_header(); ?>

<main>
  <section>
    <div class="archive-top">
      <h2 class="archive_h2">お知らせ</h2>
    </div>
    <div class="archive-border"></div>



    <!-- ！！！！！！！！！！！ここに絞り込みのカテゴリーを置く -->
    <div class="archive-filter">

      <a
        href="#"
        class="archive-filter__link is-active"
        data-category="all">
        ALL
      </a>

      <?php
      $categories = get_categories([
        'hide_empty' => true,
      ]);

      foreach ($categories as $category) :
      ?>

        <a
          href="#"
          class="archive-filter__link"
          data-category="<?php echo esc_attr($category->slug); ?>">
          <?php echo esc_html($category->name); ?>
        </a>

      <?php endforeach; ?>

    </div>


  </section>

  <section>
  <div class="archive-list" id="archive-list">

    <?php if (have_posts()) : ?>

      <?php while (have_posts()) : the_post(); ?>

        <div class="archive-card">

          <a href="<?php the_permalink(); ?>" class="archive-card__image fade-up">

            <?php if (has_post_thumbnail()) : ?>

              <?php the_post_thumbnail('medium'); ?>

            <?php else : ?>

              <img
                src="<?php echo esc_url(get_stylesheet_directory_uri() . '/img/news/no-image.png'); ?>"
                alt="No image" class="no-image"
              >

            <?php endif; ?>

          </a>


          <div class="archive-card__body">

            <div class="archive-card__meta">
              <p>
                <?php echo get_the_date('Y.m.d'); ?>
                <span class="date_space"></span>
                <br class="front_sp_only">

                ||| カテゴリー・<?php the_category(', '); ?>
              </p>
            </div>


            <h2 class="archive-card__title">
              <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
              </a>
            </h2>


            <p class="archive-card__excerpt">
              <?php echo wp_trim_words(get_the_excerpt(), 50, '…'); ?>
            </p>


            <a
              href="<?php the_permalink(); ?>"
              class="archive-card__more"
            >
              <span>続きを読む</span>
              <span class="archive-card__arrow">→</span>
            </a>

          </div>

        </div>

      <?php endwhile; ?>


      <div class="archive-underborder"></div>


      <!-- ページネーション -->
      <?php
      $pagination = paginate_links([
        'type'      => 'array',
        'mid_size'  => 1,
        'end_size'  => 1,
        'prev_text' => '≪',
        'next_text' => '≫',
      ]);

      if ($pagination) :
      ?>

        <nav class="pagination" aria-label="ページネーション">

          <?php foreach ($pagination as $page) : ?>
            <?php echo $page; ?>
          <?php endforeach; ?>

        </nav>

      <?php endif; ?>

    <?php endif; ?>

  </div>
</section>


</main>

<script>
/* フェードアップ */
const fadeUpItems = document.querySelectorAll('.fade-up');

const observer = new IntersectionObserver((entries) => {

  entries.forEach((entry) => {

    if (entry.isIntersecting) {

      entry.target.classList.add('is-show');

      observer.unobserve(entry.target);

    }

  });

}, {
  threshold: 0.2
});


fadeUpItems.forEach((item) => {
  observer.observe(item);
});



/* カテゴリーの絞り込み機能 */
document.addEventListener('DOMContentLoaded', function() {

  const links =
    document.querySelectorAll('.archive-filter__link');

  const archiveList =
    document.querySelector('#archive-list');

  const pagination =
    document.querySelector('#archive-pagination');


  links.forEach(function(link) {

    link.addEventListener('click', function(event) {

      event.preventDefault();

      const category =
        this.dataset.category;


      // active切り替え
      links.forEach(function(item) {
        item.classList.remove('is-active');
      });

      this.classList.add('is-active');


      // ローディング
      archiveList.classList.add('is-loading');


      // Ajaxデータ
      const formData = new FormData();

      formData.append(
        'action',
        'archive_filter'
      );

      formData.append(
        'category',
        category
      );


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

</script>


<?php get_footer(); ?>