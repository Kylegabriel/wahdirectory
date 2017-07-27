      $(document).ready(function(){

            $('form').each(function() {
              $.validator.setDefaults({
                     ignore: []
              });
              $(this).validate({
                      errorClass: "invalid form-error",       
                      errorElement : 'div',       
                      errorPlacement: function(error, element) {
                          error.appendTo( element.parent() );
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
                          maxlength: 20
                        },
                        email: {
                          email: true
                        },
                        primary_contact: {
                          number: true,
                          maxlength: 11
                        },
                        secondary_contact : {
                          number: true,
                          maxlength: 11
                        },
                        suffixName: {
                          required: true
                        },
                        is_active: {
                          required: true
                        },
                        status: {
                          required: true
                        },
                        sitDesignation: {
                          required: true
                        },
                        site: {
                          required: true
                        }
                      }
              });
            });

            /*$('form').each(function() {  // attach to all form elements on page
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
                      maxlength: 20
                    },
                    email: {
                      email: true
                    },
                    primary_contact: {
                      number: true,
                      maxlength: 11
                    },
                    secondary_contact : {
                      number: true,
                      maxlength: 11
                    },
                    site: {
                      required: true
                    },
                    suffixName: {
                      required: true
                    }
                  }
                });
            });*/
            
            $('.dropdown-button').dropdown({
                belowOrigin: true,
                  }
              );
            $('select').material_select();
            $('ul.tabs').tabs({ 
              responsiveThreshold : 1920
            });
            $('.modal').modal({
              dismissible: false
            });
            $('.datepicker').pickadate({
                selectMonths: true,
                selectYears: 50,
                format: 'yyyy-mm-dd',
              });
            $('.tooltipped').tooltip({delay: 50});
            $('.button-collapse').sideNav();
            $('.collapsible').collapsible();
            //$(".button-collapse").sideNav();
       });