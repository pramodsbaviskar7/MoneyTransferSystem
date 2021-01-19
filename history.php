<?php
ob_start();
require_once "config.php";
session_start();
ob_end_flush();
?>
<!DOCTYPE html>
<html lang="en">
<?php include("nav.php") ?>



<div style="margin-top: 100px;">
        <div class="container">
            <div class="row">
                <div class=" text-center">
                    <h2 style="font-style: italic;">TRANSACTIONS</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="btn-toolbar">
    
</div>

            <div class='well' style='background-color:#b3f2ff;'>
    <table class='table' >
                    <thead class="thead-dark">
                      <tr>
                      <th>SENDER</th>
                      <th>RECEIVER</th>
                      <th>AMOUNT TRANSFERED</th>
                      </tr>
                    </thead>
                    <tbody>  
                        <tr>
                           <?php 
                              $stmt = $pdo->query("SELECT * FROM transfer");
                              $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                              if(count($rows)>0){
                             foreach($rows as $row ) { ?>
                             <td><?php echo htmlentities($row['sender']); ?></td>
                             <td><?php echo htmlentities($row['receiver']); ?></td>       
                             <td style="padding-left: 60px"><?php echo htmlentities($row['amount']); ?></td>
                             </tr>
                           <?php }
                                }
                             ?>
                              </tbody>
                </table>
          </div>
       </div>
   </div>
<!--TRANSACTION HISTORY TABLE END-->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
 </body>
</html>
