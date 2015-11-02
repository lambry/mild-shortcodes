<?php 
/**
 * Generate View
 *
 * @package Lambry\Shorts
 */

namespace Lambry\Shorts; ?>

<div class="shortcode-links">

    <?php foreach( $shortcodes as $id => $shortcode ) : ?>

        <button class="shortcode-link button button-primary button-large" data-shortcode="<?php echo $id; ?>">
            <i class="fa fa-<?php echo $shortcode['icon']; ?>"></i>
            <?php echo $shortcode['heading']; ?>
        </button>

    <?php endforeach; ?>

</div><!-- .shortcode-links -->

<?php foreach( $shortcodes as $id => $shortcode ) : ?>

    <form class="shortcode" id="<?php echo $id; ?>" data-code="<?php echo $id; ?>" 
        data-wrap="<?php echo ( isset( $shortcode['wrap'] ) ) ? $shortcode['wrap'] : ''; ?>"  
        data-child="<?php echo ( isset( $shortcode['child'] ) ) ? $shortcode['child'] : ''; ?>">

        <h2><?php echo $shortcode['heading']; ?> <i class="home fa fa-chevron-circle-left"></i></h2>

        <div class="field-wrap <?php echo ( isset( $shortcode['clone'] ) ) ? 'sortable' : ''; ?>">
            <div class="fields">
                <?php foreach( $shortcode['fields'] as $name => $field ) : ?>
                    <div class="field-group <?php echo $field['type']; ?>">
                        <label for="<?php echo $name; ?>">
                            <?php echo $field['name']; ?><i></i>
                        </label>
                        <div class="field">
                            <?php echo Create::field( $name, $field ); ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div><!-- .fields -->
        </div><!-- .field-wrap -->

        <?php if ( isset( $shortcode['clone'] ) ) : ?>
            <button class="clone button" type="button">
                <?php _e( 'Add New', 'lambry-shorts'); ?>
            </button>
        <?php endif; ?>

    </form><!-- .shortcode -->

<?php endforeach;
