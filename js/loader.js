var loggedIn = Boolean(false);

$(document).ready(function () {
<<<<<<< HEAD
    $(".navbar").load("navbar.html");
=======

    $(".navbar").load("index.html");
>>>>>>> parent of 9099a74... Merge branch 'master' of https://github.com/pernillemadsen/3rd_semester
    $(".content_master").load("forside.html");

});

function loadHjem() {
<<<<<<< HEAD
    $(".navbar").load("navbar.html");
=======
    $(".navbar").load("index.html");
>>>>>>> parent of 9099a74... Merge branch 'master' of https://github.com/pernillemadsen/3rd_semester
    $(".content_master").load("forside.html");

}

function loadMotionsdata() {
<<<<<<< HEAD
    $(".navbar").load("navbar.html");
=======
    $(".navbar").load("index.html");
>>>>>>> parent of 9099a74... Merge branch 'master' of https://github.com/pernillemadsen/3rd_semester
    
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
