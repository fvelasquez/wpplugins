	<?php 
		if($_POST['detalles_hidden'] == 'Y') {
			//Form data sent
			$imagen1 = $_POST['img1'];
			update_option('img1', $imagen1);
			$imagen1url = $_POST['img1url'];
			update_option('img1url', $imagen1url);
			
			
			$imagen2 = $_POST['img2'];
			update_option('img2', $imagen2);
			$imagen2url = $_POST['img2url'];
			update_option('img2url', $imagen2url);
			
			
			$imagen3 = $_POST['img3'];
			update_option('img3', $imagen3);
			$imagen3url = $_POST['img3url'];
			update_option('img3url', $imagen3url);

			$transmicion = $_POST['transmicion'];
			update_option('transmicionenvivo', $transmicion);
			$transmicionurl = $_POST['transmicionurl'];
			update_option('transmicionurl', $transmicionurl);
			
			$fechaactualiza = $_POST['fechaactualiza'];
			update_option('fechaactualiza', $fechaactualiza);
			$videolink = $_POST['videolink'];
			update_option('videolink', $videolink);
			$fotolink = $_POST['fotolink'];
			update_option('fotolink', $fotolink);
			$pedicaname = $_POST['pedicaname'];
			update_option('pedicaname', $pedicaname);
			$predicador = $_POST['predicador'];
			update_option('predicador', $predicador);
			$pedicalink = $_POST['pedicalink'];
			update_option('pedicalink', $pedicalink);
			
			?>
			<div class="updated"><p><strong><?php _e('Configuraciones actualizadas.' ); ?></strong></p></div>
			<?php
		} else {
		
			$imagen1 = get_option('img1');
			$imagen1url = get_option('img1url');
			$imagen2 = get_option('img2');
			$imagen2url = get_option('img2url');
			$imagen3 = get_option('img3');
			$imagen3url = get_option('img3url');
			
			$transmicion = get_option('transmicionenvivo');
			$transmicionurl = get_option('transmicionurl');
			
			$fechaactualiza = get_option('fechaactualiza');
			$pedicaname		= get_option('pedicaname');
			$predicador		= get_option('predicador');
			$pedicalink		= get_option('pedicalink');
			$videolink		= get_option('videolink');
			$fotolink		= get_option('fotolink');
			
		}
		
	function my_admin_scripts() {
		wp_enqueue_script('media-upload');
		wp_enqueue_script('thickbox');
		wp_register_script('my-upload', WP_PLUGIN_URL.'/my-script.js', array('jquery','media-upload','thickbox'));
		wp_enqueue_script('my-upload');
	}

	function my_admin_styles() {
		wp_enqueue_style('thickbox');
	}

	if (isset($_GET['page']) && $_GET['page'] == 'my_plugin_page') {
		add_action('admin_print_scripts', 'my_admin_scripts');
		add_action('admin_print_styles', 'my_admin_styles');
	}

	?>
	<script>
	jQuery(document).ready(function() {
		
		var formfield;
		
		jQuery('#upload_image_button').click(function() {
			formfield = jQuery('#img1').attr('name');
			tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
			return false;
		});
		
		jQuery('#upload_image_button2').click(function() {
			formfield = jQuery('#img2').attr('name');
			tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
			return false;
		});
		
		jQuery('#upload_image_button3').click(function() {
			formfield = jQuery('#img3').attr('name');
			tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
			return false;
		});
		
		window.send_to_editor = function(html) {
			imgurl = jQuery('img',html).attr('src');
			jQuery('#'+formfield).val(imgurl);
			tb_remove();
		}

	});
	</script>
		
		<div class="wrap">
			<h2>Imagenes para el Banner Rotativo</h2>
			<p>Las imagenes del banner rotativo deben tener un tama&ntilde;o de 286 pixeles de ancho por 200 pixeles de alto</p>
			
			<form name="detalles_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
				<input type="hidden" name="detalles_hidden" value="Y">
		
				<h4>Anuncio 1</h4>
				<p><input type="text" name="img1" id="img1" value="<?php echo $imagen1; ?>" size="50">
					<input id="upload_image_button" type="button" value="Upload Image" />
				</p>
				<p><?php _e("Link de la imagen: " ); ?><br>
					<input type="text" name="img1url" value="<?php echo $imagen1url; ?>" size="50"></p>

				<h4>Anuncio 2</h4>				
				<p><input type="text" name="img2" id="img2" value="<?php echo $imagen2; ?>" size="50">
					<input id="upload_image_button2" type="button" value="Upload Image" />
				</p>
				<p><?php _e("Link de la imagen: " ); ?><br>
					<input type="text" name="img2url" value="<?php echo $imagen2url; ?>" size="50"></p>

				<h4>Anuncio 3</h4>
				<p><input type="text" name="img3" id="img3" value="<?php echo $imagen3; ?>" size="50">
					<input id="upload_image_button3" type="button" value="Upload Image" />
				</p>
				<p><?php _e("Link de la imagen: " ); ?><br>
					<input type="text" name="img3url" value="<?php echo $imagen3url; ?>" size="50"></p>
				
				<!-- CONTROLES DE TRANSMISION EN VIVO -->
				<h2>Transmisi&oacute;n en vivo:</h2>
				
				<p>
					<strong>Transmisi&oacute;n Activa: </strong> <input type="radio" name="transmicion" id="transmicion" value="A" <?php if($transmicion != '' && $transmicion == 'A'){echo 'checked="checked"';} ?>><br />
					<strong>Transmisi&oacute;n Inactiva: </strong> <input type="radio" name="transmicion" id="transmicion" value="B" <?php if($transmicion != '' && $transmicion == 'B'){echo 'checked="checked"';} ?>>
				</p>
				<p><?php _e("Link de pagina que tiene la transmisi&oacute;n: " ); ?><br>
					<input type="text" name="transmicionurl" value="<?php echo $transmicionurl; ?>" size="50"></p>

				<!-- CONTROLES DE BOTONES ACTUALIZABLES -->
				<h2>Actualizaciones Semanales:</h2>
				<h4>Datos de Predica:</h4>
				<p>Nombre de Predica:<br />
				<input type="text" name="pedicaname" id="pedicaname" value="<?php echo $pedicaname; ?>" size="50">
				</p>
				<p>Nombre del Predicador:<br />
				<input type="text" name="predicador" id="predicador" value="<?php echo $predicador; ?>" size="50">
				</p>
				<p>Fecha de actualizaci&oacute;n:<br />
				<input type="text" name="fechaactualiza" id="fechaactualiza" value="<?php echo $fechaactualiza; ?>" size="50">
				</p>
				
				<h4>Video:</h4>
				<p>Link al video: <br />
				<input type="text" name="videolink" id="videolink" value="<?php echo $videolink; ?>" size="50">
				</p>
				
				<h4>Fotograf&iacute;as:</h4>
				<p>Link al album de flickr: <br />
				<input type="text" name="fotolink" id="fotolink" value="<?php echo $fotolink; ?>" size="50">
				</p>
				
				<h4>Pr&eacute;dica:</h4>
				<p>Link a p&aacute;gina de pr&eacute;dica: <br />
				<input type="text" name="pedicalink" id="pedicalink" value="<?php echo $pedicalink; ?>" size="50">
				</p>
				
				<p class="submit">
				<input type="submit" name="Submit" value="<?php _e('Actualizar Configuraciones', 'oscimp_trdom' ) ?>" />
				</p>
				
			</form>
		</div>
	