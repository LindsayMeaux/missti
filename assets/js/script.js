$('input[type=password][strength]').each(function(){
  let input = $(this);
  let button = $('<button class="btn-password far fa-eye" type="button"></button>');
  input.parent().append(button);
  input.parent().append('<div class="passwordStrength"><div class="passwordStrengthForeground" strength="' + input.attr('strength') + '"></div></div>');
  input.removeAttr('strength');
  button.click(function(){
    if (button.hasClass('far fa-eye')) {
      input.attr('type', 'text');
      button.addClass('far fa-eye-slash');
      button.removeClass('far fa-eye');
    } else {
      input.attr('type', 'password');
      button.addClass(<i class='far fa-eye'>);
      button.removeClass('far fa-eye-slash');
    }
  });
});
