<?php

  include('sidebar.php');
  include('navbar.php');
  include('connction.php');
  
  
  if(isset($_POST["sub"]))
  {
  
      $in_date=$_POST["date"];
      $add_a = $_POST["num"];
      $i_mode=$_POST["mode"];
       
      $query ="INSERT INTO  add_income  VALUES(null,'$_SESSION[name_id]','$in_date',' $add_a',' $i_mode')";
    
     
      $ab=mysqli_query($con,$query);
    
      if($ab)
      {
        echo "<script> alert (' Income has been Added successfully');</script>";
        echo "<script>window.location.href='manneg_income.php'</script>";
    }
    else {
        
      echo "<script> alert (' Not Added Income');</script>";    
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
          <h1 class="text-primary">Income</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Income</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <!-- <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> Add Income </h3>
              </div> -->
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" method="POST">
                <div class="card-body" style="padding-bottom:0px !important;">
                <div class="form-group">
                    <label >Date Of Income</label>
                    <input type="date" name="date" id="date" class="form-control"  required>
                  </div>
                </div>
                <div class="card-body" style="padding-top:0px !important;">
                <div class="container-fluid">
                <div class="row">
                <div class="col-md-12"style="padding-left:0px !important;padding-right:0px !important;">
                <div class="form-group"style="width: 100%;">  
                </div>
                <div class="form-group">
                    <label > Amount </label>
                    <input type="number" name="num" class="form-control"  placeholder="Enter Amount" min=1 required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Payment Mode</label>
                    <input type="radio"  name="mode" value="Cash" checked/>cash
                    <input type="radio"  name="mode" value="Online" />   Online
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
<script>
    let today = new Date();
    let year = today.getFullYear();
    let month = '0' + (today.getMonth() +1 );
    let day = today.getDate();

    let datestr= year+'-'+month+'-'+day;
    let input = document.getElementById('date');

    input.setAttribute('max',datestr);
    </script>

<?php
 include('footer.php');
?>  
</body>
</html>