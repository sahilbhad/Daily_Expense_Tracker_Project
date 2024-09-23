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
<body class="hold-transition sidebar-mini">
<div class="wrapper">
   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h1 class="text-primary">Manage Income</h1> 
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manage Income</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <?php
 include("connction.php");
 if(isset($_GET['idr']))
 {
    $dell_id=$_GET['idr'];
    $deletes="DELETE FROM add_income  WHERE i_id='$dell_id'";
    $query_run=mysqli_query($con,$deletes);
    if($query_run) 
    {   
      
        echo "<script> alert ('Income has been deleted successfully');</script>";
        echo "<script>window.location.href='manneg_income.php'</script>";
    }
    else {
          echo"no";
    } 
 }
 ?>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            
            <div class="card">
              <div class="card-header">
              <h3 class="card-title"> Manage Expense</h3>
                <a href="add_income.php" class="btn btn-primary float-right">Add Income</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr No</th>
                    <th>Income Date</th>
                    <th>Payment Mode </th>
                    <th>Amount</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    $query="SELECT * FROM add_income  WHERE u_id='$_SESSION[name_id]' ";
                    $query_runs=mysqli_query($con,$query);
                    if(mysqli_num_rows($query_runs)>0)
                    {
                        $i=1;
                        while ($row=mysqli_fetch_array($query_runs)) {
                  
                        ?>
                          <tr>
                          <td><?php echo $i ?></td>
                          
                            <td><?php echo $row ['i_date']; ?></td>
                            <td><?php echo $row ['i_pmode']; ?></td>
                            <td><?php echo $row ['amount']; ?></td>
                            <td>
                            <a href="editincome.php?edit=<?php echo $row ['i_id']; ?>"class="btn btn-primary">Edit</a>
                             <a href="manneg_income.php?idr=<?php echo $row ['i_id'];?>"class="btn btn-danger"onclick="return confirm('Are you Sure?');">Delete</a>
                               
                           </td>
                            </tr>
                          <?php
                          $i++;
                        } 
                      }
                    else {
                       ?>
                       <tr>
                        <td> Not Record </td>
                    </tr>
                    <?php
                    }
                    ?>
                     <tr>
                     <th>Sr No</th>
                    <th>Income Date</th>
                    <th>Payment Mode </th>
                    <?php
                        $result=mysqli_query($con,"SELECT sum(amount) FROM add_income  WHERE u_id='$_SESSION[name_id]' ");
                          while($rows=mysqli_fetch_array($result)){?>
                    <th>Total = <?php echo $rows['sum(amount)'];?> </th>
                    <th>Action</th>
                  </tr>
                           
                  <?php

                     }
                      ?>
                    
              </tbody>
                  <tfoot>
                  
                  </tfoot>
                </table>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
</div>
 <?php
 include('footer.php');
?>
</body>
</html>

