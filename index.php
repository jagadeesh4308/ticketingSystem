<?php 
    
    include "./includes/connect.php"; 
    include "./includes/header.php";
    session_start();
    $_SESSION['userName'] = 'jagadeesh4308@gmail.com';
    
?>

<style>
    
</style>

<?php 

    $query1 = "SELECT * FROM movieSeatPattern WHERE isRegistrationsOpened=1";
    $response1 = mysqli_query($connection,$query1);
    echo "<h1>Current movies</h1>";
    while($movie = mysqli_fetch_assoc($response1)){
        $movieName = $movie['movieName'];
        $movieImg = $movie['moviePoster'];
        $regStatus = $movie['isRegistrationsOpened'];
        echo "<a href='detailsAndBooking.php?moviename=$movieName' class='card'>
                    <div class='img'><img src='images/$movieImg'></div>
                    <h4>$movieName</h4>
                  </a><br><br>";
    }

    $query2 = "SELECT * FROM movieSeatPattern WHERE isRegistrationsOpened=0";
    $response2 = mysqli_query($connection,$query2);
    echo "<h1>Upcoming movies</h1>";
    while($movie = mysqli_fetch_assoc($response2)){
        $movieName = $movie['movieName'];
        $movieImg = $movie['moviePoster'];
        $regStatus = $movie['isRegistrationsOpened'];
        echo "<div class='card'>
                    <div class='img'><img src='images/$movieImg'></div>
                    <h4>$movieName</h4>
                  </div><br><br>";
    }
    
?>

<?php 

include "./includes/footer.php";

?>