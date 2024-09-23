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
<body >
<div class="wrapper">
   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h1 class="text-primary">Report</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Month  wise Report</li>
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
            <div class="card card-primary">
              <!-- <div class="card-header" style="background-color:dimgrey !important;">
                <h3 class="card-title"> Report </h3> -->
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" method="POST">
                <div class="card-body" style="padding-bottom:0px !important;">
                <div class="form-group col-md-4" style="margin-left:83px !important;"   >
                    <label >From Date</label>
                    <input type="date" name="fdate" class="form-control" placeholder="Enter Date">
                  </div>
                  <div class="form-group col-md-4" style="margin-left:40% !important; margin-top:-86px !important;">
                  <label >To Date</label>
                    <input type="date" name="tdate" class="form-control" placeholder="Enter Date">
                  </div>
                <div class="form-group" style="margin-left:75% !important;margin-top:-55px !important;">
                  <button type="submit" name="sub" class="btn btn-primary">Submit</button>
                
                </div>
              </form>
            </div>

            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">
          </div>
        </div>
      </div>
    </section>
            <section class="content">
         <div class="container-fluid">
        <div class="row">
          <div class="col-12">
  
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"> Month  wise Report</h3>
              </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
               
                  
                  <thead>
                  <tr>
                  <th>Sr No</th>
                    <th>Date Of Expense</th>
                    <th>Expense Item</th>
                    <th>Expense Cost</th>
                    <th>Details</th>
                    <th>Payment Mode</th>
                    <th> Expense Category </th>
                     
                    
                  
                    
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                          if(isset($_POST["sub"]))
                          {
                         $fromdate=$_POST["fdate"];
                         $tfdate=$_POST["tdate"];
                         
                         $res = mysqli_query($con, "SELECT e_date,e_item,e_cost,e_detail,e_mode,c_id , add_expense 
                         .*,e_category.c_name FROM add_expense JOIN e_category ON add_expense.c_id=e_category.id
                           WHERE add_expense. u_id='$_SESSION[name_id]' &&  e_date BETWEEN ' $fromdate' AND '$tfdate' ");
                         $cnt=1;
                         if(mysqli_num_rows($res)>0)
                         {  ?>
                    <?php
                  foreach ($res as $value) {
                            ?>
                    <tr>
                    <td><?= $cnt++;?></td>
                    <td><?=$value['e_date'];?></td>
          
                    <td><?=$value['e_item'];?></td>
                    <td><?=$value['e_cost'];?></td>
                    <td><?=$value['e_detail'];?></td>
                    <td><?=$value['e_mode'];?></td>
                    <td><?=$value['c_name'];?></td>
                     
                     
                    </tr>
                    <?php
                  } 
                    ?>
                  <tr>
                  <th>Sr No</th>
                    <th>Date Of Expense</th>
                    <th>Expense Item</th>
                    <?php
                        $result=mysqli_query($con,"SELECT sum(e_cost) FROM add_expense  WHERE u_id='$_SESSION[name_id]' &&  e_date BETWEEN ' $fromdate' AND '$tfdate' ");
                          while($rows=mysqli_fetch_array($result)){?>
                    <th>Total = <?php echo $rows['sum(e_cost)'];?> </th>
                    <?php
                          }
                    ?> 
                    
                    <th>Details</th>
                    <th>Payment Mode</th>
                    <th> Expense Category </th>
                  </tr>
                  
                  <?php
                         }
                         else {
                          echo "<script> alert ('From To Date On Ckecked ');</script>";
                         }
                          
                         }
                          ?>
                          </tbody>
                  <tfoot>
                  
                  </tfoot>
                </table>
                <?php
                ?>
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
</div>
<div>

<?php
 include('footer.php');
?>  
</body>
</html>