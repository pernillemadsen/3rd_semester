var loggedIn = Boolean(false);

$(document).ready(function () {

    $(".navbar").load("index.html");
    $(".content_master").load("forside.html");

});

function loadHjem() {
    $(".navbar").load("index.html");
    $(".content_master").load("forside.html");

}

function loadMotionsdata() {
    $(".navbar").load("index.html");
    
    if(loggedIn){
        $(".content_master").load("motionsdata.html");
    }
    
    else {
        $(".content_master").load("loginSide.html");
    }
}


function loadSundhedsfakta() {
    $(".navbar").load("index.html");
    $(".content_master").load("sundhedsfakta.html");
}


function loadOmprojektet() {
    $(".navbar").load("index.html");
    $(".content_master").load("omProjektet.html");

}
