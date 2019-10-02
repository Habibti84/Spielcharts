$(document).ready(function() {
  var formValid;

  $('#username').focus(function() {
    $(this).removeClass('is-invalid');
    })

  $('#username').blur(function() {
    var pwdReqment = /[A-Za-z0-9]/;
    if($(this).val().length < $(this).attr('min_Len') || !pwdReqment.test($(this).val())) {
      $(this).addClass('is-invalid');
      $(this).attr('placeholder', 'Benutzername eingeben');
      formValid = false;
      console.log(formValid);
    }
    else {
      $(this).removeClass('is-invalid');
      formValid = true;
    }
  })

  $('#userPassword').focus(function() {
    $(this).removeClass('is-invalid');
    })

  $("#userPassword").blur(function(){
    var pwdReqment = /[A-Za-z0-9]/;
    if($(this).val().length < $(this).attr('min_Len') ||  !pwdReqment.test($(this).val()) ) {
      console.log("Hallo2");
      $(this).addClass('is-invalid');
      formValid = false;
    }
    else {
        $(this).removeClass('is-invalid');
        formValid = true;
    }
  });

  $('#userPasswordRepeat').blur(function() {
    if($('#userPassword').val() != $('#userPasswordRepeat').val()) {
      $(this).addClass('is-invalid');
      formValid = false;
    }
    else {
      $(this).removeClass('is-invalid');
      formValid = true;
    }
  })

  console.log(formValid);


$('#btnSub').submit(function(event){
  alert("heieiei");
  if(formValid != true) {
    alert("Heieiei");

    event.preventDefault();

  }
})



});
