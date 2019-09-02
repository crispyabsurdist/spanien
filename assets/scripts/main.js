/* eslint no-global-assign: "error" */
/* global aos AOS */
/* eslint no-unused-vars:0 */

(function ($) {

  // Doc ready
  $(function () {

    var burger = document.querySelector('.ziploc'),
      header = document.querySelector('.header-menu-mobile');

    burger.onclick = function () {
      header.classList.toggle('menu-opened');
    }

    AOS.init({
      duration: 500,
      easing: 'ease-out-quart',
      once: true
    });

  })
})(jQuery);
