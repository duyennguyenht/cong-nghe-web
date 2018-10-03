<?php
// Start the session
session_start();
    $conn = mysqli_connect('localhost', 'root','','toido');
    mysqli_set_charset($conn, 'UTF8');
    if(!$conn){
        die("Kết nối thất bại". mysqli_connect_error());
    }
    $sql2 = "select * from data";
    $s = mysqli_query($conn,$sql2);

    if(mysqli_num_rows($s)>0)
        {
            while($row = mysqli_fetch_assoc($s)){
                $depot[$row['userName']] = $row;
            }
        }
        if(isset($depot)){
        echo "<pre>";
        print_r($depot);
        echo "</pre>";}
?>