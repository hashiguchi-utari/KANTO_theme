<footer class="site-footer">
	<div class="site-footer__inner">
		<!-- TOPページとお問い合わせページへ移動するフッターナビゲーション -->
		<nav class="site-footer__nav" aria-label="フッターナビゲーション">
			<a class="site-footer__nav-link" href="<?php echo esc_url(home_url('/')); ?>">TOP</a>
			<a class="site-footer__nav-link" href="<?php echo esc_url(home_url('/inquiry/')); ?>">
				<span class="site-footer__nav-label--pc">お問い合わせはこちら</span>
				<span class="site-footer__nav-label--sp">お問い合わせ</span>
			</a>
		</nav>

		<!-- PC版でTOPボタンの役割を案内する吹き出し画像 -->
		<div class="site-footer__speech">
			<img
				src="<?php echo esc_url(get_theme_file_uri('/img/footer吹き出し.png')); ?>"
				alt=""
				aria-hidden="true">
		</div>

		<!-- PC版とSP版で表示を切り替える人物画像 -->
		<img
			class="site-footer__character site-footer__character--pc"
			src="<?php echo esc_url(get_theme_file_uri('/img/cowgirl.png')); ?>"
			alt=""
			aria-hidden="true">
		<img
			class="site-footer__character site-footer__character--sp"
			src="<?php echo esc_url(get_theme_file_uri('/img/Running_Nurse.png')); ?>"
			alt=""
			aria-hidden="true">

		<!-- KANTO・Seta・UTARIのロゴと事業所情報 -->
		<div class="site-footer__groups">
			<!-- KANTOのロゴはこのサイトのTOPページへ移動 -->
			<section class="site-footer__group site-footer__group--kanto" aria-label="訪問看護ステーションKANTO">
				<a href="<?php echo esc_url(home_url('/')); ?>" aria-label="訪問看護ステーションKANTO トップページへ">
					<img
						class="site-footer__logo site-footer__logo--kanto"
						src="<?php echo esc_url(get_theme_file_uri('/img/kanto_logo 4.png')); ?>"
						alt="訪問看護ステーション KANTO">
				</a>
				<address class="site-footer__address">
					<p>北海道札幌市手稲区星置1条3丁目3−12</p>
					<p>リュウジュビル2F</p>
					<p class="site-footer__address-phone">011-</p>
				</address>
			</section>

			<!-- Setaのロゴは外部公式サイトを別タブで表示 -->
			<section class="site-footer__group site-footer__group--seta" aria-label="Seta Group Home">
				<a href="https://seta-gh.jp/" target="_blank" rel="noopener noreferrer" aria-label="Seta Group Home公式サイトへ（新しいタブで開きます）">
					<img
						class="site-footer__logo site-footer__logo--seta"
						src="<?php echo esc_url(get_theme_file_uri('/img/seta_logo 2.png')); ?>"
						alt="Seta Group Home">
				</a>
				<address class="site-footer__address site-footer__address--pc">
					<p>本社：札幌市手稲区稲穂4条6丁目4-12</p>
				</address>
			</section>

			<!-- UTARIのロゴは外部公式サイトを別タブで表示 -->
			<section class="site-footer__group site-footer__group--utari" aria-label="就労継続支援UTARI">
				<a href="https://utari.jp/" target="_blank" rel="noopener noreferrer" aria-label="就労継続支援UTARI公式サイトへ（新しいタブで開きます）">
					<img
						class="site-footer__logo site-footer__logo--utari"
						src="<?php echo esc_url(get_theme_file_uri('/img/utari_logo 2.png')); ?>"
						alt="就労継続支援 UTARI">
				</a>
				<address class="site-footer__address site-footer__address--pc">
					<p>札幌市手稲区星置1条3丁目3-10　長作ビル２階</p>
				</address>
			</section>
		</div>

		<!-- 年号はWordPressの設定に合わせて自動表示 -->
		<p class="site-footer__copyright">
			<small><?php echo esc_html(wp_date('Y')); ?>　株式会社リタベル　 All Right Reserved</small>
		</p>
	</div>
</footer>

<?php wp_footer(); ?>
</body>

</html>
