<?php 

include "./includes/header.php";
include "./includes/connect.php";

?>

<?php 

if(isset($_POST['regChange'])){
    $moviename =  $_POST['moviename'];
    $date = $_POST['date'];
    $regStatus = $_POST['reg'];

    $query = "UPDATE movieSeatPattern SET isRegistrationsOpened = '$regStatus' WHERE movieSeatPattern.movieDate = '$date' AND movieSeatPattern.movieName = '$moviename'";
    mysqli_query($connection,$query);
}


?>

<a href="createMovie.php">Add a movie</a>

<br><br>

<a href="searchTicket.php">Search a ticket</a>

<br><br>

<?php 

echo "<form action='#' method='post'>";
    $query = "SELECT * FROM movieSeatPattern";
    $response = mysqli_query($connection,$query);
    while($movie = mysqli_fetch_assoc($response)){
        $movieName = $movie['movieName'];
        $movieDate = $movie['movieDate'];
        $reg = $movie['isRegistrationsOpened'];
        ?>
        <form action='#' method='post'>
            <?php 
                echo "<input type='text' value='$movieName' name='moviename'><input type='text' value='$movieDate' name='date'>";
            ?>
            Open
            <input type='radio' name='reg' value='1' <?php if($reg==1){echo 'checked';}?>>
            Close
            <input type='radio' name='reg' value='0' <?php if($reg==0){echo 'checked';}?>> 
            <button name='regChange' type='submit'>Update</button>
        </form>
        <?php
    }

?>