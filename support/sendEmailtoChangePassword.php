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
    <form class="modal-content animate" action="../includes/forgotPassword.php" method="POST">
        <div class="imgcontainer">
            <img src="avatar2.png" alt="Avatar" class="avatar">
        </div>

        <div class="container">
            <label for="fpass"><b>Please enter your e-mail address so we can send you the password</b></label>
            <input type="text" placeholder="Enter your E-mail" name="email" required>


            <?php
            //checks the url for a reset parameter
            if (isset($_GET["reset"])) {
                if ($_GET["reset"] == "success") {
                    echo '<p style="color: green;">Instructions to change the password has been sent to your email!</p>';
                }
            }
            ?>
            <button type="forgotpass" name="sendEmailSubmit">Send e-mail</button>

        </div>


    </form>
</div>

</html>