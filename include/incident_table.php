



  <?php   

  require_once("dbconn.php");

  
  $result=$mysqli->query("SELECT * from personal_info");
      $blank=" ";
    ?>
    
  
            






    <table class="table table-fluid" id="myTable">
    <thead>
    <tr><th>Name</th><th>Date</th><th>Action</th></tr>
    </thead>
    <tbody>
           <?php while($row=mysqli_fetch_assoc($result)){ ?>
    <tr>
      <td style=""><?php echo $row['firstname'] ?><?php echo $blank?><?php echo $row['lastname'] ?></td>
      <td><?php echo $row['info_date'] ?></td>
      <td><a href=""class="btn btn-rounded btn-sm print-button" id="print-link" incident_id="<?php echo $row['incident_id'] ?>" ><i class="fas fa-print"></i></a>
      <a href=""class="btn btn-rounded btn-sm update-button" id="update-link" update_id="<?php echo $row['incident_id'] ?>" ><i class="fas fa-pencil-alt"></i></a>
                                                         
    <a class="btn  btn-rounded btn-sm  delete-button mb-control" data-box="#mb-delete" id="actionbtn_delete"  account_id="<?php echo $row['incident_id'] ?>"><i class="fas fa-trash-alt" ></i></a>

    </td>
    </tr>
        <?php }?> 
    </tbody>
    </table>
</div>
 <!-- END MESSAGE BOX-->
             <div class="message-box  animated fadeIn" data-sound="alert" id="mb-delete">
            <div class="mb-container">
                <div class="mb-middle" style="color:gray">
                    <div class="mb-title">Delete this Report?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to Delete this Report?</p>                    
                        <p>Click No if you want to retain. Click Yes to completely Delete .</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a  href="" class="btn btn-theme btn-lg " id="delete-link">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>