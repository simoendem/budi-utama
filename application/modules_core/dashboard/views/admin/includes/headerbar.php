<div class="headerbar">
  
  <a class="menutoggle"><i class="fa fa-bars"></i></a>
    
  <div class="header-right">
    <ul class="headermenu">
      <li>
        <div class="btn-group">
          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
            <img src="<?php echo base_url();?>bracket/images/photos/loggeduser.png" alt="" />
            <?php echo $user['user_full_name']; ?>

            <span class="caret"></span>
          </button>
          <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
            <li><a href="<?php echo base_url(); ?>main/logout"><i class="glyphicon glyphicon-log-out"></i> Log Out</a></li>
          </ul>
        </div>
      </li>
    </ul>
  </div><!-- header-right -->
  
</div><!-- headerbar -->