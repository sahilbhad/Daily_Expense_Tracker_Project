<?php

  include('sidebar.php');
  include('navbar.php');
  include("connction.php");
  if(isset($_POST["sub"]))
  {
      $edit_id=$_GET['edit'];
      $catname=$_POST["cat"];
      $query="UPDATE e_category SET c_name='$catname' WHERE id='$edit_id'";
      $r=mysqli_query($con,$query);
      if($r)
      {
        echo "<script> alert (' Categroy has been Updated successfully');</script>";
        echo "<script>window.location.href='manneg_category.php'</script>";
      }
      else {
        echo "no";
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
<body >
<div class="wrapper">
  
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h1 class="text-primary" >Edit cetegory</h1>
          
           
          </div>
          <div class="col-sm-6" >
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Category</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-9">

          <?php
      
    if(isset($_GET['edit']))
     {
         $edit_id=$_GET['edit'];
         $sel=" SELECT * FROM e_category WHERE id='$edit_id' ";
        $b=mysqli_query($con,$sel);
        if(mysqli_num_rows($b) > 0)
        {
          $row=mysqli_fetch_array($b);
          ?>
          <?php
        }
         else {
            ?>
            <h4> No Data</h4>
            <?php
         } 
         
     } 
   ?>

          <form id="quickForm" method="POST">
                <div class="card-body" style="padding-bottom:0px !important;">
                <div class="form-group">
                    <label >Edit Category</label>
                    <input type="text" name="cat" class="form-control" value="<?php echo $row['c_name'];?>"  required>
                  </div>
                  <div class="form-group">
                  <button type="submit" name="sub" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <div class="col-md-6">
    
</div>
<!--/.col (right) -->
</div>
<!-- /.row -->
</div><!-- /.container-fluid -->
</section>
</div>
</div>
<div>
<?php
include('footer.php');
?>  
</body>
</html>