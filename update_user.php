<?php
  include('sidebar.php');
  include('navbar.php');
  include('connction.php');
  
  $a=$_SESSION['name_id'];
  
  $select="select * from u_register where id='$a'";
  $res=mysqli_query($con,$select);
  $row=mysqli_fetch_array($res);
   
 
  if(isset($_POST['submit']))
  {
     
     $pass=$_POST['password'];
     $up="UPDATE u_register SET password='$pass' where id=$a";
     $update_qurey=mysqli_query($con,$up);
    if($update_qurey)
    {
      echo "<script> alert('successfully update')</script>";

    }
    else
    {
      echo "<script> alert('not password update')</script>";

    }
    
  }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
      <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <!-- <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> Update User </h3>
              </div> -->
              <div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">Edit Profile</h1>
      <hr>
	<div class="row">
      <!-- left column -->
      <div class="col-md-3">
        <div class="text-center">
          <img src="ao.jpg" class="avatar img-circle img-thumbnail" alt="avatar">
          
        </div>
      </div>
         <div class="col-md-9 personal-info">
        <div class="alert alert-info alert-dismissable">
          <a class="panel-close close" data-dismiss="alert">×</a> 
        
          This is an <strong>.alert</strong> User Change your Profile
        </div>
        <h3>Personal info</h3>
              <form id="quickForm" method="POST">
                <div class="card-body" style="padding-bottom:0px !important;">
                  <div class="form-group">
                    <label for="exampleInputEmail1">User name</label>
                    <input type="text" name="username" class="form-control" value="<?php echo $row['username'];?>" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="text" name="email" class="form-control" value="<?php echo $row['email'];?>" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="text" name="password" class="form-control" placeholder="New password">
                  </div> 
                </div>
                <div class="card-body" style="padding-top:0px !important;">
                <div class="container-fluid">
                  <button type="submit" name="submit" class="btn btn-primary">update</button>
                </div>
              </form>
            </div>
            </div>
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div>
      </div>
  </div>
</div>
<hr>
</div>
</div>
    </section>
    <?php
 include('footer.php');
?>
</body>
</html>



