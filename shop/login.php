<html>
    
    
<head>
<!--   //  <link rel="stylesheet" href="login.css">
 -->
 
<?php
    include 'conn.php';
    session_start();

    ?>
    
</head>
    
    
<body>

  <div class="login-page">
  <div class="form">  
<form class="login" action="" method="post">
  <input type="text" placeholder="وشەی بەکارهێنەر" name="Username">
  <input type="Password" placeholder="وشەی نهێنی" name="Password">
        
  <button name="submitbtn">چونەژورەوە</button>
</form>
      
</div>
</div>
    
    
    <?php
    
    if(isset($_POST['submitbtn'])){
        $Username=$_POST['Username'];
        $Password=$_POST['Password'];
        $query_select="SELECT * from user where Username='$Username' and Password='$Password' " ;
        $exe=mysqli_query($conn,$query_select);
        $result=mysqli_fetch_array($exe);

    
   if($result){
       $_SESSION['user']=$result['User_Id'];
       $_SESSION['usertype']=$result['UserType'];
       $_SESSION['name']=$Username;
       $_SESSION['fname']=$result['Fullname'];
       echo $_SESSION['user'];
       
       if($_SESSION['usertype']=="ئادمین"){
           header('location:adminlog.php');exit;
       }
       elseif($_SESSION['usertype']=="کاشێر"){
           header('location:kasherlog.php');exit;
       }
   
    }  
      else{
       echo "<script>alert('وش  ەی بەکارهێنەر یاخوود نهێی هەڵەیە')</script>";

      }  
    }
    
    
    ?>



<style type="text/css">
    @import url(https://fonts.googleapis.com/css?family=Roboto:300);

.login-page {
  width: 70%;
  padding: 8% 0 0;
  margin: auto;
}
.form {
  position: relative;
  z-index: 1;
  background: #1abc9c;
  max-width: 500px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
    text-align: right;

}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 150%;
    text-align: right;

}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #0E6050;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 40px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form button:hover,.form button:active,.form button:focus {
  background: #062821;
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}
.form .message a {
  color: #4CAF50;
  text-decoration: none;
}
.form .register-form {
  display: none;
}
.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}
.container:before, .container:after {
  content: "";
  display: block;
  clear: both;
}
.container .info {
  margin: 50px auto;
  text-align: center;
}
.container .info h1 {
  margin: 0 0 15px;
  padding: 0;
  font-size: 36px;
  font-weight: 300;
  color: #1a1a1a;
}
.container .info span {
  color: #4d4d4d;
  font-size: 12px;
}
.container .info span a {
  color: #000000;
  text-decoration: none;
}
.container .info span .fa {
  color: #EF3B3A;
}
body{
  font-family: 'Roboto', sans-serif;
  color: #382706;
  font-weight: bolder;
  font-size: 40px;

}
/*body {
  background: #76b852; /* fallback for old browsers */
  background: -webkit-linear-gradient(right, #76b852, #8DC26F);
  background: -moz-linear-gradient(right, #76b852, #8DC26F);
  background: -o-linear-gradient(right, #76b852, #8DC26F);
  background: linear-gradient(to left, #76b852, #8DC26F);
  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;      
}*/
</style>

    </body>
</html>