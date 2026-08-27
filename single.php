<?php get_header(); ?>

<main class="single">
  <section>
    <div class="single-top">
      <h2 class="single_h2">お知らせ</h2>
    </div>
    <div class="single-border"></div>
  </section>

  <section>

    <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>

        <article class="single-article">

          <!-- カテゴリー・日付 -->
          <div class="single-meta">

            <p class="single-date">
              <?php echo get_the_date('Y.m.d'); ?>
              <span class="date_space"></span><br class="front_sp_only">
              ||| カテゴリー・
              <?php the_category(', '); ?>
            </p>

          </div>


          <!-- タイトル -->
          <h1 class="single-title">
            <?php the_title(); ?>
          </h1>


          <!-- アイキャッチ -->
          <?php if (has_post_thumbnail()) : ?>

            <div class="single-thumbnail fade-up-image">
              <?php the_post_thumbnail('large'); ?>
            </div>

          <?php endif; ?>


          <!-- 本文 -->
          <div class="single-content">
            <?php the_content(); ?>
          </div>

        </article>

      <?php endwhile; ?>
      

      <div class="single-underborder"> </div>

      <div class="single_button">
        <a href="<?php echo esc_url(home_url('/news/')); ?>"><button class="button">一覧に戻る</button></a>
      </div>
    <?php endif; ?>
  </section>

</main>

<?php get_footer(); ?>




<script>
  /*フェードアップ*/
  const fadeUpImages = document.querySelectorAll('.fade-up-image');

  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {

      if (entry.isIntersecting) {
        entry.target.classList.add('is-show');

        // 1回だけアニメーション
        observer.unobserve(entry.target);
      }

    });
  }, {
    threshold: 0.2
  });

  fadeUpImages.forEach((image) => {
    observer.observe(image);
  });
</script>



<?php get_footer(); ?>