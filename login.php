<!--ecoSense login,user enters the ecoSenseID and has access to the ecoSense Dashboard-->
<!--Project:ecoSense - Website-->
<!--Author:Harli Laçej-->
<!--Date: 26/10/2022-->
<!DOCTYPE html>
<html lang="en">

<head>
  <!--Setting the title, meta data and linking to external CSS,importing Bulma,Font Awesome and Google Fonts-->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="signup.css">
  <link rel="icon" href="images/ecosense_logo.png" type="image/x-icon">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
  <link href='https://fonts.googleapis.com/css?family=Montserrat:500,400,300' rel='stylesheet'>
  <script src="https://kit.fontawesome.com/1ae57ee07b.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="mystyles.scss">

  <title>ecoSense | Login</title>
</head>

<body>
  <!--In Body is displayed the navigation bar(adapted to Bulma) and a Bulma form with one textfield(ecoSenseID)-->
  <div class="nav-bar">
    <a href="index.html" class="nav-elem-1" style="margin-left:20%;top:10px"><img class="image-logo" src="images/navigation-bar-logo.png" alt="Image" width="100" height="50"></a>
    <p class="nav-elem-first"><a class="links-nav" href="index.html">Home</p></a>
  </div>

  <form name="form1" action="" method="post" enctype="multipart/form-data">
    <div class="columns is-gapless ml-4 mt-6 is-centered mr-4">
      <div class="column is-one-quarter has-background-light pt-0 pb-0 pr-2">
        <img src="welcome2.png" style='height: 100%; width: 100%; object-fit: contain'>
      </div>
      <div class="column is-one-third has-background-light">
        <div class="field px-6 pt-6 pb-2">
          <label class="label">ecoSenseID:</label>
          <div class="control has-icons-left has-icons-right">
            <input class="input" type="text" placeholder="Name" name="ecoSenseID">
            <span class="icon is-small is-left">
              <i class="fas fa-check"></i>
            </span>

          </div>
        </div>
        <div class="field is-grouped px-6 pt-1 pb-2">
          <div class="control">
            <button class="button is-danger" name="submit">Sign In</button>
          </div>
        </div>
      </div>
    </div>
  </form>


  <?php

  if (isset($_POST['submit'])) {
    extract($_POST);
    //saving the data for database connection in variables
    $servername = "htl-projekt.com";
    $username   = "harlilacej";
    $pass   = "!Insy_2021$";
    $dbname     = "2023_5ay_harlilacej_ecoSense_tempeature";
    //connecting through MSQLi 
    $conn = new mysqli($servername, $username, $pass, $dbname);
    // checking if the connection is ok 
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    //cheking if the written ecoSenseID exists in the database,if yes the user is directed to "dashboard.php"
    //using prepared statements to avoid SQL injections
    $stmt = $conn->prepare("SELECT ecoSenseID FROM temperature WHERE ecoSenseID = ?");
    $stmt->bind_param("s", $_POST['ecoSenseID']);
    $stmt->execute();
    $stmt->store_result();
    $nrows1 = $stmt->num_rows;
    if ($nrows1>=1) {
      session_start();
      $_SESSION['test'] = "yes";
      header('Location: dashboard.php');
    }
  }
  ?>

</body>
</html>