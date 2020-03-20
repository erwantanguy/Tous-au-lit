<?php
add_theme_support( 'post-thumbnails' );
//set_post_thumbnail_size( 50, 50, true );
set_post_thumbnail_size( 50, 50, array( 'center', 'center')  );
//wp_nav_menu( array( 'menu' => 'principal' ) );
add_theme_support( 'menus' );
add_shortcode('lang_en', 'votre_fonction');
function votre_fonction($param) {
  extract(
    shortcode_atts(
      array(
        'title' => '<img class="alignnone size-full wp-image-381 lang" src="http://www.ticoet.fr/drmgalerie/wp-content/themes/drmgalerie/images/lang_en.png" width="18" height="18" />'
      ),
      $param
    )
   );
   return $title;
 };

/*function register_button($buttons) { 
  $pos = array_search( 'wp_adv', $buttons, true ); 

  if ( $pos !== false ) { 

    $tmp_buttons = array_slice( $buttons, 0, $pos ); 
    array_push($tmp_buttons,'|', "slider", '|'); 
    $buttons = array_merge( $tmp_buttons, array_slice( $buttons, $pos ) ); 

  } 

  return $buttons; 
}*/
//add_filter('mce_buttons_2', 'cnsx_register_button');
add_action('init', 'mylink_button');
function mylink_button() {
 
   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
     return;
   }
 
   if ( get_user_option('rich_editing') == 'true' ) {
     add_filter( 'mce_external_plugins', 'add_plugin' );
     add_filter( 'mce_buttons', 'register_button' );
   }
 
}
function register_button( $buttons ) {
 array_push( $buttons, "|", "englishversion" );
 return $buttons;
}
function add_plugin( $plugin_array ) {
   $plugin_array['englishversion'] = get_bloginfo( 'template_url' ) . '/js/mybuttons.js';
   return $plugin_array;
}







register_nav_menus(array(
	'premier' => 'Menu principale',
	'deuxieme' => 'Petit menu optionnel',
	'troisieme' => 'Menu pied de page',
	'artistes' => 'Menu pour les artistes quand il n\'y a pas d\'événements'
));


$args = array(
	'flex-width'    => true,
	'width'         => 1900,
	'flex-height'    => true,
	'height'        => 284,
	'default-image' => 'http://www.ticoet.fr/drmgalerie/wp-content/uploads/sites/12/2015/09/bandeau_defaut.png', //get_template_directory_uri() . 
	'uploads'       => true,
);
add_theme_support( 'custom-header', $args );

/*********** IMAGES ************/
add_image_size( 'events', 300, 120, array( 'left', 'top' ) );
add_image_size( 'event', 300,120 );
add_image_size('mobile',768);
add_image_size('tablette',1000);
add_image_size('vignette',225,225,array( 'center', 'center' ));
add_image_size('logo',200);
add_image_size('slider',1700);
add_image_size('slider2',750,424,array( 'center', 'center' ));
add_image_size('slider3',755,450,array( 'center', 'center' ));
add_image_size('box',2000);
add_image_size('box0',2000,true);
add_image_size('box1',1200,614,false);
add_image_size('box2',800);
add_image_size('box3',1000);
add_image_size('box4',1900,900,array( 'center', 'center' ));
add_image_size('box5',1200,614,true);
//array(1240,701), array('class' => 'feature-large')





/************ menu boostrap **********/
class Bootstrap_Walker_Nav_Menu extends Walker_Nav_Menu {

   function start_lvl(&$output, $depth = 0, $args = array()) {
      $output .= "\n<ul class=\"dropdown-menu\">\n";
   }

   function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
       $element_html = '';
       parent::start_el($element_html, $item, $depth, $args);
       if ( $item->is_dropdown && $depth === 0 ) {
           $element_html = str_replace( '<a', '<a class="dropdown-toggle" data-toggle="dropdown"', $element_html );
           $element_html = str_replace( '</a>', ' <b class="caret"></b></a>', $element_html );
       }
       $output .= $element_html;
    }

    function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output) {
        if ( $element->current ) {
            $element->classes[] = 'active';
        }
        $element->is_dropdown = !empty( $children_elements[$element->ID] );
        parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }
}
/*if ( function_exists('register_sidebar') ) {
register_sidebar(array(
        'name' => 'ma_sidebar',
		'before_widget' => '<div class="widget_sidebar">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
      ));
register_sidebar(array(
        'name' => 'barre_gauche_footer_artiste',
		'before_widget' => '<div class="widget_sidebar">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
      ));
register_sidebar(array(
        'name' => 'barre_droite_footer_artiste',
		'before_widget' => '<div class="widget_sidebar">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
      ));
register_sidebar(array(
        'name' => 'menu_artiste_event',
		'before_widget' => '<div class="widget_sidebar">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
      ));
	}
add_action('widgets_init', 'ma_sidebar');
add_action('widgets_init', 'barre_gauche_footer_artiste');
add_action('widgets_init', 'barre_droite_footer_artiste');
add_action('widgets_init', 'menu_artiste_event');*/
add_action( 'widgets_init', 'theme_slug_widgets_init' );
function theme_slug_widgets_init() {
    register_sidebar( array(
        'name' => 'ma_sidebar',
		'before_widget' => '<div class="widget_sidebar">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ) );
	register_sidebar(array(
        'name' => 'barre_gauche_footer_artiste',
		'before_widget' => '<div class="widget_sidebar">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
      ));
	  register_sidebar(array(
        'name' => 'barre_droite_footer_artiste',
		'before_widget' => '<div class="widget_sidebar">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
      ));
	  register_sidebar(array(
        'name' => 'menu_artiste_event',
		'before_widget' => '<div class="widget_sidebar">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
      ));
}

/**** options ACF ****/
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Page Accueil Tous au lit',
		'menu_title'	=> 'Theme TAL',
		'menu_slug' 	=> 'tal',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Gestion de la page d\'accueil TAL',
		'menu_title'	=> 'Accueil',
		'parent_slug'	=> 'tal',
	));
	/*acf_add_options_sub_page(array(
	'page_title' 	=> 'Theme Header Settings',
	'menu_title'	=> 'Header',
	'parent_slug'	=> 'theme-general-settings',
	));*/

}
/********** THEME ****************/
//add_options_page(__('All Settings'), __('All Settings'), 'administrator', 'options.php');
//add_theme_page('éléments supllémentaires', 'Options', 'edit_themes_options', 'options', array(10,'themeUi'));
function menu_options(){
	add_submenu_page("themes.php", "Options du thème", "Options du thème", 9, "options", "custom_theme_options");
}
function custom_theme_options(){
	//echo "<h2>Options du thème</h2>test et tout le reste";
	require_once ( get_template_directory() . '/theme-options.php' );
};
add_action("admin_menu", "menu_options");



/************************* artistes ************************/


add_action( 'init', 'create_post_type' );
function create_post_type() {
  register_post_type( 'artiste',
    array(
      'labels' => array(
        'name' => __( 'Artistes' ),
        'singular_name' => __( 'Artiste' ),
        'all_items' => 'Tous les artistes',
      'add_new_item' => 'Ajouter un artiste',
      'edit_item' => 'Éditer l\'artiste',
      'new_item' => 'Nouvel(le) artiste',
      'view_item' => 'Voir l\'artiste',
      'search_items' => 'Rechercher parmi les artistes',
      'not_found' => 'Pas d\'artiste trouvé-e',
      'not_found_in_trash'=> 'Pas d\'artiste dans la corbeille'
      ),
      'public' => true,
      
      /*'publicly_queryable' => true,
	  'show_ui'            => true,
	  'show_in_menu'       => true,
	  'query_var'          => true,
      'show_in_nav_menus' => true,*/
	  
      /*'show_in_admin_bar' => true,*/
      'supports'=>array('title','editor','thumbnail','excerpt','revisions'),
	  'taxonomies'=>array('post_tag'),
	  'query_var' => true,
      'rewrite' => true,
      'capability_type' => 'post',
    )
  );
}


add_action('add_meta_boxes','init_metabox');
function init_metabox(){
  add_meta_box('homepage', 'Accueil', 'home_page', 'artiste', 'side');
}

function home_page($post){
  $dispo = get_post_meta($post->ID,'_home_page',true);
  echo '<label for="home_page_meta">Mise en avant de l\'artiste sur la page d\'accueil :</label>';
  echo '<select name="home_page">';
  echo '<option ' . selected( 'oui', $dispo, false ) . ' value="oui">Oui</option>';
  echo '<option ' . selected( 'non', $dispo, false ) . ' value="non">Non</option>';
  echo '</select>';

}

add_action('save_post','save_metabox');
function save_metabox($post_id){
if(isset($_POST['home_page']))
  update_post_meta($post_id, '_home_page', $_POST['home_page']);
}
/**************************** Playlists **********************/

add_action( 'wp_playlist_scripts', 'my_playlist_script' ); 

function my_playlist_script()
{
    remove_action( 'wp_footer', 'wp_underscore_playlist_templates', 0 );
    add_action( 'wp_footer', 'my_playlist_buytrack_template', 0 );
}
function my_playlist_buytrack_template() {  
?>
<script type="text/html" id="tmpl-wp-playlist-current-item">
	<# console.log(data); #>
	<# if ( data.image ) { #>
		<figure class="col-sm-3">
		<img src="{{ data.image.src }}" alt="{{ data.title }}" />
		</figure>
	<# } #>
	<div class="wp-playlist-caption col-sm-9">
		<span class="wp-playlist-item-meta wp-playlist-item-title"><?php
			/* translators: playlist item title */
			printf( _x( '&#8220;%s&#8221;', 'playlist item title' ), '{{ data.title }}' );
		?></span>
		<# if ( data.meta.album ) { #><span class="wp-playlist-item-meta wp-playlist-item-album">{{ data.meta.album }}</span><# } #>
		<# if ( data.meta.artist ) { #><span class="wp-playlist-item-meta wp-playlist-item-artist">{{ data.meta.artist }}</span><# } #>
	</div>
</script>
<script type="text/html" id="tmpl-wp-playlist-item">
	<div class="wp-playlist-item">
		<a class="wp-playlist-caption" href="{{ data.src }}">
			{{ data.index ? ( data.index + '. ' ) : '' }}
			<# if ( data.caption ) { #>
				{{ data.caption }}
			<# } else { #>
				<span class="wp-playlist-item-title"><?php
					/* translators: playlist item title */
					printf( _x( '&#8220;%s&#8221;', 'playlist item title' ), '{{{ data.title }}}' );
				?></span>
				<# if ( data.artists && data.meta.artist ) { #>
				<span class="wp-playlist-item-artist"> &mdash; {{ data.meta.artist }}</span>
				<# } #>
			<# } #>
		</a>
		<# if ( data.meta.length_formatted ) { #>
		<div class="wp-playlist-item-length">{{ data.meta.length_formatted }}</div>
		<# } #>
	</div>
</script>
<?php
}

/**************************** JS *****************************/
    add_action('init', 'gkp_insert_js_in_footer');
    function gkp_insert_js_in_footer() {
     
    // On verifie si on est pas dans l'admin
    if( !is_admin() ) :
     
        // On annule jQuery installer par WordPress (version 1.4.4
        //wp_deregister_script( 'jquery' );
     
        // On declare un nouveau jQuery dernière version grace au CDN de Google
        //wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js','',false,true);
        //wp_enqueue_script( 'jquery' );
     
        // On insere le fichier de ses propres fonctions javascript
        wp_register_script('functions', get_bloginfo( 'template_directory' ).'/js/bootstrap.min.js','',false,true);
		wp_enqueue_script( 'functions' );
		wp_register_script('docs', get_bloginfo( 'template_directory' ).'/js/docs.min.js','',false,true);
		wp_enqueue_script( 'docs' );
		wp_register_script('collapse', get_bloginfo( 'template_directory' ).'/js/collapse.js','',false,true);
		wp_enqueue_script( 'collapse' );
		wp_register_script('carousel', get_bloginfo( 'template_directory' ).'/js/carousel.js','',false,true);
        wp_enqueue_script( 'carousel' );
		wp_register_script('tab', get_bloginfo( 'template_directory' ).'/js/tab.js','',false,true);
        wp_enqueue_script( 'tab' );
		wp_register_script('tooltip', get_bloginfo( 'template_directory' ).'/js/tooltip.js','',false,true);
        wp_enqueue_script( 'tooltip' );
		wp_register_script('modals', get_bloginfo( 'template_directory' ).'/js/modal.js','',false,true);
        wp_enqueue_script( 'modals' );
     
    endif;
    }



/********************* ical **************/

// Changes the text labels for Google Calendar and iCal buttons on a single event page
remove_action('tribe_events_single_event_after_the_content', array('Tribe__Events__iCal', 'single_event_links'));
add_action('tribe_events_single_event_after_the_content', 'customized_tribe_single_event_links');
  
function customized_tribe_single_event_links()    {
    if (is_single() && post_password_required()) {
        return;
    }
  
    echo '<div class="tribe-events-cal-links">';
    echo '<a class="btn btn-default btn-xs" href="' . tribe_get_gcal_link() . '" title="' . __( 'Add to Google Calendar', 'tribe-events-calendar-pro' ) . '">Google Agenda</a>';
    echo ' <a class="btn btn-default btn-xs" href="' . tribe_get_single_ical_link() . '">Exporter vers iCal</a>';
    echo '</div><!-- .tribe-events-cal-links -->';
}

//+ Google Agenda+ Exporter vers iCal



/************* ROLES ****************/

/*
Objectif : Permettre à toutes les personnes du role "Editeur" de pouvoir manipuler le menu de son site Internet
            - Etape 1 : Ajouter au role Editeur l'accès à l'Apparence du site
            - Etape 2 : Retirer tous les sous menu du menu "Apparence" saus le sous menu "Menus"
*/
$roleObject = get_role( 'editor' );
if (!$roleObject->has_cap( 'edit_theme_options' ) ) {
    $roleObject->add_cap( 'edit_theme_options' );
}
 
function hide_menu() {
    // Si le role de l'utilisatieur ne lui permet pas d'ajouter des comptes (autrement dit si il n'est pas admin)
    if(!current_user_can('add_users')) {
      remove_submenu_page( 'themes.php', 'themes.php' ); // hide the theme selection submenu
      //remove_submenu_page( 'themes.php', 'widgets.php' ); // hide the widgets submenu
      remove_submenu_page( 'themes.php', 'theme-editor.php' ); // hide the editor menu
 
      // Le code suisant c'est juste poure retirer le sous menu "Personnaliser"
      $customize_url_arr = array();
      $customize_url_arr[] = 'customize.php'; // 3.x
      $customize_url = add_query_arg( 'return', urlencode( wp_unslash( $_SERVER['REQUEST_URI'] ) ), 'customize.php' );
      $customize_url_arr[] = $customize_url; // 4.0 & 4.1
      if ( current_theme_supports( 'custom-header' ) && current_user_can( 'customize') ) {
          $customize_url_arr[] = add_query_arg( 'autofocus[control]', 'header_image', $customize_url ); // 4.1
          $customize_url_arr[] = 'custom-header'; // 4.0
      }
      if ( current_theme_supports( 'custom-background' ) && current_user_can( 'customize') ) {
          $customize_url_arr[] = add_query_arg( 'autofocus[control]', 'background_image', $customize_url ); // 4.1
          $customize_url_arr[] = 'custom-background'; // 4.0
      }
      foreach ( $customize_url_arr as $customize_url ) {
          remove_submenu_page( 'themes.php', $customize_url );
      }
 
    }
 
}
add_action('admin_head', 'hide_menu');

/************* bar admin ****************/
function my_admin_bar_link() {
	global $wp_admin_bar;
	if ( !is_super_admin() || !is_admin_bar_showing() )
		return;
	$wp_admin_bar->add_menu( array(
	'id' => 'diww',
	'parent' => 'site-name',
	'title' => __( 'Artistes'),
	'href' => admin_url( '/edit.php?post_type=artiste' )
	) );
}
add_action('admin_bar_menu', 'my_admin_bar_link', 1000);

?>