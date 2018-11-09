<?php

function redirect($location){


    return header("Location:" . $location);


}




function confirmQuery($result) {
    
    global $connection;

    if(!$result ) {
          
          die("QUERY FAILED ." . mysqli_error($connection));
   
          
      }
    

}



function username_exists($username){

    global $connection;

    $query = "SELECT username FROM users WHERE username = '$username'";
    $result = mysqli_query($connection, $query);
    confirmQuery($result);

    if(mysqli_num_rows($result) > 0) {

        return true;

    } else {

        return false;

    }



}



function email_exists($email){

    global $connection;


    $query = "SELECT email FROM users WHERE email = '$email'";
    $result = mysqli_query($connection, $query);
    confirmQuery($result);

    if(mysqli_num_rows($result) > 0) {

        return true;

    } else {

        return false;

    }



}


function register_user($username, $email, $spol, $hrvatski, $engleski, $njemacki, $talijanski, $francuski, $textarea){

    global $connection;

        $username = mysqli_real_escape_string($connection, $username);
        $email    = mysqli_real_escape_string($connection, $email);
		$spol    = mysqli_real_escape_string($connection, $spol);
		$hrvatski    = mysqli_real_escape_string($connection, $hrvatski);
		$engleski    = mysqli_real_escape_string($connection, $engleski);
		$njemacki    = mysqli_real_escape_string($connection, $njemacki);
		$talijanski    = mysqli_real_escape_string($connection, $talijanski);
		$francuski    = mysqli_real_escape_string($connection, $francuski);
		$textarea	= mysqli_real_escape_string($connection, $textarea);
       

       
            
            
        $query = "INSERT INTO users (username, email, spol, hrvatski, engleski, njemacki, talijanski, francuski, textarea) ";
        $query .= "VALUES('{$username}','{$email}','{$spol}','{$hrvatski}' , '{$engleski}', '{$njemacki}', '{$talijanski}', '{$francuski}' , '{$textarea}' ) ";
        $register_user_query = mysqli_query($connection, $query);

        confirmQuery($register_user_query);

        



}

 



