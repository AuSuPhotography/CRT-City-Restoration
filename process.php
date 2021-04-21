<?php
    $AdharNo = $_POST['AdharNo'];
    $PhoneNo = $_POST['PhoneNo'];

    $AdharNo = stripcslashes($AdharNo);
    $PhoneNo = stripcslashes($PhoneNo);

    $conn = new mysqli ("localhost", "root", "", "crt");

    $result = mysqli_query($conn, "select * from logi where AdharNo = '$AdharNo' and PhoneNo = '$PhoneNo'") 
                or die("Failed to query database ".mysql_error());
    $row = mysqli_fetch_array($result);
    if ($row['AdharNo'] == $AdharNo && $row['PhoneNo'] == $PhoneNo) 
    {
        session_start();
        $_SESSION['is_login'] = true;
        header("Location: home.html");
    } 
    else
    {
        echo "Failed to Login, Adhar No and Phone No don't match";
    }
    
?>