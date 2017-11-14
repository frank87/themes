<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var int $form_id
 * @var string $submit_button_text
 * @var string $submit_button_align
 * @var string $submit_button_width
 */

$form_data = fw_ext_contact_forms_get_option($form_id);

$submit_button_align = liberty_default_array($form_data, 'submit_button_align', 'alignleft');
$submit_button_width = liberty_default_array($form_data, 'submit_button_width', 'default');

?>
<div class="form-submit-holder text<?php echo esc_attr( $submit_button_align ); ?>">
	<input type="submit" value="<?php echo esc_attr( $submit_button_text ); ?>" class="btn <?php echo esc_attr( $submit_button_width ); ?>" />
</div>