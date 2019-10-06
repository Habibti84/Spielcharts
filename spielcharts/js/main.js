$(document).ready(function() {
  var formValid = false;


  //---------Autofocus auf erstes Inputfeld
  $('#userName').focus();
  $("#userName:text:visible:first").focus();

  //---------Feld Benutzername überprüfen
  $('#userName').focus(function() {
    $(this).removeClass('is-invalid');
  })

  $('.inp').blur(function() {
    var pwdReqment = /[A-Za-z0-9]*/;
    var val = $(this).val();
    var test = val.match(pwdReqment);
    var length = $(this).val();
    console.log("test: " + test);
    console.log("length: " + length.length);
    if(test.length == length.length && length.length >= $(this).attr('min_Len')) {
      $(this).removeClass('is-invalid');
      formValid = true;
    }
    else {
      $(this).addClass('is-invalid');
      formValid = false;
    }
  })
  //---------Ende Feld Benutzername überprüfen

  //---------Feld Passwort überprüfen
  $('.passW').focus(function() {
    $(this).removeClass('is-invalid');
  })

  $(".passW").blur(function(){
    var pwdReqment = /[A-Za-z0-9]/;
    if($(this).val().length >= $(this).attr('min_Len') &&  pwdReqment.test($(this).val()) ) {
      $(this).removeClass('is-invalid');
      formValid = true;




    }
    else {
      $(this).addClass('is-invalid');
      $(this).val("");
      $(this).attr('placeholder', 'Passwort (min 6 Zeichen)');
      formValid = false;
    }
  });
  //---------Ende Feld Passwort überprüfen

  //---------Feld Passwortrep mit Passwort vergeleichen
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
  //---------Ende Feld Passwortrep mit Passwort vergeleichen

  //---------Bei Submit überprüfen ob formValid "true" ist
  $('.btnSub').click(function(event){
    if(formValid != true || formValid == false) {
      event.preventDefault();
      event.stopPropagation();
    }
  })
  //---------Ende Bei Submit überprüfen ob formValid "true" ist


});

window.onload = function() {
  var w = window.innerWidth;
  if(w <= 751) {
    document.getElementById('azell').src="Bilder/alpaufzug-klein.jpg";
  }
}
