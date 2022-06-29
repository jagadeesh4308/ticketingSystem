<?php 

include "./includes/header.php";
include "./includes/connect.php";


?>

<?php 

if(isset($_POST['search'])){
    $id = $_POST['ticketID'];
    $query = "SELECT * FROM movieBookings WHERE ticketID='$id'";
    $response = mysqli_query($connection,$query);
    $movie = mysqli_fetch_assoc($response);
    if($movie){
        $username = $movie['userName'];
        $moviename = $movie['movieName'];
        $particulars = $movie['movieParticulars'];
        $seats = $movie['seatPattern'];
        echo $moviename."<br>";
        echo $username."<br>";
        echo $particulars."<br>";
        echo $seats;
    }
    else{
        echo "No Ticket found";
    }
}

?>

<form action="#" method='post'>
    <input type="text" placeholder='Enter ticket ID' name='ticketID'>
    <button type='submit' name='search'>Search</button>
</form>