<?php
session_start();



$username = "";
$email = "";

$title = "";
$petname = "";
$sex = "";
$species = "";
$breed = "";
$microchip = "";
$coat_colour = "";
$coat_length = "";
$county = "";
$description = "";
$image = "";
$subname = "";
$phone = "";
$subemail= "";

$errors = array();

$db = mysqli_connect('localhost', 'root', '', 'imagedb');

if (isset($_POST['register'])) {
    
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
    
    if (empty($username)) { array_push($errors, "Username is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($password_1)) { array_push($errors, "Password is required"); }
    if ($password_1 != $password_2) { array_push($errors, "The two passwords do not match"); }
}

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }
    if ($user['email'] === $email) {
      array_push($errors, "Email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database
  	$query = "INSERT INTO users (username, email, password, url) 
  			  VALUES('$username', '$email','$password', '$url')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: main.php');
  }
// ... 
// LOGIN USER
if (isset($_POST['login'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }
    
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
    
  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: main.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
}
}

if (isset($_POST['submitlost'])) {
  // receive all input values from the form
  $title = mysqli_real_escape_string($db, $_POST['title']);
  $petname = mysqli_real_escape_string($db, $_POST['petname']); 
  $sex = mysqli_real_escape_string($db, $_POST['sex']);
  $species = mysqli_real_escape_string($db, $_POST['species']);
  $breed = mysqli_real_escape_string($db, $_POST['breed']);
  $microchip = mysqli_real_escape_string($db, $_POST['microchip']);
  $coat_colour = mysqli_real_escape_string($db, $_POST['coat_colour']);
  $coat_length = mysqli_real_escape_string($db, $_POST['coat_length']);
  $county = mysqli_real_escape_string($db, $_POST['county']);
  $description = mysqli_real_escape_string($db, $_POST['description']);
  $image = mysqli_real_escape_string($db, $_POST['image']);
  $subname = mysqli_real_escape_string($db, $_POST['subname']);
  $phone = mysqli_real_escape_string($db, $_POST['phone']);
  $subemail = mysqli_real_escape_string($db, $_POST['subname']);
    
    
    
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($title)) { array_push($errors, "Title is required"); }
  if (empty($subname)) { array_push($errors, "Submitee name is required"); }
  if (empty($phone)) { array_push($errors, "Phone number is required"); }
  if (empty($subemail)) { array_push($errors, "Email is required"); }
    
  $user_check_query = "SELECT * FROM submitlost WHERE title='$title' AND petname='$petname' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
    
    
  // Finally, register found pet if there are are no errors in the form
  if (count($errors) == 0) {
  	$query = "INSERT INTO submitfound (title, petname, sex, species, breed, microchip, coat_colour, coat_length, county, description, image, subname, phone, subemail) 
  			  VALUES('$title', '$petname', '$sex', '$species', '$breed', '$microchip', '$coat_colour', '$coat_length', '$county', '$description', '$image', '$subname', '$phone', '$subemail')";
      
  	mysqli_query($db, $query);
  	$_SESSION['title'] = $title;
    $_SESSION['petname'] = $petname;
    $_SESSION['sex'] = $sex;
    $_SESSION['species'] = $species;
    $_SESSION['breed'] = $breed;
    $_SESSION['microchip'] = $microchip;
    $_SESSION['coat_colour'] = $coat_colour;
    $_SESSION['coat_length'] = $coat_length;
    $_SESSION['county'] = $county;
    $_SESSION['descritpion'] = $description;
    $_SESSION['image'] = $image;
    $_SESSION['subname'] = $subname;
    $_SESSION['phone'] = $phone;
    $_SESSION['subemail'] = $subemail;
  	$_SESSION['success'] = "You have submitted a lost pet";
  	header('location: lostpets.php');
  }
}


if (isset($_POST['submitfound'])) {
  // receive all input values from the form
  $title = mysqli_real_escape_string($db, $_POST['title']);
  $petname = mysqli_real_escape_string($db, $_POST['petname']); 
  $sex = mysqli_real_escape_string($db, $_POST['sex']);
  $species = mysqli_real_escape_string($db, $_POST['species']);
  $breed = mysqli_real_escape_string($db, $_POST['breed']);
  $microchip = mysqli_real_escape_string($db, $_POST['microchip']);
  $coat_colour = mysqli_real_escape_string($db, $_POST['coat_colour']);
  $coat_length = mysqli_real_escape_string($db, $_POST['coat_length']);
  $county = mysqli_real_escape_string($db, $_POST['county']);
  $description = mysqli_real_escape_string($db, $_POST['description']);
  $image = mysqli_real_escape_string($db, $_POST['image']);
  $subname = mysqli_real_escape_string($db, $_POST['subname']);
  $phone = mysqli_real_escape_string($db, $_POST['phone']);
  $subemail = mysqli_real_escape_string($db, $_POST['subname']);
    
    
    
      // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($title)) { array_push($errors, "Title is required"); }
  if (empty($subname)) { array_push($errors, "Submitee name is required"); }
  if (empty($phone)) { array_push($errors, "Phone number is required"); }
  if (empty($subemail)) { array_push($errors, "Email is required"); }
    
  $user_check_query = "SELECT * FROM submitfound WHERE title='$title' AND petname='$petname' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
    
    
  // Finally, register the lost pet if there are no errors in the form
  if (count($errors) == 0) {
  	$query = "INSERT INTO submitlost (title, petname, sex, species, breed, microchip, coat_colour, coat_length, county, description, image, subname, phone, subemail) 
  			  VALUES('$title', '$petname', '$sex', '$species', '$breed', '$microchip', '$coat_colour', '$coat_length', '$county', '$description', '$image', '$subname', '$phone', '$subemail')";
      
  	mysqli_query($db, $query);
  	$_SESSION['title'] = $title;
    $_SESSION['petname'] = $petname;
    $_SESSION['sex'] = $sex;
    $_SESSION['species'] = $species;
    $_SESSION['breed'] = $breed;
    $_SESSION['microchip'] = $microchip;
    $_SESSION['coat_colour'] = $coat_colour;
    $_SESSION['coat_length'] = $coat_length;
    $_SESSION['county'] = $county;
    $_SESSION['descritpion'] = $description;
    $_SESSION['image'] = $image;
    $_SESSION['subname'] = $subname;
    $_SESSION['phone'] = $phone;
    $_SESSION['subemail'] = $subemail;
  	$_SESSION['success'] = "You have submitted a found pet";
  	header('location: foundpets.php');
  }
}



?>

