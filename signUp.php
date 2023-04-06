<?php
    $uName = $_POST["uName"];
    $email = $_POST["email"];
    $pw = $_POST["pw"];

    //database connection

    $conn = new mysqli('localhost', 'root', '', 'programmar');
    if($conn -> connect_error) {
        die('Connection failed : '.$conn -> connect_error);
    }
    else {
        $stmt = $conn -> prepare("insert into registrations(uName, email, pw) values(?, ?, ?)");
        $stmt -> bind_param("sss", $uName, $email, $pw);
        $stmt -> execute();
        header("Location: http://localhost/programmar/profiledit.html");
        $stmt -> close();
        $conn -> close();
    }
?>