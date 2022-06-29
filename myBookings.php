<?php 
    
    include "./includes/connect.php"; 
    include "./includes/header.php";
    include "./includes/getBack.php";
    
?>

<?php 

    $query = "SELECT * FROM movieBookings WHERE userName='$user'";
    $response = mysqli_query($connection,$query);
    while($movie = mysqli_fetch_assoc($response)){
        $movieParticulars = explode('_',$movie['movieParticulars']);
        $ticketID = $movie['ticketID'];
        $seats = $movie['seatPattern'];
        $movieName = $movie['movieName'];
        $movieDate = $movieParticulars[0];
        $movieSlot = $movieParticulars[1];
        $nOfSeats = count(explode(", ",$movie['seatPattern']));
        
        echo "Ticket ID: $ticketID"."<br>";
        echo "Movie Name: $movieName"."<br>";
        echo "Movie Date: $movieDate"." - ".$movieSlot."<br>";
        echo "No of seats: $nOfSeats"."<br>";
        echo "Seats: $seats"."<br>";

        echo "<br>";
        
    }

?>