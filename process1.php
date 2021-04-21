<?php

$solved = filter_input(INPUT_POST, 'solved');
$active = filter_input(INPUT_POST, 'active');
$pending = filter_input(INPUT_POST, 'pending');
if(!empty($solved))
{
    if(!empty($active))
    {
        if(!empty($pending))
        {
            $host = "localhost";
            $dbusername = "root";
            $dbpassword = "";
            $dbname = "crtreports";

            //Create Connection
            $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

            if (mysqli_connect_error())
            {
                die('Connect Error('.mysqli_connect_errno().')'
                .mysqli_connect_error());
            }
            else
            {
                $sql = "INSERT INTO trees (solved, active, pending)
                values ('$solved','$active','$pending')";
                if ($conn->query($sql))
                {
                    echo "Data Sucessfully Updated";
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
            echo "Pending Cases cannot be empty";
        }
        
    }
    else
    {
        echo "Active cases cannot be empty";
        die();
    }
}
else
{
    echo "Solved cases cannot be empty";
    die();
}
?>