<?php

add_action('wp_enqueue_scripts', 'style_theme');
function style_theme() {
	wp_enqueue_style('style', get_stylesheet_uri()); //подкл гл. файла style.css
	wp_enqueue_style('default', get_template_directory_uri() . '/assets/css/default.css');
	wp_enqueue_style('layout', get_template_directory_uri() . '/assets/css/layout.css');
	wp_enqueue_style('media-queries', get_template_directory_uri() . '/assets/css/media-queries.css');
}

add_action('wp_footer', 'scripts_theme');
function scripts_theme() {
	wp_enqueue_script('jquery.min', get_template_directory_uri() . '/assets/js/jquery.min.js');
	wp_enqueue_script('jquery-migrate-1.2.1.min', get_template_directory_uri() . '/assets/js/jquery-migrate-1.2.1.min.js');
	wp_enqueue_script('jquery.flexslider', get_template_directory_uri() . '/assets/js/jquery.flexslider.js');
	wp_enqueue_script('doubletaptogo', get_template_directory_uri() . '/assets/js/doubletaptogo.js');

	wp_enqueue_script('init', get_template_directory_uri() . '/assets/js/init.js');
	wp_enqueue_script('myScripts', get_template_directory_uri() . '/assets/js/myScripts.js');
}

add_filter('pre_get_posts','SearchFilter');
function SearchFilter($query) {
	if ($query->is_search) {
	  $query->set('post_type', 'post');
	}
	return $query;
}

add_action('widgets_init', 'mySidebar');
function mySidebar(){
	register_sidebar([
		'name' => 'Правый SideBar',
		'id' => 'right_sidebar',
		'description' => 'Описание сайдбара',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget'  => "</div>\n",
		'before_title'  => '<h5 class="widgettitle">',
		'after_title'   => "</h5>\n",
	]);
	register_sidebar([
		'name' => 'Footer SideBar',
		'id' => 'footer_sidebar',
		'description' => 'Описание сайдбара',
	]);
}

add_action('after_setup_theme','mySetupTheme');
function mySetupTheme() {
	register_nav_menu('top','Меню в шапке'); // область регистрации меню
	register_nav_menu('bottom','Меню в подвале'); // область регистрации меню
	add_theme_support('title-tag'); // заголовки для каждой страницы
	add_theme_support('post-thumbnails',['post']); // добавляет возможноть ставить картинки для постов
	add_image_size('post_thumb', 1300, 500, true); // создание собственной миниатюры для картинок

	add_theme_support( 'custom-logo' ); // добавление поддержки для логотипа сайта
	// add_theme_support( 'custom-header' );

	add_filter('excerpt_more', 'new_excerpt_more');
	function new_excerpt_more($more) {
		global $post;
		return '<a href="' . get_permalink($post->ID) . '"> Читать дальше ...</a>';
	}

	// удаляет H2 из шаблона пагинации
	add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );
	function my_navigation_template( $template, $class ){
		/*
		Вид базового шаблона:
		<nav class="navigation %1$s" role="navigation">
			<h2 class="screen-reader-text">%2$s</h2>
			<div class="nav-links">%3$s</div>
		</nav>
		*/
		
		return '
		<nav class="navigation %1$s" role="navigation">
			<div class="nav-links">%3$s</div>
		</nav>    
		';
	}
}

// измениние названий пунктов-меню админ панелей
function edit_admin_menus() {
    global $menu;
	global $submenu;
// здесь будут пункты меню, которые нужно менять
	$menu[5][0] = get_theme_mod('name_post'); // Изменить Записи на Экспонаты
	$submenu['edit.php'][5][0] = 'Все ' . mb_strtolower(get_theme_mod('name_post'));
	$submenu['edit.php'][10][0] = 'Добавить';
}
add_action( 'admin_menu', 'edit_admin_menus' );

//исключение рубрик из стандартного виджета
add_filter("widget_categories_args","my_cat_widget");
function my_cat_widget($args){
    $exclude = "1"; 
    $args["exclude"] = $exclude;
    return $args;
}

// Добавление полей в настройках темы
add_action('customize_register', function($customizer) {
	$customizer->add_section(
		'section_one', array(
			'title' => 'Настройка блока 1 (About)',
			'description' => '',
			'priority' => 11,
		)
	);
// 
	$customizer->add_setting('about_block', 
		array('default' => true)
	);

	$customizer->add_control('about_block', array(
			'label' => 'Показывать блок?',
			'section' => 'section_one',
			'type' => 'checkbox',
		)
	);
// 
	$customizer->add_setting('about_title', 
		array('default' => 'О музее')
	);
	
	$customizer->add_control('about_title', array(
			'label' => 'Название заголовка блока',
			'section' => 'section_one',
			'type' => 'text',
		)
	);
// 
	$customizer->add_setting('about_title_size', 
		array('default' => '40px')
	);
	
	$customizer->add_control('about_title_size', array(
			'label' => 'Размер заголовка(px и др.)',
			'section' => 'section_one',
			'type' => 'text',
		)
	);
// 
	$customizer->add_setting('about_title_color', 
		array('default' => '#313131')
	);

	$customizer->add_control('about_title_color', array(
			'label' => 'Выберите цвет заголовка',
			'section' => 'section_one',
			'type' => 'color',
		)
	);
// 
	$customizer->add_setting('about_background_color', 
		array('default' => '#ffffff')
	);

	$customizer->add_control('about_background_color', array(
			'label' => 'Выберите цвет фона',
			'section' => 'section_one',
			'type' => 'color',
		)
	);
// 
	$customizer->add_setting('about_text_color', 
		array('default' => '#838C95')
	);

	$customizer->add_control('about_text_color', array(
			'label' => 'Выберите цвет описания блока',
			'section' => 'section_one',
			'type' => 'color',
		)
	);
// 
	$customizer->add_setting('about_text', 
		array('default' => '<p>описание блока</p>')
	);

	$customizer->add_control('about_text', array(
			'label' => 'Описание блока(поддер. HTML)',
			'section' => 'section_one',
			'type' => 'textarea',
		)
	);
// 
// 
// 
	$customizer->add_section(
		'section_posts', array(
			'title' => 'Настройка блока 2 (Posts)',
			'description' => '',
			'priority' => 11,
		)
	);

	$customizer->add_setting('block_posts', 
		array('default' => true)
	);
	
	$customizer->add_control('block_posts', array(
			'label' => 'Показывать блок?',
			'section' => 'section_posts',
			'type' => 'checkbox',
		)
	);
// 
	$customizer->add_setting('title_posts', 
		array('default' => 'Интересные записи')
	);
	
	$customizer->add_control('title_posts', array(
			'label' => 'Назание заголовка',
			'section' => 'section_posts',
			'type' => 'text',
		)
	);
// 
	$customizer->add_setting('title_size_posts', 
		array('default' => '40px')
	);
	
	$customizer->add_control('title_size_posts', array(
			'label' => 'Размер заголовка (px и др.)',
			'section' => 'section_posts',
			'type' => 'text',
		)
	);
// 
	$customizer->add_setting('title_color_posts', 
		array('default' => '#313131')
	);
	
	$customizer->add_control('title_color_posts', array(
			'label' => 'Цвет заголовка',
			'section' => 'section_posts',
			'type' => 'color',
		)
	);
// 
	$customizer->add_setting('posts_background_color', 
		array('default' => '#f5f5f5')
	);
	
	$customizer->add_control('posts_background_color', array(
			'label' => 'Цвет фона',
			'section' => 'section_posts',
			'type' => 'color',
		)
	);
// 
	$customizer->add_setting('uniq_posts', 
		array('default' => '')
	);
	
	$customizer->add_control('uniq_posts', array(
			'label' => 'Введите id-постов через запятую',
			'section' => 'section_posts',
			'type' => 'text',
		)
	);
// 
// 
// 
	$customizer->add_section(
		'section_our_contacts', array(
			'title' => 'Настройка блока 3 (Our contacts)',
			'description' => '',
			'priority' => 11,
		)
	);

	$customizer->add_setting('our_contacts_block', 
		array('default' => true)
	);
	
	$customizer->add_control('our_contacts_block', array(
			'label' => 'Показывать блок?',
			'section' => 'section_our_contacts',
			'type' => 'checkbox',
		)
	);
// 
	$customizer->add_setting('our_contacts_title', 
		array('default' => 'Наши контакты')
	);
	
	$customizer->add_control('our_contacts_title', array(
			'label' => 'Название заголовка',
			'section' => 'section_our_contacts',
			'type' => 'text',
		)
	);
// 
	$customizer->add_setting('our_contacts_title_size', 
		array('default' => '40px')
	);
	
	$customizer->add_control('our_contacts_title_size', array(
			'label' => 'Размер заголовка (px и др.)',
			'section' => 'section_our_contacts',
			'type' => 'text',
		)
	);
// 
	$customizer->add_setting('our_contacts_title_color', 
		array('default' => '#313131')
	);
	
	$customizer->add_control('our_contacts_title_color', array(
			'label' => 'Цвет заголовка',
			'section' => 'section_our_contacts',
			'type' => 'color',
		)
	);
// 
	$customizer->add_setting('our_contacts_bg_color', 
		array('default' => '#ffffff')
	);
	
	$customizer->add_control('our_contacts_bg_color', array(
			'label' => 'Цвет фона',
			'section' => 'section_our_contacts',
			'type' => 'color',
		)
	);
// 
	$customizer->add_setting('our_contacts_text', 
		array('default' => 'Описение блока')
	);
	
	$customizer->add_control('our_contacts_text', array(
			'label' => 'Название заголовка',
			'section' => 'section_our_contacts',
			'type' => 'textarea',
		)
	);
// 
// 
// 
	$customizer->add_section(
		'section_form', array(
			'title' => 'Настройка блока 4 (Form)',
			'description' => '',
			'priority' => 11,
		)
	);
// 
	$customizer->add_setting('form_block', 
		array('default' => true)
	);
	
	$customizer->add_control('form_block', array(
			'label' => 'Показывать блок?',
			'section' => 'section_form',
			'type' => 'checkbox',
		)
	);
// 
	$customizer->add_setting('form_title', 
		array('default' => 'Заполните контактную форму')
	);
	
	$customizer->add_control('form_title', array(
			'label' => 'Название заголовка',
			'section' => 'section_form',
			'type' => 'text',
		)
	);
// 
	$customizer->add_setting('form_title_color', 
		array('default' => '#313131')
	);
	
	$customizer->add_control('form_title_color', array(
			'label' => 'Цвет заголовка',
			'section' => 'section_form',
			'type' => 'color',
		)
	);
// 
	$customizer->add_setting('form_title_bg_color', 
		array('default' => '#f5f5f5')
	);
	
	$customizer->add_control('form_title_bg_color', array(
			'label' => 'Цвет фона',
			'section' => 'section_form',
			'type' => 'color',
		)
	);
// 
	$customizer->add_setting('form_content', 
		array('default' => '[шорткод]')
	);
	
	$customizer->add_control('form_content', array(
			'label' => 'Шорткод формы',
			'section' => 'section_form',
			'type' => 'text',
		)
	);
// 
// 
// 
	$customizer->add_section(
		'section_map', array(
			'title' => 'Настройка блока 5 (Map)',
			'description' => '',
			'priority' => 11,
		)
	);
// 
	$customizer->add_setting('map_block', 
		array('default' => true)
	);
	
	$customizer->add_control('map_block', array(
			'label' => 'Показывать блок?',
			'section' => 'section_map',
			'type' => 'checkbox',
		)
	);
// 
	$customizer->add_setting('map_content', 
		array('default' => true)
	);
	
	$customizer->add_control('map_content', array(
			'label' => 'Подключение карты',
			'section' => 'section_map',
			'type' => 'text',
		)
	);
//
//
//
	$customizer->add_section(
		'section_footer', array(
			'title' => 'Дополнительное описание (Footer)',
			'description' => '',
			'priority' => 11,
		)
	);
// 
	$customizer->add_setting('footer_content', 
		array('default' => '<ul class="copyright"><li>Адрес "имя": удмуртская Республика, г. Город, ул. Улица, 1</li> <li>Номер телефона: 8(8888)88-88-88</li></ul>')
	);
	
	$customizer->add_control('footer_content', array(
			'label' => 'Описание (поддер. HTML)',
			'section' => 'section_footer',
			'type' => 'textarea',
		)
	);
//
//
//
	$customizer->add_section(
		'section_two', array(
			'title' => 'Дополнительные настройки',
			'description' => '',
			'priority' => 11,
		)
	);
// 
	$customizer->add_setting('slider_input', 
		array('default' => '')
	);
	
	$customizer->add_control('slider_input', array(
			'label' => 'Введите шорткод слайдера',
			'section' => 'section_two',
			'type' => 'text',
		)
	);
// 
	$customizer->add_setting('qrcodepage_input', 
		array('default' => '[qrcodepage]')
	);
	
	$customizer->add_control('qrcodepage_input', array(
			'label' => 'Введите шорткод для вывода qrcodepage',
			'section' => 'section_two',
			'type' => 'text',
		)
	);
// поля для редактирования меню в админ-панеле
	$customizer->add_section(
		'setting_int_admin', array(
			'title' => 'Настройка админ-панели',
			'description' => '',
			'priority' => 11,
		)
	);
	$customizer->add_setting('name_post', 
		array('default' => 'Записи')
	);
	
	$customizer->add_control('name_post', array(
			'label' => 'Заголовок для записей',
			'section' => 'setting_int_admin',
			'type' => 'text',
		)
	);

});


// add_filter('the_content', 'end_post_name');
// function end_post_name($content){
// 	$content .= 'Спасибо за то, что посмотрели пост!';
// 	return $content;
// }