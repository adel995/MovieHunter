<?php

if (isset($_POST['signup'])) {
    require "connect.php";

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $psw = $_POST['psw'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $date = date('Y-m-d', strtotime($_POST['date']));
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) && (!preg_match("/^[a-zA-Z]*$/", $fname) || !!preg_match("/^[a-zA-Z]*$/", $lname))) {
        header("LOCATION: ../startingpage.php?error=invalidfnameorlnamemail");
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("LOCATION: ../startingpage.php?error=invalidmail&fname=" . $fname . "&lname=" . $lname);
        exit();
    } else if (!(preg_match("/^[a-zA-Z]*$/", $fname) || preg_match("/^[a-zA-Z]*$/", $lname))) {
        header("LOCATION: ../startingpage.php?error=invalidfnameorlname&email=" . $email);
        exit();
    } else {
        $sql = "SELECT e_mail FROM user WHERE e_mail =?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("LOCATION: ../startingpage.php?error=sqlerror1");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                header("LOCATION: ../startingpage.php?error=emailalreadyregistered&fname" . $fname . "&lname" . $lname);
                exit();
            } else {
                $newUser = "INSERT INTO user (fname,lname,psw,e_mail,gender,dob) 
                VALUES (?,?,?,?,?,?);";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $newUser)) {
                    header("LOCATION: ../startingpage.php?error=sqlerror2");
                    exit();
                } else {
                    $hashedPwd = password_hash($psw, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "ssssss", $fname, $lname, $hashedPwd, $email, $gender, $date);
                    mysqli_stmt_execute($stmt);
                    session_start();
                    $_SESSION['email'] = $email;
                    $_SESSION['fname'] = $fname;
                    header("LOCATION: ../index.php?signup=success");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header("LOCATION: ../startingpage.php");
}
