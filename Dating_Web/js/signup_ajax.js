// magic.js
$(document).ready(function () {

    // process the form
    $('form').submit(function (event) {

        $('.form-group').removeClass('has-error'); // remove the error class
        $('.help-block').remove(); // remove the error text

        // get the form data
        // there are many ways to get this data using jQuery (you can use the class or id also)
        var formData = {
            'fname': $('input[name=fname]').val(),
            'lname': $('input[name=lname]').val(),
            'zip_code': $('input[name=zip_code]').val(),
            'country': $('select[name=country]').val(),
            'email': $('input[name=email]').val(),
            'password': $('input[name=password]').val(),
            'confirm_password': $('input[name=confirm_password]').val(),
            'birthday': $('input[name=birthday]').val(),
            'sex': $('input[name=sex]:checked').val(),
            'role': $('input[name=role]:checked').val()
        };

        // process the form
        $.ajax({
            type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url: 'signup_result.php', // the url where we want to POST
            data: formData, // our data object
            dataType: 'json', // what type of data do we expect back from the server
            encode: true
        })
                // using the done promise callback
                .done(function (data) {

                    // log data to the console so we can see
                    console.log(data);

                    // here we will handle errors and validation messages
                    if (!data.success) {
                        
                        // First Name ---------------
                        if (data.errors.fname) {
                            $('#fname-group').addClass('has-error'); // add the error class to show red input
                            $('#fname-group').append('<div class="help-block">' + data.errors.fname + '</div>'); // add the actual error message under our input
                        }
                        
                        // Last Name ---------------
                        if (data.errors.lname) {
                            $('#lname-group').addClass('has-error');
                            $('#lname-group').append('<div class="help-block">' + data.errors.lname + '</div>');
                        }
                        
                        // Zip Code ---------------
                        if (data.errors.zip_code) {
                            $('#zip_code-group').addClass('has-error');
                            $('#zip_code-group').append('<div class="help-block">' + data.errors.zip_code + '</div>');
                        }
                        
                        // Country ---------------
                        if (data.errors.country) {
                            $('#country-group').addClass('has-error');
                            $('#country-group').append('<div class="help-block">' + data.errors.country + '</div>');
                        }

                        // Email ---------------
                        if (data.errors.email) {
                            $('#email-group').addClass('has-error');
                            $('#email-group').append('<div class="help-block">' + data.errors.email + '</div>');
                        }

                        // Password ---------------
                        if (data.errors.password) {
                            $('#password-group').addClass('has-error');
                            $('#password-group').append('<div class="help-block">' + data.errors.password + '</div>');
                        }

                        // Confirm Password ---------------
                        if (data.errors.confirm_password) {
                            $('#confirm_password-group').addClass('has-error');
                            $('#confirm_password-group').append('<div class="help-block">' + data.errors.confirm_password + '</div>');
                        }

                        // Birthday ---------------
                        if (data.errors.birthday) {
                            $('#birthday-group').addClass('has-error');
                            $('#birthday-group').append('<div class="help-block">' + data.errors.birthday + '</div>');
                        }

                        // Sex ---------------
                        if (data.errors.sex) {
                            $('#sex-group').addClass('has-error');
                            $('#sex-group').append('<div class="help-block">' + data.errors.sex + '</div>');
                        }

                        // Role ---------------
                        if (data.errors.role) {
                            $('#role-group').addClass('has-error');
                            $('#role-group').append('<div class="help-block">' + data.errors.role + '</div>');
                        }

                        

                    } else {

                        // ALL GOOD! just show the success message!
                        $('form').append('<div class="alert alert-success">' + data.message + '</div>');

                        // usually after form submission, you'll want to redirect
                        
                       window.location = "signin.php"; // redirect a user to another page

                    }
                })

                // using the fail promise callback
                .fail(function (data) {

                    // show any errors
                    // best to remove for production
                    console.log(data);
                    
                    $('form').append('<div class="alert alert-danger">' + data.message + '</div>');
                    
                });

        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });

});
