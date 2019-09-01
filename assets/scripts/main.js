(function ($) {

  // Doc ready
  $(function () {

    var burger = document.querySelector('.ziploc'),
      header = document.querySelector('.header-menu-mobile');

    burger.onclick = function () {
      header.classList.toggle('menu-opened');
    }

  })
})(jQuery);
