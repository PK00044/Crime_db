<?php
    // Sessions :- It's a method of storing / manage info in different pages.

    //Verify user login info
    session_start();
    // You can destory the sessions ur user info and u can used throught ur site.
    
    session_unset();
    session_destroy();
    
    echo "<br> You have been logged out.";
?>