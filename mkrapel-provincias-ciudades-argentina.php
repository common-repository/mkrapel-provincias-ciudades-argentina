<?php
/*
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 *
 * Plugin Name: MkRapel Provincias y Ciudades de Argentina para WC
 * Plugin URI: https://marketingrapel.cl/servicios/plugin-provincias-y-ciudades-de-argentina-para-woocommerce/
 * Description: Plugin con las Provincias y Ciudades de Argentina actualizado al 2020, permitiendo usar las Ciudades para establecer las Zonas de Despacho en la sección de Envíos de WooCommerce. Retira campos de Código Postal y Línea 2 de la Dirección en el CheckOut, junto con nueva distribución visible.
 * Version: 3.5
 * Requires at least: 5.0
 * Requires PHP: 5.6
 * Author: Marketing Rapel
 * Author URI: https://marketingrapel.cl
 * License: GPLv3
 * Text Domain: mkrapel-provincias-ciudades-argentina
 * Domain Path: /languages
 * Tested up to: 5.4
 * WC requires at least: 4.0.0
 * WC tested up to: 4.3.0
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action('plugins_loaded','mkrapel_ar_provincias_ciudades_ar_init',1);
add_filter('woocommerce_checkout_fields', 'mkrapel_ar_nombre_campos');
add_filter('woocommerce_checkout_fields', 'mkrapel_ar_campos_quitados');
add_filter('woocommerce_checkout_fields', 'mkrapel_ar_campos_class');
add_filter('woocommerce_checkout_fields', 'mkrapel_ar_campos_orden');

function mkrapel_ar_smp_notices($classes, $notice){
    ?>
    <style>
        .btn_website {
            background: #4f9e13;
            color: #fff;
            padding: 5px 20px;
            border-radius: 20px;
            text-decoration: unset;
            box-shadow: 0 0 20px 0 #00000052;
        }
        .btn_website:hover {
            background: #1e342d;
            color: #fff;
            text-decoration: unset;
        }
    </style>
    <div class="mkrapel_cl <?php echo $classes; ?>" style="padding: 10px; border-radius: 15px; box-shadow: 0 0 20px 0 rgb(0 0 0 / .25);">
		<img src="https://marketingrapel.cl/wp-content/uploads/2019/11/Logotipo-MkRapel-ICreative-Full-Color.png" alt="sticky logo" style="padding: 0 15px 15px 0; width: 290px;height: 83px;float: left;">
		<p style="padding: 10px;">Desde hoy las Zonas de Envío de <?php echo get_bloginfo( "name" ); ?> incluirán las <strong>Provincias de la Argentina</strong> y habilitando el <strong>Método de Envío "Despacho a Domicilio AR" para las Ciudades</strong> de la Provincia seleccionada para tu Zona de Envío. Para dudas, consultas, sugerencias y más, escríbenos al correo <a href="mailto:hola@marketingrapel.cl">hola@marketingrapel.cl</a> para obtener la ayuda necesaria, no olvides indicar tu sitio web al momento de enviar el email.</p>
		<p style="padding: 10px;">
		    <a class="btn_website" href="https://marketingrapel.cl/?referred=<?php echo esc_url( home_url('/') ); ?>&plugin=mkrapel-provincias-ciudades-argentina" target="_blank">Visitar Web</a>
		    <a class="btn_website" href="https://marketingrapel.cl/servicios/plugin-provincias-y-ciudades-de-argentina-para-woocommerce/?referred=<?php echo esc_url( home_url('/') ); ?>&plugin=mkrapel-provincias-ciudades-argentina" target="_blank">Ver Configuración</a>
		    <a class="btn_website" href="mailto:hola@marketingrapel.cl" target="_blank">Email hola@marketingrapel.cl</a>
	    </p>
	</div>
    <?php
}
function mkrapel_ar_smp_notices_index($classes, $notice){
    ?>
    <style>
        .btn_website {
            background: #4f9e13;
            color: #fff;
            padding: 5px 20px;
            border-radius: 20px;
            text-decoration: unset;
            box-shadow: 0 0 20px 0 #00000052;
        }
        .btn_website:hover {
            background: #1e342d;
            color: #fff;
            text-decoration: unset;
        }
    </style>
    <div class="mkrapel_cl <?php echo $classes; ?>" style="padding: 10px; border-radius: 15px; box-shadow: 0 0 20px 0 rgb(0 0 0 / .25);">
		<img src="https://marketingrapel.cl/wp-content/uploads/2019/11/Logotipo-MkRapel-ICreative-Full-Color.png" alt="sticky logo" style="padding: 0 15px 15px 0; width: 290px;height: 83px;float: left;">
		<p style="padding: 10px;">Aviso Principal: Desde hoy tus Zonas de Envío incluirán las <strong>Provincias de la Argentina</strong> y habilitando el <strong>Método de Envío "Despacho a Domicilio AR" para las Ciudades</strong> de la Provincia seleccionada para tu Zona de Envío. Para dudas, consultas, sugerencias y más, escríbenos al correo <a href="mailto:hola@marketingrapel.cl">hola@marketingrapel.cl</a> para obtener la ayuda necesaria, no olvides indicar tu sitio web al momento de enviar el email.</p>
		<a class="btn_website" href="https://marketingrapel.cl/?referred=<?php echo esc_url( home_url('/') ); ?>&plugin=mkrapel-provincias-ciudades-argentina" target="_blank">Visitar Web</a>
	</div>
    <?php
}
function mkrapel_ar_provincias_ciudades_ar_init(){
    load_plugin_textdomain('mkrapel-provincias-ciudades-argentina',
        FALSE, dirname(plugin_basename(__FILE__)) . '/languages');

    /* Check if WooCommerce is active */
    if(in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {

        require_once ('includes/states-places.php');
        require_once ('includes/filter-by-cities.php');
		
        global $pagenow;
        $GLOBALS['wc_states_places'] = new MkRapel_Provincia_Ciudad_AR(__FILE__);
		
        add_filter( 'woocommerce_shipping_methods', 'mkrapel_ar_add_filters_by_cities_method' );
        add_action( 'woocommerce_shipping_init', 'mkrapel_ar_filters_by_cities_method' );
		
        function mkrapel_ar_add_filters_by_cities_method( $methods ) {
            $methods['mkrapel_ar_filters_by_cities_shipping_method'] = 'Filters_By_Cities_Method_AR';
            return $methods;
        }
        if ( is_admin() && 'plugins.php' == $pagenow && !defined( 'DOING_AJAX' ) ) {
            add_action('admin_notices', function() use($subs) {
                mkrapel_ar_smp_notices('notice notice-info is-dismissible', $subs);
            });
        }
        if ( is_admin() && 'index.php' == $pagenow && !defined( 'DOING_AJAX' ) ) {
            add_action('admin_notices', function() use($subs) {
                mkrapel_ar_smp_notices_index('notice notice-info is-dismissible', $subs);
            });
        }
    }
}
function mkrapel_ar_nombre_campos( $fields ) {
    $fields['billing']['billing_first_name']['placeholder'] = 'Su Nombre';
    $fields['billing']['billing_last_name']['placeholder'] = 'Sus Apellidos';
    $fields['billing']['billing_address_1']['placeholder'] = 'Nombre de la Calle, Número, Depto, Local, Oficina';
    $fields['billing']['billing_company']['placeholder'] = 'Digite su DNI';
    $fields['billing']['billing_country']['placeholder'] = 'Seleccione País';
	$fields['billing']['billing_state']['placeholder'] = 'Seleccione Provincia';
    $fields['billing']['billing_city']['placeholder'] = 'Seleccione Ciudad';
    $fields['billing']['billing_email']['placeholder'] = 'Su Email';
    $fields['billing']['billing_phone']['placeholder'] = 'Su Celular o Teléfono';
    
    $fields['billing']['billing_address_1']['label'] = 'Dirección';
    $fields['billing']['billing_company']['label'] = 'DNI';
    $fields['billing']['billing_country']['label'] = 'País';
    $fields['billing']['billing_state']['label'] = 'Provincia';
    $fields['billing']['billing_city']['label'] = 'Ciudad';
    
    
    $fields['shipping']['shipping_first_name']['placeholder'] = 'Su Nombre';
    $fields['shipping']['shipping_last_name']['placeholder'] = 'Sus Apellidos';
    $fields['shipping']['shipping_address_1']['placeholder'] = 'Nombre de la Calle, Número, Depto, Local, Oficina';
    $fields['shipping']['shipping_company']['placeholder'] = 'Digite su DNI';
    $fields['shipping']['shipping_country']['placeholder'] = 'Seleccione País';
    $fields['shipping']['shipping_state']['placeholder'] = 'Seleccione Provincia';
    $fields['shipping']['shipping_city']['placeholder'] = 'Seleccione Ciudad';
    $fields['shipping']['shipping_email']['placeholder'] = 'Su Email';
    $fields['shipping']['shipping_phone']['placeholder'] = 'Su Celular o Teléfono';
    
    $fields['shipping']['shipping_address_1']['label'] = 'Dirección';
    $fields['shipping']['shipping_company']['label'] = 'DNI';
    $fields['shipping']['shipping_country']['label'] = 'País';
    $fields['shipping']['shipping_state']['label'] = 'Provincia';
    $fields['shipping']['shipping_city']['label'] = 'Ciudad';

    return $fields;
}
function mkrapel_ar_campos_quitados( $fields ) {
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_postcode']);
    
    unset($fields['shipping']['shipping_address_2']);
    unset($fields['shipping']['shipping_postcode']);

    return $fields;
}
function mkrapel_ar_campos_class($fields){
    $fields['billing']['billing_first_name']['class'][0] = 'form-row-first';
    $fields['billing']['billing_last_name']['class'][0] = 'form-row-last';
    $fields['billing']['billing_company']['class'][0] = 'form-row-first';
    $fields['billing']['billing_country']['class'][0] = 'form-row-last';
    $fields['billing']['billing_address_1']['class'][0] = 'form-row-wide';
    $fields['billing']['billing_state']['class'][0] = 'form-row-first';
    $fields['billing']['billing_city']['class'][0] = 'form-row-last';
    $fields['billing']['billing_phone']['class'][0] = 'form-row-first';
    $fields['billing']['billing_email']['class'][0] = 'form-row-last';
    
    $fields['shipping']['shipping_first_name']['class'][0] = 'form-row-first';
    $fields['shipping']['shipping_last_name']['class'][0] = 'form-row-last';
    $fields['shipping']['shipping_company']['class'][0] = 'form-row-first';
    $fields['shipping']['shipping_country']['class'][0] = 'form-row-last';
    $fields['shipping']['shipping_address_1']['class'][0] = 'form-row-wide';
    $fields['shipping']['shipping_state']['class'][0] = 'form-row-first';
    $fields['shipping']['shipping_city']['class'][0] = 'form-row-last';
    $fields['shipping']['shipping_phone']['class'][0] = 'form-row-first';
    $fields['shipping']['shipping_email']['class'][0] = 'form-row-last';
    
    return $fields;
}
function mkrapel_ar_campos_orden($fields){
    $fields['billing']['billing_first_name']['priority'] = 10;
    $fields['billing']['billing_last_name']['priority'] = 20;
    $fields['billing']['billing_company']['priority'] = 30;
    $fields['billing']['billing_country']['priority'] = 40;
    $fields['billing']['billing_address_1']['priority'] = 50;
    $fields['billing']['billing_state']['priority'] = 60;
    $fields['billing']['billing_city']['priority'] = 70;
    $fields['billing']['billing_phone']['priority'] = 80;
    $fields['billing']['billing_email']['priority'] = 90;
    
    $fields['shipping']['shipping_first_name']['priority'] = 10;
    $fields['shipping']['shipping_last_name']['priority'] = 20;
    $fields['shipping']['shipping_company']['priority'] = 30;
    $fields['shipping']['shipping_country']['priority'] = 40;
    $fields['shipping']['shipping_address_1']['priority'] = 50;
    $fields['shipping']['shipping_state']['priority'] = 60;
    $fields['shipping']['shipping_city']['priority'] = 70;
    $fields['shipping']['shipping_phone']['priority'] = 80;
    $fields['shipping']['shipping_email']['priority'] = 90;

    return $fields;
}
?>