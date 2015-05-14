<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Signup</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/styles.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="css/jasny-bootstrap.min.css"></script>
        <script src="js/signup_ajax.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="col-md-offset-3 col-md-6 col-md-offset-3">
                <form action="signup_result.php" method="POST">
                    <div class="row">
                        <!-- Sex -->
                        <div id="sex-group" class="form-group text-center">
                            <div class="col-md-6">
                                <label for="sex" id="sex">I am &nbsp; &nbsp; &nbsp;
                                    <input type="radio" name="sex" id="sex_male" value="male" checked hidden />
                                    <i class="fa fa-5x fa-male red"></i>
                                    <input type="radio" name="sex" id="sex_female" value="female" hidden>
                                    <i class="fa fa-5x fa-female"></i>
                                </label>
                            </div>
                            <div class="col-md-6">
                                <label for="prefered" id="prefered"> &nbsp; &nbsp; &nbsp; Seeking a &nbsp; &nbsp; &nbsp;
                                    <input type="checkbox" name="prefered" id="prefered_male" value="male" checked hidden />
                                    <i class="fa fa-5x fa-male red"></i>
                                    <input type="checkbox" name="prefered" id="prefered_female" value="female" hidden>
                                    <i class="fa fa-5x fa-female"></i>
                                </label>
                                <a href="#" onclick="bisexual()"><p class="text-muted"><small>Bisexual?</small></p></a>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- First Name -->
                        <div id="fname-group" class="form-group">
                            <input type="text" class="form-control" name="fname" placeholder="First Name" />
                        </div>
                    </div>

                    <div class="row">
                        <!-- Last Name -->
                        <div id="lname-group" class="form-group">
                            <input type="text" class="form-control" name="lname" placeholder="Last Name" />
                        </div>
                    </div>

                    <div class="row">
                        <!-- Zip code -->
                        <div id="zip_code-group" class="form-group">
                            <input type="text" class="form-control" name="zip_code" placeholder="Zip / Postal" />
                        </div>
                    </div>

                    <div class="row">
                        <!-- Country -->
                        <div id="country-group" class="form-group">
                            <select class="form-control" name="country">
                                <option value="" selected disabled>Choose your Country</option>
                                <option value="Canada">Canada</option>
                                <option value="Philippines">Philippines</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Email -->
                        <div id="email-group" class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Email Address" />
                        </div>
                    </div>

                    <div class="row">
                        <!-- Password -->
                        <div id="password-group" class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password" />
                        </div>
                    </div>

                    <div class="row">
                        <!-- Confirm Password -->
                        <div id="confirm_password-group" class="form-group">
                            <input type="password" class="form-control" name="confirm_password" placeholder="Confirm password" />
                        </div>
                    </div>

                    <div class="row">
                        <!-- Birthday -->
                        <div id="birthday-group" class="form-group">
                            <input type="text" class="form-control" data-mask="99/99/9999" name="birthday" placeholder="Birthdate (MM/DD/YYYY)" />
                        </div>
                    </div>

                    <div class="row">
                        <!-- Role -->
                        <div id="role-group" class="form-group text-center" hidden>
                            <label for="role">Role
                                <input type="radio" name="role" value="user" checked />
                                <i class="fa fa-5x fa-users"></i>
                                <input type="radio" name="role" value="admin" />
                                <i class="fa fa-5x fa-user-secret"></i>
                            </label>
                        </div>

                        <p class="text-muted text-center">
                            <input type="checkbox" name="sex" id="terms_checked" value="male" onclick="terms_function()"/>
                            By clicking register you agree to our <a href="#" data-toggle="modal" data-target="#terms">terms and conditions.
                            </a></p>
                    </div>

                    <div class="row">
                        <button type="submit" class="btn btn-success center-block btn-block" id="btn_submit" name="submit" disabled="disabled"/>
                        Submit
                        &#160;
                        <i class="fa fa-1x fa-sign-in"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="terms" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title text-center">Terms and Conditions</h4>
                    </div>
                    <div class="modal-body">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque exercitationem quibusdam ipsam ratione quidem aut distinctio voluptatem libero dolores necessitatibus. Vitae, ea, odit obcaecati possimus dolor totam quas fugiat molestiae quam neque impedit exercitationem adipisci inventore! Quaerat, totam, illo, eaque, tempora iste reprehenderit quibusdam ipsa culpa qui ipsum optio at rem voluptatibus voluptate dolore dicta deleniti nulla omnis debitis praesentium tenetur nam corporis odit? Id, omnis eligendi eaque libero cumque optio maiores aut quas aspernatur vel ullam temporibus deleniti mollitia ipsum laborum facere assumenda tempora voluptate sed qui iure culpa adipisci quos nisi minima. Ab, eius, fugiat, ullam laudantium asperiores veritatis aperiam odio laborum dignissimos cumque eum adipisci consequuntur accusamus! Sint, iste impedit ullam quo quia commodi ut. Placeat quod eos explicabo commodi nesciunt. Repudiandae, architecto, ut, explicabo quasi libero ullam doloribus nam molestias facere modi sed doloremque aliquam enim assumenda quidem sequi hic. Similique eligendi quo velit a illum.
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <script>
            var glyphicon_color = "red";

            $(document).ready(function () {
                $("#btn_submit").prop("disabled", true);
                $("#terms_checked").prop("checked", false);
                /*
                 For sex (gender)
                 */
                var sex_group = "#sex .fa-male, #sex .fa-female";
                $(sex_group).click(function () {
                    $(sex_group).removeClass(glyphicon_color);
                    $(this).addClass(glyphicon_color);
                });

                $('#sex .fa-male').on("click", function () {
                    $("#sex_female").prop("checked", false);
                    $("#sex_male").prop("checked", true);
                });

                $('#sex .fa-female').on("click", function () {
                    $("#sex_male").prop("checked", false);
                    $("#sex_female").prop("checked", true);
                });

                /*
                 For prefered
                 */
                var prefered_group = "#prefered .fa-male, #prefered .fa-female";
                $(prefered_group).click(function () {
                    $(prefered_group).removeClass(glyphicon_color);
                    $(this).addClass(glyphicon_color);
                });

                $('#prefered .fa-male').on("click", function () {
                    $("#prefered_female").prop("checked", false);
                    $("#prefered_male").prop("checked", true);
                });

                $('#prefered .fa-female').on("click", function () {
                    $("#prefered_male").prop("checked", false);
                    $("#prefered_female").prop("checked", true);
                });
            });


            function bisexual() {
                var prefered_group = "#prefered .fa-male, #prefered .fa-female";


                $(prefered_group).addClass(glyphicon_color);

                $("#prefered_male").prop("checked", true);
                $("#prefered_female").prop("checked", true);

            }

            function terms_function() {
                if ($('#btn_submit').is(':disabled')) {
                    $("#btn_submit").prop("disabled", false);
                }
                else {
                    $("#btn_submit").prop("disabled", true);
                }
            }
        </script>



        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
        <script src="js/holder.js"></script>
        <script src="js/jasny-bootstrap.min.js"></script>
    </body>
</html>
