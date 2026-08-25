<?php get_header(); ?>

<main>
  <section>
    <div class="archive-top">
      <h2 class="archive_h2">お知らせ</h2>
    </div>
    <div class="archive-border"></div>
  </section>

  <section>
    <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>

        <div class="archive-card">

          <a href="<?php the_permalink(); ?>" class="archive-card__image fade-up">
            <?php if (has_post_thumbnail()) : ?>
              <?php the_post_thumbnail('medium'); ?>
            <?php endif; ?>
          </a>

          <div class="archive-card__body">

            <div class="archive-card__meta">
              <span><?php echo get_the_date('Y.m.d'); ?></span>
              <span>||| カテゴリー・<?php the_category(', '); ?></span>
            </div>

            <h2 class="archive-card__title">
              <?php the_title(); ?>
            </h2>

            <p class="archive-card__excerpt">
              <?php echo wp_trim_words(get_the_excerpt(), 50, '…'); ?>
            </p>

            <a
              href="<?php the_permalink(); ?>"
              class="archive-card__more">
              <span>続きを読む</span>
              <span class="archive-card__arrow">→</span>
            </a>

          </div>

        </div>


      <?php endwhile; ?>

      <div class="archive-underborder"></div>


      <!--ページネーション-->

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

  </section>


</main>

<script>
  /*フェードアップ*/
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
</script>



<?php get_footer(); ?>