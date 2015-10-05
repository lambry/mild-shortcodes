<?php
/**
 * Shortcodes Setup
 *
 * @package Mild
 */

namespace Mild\Shortcodes;

/* Setup Class */
class Setup extends Defaults {

    /**
     * Get Shortcodes
     */
    public static function get_shortcodes() {

        $shortcodes = [
            'row' => [
                'heading' => __( 'Columns', 'mild-sc' ),
                'child' => 'col',
                'icon' => 'columns',
                'clone' => true,
                'wrap' => true,
                'fields' => [
                    'width' => [
                        'name' => __( 'Width', 'mild-sc' ),
                        'type' => 'select',
                        'values' => parent::grid()
                    ],
                ]
            ],
            'icon' => [
                'heading' => __( 'Icon', 'mild-sc' ),
                'icon' => 'star',
                'fields' => [
                    'color' => [
                        'name' => __( 'Color', 'mild-sc' ),
                        'type' => 'select',
                        'values' => parent::colors()
                    ],
                    'icon' => [
                        'name' => __( 'Icon', 'mild-sc' ),
                        'type' => 'select',
                        'values' => parent::icons()
                    ],
                    'size' => [
                        'name' => __( 'Size', 'mild-sc' ),
                        'type' => 'select',
                        'values' => parent::sizes()
                    ],
					'align' => [
						'name' => __( 'Align', 'mild-sc' ),
						'type' => 'select',
						'values' => parent::align()
					],
                    'link' => [
                        'name' => __( 'Link to', 'mild-sc' ),
                        'type' => 'text',
                        'placeholder' => __( 'http://example.com', 'mild-sc' )
                    ],
                    'target' => [
                        'name' => __( 'Target', 'mild-sc' ),
                        'type' => 'select',
                        'values' => parent::target()
                    ]
                ]
            ],
            'button' => [
                'heading' => __( 'Button', 'mild-sc' ),
                'icon' => 'plus-circle',
                'wrap' => true,
                'fields' => [
                    'color' => [
                        'name' => __( 'Color', 'mild-sc' ),
                        'type' => 'select',
                        'values' => parent::colors()
                    ],
                    'icon' => [
                        'name' => __( 'Icon', 'mild-sc' ),
                        'type' => 'select',
                        'values' => parent::icons()
                    ],
                    'size' => [
                        'name' => __( 'Size', 'mild-sc' ),
                        'type' => 'select',
                        'values' => parent::sizes()
                    ],
					'align' => [
						'name' => __( 'Align', 'mild-sc' ),
						'type' => 'select',
						'values' => parent::align()
					],
                    'link' => [
                        'name' => __( 'Link to', 'mild-sc' ),
                        'type' => 'text',
                        'placeholder' => __( 'http://example.com', 'mild-sc' )
                    ],
                    'target' => [
                        'name' => __( 'Target', 'mild-sc' ),
                        'type' => 'select',
                        'values' => parent::target()
                    ]
                ]
            ],
            'panel' => [
                'heading' => __( 'Panel', 'mild-sc' ),
                'icon' => 'info-circle',
                'wrap' => true,
                'fields' => [
                    'color' => [
                        'name' => __( 'Color', 'mild-sc' ),
                        'type' => 'select',
                        'values' => parent::colors()
                    ],
					'icon' => [
						'name' => __( 'Icon', 'mild-sc' ),
						'type' => 'select',
						'values' => parent::icons()
					],
                    'size' => [
                        'name' => __( 'Size', 'mild-sc' ),
                        'type' => 'select',
                        'values' => parent::sizes()
                    ],
					'align' => [
						'name' => __( 'Align', 'mild-sc' ),
						'type' => 'select',
						'values' => parent::align()
					]
                ]
            ],
            'tabs' => [
                'heading' => __( 'Tabs', 'mild-sc' ),
                'child' => 'tab',
                'icon' => 'folder',
                'clone' => true,
                'wrap' => true,
                'fields' => [
                    'title' => [
                        'name' => __( 'Title', 'mild-sc' ),
                        'type' => 'text'
                    ],
                    'icon' => [
                        'name' => __( 'Icon', 'mild-sc' ),
                        'type' => 'select',
                        'values' => parent::icons()
                    ]
                ]
            ],
            'accordion' => [
                'heading' => __( 'Accordion', 'mild-sc' ),
                'child' => 'accordion',
                'icon' => 'plus',
                'clone' => true,
                'fields' => [
                    'title' => [
                        'name' => __( 'Title', 'mild-sc' ),
                        'type' => 'text'
                    ],
                    'icon' => [
                        'name' => __( 'Icon', 'mild-sc' ),
                        'type' => 'select',
                        'values' => parent::icons()
                    ]
                ]
            ],
            'align' => [
                'heading' => __( 'Alignment', 'mild-sc' ),
                'icon' => 'angle-double-right',
                'wrap' => true,
                'fields' => [
                    'align' => [
                        'name' => __( 'Align', 'mild-sc' ),
                        'type' => 'select',
                        'values' => parent::align()
                    ],
                    'width' => [
                        'name' => __( 'Width', 'mild-sc' ),
                        'type' => 'select',
                        'values' => parent::grid()
                    ]
                ]
            ],
            'posts'=> [
                'heading' => __( 'Posts', 'mild-sc' ),
                'icon' => 'newspaper-o',
                'fields' => [
                    'cat' => [
                        'name' => __( 'Category', 'mild-sc' ),
                        'type' => 'text',
                        'placeholder' => __( 'i.e. News', 'mild-sc' )
                    ],
                    'tag' => [
                        'name' => __( 'Tag', 'mild-sc' ),
                        'type' => 'text',
                        'placeholder' => __( 'i.e. Featured', 'mild-sc' )
                    ],
                    'no' => [
                        'name' => __( 'Number', 'mild-sc' ),
                        'type' => 'text',
                        'placeholder' => __( '5', 'mild-sc' )
                    ],
                    'type' => [
                        'name' => __( 'Post Type', 'mild-sc' ),
                        'type' => 'text',
                        'placeholder' => 'post'
                    ],
                    'date' => [
                        'name' => __( 'Show Date', 'mild-sc' ),
                        'type' => 'checkbox'
                    ],
                    'image' => [
                        'name' => __( 'Show Image', 'mild-sc' ),
                        'type' => 'checkbox'
                    ]
                ]
            ],
            'subpages' => [
                'heading' => __( 'Subpages', 'mild-sc' ),
                'icon' => 'level-down',
                'fields' => [
                    'title' => [
                        'name' => __( 'Title', 'mild-sc' ),
                        'type' => 'text'
                    ],
                    'subsubs' => [
                        'name' => __( 'Sub Sub Pages?', 'mild-sc' ),
                        'type' => 'checkbox'
                    ]
                ]
            ],
            'restrict' => [
                'heading' => __( 'Restrict', 'mild-sc' ),
                'icon' => 'eye-slash',
                'wrap' => true,
                'fields' => [
                    'message' => [
                        'name' => __( 'Message', 'mild-sc' ),
                        'type' => 'text',
                        'placeholder' => 'i.e Please login.'
                    ],
                    'role' => [
                        'name' => __( 'Role', 'mild-sc' ),
                        'type' => 'text',
                        'placeholder' => 'default: subscriber'
                    ]
                ]
            ],
            'login' => [
                'heading' => __( 'Login Form', 'mild-sc' ),
                'icon' => 'lock',
                'fields' => [
                    'redirect' => [
                        'name' => __( 'Redirect To', 'mild-sc' ),
                        'type' => 'text',
                        'placeholder' => 'http://example-url.com'
                    ],
                    'register' => [
                        'name' => __( 'Register Link', 'mild-sc' ),
                        'type' => 'checkbox'
                    ],
                    'display' => [
                        'name' => __( 'Style', 'mild-sc' ),
                        'type' => 'select',
                        'values' => [
                            'block' => __( 'Block', 'mild-sc' ),
                            'inline' => __( 'Inline', 'mild-sc' )
                        ]
                    ]
                ]
            ],
            'sitemap' => [
                'heading' => __( 'Sitemap', 'mild-sc' ),
                'icon' => 'sitemap',
                'fields' => [
                    'menus' => [
                        'name' => __( 'Menus', 'mild-sc' ),
                        'type' => 'checkbox'
                    ],
                    'posts' => [
                        'name' => __( 'Posts', 'mild-sc' ),
                        'type' => 'checkbox'
                    ],
                    'pages' => [
                        'name' => __( 'Pages', 'mild-sc' ),
                        'type' => 'checkbox'
                    ]
                ]
            ],
            'map' => [
                'heading' => __( 'Google Map', 'mild-sc' ),
                'icon' => 'map-marker',
                'fields' => [
                    'location' => [
                        'name' => __( 'Location', 'mild-sc' ),
                        'type' => 'text',
                        'placeholder' => 'i.e. 5 Lee Street, Melbourne'
                    ],
                    'width' => [
                        'name' => __( 'Width', 'mild-sc' ),
                        'type' => 'text',
                        'placeholder' => '500'
                    ]
                ]
            ],
            'iframe' => [
                'heading' => __( 'iFrame', 'mild-sc' ),
                'icon' => 'square-o',
                'fields' => [
                    'url' => [
                        'name' => __( 'Url', 'mild-sc' ),
                        'type' => 'text',
                        'placeholder' => 'i.e. http://iframe.com'
                    ],
                    'width' => [
                        'name' => __( 'Width', 'mild-sc' ),
                        'type' => 'text',
                        'placeholder' => '500'
                    ]
                ]
            ]
        ];

        return apply_filters( 'mild_sc_shortcodes', $shortcodes );

    }

}
