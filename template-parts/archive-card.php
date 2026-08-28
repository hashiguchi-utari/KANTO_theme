<?php

/**
 * 20260828_橋口修正_記事カードのHTMLが通常表示用とカテゴリ絞り込み用の2か所に書かれていたため、
 * このファイルへ1つにまとめました。画像や文章の表示方法を今後変更する場合は、
 * このファイルだけを修正すれば、通常表示とカテゴリ絞り込み後の両方へ同じ内容が反映されます。
 *
 * @package KANTO
 */

if (! defined('ABSPATH')) {
	exit;
}
?>

<div class="archive-card">
	<a href="<?php the_permalink(); ?>" class="archive-card__image fade-up">
		<?php if (has_post_thumbnail()) : ?>
			<?php the_post_thumbnail('medium'); ?>
		<?php else : ?>
			<?php
			// 20260828_橋口修正_アイキャッチ画像が登録されていない記事は空白にせず、
			// 共通の「画像なし」画像を表示します。共通テンプレート内に置くことで、
			// ページを開いた直後とカテゴリを選択した後のどちらでも同じ画像が表示されます。
			?>
			<img
				src="<?php echo esc_url(get_theme_file_uri('/img/news/no-image.png')); ?>"
				alt="No image"
				class="no-image"
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

		<a href="<?php the_permalink(); ?>" class="archive-card__more">
			<span>続きを読む</span>
			<span class="archive-card__arrow">→</span>
		</a>
	</div>
</div>
