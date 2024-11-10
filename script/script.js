$(document).ready(function () {

    // contact form
    $(".helloBtn").click(function () {
        $("#hello-form").css({ 'display': 'block' }, 500);
        $("#hello-form").animate({ 'opacity': '1' }, 500);
        $('#blur').animate({ 'opacity': '0.4' }, 500);
    });

    $(".close").click(function () {
        $("#hello-form").css({ 'display': 'none' }, 500);
        $("#hello-form").animate({ 'opacity': '0' }, 500);
        $('#blur').animate({ 'opacity': '1' }, 500);
    });

    /* Sign Form
    $(".btn01").click(function () {
        $("#container").css({ 'display': 'block' }, 500);
        $("#container").animate({ 'opacity': '1' }, 500);
        $('#blur').animate({ 'opacity': '0.4' }, 500);
    });

    $(".close").click(function () {
        $("#container").css({ 'display': 'none' }, 500);
        $("#container").animate({ 'opacity': '0' }, 500);
        $('#blur').animate({ 'opacity': '1' }, 500);
    }); 
    */


    // countries more button
    $("#moreCountries").fadeOut();
    $("#more").click(function () {
        var x = $("#moreCountries");
        if (!x.is(":visible")) {
            x.show(600);
            $(this).text("See Less");
        } else {
            x.hide(600);
            $(this).text("See More");
        };
    });
});

//script for automatic fade slideshow
var myIndex = 0;
carousel();
function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    myIndex++;
    if (myIndex > x.length) { myIndex = 1 }
    x[myIndex - 1].style.display = "block";
    setTimeout(carousel, 3000);
}

//  About scripts.js

let slideIndex = 0;
showSlides();

function showSlides() {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 2000); // Change image every 2 seconds
}
