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
              <li class="breadcrumb-item active">Category wise Report</li>
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
              <form id="quickForm" method="GET">
                <div class="card-body" style="padding-bottom:0px !important;">
                
                <div class="form-group col-md-4" style="margin-left:83px !important;"   >
                    <label >From Date</label>
                    <input type="date" name="fcdate" class="form-control" placeholder="Enter Date">
                  </div>
                  <div class="form-group col-md-4" style="margin-left:40% !important; margin-top:-86px !important;">
                  <label >To Date</label>
                    <input type="date" name="tcdate" class="form-control" placeholder="Enter Date">
                  </div>
                   <div class="form-group col-md-6" style="margin-left:12% !important;"  >
                      <label >Category</label>
                      <select class="form-control" >
                       
                      <option>
                      Select Category
                     </option>
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
                 
                <div class="form-group" style="margin-left:62% !important;margin-top:-55px; !important;">
                  <button type="submit" class="btn btn-primary">Submit</button>
                 
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
                <h3 class="card-title"> Category wise Report</h3>
              </div>
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
                  </tr>
                  </thead>
                  <tbody>
                     
                    <tr>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    
                    <td>-</td>
                    
                    
                  </tr>
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Sr No</th>
                    <th>Date Of Expense</th>
                    <th>Expense Category</th>
                    <th>Expense Item</th>
                    <th>Expense Cost</th>
                    <th>Details</th>
                    <th>Payment Mode</th>
                  </tr>
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
</div>
<div>

<?php
 include('footer.php');
?>  
</body>
</html>