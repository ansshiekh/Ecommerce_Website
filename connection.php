<?php
$con = mysqli_connect('localhost','root','','ClothingShop');
    if($con)
    {
        // $sql = "SELECT * FROM `User`";
        // $result = mysqli_query($con,$sql);
        
        // if($result)
        // {
        //     while($row = mysqli_fetch_assoc($result))
        //     {
        //         if($row['uId']==$uID && $row['uPass']==$pass)
        //         {
        //             session_start();
        //             $_SESSION['uID']=$uID;
        //             $_SESSION['start'] = time(); // Taking now logged in time.
        //             // Ending a session in 30 minutes from the starting time.
        //             //
        //             $_SESSION['expire'] = $_SESSION['start'] + (30 * 60);
        //             header('Location:show.php');
        //             $found=true;
        //         }
        //     }
        //     if(!$found)
        //     {
        //         echo "Wrong id or password";
        //     }
        // }else
        // {
        //     echo "Table not found";
        // }
    
    }else
    {
        echo"Connection Error";
    }
    ?>