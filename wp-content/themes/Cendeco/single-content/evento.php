<?php
        $id = ($post_id)? $post_id : $id;
        $post =  get_post($id);
        $custom_fields = get_post_custom($post->ID);
        $post_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large')[0];
        $post_date = (empty($custom_fields['fecha']))? get_the_date($post->ID): $custom_fields['fecha'][0];

        $months_lables = array("Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic");

        $post_date = strtotime($post_date);
?>
<div class="event-full">
    <div class="event-content">
        <div class="event-image">
            <img src="<?= $post_image ?>">
            <div class="event-date">
                <span class="month"><?=$months_lables[date("n",$post_date) - 1] ?></span>
                <span class="day"><?= date("d",$post_date) ?></span>
            </div>
        </div>
        <div class="event-title">
            <h2><?= $post->post_title ?></h2>
        </div>
        <p><?= $post->post_content ?></p>
    </div>
</div>