<?php
if(!function_exists('event_sc')) :

    function event_sc($atts) {

        $args = shortcode_atts(
            array(
                'date' => '',
                'title' => '',
                'image' => '',
                'id' => ''
            ), $atts
        );

        $months_lables = array("Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic");

        $post_date = strtotime($args['date']);

        ob_start();
?>
<div class="event" onclick="handelModalEvent(<?= $args['id'] ?>)">
    <div class="event-image">
        <img src="<?= $args['image'] ?>">
    </div>
    <div class="event-content">
        <div class="event-date">
            <span class="month"><?=$months_lables[date("n",$post_date) - 1] ?></span>
            <span class="day"><?= date("d",$post_date) ?></span>
        </div>
        <div class="event-title">
            <h5><?= $args['title'] ?></h5>
        </div>
    </div>
</div>
<?php
        $out = ob_get_clean();

        return $out;

    }

endif;

add_shortcode('event', 'event_sc');