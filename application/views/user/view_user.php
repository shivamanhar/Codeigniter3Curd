<?php 
if($details){
      $date_format = $this->config->item('date_format', 'tank_auth');
?>
<section style="margin-top: 20px; background-color: white; ">
        <table class="table table-bordered table-condensed">
            
             <tr>
                <th>First Name</th>
                <td><?php echo htmlentities($details[0]["username"]); ?></td>
            </tr>
            
            <tr>
                <th style="width: 300px;">Email</th>
                <td><?php echo htmlentities($details[0]["email"]); ?></td>
            </tr>
            
            <tr>
                <th>Banned</th>
                <td><?php if($details[0]["banned"] =='1') echo 'Yes'; else  echo 'No'; ?></td>
            </tr>
            
            <?php if($details[0]["banned"] =='1') { ?>
            <tr>
                <th style="width: 300px;">Ban Reason</th>
                <td><?php echo htmlentities($details[0]["ban_reason"]); ?></td>
            </tr>
            <?php } ?>
            
          
            <tr>
                <th>Last Login:</th>
                <td><?php echo date($date_format." H:i:s",strtotime($details[0]["last_login"])); ?></td>
            </tr>
            
            <tr>
                <th>Last IP</th>
                <td><?php echo htmlentities($details[0]["last_ip"]);?></td>
            </tr>
            
            <tr>
                <th>Registered On:</th>
                <td><?php echo date($date_format." H:i:s",strtotime($details[0]["created"])); ?></td>
            </tr>
            
        </table>
    </section>
<?php
}
?>