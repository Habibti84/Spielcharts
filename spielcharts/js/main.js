$(document).ready(function() {
  var formValid;

  $('.userN').focus(function() {
    $(this).removeClass('is-invalid');
  })

  $('.userN').blur(function() {
    var pwdReqment = /[A-Za-z0-9]/;
    if($(this).val().length < $(this).attr('min_Len') || !pwdReqment.test($(this).val())) {
      $(this).addClass('is-invalid');
      formValid = false;
    }
    else {
      $(this).removeClass('is-invalid');
      formValid = true;
    }
  })

  $('.passW').focus(function() {
    $(this).removeClass('is-invalid');

  })

  $(".passW").blur(function(){
    var pwdReqment = /[A-Za-z0-9]/;
    if($(this).val().length < $(this).attr('min_Len') ||  !pwdReqment.test($(this).val()) ) {
      $(this).addClass('is-invalid');
      $(this).val("");
      $(this).attr('placeholder', 'Passwort (min 6 Zeichen)');
      formValid = false;
    }
    else {
      $(this).removeClass('is-invalid');
      formValid = true;
    }
  });

  $('#userPasswordRepeat').blur(function() {
    if($('.passW').val() != $('#userPasswordRepeat').val()) {
      $(this).addClass('is-invalid');
      $(this).val("");
      $(this).attr('placeholder', 'Passwörter stimmen nicht überein');
      formValid = false;
    }
    else {
      $(this).removeClass('is-invalid');
      formValid = true;
    }
  })



  $('.eingabe').blur(function(event) {
      var valid = /[0-9]/;
      if($(this).val() == "") {
      $(this).addClass('is-invalid');
      formValid = false;
    }
    else {
      formValid = true;
      $(this).removeClass('is-invalid');
    }

    $('.eingabe').focus(function() {
      $(this).removeClass('is-invalid');
    })
  })

  //Autofocus auf inputfeld
  /*$('#eingabe1').focus();
	$("#eingabe1:text:visible:first").focus();*/

  


console.log(formValid);
  $('.btnSub').click(function(event){
    console.log(formValid);
    if(formValid != true || formValid == false) {
      console.log("Warum");
      event.preventDefault();
      event.stopPropagation();
    }
  })



});
