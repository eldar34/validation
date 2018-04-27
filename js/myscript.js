window.onload = function () {

$("#ptoken").mask("999.?9?9");

$( "#signupForm" ).validate( {
        rules: {
          ptoken: "required",
          country: {
            required: true,
            minlength: 2,
            maxlength: 12
          },
           firstname: {
            required: true,
            minlength: 2,
            maxlength: 12
          },
           lastname: {
            required: true,
            minlength: 2,
            maxlength: 12
          },
       
          email: {
            required: true,
            laxEmail: true
          },

           ethereum: {
            required: true,
            ether: true
          },
          agree: "required"
        },
        messages: {
          firstname: "Please enter your firstname",
          lastname: "Please enter your lastname",
          country: {
            required: "Please enter a country",
            minlength: "Your username must consist of at least 2 characters"
          },
        
          laxEmail: "Please enter a valid5 email address",
          agree: "Please accept our policy"
        },
        errorElement: "em",
        errorPlacement: function ( error, element ) {
          
          error.addClass( "help-block" );

          if ( element.prop( "type" ) === "checkbox" ) {
            error.insertAfter( element.parent( "label" ) );
          } else {
            error.insertAfter( element );
          }
        },
        highlight: function ( element, errorClass, validClass ) {
          $( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
        },
        unhighlight: function (element, errorClass, validClass) {
          $( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
        }
      } );
jQuery.validator.addMethod("laxEmail", function(value, element) {
  
  return this.optional( element ) || /^[a-z0-9_-]+@[a-z0-9-]+\.[a-z]{2,6}$/.test( value );
}, 'Please lax enter a valid email12 address.');

jQuery.validator.addMethod("ether", function(value, element) {
  
  return this.optional( element ) || /^(0x)?[0-9a-f]{40}$/i.test( value );
}, 'Please ether enter a valid email12 address.');

}

$.validator.setDefaults( {
      submitHandler: function () {
        var msg   = $('#signupForm').serialize();        
        $.ajax({
          type: 'POST',
          url: 'add_record.php',
          data: msg,
          success: function(data) {

                $('#overlay').fadeIn(400, 
                    function(){ 
                     $('#modal_form') 
                     .css('display', 'block') 
                     .animate({opacity: 1, top: '50%'}, 200); 
                      $('#inmycont').html(data);
                     });
                $('#modal_close, #modal_close1, #overlay').click( function(){ 
                    $('#modal_form')
                    .animate({opacity: 0, top: '45%'}, 200,  
                     function(){ 
                     $(this).css('display', 'none'); 
                      $('#overlay').fadeOut(400);
                    }
                    );
                    });
           
            $("#backto").on('click', function(){
            
           
            });
          },
          error:  function(xhr, str){
      alert('Возникла ошибка: ' + xhr.responseCode);
          }
        });
      }
    } );

