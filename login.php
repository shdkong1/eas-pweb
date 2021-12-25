<?php
    session_start();
    include("config.php");

    $username = $_POST['username'];
    $password = $_POST['password'];
    $username_escape = mysqli_real_escape_string($db, $username);
	$password_escape = mysqli_real_escape_string($db, $password);

    $query = "
        SELECT *
        FROM users
        WHERE username = '$username_escape' AND password = '$password_escape'
    ";

    $data = mysqli_query($db, $query);
    $check = mysqli_num_rows($data);

	if ($check > 0) {
		$_SESSION["username"] = $username;
		$_SESSION["loginstat"] = "true";
		header("Location: timetable.php");
	} else {
		header("Location: index.php?auth=fail");
	}
?>