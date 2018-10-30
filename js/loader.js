var loggedIn = Boolean(false);

$(document).ready(function () {
    $(".navbar").load("navbar.html");
    $(".content_master").load("forside.html");

});

function loadHjem() {
    $(".navbar").load("navbar.html");
    $(".content_master").load("forside.html");

}

function loadMotionsdata() {
    $(".navbar").load("navbar.html");
    
    if(loggedIn){
        $(".content_master").load("motionsdata.html");
    }
    
    else {
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

function loadGame () {
    $(".navbar").load("navbar.html");
    $(".content_master").load("unitySpil.html");
}
