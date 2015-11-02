<?php
/**
 * Shortcodes Create
 *
 * @package Lambry\Shorts
 */

namespace Lambry\Shorts;

if ( ! defined( 'WPINC' ) ) die;

/* Create Class */
class Create {

    /**
     * Field
     *
     * Create the required field.
     *
     * @access public
     * @param  string $name
     * @param  array  $field
     * @return null
     */
	public static function field( $name, $field ) {

        switch ( $field['type'] ) {
            case 'text':
                return self::text( $name, $field );
                break;

            case 'select':
                return self::select( $name, $field );
                break;

            case 'checkbox':
                return self::checkbox( $name, $field );
                break;

            default:
                return self::text( $name, $field );
                break;
        }

	}

    /**
     * Text
     *
     * Generates a text field.
     *
     * @access private
     * @param  string $name
     * @param  array  $field
     * @return string $text
     */
    private static function text( $name, $field ) {

        if ( ! isset( $field['placeholder'] ) ) $field['placeholder'] = '';

        return "<input name='{$name}' class='input' placeholder='{$field['placeholder']}' type='text'>";

    }

    /**
     * Select
     *
     * Generates a select box.
     *
     * @access private
     * @param  string $name
     * @param  array  $field
     * @return string $select
     */
	private static function select( $name, $field ) {

        $attr = ( isset( $field['attr'] ) ) ? $field['attr'] : '';        

        $html = "<select name='{$name}' class='input {$name}' type='text' {$attr}>";
            if ( $attr !== 'multiple' ) {
                $html .= '<option value="">' . __( '-- select --', 'lambry-shorts' ) . '</option>';
            }
            foreach ( $field['values'] as $value => $name ) {
                $html .= "<option value='{$value}'>{$name}</option>";
            }
        $html .= "</select>";

        return $html;

	}

    /**
     * Checkbox
     *
     * Generates a checkbox.
     *
     * @access private
     * @param  string $name
     * @param  array  $field
     * @return string $checkbox
     */
    private static function checkbox( $name, $field ) {

        return "<input name='{$name}' class='check' type='checkbox'>";

    }

}
