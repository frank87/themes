<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'main' => array(
		'type'    => 'box',
		'title'   => '',
		'options' => array(
			'id'       => array(
				'type'  => 'hidden',
				'value' => uniqid( 'contact-form-' )
			),
			'builder'  => array(
				'type'    => 'tab',
				'title'   => esc_html__( 'Form Fields', 'liberty' ),
				'options' => array(
					'form' => array(
						'label' => false,
						'type'  => 'form-builder',
						'value' => array(
							'json' => json_encode( array(
								array(
									'type'      => 'form-header-title',
									'shortcode' => 'form_header_title',
									'width'     => '',
									'options'   => array(
										'title'    => '',
										'subtitle' => '',
									)
								)
							) )
						),
						'fixed_header' => true,
					),
				),
			),
			'settings' => array(
				'type'    => 'tab',
				'title'   => esc_html__( 'Settings', 'liberty' ),
				'options' => array(
					'settings-options' => array(
						'title'   => esc_html__( 'Options', 'liberty' ),
						'type'    => 'tab',
						'options' => array(
							'form_text_settings'  => array(
								'type'    => 'group',
								'options' => array(
									'subject-group' => array(
										'type' => 'group',
										'options' => array(
											'subject_message'    => array(
												'type'  => 'text',
												'label' => esc_html__( 'Subject Message', 'liberty' ),
												'desc' => esc_html__( 'This text will be used as subject message for the email', 'liberty' ),
												'value' => esc_html__( 'New message', 'liberty' ),
											),
										)
									),
									'submit-button-group' => array(
										'type' => 'group',
										'options' => array(
											'submit_button_text' => array(
												'type'  => 'text',
												'label' => esc_html__( 'Submit Button', 'liberty' ),
												'desc' => esc_html__( 'This text will appear in submit button', 'liberty' ),
												'value' => esc_html__( 'Send', 'liberty' ),
											),
										)
									),
									'submit-button-group2' => array(
										'type' => 'group',
										'options' => array(
										    'submit_button_width'  => array(
										        'label' => esc_html__( 'Button Width', 'liberty' ),
										        'type'  => 'radio',
										        'value' => 'default',
										        'choices' => $GLOBALS['button_width']
										    ),
										)
									),
									'submit-button-group3' => array(
										'type' => 'group',
										'options' => array(
										    'submit_button_align'  => array(
										        'label' => esc_html__( 'Button Align', 'liberty' ),
										        'type'  => 'radio',
										        'value' => 'alignleft',
										        'choices' => $GLOBALS['float_align']
										    ),
										)
									),
									'success-group' => array(
										'type' => 'group',
										'options' => array(
											'success_message'    => array(
												'type'  => 'text',
												'label' => esc_html__( 'Success Message', 'liberty' ),
												'desc' => esc_html__( 'This text will be displayed when the form will successfully send', 'liberty' ),
												'value' => esc_html__( 'Message sent!', 'liberty' ),
											),
										)
									),
									'failure_message'    => array(
										'type'  => 'text',
										'label' => esc_html__( 'Failure Message', 'liberty' ),
										'desc' => esc_html__( 'This text will be displayed when the form will fail to be sent', 'liberty' ),
										'value' => esc_html__( 'Oops something went wrong.', 'liberty' ),
									),
								),
							),
							'form_email_settings' => array(
								'type'    => 'group',
								'options' => array(
									'email_to' => array(
										'type'  => 'text',
										'label' => esc_html__( 'Email To', 'liberty' ),
										'help' => esc_html__( 'We recommend you to use an email that you verify often', 'liberty' ),
										'desc'  => esc_html__( 'The form will be sent to this email address.', 'liberty' ),
									),
								),
							),
						    'form_style'  => array(
						        'label' => esc_html__( 'Form Style', 'liberty' ),
						        'type'  => 'radio',
						        'value' => 'liberty_form_default',
						        'choices' => $GLOBALS['form_type']
						    ),
						    'show_labels'  => array(
						        'label' => esc_html__( 'Show Labels?', 'liberty' ),
						        'type'  => 'radio',
						        'value' => 'show_labels',
						        'choices' => $GLOBALS['show_labels']
						    ),
							'class'  => array(
								'label' => esc_html__( 'Custom Class', 'liberty' ),
								'desc'  => esc_html__( 'Enter custom CSS class', 'liberty' ),
								'type'  => 'text',
								'value' => '',
							),
						)
					),
					'mailer-options'   => array(
						'title'   => esc_html__( 'Mailer', 'liberty' ),
						'type'    => 'tab',
						'options' => array(
							'mailer' => array(
								'label' => false,
								'type'  => 'mailer'
							)
						)
					)
				),
			)
		)
	)
);