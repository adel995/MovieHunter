
<!DOCTYPE html>
<html lang="en">



    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">



        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <!-- Link to the CSS file-->
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>Document</title>
    </head>


    <body class="wallpaper">
        <div class="container">
            <p align="right" id="skip"><a style="text-decorations:none; color:inherit;" href="./index.html">Skip</a></p>
            <h1 id="logo">MOVIE HUNTER</h1>
            <p id="title1">RECOMMENDING THE BEST MOVIES</p>

            <!-- The Register Form -->
            <div align="center" style="margin-top: 90px;">
                <button onclick="document.getElementById('id02').style.display='block'" style="width:auto; border-radius: 25px;">Get Started</button>
            </div>




            <div id="id02" class="modal">
                <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
                <form class="modal-content" action="includes/signup.php" method="POST">
                    <div class="container">
                        <h1>Sign Up</h1>
                        <p>Please fill in this form to create an account.</p>
                        <hr>
                        <label for="name"><b>First Name</b></label>
                        <input type="text" placeholder="Enter your first name" name="fname" required>

                        <label for="name"><b>Last Name</b></label>
                        <input type="text" placeholder="Enter your last name" name="lname" required>

                        <label for="email"><b>Email</b></label>
                        <input type="text" placeholder="Enter Email" name="email" required>

                        <label for="psw"><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" name="psw" required>

                        <label for="psw-repeat"><b>Repeat Password</b></label>
                        <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
                        <!--Radio button for Gender-->
                        <div class="form-group">
                            <label><strong>Gender</strong></label>
                            <br>
                            <label class="radio-inline"> <input type="radio"  name="gender" value="f">Female</label>
                            <label class="radio-inline"><input type="radio" name="gender" value="m">Male</label></div>
                        <!-- End of radio button for Gender-->
                        <!--Date of birth form-->
                        <div class="well"> 
                            <div class="form-group">
                                <label>Date of Birth</label>
                                <input type="date" class="form-control" id="exampleInputDOB1" placeholder="Date of Birth" name="date">
                            </div>
                        </div>
                        <div class="well"> 
                        </div>
                        <!--End of Date of Birth form-->
                        <!--Checkbox for receiving E-Mails-->
                        <label>
                            <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Subscribe if you want to receive E-Mail from us
                        </label>
                        <!--End of Subscribe check box-->

                        <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>
                        
                        <hr>
                        <p><strong>Upload a photo for the profile picture</strong></p>
                        <!--Avatar upload photo-->
                        <form class="form form-vertical" action="/avatar_upload.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-4 text-center">
                                    <div class="kv-avatar">
                                        <div class="file-loading">
                                            <input id="avatar-1" name="avatar-1" type="file" >
                                        </div>
                                    </div>
                                    <div class="kv-avatar-hint"><small>Select file < 1500 KB</small></div>
                                    </div>
                                    <div class="imgcontainer">
                                        <img src="avatar2.png" alt="Avatar" class="avatar">
                                    </div>  


                                    <!--End of avatar upload photo-->
                                    <div class="clearfix">
                                        <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
                                        <button type="submit" class="signupbtn" name="signup">Sign Up</button>
                                    </div>
                                </div>
                                </form>
                            </div>

                        <script>
                            // Get the modal
                            var modal2 = document.getElementById('id02');

                            // When the user clicks anywhere outside of the modal, close it
                            window.onclick = function(event) {
                                if (event.target == modal) {
                                    modal2.style.display = "none";
                                }
                            }
                        </script>
                        <script>
                            var btnCust = '<button type="button" class="btn btn-secondary" title="Add picture tags" ' + 
                                'onclick="alert(\'Call your custom code here.\')">' +
                                '<i class="glyphicon glyphicon-tag"></i>' +
                                '</button>'; 
                            $("#avatar-1").fileinput({
                                overwriteInitial: true,
                                maxFileSize: 1500,
                                showClose: false,
                                showCaption: false,
                                browseLabel: '',
                                removeLabel: '',
                                browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
                                removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
                                removeTitle: 'Cancel or reset changes',
                                elErrorContainer: '#kv-avatar-errors-1',
                                msgErrorClass: 'alert alert-block alert-danger',
                                defaultPreviewContent: '<img src="/samples/default-avatar-male.png" alt="Your Avatar">',
                                layoutTemplates: {main2: '{preview} ' +  btnCust + ' {remove} {browse}'},
                                allowedFileExtensions: ["jpg", "png", "gif"]
                            });
                        </script>


                        <!-- End of Register Form -->
                        </div>
                    <!-- The Login Form -->

        <!-- Button to open the modal login form -->
                    <div align="center" class="log">
                    <p id="log">Already have an account?<button style="background-color: transparent;" onclick="document.getElementById('id01').style.display='block'">Login</button></p>
                    </div>
        

        <!-- The Modal -->
        <div id="id01" class="modal">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>

            <!-- Modal Content -->
            <form class="modal-content animate" action="includes/login.php" method="POST" name="login">
                <div class="imgcontainer">
                    <img src="avatar2.png" alt="Avatar" class="avatar">
                </div>

                <div class="container">
                    <label for="uname"><b>Email</b></label>
                    <input type="text" placeholder="Enter Email" name="email" required>

                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="psw" required>

                    <button type="submit" name="login">Login</button>
                    <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
                </div>

                <div class="container" style="background-color:#f1f1f1">
                    <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                    <span class="psw"> <a onclick="document.getElementById('id04').style.display='block'" href="#">Forgot password?</a></span>
                </div>
            </form>
        </div>

        <script>
            // Get the modal
            var modal = document.getElementById('id01');

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        </script>


        <!-- Forgot password Form -->
        <!-- This needs to be fixed so that it determines if the apporpriate e-mail is entered -->

        <!-- The Modal -->
        <div id="id04" class="modal">
            <span onclick="document.getElementById('id04').style.display='none'" class="close" title="Close Modal">&times;</span>

            <!-- Modal Content -->
            <form class="modal-content animate" action="includes/forgotPassword.php" method="POST">


                <div class="container">
                    <label for="fpass"><b>Please enter your e-mail address so we can send you the password</b></label>
                    <input type="text" placeholder="Enter your E-mail" name="email" required>



                    <button type="forgotpass" name="sendEmailSubmit">Send e-mail</button>

                </div>


            </form>
        </div>

        <script>
            // Get the modal
            var modal = document.getElementById('id04');

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        </script>

        <!-- End of forgot password Form -->


        <!-- End of Login Form -->
                    </body>


                </html>