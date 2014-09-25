<?php
/**
 * Shortcodes Setup
 *
 */

namespace Mild\Shortcodes;

/* Setup Class */
class Setup extends Defaults {

    /**
	 * Constructor
	 */
	function __construct() {

    }

    /**
     * Get Shortcodes
     */
    public static function getShortcodes() {

        $shortcodes = [
            'row'      => [
                'heading' => __( 'Columns', 'mild-sc' ),
                'wrap'   => true,
                'clone'   => true,
                'child'   => 'col',
                'icon'    => 'columns',
                'fields'  => [
                    'width' => [
                        'name'   => __( 'Width', 'mild-sc' ),
                        'type'   => 'select',
                        'values' => parent::grid()
                    ],
                ]
            ],
            'icon'      => [
                'heading' => __( 'Icon', 'mild-sc' ),
                'icon'    => 'star',
                'fields'  => [
                    'color' => [
                        'name'   => __( 'Color', 'mild-sc' ),
                        'type'   => 'select',
                        'values' => parent::colors()
                    ],
                    'icon' => [
                        'name'   => __( 'Icon', 'mild-sc' ),
                        'type'   => 'select',
                        'values' => parent::icons()
                    ],
                    'size' => [
                        'name'   => __( 'Size', 'mild-sc' ),
                        'type'   => 'select',
                        'values' => parent::sizes()
                    ],
					'align' => [
						'name'   => __( 'Align', 'mild-sc' ),
						'type'   => 'select',
						'values' => parent::align()
					],
                    'link' => [
                        'name'        => __( 'Link to', 'mild-sc' ),
                        'placeholder' => __( 'http://example.com', 'mild-sc' ),
                        'type'        => 'text'
                    ],
                    'target' => [
                        'name'   => __( 'Target', 'mild-sc' ),
                        'type'   => 'select',
                        'values' => parent::target()
                    ]
                ]
            ],
            'button'    => [
                'heading'   => __( 'Button', 'mild-sc' ),
                'wrap'   => true,
                'icon'   => 'plus-circle',
                'fields' => [
                    'color' => [
                        'name'   => __( 'Color', 'mild-sc' ),
                        'type'   => 'select',
                        'values' => parent::colors()
                    ],
                    'icon' => [
                        'name'   => __( 'Icon', 'mild-sc' ),
                        'type'   => 'select',
                        'values' => parent::icons()
                    ],
                    'size' => [
                        'name'   => __( 'Size', 'mild-sc' ),
                        'type'   => 'select',
                        'values' => parent::sizes()
                    ],
					'align' => [
						'name'   => __( 'Align', 'mild-sc' ),
						'type'   => 'select',
						'values' => parent::align()
					],
                    'link' => [
                        'name'        => __( 'Link to', 'mild-sc' ),
                        'placeholder' => __( 'http://example.com', 'mild-sc' ),
                        'type'        => 'text'
                    ],
                    'target' => [
                        'name'   => __( 'Target', 'mild-sc' ),
                        'type'   => 'select',
                        'values' => parent::target()
                    ]
                ]
            ],
            'panel'     => [
                'heading'   => __( 'Panel', 'mild-sc' ),
                'wrap'   => true,
                'icon'   => 'info-circle',
                'fields' => [
                    'color' => [
                        'name'   => __( 'Color', 'mild-sc' ),
                        'type'   => 'select',
                        'values' => parent::colors()
                    ],
					'icon' => [
						'name'   => __( 'Icon', 'mild-sc' ),
						'type'   => 'select',
						'values' => parent::icons()
					],
                    'size' => [
                        'name'   => __( 'Size', 'mild-sc' ),
                        'type'   => 'select',
                        'values' => parent::sizes()
                    ],
					'align' => [
						'name'   => __( 'Align', 'mild-sc' ),
						'type'   => 'select',
						'values' => parent::align()
					]
                ]
            ],
            'tabs' => [
                'heading'   => __( 'Tabs', 'mild-sc' ),
                'wrap'   => true,
                'clone'  => true,
                'child'   => 'tab',
                'icon'   => 'folder',
                'fields' => [
                    'title' => [
                        'name'   => __( 'Title', 'mild-sc' ),
                        'type'   => 'text'
                    ],
                    'icon' => [
                        'name'   => __( 'Icon', 'mild-sc' ),
                        'type'   => 'select',
                        'values' => parent::icons()
                    ]
                ]
            ],
            'accordion' => [
                'heading'   => __( 'Accordion', 'mild-sc' ),
                'clone'  => true,
                'child'   => 'accordion',
                'icon'   => 'plus',
                'fields' => [
                    'title' => [
                        'name'   => __( 'Title', 'mild-sc' ),
                        'type'   => 'text'
                    ],
                    'icon' => [
                        'name'   => __( 'Icon', 'mild-sc' ),
                        'type'   => 'select',
                        'values' => parent::icons()
                    ]
                ]
            ],
            'align'     => [
                'heading'   => __( 'Alignment', 'mild-sc' ),
                'wrap'   => true,
                'icon'   => 'angle-double-right',
                'fields' => [
                    'align' => [
                        'name'   => __( 'Align', 'mild-sc' ),
                        'type'   => 'select',
                        'values' => parent::align()
                    ],
                    'width' => [
                        'name'   => __( 'Width', 'mild-sc' ),
                        'type'   => 'select',
                        'values' => parent::grid()
                    ]
                ]
            ],
            'posts'     => [
                'heading'   => __( 'Posts', 'mild-sc' ),
                'icon'   => 'newspaper-o',
                'fields' => [
                    'cat' => [
                        'name'        => __( 'Categories', 'mild-sc' ),
                        'type'        => 'text',
                        'placeholder' => __( 'i.e. news,other', 'mild-sc' )
                    ],
                    'tag' => [
                        'name'        => __( 'Tags', 'mild-sc' ),
                        'type'        => 'text',
                        'placeholder' => __( 'i.e. featured', 'mild-sc' )
                    ],
                    'no' => [
                        'name'        => __( 'Number', 'mild-sc' ),
                        'type'        => 'text',
                        'placeholder' => __( '5', 'mild-sc' )
                    ],
                    'type' => [
                        'name'        => __( 'Post Type', 'mild-sc' ),
                        'type'        => 'text',
                        'placeholder' => 'post'
                    ],
                    'date' => [
                        'name'        => __( 'Show Date', 'mild-sc' ),
                        'type'        => 'checkbox'
                    ],
                    'image' => [
                        'name'        => __( 'Show Image', 'mild-sc' ),
                        'type'        => 'checkbox'
                    ]
                ]
            ],
            'login'     => [
                'heading'   => __( 'Login Form', 'mild-sc' ),
                'icon'   => 'lock',
                'fields' => [
                    'redirect' => [
                        'name'   => __( 'Redirect To', 'mild-sc' ),
                        'type'   => 'text',
                        'placeholder' => 'http://example-url.com'
                    ],
                    'display' => [
                        'name'   => __( 'Style', 'mild-sc' ),
                        'type'   => 'select',
                        'values' => [
                            'block'   => __( 'Block', 'mild-sc' ),
                            'inline'  => __( 'Inline', 'mild-sc' )
                        ]
                    ]
                ]
            ],
            'sitemap'   => [
                'heading'   => __( 'Sitemap', 'mild-sc' ),
                'icon'   => 'sitemap',
                'fields' => [
                    'menus' => [
                        'name'   => __( 'Menus', 'mild-sc' ),
                        'type'   => 'checkbox'
                    ],
                    'posts' => [
                        'name'   => __( 'Posts', 'mild-sc' ),
                        'type'   => 'checkbox'
                    ],
                    'pages' => [
                        'name'   => __( 'Pages', 'mild-sc' ),
                        'type'   => 'checkbox'
                    ]
                ]
            ],
            'map'       => [
                'heading'   => __( 'Google Map', 'mild-sc' ),
                'icon'   => 'map-marker',
                'fields' => [
                    'location' => [
                        'name'   => __( 'Location', 'mild-sc' ),
                        'type'   => 'text',
                        'placeholder' => 'i.e. 5 Lee Street, Brunswick, Melbourne'
                    ],
                    'width' => [
                        'name'   => __( 'Width', 'mild-sc' ),
                        'type'   => 'text',
                        'placeholder' => '400'
                    ],
                    'height' => [
                        'name'   => __( 'Height', 'mild-sc' ),
                        'type'   => 'text',
                        'placeholder' => '300'
                    ]
                ]
            ],
            'iframe'    => [
                'heading'   => __( 'iFrame', 'mild-sc' ),
                'icon'   => 'square-o',
                'fields' => [
                    'url' => [
                        'name'   => __( 'Url', 'mild-sc' ),
                        'type'   => 'text',
                        'placeholder' => 'i.e. http://myiframeurl.com'
                    ],
                    'width' => [
                        'name'   => __( 'Width', 'mild-sc' ),
                        'type'   => 'text',
                        'placeholder' => '400'
                    ],
                    'height' => [
                        'name'   => __( 'Height', 'mild-sc' ),
                        'type'   => 'text',
                        'placeholder' => '300'
                    ]
                ]
            ]
        ];

        return apply_filters( 'mild_shortcodes_setup', $shortcodes );

    }

}
