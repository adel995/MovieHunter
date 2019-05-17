<?php
if (isset($_POST['changePass'])) {
    $selector = $_POST["selector"];
    $validator = $_POST["validator"];
    $password = $_POST["newPass"];
    $passwordRepeat = $_POST["newPassre"];

    if (empty($password) || empty($passwordRepeat)) {
        header("Location:../changePassword.php?newpsw=empty&selector=" . $selector . "&validator=" . $validator);
        exit();
    } else if ($password != $passwordRepeat) {
        header("Location:../changePassword.php?newpsw=pswnotmatch&selector=" . $selector . "&validator=" . $validator);
        exit();
    }
    //get the current date, to compare with the date that we inserted
    //in the database to check whether the token is expired or not
    $currDate = date("U");

    //database connection
    require 'connect.php';

    //select the token from the database
    //in the expire variable we don't need to use a place holder because it's
    //a parameter that we created and was not taken from the user
    $sql = "SELECT * FROM pswreset WHERE pswResetSelector=? AND pswResetExpires >= $currDate;";
    $stmt = mysqli_stmt_init($conn);
    //check if the sql statment is proper
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "prepare error1";
        exit();
    } else {
        //execute sql statment inside the database
        mysqli_stmt_bind_param($stmt, "s", $selector); //this tells the system what the "?" will be replaced with before executing the statement
        //now that we have the data ready, we can execute it
        mysqli_stmt_execute($stmt);
        //get result
        $result = mysqli_stmt_get_result($stmt);
        //fetch the only one row that we got from result (it's one row
        //because we always should have one token per user)
        //we check if we cannot fetch any rows i.e there is no token 
        if (!$row = mysqli_fetch_assoc($result)) {
            echo "Error occured, please resubmit your reset request";
            exit();
        }
        //otherwise we have our result fetched in the associative array
        else {
            //now that we have the data from the database, we need to match
            //the token that we have from the database with the token
            //that is sent from the form
            //we need to make sure that both of these tokens are of binary type
            //the token in the form is hexadecimal so we need to convert it back
            //to binary
            $tokenBin = hex2bin($validator);
            $tokenCheck = password_verify($tokenBin, $row["pswResetToken"]);

            if ($tokenCheck == false) {
                echo "Error occured, please resubmit your reset request2";
                exit();
            } elseif ($tokenCheck === true) {
                $tokenEmail = $row["pswResetEmail"];

                $sql = "SELECT * FROM user WHERE e_mail=?;";
                $stmt = mysqli_stmt_init($conn);
                //check if the sql statment is proper
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo "prepare error2";
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);


                    if (!$row = mysqli_fetch_assoc($result)) {
                        echo "An error occured!";
                        exit();
                    } else {
                        //we need to update the information inside the user table
                        //sql statement to upadate the password inside the user's table
                        $sql = "UPDATE user SET psw =? WHERE e_mail=?;";
                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            echo "prepare error2";
                            exit();
                        } else {
                            //we need to update the password now, but it has to be hashed first
                            $newPswHash = password_hash($password, PASSWORD_DEFAULT);
                            mysqli_stmt_bind_param($stmt, "ss", $newPswHash, $tokenEmail);
                            mysqli_stmt_execute($stmt);
                            //delete the token that was created upon the user's request to change the password
                            $sql = "DELETE FROM pswReset WHERE pswResetEmail=?;";
                            //prepare statement
                            $stmt = mysqli_stmt_init($conn);
                            //check if the sql statment is proper
                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                                echo "prepare error";
                                exit();
                            } else {
                                //execute sql statment inside the database
                                mysqli_stmt_bind_param($stmt, "s", $tokenEmail); //this tells the system what the "?" will be replaced with before executing the statement
                                //now that we have the data ready, we can execute it
                                mysqli_stmt_execute($stmt);
                                header("LOCATION: ../support/loginform.php?newpsw=passwordUpdated");
                            }
                        }
                    }
                }
            }
        }
    }
} else {
    header("Location:../index.php");
}
