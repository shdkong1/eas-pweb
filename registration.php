<?php
    include("config.php");

    if(isset($_POST['register'])){
        $name = $_POST['fullname'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "
            INSERT INTO users (username, password, fullname) VALUE ('$username', '$password', '$name')
        ";
        $query = mysqli_query($db, $sql);

        if( $query ) {
            header('Location: index.php?auth=registered');
        } else {
            header('Location: register.php?auth=regfail');
        }
    }
?>