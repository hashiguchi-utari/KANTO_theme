<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo bloginfo('name'); ?></title>
	<link rel="icon" href="<?php echo esc_url(get_theme_file_uri('img/favicon.ico')); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<header id="header">
		<h1 class="header-logo"><a href="<?php echo esc_url(home_url()); ?>"><img src="<?php echo esc_url(get_theme_file_uri('img/kanto_logo.png')); ?>" alt="ロゴ"></a></h1>
		<nav class="header-navi">
			<div class="header-menu">
				<button class="hamburger">
					<span></span>
					<span></span>
					<span></span>
				</button>
				<div class="menu">
					<h2>menu</h1>
				</div>
			</div>

			<ul class="nav-items">
				<li class="nav-item"><a href="<?php echo home_url('/service/'); ?>">サービス内容</a></li>
				<li class="nav-item"><a href="<?php echo home_url('/process/'); ?>">利用までの流れ</a></li>
				<li class="nav-item"><a href="<?php echo home_url('/staff/'); ?>">スタッフ紹介</a></li>
				<li class="nav-item"><a href="<?php echo home_url('/group/'); ?>">グループ紹介</a></li>
				<li class="nav-item header-inq"><a href="<?php echo home_url('/inquery/'); ?>">お問い合わせ</a></li>
			</ul>
		</nav>
	</header>