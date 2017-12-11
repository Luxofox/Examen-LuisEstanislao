$(document).ready(function() {
    $("form input:button").click(function() {
      $.ajax({
        type: "POST",
        url: 'login.php',
        data: $('form').serialize(),
        dataType: 'json',
        success: function(data) {
          $('section').fadeOut('fast', function() {
            $('section').html('Welcome ' + data.name).fadeIn('fast', function() {
              $('body').css({'backgroundColor': '#' + data.background});
            });
          });
        },
        statusCode: {
          403: function(e) {
            $("#message").html(e.responseText);
          }
        }
      });
      return false;
    });
  });