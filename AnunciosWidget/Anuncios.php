<?php 
	/*
	Plugin Name: Anuncios del sitio (Slider de imagenes)
	Plugin URI: http://www.branding-machine.com/wpplugins/detalles
	Description: Widget para slider de imagenes de anuncios (Puede ir dentro de un widget o en un post);
	Author: Frisley Velasquez
	Version: 0.0.1
	Author URI: http://www.branding-machine.com
	*/

	function anuncios_admin() {
		include('Anuncioswgt/anuncios_admin.php');
	}
		
	
	function anuncios_admin_actions() {
		add_options_page("Anuncios del sitio", "Anuncios del sitio", 1, "AnunciosSitio", "anuncios_admin");	
	}
	
	function f_an_slider() {
		$plugin_directory = plugin_dir_url(__FILE__);
		
	    // Variables de opcion *************************************************************************
		$img1['src'] = get_option('img1');
		$img1['url'] = get_option('img1url');
		
		$img2['src'] = get_option('img2');
		$img2['url'] = get_option('img2url');
		
		$img3['src'] = get_option('img3');
		$img3['url'] = get_option('img3url');
		
		$img4['src'] = get_option('img4');
		$img4['url'] = get_option('img4url');
		
		$img5['src'] = get_option('img5');
		$img5['url'] = get_option('img5url');
		
		if($img1['src'] == ''){ $img1['src'] = WP_PLUGIN_URL.'/Anuncioswgt/bannerdemo1.png'; }
		if($img2['src'] == ''){ $img2['src'] = WP_PLUGIN_URL.'/Anuncioswgt/bannerdemo2.png'; }
		if($img3['src'] == ''){ $img3['src'] = WP_PLUGIN_URL.'/Anuncioswgt/bannerdemo3.png'; }
		if($img4['src'] == ''){ $img4['src'] = WP_PLUGIN_URL.'/Anuncioswgt/bannerdemo2.png'; }
		if($img5['src'] == ''){ $img5['src'] = WP_PLUGIN_URL.'/Anuncioswgt/bannerdemo3.png'; }
		
	    // INICIA EL JS ********************************************************************************
	    $slidr_js = '';
		$slidr_js .= '<script type="text/javascript" src="'.WP_PLUGIN_URL.'/Anuncioswgt/js/easySlider1.7.js"></script>';
		$slidr_js .= '<script type="text/javascript">
			jQuery.noConflict();
			jQuery(document).ready(function($) {
		        $("#slider").easySlider({
		            auto: true,
		            continuous: true,
		            pause: 5000
		        });
		        $("#sliderFeatured").easySlider({
		            auto: true,
		            continuous: true,
		            pause: 4000
		        });
			});
		</script>';
		
		// INICIA EL CSS ********************************************************************************
		$slidr_css = '';
		$slidr_css .= '<style>';
		$slidr_css .= '#sliders { height: 212px; width: 304px; }';
		$slidr_css .= '#anuncios{ float: right; height: 200px; width: 286px; padding: 6px; background-color: #f0f0f0; }';
		$slidr_css .= '#slider{ margin: 0px; }';
		$slidr_css .= '#slider ul, #slider li{ margin:0; padding:0; height: 206px; width: 286px; list-style:none; overflow:hidden; }';
		$slidr_css .= '#slider li{ margin: 0px; overflow:hidden; text-align: center; }';
		$slidr_css .= '#slider p{ padding: 22px;overflow:hidden; }';
		$slidr_css .= '#slider a{ text-decoration: none; color: #000; }';
		$slidr_css .= '#slider a:hover{ text-decoration: none; }';
		$slidr_css .= '#nextBtn, #prevBtn { font-weight: bold; font-size: 10px; background-color: #f0f0f0; padding: 5px 10px; float: right; margin-top: -30px; position: relative; }';
		$slidr_css .= '#nextBtn { margin-right: 20px; z-index: 200; }';
		$slidr_css .= '#prevBtn { z-index: 200; }';
		$slidr_css .= '</style>';
		
		// INICIA EL HTML ********************************************************************************
		$slidr = '';
	    $slidr .= '<div id="sliders">';
		$slidr .= '<div id="anuncios">';
		if (is_home()) {
			$slidr .= '<div id="slider">';
			$slidr .= '	<ul>';
			$slidr .= '		<li>';
			$slidr .= '			<a href="'.$img1['url'].'"><img src="'.$img1['src'].'" alt="1" /></a>';
			$slidr .= '		</li>';
			$slidr .= '		<li>';
			$slidr .= '			<a href="'.$img2['url'].'"><img src="'.$img2['src'].'" alt="2" /></a>';
			$slidr .= '		</li>';
			$slidr .= '		<li>';
			$slidr .= '			<a href="'.$img3['url'].'"><img src="'.$img3['src'].'" alt="3" /></a>';
			$slidr .= '		</li>';
			$slidr .= '		<li>';
			$slidr .= '			<a href="'.$img4['url'].'"><img src="'.$img4['src'].'" alt="4" /></a>';
			$slidr .= '		</li>';
			$slidr .= '		<li>';
			$slidr .= '			<a href="'.$img5['url'].'"><img src="'.$img5['src'].'" alt="5" /></a>';
			$slidr .= '		</li>';
			$slidr .= '	</ul>';
			$slidr .= '</div>';
			$slidr .= '<br /><br />';
 		}
		$slidr .= '</div>';
		$slidr .= '<div style="clear:both"></div>';
		$slidr .= '</div>';
	
	    return $slidr_js.$slidr_css.$slidr;
	}
	
	function widget_anunciossliderwidget($args) {
	    extract($args);
		echo $before_widget;
		echo $before_title. 'Anuncios Slider Widget' . $after_title;
	    echo do_shortcode('[an_slider]');
		echo $after_widget;
		
	}
	register_sidebar_widget('Anuncios Slider Widget','widget_anunciossliderwidget');
	
	add_action('admin_menu', 'anuncios_admin_actions');
	add_shortcode('an_slider', 'f_an_slider');

?>
