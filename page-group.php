<?php

/**
 * グループ紹介ページのテンプレート。
 *
 * @package Kanto
 */

get_header();
?>

<main class="group-page">
	<!-- グループ3事業を紹介するメインビジュアル -->
	<section class="group-hero" aria-labelledby="group-hero-title">
		<div class="group-hero__inner">
			<p class="group-hero__company">RITABELL</p>
			<p class="group-hero__message group-hero__message--left">いつも<br>あなたのそばに</p>
			<p class="group-hero__message group-hero__message--right">あなたの<br>笑顔が見たいから</p>
			<h1 id="group-hero-title" class="group-hero__title">グループ紹介</h1>

			<!-- PC版では三角形、SP版では縦一列に配置 -->
			<div class="group-hero__diagram">
				<!-- PC版の3事業を結ぶ二重線画像 -->
				<img class="group-hero__line group-hero__line--left-1" src="<?php echo esc_url(get_theme_file_uri('/img/Line 11.png')); ?>" alt="" aria-hidden="true">
				<img class="group-hero__line group-hero__line--left-2" src="<?php echo esc_url(get_theme_file_uri('/img/Line 13.png')); ?>" alt="" aria-hidden="true">
				<img class="group-hero__line group-hero__line--right-1" src="<?php echo esc_url(get_theme_file_uri('/img/Line 14.png')); ?>" alt="" aria-hidden="true">
				<img class="group-hero__line group-hero__line--right-2" src="<?php echo esc_url(get_theme_file_uri('/img/Line 15.png')); ?>" alt="" aria-hidden="true">
				<img class="group-hero__line group-hero__line--bottom" src="<?php echo esc_url(get_theme_file_uri('/img/Lines.png')); ?>" alt="" aria-hidden="true">

				<figure class="group-hero__item group-hero__item--kanto">
					<picture>
						<source media="(max-width: 699.98px)" srcset="<?php echo esc_url(get_theme_file_uri('/img/group_SPkanto.png')); ?>">
						<img src="<?php echo esc_url(get_theme_file_uri('/img/group_FV_kanto.png')); ?>" alt="訪問看護ステーションKANTO">
					</picture>
					<figcaption>KANTO</figcaption>
				</figure>

				<figure class="group-hero__item group-hero__item--seta">
					<picture>
						<source media="(max-width: 699.98px)" srcset="<?php echo esc_url(get_theme_file_uri('/img/group_SPseta.png')); ?>">
						<img src="<?php echo esc_url(get_theme_file_uri('/img/group_FV_seta.png')); ?>" alt="障がい者グループホームSeta">
					</picture>
					<figcaption>SETA</figcaption>
				</figure>

				<figure class="group-hero__item group-hero__item--utari">
					<picture>
						<source media="(max-width: 699.98px)" srcset="<?php echo esc_url(get_theme_file_uri('/img/group_SPutari.png')); ?>">
						<img src="<?php echo esc_url(get_theme_file_uri('/img/group_FV_utari.png')); ?>" alt="就労継続支援UTARI">
					</picture>
					<figcaption>UTARI</figcaption>
				</figure>
			</div>
		</div>
	</section>

	<!-- SetaとUTARIのサービス紹介 -->
	<div class="group-services">
		<section class="group-service group-service--seta" aria-labelledby="group-seta-title">
			<h2 id="group-seta-title" class="group-service__title">障がい者グループホーム【セタ】</h2>
			<div class="group-service__gallery group-service__gallery--seta">
				<figure><img src="<?php echo esc_url(get_theme_file_uri('/img/group_seta_img1.png')); ?>" alt="稲穂のグループホーム外観">
					<figcaption>稲穂</figcaption>
				</figure>
				<figure><img src="<?php echo esc_url(get_theme_file_uri('/img/group_seta_img2.png')); ?>" alt="手稲本町のグループホーム外観">
					<figcaption>手稲本町</figcaption>
				</figure>
				<figure><img src="<?php echo esc_url(get_theme_file_uri('/img/group_seta_img3.png')); ?>" alt="前田のグループホーム外観">
					<figcaption>前田</figcaption>
				</figure>
				<figure><img src="<?php echo esc_url(get_theme_file_uri('/img/group_seta_img4.png')); ?>" alt="稲穂のグループホーム外観">
					<figcaption>稲穂</figcaption>
				</figure>
			</div>
			<!-- キャッチコピーは黄色いセクション全体の中央に配置 -->
			<h3 class="group-service__catch">「安心と繋がりがある暮らし」</h3>
			<div class="group-service__content">
				<div class="group-service__copy">
					<p>男性専用のグループホーム・女性専用のグループホーム、男性女性可能のアパートタイプ、男性シェアハウスまで幅広く・・・<br>あなたらしさを大切にした快適な生活を送りませんか？</p>
				</div>
				<a class="group-service__link" href="https://seta-gh.jp/" target="_blank" rel="noopener noreferrer">HPへGO！</a>
			</div>
		</section>

		<section class="group-service group-service--utari" aria-labelledby="group-utari-title">
			<h2 id="group-utari-title" class="group-service__title">就労継続支援A型.B型事業所UTARI-ウタリ-</h2>
			<div class="group-service__gallery group-service__gallery--utari">
				<img src="<?php echo esc_url(get_theme_file_uri('/img/group_utari_img1.png')); ?>" alt="パソコンを使ったオンライン作業">
				<img src="<?php echo esc_url(get_theme_file_uri('/img/group_utari_img2.png')); ?>" alt="明るい共同作業スペース">
				<img src="<?php echo esc_url(get_theme_file_uri('/img/group_utari_img3.png')); ?>" alt="デザイン制作作業">
			</div>
			<!-- キャッチコピーは緑色のセクション全体の中央に配置 -->
			<h3 class="group-service__catch">『ひとりじゃない』</h3>
			<div class="group-service__content">
				<div class="group-service__copy">
					<p>仲間と共に学び、働き、時には支え合いながら自分のペースで成長できる場を提供します。 WEB制作や動画編集といった仕事を通じて、自分のペースで「できること」を少しずつ広げ、社会とのつながりを実感できる場を目指しています。</p>
				</div>
				<a class="group-service__link" href="https://utari.jp/" target="_blank" rel="noopener noreferrer">HPへGO！</a>
			</div>
		</section>
	</div>
</main>

<?php get_footer(); ?>
