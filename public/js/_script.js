      $(document).ready(function(){

            $('form').each(function() {  // attach to all form elements on page
                $(this).validate({ // initialize plugin on each form
                errorClass: 'invalid',
                  errorPlacement: function (error, element) {
                      $(element)
                          .closest("form")
                          .find("label[for='" + element.attr("id") + "']")
                          .attr('data-error', error.text());
                  },
                  rules: {
                    last_name: {
                      required: true,
                      maxlength: 20
                    },
                    first_name: {
                      required: true,
                      maxlength: 20 
                    },
                    middle_name: {
                      required: true,
                      maxlength: 20
                    },
                    email: {
                      email: true
                    },
                    secondary_contact: {
                      maxlength: 11,
                      number: true
                    },
                    primary_contact: {
                      number: true,
                      maxlength: 11
                    }
                  },
                  /*messages: {
                    cname: "Please specify your name",
                    email: {
                      required: "We need your email address to contact you",
                      email: "Your email address must be in the format of name@domain.com"
                    }
                  }*/
                });
            });
            
            $('.dropdown-button').dropdown({
                belowOrigin: true, // Displays dropdown below the button
                  }
              );
            $('select').material_select();
            $('.modal').modal({
              dismissible: false
            });
            $('.datepicker').pickadate({
                selectMonths: true, // Creates a dropdown to control month
                selectYears: 50,
                format: 'yyyy-mm-dd', // Creates a dropdown of 15 years to control year
              });
            $('.tooltipped').tooltip({delay: 50});
            $('.button-collapse').sideNav();
            $('.collapsible').collapsible();
       });