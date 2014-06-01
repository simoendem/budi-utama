                <!-- Main window -->
                <div class="main_container" id="tables_page">

                    <div class="row-fluid">
                        <ul class="breadcrumb">
                            <li><a>Management User</a> <span class="divider">/</span></li>
                            <li><a href="<?php echo base_url(); ?>setting/user">User List</a> <span class="divider">/</span></li>
                            <li class="active">Edit</li>
                        </ul>
                    </div>

                    <div class="row-fluid">
                        <div class="widget widget-padding span12">
                            <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>setting/user/edit_password_process" enctype="multipart/form-data">
                                <input type="hidden" name="user_id" value="<?php echo $user['user_id'] ?>">
                                <input type="hidden" name="users_id" value="<?php echo $result['user_id'] ?>">
                                <div class="widget-header">
                                    <i class="icon-list-alt"></i><h5>Edit Password User</h5>
                                    <div class="widget-buttons">
                                        <a data-title="Collapse" data-collapsed="false" class="tip collapse"><i class="icon-chevron-up"></i></a>
                                    </div>
                                </div>
                                <div class="widget-body">
                                    <div class="widget-forms clearfix">
                                        <div class="control-group">
                                            <label class="control-label">Old Password</label>
                                            <div class="controls">
                                                <input name="old_user_pass" class="span3" maxlength="100" type="password" />
                                                <span class="help-inline">* mandatory</span>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Password</label>
                                            <div class="controls">
                                                <input name="user_pass" class="span3" maxlength="100" type="password" />
                                                <span class="help-inline">* mandatory</span>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Retype Password</label>
                                            <div class="controls">
                                                <input name="retype_user_pass" class="span3" maxlength="100" type="password" />
                                                <span class="help-inline">* mandatory</span>
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
