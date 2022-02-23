<?php
    end($settings["obpress_custom_breadcrumbs"]);
    $lastkey = key($settings["obpress_custom_breadcrumbs"]);
?>

<div class="breadcrumbs">
    <?php foreach($settings["obpress_custom_breadcrumbs"] as $key => $breadcrumb): ?>
        <?php if ($lastkey == $key): ?>
            <span class="custom_breadcrumb last_breadcrumb"><?= $breadcrumb["obpress_custom_breadcrumbs_name"] ?></span>
        <?php else: ?>
            <a class="custom_breadcrumb" href="<?= $breadcrumb["obpress_custom_breadcrumbs_location"] ?>"><?= $breadcrumb["obpress_custom_breadcrumbs_name"] ?></a>
            <span class="breadcrumb_slash">/</span>
        <?php endif; ?>
    <?php endforeach; ?>
</div>