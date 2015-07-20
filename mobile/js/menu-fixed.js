/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var num = 31; //number of pixels before modifying styles

$(window).bind('scroll', function () {
    if ($(window).scrollTop() > num) {
        $('#nav-fix').addClass('fixed');
    } else {
        $('#nav-fix').removeClass('fixed');
    }
});

