<?php

function heart_and_style_show_extra_profile_fields( $user ) {
	
	?>

	<h3><?php _e( 'Social Profiles', 'heart-and-style' ); ?></h3>

	<table class="form-table">

		<tr>
			<th><label for="heart_and_style_twitter"><?php _e( 'Twitter', 'heart-and-style' ); ?></label></th>
			<td>
				<input type="text" name="heart_and_style_twitter" id="heart_and_style_twitter" value="<?php echo esc_attr( get_the_author_meta( 'heart_and_style_twitter', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description"><?php _e( 'The URL to your profile.', 'heart-and-style' ); ?></span>
			</td>
		</tr>

		<tr>
			<th><label for="heart_and_style_facebook"><?php _e( 'Facebook', 'heart-and-style' ); ?></label></th>
			<td>
				<input type="text" name="heart_and_style_facebook" id="heart_and_style_facebook" value="<?php echo esc_attr( get_the_author_meta( 'heart_and_style_facebook', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description"><?php _e( 'The URL to your profile.', 'heart-and-style' ); ?></span>
			</td>
		</tr>

		<tr>
			<th><label for="heart_and_style_instagram"><?php _e( 'Instagram', 'heart-and-style' ); ?></label></th>
			<td>
				<input type="text" name="heart_and_style_instagram" id="heart_and_style_instagram" value="<?php echo esc_attr( get_the_author_meta( 'heart_and_style_instagram', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description"><?php _e( 'The URL to your profile.', 'heart-and-style' ); ?></span>
			</td>
		</tr>

		<tr>
			<th><label for="heart_and_style_behance"><?php _e( 'Behance', 'heart-and-style' ); ?></label></th>
			<td>
				<input type="text" name="heart_and_style_behance" id="heart_and_style_behance" value="<?php echo esc_attr( get_the_author_meta( 'heart_and_style_behance', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description"><?php _e( 'The URL to your profile.', 'heart-and-style' ); ?></span>
			</td>
		</tr>

		<tr>
			<th><label for="heart_and_style_dribbble"><?php _e( 'Dribbble', 'heart-and-style' ); ?></label></th>
			<td>
				<input type="text" name="heart_and_style_dribbble" id="heart_and_style_dribbble" value="<?php echo esc_attr( get_the_author_meta( 'heart_and_style_dribbble', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description"><?php _e( 'The URL to your profile.', 'heart-and-style' ); ?></span>
			</td>
		</tr>

	</table>

	<?php

} add_action( 'show_user_profile', 'heart_and_style_show_extra_profile_fields' ); add_action( 'edit_user_profile', 'heart_and_style_show_extra_profile_fields' );

function heart_and_style_save_extra_profile_fields( $user_id ) {

	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;

	update_user_meta( $user_id, 'heart_and_style_twitter', $_POST['heart_and_style_twitter'] );
	update_user_meta( $user_id, 'heart_and_style_facebook', $_POST['heart_and_style_facebook'] );
	update_user_meta( $user_id, 'heart_and_style_instagram', $_POST['heart_and_style_instagram'] );
	update_user_meta( $user_id, 'heart_and_style_behance', $_POST['heart_and_style_behance'] );
	update_user_meta( $user_id, 'heart_and_style_dribbble', $_POST['heart_and_style_dribbble'] );

} add_action( 'personal_options_update', 'heart_and_style_save_extra_profile_fields' ); add_action( 'edit_user_profile_update', 'heart_and_style_save_extra_profile_fields' );