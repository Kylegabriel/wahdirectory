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
                        mobile_number : {
                          required: true,
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

            // jquery-mask
            $('input[name="mobile_number"]').mask('0000-0000-000',{
              placeholder: "0917-XXXX-XXX",
              clearIfNotMatch: true
            });

            $('input[name="primary_contact"]').mask('0000-0000-000',{
              placeholder: "0917-XXXX-XXX",
              clearIfNotMatch: true
            });

            $('input[name="secondary_contact"]').mask('0000-0000-000',{
              placeholder: "0917-XXXX-XXX",
              clearIfNotMatch: true
            });
            $('input[name="philhealth"]').mask('00-000000000-0',{
              placeholder: "XX-XXXXXXXXX-X",
              clearIfNotMatch: true
            });
              $('input[name="tin"]').mask('000-000-000',{
              placeholder: "XXX-XXX-XXX",
              clearIfNotMatch: true
            });
              $('input[name="sss"]').mask('00-0000000-0',{
              placeholder: "XX-XXXXXXX-X",
              clearIfNotMatch: true
            });
              $('input[name="pagibigmidno"]').mask('0000-0000-0000',{
              placeholder: "XXXX-XXXX-XXXX",
              clearIfNotMatch: true
            });
              $('input[name="pagibigrtn"]').mask('000000000000',{
              placeholder: "XXXXXXXXXXXX",
              clearIfNotMatch: true
            });
              $('input[name="mabuhaymilespal"]').mask('000000000',{
              placeholder: "XXXXXXXXX",
              clearIfNotMatch: true
            });
              $('input[name="getgocebupac"]').mask('0000000000',{
              placeholder: "XXXXXXXXXX",
              clearIfNotMatch: true
            });

       });