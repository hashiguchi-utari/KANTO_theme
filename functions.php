<?php

/**
 * テーマで使用する機能と設定を定義します。
 *
 * @package KANTO
 */

if (! defined('ABSPATH')) {
	exit;
}

/**
 * WordPressテーマの基本機能を有効にします。
 */
function kanto_theme_setup()
{
	add_theme_support('title-tag');
	// 20260828_橋口修正_アイキャッチ画像の機能はテーマ設定時のこの1か所で有効になります。
	// お知らせ一覧付近にあった同じ設定は効果が重複するだけだったため削除しました。
	add_theme_support('post-thumbnails');
	add_theme_support('responsive-embeds');
	add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script'));

	register_nav_menus(
		array(
			'global-navigation' => 'グローバルナビゲーション',
			'footer-navigation' => 'フッターナビゲーション',
		)
	);
}
add_action('after_setup_theme', 'kanto_theme_setup');

/**
 * テーマ内にCSSファイルが存在するときだけ読み込みます。
 *
 * @param string   $handle        CSSを識別するための名前。
 * @param string   $relative_path テーマフォルダを基準にしたCSSファイルのパス。
 * @param string[] $dependencies  このCSSより先に読み込むCSSの識別名。
 * @return bool CSSを読み込んだ場合はtrue、ファイルがない場合はfalse。
 */
function kanto_enqueue_theme_style($handle, $relative_path, $dependencies = array())
{
	$file_path = get_theme_file_path($relative_path);

	if (! file_exists($file_path)) {
		return false;
	}

	wp_enqueue_style(
		$handle,
		get_theme_file_uri($relative_path),
		$dependencies,
		(string) filemtime($file_path)
	);

	return true;
}

/**
 * 全ページ共通CSSと、表示中のページに対応するCSSを読み込みます。
 */
function kanto_enqueue_styles()
{
	kanto_enqueue_theme_style('kanto-reset', '/css/reset.css');

	$main_dependencies = file_exists(get_theme_file_path('/css/reset.css'))
		? array('kanto-reset')
		: array();
	kanto_enqueue_theme_style('kanto-style', '/style.css', $main_dependencies);
	kanto_enqueue_theme_style('kanto-header', '/css/header.css', array('kanto-style'));
	kanto_enqueue_theme_style('kanto-footer', '/css/footer.css', array('kanto-style'));

	// 固定ページでは、スラッグに対応した css/page-{slug}.css を読み込みます。
	if (is_page()) {
		$page = get_queried_object();

		if ($page instanceof WP_Post && $page->post_name) {
			$slug = sanitize_title($page->post_name);
			kanto_enqueue_theme_style('kanto-page-' . $slug, '/css/page-' . $slug . '.css', array('kanto-style'));
		}
	}

	// WordPressの条件分岐に対応するCSSを、存在する場合だけ読み込みます。
	if (is_front_page()) {
		kanto_enqueue_theme_style('kanto-front-page', '/css/front-page.css', array('kanto-style'));
	} elseif (is_home()) {
		kanto_enqueue_theme_style('kanto-home', '/css/home.css', array('kanto-style'));
	} elseif (is_archive()) {
		kanto_enqueue_theme_style('kanto-archive', '/css/archive.css', array('kanto-style'));
	} elseif (is_single()) {
		kanto_enqueue_theme_style('kanto-single', '/css/single.css', array('kanto-style'));
	} elseif (is_search()) {
		kanto_enqueue_theme_style('kanto-search', '/css/search.css', array('kanto-style'));
	} elseif (is_404()) {
		kanto_enqueue_theme_style('kanto-404', '/css/404.css', array('kanto-style'));
	}
}
add_action('wp_enqueue_scripts', 'kanto_enqueue_styles');

/**
 * テーマ内にJavaScriptファイルが存在するときだけ読み込みます。
 * JavaScriptはページの表示を妨げないよう、body終了タグの直前で読み込みます。
 *
 * @param string   $handle        JavaScriptを識別するための名前。
 * @param string   $relative_path テーマフォルダを基準にしたJavaScriptファイルのパス。
 * @param string[] $dependencies  このJavaScriptより先に読み込むファイルの識別名。
 * @return bool JavaScriptを読み込んだ場合はtrue、ファイルがない場合はfalse。
 */
function kanto_enqueue_theme_script($handle, $relative_path, $dependencies = array())
{
	$file_path = get_theme_file_path($relative_path);

	if (! file_exists($file_path)) {
		return false;
	}

	wp_enqueue_script(
		$handle,
		get_theme_file_uri($relative_path),
		$dependencies,
		(string) filemtime($file_path),
		true
	);

	return true;
}

/**
 * 全ページ共通JavaScriptと、表示中のページに対応するJavaScriptを読み込みます。
 */
function kanto_enqueue_scripts()
{
	kanto_enqueue_theme_script('kanto-main', '/js/main.js');

	// 固定ページでは、スラッグに対応した js/page-{slug}.js を読み込みます。
	if (is_page()) {
		$page = get_queried_object();

		if ($page instanceof WP_Post && $page->post_name) {
			$slug = sanitize_title($page->post_name);
			kanto_enqueue_theme_script('kanto-page-' . $slug, '/js/page-' . $slug . '.js', array('kanto-main'));
		}
	}

	// WordPressの条件分岐に対応するJavaScriptを、存在する場合だけ読み込みます。
	if (is_front_page()) {
		kanto_enqueue_theme_script('kanto-front-page', '/js/front-page.js', array('kanto-main'));
	} elseif (is_home()) {
		kanto_enqueue_theme_script('kanto-home', '/js/home.js', array('kanto-main'));
	} elseif (is_archive()) {
		kanto_enqueue_theme_script('kanto-archive', '/js/archive.js', array('kanto-main'));

		// 20260828_橋口修正_archive.jsが複数回読み込まれると、カテゴリを1回選択しただけでも
		// 同じ通信が複数回実行されるため、読み込み場所をここだけに統一しました。
		// あわせて、カテゴリ絞り込みの通信先となるWordPressのURLをarchive.jsへ渡します。
		wp_localize_script(
			'kanto-archive',
			'archiveAjax',
			array(
				'ajaxurl' => admin_url('admin-ajax.php'),
			)
		);
	} elseif (is_single()) {
		kanto_enqueue_theme_script('kanto-single', '/js/single.js', array('kanto-main'));
	} elseif (is_search()) {
		kanto_enqueue_theme_script('kanto-search', '/js/search.js', array('kanto-main'));
	} elseif (is_404()) {
		kanto_enqueue_theme_script('kanto-404', '/js/404.js', array('kanto-main'));
	}
}
add_action('wp_enqueue_scripts', 'kanto_enqueue_scripts');


/**
 * 20260828_橋口修正_WordPressの通常投稿を「お知らせ」として扱い、一覧URLを/news/に設定します。
 * この設定を変更した場合は、管理画面の「パーマリンク設定」を保存し直す必要があります。
 */
function set_post_archive($args, $post_type)
{
	if ('post' == $post_type) {
		$args['rewrite'] = ['with_front' => false];
		$args['has_archive'] = 'news';
		$args['label'] = 'お知らせ';
	}
	return $args;
}
add_filter('register_post_type_args', 'set_post_archive', 10, 2);

/**
 * 20260828_橋口修正_選択されたカテゴリに該当するお知らせを取得し、
 * ページ全体を再読み込みせずに記事カード部分だけを返すAjax処理です。
 */
function archive_filter_ajax()
{
	// 20260828_橋口修正_画面で選択されたカテゴリを受け取ります。
	// カテゴリが送信されなかった場合は「ALL」と同じ扱いになるようallを使用します。
	$category = isset($_POST['category'])
		? sanitize_text_field($_POST['category'])
		: 'all';

	// 20260828_橋口修正_公開中のお知らせをすべて取得するための基本条件です。
	// カテゴリが選択されている場合は、この配列へカテゴリ条件を後から追加します。
	$args = array(
		'post_type'      => 'post',
		'post_status'    => 'publish',
		// 20260828_橋口修正_現在は該当記事を全件表示します。記事数が増えた場合は件数制限やページ分割が必要です。
		'posts_per_page' => -1,
	);

	// 20260828_橋口修正_ALL以外が選択された場合だけ、そのカテゴリの記事に絞り込みます。
	if ('all' !== $category) {
		$args['category_name'] = $category;
	}

	$query = new WP_Query($args);

	if ($query->have_posts()) {
		while ($query->have_posts()) {
			$query->the_post();

			// 20260828_橋口修正_カテゴリ選択後だけ代替画像が消えていた原因は、Ajax側に
			// 「画像がない場合」のHTMLがなかったためです。通常表示と同じ共通ファイルを読み込み、
			// 初期表示とカテゴリ選択後で必ず同じ記事カードが出力されるようにしました。
			get_template_part('template-parts/archive-card');
		}
	} else {
		// 20260828_橋口修正_選択したカテゴリに記事がない場合は、空白ではなく案内文を表示します。
		echo '<p class="archive-no-post">該当する記事がありません。</p>';
	}

	// 20260828_橋口修正_独自の記事取得後に、WordPressの元の記事情報へ戻します。
	wp_reset_postdata();

	// 20260828_橋口修正_Ajaxで返す記事カードの出力が完了したため、ここで処理を終了します。
	wp_die();
}

// 20260828_橋口修正_管理画面へログインしている利用者からのカテゴリ選択を受け付けます。
add_action('wp_ajax_archive_filter', 'archive_filter_ajax');

// 20260828_橋口修正_ログインしていない一般の閲覧者からのカテゴリ選択も受け付けます。
add_action('wp_ajax_nopriv_archive_filter', 'archive_filter_ajax');
