//Javascript
var a=5;
console.log(a);
// document.querySelector(".alert")==$(".alert");
//Jquery biblioteka
// 1. standartinis kodas, kuris fiksuoja, ar puslapis užsikrovęs
$(function(){

    //laikas milisekundėmis; 1000ms=1s
    //fadeIn(laikas) - atsirask, laikas, per kurį atsiranda
    //delay(laikas) - uždelsk
    //fadeOut(laikas) - išnyk

// $(".alert").fadeIn(500);
// $(".alert").delay(2000); // 1,5-3 s, kad pamatytų
// $(".alert").fadeOut(300);

$(".alert").fadeIn(1000).delay(3000).fadeOut(3000); //trumpiau

});