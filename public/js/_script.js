      $(document).ready(function(){

            // to remove dropdown suggested comment in form input
            // $('input').attr('autocomplete','off');
            // to prevent clicking outside of the modal
            $('.modal').modal({
                show: false,
                backdrop: 'static'
            })


            // Bootstrap 
            $('.dropdown-toggle').dropdown();
            // DataTables

            $('#example')
            .DataTable({
                  "scrollY"        : "400px",
                  "scrollCollapse" : true,
                  "responsive": true
            });
            
            $('[data-toggle="tooltip"]').tooltip();

            $('form').each(function() {
              $.validator.setDefaults({
                     ignore: []
              });
            $(this).validate({
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
                          email: true,
                          required: true
                        },
                        birthdate: {
                          required: true
                        },
                        primary_contact: {
                          number: true,
                          minlength: 11,
                          maxlength:11
                        },
                        secondary_contact : {
                          number: true,
                          minlength: 11,
                          maxlength:11
                        },
                        mobile_number : {
                          required: true,
                          number: true,
                          minlength: 11,
                          maxlength:11
                        },
                        status: {
                          required: true
                        },
                        sitDesignation: {
                          required: true
                        },
                        site: {
                          required: true
                        },
                        course: {
                          required: true
                        },
                        school: {
                          required: true
                        },
                        paper: {
                          required: true
                        },

                        username: {
                          required: true,
                          minlength: 4,
                          maxlength: 10
                        },
                        password: {
                          required: true,
                          minlength: 4,
                          maxlength: 10
                        },
                        comfirm_password: {
                          required: true,
                          equalTo: "#password"
                        }
                      },
                              highlight: function(element) {
                        $(element).closest('.form-control').addClass('is-invalid');
                    },
                    unhighlight: function(element) {
                        $(element).closest('.form-control').removeClass('is-invalid');
                    },
                    errorElement: 'div',
                    errorClass: 'invalid-feedback',
                    errorPlacement: function(error, element) {
                        if(element.parent('.invalid-feedback').length) {
                            error.insertAfter(element.parent());
                        } else {
                            error.insertAfter(element);
                        }
                    }
              });
            });
       });