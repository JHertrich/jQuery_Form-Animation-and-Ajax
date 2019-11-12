<?php

    
//Connect to the Database
$con = mysqli_connect('127.0.0.1', 'root', '', 'customers');

//Connect Error Test
if( !$con )
    {
            $errNo  = mysqli_connect_errno();
            $errMsg = mysqli_connect_error();

            echo "SERVER-Error: $errNo -  $errMsg<br>" ;
            exit() ;
    }

// store POST Data in Variables

if(isset($_POST['email']))
{
    $email = mysqli_real_escape_string($con,$_POST["email"]);
    $password = mysqli_real_escape_string($con,$_POST["password"]);
    
};
    

//Check if Email exists
$sql = "SELECT email FROM customer WHERE email = '$email'";
$selectEmail = mysqli_query($con, $sql);

//query Error Test
if( !$selectEmail )
{
    $errNo  = mysqli_errno( $con );
    $errMsg = mysqli_error( $con );
    echo "Query-Error: $errNo -  $errMsg<br>" ;
    exit() ;
}

if(mysqli_num_rows($selectEmail)>0){
    exit ('You are logged in!');
}
else{
    echo "You don't have an account. Please sign up!";
}

mysqli_close( $con );



    







    
  
               



                
