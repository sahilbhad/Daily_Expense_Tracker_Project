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
          <h1 class="text-primary">View User  </h1> 
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">View User</li>
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
    $deletes="DELETE FROM  u_register WHERE id='$dell_id'";
    $query_run=mysqli_query($con,$deletes);
    if($query_run) 
    {   
      
        echo "<script> alert (' User Has Been  deleted successfully');</script>";
        echo "<script>window.location.href='showu.php'</script>";
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
              <h3 class="card-title"> Manage User</h3>
               
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr No</th>
                    <th>User Name</th>
                    <th>Email </th>
                    <th>Password</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    $query="SELECT * FROM u_register";
                    $query_runs=mysqli_query($con,$query);
                    if(mysqli_num_rows($query_runs)>0)
                    {
                        $i=1;
                        while ($row=mysqli_fetch_array($query_runs)) {
                  
                        ?>
                          <tr>
                          <td><?php echo $row['id'] ?></td>
                          
                            <td><?php echo $row ['username']; ?></td>
                            <td><?php echo $row ['email']; ?></td>
                            <td><?php echo $row ['password']; ?></td>
                            <td>
                            <!-- <a href="editincome.php?edit= "class="btn btn-primary">Edit</a> -->
                             <a href="showu.php?idr=<?php echo $row ['id'];?>"class="btn btn-danger"onclick="return confirm('Are you Sure?');">Delete</a>
                               
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
                     <th>Sr No</th>
                    <th>User Name</th>
                    <th>Email </th>
                    <th>Password</th>
                    <th>Action</th>
                  <?php

                
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

