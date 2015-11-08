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
                'heading' => __( 'Columns', 'shorts' ),
                'icon' => 'columns',
                'child' => 'col',
                'clone' => true,
                'wrap' => true,
                'fields' => [
                    'width' => [
                        'name' => __( 'Width', 'shorts' ),
                        'type' => 'select',
                        'values' => Defaults::grid()
                    ]
                ]
            ],
            'icon' => [
                'heading' => __( 'Icon', 'shorts' ),
                'icon' => 'star',
                'fields' => [
                    'color' => [
                        'name' => __( 'Color', 'shorts' ),
                        'type' => 'select',
                        'values' => Defaults::colors()
                    ],
                    'icon' => [
                        'name' => __( 'Icon', 'shorts' ),
                        'type' => 'select',
                        'values' => Defaults::icons()
                    ],
                    'size' => [
                        'name' => __( 'Size', 'shorts' ),
                        'type' => 'select',
                        'values' => Defaults::sizes()
                    ],
					'align' => [
						'name' => __( 'Align', 'shorts' ),
						'type' => 'select',
						'values' => Defaults::align()
					],
                    'target' => [
                        'name' => __( 'Target', 'shorts' ),
                        'type' => 'select',
                        'values' => Defaults::target()
                    ],
                    'link' => [
                        'name' => __( 'Link to', 'shorts' ),
                        'type' => 'text',
                        'placeholder' => __( 'i.e. http://example.com', 'shorts' )
                    ]
                ]
            ],
            'button' => [
                'heading' => __( 'Button', 'shorts' ),
                'icon' => 'plus-circle',
                'wrap' => true,
                'fields' => [
                    'color' => [
                        'name' => __( 'Color', 'shorts' ),
                        'type' => 'select',
                        'values' => Defaults::colors()
                    ],
                    'icon' => [
                        'name' => __( 'Icon', 'shorts' ),
                        'type' => 'select',
                        'values' => Defaults::icons()
                    ],
                    'size' => [
                        'name' => __( 'Size', 'shorts' ),
                        'type' => 'select',
                        'values' => Defaults::sizes()
                    ],
					'align' => [
						'name' => __( 'Align', 'shorts' ),
						'type' => 'select',
						'values' => Defaults::align()
					],
                    'target' => [
                        'name' => __( 'Target', 'shorts' ),
                        'type' => 'select',
                        'values' => Defaults::target()
                    ],
                    'link' => [
                        'name' => __( 'Link to', 'shorts' ),
                        'type' => 'text',
                        'placeholder' => __( 'i.e. http://example.com', 'shorts' )
                    ]
                ]
            ],
            'panel' => [
                'heading' => __( 'Panel', 'shorts' ),
                'icon' => 'info-circle',
                'wrap' => true,
                'fields' => [
                    'color' => [
                        'name' => __( 'Color', 'shorts' ),
                        'type' => 'select',
                        'values' => Defaults::colors()
                    ],
					'icon' => [
						'name' => __( 'Icon', 'shorts' ),
						'type' => 'select',
						'values' => Defaults::icons()
					],
                    'size' => [
                        'name' => __( 'Size', 'shorts' ),
                        'type' => 'select',
                        'values' => Defaults::sizes()
                    ],
					'align' => [
						'name' => __( 'Align', 'shorts' ),
						'type' => 'select',
						'values' => Defaults::align()
					]
                ]
            ],
            'tabs' => [
                'heading' => __( 'Tabs', 'shorts' ),
                'icon' => 'folder',
                'child' => 'tab',
                'clone' => true,
                'wrap' => true,
                'fields' => [
                    'title' => [
                        'name' => __( 'Title', 'shorts' ),
                        'type' => 'text'
                    ],
                    'icon' => [
                        'name' => __( 'Icon', 'shorts' ),
                        'type' => 'select',
                        'values' => Defaults::icons()
                    ]
                ]
            ],
            'accordion' => [
                'heading' => __( 'Accordion', 'shorts' ),
                'icon' => 'plus',
                'child' => 'accordion',
                'clone' => true,
                'fields' => [
                    'title' => [
                        'name' => __( 'Title', 'shorts' ),
                        'type' => 'text'
                    ],
                    'icon' => [
                        'name' => __( 'Icon', 'shorts' ),
                        'type' => 'select',
                        'values' => Defaults::icons()
                    ]
                ]
            ],
            'align' => [
                'heading' => __( 'Alignment', 'shorts' ),
                'icon' => 'angle-double-right',
                'wrap' => true,
                'fields' => [
                    'align' => [
                        'name' => __( 'Align', 'shorts' ),
                        'type' => 'select',
                        'values' => Defaults::align()
                    ],
                    'width' => [
                        'name' => __( 'Width', 'shorts' ),
                        'type' => 'select',
                        'values' => Defaults::grid()
                    ]
                ]
            ],
            'posts'=> [
                'heading' => __( 'Posts', 'shorts' ),
                'icon' => 'newspaper-o',
                'fields' => [
                    'no' => [
                        'name' => __( 'Number', 'shorts' ),
                        'type' => 'text',
                        'placeholder' => __( 'default: 5', 'shorts' )
                    ],
                    'date' => [
                        'name' => __( 'Show Date', 'shorts' ),
                        'type' => 'checkbox'
                    ],
                    'image' => [
                        'name' => __( 'Show Image', 'shorts' ),
                        'type' => 'checkbox'
                    ],
                    'cat' => [
                        'name' => __( 'Category', 'shorts' ),
                        'type' => 'text',
                        'placeholder' => __( 'i.e. News', 'shorts' )
                    ],
                    'tag' => [
                        'name' => __( 'Tag', 'shorts' ),
                        'type' => 'text',
                        'placeholder' => __( 'i.e. Featured', 'shorts' )
                    ],
                    'type' => [
                        'name' => __( 'Post Type', 'shorts' ),
                        'type' => 'select',
                        'values' => Defaults::types()
                    ],
                    'tax' => [
                        'name' => __( 'Custom Taxomomy', 'shorts' ),
                        'type' => 'text',
                        'placeholder' => __( 'i.e. genre:jazz', 'shorts' )
                    ]
                ]
            ],
            'subpages' => [
                'heading' => __( 'Subpages', 'shorts' ),
                'icon' => 'level-down',
                'fields' => [
                    'title' => [
                        'name' => __( 'Title', 'shorts' ),
                        'type' => 'text'
                    ],
                    'direct' => [
                        'name' => __( 'Direct Subs Only', 'shorts' ),
                        'type' => 'checkbox'
                    ],
                    'flatten' => [
                        'name' => __( 'Flatten All Subs', 'shorts' ),
                        'type' => 'checkbox'
                    ]
                ]
            ],
            'restrict' => [
                'heading' => __( 'Restrict', 'shorts' ),
                'icon' => 'eye-slash',
                'wrap' => true,
                'fields' => [
                    'message' => [
                        'name' => __( 'Message', 'shorts' ),
                        'type' => 'text',
                        'placeholder' => 'i.e Please login.'
                    ],
                    'roles' => [
                        'name' => __( 'Roles', 'shorts' ),
                        'type' => 'select',
                        'attr' => 'multiple',
                        'values' => Defaults::roles()
                    ]
                ]
            ],
            'login' => [
                'heading' => __( 'Login Form', 'shorts' ),
                'icon' => 'lock',
                'fields' => [
                    'redirect' => [
                        'name' => __( 'Redirect To', 'shorts' ),
                        'type' => 'text',
                        'placeholder' => 'i.e. http://example-url.com'
                    ],
                    'register' => [
                        'name' => __( 'Register Link', 'shorts' ),
                        'type' => 'checkbox'
                    ],
                    'display' => [
                        'name' => __( 'Style', 'shorts' ),
                        'type' => 'select',
                        'values' => [
                            'block' => __( 'Block', 'shorts' ),
                            'inline' => __( 'Inline', 'shorts' )
                        ]
                    ]
                ]
            ],
            'sitemap' => [
                'heading' => __( 'Sitemap', 'shorts' ),
                'icon' => 'sitemap',
                'fields' => [
                    'menus' => [
                        'name' => __( 'Menus', 'shorts' ),
                        'type' => 'checkbox'
                    ],
                    'types' => [
                        'name' => __( 'Post Types', 'shorts' ),
                        'type' => 'select',
                        'attr' => 'multiple',
                        'values' => Defaults::types()
                    ]
                ]
            ],
            'map' => [
                'heading' => __( 'Google Map', 'shorts' ),
                'icon' => 'map-marker',
                'fields' => [
                    'location' => [
                        'name' => __( 'Location', 'shorts' ),
                        'type' => 'text',
                        'placeholder' => 'i.e. 123 The Street, Melbourne'
                    ],
                    'width' => [
                        'name' => __( 'Width', 'shorts' ),
                        'type' => 'text',
                        'placeholder' => 'default: 100%'
                    ]
                ]
            ],
            'iframe' => [
                'heading' => __( 'iFrame', 'shorts' ),
                'icon' => 'square-o',
                'fields' => [
                    'url' => [
                        'name' => __( 'Url', 'shorts' ),
                        'type' => 'text',
                        'placeholder' => 'i.e. http://iframe.com'
                    ],
                    'width' => [
                        'name' => __( 'Width', 'shorts' ),
                        'type' => 'text',
                        'placeholder' => 'default: 100%'
                    ]
                ]
            ]
        ];

        return apply_filters( 'shorts/shortcodes', $shortcodes );

    }

}
