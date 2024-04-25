<?php
    // Sessions :- It's a method of storing / manage info in different pages.

    //Verify user login info
    session_start();
    // You can get info from sessions ur user info and u can used throught ur site until session is stopped.

    if(isset($_SESSION['username'])){
        $_SESSION['username'] = "Pratham";
        $_SESSION['favCat'] = "Football";

    }
    else{
        echo "Please login to continue";
    }
?>