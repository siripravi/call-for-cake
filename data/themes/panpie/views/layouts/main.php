<?php locate_template( array( 'header.php' ) );
//echo $template; // Output the path to the located template
?>
<?php
get_header(); ?>

<?php
// echos Yii content
echo $content;
?>

<?php get_footer(); ?>