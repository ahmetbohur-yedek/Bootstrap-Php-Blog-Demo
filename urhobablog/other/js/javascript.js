var siteURL = "http://192.168.1.31/";


// Back to top function star
$(document).ready(function() {
    $(window).scroll(function() {
        if ($(this).scrollTop() > 50) {
            $('#back-to-top').fadeIn();
        } else {
            $('#back-to-top').fadeOut();
        }
    });
    // scroll body to 0px on click
    $('#back-to-top').click(function() {
        $('body,html').animate({
            scrollTop: 0
        }, 400);
        return false;
    });
});

// Back to top function end

// Image drag reject start
$('img').on('dragstart', function(event) { event.preventDefault(); });
// Image drag reject end

// Search page404 button start
function search404Navigate(){
    var button = document.getElementById('search404');
    var keyword = button.value;
    var link = siteURL +"search/" + keyword + "/page/1";
    window.location = link;
}
// Search page404 button end