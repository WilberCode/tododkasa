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
 
 
// Tendenze

// Obtiene la Url del thumbnail     
function thumbnail_image_url($size){
    global $post; 
    $image_id = get_post_thumbnail_id($post -> ID);
    $main_image = wp_get_attachment_image_src($image_id, $size);
    //0 = ruta o url, 1 = width, 2 = height, 3 = boolean
    return $main_image[0];
}

// Obtiene la Url de carpeta upload
function tz_get_upload_dir_var( $param, $subfolder = '' ) {
    $upload_dir = wp_upload_dir();
    $url = $upload_dir[ $param ];
 
    if ( $param === 'baseurl' && is_ssl() ) {
        $url = str_replace( 'http://', 'https://', $url );
    }
 
    return $url . $subfolder;
}
 
function events_endpoint() {
	register_rest_route( 'marcas/', 'destacados/', array(
        'methods'  =>   'GET' ,
        'callback' => 'get_marcas',
    )); 
   
}
add_action( 'rest_api_init', 'events_endpoint' );
  
function get_marcas($request){ 
    // $cat = get_category_by_slug( $request['belleza'] );
	$args = array (
		'post_type'    		=> 'marca',
        'posts_per_page'    => -1,
		'category_name'     => $request['category'],
		'p' =>$request['post_id']
	);
	// Run a custom query
	$meta_query = new WP_Query($args);
	
	if($meta_query->have_posts()) {
		//Define and empty array
		$i = 0;
		$data = array();
		// Store each post's data in the array
		while($meta_query->have_posts()) {
			$meta_query->the_post();
			$data[$i]['title']          =   get_the_title(); 
			$data[$i]['thumbnail']      =   get_the_post_thumbnail_url(get_the_ID(), 'full');
			$data[$i]['link']           =   get_the_permalink(); 
			$data[$i]['content']        =   get_the_content();  
			$data[$i]['informations']	=   get_field('marca_informacion');
			$data[$i]['images']			=   get_field('marca_imagenes'); 
			$data[$i]['id']             =   get_the_ID();  
			$i++;
		}
		// Return the data 
		return $data;
	}else{ 
		return [];
	}
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

// add_filter( 'woocommerce_enqueue_styles', 'woocommerce_dequeue_styles' );
// function woocommerce_dequeue_styles( $enqueue_styles ) {
// 	unset( $enqueue_styles['woocommerce-general'] );	// Remove the gloss
// 	unset( $enqueue_styles['woocommerce-layout'] ); // Remove the layout
// 	unset( $enqueue_styles['woocommerce-smallscreen'] );	// Remove the smallscreen optimisation
// 	return $enqueue_styles;
// }
 
// Eliminar todos los CSS de WooCommerce de golpe
add_filter( 'woocommerce_enqueue_styles', '__return_false' );

 



 
 

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


  
//   Elimanar  comentario y valoraciones
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
 



function ace_redirect_pre_checkout() {
	if ( ! function_exists( 'wc' ) ) return;

	$redirect_page_id = 9;
	if ( ! is_user_logged_in() && is_checkout() ) {
		wp_safe_redirect( get_permalink( $redirect_page_id ) );
		die;
	} elseif ( is_user_logged_in() && is_page( $redirect_page_id ) ) {
		wp_safe_redirect( get_permalink( wc_get_page_id( 'checkout' ) ) );
		die;
	}
}
add_action( 'template_redirect', 'ace_redirect_pre_checkout' );