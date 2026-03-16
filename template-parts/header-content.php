<?php
/**
 * Header Content
 */
$displayHeaderBar = get_option('displayHeaderBar');
?>
<div class="header-bar">
    <a href="<?php echo $displayHeaderBar['url']; ?>"><?php echo $displayHeaderBar['text']; ?></a>
    <div class="header-bar__logo"><a href="/"><img src="<?php echo CORE_URL; ?>/assets/logo.png" /></a></div>
</div>