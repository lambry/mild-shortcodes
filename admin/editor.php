<?php
/**
 * Generate shortcode views
 */
require 'includes/bootstrap.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shortcodes</title>
    <!-- Load styles -->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/modal.css" rel="stylesheet">
</head>
<body>
    <div class="shortcodes">
        <div class="shortcode-links">
            <?php foreach( $shortcodes as $id => $shortcode ) : ?>
                <button class="shortcode-link" data-shortcode="<?php echo $id; ?>">
                    <i class="fa fa-<?php echo $shortcode['icon']; ?>"></i>
                    <?php echo $shortcode['heading']; ?>
                </button>
            <?php endforeach; ?>
        </div><!-- .shortcode-links -->
        <?php foreach( $shortcodes as $id => $shortcode ) : ?>
            <form class="shortcode" id="<?php echo $id; ?>" data-code="<?php echo $id; ?>" data-wrap="<?php echo $shortcode['wrap']; ?>">
                <h2><?php echo $shortcode['heading']; ?> <i class="home fa fa-chevron-circle-left"></i></h2>
                <div class="fields">
                    <?php foreach( $shortcode['fields'] as $name => $field ) : ?>
                        <div class="field-group">
                            <label for="<?php echo $name; ?>">
                                <?php echo $field['name']; ?><i></i>
                            </label>
                            <div class="field">
                                <?php echo $fields::generate( $name, $field ); ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php if ( array_key_exists( 'clone', $shortcode ) ) : ?>
                    <button class="clone" type="button"><?php _e( 'Add New', 'mild-sc'); ?></button>
                <?php endif; ?>
                <button type="submit" class="submit">
                    <i class="fa fa-<?php echo $shortcode['icon']; ?>"></i>
                    <?php _e( 'Insert Shortcode', 'mild-sc' ) ?>
                </button>
            </form><!-- .shortcode -->
        <?php endforeach ?>
    </div><!-- .shortcodes -->
<!-- Load scripts -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="assets/js/modal.js"></script>
</body>
</html>