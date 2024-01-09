/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";

var path = location.pathname.split('/');
var path2 = location.pathname.split('/');
var url = location.origin + '/' + path[1];
var url2 = location.origin + '/' + path2[1]+ '/' + path2[2];

$('ul.sidebar-menu li a').each(function () {
  if ($(this).attr('href').indexOf(url2) !== -1) {
    $(this)
      .parent()
      .addClass('active')
      .parent()
      .parent('li')
      .addClass('active')
  }

});

