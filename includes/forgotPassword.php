<?php
if (isset($_POST['sendEmailSubmit'])) {
    //create a selector variable and assign random bytes that
    //will contain the token and also convert it to a hexadecimal
    //value so we can be able to put it in links
    //bytes are not something that can be put in links
    $selector = bin2hex(random_bytes(8));
    //the reason we create two token and not use the same one is
    //because it is safer against hackers
    $token = random_bytes(32);

    $url = "localhost/webProgPrj/support/changePassword.php?selector=" . $selector . "&validator=" . bin2hex($token);

    $expires = date("U") + 1800;

    //connection to database
    require '../includes/connect.php';

    //fetch information from form
    $email = $_POST["email"];

    //check that there are no token that belong to the specific user in the database
    $sql = "DELETE FROM pswreset WHERE pswResetEmail=?;";
    //prepare statement
    $stmt = mysqli_stmt_init($conn);
    //check if the sql statment is proper
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "prepare error";
        exit();
    } else {
        //execute sql statment inside the database
        mysqli_stmt_bind_param($stmt, "s", $email); //this tells the system what the "?" will be replaced with before executing the statement
        //now that we have the data ready, we can execute it
        mysqli_stmt_execute($stmt);
    }
    //insert the token in the database
    $sql = "INSERT INTO pswreset (pswResetEmail, pswResetSelector, pswResetToken, pswResetExpires) VALUES (?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    //check if the sql statment is proper
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "prepare error2";
        exit();
    } else {
        //hash the token before anything
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        //execute sql statment inside the database
        mysqli_stmt_bind_param($stmt, "ssss", $email, $selector, $hashedToken, $expires); //this tells the system what the "?" will be replaced with before executing the statement
        //now that we have the data ready, we can execute it
        mysqli_stmt_execute($stmt);
    }
    //close any open statements
    mysqli_stmt_close($stmt);
    //close connection
    mysqli_close($conn);

    //email data
    $to = $email;

    $subject = 'Reset password to Movie Hunter';

    $message = '<p>we revieved a password reset request from you. click the link below to reset your password or ignore this message if you did not make a request.</p>';
    $message .= '<p>Here is your password reset link: </p></br>';
    $message .= '<a href="' . $url . '">CLICK HERE TO RESET YOUR PASSWORD</a></p>';
    $headers = "From: Movie Hunter <MovieHunter@gmail.com>\r\n";
    $headers .= "Reply-To: MovieHunter@gmail.com\r\n";
    //in order for html to work in the message:
    $headers .= "Content-type: text/html\r\n";

    mail($to, $subject, $message, $headers);

    header("Location: ../support/sendEmailtoChangePassword.php?reset=success");
} else {
    header("Location:../index.php");
}
