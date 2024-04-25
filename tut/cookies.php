<?php
    
    echo "<h1>Cookie is a kind of tag which you can put on user to recognize it again or to know the user activity / behaviour on your site and stores it in the user computer </h1>";
    echo "<h2>We can store non-sensitive info</h2>";
    echo "<h1>WE SHOULD NOT STORE USERNAME, EMAILS, PASSWORDS ETC IN COOKIES STORE IT IN '''''SESSION'''''</h1>";
    // Syntax to set a cookie
    // setcookie("name", "value of name", time() + "expries in sec", "domain for use( / -> then trought the website)");
    setcookie("category", "Books", time() + 86400, "/");

    // u can get the cookies by using getcookie function
    

?>