<?php 
/**
 * Generate Popup
 *
 * @package Shorts
 */

namespace Lambry\Shorts; 

defined( 'ABSPATH' ) || exit; ?>

<div id="shorts-generate" class="mfp-hide">

    <div class="shorts-links">

        <h2 class="shorts-heading"><?php _e( 'Shortcodes', 'shorts' ); ?></h2>

        <?php foreach( $shortcodes as $id => $shortcode ) : ?>
            <button class="shorts-link shorts-button button button-primary button-large" data-shortcode="<?php echo $id; ?>">
                <i class="fa fa-<?php echo $shortcode['icon']; ?>"></i>
                <?php echo $shortcode['title']; ?>
            </button>
        <?php endforeach; ?>

    </div><!-- .shortcode-links -->

    <?php foreach( $shortcodes as $id => $shortcode ) : ?>

        <form class="shortcode" id="<?php echo $id; ?>" data-code="<?php echo $id; ?>" 
            data-wrap="<?php echo ( isset( $shortcode['wrap'] ) ) ? $shortcode['wrap'] : ''; ?>"  
            data-child="<?php echo ( isset( $shortcode['child'] ) ) ? $shortcode['child'] : ''; ?>">

            <h2 class="shorts-title"><?php echo $shortcode['title']; ?> <i class="shorts-home fa fa-chevron-circle-left"></i></h2>

            <?php if ( isset( $shortcode['clone'] ) ) : ?>
                <div class="shorts-remove"></div>
            <?php endif; ?>
            
            <div class="shorts-field-wrap <?php echo ( isset( $shortcode['clone'] ) ) ? 'shorts-sortable' : ''; ?>">
                <div class="shorts-fields">
                    <?php foreach( $shortcode['fields'] as $name => $field ) : ?>
                        <div class="shorts-field-group <?php echo $field['type']; ?>">
                            <label for="<?php echo $name; ?>" class="shorts-label">
                                <?php echo $field['label']; ?><i></i>
                            </label>
                            <div class="shorts-field">
                                <?php echo Fields::create( $name, $field ); ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div><!-- .fields -->
            </div><!-- .field-wrap -->

            <?php if ( isset( $shortcode['clone'] ) ) : ?>
                <button class="shorts-clone shorts-button button" type="button">
                    <?php _e( 'Add New', 'shorts' ); ?>
                </button>
            <?php endif; ?>

            <button type="submit" class="shorts-insert button button-primary">
                <i class="fa fa-<?php echo $shortcode['icon']; ?>"></i>
                <?php _e( 'Insert', 'shorts' ); ?> <?php echo $shortcode['title']; ?>
            </button>

        </form><!-- .shortcode -->

    <?php endforeach; ?>

</div>
