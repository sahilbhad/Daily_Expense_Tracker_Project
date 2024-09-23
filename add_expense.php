<?php
  include('sidebar.php');
  include('navbar.php');
  include("connction.php");
  if(isset($_POST["sub"]))
  {
  
      $in_date= $_POST["date"];
      $e_i=$_POST["item"];
      $e_cos=$_POST["cost"];
      $e_dtails=$_POST["txt"];
      $e_mode=$_POST["mode"];
      $e_categ=$_POST["cat"];
      
      $querys ="INSERT INTO add_expense VALUES(null,'$_SESSION[name_id]','$in_date', '$e_i', ' $e_cos',' $e_dtails','$e_mode',' $e_categ')";
      $qr2 = "SELECT * FROM add_income WHERE u_id= '$_SESSION[name_id]'";
      $res = mysqli_query($con,$qr2);
      $row = mysqli_fetch_assoc($res);
      //echo "<script> console.log(".$row['amount'].") </script>";
      $exp = $row['amount'] - $e_cos;
      $qr3 = "UPDATE add_income SET amount= '$exp' WHERE u_id = '$_SESSION[name_id]'";
      $res2 = mysqli_query($con,$qr3);

       
      $abc=mysqli_query($con,$querys);
    
      if($abc)
      {
        echo "<script> alert (' Expense has been Added successfully');</script>";
        echo "<script>window.location.href='manneg_expense.php'</script>";
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
          <h1 class="text-primary">Expense</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Expense</li>
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
                <h3 class="card-title"> Add Expense </h3>
              </div> -->
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm"method ="POST">
                <div class="card-body" style="padding-bottom:0px !important;">
                <div class="form-group">
                    <label >Date Of Expense</label>
                    <input type="date" name="date" id="date" class="form-control"  required>
                  </div>
                </div>
                <div class="card-body" style="padding-top:0px !important;">
                <div class="container-fluid">
                <div class="row">
                <div class="col-md-12" style="padding-left:0px !important;padding-right:0px !important;">
                  <label> Expense Category</label>
                  <select class="form-control" name="cat" required>
                    <option>
                      Select Category
                     </option>
                    <?php
                    $a="SELECT * FROM e_category  WHERE u_id='$_SESSION[name_id]' ";
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
                    <input type="text" name="item" class="form-control"  placeholder="Enter Item"required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Cost Of Item</label>
                    <input type="number" name="cost" class="form-control" placeholder="Enter Cost Item" min=1 required>
                  </div>
                  <div class="form-group"> 
                  <label for="exampleInputEmail1">Details</label>
                  <textarea id="txt"class="form-control" name="txt" ></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Payment Mode</label>
                    <input type="radio"  name="mode" value="Cash" checked required/>cash
                    <input type="radio"  name="mode" value="Online"  />   Online
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