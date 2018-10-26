/* DEVELOPED FOR EDUCATIONAL PURPOSES */

var pageLoaded = $(document).attr("title");

$(document).ready(function () {

    if (pageLoaded == "Sportscaféen") {
    $(".header").load("news.html");
    $("footer").load("titel-Footer.html");
    $(".submenu_master").load("navbar_simple.html");
    $(".navbar").load("slideshow.html");
    $(".content_master").load("frontPage_content.html");
    }
    else if (pageLoaded == "Strandkioskerne") {
            $(".header").load("news.html");
    $("footer").load("titel-Footer.html");
    $(".submenu_master").load("navbar_simple.html");
    $(".content_master").load("frontPage_content.html");
    }

});

function loadMainMenu() {
    if (pageLoaded == "Strandkioskerne") {
        $("center > canvas").remove();
    } else if (pageLoaded == "Strandkioskerne_Menu") {
        $(".navbar").load("slideshow.html");
    }

    $(".content_sub > div").remove();
    $(".content_master").remove();
    $(".submenu_master").load("navbar_simple.html");
    $(".navbar").load("slideshow.html");
    $(".content_sub").load("submenu.html");
}

function loadMainContact() {
    if (pageLoaded == "Strandkioskerne") {
        $("center > canvas").remove();
    }

    $(".content_sub > div").remove();
    $(".navbar > ").remove();
    $(".content_master").remove();
    $("div.content_master > center").remove();
    $(".content_sub").load("kontakt.html");
}

function loadFood() {

    if (pageLoaded == "Strandkioskerne") {
        $(".content_sub > div").remove();
        $(".content_master").remove();
        $(".content_sub").load("is_strandkiosk.html");
    }
    $(".content_sub > div").remove();
    $(".content_master").remove();
    $(".content_sub").load("Mad.html");

}

function loadDrinks() {
    if (pageLoaded == "Strandkioskerne") {
        $(".content_sub > div").remove();
        $(".content_master").remove();
        $(".content_sub").load("drikkelse_strandkiosk.html");
    }
    $(".content_sub > div").remove();
    $(".content_master").remove();
    $(".content_sub").load("KunDrikkelse.html");

}

function loadSnacks() {
    if (pageLoaded == "Strandkioskerne") {
        $(".content_sub > div").remove();
        $(".content_master").remove();
        $(".content_sub").load("cake_strandkiosk.html");
    }
    $(".content_sub > div").remove();
    $(".content_master").remove();
    $(".content_sub").load("KunKage.html");

}

function loadOrderFood() {
    $(".content_sub > div").remove();
    $(".navbar >").remove();
    $("div.content_master > center").remove();
    $(".content_master").remove();
    $(".content_sub").load("bestilling.html");
}

function loadEvents() {
    $(".content_sub > div").remove();
    $(".navbar > div").remove();
    $("div.content_master > center").remove();
    $(".content_master").remove();
    $(".navbar").load("video_sport.html")
    $(".content_sub").load("arrangementer.html");
}

function loadSportsCenter() {
    $(".content_sub > div").remove();
    $(".content_master").remove();
    $("div.content_master > center").remove();
    $(".navbar").load("slideshow.html");
    $(".content_sub").load("idrætscenteret.html");
}
