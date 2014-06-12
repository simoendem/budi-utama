
  <div class="leftpanel">
    
    <div class="logopanel">
        <h1><span>[</span> pinaple sas <span>]</span></h1>
    </div><!-- logopanel -->
        
    <div class="leftpanelinner">    
        
        <!-- This is only visible to small devices -->
        <div class="visible-xs hidden-sm hidden-md hidden-lg">   
            <div class="media userlogged">
                <img alt="" src="<?php echo base_url();?>bracket/images/photos/loggeduser.png" class="media-object">
                <div class="media-body">
                    <h4>John Doe</h4>
                    <span>"Life is so..."</span>
                </div>
            </div>
          
            <h5 class="sidebartitle actitle">Account</h5>
            <ul class="nav nav-pills nav-stacked nav-bracket mb30">
              <li><a href="profile.html"><i class="fa fa-user"></i> <span>Profile</span></a></li>
              <li><a href="#"><i class="fa fa-cog"></i> <span>Account Settings</span></a></li>
              <li><a href="#"><i class="fa fa-question-circle"></i> <span>Help</span></a></li>
                <li><a href="<?php echo base_url(); ?>login/adminlogin/logout"><i class="icon-off"></i> Logout</a>
                </li>
            </ul>
        </div>
      
      <h5 class="sidebartitle">Navigation</h5>
        <?php echo $menu; ?>
      
    </div><!-- leftpanelinner -->
  </div><!-- leftpanel -->