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
                            <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>setting/user/edit_account_process" enctype="multipart/form-data">
                                <input type="hidden" name="user_id" value="<?php echo $user['user_id'] ?>">
                                <input type="hidden" name="users_id" value="<?php echo $result['user_id'] ?>">
                                <input type="hidden" name="old_user_name" value="<?php echo $result['user_name'] ?>">
                                <input type="hidden" name="old_user_email" value="<?php echo $result['user_email'] ?>">
                                <input type="hidden" name="old_role_id" value="<?php echo $result['role_id'] ?>">
                                <div class="widget-header">
                                    <i class="icon-list-alt"></i><h5>Edit Account User</h5>
                                    <div class="widget-buttons">
                                        <a data-title="Collapse" data-collapsed="false" class="tip collapse"><i class="icon-chevron-up"></i></a>
                                    </div>
                                </div>
                                <div class="widget-body">
                                    <div class="widget-forms clearfix">
                                        <div class="control-group">
                                            <label class="control-label">Role</label>
                                            <div class="controls">
                                                <select name="role_id" class="span3">
                                                    <option value="">-- SELECT --</option>
                                                    <?php foreach ($rs_role as $data) : ?>
                                                        <option value="<?php echo $data['role_id']; ?>" <?php ($result['role_id'] == $data['role_id']) ? print "selected='selected'" : "" ; ?>><?php echo $data['role_name']; ?></option>
                                                    <?php endforeach ; ?>
                                                </select>
                                                <span class="help-inline">* mandatory</span>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Name</label>
                                            <div class="controls">
                                                <input name="user_name" class="span5" maxlength="100" type="text" value="<?php echo $result['user_name']; ?>" />
                                                <span class="help-inline">* mandatory</span>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Email</label>
                                            <div class="controls">
                                                <input name="user_email" class="span5" maxlength="255" type="text" value="<?php echo $result['user_email']; ?>" />
                                                <span class="help-inline">* mandatory</span>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Status</label>
                                            <div class="controls">
                                                <select name="user_st" class="span2">
                                                    <option value="unlock" <?php ($result['user_st'] == "unlock") ? print "selected='selected'" : "" ; ?>>Unlock</option>
                                                    <option value="lock" <?php ($result['user_st'] == "lock") ? print "selected='selected'" : "" ; ?>>Lock</option>
                                                </select>
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
