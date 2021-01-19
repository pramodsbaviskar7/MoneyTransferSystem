<?php
ob_start();
require_once "config.php";
session_start();
if (isset($_POST['submit'])){
   $receiver=$_POST['receiver'];
   $amount=$_POST['amount'];
   $stmt = $pdo->prepare("SELECT * FROM customer WHERE id=:xyz");
   $stmt->execute(array(":xyz" => $_GET['id']));
   $row = $stmt->fetch(PDO::FETCH_ASSOC);
   $sender=$row['name'];
   $balance=$row['balance'];
//    echo $sender;
//    echo $receiver;
   if($balance<$amount){
     ?>
        <script>
        alert("Insufficient balance");
        </script>
     <?php
   }
   else{
      
   $sql = "INSERT INTO transfer (sender, receiver,amount) VALUES (?,?,?)";
   $stmt= $pdo->prepare($sql);
   $stmt->execute([$sender, $receiver, $amount]);

   $sql = "UPDATE customer SET balance=balance-$amount WHERE name='$sender'";
   $stmt= $pdo->prepare($sql);
   $stmt->execute();

   $sql = "UPDATE customer SET balance=balance+$amount WHERE name='$receiver'";
   $stmt= $pdo->prepare($sql);
   $stmt->execute();
 ?>
 <script>
   alert("Payment Successful");
 </script>

<?php 
}
} 
ob_end_flush();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Banking-Home</title>
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <link rel="stylesheet" type="text/css" href="home.css">
  
</head>
<body>

<?php include("nav.php") ?>

<?php
$stmt = $pdo->prepare("SELECT * FROM customer where id = :xyz");
$stmt->execute(array(":xyz" => $_GET['id']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$sender=$row['name']?? 'default value';;
?>
<!-- USER DETAILS START-->
    <div class="container" style=" padding-top:200px; padding-left: 400px;"  >
          <div class="row" >
             <div class="col-sm offset-md-3 col-md-6" style="">
                  <div class="panel panel-default bg-dark  " style="padding: 10px; color:white; border-radius: 20px;background-color: #b3f2ff;">
                       <h2 style="text-align: center;">User Details</h2>
                           <hr style="border:1px solid white;">
                                <div class="panel panel-default" style="color:  black;border-radius: 20px;" >
                                   <div class="panel-body" style="border-radius: 20px;">
            <p><b>Name:</b> <?php echo htmlentities($row['name']?? 'default value'); ?></p>
            <p><b>Email Id:</b> <?php echo htmlentities($row['email']?? 'default value'); ?></p>
            <p><b>Balance:</b> <?php echo htmlentities($row['balance']?? 'default value'); ?></p>   
            <p><button class="btn btn-dark btn-lg view_data" data-toggle="modal" data-target="#transfer<?php echo $row['id'] ?>">Transfer Money</button></p> 
                                   </div>
                                </div>
            </div>
            </div>
          </div>
   </div>
<!-- USER DETAILS END-->

<!-- TRANSACTION MODAL START-->
   <div id="transfer<?php echo $row['id'] ?>" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg" role="content">
            <!-- Modal content-->
            <div class="modal-content">
                <?php $id=$row['id']; ?>
                <div class="modal-header" style="background-color: #b3f2ff;">
                    <h4 class="modal-title">Transfer Money </h4>
                    <button type="button" class="close btn-lg" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group row">
                        <label for="name" name="<?php echo $row['id'] ?>" class="col-md-2 col-form-label">Sender:</label>
                        <div class="col-md-10" id="uname">
                           <p><?php echo $row['name'] ?></p>
                        </div>
                        </div>
                       <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label">Reciever:</label>
                        <div class="col-md-10">
                            <select name="receiver" class="form-control">
                                <?php 
                                   $stmt = $pdo->query("SELECT * FROM customer WHERE id!=$id ");
                                   $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                   if(count($rows)>0){
                                   foreach($rows as $row ) { ?>

                                     <option><?php echo $row['name'] ?></option>
                                  
                                  <?php }
                                       } 
                                 ?>
                            </select>
                        </div>
                        </div>
                    <div class="form-group row">
                        <label for="amount" class="col-md-2 col-form-label">Transfer Amount</label>
                        <div class="col-md-10">
                            <input type="number" class="form-control" id="amount" name="amount" placeholder=" Amount" required>
                        </div>
                    </div>   
                       <div class="form-group row">
                          <button href="profile.php?id=$id" type="submit" id="submit" name="submit" class="btn btn-primary btn-m ml-auto" style="margin-left: 20px">Send</button>  
                         
                         <button type="button" class="btn btn-danger btn-m ml-auto" data-dismiss="modal" style="margin-left: 20px">Cancel</button>     
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- TRANSACTION MODAL END-->

 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script> 
<!-- TO CHECK THE REQUIRED FIELDS-->  
<script>
     $(document).ready(function(){
    document.getElementById("submit").onclick = function () {
        if() {
            alert('error please fill all fields!');
            }      

         };   
  });
</script>

</body>
</html>



