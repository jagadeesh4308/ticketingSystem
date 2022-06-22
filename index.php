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
    
    ?>
    <?php 
    
    if(isset($_POST['submit'])){
        $seats = $_POST['seats'];
        foreach($seats as $seat){
            $seatSplit = explode('.',$seat);
            $rowname = $seatSplit[0];
            $seatnum = $seatSplit[1];
            $newPattern = '';
            $query = "SELECT * FROM girlRows WHERE girlRows.rowName = '$rowname'";
            $response = mysqli_query($connection,$query);
            $row = mysqli_fetch_assoc($response);
            $seatPatternArr = explode('_',$row['patternFill']);
            $seatPatternArr[$seatnum] = '1';
            foreach($seatPatternArr as $key=>$pa){
                if($key!=count($seatPatternArr)-1){
                    $newPattern = $newPattern.$pa."_";
                }
                else{
                    $newPattern = $newPattern.$pa;
                }
            }
            mysqli_query($connection,"UPDATE girlRows SET patternFill = '$newPattern' WHERE girlRows.rowName = '$rowname'");
        }
    }
    
    ?>
    <?php 
    
    $query = "SELECT * FROM girlRows";
    $response = mysqli_query($connection,$query);

    echo "<form action='#' method='post'>";
    while($row = mysqli_fetch_assoc($response)){
        $pattern = explode("_",$row['patternFill']);
        $rowName =  $row['rowName'];
        echo $rowName;
        foreach ($pattern as $key=>$val){
            if($val==0){
                echo "<input type='checkbox' name='seats[]' value='$rowName.$key'>";
            }
            else{
                echo "<input type='checkbox' disabled>";
            }
        }
        echo "<br>";
    }
    echo "<button type='submit' name='submit'>Book</button></form>";
    
    ?>

</body>
</html>