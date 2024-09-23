
<?php
  
  include('sidebar.php');
  include('navbar.php');
  include("connction.php");
  
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info" style=" background-color:blue !important;">
              <div class="inner">
              <?php
                $result=mysqli_query($con,"SELECT sum(amount) FROM add_income WHERE u_id='$_SESSION[name_id]'");
                $rows1=mysqli_fetch_array($result)?>
                     <h3><?php echo $rows1['sum(amount)'];?> </h3>
                    <?php
                 
                 ?>
                <p style="font-size:120% !important;"> Total Income (+) </p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success" style=" background-color:red !important;">
              <div class="inner">
              <?php
                $result=mysqli_query($con,"SELECT sum(e_cost) FROM add_expense  WHERE u_id='$_SESSION[name_id]'");
                $rows2=mysqli_fetch_array($result)?>
                    <h3><th> <?php echo $rows2['sum(e_cost)'];?> </th></h3>
                     <?php
                  
                      // $exp = $rows['sum(e_cost)'];
                      // echo $sum;
                      // echo $tot;
                      // exit;
                     ?>
                  </tr>
                  <?php

                
                ?>

                <p style="font-size:120% !important;"> Total Expense (-)</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-4">
            <!-- small box -->
            <div class="small-box bg-warning"style=" background-color:white !important;">
              <div class="inner">
                <h3><?php echo  $rows1['sum(amount)']- $rows2['sum(e_cost)']; ?></h3>

                <p style="font-size:120% !important;"> Net Balance  (=)</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <!-- ./col -->
          
          <!-- ./col -->
        </div>
    
        
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<?php
 include('footer.php');
?>
</body>
</html>






