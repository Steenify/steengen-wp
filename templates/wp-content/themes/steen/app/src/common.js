// Import JS
import 'jquery';
import 'bootstrap';

// Import css
import 'bootstrap/dist/css/bootstrap.css';
import './scss/index.scss';

$(document).ready(function(event) {
  const clickOrTouch = 'ontouchend' in window ? 'touchend' : 'click';

  // ======================= toggle header
  $('.header-search_trigger').on(clickOrTouch, function() {
    $('.header-menu').toggleClass('active');
    $(this).toggleClass('active');
  });

  // ======================= toogle menu mobile
  $('.navbar-toggler').on(clickOrTouch, function() {
    $(this).toggleClass('collapsed');
    $('.header__mobile').toggleClass('active');
  });

  $('.header__mobile-menu').on(
    clickOrTouch,
    '.nav-item .navbar-nav__toggle',
    function(e) {
      e.preventDefault();
      $(this)
        .parents('li')
        .toggleClass('active')
        .find('.navbar-nav__child')
        .stop()
        .slideToggle();
    },
  );

  //============================== open modal color detail

  const modal_view_color = $('#collection_detail__modal');
  $('[data-color]').on(clickOrTouch, function() {
    const color = $(this).data('color');
    const name = $(this).data('name');
    const title = $(this).data('title');
    const textColor = $(this).data('textColor');
    modal_view_color.removeClass('dark, bright').addClass(textColor);
    modal_view_color.find('.modal-body').css('background-color', color);
    modal_view_color.find('.color__main').html(title);
    modal_view_color.find('.color__name').html(name);
    modal_view_color.find('.color__code').html(color);
    modal_view_color.modal('show');
  });

  //=========================== click redirect
  $(document).on(clickOrTouch, '[data-custom-link]', function() {
    window.location.href = $(this).data('custom-link');
  });

  //=========================== Handle event form to send mail
  $('.register-form').on('submit', function(e) {
    var form = $(this),
      method = form.attr('method'),
      action = form.attr('action');

    e.preventDefault();
    $.ajax({
      type: method,
      url: action,
      data: form.serialize(),
      success: function(response) {
        $('#toast_modal')
          .find('.toast_modal__message')
          .html('Đăng ký thành công!');

        $('#toast_modal')
          .removeClass('fail')
          .removeClass('success')
          .addClass('success')
          .modal('show');
        setTimeout(function() {
          $('#toast_modal').modal('hide');
          form.trigger('reset');
        }, 1000);
      },
      error: function() {
        $('#toast_modal')
          .find('.toast_modal__message')
          .html('Đăng ký thất bại! Vui lòng thử lại');
        $('#toast_modal')
          .removeClass('fail')
          .removeClass('success')
          .addClass('fail')
          .modal('show');
      },
    });
  });

  //=========================== handle fixed header main

  const header = $('.header-main');
  $(window).on('scroll', function() {
    $(this).scrollTop() > 48
      ? header.addClass('fixed-header')
      : header.removeClass('fixed-header');
  });
});
