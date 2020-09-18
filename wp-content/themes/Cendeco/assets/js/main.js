(function() {
    changeDefaultTextAlert()
})()

function changeDefaultTextAlert() {
    if (!jQuery('.wpoi-submit-failure').size()) {
        window.requestAnimationFrame(changeDefaultTextAlert);
    } else {
        jQuery('.wpoi-submit-failure').text('¡El correo ya ha sido registrado!');
    }
}

function handelModalEvent(eventId) {
    const ajaxurl = 'http://' + window.location.host + '/wp-admin/admin-ajax.php';
    jQuery.post(ajaxurl, {
        action: 'ajax_content',
        name: 'evento',
        id: eventId
    }, function (response) {
        let content = jQuery('#popmake-749').find('div.pum-content.popmake-content').get(0);
        jQuery(content).html(response);
        PUM.open(749);
    })
};

