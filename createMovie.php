<?php 

include "./includes/header.php";
include "./includes/connect.php";


?>

<?php 

if(isset($_POST['create'])){
    $moviename =  $_POST['moviename'];
    $moviecode =  $_POST['moviecode'];
    $date = $_POST['moviedate'];
    $desc = $_POST['moviedescription'];
    $cost = $_POST['cost'];
    $movieimg = $_FILES['movieImg']['name'];
    $movietrailer = $_POST['trailer'];

    $slot1 = $_POST['slot1'];
    $rows1 = $_POST['rows1'];
    $seats1 = $_POST['seats1'];

    $slot2 = $_POST['slot2'];
    $rows2 = $_POST['rows2'];
    $seats2 = $_POST['seats2'];

    $slot3 = $_POST['slot3'];
    $rows3 = $_POST['rows3'];
    $seats3 = $_POST['seats3'];

    $slot4 = $_POST['slot4'];
    $rows4 = $_POST['rows4'];
    $seats4 = $_POST['seats4'];

    $regStatus = $_POST['reg'];

    $pattern1 = $pattern2 = $pattern3 = $pattern4 = NULL;


    function generate($rows,$seats){
        $pattern = '';
        for($i=1;$i<=$rows;$i++){
            $sub = str_repeat("0", $seats);
            if($i!=$rows){
                $pattern = $pattern.$sub."_";
            }
            else{
                $pattern = $pattern.$sub;
            }
        }
        return $pattern;
    }


    if($slot1){
        $pattern1 = $slot1.'#';
        $pattern1 = $pattern1.generate($rows1,$seats1);
    }
    if($slot2){
        $pattern2 = $slot2.'#';
        $pattern2 = $pattern2.generate($rows2,$seats2);
    }
    if($slot3){
        $pattern3 = $slot3.'#';
        $pattern3 = $pattern3.generate($rows3,$seats3);
    }
    if($slot4){
        $pattern4 = $slot4.'#';
        $pattern4 = $pattern4.generate($rows4,$seats4);
    }

    $upload = 'images/';
    move_uploaded_file($_FILES['movieImg']['tmp_name'],$upload.basename($_FILES['movieImg']['name']));

    mysqli_query($connection,"INSERT INTO movieSeatPattern(movieName,movieCode,movieDate,movieDescription,ticketCost,moviePoster,movieTrailer,slot1,slot2,slot3,slot4,isRegistrationsOpened) VALUES('$moviename','$moviecode','$date','$desc','$cost','$movieimg','$movietrailer','$pattern1','$pattern2','$pattern3','$pattern4','$regStatus')");

    echo "Movie added successfully";
    header("refresh: 2; url = admin.php");

}

?>

<form action="#" method="post" enctype="multipart/form-data">
    <input type="text" placeholder='moviename' name='moviename' required>
    <br><br>
    <input type="text" placeholder='moviecode' name='moviecode' required>
    <br><br>
    <input type="text" placeholder='Ex:29-06-2022' name='moviedate' required>
    <br><br>
    <textarea name="moviedescription" cols="30" rows="10" placeholder='Description' required></textarea>
    <br><br>
    <input type="text" placeholder='ticket cost' name='cost' required>
    <br><br>
    <input type='file' name='movieImg'>
    <br><br>
    <input type="text" name='trailer' placeholder='Movie trailer youtube link' required>
    <br><br>
    <label for="slot1">Slot1 Details</label>
    <input type='text' placeholder='Ex: 11:00AM' name='slot1' required>
    <input type="text" name='rows1' value='15' required>
    <input type="text" name='seats1' value='20' required>
    <br><br>
    <label for="slot2">Slot2 Details</label>
    <input type='text' placeholder='Ex: 3:00PM' name='slot2'>
    <input type="number" name='rows2' value='15'>
    <input type='number' name='seats2' value='20'>
    <br><br>
    <label for="slot3">Slot3 Details</label>
    <input type='text' placeholder='Ex: 6:00PM' name='slot3'>
    <input type="number" name='rows3' value='15'>
    <input type="number" name='seats3' value='20'>
    <br><br>
    <label for="slot4">Slot4 Details</label>
    <input type='text' placeholder='Ex: 9:00PM' name='slot4'>
    <input type="number" name='rows4' value='15'>
    <input type="number" name='seats4' value='20'>
    <br><br>
    <label for="reg">Registration open: </label>
    <input type="radio" value="1" name='reg'>
    <br>
    <label for="reg">Registration close: </label>
    <input type="radio" value="0" name='reg' checked>
    <br><br>
    <button type='submit' name='create'>Create movie</button>
</form>

