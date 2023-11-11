<?php
$fristName = $_POST["fristName"];
$lastName = $_POST["lastName"];
$email = $_POST["email"];

$error = [
    'fristNameError' => '',
    'lastNameError' => '',
    'emailError' => '',
];
if (isset($_POST["           submit"])) {


    if (empty($fristName)) {
        $error['fristNameError'] = 'يرجى ادخال الاسم الأول';
    }
    if (empty($lastName)) {
        $error['lastNameError'] = 'يرجى ادخال الاسم الأخير';
    }
    if (empty($email)) {
        $error['emailError'] = 'يرجى ادخال البريد الإلكتروني ';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error['emailError'] = 'يرجى ادخال البريد الإلكتروني بشكل صحيح ';
    }

    if (!array_filter($error)) {
        $fristName = mysqli_real_escape_string($conn, $_POST["fristName"]);
        $lastName = mysqli_real_escape_string($conn, $_POST["lastName"]);
        $email = mysqli_real_escape_string($conn, $_POST["email"]);


        $sql = "INSERT INTO users(fristName,lastName,email)
                    VALUES('$fristName','$lastName','$email')";

        if (mysqli_query($conn, $sql)) {
            header("Location: " . $_SERVER['PHP_SELF']);
        } else {
            echo "Error" . mysqli_connect_error();
        }
    }
}
