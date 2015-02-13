<?php
/**
 * Shortcode Fields
 *
 */

namespace Mild\Shortcodes;

/* Fields Class */
class Fields {

    /**
     * Generate
     *
     * Generate the required field
     *
     * @access public
     * @param  string  $name
     * @param  array   $field
     * @return hmtl    $html
     */
	public static function generate( $name, $field ) {

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
     * Generates a text field
     *
     * @access private
     * @param  array   $field
     * @return html    $html
     */
    private static function text( $name, $field ) {

        if ( ! isset( $field['placeholder'] ) ) $field['placeholder'] = '';

        return "<input name='{$name}' id='{$name}' class='input' placeholder='{$field['placeholder']}' type='text'>";

    }

    /**
     * Select
     *
     * Generates a select box
     *
     * @access private
     * @param  array   $field
     * @return html    $html
     */
	private static function select( $name, $field ) {

        $html = "<select name='{$name}' id='{$name}' class='input' type='text'>";
            $html .= '<option value=""> -- select -- </option>';
            foreach ( $field['values'] as $value => $name ) {
                $html .= "<option value='{$value}'>{$name}</option>";
            }
        $html .= "</select>";

        return $html;

	}

    /**
     * Checkbox
     *
     * Generates a checkbox
     *
     * @access private
     * @param  array   $field
     * @return html    $html
     */
    private static function checkbox( $name, $field ) {

        return "<input name='{$name}' id='{$name}' class='check' type='checkbox'>";

    }
}
