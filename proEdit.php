<?php
    $fName = $_POST["fName"];
    $lName = $_POST["lName"];
    $bio = $_POST["bio"];
    $work = $_POST["work"];
    $education = $_POST["education"];
    $location = $_POST["location"];

    //database connection

    $conn = new mysqli('localhost', 'root', '', 'programmar');
    if($conn -> connect_error) {
        die('Connection failed : '.$conn -> connect_error);
    }
    else {
        $stmt = $conn -> prepare("insert into userdetails(fName, lName, bio, work, education, location) values(?, ?, ?, ?, ?, ?)");
        $stmt -> bind_param("sss", $fName, $lName, $bio, $work, $education, $location);
        $stmt -> execute();
        //header("Location: http://localhost/programmar/profiledit.html");
        $stmt -> close();
        $conn -> close();
    }
?>