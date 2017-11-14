<?php

// Latest posts with thumbs
class Widget_Themeblossom_Instagram extends WP_Widget {

	function __construct() {
		$widget_ops = array( 'description' => 'Show your Instagram feed' );
		parent::__construct( false, esc_html__( 'ThemeBlossom Instagram', 'liberty' ), $widget_ops );
	}
	
	function widget( $args, $instance ) {
		
		extract($args);

		$title = empty( $instance['title'] ) ? '' : apply_filters( 'widget_title', $instance['title'] );
		$username = empty( $instance['username'] ) ? '' : $instance['username'];
		$limit = empty( $instance['number'] ) ? 8 : $instance['number'];
		$number_of_columns = empty( $instance['number_of_columns'] ) ? 4 : $instance['number_of_columns'];
		$number_of_columns_xs = empty( $instance['number_of_columns_xs'] ) ? 2 : $instance['number_of_columns_xs'];
		$size = empty( $instance['size'] ) ? 'large' : $instance['size'];
		$target = empty( $instance['target'] ) ? '_self' : $instance['target'];
		$only_img = empty( $instance['only_img'] ) ? 'yes' : $instance['only_img'];		
		$with_padding = empty( $instance['with_padding'] ) ? 'yes' : $instance['with_padding'];		
		$link = empty( $instance['link'] ) ? '' : $instance['link'];

		echo '' . $before_widget;

		if ( ! empty( $title ) ) { echo "$before_title" . esc_attr( $title ) . $after_title; };

		if ( $username != '' ) {

			$media_array = $this->scrape_instagram( $username, $limit );

			if ( is_wp_error( $media_array ) ) {

				echo wp_kses_post( $media_array->get_error_message() );

			} else {

				// filter for images only?
				if ( $only_img != 'no' ) {
					$media_array = array_filter( $media_array, array( $this, 'images_only' ) );
				}

				$image_h_class = 'col-md-' . ceil(12 / $number_of_columns) . ' col-xs-' . ceil(12 / $number_of_columns_xs);

				if ($with_padding == 'no') {
					$image_h_class .= ' nopadding ';
					$row_class = '';
				} else {
					$row_class = 'row';
				}

				if ($target == '_blank') {
					$target_e = ' target="_blank" ';
					$img_link = esc_url( $item['link'] );
					$data_rel = '';
				} else {
					$target_e = '';
					$img_link = false;
					$mt_rand_val = mt_rand();
					$data_rel = ' rel="prettyPhoto[instagram_gallery_' . $mt_rand_val . ']" data-rel="prettyPhoto[instagram_gallery_' . $mt_rand_val . ']" ';
				}

				?>

				<div class="themeblossom_instagram <?php echo esc_attr($row_class); ?>">

				<?php
				foreach ( $media_array as $item ) {
					if ($target != '_blank') {
						$img_link = esc_url( $item['original']);
					}
					echo '<div class="'. esc_attr( $image_h_class ) .'"><a href="'. $img_link .'"' . $target_e . $data_rel . ' class="opacity90"><img src="'. esc_url( $item[$size] ) .'"  alt="'. wp_trim_words(esc_attr( $item['description'] ), 20) .'" title="'. wp_trim_words(esc_attr( $item['description'] ), 20) .'"/></a></div>';
				}
				?>

				</div>

				<?php
			}
		}

		if ( $link != '' ) {
			?>
			<p class="textaligncenter padding15">
				<a href="//instagram.com/<?php echo esc_attr( trim( $username ) ); ?>" rel="me" target="_blank" class="btn btn-md btn-tb-primary">
				<?php echo esc_attr( $link ); ?>
				</a>
			</p>
		<?php
		}
		
		echo '' . $after_widget . '<div class="clearfix"></div>';
	}
	
	function update( $new_instance, $old_instance ) {

		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['username'] = trim( strip_tags( $new_instance['username'] ) );
		$instance['number'] = ! absint( $new_instance['number'] ) ? 8 : $new_instance['number'];
		$instance['number_of_columns'] = ! absint( $new_instance['number_of_columns'] ) ? 4 : $new_instance['number_of_columns'];
		$instance['number_of_columns_xs'] = ! absint( $new_instance['number_of_columns_xs'] ) ? 2 : $new_instance['number_of_columns_xs'];
		$instance['size'] = ( ( $new_instance['size'] == 'thumbnail' || $new_instance['size'] == 'large' || $new_instance['size'] == 'small' || $new_instance['size'] == 'original' ) ? $new_instance['size'] : 'large' );
		$instance['target'] = ( ( $new_instance['target'] == '_self' || $new_instance['target'] == '_blank' ) ? $new_instance['target'] : '_self' );
		$instance['only_img'] = ( ( $new_instance['only_img'] == 'yes' || $new_instance['only_img'] == 'no' ) ? $new_instance['only_img'] : 'yes' );
		$instance['with_padding'] = ( ( $new_instance['with_padding'] == 'yes' || $new_instance['with_padding'] == 'no' ) ? $new_instance['with_padding'] : 'yes' );
		$instance['link'] = strip_tags( $new_instance['link'] );
		
		return $instance;
	}
	
	function form( $instance ) {

		$instance = wp_parse_args( (array) $instance, array( 
			'title'=> __('Instagram', 'liberty'),
			'username' => '',
			'size' => 'large',
			'link' => __( 'Follow Me!', 'liberty' ),
			'number' => 8,
			'number_of_columns' => 4,
			'number_of_columns_xs' => 2,
			'only_img' => 'yes',
			'with_padding' => 'yes',
			'target' => '_self'
		) );
	
	?>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'liberty' ); ?>: <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" /></label></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'username' ) ); ?>"><?php esc_html_e( 'Username', 'liberty' ); ?>: <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'username' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'username' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['username'] ); ?>" /></label></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of photos', 'liberty' ); ?>: <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['number'] ); ?>" /></label></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'number_of_columns' ) ); ?>"><?php esc_html_e( 'Number of columns', 'liberty' ); ?>:</label>
			<select id="<?php echo esc_attr( $this->get_field_id( 'number_of_columns' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number_of_columns' ) ); ?>" class="widefat">
				<option value="1" <?php selected( '1', $instance['number_of_columns'] ) ?>><?php esc_html_e( '1 Column', 'liberty' ); ?></option>
				<option value="2" <?php selected( '2', $instance['number_of_columns'] ) ?>><?php esc_html_e( '2 Columns', 'liberty' ); ?></option>
				<option value="3" <?php selected( '3', $instance['number_of_columns'] ) ?>><?php esc_html_e( '3 Columns', 'liberty' ); ?></option>
				<option value="4" <?php selected( '4', $instance['number_of_columns'] ) ?>><?php esc_html_e( '4 Columns', 'liberty' ); ?></option>
				<option value="6" <?php selected( '6', $instance['number_of_columns'] ) ?>><?php esc_html_e( '6 Columns', 'liberty' ); ?></option>
				<option value="12" <?php selected( '12', $instance['number_of_columns'] ) ?>><?php esc_html_e( '12 Columns', 'liberty' ); ?></option>
			</select>
		</p>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'number_of_columns_xs' ) ); ?>"><?php esc_html_e( 'Number of columns - Small devices', 'liberty' ); ?>:</label>
			<select id="<?php echo esc_attr( $this->get_field_id( 'number_of_columns_xs' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number_of_columns_xs' ) ); ?>" class="widefat">
				<option value="1" <?php selected( '1', $instance['number_of_columns_xs'] ) ?>><?php esc_html_e( '1 Column', 'liberty' ); ?></option>
				<option value="2" <?php selected( '2', $instance['number_of_columns_xs'] ) ?>><?php esc_html_e( '2 Columns', 'liberty' ); ?></option>
				<option value="3" <?php selected( '3', $instance['number_of_columns_xs'] ) ?>><?php esc_html_e( '3 Columns', 'liberty' ); ?></option>
				<option value="4" <?php selected( '4', $instance['number_of_columns_xs'] ) ?>><?php esc_html_e( '4 Columns', 'liberty' ); ?></option>
				<option value="6" <?php selected( '6', $instance['number_of_columns_xs'] ) ?>><?php esc_html_e( '6 Columns', 'liberty' ); ?></option>
				<option value="12" <?php selected( '12', $instance['number_of_columns_xs'] ) ?>><?php esc_html_e( '12 Columns', 'liberty' ); ?></option>
			</select>
		</p>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'size' ) ); ?>"><?php esc_html_e( 'Photo size', 'liberty' ); ?>:</label>
			<select id="<?php echo esc_attr( $this->get_field_id( 'size' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'size' ) ); ?>" class="widefat">
				<option value="thumbnail" <?php selected( 'thumbnail', $instance['size'] ) ?>><?php esc_html_e( 'Thumbnail', 'liberty' ); ?></option>
				<option value="small" <?php selected( 'small', $instance['size'] ) ?>><?php esc_html_e( 'Small', 'liberty' ); ?></option>
				<option value="large" <?php selected( 'large', $instance['size'] ) ?>><?php esc_html_e( 'Large', 'liberty' ); ?></option>
				<option value="original" <?php selected( 'original', $instance['size'] ) ?>><?php esc_html_e( 'Original', 'liberty' ); ?></option>
			</select>
		</p>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'only_img' ) ); ?>"><?php esc_html_e( 'Show only images?', 'liberty' ); ?>:</label>
			<select id="<?php echo esc_attr( $this->get_field_id( 'only_img' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'only_img' ) ); ?>" class="widefat">
				<option value="yes" <?php selected( 'yes', $instance['only_img'] ) ?>><?php esc_html_e( 'Yes', 'liberty' ); ?></option>
				<option value="no" <?php selected( 'no', $instance['only_img'] ) ?>><?php esc_html_e( 'No', 'liberty' ); ?></option>
			</select>
		</p>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'with_padding' ) ); ?>"><?php esc_html_e( 'Show space between images?', 'liberty' ); ?>:</label>
			<select id="<?php echo esc_attr( $this->get_field_id( 'with_padding' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'with_padding' ) ); ?>" class="widefat">
				<option value="yes" <?php selected( 'yes', $instance['with_padding'] ) ?>><?php esc_html_e( 'Yes', 'liberty' ); ?></option>
				<option value="no" <?php selected( 'no', $instance['with_padding'] ) ?>><?php esc_html_e( 'No', 'liberty' ); ?></option>
			</select>
		</p>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'target' ) ); ?>"><?php esc_html_e( 'Open images in', 'liberty' ); ?>:</label>
			<select id="<?php echo esc_attr( $this->get_field_id( 'target' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'target' ) ); ?>" class="widefat">
				<option value="_self" <?php selected( '_self', $instance['target'] ) ?>><?php esc_html_e( 'Pop-Up', 'liberty' ); ?></option>
				<option value="_blank" <?php selected( '_blank', $instance['target'] ) ?>><?php esc_html_e( 'New window (_blank)', 'liberty' ); ?></option>
			</select>
		</p>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'link' ) ); ?>"><?php esc_html_e( 'Link text', 'liberty' ); ?>: <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'link' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['link'] ); ?>" /></label>
		</p>
	<?php
	}

	// based on https://gist.github.com/cosmocatalano/4544576
	function scrape_instagram( $username, $slice = 9 ) {

		$username = strtolower( $username );
		$username = str_replace( '@', '', $username );

		if ( false === ( $instagram = get_transient( 'instagram-a3-'.sanitize_title_with_dashes( $username ) ) ) ) {

			$remote = wp_remote_get( 'http://instagram.com/'.trim( $username ) );

			if ( is_wp_error( $remote ) )
				return new WP_Error( 'site_down', esc_html__( 'Unable to communicate with Instagram.', 'liberty' ) );

			if ( 200 != wp_remote_retrieve_response_code( $remote ) )
				return new WP_Error( 'invalid_response', esc_html__( 'Instagram did not return a 200.', 'liberty' ) );

			$shards = explode( 'window._sharedData = ', $remote['body'] );
			$insta_json = explode( ';</script>', $shards[1] );
			$insta_array = json_decode( $insta_json[0], TRUE );

			if ( ! $insta_array )
				return new WP_Error( 'bad_json', esc_html__( 'Instagram has returned invalid data.', 'liberty' ) );

			if ( isset( $insta_array['entry_data']['ProfilePage'][0]['user']['media']['nodes'] ) ) {
				$images = $insta_array['entry_data']['ProfilePage'][0]['user']['media']['nodes'];
			} else {
				return new WP_Error( 'bad_json_2', esc_html__( 'Instagram has returned invalid data.', 'liberty' ) );
			}

			if ( ! is_array( $images ) )
				return new WP_Error( 'bad_array', esc_html__( 'Instagram has returned invalid data.', 'liberty' ) );

			$instagram = array();

			foreach ( $images as $image ) {

				$image['thumbnail_src'] = preg_replace( '/^https?\:/i', '', $image['thumbnail_src'] );
				$image['display_src'] = preg_replace( '/^https?\:/i', '', $image['display_src'] );

				// handle both types of CDN url
				if ( (strpos( $image['thumbnail_src'], 's640x640' ) !== false ) ) {
					$image['thumbnail'] = str_replace( 's640x640', 's160x160', $image['thumbnail_src'] );
					$image['small'] = str_replace( 's640x640', 's320x320', $image['thumbnail_src'] );
				} else {
					$urlparts = wp_parse_url( $image['thumbnail_src'] );
					$pathparts = explode( '/', $urlparts['path'] );
					array_splice( $pathparts, 3, 0, array( 's160x160' ) );
					$image['thumbnail'] = '//' . $urlparts['host'] . implode('/', $pathparts);
					$pathparts[3] = 's320x320';
					$image['small'] = '//' . $urlparts['host'] . implode('/', $pathparts);
				}

				$image['large'] = $image['thumbnail_src'];

				if ( $image['is_video'] == true ) {
					$type = 'video';
				} else {
					$type = 'image';
				}

				$caption = __( 'Instagram Image', 'liberty' );
				if ( ! empty( $image['caption'] ) ) {
					$caption = $image['caption'];
				}

				$instagram[] = array(
					'description'   => $caption,
					'link'		  	=> '//instagram.com/p/' . $image['code'],
					'time'		  	=> $image['date'],
					'comments'	  	=> $image['comments']['count'],
					'likes'		 	=> $image['likes']['count'],
					'thumbnail'	 	=> $image['thumbnail'],
					'small'			=> $image['small'],
					'large'			=> $image['large'],
					'original'		=> $image['display_src'],
					'type'		  	=> $type
				);
			}

			// do not set an empty transient - should help catch private or empty accounts
			if ( ! empty( $instagram ) ) {
				$instagram =  serialize( $instagram ) ;
				set_transient( 'instagram-a3-'.sanitize_title_with_dashes( $username ), $instagram, apply_filters( 'null_instagram_cache_time', HOUR_IN_SECONDS*2 ) );
			}
		}

		if ( ! empty( $instagram ) ) {

			$instagram = unserialize(  $instagram  );
			return array_slice( $instagram, 0, $slice );

		} else {

			return new WP_Error( 'no_images', esc_html__( 'Instagram did not return any images.', 'liberty' ) );

		}
	}

	function images_only( $media_item ) {

		if ( $media_item['type'] == 'image' )
			return true;

		return false;
	}
}


?>