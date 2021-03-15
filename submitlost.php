<?php include('server.php'); ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Submit A Pet</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
      footer {
       background-color: #252525;
       padding: 25px;
       position:static;
      }
    
      img{
       width:80%;
       object-fit: cover;
      }
      
    .carousel-inner img {
      width: 100%;
      min-height: 100px;
      border-radius: 25px;
      background-image: url(test.png);
      padding-top: 130px;
      padding-bottom: -10px;
      }

      body {
       background-color: #7F9B94;
       background-size:cover;
       background-attachment:fixed;
      }
    
      form{
          
          border-radius: 25px;
          background-color:white;
          background-position: top;
          padding-left: 20px;
          padding-right: 20px;
      }
      
      h1{
          border-radius: 25px;
          background-image: url(test.png);
          background-position: left;
          color:white;
          text-align: center;
      }
      
      label{
       padding-left: 5px;
      }
      
      a{
        border-radius: 25px;  
      }
      
      h3{
          
      }
      
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <img src="logo.png" alt="Logo">
    </div>
    <ul class="nav navbar-nav">
      <li><a href="main.php" class="active">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Lost<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="lostpets.php">View Lost Pets</a></li>
          <li><a href="submitlost.php">Submit Lost Pet Form</a></li>
        </ul>
      </li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Found<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="foundpets.php">View Found Pets</a></li>
          <li><a href="submitfound.php">Submit Found Pet Form</a></li>
        </ul>
      </li>
      <li><a href="search.php">Search</a></li>
        
      <?php if(isset($_SESSION['username'])) : ?>
      <li><a href="profile.php">Profile</a></li>
        
      <?php else: ?>
        
      <li><a href="register.php">Profile</a></li> 
        
      <?php endif ?>
        
    </ul>
      
    <?php if(isset($_SESSION['username'])) : ?>
    <ul class="nav navbar-nav navbar-right">
      <li><a>Welcome <strong><?php echo $_SESSION['username']; ?></strong>!</a></li>
      <li><a href="main.php?logout='1'"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
      
    <?php else: ?>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
    <?php endif ?>
  </div>
</nav> 

<div class="container">
<div class="row">
  <div class="col-sm-12">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img src="grouptest.png" alt="Image">
          <div class="carousel-caption">
          </div>      
        </div>
      </div>
    </div>
  </div>
</div>
<hr>
</div>
    
     
    
<div class="container">
<h1><b>LOST PET SUBMISSION FORM</b></h1>
    
<br>
    
  <form method="post" action="submitlost.php">
      
    <br>
      
    <h3><b>Pet Information:</b></h3>
    
    <br>
      
    <div class="form-group">
      <label for="title">*Title:</label>
      <input type="text" class="form-control" id="title" placeholder="Enter title of submission" name="title" required autofocus value="<?php echo $title; ?>">
    </div>
      
      
    <div class="form-group">
      <label for="petname">Pet Name:</label>
      <input type="text" class="form-control" id="petname" placeholder="Enter pet name (if known)" name="petname" value="<?php echo $petname; ?>">
    </div>
    
      
    <div class="form-group">
      <label for="sex">*Sex:</label>
      <select class="form-control" id="sex" value="<?php echo $sex; ?>">
        <option>Male</option>
        <option>Female</option>
        <option>Unknown</option>
      </select>
    </div>
      
      
    <div class="form-group">
      <label for="species">*Species:</label>
      <select class="form-control" id="species" value="<?php echo $species; ?>">
        <option>Dog</option>
        <option>Cat</option>
        <option>Bird</option>
        <option>Equine</option>
        <option>Reptile</option>
        <option>Small Mammals</option>
        <option>Other</option>
      </select>
    </div>
      
      
    <div class="form-group">
      <label for="breed">Breed:</label>
      <input type="text" class="form-control" id="breed" placeholder="Enter breed (if known)" name="breed" value="<?php echo $breed; ?>">
    </div>
    
    <div class="form-group">
      <label for="microchip">Microchip:</label>
      <input type="text" class="form-control" id="microchip" placeholder="Enter microchip information (if known)" name="microchip" value="<?php echo $microchip; ?>">
    </div>
      
      
    <div class="form-group">
      <label for="coat_colour">*Coat Colour:</label>
      <select class="form-control" id="coat_colour" value="<?php echo $coat_colour; ?>">
        <option>Black</option>
        <option>White</option>
        <option>Grey</option>
        <option>Brown</option>
        <option>Red</option>
        <option>Yellow</option>
        <option>Mixed Colours</option>
        <option>N/A</option>
      </select>
    </div>
      
      
    <div class="form-group">
      <label for="coat_length">*Coat Length:</label>
      <select class="form-control" id="coat_length" value="<?php echo $coat_length; ?>">
        <option>Short</option>
        <option>Medium</option>
        <option>Long</option>
        <option>N/A</option>
      </select>
    </div>
      
      
    <div class="form-group">
      <label for="county">*County Lost:</label>
      <select class="form-control" id="county" required> value="<?php echo $county; ?>"
        <option>Antrim</option>
        <option>Armagh</option>
        <option>Carlow</option>
        <option>Cavan</option>
        <option>Clare</option>
        <option>Cork</option>
        <option>Derry</option>
        <option>Donegal</option>
        <option>Down</option>
        <option>Dublin</option>
        <option>Fermanagh</option>
        <option>Galway</option>
        <option>Kerry</option>
        <option>Kildare</option>
        <option>Kilkenny</option>
        <option>Laois</option> 
        <option>Leitrim</option>
        <option>Limerick</option>
        <option>Longford</option>
        <option>Louth</option>
        <option>Mayo</option>
        <option>Meath</option>
        <option>Monaghan</option>
        <option>Offaly</option>
        <option>Roscommon</option>
        <option>Sligo</option>
        <option>Tipperary</option>
        <option>Tyrone</option>
        <option>Waterford</option>
        <option>Westmeath</option>
        <option>Wexford</option>
        <option>Wicklow</option>
      </select>
    </div>
      
    
      
    <div class="form-group">
      <label for="comment">Additional Description:</label>
      <textarea class="form-control" rows="5" id="comment" value="<?php echo $description; ?>"></textarea>
    </div>
      
      
    <div class="form-group">
    <label for="image">Upload Pet Image:</label>
    <div id = "image">
    <form method="POST" action="" enctype="multipart/form-data">
    <input type="file" name="uploadFile" value="" / value="<?php echo $image; ?>">    
    </form>
    </div>  
    
    
    <hr>
    
    <h3><b>Contact Information:</b></h3>
      
    <br>
      
    <div class="form-group">
      <label for="subname">*Submitee Name:</label>
      <input type="text" class="form-control" id="subname" placeholder="Enter your name" name="subname" required value="<?php echo $subname; ?>">
    </div>
      
    <div class="form-group">
      <label for="phone">*Submitee Phone Number:</label>
      <input type="tel" class="form-control" id="phone" placeholder="Enter your phone number (e.g. 0831234567)" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" maxlength="10" name="phone" required value="<?php echo $phone; ?>">
    </div> 
      
    <div class="form-group">
      <label for="subemail">*Submitee Email Address:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter your email address (e.g. example@email.com)" name="email" required value="<?php echo $subemail; ?>">
    </div>
    
      
    <br>
    
    </div>
    
      <br>
    <button type="submit" class="btn btn-default" name="submitlost">Submit</button>
  </form>
    
</div>

    <br>
    <br>
    
    
  


<footer class="container-fluid text-center">
  <p style="color: white">Website created by Adrian Borkowski C17384436</p>
</footer>    
    
</body>
</html>
