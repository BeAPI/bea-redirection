<?php
add_action('admin_menu', 'add_page_template' );

function add_page_template() {
 	add_theme_page('Redirection settings', __('Redirection settings', 'redirection'), 'manage_options', 'redirection-theme-settings', 'redirection_theme_page' );
}

function redirection_theme_page() {
	$text = '';
	if ( isset($_POST['update_theme_options']) ) {
		if ( 
			! isset( $_POST['update_theme_options_field'] ) 
			|| ! wp_verify_nonce( $_POST['update_theme_options_field'], 'update_theme_options' ) 
		) {
			wp_die('Sorry, your nonce did not verify.');
		}

		$_POST['redirection_url'] = stripslashes($_POST['redirection_url']);
		update_option('redirection_url', $_POST['redirection_url'] );

		$text =  '<div id="setting-error-settings_updated" class="updated settings-error notice is-dismissible"><p><strong>Settings saved.</strong></p></div>';
	}

	$redirection = get_option('redirection_url');
	?>
	<div class="wrap">
		<h2><?php _e('Redirection settings', 'redirection'); ?></h2>
		<?php echo $text; ?>
		<form action="" method="POST"> 
			<table class="form-table">
				<tr>
					<th scope="row"><?php _e('Redirection URL', 'redirection'); ?></th>
					<td>
						<input type="text" name="redirection_url" value="<?php echo esc_attr($redirection);?>" class="widefat" />
					</td>
				</tr>	
			</table>

			<?php wp_nonce_field( 'update_theme_options', 'update_theme_options_field' ); ?>
			<p class="submit">
				<input class="button-primary" type="submit" name="update_theme_options" value="<?php _e('Update settings', 'redirection'); ?>" /></p>
		</form>
	</div>
	<?php
}
