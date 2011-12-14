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
			
			$imagen4 = $_POST['img4'];
			update_option('img4', $imagen4);
			$imagen4url = $_POST['img4url'];
			update_option('img4url', $imagen4url);
			
			$imagen5 = $_POST['img5'];
			update_option('img5', $imagen5);
			$imagen5url = $_POST['img5url'];
			update_option('img5url', $imagen5url);

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
			$imagen4 = get_option('img4');
			$imagen4url = get_option('img4url');
			$imagen5 = get_option('img5');
			$imagen5url = get_option('img5url');
			
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
		
		jQuery('#upload_image_button4').click(function() {
			formfield = jQuery('#img4').attr('name');
			tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
			return false;
		});
		
		jQuery('#upload_image_button5').click(function() {
			formfield = jQuery('#img5').attr('name');
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
				
				<h4>Anuncio 4</h4>
				<p><input type="text" name="img4" id="img4" value="<?php echo $imagen4; ?>" size="50">
					<input id="upload_image_button4" type="button" value="Upload Image" />
				</p>
				<p><?php _e("Link de la imagen: " ); ?><br>
					<input type="text" name="img4url" value="<?php echo $imagen4url; ?>" size="50">
				</p>
				
				<h4>Anuncio 5</h4>
				<p><input type="text" name="img5" id="img5" value="<?php echo $imagen5; ?>" size="50">
					<input id="upload_image_button5" type="button" value="Upload Image" />
				</p>
				<p><?php _e("Link de la imagen: " ); ?><br>
					<input type="text" name="img5url" value="<?php echo $imagen5url; ?>" size="50">
				</p>
				
				<p class="submit">
				<input type="submit" name="Submit" value="<?php _e('Actualizar Anuncios', 'oscimp_trdom' ) ?>" />
				</p>
				
			</form>
		</div>
	