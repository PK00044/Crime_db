<?php
    // Sessions :- It's a method of storing / manage info in different pages.

    //Verify user login info
    session_start();
    // You can set in sessions ur user info and u can used throught ur site until session is stopped.

    $_SESSION['username'] = "Pratham";
    $_SESSION['favCat'] = "Football";

?>