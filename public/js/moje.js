$(document)
.ready(function() {

  // fix menu when passed
  $('.masthead')
    .visibility({
      once: false,
      onBottomPassed: function() {
        $('.fixed.menu').transition('fade in');
      },
      onBottomPassedReverse: function() {
        $('.fixed.menu').transition('fade out');
      }
    })
  ;

  // create sidebar and attach to menu open
  $('.ui.sidebar')
    .sidebar('attach events', '.toc.item')
  ;

  // nastavení tabular menu   
  $('.menu .item').tab();

   // povolit DropDovn ve formuláři
  $('.ui.dropdown')
    .dropdown()
    ;

    // moje zakazky folmulár se odesle po kliknutí na lupu
  $('.search.link.icon')
    .on("click", function () {
      $("#hledejZakazku").submit();
    }) 
    ;

  // odeslat formulář s editací kontaktu
  $('.editContact')
  .on("click", function () {
    $("#editContact").submit();
  });

  //  otevřít formulář pro editaci kontaktu zákazníka
  $('#customer_contact_edit_button')
  .on("click", function () {
  $('.customer_contact_edit')
  .modal('show')
  })
    ; 

  //  otevřít formulář pro editaci kontaktu zákazníka
  $('.dokumenty_button')
  .on("click", function () {
    var clickedButtonId = $(this).attr("id");
      $("#filesLink").attr("data-url", "/files/list/"+clickedButtonId);
      $('.dokumenty_list').modal('show');
      $('.ui.embed').embed();
      })
    ; 

// progress bar objednano
$('.objednano').progress();






// poslední zavorka
})
;