<?php
/**
 * Shortcodes Setup
 *
 * @package Shorts
 */

namespace Lambry\Shorts;

defined( 'ABSPATH' ) || exit;

/* Setup Class */
class Setup {

    /**
     * Get Shortcodes
     */
    public static function shortcodes() {

        $shortcodes = [
            'row' => [
                'title' => __( 'Columns', 'shorts' ),
                'icon' => 'columns',
                'child' => 'col',
                'clone' => true,
                'wrap' => true,
                'fields' => [
                    'width' => [
                        'label' => __( 'Width', 'shorts' ),
                        'type' => 'select',
                        'values' => Defaults::grid()
                    ]
                ]
            ],
            'icon' => [
                'title' => __( 'Icon', 'shorts' ),
                'icon' => 'star',
                'fields' => [
                    'color' => [
                        'label' => __( 'Color', 'shorts' ),
                        'type' => 'select',
                        'values' => Defaults::colors()
                    ],
                    'icon' => [
                        'label' => __( 'Icon', 'shorts' ),
                        'type' => 'select',
                        'values' => Defaults::icons()
                    ],
                    'size' => [
                        'label' => __( 'Size', 'shorts' ),
                        'type' => 'select',
                        'values' => Defaults::sizes()
                    ],
					'align' => [
						'label' => __( 'Align', 'shorts' ),
						'type' => 'select',
						'values' => Defaults::align()
					],
                    'target' => [
                        'label' => __( 'Target', 'shorts' ),
                        'type' => 'select',
                        'values' => Defaults::target()
                    ],
                    'link' => [
                        'label' => __( 'Link to', 'shorts' ),
                        'type' => 'text',
                        'placeholder' => __( 'i.e. http://example.com', 'shorts' )
                    ]
                ]
            ],
            'button' => [
                'title' => __( 'Button', 'shorts' ),
                'icon' => 'plus-circle',
                'wrap' => true,
                'fields' => [
                    'color' => [
                        'label' => __( 'Color', 'shorts' ),
                        'type' => 'select',
                        'values' => Defaults::colors()
                    ],
                    'icon' => [
                        'label' => __( 'Icon', 'shorts' ),
                        'type' => 'select',
                        'values' => Defaults::icons()
                    ],
                    'size' => [
                        'label' => __( 'Size', 'shorts' ),
                        'type' => 'select',
                        'values' => Defaults::sizes()
                    ],
					'align' => [
						'label' => __( 'Align', 'shorts' ),
						'type' => 'select',
						'values' => Defaults::align()
					],
                    'target' => [
                        'label' => __( 'Target', 'shorts' ),
                        'type' => 'select',
                        'values' => Defaults::target()
                    ],
                    'link' => [
                        'label' => __( 'Link to', 'shorts' ),
                        'type' => 'text',
                        'placeholder' => __( 'i.e. http://example.com', 'shorts' )
                    ]
                ]
            ],
            'panel' => [
                'title' => __( 'Panel', 'shorts' ),
                'icon' => 'info-circle',
                'wrap' => true,
                'fields' => [
                    'color' => [
                        'label' => __( 'Color', 'shorts' ),
                        'type' => 'select',
                        'values' => Defaults::colors()
                    ],
					'icon' => [
						'label' => __( 'Icon', 'shorts' ),
						'type' => 'select',
						'values' => Defaults::icons()
					],
                    'size' => [
                        'label' => __( 'Size', 'shorts' ),
                        'type' => 'select',
                        'values' => Defaults::sizes()
                    ],
					'align' => [
						'label' => __( 'Align', 'shorts' ),
						'type' => 'select',
						'values' => Defaults::align()
					]
                ]
            ],
            'tabs' => [
                'title' => __( 'Tabs', 'shorts' ),
                'icon' => 'folder',
                'child' => 'tab',
                'clone' => true,
                'wrap' => true,
                'fields' => [
                    'title' => [
                        'label' => __( 'Title', 'shorts' ),
                        'type' => 'text'
                    ],
                    'icon' => [
                        'label' => __( 'Icon', 'shorts' ),
                        'type' => 'select',
                        'values' => Defaults::icons()
                    ]
                ]
            ],
            'accordion' => [
                'title' => __( 'Accordion', 'shorts' ),
                'icon' => 'plus',
                'child' => 'accordion',
                'clone' => true,
                'fields' => [
                    'title' => [
                        'label' => __( 'Title', 'shorts' ),
                        'type' => 'text'
                    ],
                    'icon' => [
                        'label' => __( 'Icon', 'shorts' ),
                        'type' => 'select',
                        'values' => Defaults::icons()
                    ]
                ]
            ],
            'popup' => [
                'title' => __( 'Popup', 'shorts' ),
                'icon' => 'clone',
                'wrap' => true,
                'fields' => [
                    'title' => [
                        'label' => __( 'Title', 'shorts' ),
                        'type' => 'text'
                    ],
                    'icon' => [
                        'label' => __( 'Icon', 'shorts' ),
                        'type' => 'select',
                        'values' => Defaults::icons()
                    ],
                    'onload' => [
                        'label' => __( 'Launch Onload', 'shorts' ),
                        'type' => 'checkbox'
                    ],
                    'once' => [
                        'label' => __( 'Show Once', 'shorts' ),
                        'type' => 'checkbox'
                    ]
                ]
            ],
            'align' => [
                'title' => __( 'Alignment', 'shorts' ),
                'icon' => 'angle-double-right',
                'wrap' => true,
                'fields' => [
                    'align' => [
                        'label' => __( 'Align', 'shorts' ),
                        'type' => 'select',
                        'values' => Defaults::align()
                    ],
                    'width' => [
                        'label' => __( 'Width', 'shorts' ),
                        'type' => 'select',
                        'values' => Defaults::grid()
                    ]
                ]
            ],
            'posts'=> [
                'title' => __( 'Posts', 'shorts' ),
                'icon' => 'newspaper-o',
                'fields' => [
                    'no' => [
                        'label' => __( 'Number', 'shorts' ),
                        'type' => 'text',
                        'placeholder' => __( 'default: 5', 'shorts' )
                    ],
                    'date' => [
                        'label' => __( 'Show Date', 'shorts' ),
                        'type' => 'checkbox'
                    ],
                    'image' => [
                        'label' => __( 'Show Image', 'shorts' ),
                        'type' => 'checkbox'
                    ],
                    'cat' => [
                        'label' => __( 'Category', 'shorts' ),
                        'type' => 'text',
                        'placeholder' => __( 'i.e. News', 'shorts' )
                    ],
                    'tag' => [
                        'label' => __( 'Tag', 'shorts' ),
                        'type' => 'text',
                        'placeholder' => __( 'i.e. Featured', 'shorts' )
                    ],
                    'type' => [
                        'label' => __( 'Post Type', 'shorts' ),
                        'type' => 'select',
                        'values' => Defaults::types()
                    ],
                    'tax' => [
                        'label' => __( 'Custom Taxomomy', 'shorts' ),
                        'type' => 'text',
                        'placeholder' => __( 'i.e. genre:jazz', 'shorts' )
                    ]
                ]
            ],
            'meta' => [
                'title' => __( 'Meta', 'shorts' ),
                'icon' => 'th-list',
                'fields' => [
                    'key' => [
                        'label' => __( 'Meta Key', 'shorts' ),
                        'type' => 'text'
                    ],
                    'id' => [
                        'label' => __( 'Post ID', 'shorts' ),
                        'type' => 'text',
                        'placeholder' => __( 'e.g. to get data from another post', 'shorts' )
                    ]
                ]
            ],
            'subpages' => [
                'title' => __( 'Subpages', 'shorts' ),
                'icon' => 'level-down',
                'fields' => [
                    'title' => [
                        'label' => __( 'Title', 'shorts' ),
                        'type' => 'text'
                    ],
                    'direct' => [
                        'label' => __( 'Direct Subs Only', 'shorts' ),
                        'type' => 'checkbox'
                    ],
                    'flatten' => [
                        'label' => __( 'Flatten All Subs', 'shorts' ),
                        'type' => 'checkbox'
                    ]
                ]
            ],
            'restrict' => [
                'title' => __( 'Restrict', 'shorts' ),
                'icon' => 'eye-slash',
                'wrap' => true,
                'fields' => [
                    'message' => [
                        'label' => __( 'Message', 'shorts' ),
                        'type' => 'text',
                        'placeholder' => 'i.e Please login.'
                    ],
                    'roles' => [
                        'label' => __( 'Roles', 'shorts' ),
                        'type' => 'select',
                        'attr' => 'multiple',
                        'values' => Defaults::roles()
                    ]
                ]
            ],
            'login' => [
                'title' => __( 'Login Form', 'shorts' ),
                'icon' => 'lock',
                'fields' => [
                    'redirect' => [
                        'label' => __( 'Redirect To', 'shorts' ),
                        'type' => 'text',
                        'placeholder' => 'i.e. http://example-url.com'
                    ],
                    'register' => [
                        'label' => __( 'Register Link', 'shorts' ),
                        'type' => 'checkbox'
                    ],
                    'reset' => [
                        'label' => __( 'Reset Password', 'shorts' ),
                        'type' => 'checkbox'
                    ],
                    'display' => [
                        'label' => __( 'Style', 'shorts' ),
                        'type' => 'select',
                        'values' => [
                            'block' => __( 'Block', 'shorts' ),
                            'inline' => __( 'Inline', 'shorts' )
                        ]
                    ]
                ]
            ],
            'sitemap' => [
                'title' => __( 'Sitemap', 'shorts' ),
                'icon' => 'sitemap',
                'fields' => [
                    'menus' => [
                        'label' => __( 'Menus', 'shorts' ),
                        'type' => 'checkbox'
                    ],
                    'types' => [
                        'label' => __( 'Post Types', 'shorts' ),
                        'type' => 'select',
                        'attr' => 'multiple',
                        'values' => Defaults::types()
                    ]
                ]
            ],
            'map' => [
                'title' => __( 'Google Map', 'shorts' ),
                'icon' => 'map-marker',
                'fields' => [
                    'location' => [
                        'label' => __( 'Location', 'shorts' ),
                        'type' => 'text',
                        'placeholder' => 'i.e. 123 The Street, Melbourne'
                    ],
                    'width' => [
                        'label' => __( 'Width', 'shorts' ),
                        'type' => 'text',
                        'placeholder' => 'default: 100%'
                    ]
                ]
            ],
            'iframe' => [
                'title' => __( 'iFrame', 'shorts' ),
                'icon' => 'square-o',
                'fields' => [
                    'url' => [
                        'label' => __( 'Url', 'shorts' ),
                        'type' => 'text',
                        'placeholder' => 'i.e. http://iframe.com'
                    ],
                    'width' => [
                        'label' => __( 'Width', 'shorts' ),
                        'type' => 'text',
                        'placeholder' => 'default: 100%'
                    ]
                ]
            ]
        ];

        return apply_filters( 'shorts/shortcodes', $shortcodes );

    }

}
