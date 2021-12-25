<?php
    session_start();
    // error_reporting(0);
    include("config.php");

    if($_SESSION["loginstat"] != "true") {
        header("Location: index.php?auth=notin");
    }
    $username = $_SESSION['username'];
    $fnquery = mysqli_query($db, "SELECT fullname FROM users WHERE username = '$username'");
    $fullname = mysqli_fetch_array($fnquery);

    $sql = "
        SELECT * FROM classes WHERE class_id IN
        (SELECT class_id FROM timetable WHERE username = '$username')
        AND class_day =
    ";

    $queries = array("");
    $i = 1;
    while($i < 6){
        array_push($queries, mysqli_query($db, $sql.$i));
        $i++;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MySchool - Timetable</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <a href="logout.php" type = "button" class="btn btn-warning float-right mr-5">Log out <img src="imgs/log-out.svg"></a>
    <div class="container">
        <header><h1 class="mt-5">MySchool</h1></header>
        <?php echo "<h4>Welcome, ".$fullname['fullname'].".</h4>"?>
    </div>
    <br><br>
    <div class="container">
        <h1>Timetable</h1>
        <?php
            $i = 1;
            $days = array("", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday");
            while($i < 6){
                $class = mysqli_fetch_assoc($queries[$i]);
                if(!empty($class)){
                    echo "<h3>".$days[$i]."</h3>";
                    echo "<table class='table table-bordered'>";
                    echo "<tr>";
                    echo "<th>Subject</th>";
                    echo "<th>Class</th>";
                    echo "<th>Room</th>";
                    echo "<th>Time</th>";
                    echo "</tr>";
                    while(!empty($class)){
                        echo "<tr>";
                        echo "<td>".$class['subject_name']."</td>";
                        echo "<td>".$class['class_name']."</td>";
                        echo "<td>".$class['room_name']."</td>";
                        echo "<td>".$class['class_time']."</td>";
                        echo "</tr>";
                        $class = mysqli_fetch_assoc($queries[$i]);
                    }
                    echo "</table>";
                }
                $i++;
            }
        ?>
    </div>
</body>
</html>