<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>訪問看護ステーションKANTO | 札幌市手稲区</title>
  <link rel="icon" href="<?php echo esc_url(get_theme_file_uri('img/header/favicon.ico')); ?>">
  <?php
  /**
   * 20261014_橋口修正_Google Fontsの直接記述を削除し、読み込み管理をfunctions.phpへ移しました。
   * wp_head()を通じて、WordPressに登録したGoogle Fontsや各種CSSなどを出力します。
   */
  // この処理内で、登録済みのフォント関数の実行とCSSのリンク出力が行われます。
  wp_head();
  ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>

  <header id="header">
    <div class="header-contents">
      <h1 class="header-logo"><a href="<?php echo esc_url(home_url()); ?>"><img src="<?php echo esc_url(get_theme_file_uri('img/header/kanto-logo-4.png')); ?>" alt="ロゴ"></a></h1>
      <nav class="header-navi">
        <div class="header-menu">
          <div class="menu">
            <h2>menu</h2>
          </div>
          <button class="hamburger">
            <span></span>
            <span></span>
            <span></span>
          </button>
        </div>

        <ul class="nav-items">
          <li class="nav-item"><a href="<?php echo home_url('/service/'); ?>">サービス内容</a></li>
          <li class="nav-item"><a href="<?php echo home_url('/process/'); ?>">ご利用までの流れ</a></li>
          <li class="nav-item"><a href="<?php echo home_url('/staff/'); ?>">スタッフ紹介</a></li>
          <li class="nav-item"><a href="<?php echo home_url('/group/'); ?>">グループ紹介</a></li>
          <li class="nav-item"><a href="<?php echo home_url('/news/'); ?>">お知らせ</a></li>
          <li class="nav-item"><a href="<?php echo home_url('/company/'); ?>">会社概要</a></li>
          <li class="nav-item header-inq"><a href="<?php echo home_url('/inquery/'); ?>">お問い合わせ</a></li>
        </ul>
      </nav>
    </div>
  </header>