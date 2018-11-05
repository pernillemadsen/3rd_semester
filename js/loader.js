<<<<<<< HEAD
var loggedIn = Boolean(true);
=======
var loggedIn = Boolean(false);
>>>>>>> master

$(document).ready(function () {
<<<<<<< HEAD

    $(".navbar").load("index.html");
=======
    
    $(".navbar").load("navbar.html");
>>>>>>> 5e4aa729dab46156382d58a7f43027b33c0abe6b
    $(".content_master").load("forside.html");
<<<<<<< HEAD
    $(".footer").load("footer.html");
=======
>>>>>>> master

});

<<<<<<< HEAD
function loadHjem() {
    $(".navbar").load("index.html");
=======
function loadHjem(){
    $(".navbar").load("navbar.html");
>>>>>>> 5e4aa729dab46156382d58a7f43027b33c0abe6b
    $(".content_master").load("forside.html");

}

function loadMotionsdata() {
<<<<<<< HEAD
    $(".navbar").load("index.html");
    
    if(loggedIn){
        $(".content_master").load("motionsdata.html");
    }
    
    else {
        $(".content_master").load("loginSide.html");
    }
=======
    $(".navbar").load("navbar.html");
    $(".content_master").load("motionsdata.html");
>>>>>>> 5e4aa729dab46156382d58a7f43027b33c0abe6b
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
