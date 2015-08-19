/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var num = 31; //number of pixels before modifying styles
var a = $("#test-jc");


$(window).scroll(function () {    
    
    if ($(window).scrollTop() > num) 
    {                        
         a.addClass('fixed');        
    } 
    else 
    {        
        a.removeClass('fixed');
    }
});

