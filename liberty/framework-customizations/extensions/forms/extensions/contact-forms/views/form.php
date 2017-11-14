<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var string $form_id
 * @var string $form_html
 */


$form_data = fw_ext_contact_forms_get_option($form_id);

$extra_class = liberty_default_array($form_data, 'class', '') . ' ' . liberty_default_array($form_data, 'form_style', '') . ' ' . liberty_default_array($form_data, 'show_labels', '');


?>
<div class="form-wrapper contact-form <?php echo '' . $extra_class; ?>">
	<?php echo '' . str_replace('action="', 'action="?', $form_html); ?>
</div>