/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var num = 31; //number of pixels before modifying styles

$(window).scroll(function () {
    if ($(window).scrollTop() > 32) 
    {        
        $('#test-jc').addClass('fixed');        
    } 
    else 
    {
        $('#test-jc').removeClass('fixed');
    }
});

