                <!-- Main window -->
                <div class="main_container" id="tables_page">

                    <div class="row-fluid">
                        <ul class="breadcrumb">
                            <li><a>Management User</a> <span class="divider">/</span></li>
                            <li><a href="<?php echo base_url(); ?>setting/user">User List</a> <span class="divider">/</span></li>
                            <li class="active">Delete</li>
                        </ul>
                    </div>

                    <div class="row-fluid">
                        <div class="widget widget-padding span12">
                            <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>setting/user/delete_process" enctype="multipart/form-data" onsubmit="return confirm('Do you want to delete the following data?')">
                                <input type="hidden" name="user_id" value="<?php echo $user['user_id'] ?>">
                                <input type="hidden" name="users_id" value="<?php echo $result['user_id'] ?>">
                                <div class="widget-header">
                                    <i class="icon-list-alt"></i><h5>Delete User</h5>
                                    <div class="widget-buttons">
                                        <a data-title="Collapse" data-collapsed="false" class="tip collapse"><i class="icon-chevron-up"></i></a>
                                    </div>
                                </div>
                                <div class="widget-header">
                                    <i></i><h5>Profile</h5>
                                </div>
                                <div class="widget-body">
                                    <div class="widget-forms clearfix">
                                        <div class="control-group">
                                            <label class="control-label">Name</label>
                                            <div class="controls">
                                                <input name="user_full_name" class="span5" maxlength="100" type="text" value="<?php echo $result['user_full_name']; ?>" disabled />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Address</label>
                                            <div class="controls">
                                                <input name="user_address" class="span6" maxlength="255" type="text" value="<?php echo $result['user_address']; ?>" disabled />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Birthday</label>
                                            <div class="controls">
                                                <input name="user_birthday" class="span3" maxlength="100" type="date" value="<?php echo $result['user_birthday']; ?>" disabled />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Number</label>
                                            <div class="controls">
                                                <input name="user_contact" class="span3" maxlength="25" type="text" value="<?php echo $result['user_contact']; ?>" disabled />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label"></label>
                                            <div class="controls">
                                                <img src="<?php echo base_url(); ?>resource/doc/user/thumb/<?php echo $result['user_picture']; ?>" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-header">
                                    <i></i><h5>Account</h5>
                                </div>
                                <div class="widget-body">
                                    <div class="widget-forms clearfix">
                                        <div class="control-group">
                                            <label class="control-label">Name</label>
                                            <div class="controls">
                                                <input name="user_name" class="span5" maxlength="100" type="text" value="<?php echo $result['user_name']; ?>" disabled />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Email</label>
                                            <div class="controls">
                                                <input name="user_email" class="span5" maxlength="255" type="text" value="<?php echo $result['user_email']; ?>" disabled />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Status</label>
                                            <div class="controls">
                                                <input name="user_st" class="span2" type="text" value="<?php echo $result['user_st']; ?>" disabled />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-footer">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                    <button class="btn" type="reset">Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /Main window -->

            </div>
            <!--/.fluid-container-->
        </div>
        <!-- wrap ends-->
