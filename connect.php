<?php

$AdharNo = filter_input(INPUT_POST, 'AdharNo');
$PhoneNo = filter_input(INPUT_POST, 'PhoneNo$PhoneNo');
if (!empty($AdharNo))
{
    if(!empty($PhoneNo))
    {
        $host = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "crt";

        //Create Connection
        $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

        if (mysqli_connect_error())
        {
            die('Connect Error('.mysqli_connect_errno().')'
            .mysqli_connect_error());
        }
        else
        {
            $sql = "INSERT INTO logi (AdharNo, PhoneNo$PhoneNo)
            values ('$AdharNo','$PhoneNo')";
            if ($conn->query($sql))
            {
                echo "New Adhar Data Created";
            }
            else
            {
                echo "Error: ".$sql ."<br>".$conn->error;
            }
            $conn->close();
        }
    }
    else
    {
        echo "Phone No cannot be empty";
        die();
    }
}
else
{
    echo "Adhar No cannot be empty";
    die();
}
?>