<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticketing System</title>
</head>
<body>
    <?php 
    
    include "./includes/connect.php"; 
    session_start();
    $_SESSION['userGender'] = 'girl';
    
    ?>

    <?php 
    
    echo "<form action='#' method='post'>";
    $query = "SELECT DISTINCT movieName FROM movieSeatPattern";
    $response = mysqli_query($connection,$query);
    while($movie = mysqli_fetch_assoc($response)){
        $movieName = $movie['movieName'];
        echo "<a href='detailsAndBooking.php?moviename=$movieName'>$movieName</a><br><br>";
    }
    
    ?>
</body>
</html>