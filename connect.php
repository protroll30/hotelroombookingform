<?php
    error_reporting(E_ALL);
ini_set('display_errors', 1);

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    $numberOfGuests = $_POST['numberOfGuests'];
    $preferences= $_POST['preferences'];


    //Database Connection
    $conn = new mysqli('localhost','root','pravit','hotelbookingform');
    if($conn->connect_error){
        die('Connection Failed  : '-$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into `registration`(`firstname`, `lastname`, `email`, `phone`, `date`, `numberOfGuests`, `preferences`)
            values(?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssis",$firstname, $lastname, $email, $phone, $date, $numberOfGuests, $preferences);
        $stmt->execute();
        echo "Hotel room booking completed successfully...";
        $stmt->close();
        $conn->close();
    }
?>
<html>
<br><br>
<form>
    <input type="button" value="Go back!" onclick="history.back()">
</form>
</html>
