<?php
  include('sidebar.php');
  include('navbar.php');
  include("connction.php");
  if(isset($_POST["sub"]))
  {
      $edit_id=$_GET['eedit'];
      $de=$_POST["date"];
      $b=$_POST["item"];
      $c=$_POST["cost"];
      $d=$_POST["txt"];
      $e=$_POST["cat"];
     
      $query="UPDATE add_expense  SET e_date='$de',e_item='$b', e_cost='$c',e_detail='$d',c_id='$e' WHERE    e_id='$edit_id'";
      $r=mysqli_query($con,$query);
      if($r)
      {
        echo "<script> alert (' Expense has been Updated successfully');</script>";
        echo "<script>window.location.href='manneg_expense.php'</script>";
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
   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h1 class="text-primary">Update Expense</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"> Update Expense</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <?php
      
      if(isset($_GET['eedit']))
       {
           $eedit_id=$_GET['eedit'];
           $esel=" SELECT * FROM  add_expense WHERE e_id='$eedit_id' ";
          $b=mysqli_query($con,$esel);
          if(mysqli_num_rows($b) > 0)
          {
            $erows=mysqli_fetch_array($b);
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
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <!-- <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> Add Expense </h3>
              </div> -->
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm"method ="POST">
                <div class="card-body" style="padding-bottom:0px !important;">
                <div class="form-group">
                    <label >Date Of Expense</label>
                    <input type="date" name="date" class="form-control"  value="<?php echo $erows['e_date'];?>" >
                  </div>
                </div>
                <div class="card-body" style="padding-top:0px !important;">
                <div class="container-fluid">
                <div class="row">
                <div class="col-md-12" style="padding-left:0px !important;padding-right:0px !important;">
                <label> Expense Category</label>
                  <select class="form-control" name="cat" required>
                     
                    <?php
                    $a="SELECT * FROM e_category";
                    $b=mysqli_query($con,$a);
                    while($add_c=mysqli_fetch_array($b))
                    {
                      ?>
                    
                  <option value=" <?php echo $add_c['id'] ;?>"> <?php echo $add_c ['c_name'];?></option>
                  
                  <?php
                    }
                  ?>
                  </select>
                  
                </div>
                
                <div class="col-md-12"style="padding-left:0px !important;padding-right:0px !important;">
                <div class="form-group"style="width: 100%;">  
                </div>
                <div class="form-group">
                    <label >Expense Item </label>
                    <input type="text" name="item" class="form-control"  value="<?php echo $erows['e_item'];?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Cost Of Item</label>
                    <input type="number" name="cost" class="form-control"  value="<?php echo $erows['e_cost'];?>" >
                  </div>
                  <div class="form-group"> 
                  <label for="exampleInputEmail1">Details</label>
                  <input type="text" id="txt"class="form-control" name="txt"  value="<?php echo $erows['e_detail'];?>" >
                  </div>
                  <button type="submit" name="sub" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
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