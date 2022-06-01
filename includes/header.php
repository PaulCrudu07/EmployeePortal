

<!DOCTYPE html>
<html lang="en">
<html>
       <head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" /> 
        
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.css">        
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/style2.css">        
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" >
   
        <title>Company</title>
  
      </head>
   
    <body>
 
        
        <!--This where the nav bar is implemented-->

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php?p=home"><i class="fas fa-globe mx-2"></i>Company</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
      
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php?p=home">Home</a>
        </li>
          
          <div class="dropdown"> <!--this is where the dropdown menu for employees starts-->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Employees
          </a>
       <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" id="allemployees" href="index.php?p=allemployees">All Employees</a></li>
               <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" id="forum" href="index.php?p=forum">Forum</a></li>
              <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" id="statistics" href="index.php?p=statistics">Statistics</a></li>
          </ul>
              </li>
          </div>
          
          <div class="dropdown"> <!-- this is the dropdown menu for the account-->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            My Account
          </a>
            
            <?php 
			//When the user is logged in it will show the profile and logout -->
				if(isset($_SESSION["loggedin"])) {
				
				
			?>
            
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" id="viewprofile"href="index.php?p=viewprofile">My Profile</a></li>
               <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" id="logout" href="index.php?p=logout">Logout</a></li>
           
          </ul>
            
             <?php
			//If the user is not logged in it will show the log in button and the register one
				}else{
			
			?>
              
            
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" id="login" href="index.php?p=login">Login</a></li>
                <li><a class="dropdown-item" id="register" href="index.php?p=register">Register</a></li>
            </ul>
            
            
            <?php
			
                }
			
			?>
            
        </li>
          </div>
          
          
          
          
          
          
          <!--this is the searchbar-->
       
      </ul>
      <form class="d-flex" action="index.php?p=search" method="post" >
 
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="search" name="search">
              
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
    </div>
  </div>
</nav>
           
           
   
        
  


        
        
        
    


















