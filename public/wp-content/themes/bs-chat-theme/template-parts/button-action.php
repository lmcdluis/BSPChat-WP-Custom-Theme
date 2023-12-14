<?php
/**
 *  Template for information section with image
 * @package bs-chat
 */
?>
<?php
$label = $args['label'];
$url = $args['url'];
$classButton = $args['classButton'];
?>
<div class="d-grid d-md-block">
    <a class="btn btn-green <?php echo $classButton?>" href="<?php echo $url ?>"><?php echo $label ?></a>
</div>
