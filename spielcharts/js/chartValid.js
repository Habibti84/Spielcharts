$(document).ready(function() {


  //Autofocus auf erstes Inputfeld
  $('#eingabe1').focus();
  $("#eingabe1:text:visible:first").focus();

  var formValid;

  //---------Inputfelder validieren
  /*$('.eingabe').focus(function() {
    $(this).removeClass('is-invalid');
    formValid = true;
  })

  $('.eingabe').blur(function() {

    var pwdReqment = /[0-9]/;
    if($(this).val() != "" && pwdReqment.test($(this).val()) && $(this).val() >= 0) {
      $(this).removeClass('is-invalid');
      formValid = true;
    }
    else {
      $(this).addClass('is-invalid');
      formValid = false;
    }
  })
  //---------Ende Inputfelder validieren

  //---------Wenn Submit geklickt

  $('#submit').click(function(event){

    $('.eingabe').each(function(event) {
      var valid = /[0-9]/;
      if($(this).val() != "" && valid.test($(this).val()) && $(this).val() >= 0) {
        formValid = true;
        $(this).removeClass('is-invalid');
      }
      else {
        $(this).addClass('is-invalid');
        formValid = false;
      }
    })

    if(formValid != true || formValid == false) {
      console.log(formValid);
      event.preventDefault();
      event.stopPropagation();
      console.log("gestoppt");
    }
  })
  //---------Ende Wenn Submit geklickt


})
