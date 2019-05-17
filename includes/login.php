<?php
if (isset($_POST['login'])) {
    require 'connect.php';

    $email = $_POST['email'];
    $psw = $_POST['psw'];


    $sql = "SELECT * FROM user WHERE e_mail=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../startingpage.php?error=sqlerror1");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc($result)) {
            $pswCheck = password_verify($psw, $row['psw']);
            if ($pswCheck == false) {
                header("Location: ../startingpage.php?error=wrongpass");
                exit();
            } else if ($pswCheck == true) {
                session_start();
                $_SESSION['email'] = $row['e_mail'];
                $_SESSION['fname'] = $row['fname'];
                header("Location: ../index.php?login=success");
                exit();
            }
        } else {
            header("Location: ../startingpage.php?error=nouser");
            exit();
        }
    }
} else {
    header("LOCATION: ../startingpage.php?error5");
    exit();
}
