<?php
  include('sidebar.php');
  include('navbar.php');
  include("connction.php");
  if(isset($_POST["sub"]))
{

    $catname=$_POST["cat"];
    $ch=mysqli_query($con, "SELECT * FROM e_category  WHERE  u_id='$_SESSION[name_id]'  ");
    //c_name='$catname'
    $chr=mysqli_num_rows($ch);
    if($chr > 0)
    {
      echo "<script> alert ('AllRedy Exists');</script>";
    }
    else {
       
    $query ="INSERT INTO e_category VALUES(null, '$_SESSION[name_id]','$catname')";
    $a=mysqli_query($con,$query);
    if($a)
    {
       
      
        echo "<script> alert (' Categroy has been Added successfully');</script>";
        echo "<script>window.location.href='manneg_category.php'</script>";
    }
    else {
        
      echo "<script> alert (' Not Added Categroy');</script>";    
    }
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

   <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><h5 class="text-primary">Add category</h5></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="quickForm" method="POST" >
                <div class="card-body" style="padding-bottom:0px !important;">
                <div class="form-group">
                    <label >Expense Category</label>
                    <input type="text" name="cat" class="form-control" placeholder="Enter category" required>
                  </div>
          </from>
        </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="sub" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</div>


    <!-- delete -->
   <?php
 include("connction.php");
 if(isset($_GET['del']))
 {
    $del_id=$_GET['del'];
    $delete="DELETE FROM e_category WHERE id='$del_id'";
    $query_run=mysqli_query($con,$delete);
    if($query_run) 
    {   
       // header("location:manneg_category.php");
        echo "<script> alert (' Categroy has been deleted successfully');</script>";
        echo "<script>window.location.href='manneg_category.php'</script>";
    }
    else {
          echo"no";
    } 
 }
 ?>
   <!-- delete category -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h1 class="text-primary">Manage category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manage category</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      
      <div class="container-fluid">
        <div class="row">
          <div class="col-12"> 
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"> Manage category</h3>
                <a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">Add Category</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                   <th>Sr No</th>  
                    <th>Category Name</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $query="SELECT * FROM e_category  WHERE u_id='$_SESSION[name_id]' ";
                    $query_run=mysqli_query($con,$query);
                    if(mysqli_num_rows($query_run)>0)
                    {
                        $i=1;
                        while ($row=mysqli_fetch_array($query_run)) {
                  
                        ?>
                          <tr>
                          <td><?php echo $i ?></td>
                          
                            <td><?php echo $row ['c_name']; ?></td>
                            <td>
                            <a href="editcategory.php?edit=<?php echo $row ['id']; ?>"class="btn btn-primary">Edit</a>
                             <a href="manneg_category.php?del=<?php echo $row ['id']; ?>"class="btn btn-danger"onclick="return confirm('Are you Sure?');" >Delete</a>
                               
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
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Sr No</th>
                    <th>Category Name</th>
                    <th>Action</th>
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

  
 <?php
 include('footer.php');
?>
</body>
</html>

