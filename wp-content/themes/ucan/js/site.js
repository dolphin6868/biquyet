$(document).ready(function() {

    switchTabComment('uc');

    $('#comment-tabs a').click(function(event) {
        event.preventDefault();

        switchTabComment($(this).attr('data-id'));
    });

    function switchTabComment(id) {
        if (id === 'uc') {
            $('#comments').show();
            $('#fb-comment-tab').hide();
            $('#comment-tabs a[data-id="uc"]').addClass('active').siblings().removeClass('active')
        } else {
            $('#fb-comment-tab').show();
            $('#comments').hide();
            $('#comment-tabs a[data-id="fb"]').addClass('active').siblings().removeClass('active')
        }
    }
});