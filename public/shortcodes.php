<?php
/**
 * Shortcodes
 *
 * @package Lambry\Shorts
 */

namespace Lambry\Shorts;

if ( ! defined( 'WPINC' ) ) die;

/* Shortcodes Class */
class Shortcodes {

	/*
	 * Variables
	 */
	private static $tabs = [];

	/*
	 * Construct
	 */
    public function __construct() {

    	if ( is_admin() ) return;

		// Add shortcodes
		add_shortcode( __( 'row', 'lambry-shorts' ),       [ $this, 'row' ] );
		add_shortcode( __( 'col', 'lambry-shorts' ),       [ $this, 'col' ] );
		add_shortcode( __( 'icon', 'lambry-shorts' ),      [ $this, 'icon' ] );
		add_shortcode( __( 'button', 'lambry-shorts' ),    [ $this, 'button' ] );
		add_shortcode( __( 'panel', 'lambry-shorts' ),     [ $this, 'panel' ] );
		add_shortcode( __( 'tabs', 'lambry-shorts' ),      [ $this, 'tabs' ] );
		add_shortcode( __( 'tab', 'lambry-shorts' ),       [ $this, 'tab' ] );
		add_shortcode( __( 'accordion', 'lambry-shorts' ), [ $this, 'accordion' ] );
		add_shortcode( __( 'align', 'lambry-shorts' ),     [ $this, 'align' ] );
		add_shortcode( __( 'posts', 'lambry-shorts' ),     [ $this, 'posts' ] );
		add_shortcode( __( 'subpages', 'lambry-shorts' ),  [ $this, 'subpages' ] );
		add_shortcode( __( 'restrict', 'lambry-shorts' ),  [ $this, 'restrict' ] );
		add_shortcode( __( 'login', 'lambry-shorts' ),     [ $this, 'login' ] );
		add_shortcode( __( 'sitemap', 'lambry-shorts' ),   [ $this, 'sitemap' ] );
		add_shortcode( __( 'map', 'lambry-shorts' ),       [ $this, 'map' ] );
		add_shortcode( __( 'iframe', 'lambry-shorts' ),    [ $this, 'iframe' ] );
		add_shortcode( __( 'image', 'lambry-shorts' ),     [ $this, 'image' ] );
		add_shortcode( __( 'link', 'lambry-shorts' ),      [ $this, 'link' ] );

    }

	/*
	 * Row Shortcode
	 *
	 * @access public
	 * @param  array  $params
	 * @param  string $content
	 * @return string $row
	 */
	public function row( $params, $content = null ) {

	    extract( shortcode_atts([
	        'class' => ''
	    ], $params) );

	    return "<div class='ls-row {$class}'>" . do_shortcode( $content ) . "</div>";

	}

	/*
	 * Col Shortcode
	 *
	 * @access public
	 * @param  array  $params
	 * @param  string $content
	 * @return string $col
	 */
	public function col( $params, $content = null ) {

	    extract( shortcode_atts([
	        'width' => '6',
	        'class' => ''
	    ], $params) );

	    return "<div class='ls-col-{$width} {$class}'>" . do_shortcode( $content ) . "</div>";

	}

	/*
	 * Icon Shortcode
	 *
	 * @access public
	 * @param  array  $params
	 * @return string $icon
	 */
	public function icon( $params ) {

	    extract( shortcode_atts([
	        'icon'   => '',
	        'color'  => '',
	        'size'   => '',
	        'align'  => '',
	        'link'   => '',
	        'target' => 'self',
	        'class'  => ''
	    ], $params) );

	    $html = "<i class='ls-icon fa fa-{$icon} ls-text-{$color} ls-{$size} ls-align{$align} align{$align} {$class}'></i>";

	    return self::wrap_with_anchor( $link, $target, $html );

	}

	/*
	 * Button Shortcode
	 *
	 * @access public
	 * @param  array  $params
	 * @param  string $content
	 * @return string $button
	 */
	public function button( $params, $content = null ) {

	    extract( shortcode_atts([
	        'icon'   => '',
	        'color'  => '',
	        'size'   => '',
	        'align'  => '',
	        'link'   => '',
	        'target' => 'self',
	        'class'  => ''
	    ], $params) );

	    $icon = self::create_icon( $icon );
	    $el = ( $link ) ? 'a' : 'button';
	    $href = ( $link ) ? " href='{$link}' target='_{$target}'" : '';

	    return "<{$el}{$href} class='ls-button ls-background-{$color} ls-{$size} ls-align{$align} align{$align} {$class}'>{$icon}" . do_shortcode( $content ) . "</{$el}>";
	
	}

	/*
	 * Panel Shortcode
	 *
	 * @access public
	 * @param  array  $params
	 * @param  string $content
	 * @return string $panel
	 */
	public function panel( $params, $content = null ) {

	    extract( shortcode_atts([
	        'icon'  => '',
	        'color' => '',
	        'size'  => '',
	        'align' => '',
	        'class' => ''
	    ], $params) );

	    $icon = self::create_icon( $icon );

	    return "<div class='ls-panel ls-background-{$color} ls-{$size} ls-align{$align} align{$align} {$class}'>{$icon}" . do_shortcode( $content ) . "</div>";

	}

	/*
	 * Tabs Shortcode
	 *
	 * @access public
	 * @param  array  $params
	 * @param  string $content
	 * @return string $tabs
	 */
	public function tabs( $params, $content = null ) {

		extract( shortcode_atts([
			'class' => ''
		], $params) );

		$panes = do_shortcode( $content );

		$nav = '<ul class="ls-tab-nav">';
			foreach ( self::$tabs as $tab ) {
				$icon = self::create_icon( $tab['icon'] );
				$nav .= "<li class='{$tab['class']} ls-tab-item' data-tab='{$tab['id']}'>{$icon}{$tab['title']}</li>";
			}
		$nav .= '</ul>';

		return "<div class='ls-tabs {$class}'>{$nav}<div class='ls-tab-panes'>{$panes}</div></div>";

	}

	/*
	 * Tab Shortcode
	 *
	 * @access public
	 * @param array  $params
	 * @param string $content
	 * @return string $tab
	 */
	public function tab( $params, $content = null ) {

	    extract( shortcode_atts([
	        'title' => '',
	        'icon'  => '',
	        'class' => ''
	    ], $params) );

	    $id = sanitize_title_with_dashes( $title );

	    self::$tabs[] = [
			'id' => $id,
			'title' => $title,
			'icon' => $icon,
			'class' => $class
	    ];

	    return "<div id='{$id}' class='ls-tab-pane {$class}'>" . do_shortcode( $content ) . "</div>";
	}

	/*
	 * Accordion Shortcode
	 *
	 * @access public
	 * @param  array  $params
	 * @param  string $content
	 * @return string $accordion
	 */
	public function accordion( $params, $content = null ) {

	    extract( shortcode_atts([
	        'title' => '',
	        'icon'  => '',
	        'class' => ''
	    ], $params) );

	    $id = sanitize_title_with_dashes( $title );
	    $icon = self::create_icon( $icon );
	    $icon_plus = self::create_icon( 'plus' );

	    $accordion = "<div id='{$id}' class='ls-accordion {$class}'>
    		<h3 class='ls-accordion-title'><a href='#{$id}'>{$icon}{$title}{$icon_plus}</a></h3>
            <div class='ls-accordion-content'>" . do_shortcode( $content ) . "</div>
        </div>";

        return $accordion;

	}

	/*
	 * Align Shortcode
	 *
	 * @access public
	 * @param  array  $params
	 * @param  string $content
	 * @return string $align
	 */
	public function align( $params, $content = null ) {

	    extract( shortcode_atts([
	        'align' => '',
	        'width' => '4',
	        'class' => ''
	    ], $params) );
	    
	    return "<div class='ls-align ls-align{$align} align{$align} col-{$width} {$class}'>" . do_shortcode( $content ) . "</div>";
	
	}

	/*
	 * Posts Shortcode
	 *
	 * @access public
	 * @param  array  $params
	 * @return string $posts
	 */
	public function posts( $params ) {

        global $post;

	    extract( shortcode_atts([
	        'no'    => 5,
	        'date'  => false,
	        'image' => false,
	        'size'  => 'thumbnail',
	        'cat'   => '',
	        'tag'   => '',
	        'type'  => 'post',
	        'tax'   => '',
	        'class' => ''
	    ], $params) );

	    $args = [
	        'post_type'      => $type,
	        'posts_per_page' => $no
	    ];

	    // Post specific args
	    if ( $type === 'post' && ( $cat || $tag ) ) {
		    $post_args = [
		        'category_name'  => sanitize_title_with_dashes( $cat ),
		        'tag'            => sanitize_title_with_dashes( $tag )
		    ];
		    $args = array_merge( $args, $post_args );
	    }

	    // Custom post specific args
	    if ( $type !== 'post' && $tax ) {
	    	$taxonomy = explode( ':', $tax );
	    	if ( count( $taxonomy ) === 2 ) {
		    	$args[sanitize_title_with_dashes( $taxonomy[0] )] = sanitize_title_with_dashes( $taxonomy[1] );
	    	}
	    }

	    $posts = get_posts( $args );

	    $html = "<div class='ls-posts ls-post-{$type} {$class}'>";
	        foreach ( $posts as $post ) : setup_postdata( $post );
	            $html .= '<div class="ls-post">';
	            if ( $image && has_post_thumbnail( $post->ID ) ) {
	            	$html .= '<a href="' . get_permalink() . '" class="ls-post-image">' . get_the_post_thumbnail( $post->ID, $size ) . '</a>';
	            }
	            $html .= '<h4 class="ls-post-title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h4>';
	            if ( $date ) {
	            	$html .= "<div class='ls-post-date'>" . get_the_date() . "</div>";
	            }
	            $html .= '<div class="ls-post-content">' . get_the_excerpt() . '</div></div>';
	        endforeach; wp_reset_postdata();
	    $html .= '</div>';

	    return $html;

	}

	/*
	 * Subpages Shortcode
	 *
	 * @access public
	 * @param  array  $params
	 * @return string $posts
	 */
	public function subpages( $params ) {

        global $post;

	    extract( shortcode_atts([
	        'title'  => '',
	        'direct' => false,
	        'flatten' => false,
	        'class'  => ''
	    ], $params) );

	    $depth = ( $direct ) ?  1 : 0;
	    $depth = ( $flatten ) ? -1 : $depth;

	    $args = [
	    	'child_of' => $post->ID,
	        'depth'    => $depth,
	    	'title_li' => false,
	        'echo'     => false
	    ];
	    $subpages = wp_list_pages( $args );

	    $html = "<nav class='ls-subpages {$class}'>";
	    	$html .= "<h4>{$title}</h4>";
	        $html .= "<ul>{$subpages}</ul>";
	    $html .= '</nav>';

	    return $html;

	}

	/*
	 * Restrict Shortcode
	 *
	 * @access public
	 * @param  array  $params
	 * @param  array  $content
	 * @return string $posts
	 */
	public function restrict( $params, $content = null ) {

        global $post;

	    extract( shortcode_atts([
	        'message' => '',
	        'roles'   => '',
	        'class' => ''
	    ], $params) );

	    $user = wp_get_current_user();

	    $roles = explode( ',', $roles );
	    $roles[] = 'administrator';

	    if ( array_intersect( $roles, $user->roles ) ) {
	    	return $content;
	    }

		return "<div class='ls-restrict {$class}'>{$message}</div>";

	}

	/*
	 * Login Shortcode
	 *
	 * @access public
	 * @param array   $params
	 * @return string $login
	 */
	public function login( $params ) {

	    extract( shortcode_atts([
	        'register' => false,
	        'redirect' => home_url(),
	        'display'  => 'block',
	        'class'    => ''
	    ], $params) );

        $login_options = [
            'echo'     => false,
            'redirect' => $redirect
        ];

        $html = "<div class='ls-login ls-login-{$display} {$class}'>";
            if ( ! is_user_logged_in() ) {
                $html .= wp_login_form( $login_options );
                $html .= ( $register ) ? wp_register( '<p><i class="fa fa-angle-double-right"></i> ', '</p>', false ) : '';
            } else {
                $current_user = wp_get_current_user();
                $html .= '<span class="ls-loggedin-message">' . __( 'Hello ', 'lambry-shorts' ) . ' ' . $current_user->user_login .',</span> ';
                $html .= '<a href="' . wp_logout_url() .'" title="Logout" class="ls-logout-button">' . __( 'Logout', 'lambry-shorts' ) . '</a>';
            }
        $html .= '</div>';

	    return $html;

	}

	/*
	 * Sitemap Shortcode
	 *
	 * @access public
	 * @param  array  $params
	 * @return string $sitemap
	 */
	public function sitemap( $params ) {

	    extract( shortcode_atts([
			'menus' => false,
			'types' => false,
			'class' => ''
	    ], $params) );

	    $html = "<nav class='ls-site-map {$class}'>";

	    if ( $menus ) {

	        $menus = get_terms( 'nav_menu', [ 'hide_empty' => true ] );
	        $html .= '<h4>' . __( 'Menu Sitemap', 'lambry-shorts' ) . '</h4>';
	        foreach ( $menus as $menu ) {
	            $html .= wp_nav_menu( [ 'menu' => $menu->name, 'container_class' => 'ls-sitemap ls-sitemap-meus', 'echo' => false ] );
	        }

	    }

	    if ( $types ) {

	    	$types = explode( ',', $types );

	    	foreach ( $types as $type ) {
		        $posts = get_posts( [ 'posts_per_page' => -1, 'post_type' => $type ] );
		        $html .= '<h4>' . ucfirst( $type ) . ' ' . __( 'Sitemap', 'lambry-shorts' )  . '</h4>';
		        $html .= "<ul class='ls-sitemap ls-sitemap-{$type}'>";
		            foreach ( $posts as $post ) {
		                $html .= "<li><a href='" . get_permalink( $post->ID ) . "'>{$post->post_title}</a></li>";
		            }
		        $html .= '</ul>';
	    	}

	    }

	    $html .= '</nav>';

	    return $html;

	}

	/*
	 * Map Shortcode
	 *
	 * @access public
	 * @param  array  $params
	 * @return string $map
	 */
	public function map( $params ) {

	    extract( shortcode_atts([
	        'location' => 'Australia',
	        'width'    => '100%',
	        'class'    => ''
	    ], $params) );

	    $location = str_replace( ' ', '+', $location );
	    $width = ( is_numeric( $width ) ) ? $width . 'px' : $width;

	    $map = "<div class='ls-map {$class}' style='max-width:{$width};'><div class='ls-fluid-iframe'>
	    	<iframe src='https://maps.google.com/maps?q={$location}&output=embed' frameborder='0' scrolling='no' marginheight='0' marginwidth='0'></iframe>
	    </div></div>";

	    return $map;
	
	}

	/*
	 * Iframe Shortcode
	 *
	 * @access public
	 * @param  array  $params
	 * @return string $iframe
	 */
	public function iframe( $params ) {

	    extract( shortcode_atts([
	        'url'    => '',
	        'width'  => '100%',
	        'class'  => ''
	    ], $params) );

	    $width = ( is_numeric( $width ) ) ? $width . 'px' : $width;

	    $iframe = "<div class='ls-iframe {$class}' style='max-width:{$width};'><div class='ls-fluid-iframe'>
	    	<iframe src='{$url}' frameborder='0' marginheight='0' marginwidth='0'></iframe>
	    </div></div>";
	
		return $iframe;

	}

	/*
	 * Image Shortcode
	 *
	 * @access public
	 * @param  array  $params
	 * @return string $image
	 */
	public function image( $params ) {

	    extract( shortcode_atts([
	        'url'    => '',
	        'link'   => '',
	        'class'  => '',
	        'align'  => '',
	        'target' => 'self',
	    ], $params) );

	    $html = "<img src='{$url}' class='ls-image ls-align{$align} align{$align} {$class}'>";

	    return self::wrap_with_anchor( $link, $target, $html );
	
	}

	/*
	 * Link Shortcode
	 *
	 * @access public
	 * @param  array  $params
	 * @param  string $content
	 * @return string $link
	 */
	public function link( $params, $content = null ) {

	    extract( shortcode_atts([
	        'to'   => '#',
	        'class'  => '',
	        'target' => 'self'
	    ], $params) );

	    return "<a href='{$to}' target='_{$target}' class='ls-link {$class}'>" . do_shortcode( $content ) . "</a>";
	
	}

	/*
	 * Wrap With Anchor Helper
	 *
	 * @access public
	 * @param  string $link
	 * @param  string $target
	 * @param  string $html
	 * @return string $anchor
	 */
	private function wrap_with_anchor( $link, $target, $html ) {

	    return ( $link ) ? "<a href='{$link}' target='_{$target}'>{$html}</a>" : $html;
	
	}

	/*
	 * Create Icon Helper
	 *
	 * @access public
	 * @param  string $icon
	 * @return string $icon
	 */
	private function create_icon( $icon ) {

	    return ( $icon ) ? "<i class='fa fa-{$icon}'></i>" : '';
	
	}

}
