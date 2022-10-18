<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signup.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat:500,400,300' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/1ae57ee07b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="mystyles.scss">

    <title>Document</title>
</head>
<body>
    <div class="nav-bar">
        <a href="index.html" class="nav-elem-1"><img class="image-logo" src="images/navigation-bar-logo.png" alt="Image" width="100px" height="45px"></a>
        <p class="nav-elem-first"><a class="links-nav" href="index.html">Home</p>
        <p class="nav-elem"><a class="links-nav" href="index.html">Product</a></p>
        <p class="nav-elem"><a class="links-nav" href="index.html">About us</a></p>
        <p class="nav-elem"><a class="links-nav" href="contact.html">Contact</a></p>
        <button type="button" class="nav-elem-last"><a href="signup.html">Sign In</a></button>
    </div>
    <form name="form1" action="" method="post" enctype="multipart/form-data">
    <div class="columns is-gapless ml-6 mt-6 is-centered">
        <div class="column is-one-quarter has-background-light pt-0 pb-0 pr-2">
          <img src="welcome.png" style='height: 100%; width: 100%; object-fit: contain'>
        </div>
        <div class="column is-one-third has-background-light">
            <div class="field px-6 pt-6 pb-2">
                <label class="label">Name</label>
                <div class="control has-icons-left has-icons-right">
                  <input class="input" type="text" placeholder="Name" name="UserName">
                  <span class="icon is-small is-left">
                    <i class="fas fa-check"></i>
                  </span>
                </div>
              </div>
              
              <div class="field px-6 pt-1 pb-2">
                <label class="label">Username</label>
                <div class="control has-icons-left">
                  <input class="input" type="text" placeholder="username" name="UName">
                  <span class="icon is-small is-left">
                    <i class="fas fa-user"></i>
                  </span>
                </div>
              </div>
              
              <div class="field px-6 pt-1 pb-2">
                <label class="label">Email</label>
                <div class="control has-icons-left">
                  <input class="input" type="email" placeholder="user@email.com" name="email">
                  <span class="icon is-small is-left">
                    <i class="fas fa-envelope"></i>
                  </span>

                </div>
                
              </div>
              
              <div class="field px-6 pt-1 pb-2">
                <label class="label">Password</label>
                <div class="control has-icons-left has-icons-right">
                  <input class="input" type="password" placeholder="Password" name="password">
                  <span class="icon is-small is-left">
                    <i class="fa-solid fa-lock"></i>
                  </span>
                </div>
              </div>

              <div class="field px-6 pt-1 pb-2">
                <label class="label">Confirm Password</label>
                <div class="control has-icons-left has-icons-right">
                  <input class="input" type="password" placeholder="Confirm Password">
                  <span class="icon is-small is-left">
                    <i class="fa-solid fa-lock"></i>
                  </span>
                </div>
              </div>
              
              <div class="field px-6 pt-1 pb-2">
                <div class="control">
                  <label class="checkbox">
                    <input type="checkbox">
                    I agree to the <a href="tandc.html">terms and conditions</a>
                  </label>
                </div>
              </div>

              <div class="field is-grouped px-6 pt-1 pb-2">
                <div class="control">
                  <button class="button is-warning" name="submit">Sign In</button>
                </div>
              </div>
        </div>
      </div>
    </form>
    <?php  
    if (isset($_POST['submit'])) {  
        extract($_POST);  
        $servername = "htl-projekt.com";  
        $username   = "harlilacej";  
        $pass   = "!Insy_2021$";  
        $dbname     = "2023_5ay_harlilacej_ecoSense_tempeature";  
        // Create connection  
        $conn       = new mysqli($servername, $username, $pass, $dbname) ;  
        // Check connection  
        if ($conn->connect_error) {  
            die("Connection failed: " . $conn->connect_error);  
        }  
        $sql = "INSERT INTO `user_data` (UserName,Uname,email,password)  
      
    VALUES ('$UserName','$UName','$email','$password')";  
        if ($conn->query($sql) === TRUE) {  
              
        } else {  
            echo "Error: " . $sql . "<br>" . $conn->error;  
        }  
    }  
    ?> 
    
</body>
</html>