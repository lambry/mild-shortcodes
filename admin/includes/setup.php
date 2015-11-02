<?php
/**
 * Shortcodes Setup
 *
 * @package Lambry\Shorts
 */

namespace Lambry\Shorts;

if ( ! defined( 'WPINC' ) ) die;

/* Setup Class */
class Setup {

    /**
     * Get Shortcodes
     */
    public static function shortcodes() {

        $shortcodes = [
            'row' => [
                'heading' => __( 'Columns', 'lambry-shorts' ),
                'icon' => 'columns',
                'child' => 'col',
                'clone' => true,
                'wrap' => true,
                'fields' => [
                    'width' => [
                        'name' => __( 'Width', 'lambry-shorts' ),
                        'type' => 'select',
                        'values' => Defaults::grid()
                    ]
                ]
            ],
            'icon' => [
                'heading' => __( 'Icon', 'lambry-shorts' ),
                'icon' => 'star',
                'fields' => [
                    'color' => [
                        'name' => __( 'Color', 'lambry-shorts' ),
                        'type' => 'select',
                        'values' => Defaults::colors()
                    ],
                    'icon' => [
                        'name' => __( 'Icon', 'lambry-shorts' ),
                        'type' => 'select',
                        'values' => Defaults::icons()
                    ],
                    'size' => [
                        'name' => __( 'Size', 'lambry-shorts' ),
                        'type' => 'select',
                        'values' => Defaults::sizes()
                    ],
					'align' => [
						'name' => __( 'Align', 'lambry-shorts' ),
						'type' => 'select',
						'values' => Defaults::align()
					],
                    'target' => [
                        'name' => __( 'Target', 'lambry-shorts' ),
                        'type' => 'select',
                        'values' => Defaults::target()
                    ],
                    'link' => [
                        'name' => __( 'Link to', 'lambry-shorts' ),
                        'type' => 'text',
                        'placeholder' => __( 'i.e. http://example.com', 'lambry-shorts' )
                    ]
                ]
            ],
            'button' => [
                'heading' => __( 'Button', 'lambry-shorts' ),
                'icon' => 'plus-circle',
                'wrap' => true,
                'fields' => [
                    'color' => [
                        'name' => __( 'Color', 'lambry-shorts' ),
                        'type' => 'select',
                        'values' => Defaults::colors()
                    ],
                    'icon' => [
                        'name' => __( 'Icon', 'lambry-shorts' ),
                        'type' => 'select',
                        'values' => Defaults::icons()
                    ],
                    'size' => [
                        'name' => __( 'Size', 'lambry-shorts' ),
                        'type' => 'select',
                        'values' => Defaults::sizes()
                    ],
					'align' => [
						'name' => __( 'Align', 'lambry-shorts' ),
						'type' => 'select',
						'values' => Defaults::align()
					],
                    'target' => [
                        'name' => __( 'Target', 'lambry-shorts' ),
                        'type' => 'select',
                        'values' => Defaults::target()
                    ],
                    'link' => [
                        'name' => __( 'Link to', 'lambry-shorts' ),
                        'type' => 'text',
                        'placeholder' => __( 'i.e. http://example.com', 'lambry-shorts' )
                    ]
                ]
            ],
            'panel' => [
                'heading' => __( 'Panel', 'lambry-shorts' ),
                'icon' => 'info-circle',
                'wrap' => true,
                'fields' => [
                    'color' => [
                        'name' => __( 'Color', 'lambry-shorts' ),
                        'type' => 'select',
                        'values' => Defaults::colors()
                    ],
					'icon' => [
						'name' => __( 'Icon', 'lambry-shorts' ),
						'type' => 'select',
						'values' => Defaults::icons()
					],
                    'size' => [
                        'name' => __( 'Size', 'lambry-shorts' ),
                        'type' => 'select',
                        'values' => Defaults::sizes()
                    ],
					'align' => [
						'name' => __( 'Align', 'lambry-shorts' ),
						'type' => 'select',
						'values' => Defaults::align()
					]
                ]
            ],
            'tabs' => [
                'heading' => __( 'Tabs', 'lambry-shorts' ),
                'icon' => 'folder',
                'child' => 'tab',
                'clone' => true,
                'wrap' => true,
                'fields' => [
                    'title' => [
                        'name' => __( 'Title', 'lambry-shorts' ),
                        'type' => 'text'
                    ],
                    'icon' => [
                        'name' => __( 'Icon', 'lambry-shorts' ),
                        'type' => 'select',
                        'values' => Defaults::icons()
                    ]
                ]
            ],
            'accordion' => [
                'heading' => __( 'Accordion', 'lambry-shorts' ),
                'icon' => 'plus',
                'child' => 'accordion',
                'clone' => true,
                'fields' => [
                    'title' => [
                        'name' => __( 'Title', 'lambry-shorts' ),
                        'type' => 'text'
                    ],
                    'icon' => [
                        'name' => __( 'Icon', 'lambry-shorts' ),
                        'type' => 'select',
                        'values' => Defaults::icons()
                    ]
                ]
            ],
            'align' => [
                'heading' => __( 'Alignment', 'lambry-shorts' ),
                'icon' => 'angle-double-right',
                'wrap' => true,
                'fields' => [
                    'align' => [
                        'name' => __( 'Align', 'lambry-shorts' ),
                        'type' => 'select',
                        'values' => Defaults::align()
                    ],
                    'width' => [
                        'name' => __( 'Width', 'lambry-shorts' ),
                        'type' => 'select',
                        'values' => Defaults::grid()
                    ]
                ]
            ],
            'posts'=> [
                'heading' => __( 'Posts', 'lambry-shorts' ),
                'icon' => 'newspaper-o',
                'fields' => [
                    'no' => [
                        'name' => __( 'Number', 'lambry-shorts' ),
                        'type' => 'text',
                        'placeholder' => __( 'default: 5', 'lambry-shorts' )
                    ],
                    'date' => [
                        'name' => __( 'Show Date', 'lambry-shorts' ),
                        'type' => 'checkbox'
                    ],
                    'image' => [
                        'name' => __( 'Show Image', 'lambry-shorts' ),
                        'type' => 'checkbox'
                    ],
                    'cat' => [
                        'name' => __( 'Category', 'lambry-shorts' ),
                        'type' => 'text',
                        'placeholder' => __( 'i.e. News', 'lambry-shorts' )
                    ],
                    'tag' => [
                        'name' => __( 'Tag', 'lambry-shorts' ),
                        'type' => 'text',
                        'placeholder' => __( 'i.e. Featured', 'lambry-shorts' )
                    ],
                    'type' => [
                        'name' => __( 'Post Type', 'lambry-shorts' ),
                        'type' => 'select',
                        'values' => Defaults::types()
                    ],
                    'tax' => [
                        'name' => __( 'Custom Taxomomy', 'lambry-shorts' ),
                        'type' => 'text',
                        'placeholder' => __( 'i.e. Genre:Jazz', 'lambry-shorts' )
                    ]
                ]
            ],
            'subpages' => [
                'heading' => __( 'Subpages', 'lambry-shorts' ),
                'icon' => 'level-down',
                'fields' => [
                    'title' => [
                        'name' => __( 'Title', 'lambry-shorts' ),
                        'type' => 'text'
                    ],
                    'direct' => [
                        'name' => __( 'Direct Subs Only', 'lambry-shorts' ),
                        'type' => 'checkbox'
                    ],
                    'flatten' => [
                        'name' => __( 'Flatten All Subs', 'lambry-shorts' ),
                        'type' => 'checkbox'
                    ]
                ]
            ],
            'restrict' => [
                'heading' => __( 'Restrict', 'lambry-shorts' ),
                'icon' => 'eye-slash',
                'wrap' => true,
                'fields' => [
                    'message' => [
                        'name' => __( 'Message', 'lambry-shorts' ),
                        'type' => 'text',
                        'placeholder' => 'i.e Please login.'
                    ],
                    'roles' => [
                        'name' => __( 'Roles', 'lambry-shorts' ),
                        'type' => 'select',
                        'attr' => 'multiple',
                        'values' => Defaults::roles()
                    ]
                ]
            ],
            'login' => [
                'heading' => __( 'Login Form', 'lambry-shorts' ),
                'icon' => 'lock',
                'fields' => [
                    'redirect' => [
                        'name' => __( 'Redirect To', 'lambry-shorts' ),
                        'type' => 'text',
                        'placeholder' => 'i.e. http://example-url.com'
                    ],
                    'register' => [
                        'name' => __( 'Register Link', 'lambry-shorts' ),
                        'type' => 'checkbox'
                    ],
                    'display' => [
                        'name' => __( 'Style', 'lambry-shorts' ),
                        'type' => 'select',
                        'values' => [
                            'block' => __( 'Block', 'lambry-shorts' ),
                            'inline' => __( 'Inline', 'lambry-shorts' )
                        ]
                    ]
                ]
            ],
            'sitemap' => [
                'heading' => __( 'Sitemap', 'lambry-shorts' ),
                'icon' => 'sitemap',
                'fields' => [
                    'menus' => [
                        'name' => __( 'Menus', 'lambry-shorts' ),
                        'type' => 'checkbox'
                    ],
                    'types' => [
                        'name' => __( 'Post Types', 'lambry-shorts' ),
                        'type' => 'select',
                        'attr' => 'multiple',
                        'values' => Defaults::types()
                    ]
                ]
            ],
            'map' => [
                'heading' => __( 'Google Map', 'lambry-shorts' ),
                'icon' => 'map-marker',
                'fields' => [
                    'location' => [
                        'name' => __( 'Location', 'lambry-shorts' ),
                        'type' => 'text',
                        'placeholder' => 'i.e. 123 The Street, Melbourne'
                    ],
                    'width' => [
                        'name' => __( 'Width', 'lambry-shorts' ),
                        'type' => 'text',
                        'placeholder' => 'default: 100%'
                    ]
                ]
            ],
            'iframe' => [
                'heading' => __( 'iFrame', 'lambry-shorts' ),
                'icon' => 'square-o',
                'fields' => [
                    'url' => [
                        'name' => __( 'Url', 'lambry-shorts' ),
                        'type' => 'text',
                        'placeholder' => 'i.e. http://iframe.com'
                    ],
                    'width' => [
                        'name' => __( 'Width', 'lambry-shorts' ),
                        'type' => 'text',
                        'placeholder' => 'default: 100%'
                    ]
                ]
            ]
        ];

        return apply_filters( 'lambry-shorts', $shortcodes );

    }

}
