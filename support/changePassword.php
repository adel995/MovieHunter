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


<?php
//get the selector and the validator from the url
$selector = $_GET["selector"];
$validator = $_GET["validator"];

//make sure they are not empty
if (empty($selector) || empty($validator)) {
    echo "could not validate your request!";
} 
else {
    //check if they are of hexadecimel type
    if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
        ?>
        <div id="id01">
            <span class="close" title="Close Modal">&times;</span>

            <!-- Modal Content -->
            <form class="modal-content animate" action="../includes/resetPassword.php" method="POST">
                <div class="imgcontainer">
                    <img src="avatar2.png" alt="Avatar" class="avatar">
                </div>

                <div class="container">
                    <input type="hidden" name="selector" value="<?php echo $selector;?>">
                    <input type="hidden" name="validator" value="<?php echo $validator;?>">
                    <label for="uname"><b>Please enter your new Password</b></label>
                    <input type="password" placeholder="New password" name="newPass" required>

                    <input type="password" placeholder="Repeat new password" name="newPassre" required>

                    <button type="submit" name="changePass">CHANGE PASSWORD</button>
                    <label>
                    </label>
                </div>


            </form>
        </div>
    <?php
    }
}
?>


</html>