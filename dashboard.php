<!--The ecoSense dashboard, for people who have such a system,they can see -->
<!--Project:ecoSense - Website-->
<!--Author:Harli Laçej-->
<!--Date: 26/10/2022-->
<?php
//doesn't allow direct access to this page,checks of the variable at login.php is set at true then the page is diplayed.
session_start();
if ($_SESSION['test'] != "yes") {
  header("location:login.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!--Setting the title, meta data and linking to external CSS or importing FontAwesome,Bulma or Google Fonts(Nunito)-->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
  <link href='https://fonts.googleapis.com/css?family=Nunito' rel='stylesheet'>
  <script src="https://kit.fontawesome.com/1ae57ee07b.js" crossorigin="anonymous"></script>
  <link rel="icon" href="images/ecosense_logo.png" type="image/x-icon">
  <link rel="stylesheet" href="css/mystyles.css">
  <title>Dashboard | ecoSense</title>
</head>

<body style="background-color:#2E3B52;height:100vh;">
  <!--In the body, there is a navigation bar and columns realized through Bulma-->
  <!-- Navigation bar with Bulma-->
  <nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
      <a class="navbar-item">
        <img src="logo-green.png" style="max-height:40px ;">
      </a>

      <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
      </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
      <div class="navbar-start">
        <a class="navbar-item">
          Dashboard
        </a>
        <div class="navbar-item">

        </div>
      </div>
    </div>

    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
          <a href="index.html" class="button is-primary">
            <strong>Home</strong>
          </a>
        </div>
      </div>
    </div>
    </div>
  </nav>
  <!--Two columns,which have images inside.The images are clickable and directs to wanted page.-->
  <div class="columns is-vcentered is-centered has-shadow mt-6 pb-0 mb-0">
    <div class="column is-one-third ml-0">
      <a href="datagraph.php"><img src="images/graph-img.png" style="border-radius:2%"></a>
    </div>
    <div class="column is-one-third ml-0">
    <a href="datagraph-hum.php"><img src="images/press_hum.png" style="border-radius:2%"></img></a>
    </div>
  </div>
  <div class="columns is-vcentered is-centered has-shadow pt-0">
    <div class="column is-one-third">
      <a href="User-Manual-ecoSense-EN.pdf"><img src="images/doc-img.png" style="border-radius:2%"></a>
    </div>
    <div class="column is-one-third">
      <a href="../docs/_build/html/index.html"><img src="images/api-doc-img.png" style="border-radius:2%"></a>
    </div>
  </div>

</body>

</html>