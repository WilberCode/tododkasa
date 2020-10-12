<?php


use WpTailwindCssThemeBoilerplate\AutoLoader;
use WpTailwindCssThemeBoilerplate\View;


/*
 * Set up our auto loading class and mapping our namespace to the app directory.
 *
 * The autoloader follows PSR4 autoloading standards so, provided StudlyCaps are used for class, file, and directory
 * names, any class placed within the app directory will be autoloaded.
 *
 * i.e; If a class named SomeClass is stored in app/SomeDir/SomeClass.php, there is no need to include/require that file
 * as the autoloader will handle that for you.
 */
require get_stylesheet_directory() . '/app/AutoLoader.php';
require get_stylesheet_directory() . '/inc/widgets.php'; 


$loader = new AutoLoader();
$loader->register();
$loader->addNamespace( 'WpTailwindCssThemeBoilerplate', get_stylesheet_directory() . '/app' );

View::$view_dir = get_stylesheet_directory() . '/templates/views';

require get_stylesheet_directory() . '/includes/scripts-and-styles.php';
  
// Obtiene la Url del thumbnail     
function thumbnail_image_url($size){
    global $post; 
    $image_id = get_post_thumbnail_id($post -> ID);
    $main_image = wp_get_attachment_image_src($image_id, $size);
    //0 = ruta o url, 1 = width, 2 = height, 3 = boolean
    return $main_image[0];
} 

function tienda_register_styles() { 
	$theme_version = wp_get_theme()->get( 'Version' ); 
	wp_enqueue_style( 'twentytwenty-style', get_stylesheet_uri(), array(), $theme_version );  
}

add_action( 'wp_enqueue_scripts', 'tienda_register_styles' );
function my_theme_setup() {
    add_theme_support( 'woocommerce' );
}

add_action( 'after_setup_theme', 'my_theme_setup' );
 
 
// Eliminar todos los CSS de WooCommerce de golpe
add_filter( 'woocommerce_enqueue_styles', '__return_false' );

 
// Nuevo formato de precio regular y descuento 
function bd_rrp_sale_price_html( $price, $product ) {
	if ( $product->is_on_sale() ) :
	  $has_sale_text = array(
		'<del>' => '<del>Precio Regular: ',
		'<ins>' => '<ins>Cyber Week: '
	  );
	  $return_string = str_replace(array_keys( $has_sale_text ), array_values( $has_sale_text ), $price) ;
	else :
	  $return_string =  '<div class="flex py-3 font-normal text-base" > Cyber Week:'.$price.'</div>'; 
	endif;
  
	return $return_string;
  }
  add_filter( 'woocommerce_get_price_html', 'bd_rrp_sale_price_html', 100, 2 );


  
//  Elimanar  comentario y valoraciones
add_filter( 'woocommerce_product_tabs', 'sb_woo_remove_reviews_tab', 98);
 function sb_woo_remove_reviews_tab($tabs)
 {
 unset($tabs['reviews']);
 return $tabs;
 }




//Agregara distritos a Woocommerce
add_filter( 'woocommerce_states','goowoo_add_states' );
function goowoo_add_states( $states ){
	$states['PE'] = array(
		'LC' =>__('Lima', 'woocommerce'),
		'AC' =>__('Ancon', 'woocommerce'),
		'AT' =>__('Ate', 'woocommerce'),
		'BA' =>__('Barranco', 'woocommerce'),
		'BR' =>__('Breña', 'woocommerce'), 
		'CB' =>__('Carabayllo', 'woocommerce'), 
		'CY' =>__('Chaclacayo', 'woocommerce'), 
		'CH' =>__('Chorrillos', 'woocommerce'),
		'CG' =>__('Cieneguilla', 'woocommerce'), 
		'CO' =>__('Comas', 'woocommerce'),
		'EA' =>__('El Agustino', 'woocommerce'),
		'IN' =>__('Independencia', 'woocommerce'),
		'JM' =>__('Jesus Maria', 'woocommerce'),
		'LM' =>__('La Molina', 'woocommerce'),
		'LV' =>__('La Victoria', 'woocommerce'),
		'LN' =>__('Lince', 'woocommerce'),
		'LO' =>__('Los Olivos', 'woocommerce'),
		'LG' =>__('Lurigancho', 'woocommerce'),
		'LR' =>__('Lurin', 'woocommerce'),
		'MG' =>__('Magdalena del Mar', 'woocommerce'),
		'PL' =>__('Pueblo Libre', 'woocommerce'),
		'MI' =>__('Miraflores', 'woocommerce'), 
		'PC' =>__('Pachacamac', 'woocommerce'),
		'PS' =>__('Pucusana', 'woocommerce'),
		'PP' =>__('Puente Piedra', 'woocommerce'),
		'PH' =>__('Punta Hermosa', 'woocommerce'),
		'PN' =>__('Punta Negra', 'woocommerce'),
		'RI' =>__('Rimac', 'woocommerce'),
		'SBT' =>__('San Bartolo', 'woocommerce'),
		'SB' =>__('San Borja', 'woocommerce'),
		'SI' =>__('San Isidro', 'woocommerce'),
		'SJL' =>__('San Juan de Lurigancho', 'woocommerce'),
		'SJM' =>__('San Juan de Miraflores', 'woocommerce'),
		'SL' =>__('San Luis', 'woocommerce'),
		'SP' =>__('San Martin de Porres', 'woocommerce'),
		'SM' =>__('San Miguel', 'woocommerce'),
		'SA' =>__('Santa Anita', 'woocommerce'),
		'SMM' =>__('Santa Maria del Mar', 'woocommerce'), 
		'STA' =>__('Santa Rosa', 'woocommerce'),
		'SU' =>__('Santiago de Surco', 'woocommerce'),
		'SR' =>__('Surquillo', 'woocommerce'),
		'VS' =>__('Villa El Salvador', 'woocommerce'),
		'VMT' =>__('Villa Maria del Triunfo', 'woocommerce'), 
		
		'CAL' =>__('Callao', 'woocommerce'),
		'BV' =>__('Bellavista', 'woocommerce'), 
		'CL' =>__('Carmen de la Legua', 'woocommerce'),
		'LP' =>__('La Perla', 'woocommerce'),
		'LPT' =>__('La Punta', 'woocommerce'),
		'VTL' =>__('Ventanilla', 'woocommerce'),
		'MP' =>__('Mi Peru', 'woocommerce'),

 	);
 return $states;
}
 


// Obliga a registrarse antes de finalizar compra
  add_action('template_redirect','check_if_logged_in');
  function check_if_logged_in()
  {
	  $pageid = 8; // your checkout page id
	  if(!is_user_logged_in() && is_page($pageid))
	  {
		  $url = add_query_arg(
			  'redirect_to',
			  get_permalink($pagid),
			  site_url('/mi-cuenta/') // your my acount url
		  );
		  wp_redirect($url);
		  exit;
	  }
	  if(is_user_logged_in())
	  {
	  if(is_page(9))//my-account page id
	  {

		  $redirect = $_GET['redirect_to'];
		  if (isset($redirect)) {
		  echo '<script>window.location.href = "'.$redirect.'";</script>';
		  }

	  }
	  }
  }   