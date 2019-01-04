<?php

session_start(); 
if(isset($_SESSION['email'])){  
    $_SESSION = array();
    session_destroy();   
} 

include('F_conn.php');  

if (mysqli_connect_errno())
  {
  echo '<h4>Failed to connect to MySQL: </h4>' . mysqli_connect_error();
  }
else{

$query = "SELECT * FROM t_shirts";
$result = @mysqli_query($connection, $query);
if (mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_array($result)){
            $input_brand = $_POST["input_brand"];
            $input_fit = $_POST["input_fit"];
            $input_size = $_POST["input_size"];

            if($input_brand == $row['brand'] && $input_size == $row['size'] && $input_fit == $row['fit']) {
                $user_brand = $input_brand;
                $user_size = $input_size;
                $user_fit = $input_fit;
                $user_chest = $row['chest'];
                $user_waist = $row['waist'];
                $user_neck = $row ['neck'];
                $user_sleeve = $row['sleeve'];
                $user_pic = $row['pic'];
                $user_link = $row['link'];
                $average = (($user_waist + $user_neck + $user_sleeve)/3);
            }
            
            
            for ($i = 0; $i < 1; $i++){
                if($input_brand != $row['brand'] && $input_size == $row['size'] && $input_fit == $row['fit'] && $shirt1brand == NULL){
                    $shirt1brand = $row['brand'];
                    $shirt1size = $input_size;
                    $shirt1fit = $input_fit;
                    $shirt1chest = $row['chest'];
                    $shirt1pic = $row['pic'];
                    $shirt1link = $row['link'];
                    #echo "Brand: " .$row['brand']. "<br>";
                    #echo "Size: " .$row['size']. "<br>";
                    #echo "Chest measurement: " .$row['chest']. "<br>";         
                    } 
                else if ($input_brand != $row['brand'] && $input_size == $row['size'] && $input_fit == $row['fit'] && $shirt1brand != NULL) {
                    $shirt2brand = $row['brand'];
                    $shirt2size = $input_size;
                    $shirt2fit = $input_fit;
                    $shirt2chest = $row['chest'];
                    $shirt2pic = $row['pic'];
                    $shirt2link = $row['link'];
                    #echo "Brand: " .$row['brand']. "<br>";
                    #echo "Size: " .$row['size']. "<br>";
                    #echo "Chest measurement: " .$row['chest']. "<br>";
                }
                else {
                   break;
                }
            }
            }
        
}
}
               
// Check connection
//if "email" variable is filled out, send email
  //if (isset($_REQUEST['email']))  {

  //Email information
  //$admin_email = "coge8397@colorado.edu";
  //$email = $_REQUEST['email'];
  //$subject = $_REQUEST['subject'];
 // $comment = $_REQUEST['comment'];

  //send email
  //mail($admin_email, "$subject", $comment, "From:" . $email);

  //Email response
  //echo "Thank you for contacting us!";
 // }

  //if "email" variable is not filled out, display the form


?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
   <!-- Theme Made By www.w3schools.com - No Copyright -->
   <title>FindyourFit</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <link href="https://fonts.googleapis.com/css?family=Nunito|Pacifico|Permanent+Marker" rel="stylesheet">
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <style>
   .jumbotron {
       background-image: url("http://www.quickanddirtytips.com/sites/default/files/images/802/wardrobe.jpg");
       background-size: cover;
       background-color: #000;
       background-position: 50% 22%;
       color: #fff;
       opacity: .7;
       padding: 100px 25px;
   }
   .bg-grey {
       background-color: #C4C3D0;
   }
   .container-fluid {
       padding: 60px 50px;
   }
   #contact{
       background-color: #7eaed0;
   }
   #heading{
       font-family: 'Permanent Marker', cursive;
       opacity: 1;
       color: #fff;
   }
   #picha{
       border-style: solid;
   }
   #picfont{
       font-family: 'Nunito', sans-serif;
       text-decoration: underline;
   }
   #backdrop{
       background-color:#7eaed0;
       
   }
   .navbar {
    margin-bottom: 0;
    background-color: transparent;
    background: transparent;
    border-color: transparent;
    z-index: 9999;
    border: 0;
    font-size: 12px !important;
    line-height: 1.42857143 !important;
    letter-spacing: 4px;
    border-radius: 0;
}

.navbar li a, .navbar .navbar-brand {
    color: #fff !important;
}

.navbar-nav li a:hover, .navbar-nav li.active a {
    color: #36454f !important;
    background-color: #fff !important;
}

.navbar-default .navbar-toggle {
    border-color: transparent;
    color: #fff !important;
}
.navbar-fixed-top.scrolled {
  background-color: #7eaed0 !important;
  transition: background-color 200ms linear;
}
   </style>

  </head>

 <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
     <nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" id="heading" href="#">FyF</a>
      
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
        <li><a href="#about">ABOUT</a></li>
        <li><a href="#contact">CONTACT</a></li>
        <ul class="nav navbar-nav navbar-right">
        <!--<li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>-->
      <!--<li><a href="#" data-toggle="modal" data-target="#myModalHorizontal"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>-->
    <li><a href="/F_signup.html" data-toggle="modal" data-target="#myModal1"><span class="glyphicon glyphicon-sign-up"></span> SIGN UP</a></li>
    <li><a href="/F_login.html" data-toggle="modal" data-target="#myModal2"><span class="glyphicon glyphicon-login"></span> LOGIN</a></li>

      </ul>
    </div>
  </div>
  
  <!-- Trigger the modal with a button -->
 

<!-- Modal -->
<div id="myModal1" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Sign up</h4>
      </div>
      <div class="modal-body">
        <label><b>Email</b></label>
        <input type="Email" placeholder="Enter Email" name="psw" required> </br>
        <label><b>Username</b></label>
        <input type="Username" placeholder="Choose A username" name="psw" required></br>
        <label><b>Password</b></label>
        <input type="Password" placeholder="Choose A Password" name="psw" required></br>
        <label><b>Re-enter Password</b></label>
        <input type="Re-enter Password" placeholder="Re-enter Password" name="psw" required></br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Sign-up!</button>
      </div>
    </div>

  </div>
</div>

  <div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Login</h4>
      </div>
      <div class="modal-body">
        <label><b>Username</b></label>
        <input type="Username" placeholder="Username" name="psw" required></br>
        <label><b>Password</b></label>
        <input type="Re-enter Password" placeholder="Re-enter Password" name="psw" required></br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Sign-up!</button>
      </div>
    </div>

  </div>
</div>
  
  

</nav>

 <div class="jumbotron text-center">
   <h1 id="heading" >FindyourFit</h1>

   <form class="form-inline" enctype="multipart/form-data" method="POST">
 <div class="input-group">
     
     <div class="input-group">
       <input type="input" name="input_brand"  class="form-control"  value="<?php $input_brand ?>" size="25" placeholder="Enter Favorite T-Shirt brand" required>
     </div>

     <div class="input-group">
    
       <input type="input" name="input_size"  class="form-control"  value="<?php $input_size?>" size="25" placeholder="Enter size: (S,M,L,XL)" required>

       </div>
     </div>
     <div class="input-group">
       <input type="input" name="input_fit"  class="form-control"  value="<?php $input_fit ?>" size="25" placeholder="Enter fit: (slim, trad) " required>
      <div class="input-group-btn">
        <button type="submit" class="btn btn-primary" data-toggle="collapse" data-target="#collapseClothing"  style="padding:9"><span class="glyphicon glyphicon-search"></span></button>

      </div>
      </div>
       </form>
      </div>


 <!-- Container (About Section) -->
<div class="collapse" id="collapseClothing">
 <div class="container-fluid" >
<div class="row">
  <div class="col-md-4">
       <h1 id='picfont'>Your Shirt:</h1>
    <div class="thumbnail" id='backdrop'>
      <a href="<?php echo $user_link?>">
        <img src="<?php echo $user_pic ?>" id="picha" alt="your shirt" style="width:100%"></a>
        <div class="caption">
            <h3 id="picback"> <?php echo "Brand: ",  $user_brand . "<br>"?> </h3>
            <h4 id="picback"> <?php echo "Size: ",  $user_size . "<br>"?> </h4>        
        </div>
    </div>
  </div>
  <div class="col-md-4">
      <h1 id='picfont'>Closest fitting shirt:</h1>
    <div class="thumbnail" id="backdrop">
      <a href="<?php echo $shirt1link?>">
        <img src="<?php echo $shirt1pic?>" id="picha" alt="Nature" style="width:100%"></a>
        <div class="caption">
            <h3 id="picback"> <?php echo "Brand: ",  $shirt1brand . "<br>"?> </h3>
            <h4 id="picback"> <?php echo "Size: ",  $shirt1size . "<br>"?> </h4>
        </div>
    </div>
  </div>
  <div class="col-md-4">
      <h1 id="picfont">Next closest fitting:</h1>
    <div class="thumbnail" id='backdrop'>
      <a href="<?php echo $shirt2link?>">
        <img src="<?php echo $shirt2pic?>" id="picha" alt="Fjords" style="width:100%"></a>
        <div class="caption">
            <h3 id="picback"> <?php echo "Brand: ",  $shirt2brand . "<br>"?> </h3>
            <h4 id="picback"> <?php echo "Size: ",  $shirt2size . "<br>"?> </h4>
        </div>
      
    </div>
  </div>
</div>
</div>

 </div>

 
 <div class="container-fluid" id="about">
   <h2>Our Values</h2>
   <h4><strong>MISSION:</strong> At FindyourFit, our goal is to create a more efficient and reliable online shopping experience.  </h4>
   <p><strong>VISION:</strong><span class="glyphicon glyphicon-heart-empty"></span></p>
 </div>
 
 
 
 <div id="contact" class="container-fluid ">
  <h2 id="contact_words" class="text-center">CONTACT</h2>
  <div class="row">
    <div class="col-sm-5">
      <p >Contact us and we'll get back to you within 24 hours.</p>
      <p><span class="glyphicon glyphicon-map-marker"></span> Boulder, CO</p>
      <p><span class="glyphicon glyphicon-phone"></span> +1(303)448-4231</p>
      <p><span class="glyphicon glyphicon-envelope"></span> FindyourFit@gmail.com</p>
    </div>
    <div class="col-sm-7">
      <div class="row">
        <div class="col-sm-6 form-group">
          <form method="post">
          <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
        </div>
      </div>
      <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
      <div class="row">
        <div class="col-sm-12 form-group">
          <button class="btn btn-default pull-right" type="submit">Send</button>
        </div>
      </div>
    </form>
    </div>
  </div>
</div>

 <script>
 $('#sizer a').click(function(){
 $('#selected_size').text($(this).text()); });
 $('#fitter a').click(function(){
 $('#selected_fit').text($(this).text()); });

$(function () {
  $(document).scroll(function () {
    var $nav = $(".navbar-fixed-top");
    $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
  });
}); 
//  $(".btn-danger").click(function(){
//         $(".collapse").collapse('show');
//     });
 </script>

 </body>
 </html>
 