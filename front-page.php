<?php get_header(); ?>

<main>
  <div class="front_container">
    <section class="front_mv">
      <img src="<?php echo esc_url(get_theme_file_uri('/img/front_page/movie-image.webp')); ?>" alt="TOP画像">
      <!-- （↓）動画に差し替える場合は以下を利用 -->


      <!-- <video
      src="<?php echo esc_url(get_theme_file_uri('/img/front_page/top-mv.mp4')); ?>"
      autoplay
      muted
      loop
      playsinline>
    </video> -->


    </section>


    <section>
      <div class="front-kanto">

        <img src="<?php echo esc_url(get_theme_file_uri('/img/front_page/vector1.png')); ?>" alt="背景ベクター1" class="front_pc_only">
        <img src="<?php echo esc_url(get_theme_file_uri('/img/front_page/vector3.svg')); ?>" alt="背景ベクター3" class="front_sp_only front-kanto-top">
        <div class="front-howto">
          <h3 class="front_h3">KANTOとは</h3>
          <p>訪問看護ステーションKANTOは、ご利用者様やご家族が住み慣れた地域で安心して生活を続けられるよう、一人ひとりに寄り添った看護を提供する訪問看護ステーションです。
          </p>
        </div>

        <img src="<?php echo esc_url(get_theme_file_uri('/img/front_page/k1.webp')); ?>" alt="画像1" class="front_img1">
        <img src="<?php echo esc_url(get_theme_file_uri('/img/front_page/k2.webp')); ?>" alt="画像2" class="front_img2">
        <img src="<?php echo esc_url(get_theme_file_uri('/img/front_page/k3.webp')); ?>" alt="画像3" class="front_img3">
        <img src="<?php echo esc_url(get_theme_file_uri('/img/front_page/k4.webp')); ?>" alt="画像4" class="front_img4">

      </div>
    </section>

    <section>
      <div>
        <h1 class="front_h1 float-text mplus-title">「自分らしい」を<br>
          一緒に育てる訪問看護</h1>
        <div class="front_navi">
          <div>
            <a href="<?php echo esc_url(home_url('/process/')); ?>"><img src="<?php echo esc_url(get_theme_file_uri('/img/front_page/navi1.webp')); ?>" alt="利用までの流れ" class="front_circle">
              <p class="front_navi_p mplus-title">ご利用まで<br class="front_sp_only">の流れ</p>
            </a>
          </div>
          <div>
            <a href="<?php echo esc_url(home_url('/service/')); ?>"><img src="<?php echo esc_url(get_theme_file_uri('/img/front_page/navi2.webp')); ?>" alt="利用までの流れ" class="front_circle">
              <p class="front_navi_p mplus-title">サービス<br class="front_sp_only">内容</p>
            </a>
          </div>
          <div>
            <a href="<?php echo esc_url(home_url('/group/')); ?>"><img src="<?php echo esc_url(get_theme_file_uri('/img/front_page/navi3.webp')); ?>" alt="利用までの流れ" class="front_circle">
              <p class="front_navi_p mplus-title">グループ<br class="front_sp_only">紹介</p>
            </a>
          </div>
        </div>
      </div>
    </section>

    <section class="front-news">

      <img src="<?php echo esc_url(get_theme_file_uri('/img/front_page/vector2.png')); ?>" alt="背景ベクター2" class="front_pc_only">
      <img src="<?php echo esc_url(get_theme_file_uri('/img/front_page/vector4.png')); ?>" alt="背景ベクター4" class="front_sp_only">

      <div class="front-news-inner">

        <h2 class="front-news-title">お知らせ</h2>

        <div id="front-news-content">

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
            $pagination = paginate_links([
              'type'      => 'array',
              'mid_size'  => 1,
              'end_size'  => 1,
              'prev_text' => '←',
              'next_text' => '→',
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
          <a href="<?php echo esc_url(home_url('/news/')); ?>" class="front-news-link">
            → お知らせ一覧へ
          </a>
        </div>

      </div>

    </section>


  </div>
  <section class="insta">
    <div>
      <p class="front-insta">instagram</p>

      <a href="<?php echo esc_url(home_url('/')); ?>">
        <p class="front-kanto_to">訪問看護ステーションKANTO</p>
      </a>
      <?php echo do_shortcode('[instagram-feed feed=1]'); ?>
      <!-- インスタのfeed（変更部はここ）カント -->

      <a href="https://seta-gh.jp/" target="_blank" rel="noopener noreferrer" aria-label="Seta Group Home公式サイトへ">
        <p class="front-seta">障がい者グループホーム🍀セタ</p>
      </a>
      <?php echo do_shortcode('[instagram-feed feed=3]'); ?>
      <!-- インスタのfeed（変更部はここ）セタ -->

      <a href="https://utari.jp/" target="_blank" rel="noopener noreferrer" aria-label="就労継続支援UTARI公式サイトへ">
        <p class="front-utari">就労継続支援A型B型事業所<br class="front_sp_only">UTARI-ウタリ-</p>
      </a>
      <?php echo do_shortcode('[instagram-feed feed=2]'); ?>
      <!-- インスタのfeed（変更部はここ）ウタリ -->

    </div>
    <div>
      <img src="<?php echo esc_url(get_theme_file_uri('/img/front_page/k5.webp')); ?>" alt="画像5" class="front_img5 front_pc_only">
      <img src="<?php echo esc_url(get_theme_file_uri('/img/front_page/k6.webp')); ?>" alt="画像6" class="front_img6 front_pc_only">
      <img src="<?php echo esc_url(get_theme_file_uri('/img/front_page/k7.webp')); ?>" alt="画像7" class="front_img7 front_pc_only">
      <img src="<?php echo esc_url(get_theme_file_uri('/img/front_page/k8.webp')); ?>" alt="画像8" class="front_img8 front_pc_only">
    </div>

  </section>

</main>


<?php get_footer(); ?>