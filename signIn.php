<?php
    $email = $_POST["email"];
    $pw = $_POST["pw"];

    //database connection

    $conn = new mysqli('localhost', 'root', '', 'programmar');
    if($conn -> connect_error) {
        die('Connection failed : '.$conn -> connect_error);
    }
    else {
        $stmt = $conn -> prepare("select * from registrations where email = ?");
        $stmt -> bind_param("s", $email);
        $stmt -> execute();
        $stmt_result = $stmt -> get_result();
        if($stmt_result -> num_rows > 0) {
            $data = $stmt_result -> fetch_assoc();
            if($data['pw'] === $pw) {
                header("Location: http://localhost/programmar/index.html");
            }
            else {
                echo "Invalid email / password";
            }
        }
        else {
            echo "Invalid email / password";
        }
        
        $stmt -> close();
        $conn -> close();
    }
?>