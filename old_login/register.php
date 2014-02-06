<?php 

    // call up common and start a connection with the db 
    require("common.php"); 
     
    // ensures registration hasn't already happened 
    if(!empty($_POST)) 
    { 
        // Exception handling for empty username/password fields 
        if(empty($_POST['myusername'])) 
        { 
            die("Please enter a username."); 
        } 
         
        if(empty($_POST['myusername'])) 
        { 
            die("Please enter a password."); 
        } 
         
        // validate email with filter_var 
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
        { 
            die("Invalid E-Mail Address"); 
        } 
         
        // check to see if doge_username already exists 
        $query = " 
            SELECT 
                1 
            FROM doge_users 
            WHERE 
                doge_username = :username 
        "; 
         
        // :doge_username is a token to avoid SQLi 
        $query_params = array( 
            ':username' => $_POST['doge_username'] 
        ); 
         
        try 
        { 
            // run previous statements 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) 
        { 
            // remove $ex->...()); before production  
            die("Failed to run query: " . $ex->getMessage()); 
        } 
         
        // looks in next rows for selected results 
        $row = $stmt->fetch(); 
         
        // row found with name 
        if($row) 
        { 
            die("This username is already in use"); 
        } 
         
        // same as previous check but to ensure unique email 
        $query = " 
            SELECT 
                1 
            FROM doge_users 
            WHERE 
                email = :email 
        "; 
         
        $query_params = array( 
            ':email' => $_POST['email'] 
        ); 
         
        try 
        { 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) 
        { 
            die("Failed to run query: " . $ex->getMessage()); 
        } 
         
        $row = $stmt->fetch(); 
         
        if($row) 
        { 
            die("This email address is already registered"); 
        } 
         
        // insert token values in to table 
        $query = " 
            INSERT INTO doge_users ( 
                doge_username, 
                doge_password, 
                salt, 
                email 
            ) VALUES ( 
                :doge_username, 
                :doge_password, 
                :salt, 
                :email 
            ) 
        "; 
         
        // salt encryption 
        $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647)); 
         
        // hash password 
        $password = hash('sha256', $_POST['password'] . $salt); 
         
        // hash the hash value 65536 more times 
        for($round = 0; $round < 65536; $round++) 
        { 
            $password = hash('sha256', $password . $salt); 
        } 
         
        // store values 
        $query_params = array( 
            ':doge_username' => $_POST['doge_username'], 
            ':doge_password' => $password, 
            ':salt' => $salt, 
            ':email' => $_POST['email'] 
        ); 
         
        try 
        { 
            // execute the query to create the user 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) 
        { 
            die("Failed to run query: " . $ex->getMessage()); 
        } 
         
        // redirects the user back to the login page after they register 
        header("Location: login.php"); 
         

        // ensure script ends 
        die("Redirecting to login.php"); 
    } 
     
?> 
<h1>Register</h1> 
<form action="register.php" method="post"> 
    Username:<br /> 
    <input type="text" name="doge_username" value="" /> 
    <br /><br /> 
    E-Mail:<br /> 
    <input type="text" name="email" value="" /> 
    <br /><br /> 
    Password:<br /> 
    <input type="password" name="doge_password" value="" /> 
    <br /><br /> 
    <input type="submit" value="Register" /> 
</form>
