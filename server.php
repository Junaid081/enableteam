<?php
session_start();

//Initializing Variables
$username='';
$email='';
$errors=array();
$idforComment='';



// Connecting to DB
$db= mysqli_connect('localhost','root','','farazmamu_software') or die('Database not connected');

if (isset($_POST['reg_user'])) {


//Register user

$username=mysqli_real_escape_string($db,$_POST['username']);
$email=mysqli_real_escape_string($db,$_POST['email']); 
$password1=mysqli_real_escape_string($db,$_POST['password1']);
$password2=mysqli_real_escape_string($db,$_POST['password2']);



//Form Validation
if(empty($username)){array_push($errors, 'Username is required');}
if(empty($email)){array_push($errors, 'Email is required');}
if(empty($password1)){array_push($errors, 'Password is required');}
if($password1!=$password2){array_push($errors, 'Password needs to be same.');}



// Check DB for existing user with same username
$user_check_query="SELECT * FROM user WHERE username='$username' or email='$email' LIMIT 1";
$results=mysqli_query($db, $user_check_query);
$user= mysqli_fetch_assoc($results);

if($user){
	if($user['username']===$username){array_push($errors,'Username already exist');}
	if($user['email']===$email){array_push($errors,'Email already exist');}
}



// Register the user if no error
if(count($errors)==0){
	$password= md5($password1); // md5() function will encrypt the password.
    $query="INSERT INTO user(username,email,password) VALUES('$username','$email','$password')";	
    mysqli_query($db,$query);

    $_SESSION['username']=$username;
    $_SESSION['success']="You are now logged in";

    header('Location: index.php');

}

}




// Login the User
if (isset($_POST['login_user'])) {
    $username=mysqli_real_escape_string($db,$_POST['username']);
    $password=mysqli_real_escape_string($db,$_POST['password1']);
    if(empty($username)){
        array_push($errors,'Username is Required');
    }
    if(empty($password)){
        array_push($errors,'Password is Required');
    }

    if(count($errors)==0){
        $password=md5($password);
        $query="SELECT * FROM user WHERE username='$username' AND password='$password'";
        $result=mysqli_query($db,$query);
        $getID= mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result)){
            
            
            $_SESSION['userID']= $getID['id'];
            $_SESSION['username']=$username;
            $_SESSION['success']= 'Logged in successfully';
            header('Location: index.php');
        }
        else{
            array_push($errors,'Invalid username and password');
        }
    }




}




//Adding Comments in Database

if (isset($_POST['addComment'])) {
 $idforComment= $_SESSION['userID'];
$comments=mysqli_real_escape_string($db,$_POST['userComments']);
if(empty($comments)){array_push($errors, 'Comment is required');}

if(count($errors)==0){
    $id=$getID['id'];

    $userComments=$_POST['userComments'];
    
    $query="INSERT INTO user_comments(userid,comments,createdOn) VALUES('$idforComment','$userComments',NOW())";    
    mysqli_query($db,$query);

    header('Location: index.php');

}


}



?>