<?php
/**DATABASE CONNECTION */
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $people = $_POST['people'];
    $message = $_POST['message']; 


    $server="localhost";
    $username="root";
    $password="";
    $database="royal_mount";
    $conn = mysqli_connect($server, $username, $password, $database);

    $sql = "INSERT INTO `table_booking`(`name`, `email`, `phone`, `date`, `time`, `people`, `message`) VALUES ('$name', '$email', '$phone', '$date', '$time', '$people', '$message');";
    
    $res=mysqli_query($conn, $sql);
    echo mysqli_error($conn);

    if ($res){
    echo "Your Response has been Recorded we will get back to you soon.";
    }
    else{
    echo "OOPS!! An Error occured";
    }

    /** Replace your email by my email */
    $to_email = "shubhamchavan7320@gmail.com";
    $subject = "NEW BOOKING REQUEST";
    $body = "   Customer Details
        NAME: $name
        EMAIL: $email
        PHONE: $phone
        DATE: $date
        TIME: $time
        PEOPLE: $people
                ";
    $headers = "From: $email";

    if (mail($to_email, $subject, $body, $headers)) {
        echo " Email successfully sent to Admin...";
    } else {
        echo "Email sending failed...";
    }
?>    