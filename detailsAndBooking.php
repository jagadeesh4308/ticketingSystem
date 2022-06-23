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

    $movieSelected = $_GET['moviename'];
    
    ?>

    <?php 
        if(isset($_POST['load'])){
            echo $_POST['slot'];
        }
    ?>

    <?php 
    
    $query = "SELECT * FROM movieSeatPattern WHERE movieName='$movieSelected'";
    $response = mysqli_query($connection,$query);
    echo "<form action='#' method='post'>";
    while($movie = mysqli_fetch_assoc($response)){
        $moviedate = $movie['movieDate'];
        echo $moviedate;
        // echo "<br><input type='text' value=$moviedate>";
        $movieSlot1 = explode("#",$movie['slot1']);
        $movieSlot2 = explode("#",$movie['slot2']);
        $movieSlot3 = explode("#",$movie['slot3']);
        $movieSlot4 = explode("#",$movie['slot4']);
        if($movieSlot1[0]){
            echo "<input type='radio' name='slot' value='$moviedate.$movieSlot1[0]'>$movieSlot1[0]";
        }
        if($movieSlot2[0]){
            echo "<input type='radio' name='slot' value='$moviedate.$movieSlot2[0]'>$movieSlot2[0]";
        }
        if($movieSlot3[0]){
            echo "<input type='radio' name='slot' value='$moviedate.$movieSlot3[0]'>$movieSlot3[0]";
        }
        if($movieSlot4[0]){
            echo "<input type='radio' name='slot' value='$moviedate.$movieSlot4[0]'>$movieSlot4[0]";
        }
        echo "<br><br>";
    }

    echo "<button type='submit' name='load'>Load tickets</button></form>";

    
    ?>
</body>
</html>