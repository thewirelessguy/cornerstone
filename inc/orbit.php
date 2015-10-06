<?php
/**
 * Orbit
 *
 * Orbit is an easy, powerful, responsive image slider that allows users to
 * swipe on touch-enabled devices.
 *
 * Orbit has been deprecated, meaning that it is no longer supported.
 * There's no need to worry though as Zurb decided to leave it in Foundation.
 *
 * @link http://foundation.zurb.com/docs/components/orbit.html
 *
 * @package WordPress
 * @subpackage Cornerstone
 * @since Cornerstone 1.0.0
 */

/**
 * Orbit custom post type
 */
add_action('init', 'Orbit');
if ( ! function_exists( 'Orbit' ) ) {
	function Orbit() {
		$Orbit_args = array(
			'label'	=> __('Orbit Slider'),
			'singular_label' =>	__('Orbit'),
			'public'	=>	true,
			'show_ui'	=>	true,
			'capability_type'	=>	'post',
			'hierarchical'	=>	false,
			'rewrite'	=>	true,
			'supports'	=>	array('title', 'editor','page-attributes','thumbnail','custom-fields'),
			'taxonomies' => array('category','post_tag')
			);
			register_post_type('Orbit', $Orbit_args);
	}
}

/**
 * Meta box
 */
add_action( 'add_meta_boxes', 'orbit_meta_box_add' );
if ( ! function_exists( 'orbit_meta_box_add' ) ) {
	function orbit_meta_box_add() {
		add_meta_box( 'orbit-meta-box-id', 'Additional Orbit slider options', 'orbit_meta_box', 'Orbit', 'normal', 'high' );
	}
}

if ( ! function_exists( 'orbit_meta_box' ) ) {
	function orbit_meta_box( $post ) {
		$values = get_post_custom( $post->ID );
		$caption = isset( $values['_orbit_meta_box_caption_text'] ) ? esc_attr( $values['_orbit_meta_box_caption_text'][0] ) : '';
		$link = isset( $values['_orbit_meta_box_link_text'] ) ? esc_attr( $values['_orbit_meta_box_link_text'][0] ) : '';
		wp_nonce_field( 'orbit_meta_box_nonce', 'meta_box_nonce' );
		?>
		<p>
			<label for="_orbit_meta_box_caption_text">Caption</label>
			<textarea id="orbit_meta_box_caption_text" class="widefat" name="_orbit_meta_box_caption_text"><?php echo esc_attr( $caption ); ?></textarea>
		</p>
		<p>
			<label for="_orbit_meta_box_link_text">Link</label>
			<input type="text" id="orbit_meta_box_link_text" class="widefat" name="_orbit_meta_box_link_text" value="<?php echo $link; ?>" />
		</p>
		<?php
	}
}

add_action( 'save_post', 'orbit_meta_box_save' );
if ( ! function_exists( 'orbit_meta_box_save' ) ) {
	function orbit_meta_box_save( $post_id ) {
		// Bail if we're doing an auto save
		if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

		// if our nonce isn't there, or we can't verify it, bail
		if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'orbit_meta_box_nonce' ) ) return;

		// if our current user can't edit this post, bail
		if( !current_user_can( 'edit_post' ) ) return;

		// now we can actually save the data
		$allowed = array(
			'a' => array( // on allow a tags
				'href' => array() // and those anchords can only have href attribute
			)
		);

		// Probably a good idea to make sure your data is set
		if( isset( $_POST['_orbit_meta_box_caption_text'] ) )
			update_post_meta( $post_id, '_orbit_meta_box_caption_text', wp_kses( $_POST['_orbit_meta_box_caption_text'], $allowed ) );
		if( isset( $_POST['_orbit_meta_box_link_text'] ) )
			update_post_meta( $post_id, '_orbit_meta_box_link_text', wp_kses( $_POST['_orbit_meta_box_link_text'], $allowed ) );
	}
}

/**
 * Display Orbit Slider
 * Simple: <?php OrbitSlider(); ?>
 * Advanced: <?php OrbitSlider($orbitparam, $orbitsize); ?>
 * Advanced example: <?php OrbitSlider("slide_number: false; bullets: false", "large"); ?>
 */
if ( ! function_exists( 'OrbitSlider' ) ) {
	function OrbitSlider($orbitparam = null, $orbitsize = null) {

		$args = array( 'post_type' => 'Orbit');
		$loop = new WP_Query( $args );

		if($orbitparam != '') {
			echo '<ul data-orbit data-options="' . $orbitparam . '">';
		} else {
			echo '<ul data-orbit>';
		}

			while ( $loop->have_posts() ) : $loop->the_post();

				if(has_post_thumbnail()) {

					if($orbitsize != '') {
						$orbitimagethumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), $orbitsize);
						$orbitimage = $orbitimagethumbnail['0'];
					} else {
						$orbitimagefull = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'thumbnail_size');
						$orbitimage = $orbitimagefull['0'];
					}
					$orbitimagealttext = get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true);
					$orbitcaption = get_post_meta(get_the_ID(), '_orbit_meta_box_caption_text', true );
					$orbitlink = get_post_meta(get_the_ID(), '_orbit_meta_box_link_text', true );
					echo '<li>';
					if($orbitlink != '') {echo '<a href="' . $orbitlink . '">';}
					echo '<img src="'. $orbitimage . '" alt="' . $orbitimagealttext . '"/>';
					if($orbitcaption != '') {echo '<div class="orbit-caption">' . $orbitcaption . '</div>';}
					if($orbitlink != '') {echo '</a>';}
					echo '</li>';

				} else {

					echo '<li><h2>';
					the_title();
					echo '</h2>';
					the_content();
					echo '</li>';

				}

			endwhile;

			echo '</ul>';
	}
}