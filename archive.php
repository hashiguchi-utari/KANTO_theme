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
        <?php
        // 20260828_橋口修正_お知らせ1件分の表示は共通ファイルから読み込みます。
        // 同じHTMLを複数箇所へ書かないため、表示内容の食い違いや修正漏れを防止できます。
        get_template_part('template-parts/archive-card');
        ?>
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
<?php
// 20260828_橋口修正_以前はこのファイル内とjs/archive.jsの両方に同じカテゴリ絞り込み処理があり、
// 1回のクリックで通信処理が複数回動く状態でした。このファイル内の重複処理を削除し、
// カテゴリ絞り込みとフェードアップの処理をjs/archive.jsだけで管理するようにしました。
get_footer();
?>
