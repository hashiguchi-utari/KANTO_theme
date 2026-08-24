<?php get_header(); ?>

<!-- ここに本文を記載 -->
<main class="front_container">
  <section class="front_mv">
    <img src="<?php echo get_theme_file_uri('/img/front_page/movie-image.png'); ?>" alt="TOP動画部分画像で仮置き">
  </section>


  <section>
    <div class="front-kanto">

      <img src="<?php echo get_theme_file_uri('/img/front_page/vector1.png'); ?>" alt="背景ベクター">
      <div class="front-howto">
        <h3 class="h3">KANTOとは</h3>
        <p>訪問看護ステーションKANTOは、ご利用者様やご家族が住み慣れた地域で安心して生活を続けられるよう、一人ひとりに寄り添った看護を提供する訪問看護ステーションです。
        </p>
      </div>

      <img src="<?php echo get_theme_file_uri('/img/front_page/k1.png'); ?>" alt="画像1" class="front_img1">
      <img src="<?php echo get_theme_file_uri('/img/front_page/k2.png'); ?>" alt="画像2" class="front_img2">
      <img src="<?php echo get_theme_file_uri('/img/front_page/k3.png'); ?>" alt="画像3" class="front_img3">
      <img src="<?php echo get_theme_file_uri('/img/front_page/k4.png'); ?>" alt="画像4" class="front_img4">

    </div>
  </section>

  <section>
    <div>
      <h1 class="h1">「自分らしい」を<br>
        一緒に育てる訪問看護</h1>
      <div class="front_navi">
        <div>
          <a href="<?php echo esc_url(home_url('/process/')); ?>"><img src="<?php echo get_theme_file_uri('/img/front_page/navi1.png'); ?>" alt="利用までの流れ" class="front_circle">
            <span>利用までの流れ</span>
          </a>
        </div>
        <div>
          <a href="<?php echo esc_url(home_url('/service/')); ?>"><img src="<?php echo get_theme_file_uri('/img/front_page/navi2.png'); ?>" alt="利用までの流れ" class="front_circle">
            <span>サービス内容</span>
          </a>
        </div>
        <div>
          <a href="<?php echo esc_url(home_url('/group/')); ?>"><img src="<?php echo get_theme_file_uri('/img/front_page/navi3.png'); ?>" alt="利用までの流れ" class="front_circle">
            <span>グループ紹介</span>
          </a>
        </div>
      </div>
  </section>

  <section class="front-news">

    <img src="<?php echo get_theme_file_uri('/img/front_page/vector2.png'); ?>" alt="背景ベクター2">

    <div class="front-news-inner">
      <h2 class="front-news-title">お知らせ</h2>

      <?php if (have_posts()) : ?>

        <ul class="front-news-list">

          <?php while (have_posts()) : the_post(); ?>

            <li class="front-news-item">

              <a href="<?php the_permalink(); ?>">

                <time datetime="<?php echo get_the_date('Y-m-d'); ?>">
                  <?php echo get_the_date('Y.m.d'); ?>
                </time>

                <span class="front-news-text">
                  <?php the_title(); ?>
                </span>

              </a>

            </li>

          <?php endwhile; ?>

        </ul>

        <?php
        the_posts_pagination([
          'mid_size'  => 2,
          'prev_text' => '←',
          'next_text' => '→',
        ]);
        ?>

      <?php else : ?>

        <p>現在、お知らせはありません。</p>

      <?php endif; ?>

    </div>

  </section>

  <section class="insta">
  <p class="front-insta">instagram</p>
    
    訪問看護ステーションKANTO

    障がい者グループホームぐ🍀セタ

    就労継続支援A型B型事業所UTARI-ウタリ-
  </section>

</main>
<!-- ここまで本文を記載 -->

<?php get_footer(); ?>