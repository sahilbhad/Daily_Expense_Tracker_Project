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
          <h1 class="text-primary">Manage Expense</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manage Expense</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <?php
 include("connction.php");
 if(isset($_GET['edd']))
 {
    $edell_id=$_GET['edd'];
    $edelete="DELETE FROM add_expense  WHERE e_id='$edell_id'";
    $query_run=mysqli_query($con,$edelete);
    if($query_run) 
    {   
      
        echo "<script> alert ('Expense has been deleted successfully');</script>";
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
                <a href="add_expense.php" class="btn btn-primary float-right">Add Expense</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr No</th>
                    <th>Date Of Expense</th>
                    <th>Expense Category</th>
                    <th>Expense Item</th>
                    <th>Expense Cost</th>
                    <th>Details</th>
                    <th>Payment Mode</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    $query="SELECT  add_expense.*,e_category.c_name FROM add_expense JOIN e_category ON add_expense.c_id=e_category.id
                    WHERE add_expense. u_id='$_SESSION[name_id]'";
                    $query_runs=mysqli_query($con,$query);
                    if(mysqli_num_rows($query_runs)>0)
                    {
                        $i=1;
                        while ($row=mysqli_fetch_array($query_runs)) {
                  
                        ?>
                          <tr>
                          <td><?php echo $i ?></td>
                            <td><?php echo $row ['e_date']; ?></td>
                            <td><?php echo $row ['c_name']; ?></td>
                            <td><?php echo $row ['e_item']; ?></td>
                            <td><?php echo $row ['e_cost']; ?></td>
                            <td><?php echo $row ['e_detail']; ?> </td>
                            <td><?php echo $row ['e_mode']; ?></td>

                            <td>
                            <a href="editexpense.php?eedit=<?php echo $row ['e_id']; ?>"class="btn btn-primary">Edit</a>
                             <a href="manneg_expense.php?edd=<?php echo $row ['e_id'];?>"class="btn btn-danger"onclick="return confirm('Are you Sure?');">Delete</a>
                               
                           </td>
                            </tr>
                          <?php
                          $i++;
                        } 
                      }
                    else {
                       ?>
                       <tr>
                        <td colls> Not Record </td>
                    </tr>
                    <?php
                    }
                    ?>
                     <tr>
                     <th>Sr No</th>
                    <th>Date Of Expense</th>
                    <th>Expense Category</th>
                    <th>Expense Item</th>
                     <?php
                $result=mysqli_query($con,"SELECT sum(e_cost) FROM add_expense  WHERE add_expense. u_id='$_SESSION[name_id]'");
                while($rows=mysqli_fetch_array($result)){?>
                    <th>Total = <?php echo $rows['sum(e_cost)'];?> </th>
                    <th>Details</th>
                    <th>Payment Mode</th>
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

