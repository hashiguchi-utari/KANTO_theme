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
	} elseif (is_single()) {
		kanto_enqueue_theme_script('kanto-single', '/js/single.js', array('kanto-main'));
	} elseif (is_search()) {
		kanto_enqueue_theme_script('kanto-search', '/js/search.js', array('kanto-main'));
	} elseif (is_404()) {
		kanto_enqueue_theme_script('kanto-404', '/js/404.js', array('kanto-main'));
	}
}
add_action('wp_enqueue_scripts', 'kanto_enqueue_scripts');


/*====================================
 * 投稿のアーカイブページを作成
 * 設定後に（パーマリンク更新すること）
 * 
====================================*/
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

// サムネイルを有効にする
add_theme_support('post-thumbnails');
