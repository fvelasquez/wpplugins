<?php 
	/*
	Plugin Name: Anuncios del sitio
	Plugin URI: http://www.branding-machine.com/wpplugins/detalles
	Description: Configuración de partes especiales del sitio
	Author: Frisley Velasquez
	Version: 0.0.1
	Author URI: http://www.branding-machine.com
	*/

	function detalles_admin() {
		include('Detalles_Files/detalles_admin.php');
	}
		
	
	function detalles_admin_actions() {
		add_options_page("Anuncios del sitio", "Anuncios del sitio", 1, "AnunciosSitio", "detalles_admin");	
	}
	
	function transmicionenvivo() {
	    
	    $transmicion 	= get_option('transmicionenvivo');
	    $transmicionurl = get_option('transmicionurl');
	    
	    switch($transmicion)
	    {
	    	case "A":
	    		$trv_img = 'transmision.gif';
	    	break;
	    	case "B":
	    		$trv_img = 'transmision-offline.jpg';
	    	break;
	    	default:
	    		$trv_img = 'transmision-offline.jpg';
	    	break;
	    }
	    
	    $plugin_directory = plugin_dir_url(__FILE__);
	    if($transmicionurl != '' && $transmicion == 'A'){
	    	$trv_img = '<a href="'.$transmicionurl.'"><img src="'.$plugin_directory.'Detalles_Files/'.$trv_img.'" border="0" /></a>';
	    }else{
	    	$trv_img = '<img src="'.$plugin_directory.'Detalles_Files/'.$trv_img.'" />';
	    }
	    
	    return $trv_img;
	}
	
	function actualizacionessemanales() {
	    
	    $fechaactualiza = get_option('fechaactualiza');
		$pedicaname		= get_option('pedicaname');
		$predicador		= get_option('predicador');
		$pedicalink		= get_option('pedicalink');
		$videolink		= get_option('videolink');
		$fotolink		= get_option('fotolink');
	    $plugin_directory = plugin_dir_url(__FILE__);
		
		$css = '
			<style>
				#videolink h3
				{
					float: left;
					margin-left: 70px;
					position: absolute;
					color: #FFFFFF;
				}
				#videolink h4
				{
					color: #FFFFFF;
					float: left;
					margin-left: 60px;
					margin-top: 28px;
					position: absolute;
				}
			</style>
		';
		
			$head = '<img src="'.$plugin_directory.'Detalles_Files/imagen-actualizaciones.jpg" border="0" />';
		
	    //Video
	    	$vid  = '<div id="videolink">';
	    	$vid .= '<a href="'.$videolink.'"><h3>'.$pedicaname.'</h3>';
	    	$vid .= '<h4>'.$predicador.'</h4>';
	      	$vid .= '<img src="'.$plugin_directory.'Detalles_Files/imagen-video.jpg" border="0" /></a>';
	    	$vid .= '</div>';
	    //Fotos
	    	$fot  = '<div id="videolink">';
	    	$fot .= '<a href="'.$fotolink.'"><h3>Fotograf&iacute;as</h3>';
	    	$fot .= '<h4>'.$fechaactualiza.'</h4>';
	      	$fot .= '<img src="'.$plugin_directory.'Detalles_Files/imagen-fotos.jpg" border="0" /></a>';
	    	$fot .= '</div>';
	    //Predica
	    	$pre  = '<div id="videolink">';
	    	$pre .= '<a href="'.$pedicalink.'"><h3>'.$pedicaname.'</h3>';
	    	$pre .= '<h4>'.$fechaactualiza.'</h4>';
	      	$pre .= '<img src="'.$plugin_directory.'Detalles_Files/imagen-predicas.jpg" border="0" /></a>';
	    	$pre .= '</div>';
	    	    
	    return $css . $head . $vid . $fot . $pre;
	}
	
	add_action('admin_menu', 'detalles_admin_actions');
	add_shortcode('tnv_live', 'transmicionenvivo');
	add_shortcode('act_semanal', 'actualizacionessemanales');

?>
