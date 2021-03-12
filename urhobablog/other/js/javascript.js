var siteURL = "http://192.168.1.31/";

// Slider settings start
$('.carousel').carousel({
    interval: 2000
});
// Slider settings end

// Back to top function star
$(document).ready(function () {
    $(window).scroll(function () {
        if ($(this).scrollTop() > 50) {
            $('#back-to-top').fadeIn();
        } else {
            $('#back-to-top').fadeOut();
        }
    });
    // scroll body to 0px on click
    $('#back-to-top').click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 400);
        return false;
    });
});

// Back to top function end

// Image drag reject start
$('img').on('dragstart', function (event) { event.preventDefault(); });
// Image drag reject end


// Search menu button start
function searchMenuNavigate(e) {
    var button = document.getElementById('searchMenu');
    var keyword = button.value;
    if (keyword == null || keyword == "") {
        e.style.color = "#dc3545";
        e.style.borderColor = "#dc3545";

    } else {
        e.style.color = "#28a745";
        e.style.borderColor = "#28a745";
        var link = siteURL + "search/" + keyword + "/page/1";
        window.location = link;
    }
}
// Search menu button end

// Search page404 button start
function search404Navigate(e) {
    var button = document.getElementById('search404');
    var keyword = button.value;
    if (keyword == null || keyword == "") {
        e.style.color = "#dc3545";
        e.style.borderColor = "#dc3545";
    } else {
        e.style.color = "#28a745";
        e.style.borderColor = "#28a745";
        var link = siteURL + "search/" + keyword + "/page/1";
        window.location = link;
    }
}
// Search page404 button end