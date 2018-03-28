<?php
    require 'header.php';
    require 'pdo.php';
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="w3.css">

    <style type="text/css">
    	.input-group>button{
    		background-color: #ded8d8;
    		font-size: 18px;
    		border-radius: 0px;
    	}
    	#login_el{
    		font-size:18px;
    		box-shadow: 0 0 black;
    		margin-top: 20px;
    		font-weight: 300;
    		font-family:  -webkit-pictograph ;
    		font-size: 18px;
    		width: 80%;
    	}
    </style>
     <script src="../bootstrap/jquery.min.js"></script>
      <script src="../bootstrap/js/bootstrap.min.js"></script>
    <div class="container">
      	<div class="row">
      		<div style="margin-top:40px;" class="col-lg-8 col-lg-offset-3 col-md-9 col-sm-12 col-xs-12 ">
            <?php
              $allow=1;
              if(isset($_POST['name'])&&isset($_POST['mob_no'])&&isset($_POST['pass'])){
                if(!empty($_POST['name'])&&!empty($_POST['mob_no'])&&!empty($_POST['pass'])){
                    foreach($db->query("SELECT mob_no FROM users") as $row){
                        if($row['mob_no']==$_POST['mob_no']){
                          $allow=0;
                          ?>
                          <div class="alert alert-warning">
                              <h4 style='color:red;'>Username already exist</h4>
                          </div>
                          <?php
                          break;
                        }
                      }
                  if($allow==1){
                    $stmt=$db->prepare("INSERT INTO users(name,mob_no,password) VALUES(:name,:mob_no,:pass)");
                    $stmt->bindParam(":name",$_POST['name']);
                    $stmt->bindParam(":mob_no",$_POST['mob_no']);
                    $stmt->bindParam(":pass",$_POST['pass']);
                    $stmt->execute();
                    $_SESSION['mobile_no']=$_POST['mob_no'];
                    ?>
                    <script type="text/javascript">
                      window.location = "home.php";
                    </script>
                    <?php
                  }
                }
              }
          ?>
                  <form action="signup.php" method="post">
                    <h4>Your Name</h4>
                    <input required id="login_el" name="name" class="form-control" type="text" placeholder="Name"/>
                    <h4>Registered Mobile Number</h4>
                    <input required id="login_el" name="mob_no" class="form-control" type="text" placeholder="Mobile Number"/>
                    <h4>Your Password </h4>
                    <input required id="login_el" name="pass" class="form-control" type="password" placeholder="Password" style="font-size:18px" />
                    <button id="signup_btns" style="background-color: #5ab55d;width: 80%;" type="submit" class="btn btn-default btn-block" href="#">Sign-Up</button>
                  </form>
                </div>
      			</div>
			  </div>
		</div>
	</div>