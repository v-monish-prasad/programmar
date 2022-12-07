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
        $stmt = $conn -> prepare("insert into registrations(id, userName, email, password) values(?, ?, ?, ?)");
        $stmt -> bind_param("isss", $id, $userName, $email, $password);
        $stmt -> execute();
        echo "Registration succesful";
        $stmt -> close();
        $conn -> close();
    }
?>