/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/*
Modified by quocdunginfo
 */
$(document).ready(function () {
    /* => Not work => unknown
    $(window).scroll(function () {

    });
    */
    window.onscroll=function() {
        var num = 31; //number of pixels before modifying styles
        var a = $("#test-jc");

        if ($(window).scrollTop() > num)
        {
            a.addClass('fixed');
        }
        else
        {
            a.removeClass('fixed');
        }
    }
});


