<?php

/*-----------------------------------------------------------------------------------*/
/*	Button Config
/*-----------------------------------------------------------------------------------*/

$thirtyjin_shortcodes['button'] = array(
	'no_preview' => true,
	'params' => array(
		'url' => array(
			'std'   => '#',
			'type'  => 'text',
			'label' => __('Button URL', 'thirtyone'),
			'desc'  => __('Add the button\'s url eg http://example.com', 'thirtyone')
		),
		'style' => array(
			'type' => 'select',
			'label' => __('Button Style', 'thirtyone'),
			'desc' => __('Select the button\'s style, ie the button\'s color', 'thirtyone'),
			'options' => array(
				'grey'       => 'Grey',
				'black'      => 'Black',
				'green'      => 'Green',
				'light-blue' => 'Light Blue',
				'blue'       => 'Blue',
				'red'        => 'Red',
				'orange'     => 'Orange',
				'purple'     => 'Purple',
				'rosy'       => 'Rosy'
			)
		),
		'size' => array(
			'type'  => 'select',
			'label' => __('Button Size', 'thirtyone'),
			'desc'  => __('Select the button\'s size', 'thirtyone'),
			'options' => array(
				'small'  => __('Small', 'thirtyone'),
				'medium' => __('Medium','thirtyone'),
				'large'  => __('Large','thirtyone')
			)
		),
		'type' => array(
			'type'  => 'select',
			'label' => __('Button Type', 'thirtyone'),
			'desc'  => __('Select the button\'s type', 'thirtyone'),
			'options' => array(
				'round'  => __('Round', 'thirtyone'),
				'square' => __('Square', 'thirtyone')
			)
		),
		'target' => array(
			'type' => 'select',
			'label' => __('Button Target', 'thirtyone'),
			'desc' => __('_self = open in same window. _blank = open in new window. _parent = open in parent frame. _top = open in full body of the window. ', 'thirtyone'),
			'options' => array(
				'_self'   => __('_self', 'thirtyone'),
				'_blank'  => __('_blank', 'thirtyone'),
				'_parent' => __('_parent', 'thirtyone'),
				'_top'    => __('_top', 'thirtyone')
			)
		),
		'content' => array(
			'std'   => __('Button Text', 'thirtyone'),
			'type'  => 'text',
			'label' => __('Button\'s Text', 'thirtyone'),
			'desc'  => __('Add the button\'s text', 'thirtyone'),
		)
	),
	'shortcode' => '[thirtyjin_button url="{{url}}" style="{{style}}" size="{{size}}" type="{{type}}" target="{{target}}"] {{content}} [/thirtyjin_button]',
	'popup_title' => __('Insert Button Shortcode', 'thirtyone')
);



/*-----------------------------------------------------------------------------------*/
/*	Toggle Config
/*-----------------------------------------------------------------------------------*/

$thirtyjin_shortcodes['toggle'] = array(
	'no_preview' => true,
	'params' => array(
		'title' => array(
			'type' => 'text',
			'label' => __('Toggle Title', 'thirtyone'),
			'desc' => __('Add the title that will go above the toggle content', 'thirtyone'),
			'std' => 'Title'
		),
		'content' => array(
			'std' => __('Content', 'thirtyone'),
			'type' => 'textarea',
			'label' => __('Toggle Content', 'thirtyone'),
			'desc' => __('Add the toggle content. Will accept HTML', 'thirtyone'),
		),
		'state' => array(
			'type' => 'select',
			'label' => __('Toggle State', 'thirtyone'),
			'desc' => __('Select the state of the toggle on page load', 'thirtyone'),
			'options' => array(
				'open' => 'Open',
				'closed' => 'Closed'
			)
		),
		
	),
	'shortcode' => '[thirtyjin_toggle title="{{title}}" state="{{state}}"] {{content}} [/thirtyjin_toggle]',
	'popup_title' => __('Insert Toggle Content Shortcode', 'thirtyone')
);

/*-----------------------------------------------------------------------------------*/
/*	Tabs Config
/*-----------------------------------------------------------------------------------*/

$thirtyjin_shortcodes['tabs'] = array(
    'params' => array(),
    'no_preview' => true,
    'shortcode' => '[thirtyjin_tabs] {{child_shortcode}}  [/thirtyjin_tabs]',
    'popup_title' => __('Insert Tab Shortcode', 'thirtyone'),
    
    'child_shortcode' => array(
        'params' => array(
            'title' => array(
                'std' => __('Title', 'thirtyone'),
                'type' => 'text',
                'label' => __('Tab Title', 'thirtyone'),
                'desc' => __('Title of the tab', 'thirtyone'),
            ),
            'content' => array(
                'std' => __('Tab Content', 'thirtyone'),
                'type' => 'textarea',
                'label' => __('Tab Content', 'thirtyone'),
                'desc' => __('Add the tabs content', 'thirtyone')
            )
        ),
        'shortcode' => '[thirtyjin_tab title="{{title}}"] {{content}} [/thirtyjin_tab]',
        'clone_button' => __('Add Tab', 'thirtyone')
    )
);




/*-----------------------------------------------------------------------------------*/
/*	accordion Config
/*-----------------------------------------------------------------------------------*/

$thirtyjin_shortcodes['accordions'] = array(
    'params' => array(),
    'no_preview' => true,
    'shortcode' => '[thirtyjin_accordions] {{child_shortcode}} [/thirtyjin_accordions]',
    'popup_title' => __('Insert Accordions Shortcode', 'thirtyone'),
    
    'child_shortcode' => array(
        'params' => array(
            'title' => array(
                'std' => __('Title', 'thirtyone'),
                'type' => 'text',
                'label' => __('Accordions Title', 'thirtyone'),
                'desc' => __('Title of the tab', 'thirtyone'),
            ),
            'content' => array(
                'std' => __('Content', 'thirtyone'),
                'type' => 'textarea',
                'label' => __('Accordions Content', 'thirtyone'),
                'desc' => __('Add the Accordions content', 'thirtyone')
            )
        ),
        'shortcode' => '[thirtyjin_accordion title="{{title}}"] {{content}} [/thirtyjin_accordion]',
        'clone_button' => __('Add Accordion', 'thirtyone')
    )
);







/*-----------------------------------------------------------------------------------*/
/*	Columns Config
/*-----------------------------------------------------------------------------------*/

$thirtyjin_shortcodes['columns'] = array(
		
		'params' => array(),
		'shortcode' => ' {{child_shortcode}} ', // as there is no wrapper shortcode
		'popup_title' => __('Insert Columns Shortcode', 'thirtyone'),
		'no_preview' => true,
		
		'child_shortcode' => array(
		'params' => array(
				'style' => array(
						'type' => 'select',
						'label' => __('Columns Style', 'thirtyone'),
						'desc' => __('Select the columns\'s width style.', 'thirtyone'),
						'options' => array(
								'one_third'    => 'One Third',
								'two_third'    => 'Two Thirds',
								'one_half'     => 'One Half',
								'one_fourth'   => 'One Fourth',
								'three_fourth' => 'Three Fourth',
								'one_fifth'    => 'One Fifth',
								'two_fifth'    => 'Two Fifth',
								'three_fifth'  => 'Three Fifth',
								'four_fifth'   => 'Four Fifth',
								'one_sixth'    => 'One Sixth',
								'five_sixth'   => 'Five Sixth',
						)
				),
				'last' => array(
						'type' => 'select',
						'label' => __('Last or not columns', 'thirtyone'),
						'desc' => __('Select whether or not is last column of a row.', 'thirtyone'),
						'options' => array(
								'' => 'Not Last',
								'last' => 'Last'
						)
				),
				'content' => array(
						'std' => '',
						'type' => 'textarea',
						'label' => __('Columns Content', 'thirtyone'),
						'desc' => __('Add the columns\'s content', 'thirtyone'),
				)

		),
		'shortcode' => '[thirtyjin_columns style="{{style}}" last="{{last}}"] {{content}} [/thirtyjin_columns]',
		'clone_button' => __('Add Column', 'thirtyone')
	)
);



/*-----------------------------------------------------------------------------------*/
/*	checklist Config
 /*-----------------------------------------------------------------------------------*/


$thirtyjin_shortcodes['checklist'] = array(
		'no_preview' => true,
		'params' => array(
				'style' => array(
						'type' => 'select',
						'label' => __('Icon of Checklist Style', 'thirtyone'),
						'desc' => __('Select the Checklist\'s style, ie the checklist icon type', 'thirtyone'),
						'options' => array(
								'list1' => 'list1',
								'list2' => 'list2',
								'list3' => 'list3',
								'list4' => 'list4',
								'list5' => 'list5',
								'list6' => 'list6',
								'list7' => 'list7',
								'list8' => 'list8',
								'list9' => 'list9',
								'list10' => 'list10',
								'list11' => 'list11',
								'list12' => 'list12'
						)
				),
				'color' => array(
						'type' => 'select',
						'label' => __('Checklist Icon Color', 'thirtyone'),
						'desc' => __('Select the Checklist\'s style, ie the checklist colour', 'thirtyone'),
						'options' => array(
								'grey'   => 'Grey',
								'orange' => 'Orange',
								'rosy'   => 'Rosy',
								'black'  => 'Black',
								'white'  => 'White',
								'red'    => 'Red',
								'green'  => 'Green',
								'blue'   => 'Blue',
								'yellow' => 'Yellow',
								'purple' => 'purple',
						)
				),
				'content' => array(
						'std' => '<ul><li>item 1</li><li>item 2</li><li>item 3</li></ul>',
						'type' => 'textarea',
						'label' => __('Checklist Content', 'thirtyone'),
						'desc' => __('Add the checklist\'s text', 'thirtyone'),
				)

		),
		'shortcode' => '[thirtyjin_checklist style="{{style}}" color="{{color}}" ] {{content}} [/thirtyjin_checklist]',
		'popup_title' => __('Insert checklist', 'thirtyone')
);




/*-----------------------------------------------------------------------------------*/
/*	Icon Text Config
/*-----------------------------------------------------------------------------------*/


$thirtyjin_shortcodes['icon-text'] = array(
		'no_preview' => true,
		'params' => array(
				'style' => array(
						'type' => 'select',
						'label' => __('Icon Text Style', 'thirtyone'),
						'desc' => __('Select the icon type.', 'thirtyone'),
						'options' => array(
								'home' => 'home',
								'doc' => 'doc',
								'image' => 'image',
								'video' => 'video',
								'voice' => 'voice',
								'addressbook' => 'addressbook',
								'donwload' => 'donwload',
								'cloud' => 'cloud',
								'phone' => 'phone',
								'email' => 'email',
								'fax' => 'fax',
								'id' => 'id',
								'globe' => 'globe',
								'calendar' => 'calendar',
								'folder' => 'folder',
								'comment' => 'comment',
								'tag' => 'tag',
								'view' => 'view',
								'like' => 'like',
								'thirty' => 'thirty'
								)
						),
				'color' => array(
						'type' => 'select',
						'label' => __('Icon and Text Color', 'thirtyone'),
						'desc' => __('Select the Icon and Text Color.', 'thirtyone'),
						'options' => array(
								'grey'   => 'Grey',
								'orange' => 'Orange',
								'rosy'   => 'Rosy',
								'black'  => 'Black',
								'white'  => 'White',
								'red'    => 'Red',
								'green'  => 'Green',
								'blue'   => 'Blue',
								'yellow' => 'Yellow',
								'purple' => 'purple'
						)
				),
				'url' => array(
						'std' => '',
						'type' => 'text',
						'label' => __('url', 'thirtyone'),
						'desc' => __('Add the url\'s text', 'thirtyone'),
				),
				
				'content' => array(
						'std' => '',
						'type' => 'textarea',
						'label' => __('Icon Text', 'thirtyone'),
						'desc' => __('Add the icon\'s text', 'thirtyone'),
				)

		),
		'shortcode' => '[thirtyjin_icon_text style="{{style}}" color="{{color}}" url="{{url}}"] {{content}} [/thirtyjin_icon_text]',
		'popup_title' => __('Insert Icon Text', 'thirtyone')
);


/*-----------------------------------------------------------------------------------*/
/*	Icon span Text Config
 /*-----------------------------------------------------------------------------------*/


$thirtyjin_shortcodes['icon-span'] = array(
		'no_preview' => true,
		'params' => array(
				'style' => array(
						'type' => 'select',
						'label' => __('Icon Text Style', 'thirtyone'),
						'desc' => __('Select the icon type.', 'thirtyone'),
						'options' => array(
								'home' => 'home',
								'doc' => 'doc',
								'image' => 'image',
								'video' => 'video',
								'voice' => 'voice',
								'addressbook' => 'addressbook',
								'donwload' => 'donwload',
								'cloud' => 'cloud',
								'phone' => 'phone',
								'email' => 'email',
								'fax' => 'fax',
								'id' => 'id',
								'globe' => 'globe',
								'calendar' => 'calendar',
								'folder' => 'folder',
								'comment' => 'comment',
								'tag' => 'tag',
								'view' => 'view',
								'like' => 'like',
								'thirty' => 'thirty'
						)
				),
				'color' => array(
						'type' => 'select',
						'label' => __('Icon Text Color', 'thirtyone'),
						'desc' => __('Select the icon\'s color.', 'thirtyone'),
						'options' => array(
								'grey'   => 'Grey',
								'orange' => 'Orange',
								'rosy'   => 'Rosy',
								'black'  => 'Black',
								'white'  => 'White',
								'red'    => 'Red',
								'green'  => 'Green',
								'blue'   => 'Blue',
								'yellow' => 'Yellow',
								'purple' => 'purple'
						)
				),

				'content' => array(
						'std' => '',
						'type' => 'textarea',
						'label' => __('icon Text', 'thirtyone'),
						'desc' => __('Add the icon\'s text', 'thirtyone'),
				)

		),
		'shortcode' => '[thirtyjin_span_icon style="{{style}}" color="{{color}}"] {{content}} [/thirtyjin_span_icon]',
		'popup_title' => __('Insert Icon Text', 'thirtyone')
);



/*-----------------------------------------------------------------------------------*/
/*	Highlight Config
/*-----------------------------------------------------------------------------------*/

$thirtyjin_shortcodes['highlight'] = array(
		'no_preview' => true,
		'params' => array(
				'color' => array(
						'type' => 'select',
						'label' => __('Highlight Color', 'thirtyone'),
						'desc' => __('Select the Highlight\'s color.', 'thirtyone'),
						'options' => array(
								'grey'   => 'Grey',
								'orange' => 'Orange',
								'rosy'   => 'Rosy',
								'black'  => 'Black',
								'white'  => 'White',
								'red'    => 'Red',
								'green'  => 'Green',
								'blue'   => 'Blue',
								'yellow' => 'Yellow',
								'purple' => 'purple'
						)
				),
				'content' => array(
						'std' => '',
						'type' => 'textarea',
						'label' => __('Highlight Text', 'thirtyone'),
						'desc' => __('Add the highlight\'s text', 'thirtyone'),
				)

		),
		'shortcode' => '[thirtyjin_highlight color="{{color}}"] {{content}} [/thirtyjin_highlight]',
		'popup_title' => __('Insert Highlight Shortcode', 'thirtyone')
);


/*-----------------------------------------------------------------------------------*/
/*	Divider Config
/*-----------------------------------------------------------------------------------*/

$thirtyjin_shortcodes['divider'] = array(
		'no_preview' => true,
		'params' => array(
				'color' => array(
						'type' => 'select',
						'label' => __('Divider Color', 'thirtyone'),
						'desc' => __('Select the Divider\'s color.', 'thirtyone'),
						'options' => array(
								'light' => 'Light',
								'dark' => 'Dark'
						)
				),
				'style' => array(
						'type' => 'select',
						'label' => __('Divider Style', 'thirtyone'),
						'desc' => __('Select the Divider\'s style.', 'thirtyone'),
						'options' => array(
								'solid' => 'Solid',
								'dashed' => 'Dashed'
						)
				),
				'content' => array(
						'std' => '',
						'type' => 'text',
						'label' => __('Divider Text', 'thirtyone'),
						'desc' => __('Add the divider\'s text', 'thirtyone'),
				)

		),
		'shortcode' => '[thirtyjin_divider color="{{color}}" style="{{style}}"] {{content}} [/thirtyjin_divider]',
		'popup_title' => __('Insert divider Shortcode', 'thirtyone')
);



/*-----------------------------------------------------------------------------------*/
/*	Boxes Style Config
/*-----------------------------------------------------------------------------------*/

$thirtyjin_shortcodes['box'] = array(
		'no_preview' => true,
		'params' => array(
				'style' => array(
						'type' => 'select',
						'label' => __('Boxes Style', 'thirtyone'),
						'desc' => __('Select the Boxes\'s style.', 'thirtyone'),
						'options' => array(
								'info' => 'Info',
								'download' => 'Download',
								'note' => 'Note',
								'warning' => 'warning',
								'alert' => 'alert',
								'support' => 'support',
								'megaphone' => 'megaphone',
								'settings' => 'settings',
								'lock' => 'lock',
								'message' => 'message',
								'buy' => 'buy',
								'label' => 'label'
						)
				),
				'width' => array(
						'std' => 'auto',
						'type' => 'text',
						'label' => __('Width of box Text', 'thirtyone'),
						'desc' => __('Set the width of the box, eg 0~100% or 200px, default is auto width.', 'thirtyone'),
				),
				'align' => array(
						'type' => 'select',
						'label' => __('Box align', 'thirtyone'),
						'desc' => __('Select the align of box.', 'thirtyone'),
						'options' => array(
								'aligncenter' => 'aligncenter',
								'alignleft' => 'alignleft',
								'alignright' => 'alignright'
						)
				),
				'content' => array(
						'std' => '',
						'type' => 'textarea',
						'label' => __('Box Content Text', 'thirtyone'),
						'desc' => __('Add the box\'s content text', 'thirtyone'),
				)

		),
		'shortcode' => '[thirtyjin_box style="{{style}}" width="{{width}}" align="{{align}}"] {{content}} [/thirtyjin_box]',
		'popup_title' => __('Insert Box Shortcode', 'thirtyone')
);



/*-----------------------------------------------------------------------------------*/
/*	Tooltip Config
/*-----------------------------------------------------------------------------------*/

$thirtyjin_shortcodes['tooltip'] = array(
		'no_preview' => true,
		'params' => array(
				'tip' => array(
						'std' => '',
						'type' => 'textarea',
						'label' => __('Tips', 'thirtyone'),
						'desc' => __('Add the Tips link', 'thirtyone'),
				),
				'content' => array(
						'std' => '',
						'type' => 'textarea',
						'label' => __('Text', 'thirtyone'),
						'desc' => __('Add the Tooltip content.', 'thirtyone'),
				)

		),
		'shortcode' => '[thirtyjin_tooltip tip="{{tip}}" ] {{content}} [/thirtyjin_tooltip]',
		'popup_title' => __('Insert Tooltip Shortcode', 'thirtyone')
);



/*-----------------------------------------------------------------------------------*/
/*	quote Config
 /*-----------------------------------------------------------------------------------*/

$thirtyjin_shortcodes['quote'] = array(
		'no_preview' => true,
		'params' => array(
				'align' => array(
						'type' => 'select',
						'label' => __('Quote Style', 'thirtyone'),
						'desc' => __('Select the Quote\'s style.', 'thirtyone'),
						'options' => array(
								'aligncenter' => 'aligncenter',
								'alignleft' => 'alignleft',
								'alignright' => 'alignright'
						)
				),
				'width' => array(
						'std' => 'auto',
						'type' => 'text',
						'label' => __('width', 'thirtyone'),
						'desc' => __('Set the width of the box, eg 0~100% or 300px, default is auto width.', 'thirtyone'),
				),
				'content' => array(
						'std' => '',
						'type' => 'textarea',
						'label' => __('Quote Text', 'thirtyone'),
						'desc' => __('Add the quote\'s text', 'thirtyone'),
				)

		),
		'shortcode' => '[thirtyjin_quote align="{{align}}" width="{{width}}"] {{content}} [/thirtyjin_quote]',
		'popup_title' => __('Insert Quote Shortcode', 'thirtyone')
);





/*-----------------------------------------------------------------------------------*/
/*	dropcap Config
 /*-----------------------------------------------------------------------------------*/

$thirtyjin_shortcodes['dropcap'] = array(
		'no_preview' => true,
		'params' => array(
				'style' => array(
						'type' => 'select',
						'label' => __('dropcap Style', 'thirtyone'),
						'desc' => __('Select the dropcap\'s style.', 'thirtyone'),
						'options' => array(
								'1' => 'Style 1',
								'2' => 'Style 2',
								'3' => 'Style 3',
								'4' => 'Style 4'
						)
				),
				'color' => array(
						'type' => 'select',
						'label' => __('Dropcap Color', 'thirtyone'),
						'desc' => __('Select the Dropcap\'s color.', 'thirtyone'),
						'options' => array(
							'grey'       => 'Grey',
							'black'      => 'Black',
							'green'      => 'Green',
							'light-blue' => 'Light Blue',
							'blue'       => 'Blue',
							'red'        => 'Red',
							'orange'     => 'Orange',
							'purple'     => 'Purple',
							'rosy'       => 'Rosy'
						)
				),
				'content' => array(
						'std' => '',
						'type' => 'text',
						'label' => __('Dropcap Text', 'thirtyone'),
						'desc' => __('Add the Dropcap\'s text', 'thirtyone'),
				)

		),
		'shortcode' => '[thirtyjin_dropcap style="{{style}}" color="{{color}}"] {{content}} [/thirtyjin_dropcap]',
		'popup_title' => __('Insert Dropcap Shortcode', 'thirtyone')
);








?>