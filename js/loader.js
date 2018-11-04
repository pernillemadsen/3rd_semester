$(document).ready(function () {
    $(".navbar").load("navbar.html");
    $(".content_master").load("forside.html");

});

function loadHjem() {
    $(".navbar").load("navbar.html");
    $(".content_master").load("forside.html");
}

function loadSpil() {
    var loggedIn = Boolean(false);
    $(".navbar").load("navbar.html");
    
    if (loggedIn) {
        $(".content_master").load("unitySpil.html");
    }

     else {
        $(".content_master").load("loginSide.html");
    }
}

function loadMotionsdata() {
    $(".navbar").load("navbar.html");

    if (loggedIn) {
        $(".content_master").load("motionsdata.html");
    } else {
        $(".content_master").load("loginSide.html");
    }
}


function loadSundhedsfakta() {
    $(".navbar").load("navbar.html");
    $(".content_master").load("sundhedsfakta.html");
}


function loadOmprojektet() {
    $(".navbar").load("navbar.html");
    $(".content_master").load("omProjektet.html");

}
