<?php

function heart_and_style_category_options_add( $tag ) {

    $mrd_category_meta = get_option( 'mrd_category_meta' );

    ?>

    <tr class="form-field">
        <th scope="row" valign="top"><label for="mrd-category-img"><?php _e( 'Image URL', 'heart-and-style'); ?></label></th>
        <td>
            <input type="text" id="mrd-category-img" name="mrd_category_meta[<?php echo esc_attr( $tag->term_id ); ?>][mrd_category_img]" value="<?php if ( isset( $mrd_category_meta[ $tag->term_id ] ) ) echo esc_attr( $mrd_category_meta[ $tag->term_id ]['mrd_category_img'] ); ?>" />
            <p class="description"><?php _e( 'Enter the URL to the image. Will be shown as background image below the header when viewing a category archive.', 'heart-and-style' ); ?></p>
        </td>
    </tr>
    
    <?php

} add_action( 'edit_category_form_fields', 'heart_and_style_category_options_add' );

function heart_and_style_category_options_save() {

    if ( isset( $_POST['mrd_category_meta'] ) ) {

        if ( get_option('mrd_category_meta' ) ) {
            $current_options = get_option( 'mrd_category_meta' );
        } else {
            $current_options = array();
        }

        $post_info = $_POST['mrd_category_meta'];
        if ( is_array( $post_info ) ) {
            foreach( $post_info as $key => $value ) {
                $current_options[$key] = $value;
            }
        }

        update_option('mrd_category_meta', $current_options);
        
    }

} add_action( 'edit_category', 'heart_and_style_category_options_save' );

function heart_and_style_tag_options_add( $tag ) {

    $mrd_tags_meta = get_option( 'mrd_tags_meta' );

    ?>

    <tr class="form-field">
        <th scope="row" valign="top"><label for="mrd-tag-img"><?php _e( 'Image URL', 'heart-and-style'); ?></label></th>
        <td>
            <input type="text" id="mrd-tag-img" name="mrd_tags_meta[<?php echo esc_attr( $tag->term_id ); ?>][mrd_tag_img]" value="<?php if ( isset( $mrd_tags_meta[ $tag->term_id ] ) ) echo esc_attr( $mrd_tags_meta[ $tag->term_id ]['mrd_tag_img'] ); ?>" />
            <p class="description"><?php _e( 'Enter the URL to the image. Will be shown as background image below the header when viewing a tag archive.', 'heart-and-style' ); ?></p>
        </td>
    </tr>
    
    <?php

} add_action( 'edit_tag_form_fields', 'heart_and_style_tag_options_add' );

function heart_and_style_tags_options_save() {

    if ( isset( $_POST['mrd_tags_meta'] ) ) {

        if ( get_option('mrd_tags_meta' ) ) {
            $current_options = get_option( 'mrd_tags_meta' );
        } else {
            $current_options = array();
        }

        $post_info = $_POST['mrd_tags_meta'];
        if ( is_array( $post_info ) ) {
            foreach( $post_info as $key => $value ) {
                $current_options[$key] = $value;
            }
        }

        update_option('mrd_tags_meta', $current_options);
        
    }

} add_action( 'edit_post_tag', 'heart_and_style_tags_options_save' );