<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">



    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Link to the CSS file-->
    <link rel="stylesheet" type="text/css" href="../style.css">
    <title>Document</title>
</head>

<div id="id01">
    <span class="close" title="Close Modal">&times;</span>

    <!-- Modal Content -->
    <form class="modal-content animate" action="../includes/login.php" method="POST">
        <div class="imgcontainer">
            <img src="avatar2.png" alt="Avatar" class="avatar">
            <?php
            //checks the url for a reset parameter
            if (isset($_GET["newpsw"])) {
                if ($_GET["newpsw"] == "passwordUpdated") {
                    echo '<p style="color: green;">Your password has been successfully updated!</p>';
                }
            }
            ?>
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
            <span class="psw"> <a onclick="document.getElementById('id04').style.display='block'" href="#">Forgot password?</a></span>
        </div>
    </form>
</div>


<!-- Forgot password Form -->
<!-- This needs to be fixed so that it determines if the apporpriate e-mail is entered -->

<!-- The Modal -->
<div id="id04" class="modal">
    <span onclick="document.getElementById('id04').style.display='none'" class="close" title="Close Modal">&times;</span>

    <!-- Modal Content -->
    <form class="modal-content animate" action="sendEmailtoChangePassword.php" method="POST">


        <div class="container">
            <label for="fpass"><b>Please enter your e-mail address so we can send you the password</b></label>
            <input type="text" placeholder="Enter your E-mail" name="fpass" required>



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

</html>