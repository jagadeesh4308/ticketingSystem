<?php 
    
    include "./includes/connect.php"; 
    include "./includes/header.php";
    include "./includes/getBack.php";
    $movieSelected = $_GET['moviename'];
    
?>
    <!-- tickets booking after selection with new pattern generation -->
    <?php 
    
    if(isset($_POST['bookNow'])){
        $selections = $_POST['slot'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $query = "SELECT * FROM movieSeatPattern WHERE movieSeatPattern.movieDate = '$date' AND movieSeatPattern.movieName = '$movieSelected'";
        $response = mysqli_query($connection,$query);
        $movie = mysqli_fetch_assoc($response);
        $movieSlot1 = explode("#",$movie['slot1']);
        $movieSlot2 = explode("#",$movie['slot2']);
        $movieSlot3 = explode("#",$movie['slot3']);
        $movieSlot4 = explode("#",$movie['slot4']);
        $movieCode = $movie['movieCode'];
        $column = '';
        $oldPattern = '';
        if($movieSlot1[0] == $time){
            $column = 'slot1';
            $oldPattern = $movieSlot1[1];
        }
        if($movieSlot2[0] == $time){
            $column = 'slot2';
            $oldPattern = $movieSlot2[1];
        }
        if($movieSlot3[0] == $time){
            $column = 'slot3';
            $oldPattern = $movieSlot3[1];
        }
        if($movieSlot4[0] == $time){
            $column = 'slot4';
            $oldPattern = $movieSlot4[1];
        }

        //generating new pattern

        $newPattern = $time."#";
        $oldPatternSplit = explode('_',$oldPattern);
        $oldPatternArr = '';
        $reserves = '';

        foreach($selections as $mark=>$selection){
            $match = explode('.',$selection);
            $rowName = $match[0];
            $seatNum = $match[1];
            $rowLetter =  utf8_encode( chr((int)$rowName+65) );
            $temp = $rowLetter."-".((int)$seatNum+1);
            if($mark!=count($selections)-1){
                $reserves = $reserves.$temp.', ';
            }
            else{
                $reserves = $reserves.$temp;
            }
            foreach($oldPatternSplit as $key=>$pat){
                if($key==$rowName){
                    $oldPatternSplit[$key][$seatNum] = '1';
                }
            }
        }

        foreach($oldPatternSplit as $key=>$ele){
            if($key!=count($oldPatternSplit)-1){
                    $newPattern = $newPattern.$ele."_";
            }
            else{
                $newPattern = $newPattern.$ele;
            }
        }

        $query = "UPDATE movieSeatPattern SET {$column} = '$newPattern' WHERE movieSeatPattern.movieDate = '$date' AND movieSeatPattern.movieName = '$movieSelected'";
        mysqli_query($connection,$query);

        $movieParticular = $date."_".$time;


        $ticketID = '';
        $rows = mysqli_num_rows(mysqli_query($connection,"SELECT * FROM movieBookings WHERE movieBookings.movieName = '$movieSelected'")); 
        $ticketID = $movieCode.'00'.(((int)$rows)+1);

        mysqli_query($connection,"INSERT INTO movieBookings(ticketID,userName,movieName,movieParticulars,seatPattern) VALUES('$ticketID','$user','$movieSelected','$movieParticular','$reserves')");
        echo "Seats reserved successfully";
        header("refresh: 2; url = myBookings.php");
    
    }
    
    ?>

    <!-- loading seat matrix -->
    <?php 
        if(isset($_POST['load'])){
            $data = explode('.',$_POST['slot']);
            $date = $data[0];
            $time = $data[1];
            $query = "SELECT * FROM movieSeatPattern WHERE movieSeatPattern.movieDate = '$date' AND movieSeatPattern.movieName = '$movieSelected'";
            $response = mysqli_query($connection,$query);
            $movie = mysqli_fetch_assoc($response);
            $movieSlot1 = explode("#",$movie['slot1']);
            $movieSlot2 = explode("#",$movie['slot2']);
            $movieSlot3 = explode("#",$movie['slot3']);
            $movieSlot4 = explode("#",$movie['slot4']);
            $pattern = '';
            if($movieSlot1[0]==$time){
                $pattern = $movieSlot1[1];
            }
            if($movieSlot2[0]==$time){
                $pattern = $movieSlot2[1];
            }
            if($movieSlot3[0]==$time){
                $pattern = $movieSlot3[1];
            }
            if($movieSlot4[0]==$time){
                $pattern = $movieSlot4[1];
            }

            echo "<form action='#' method='post'>";
            echo "<input type='text' value=$date name='date'>";
            echo "<input type='text' value=$time name='time'";
            echo "<br><br>";
            $seatRows = explode('_',$pattern);
            foreach($seatRows as $rowNum=>$row){
                $seats = str_split($row);
                foreach($seats as $seatNum=>$seat){
                    if($seat=='0'){
                        echo "<input type='checkbox' value='$rowNum.$seatNum' name='slot[]'>";
                    }
                    else{
                        echo "<input type='checkbox' disabled>";
                    }
                }
                echo "<br>";
            }
            echo "<button type='submit' class='book' name='bookNow' style='display:none;'>Book Now</button></form>";
        }
    ?>

    <!-- loading movie dates and time slots -->
    <?php 
    
    $query = "SELECT * FROM movieSeatPattern WHERE movieName='$movieSelected'";
    $response = mysqli_query($connection,$query);
    echo "<form action='#' method='post'>";
    while($movie = mysqli_fetch_assoc($response)){
        $moviedate = $movie['movieDate'];
        echo $moviedate;
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

    echo "<button type='submit' name='load' class='load' style='display:none;'>Load tickets</button></form>";

    
    ?>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
    <script>
        $(document).ready(function() {
            $("input[name$='slot']").click(function() {
                $(".load").show();
            });
        });
        $(document).ready(function() {
            $("input[name$='slot[]']").click(function() {
                
                $(".book").show();
            });
        });
    </script>


<?php 

include "./includes/footer.php";

?>
