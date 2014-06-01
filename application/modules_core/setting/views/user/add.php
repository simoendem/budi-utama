                <!-- Main window -->
                <div class="main_container" id="tables_page">

                    <div class="row-fluid">
                        <ul class="breadcrumb">
                            <li><a>Management User</a> <span class="divider">/</span></li>
                            <li><a href="<?php echo base_url(); ?>setting/user">User List</a> <span class="divider">/</span></li>
                            <li class="active">Add</li>
                        </ul>
                    </div>

                    <div class="row-fluid">
                        <div class="widget widget-padding span12">
                            <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>setting/user/add_process" enctype="multipart/form-data">
                                <input type="hidden" name="user_id" value="<?php echo $user['user_id'] ?>">
                                <div class="widget-header">
                                    <i class="icon-list-alt"></i><h5>Add New User</h5>
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
                                            <label class="control-label">Full Name</label>
                                            <div class="controls">
                                                <input name="user_full_name" class="span5" maxlength="100" type="text" value="<?php echo $this->session->flashdata('user_full_name'); ?>" />
                                                <span class="help-inline">* mandatory</span>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Address</label>
                                            <div class="controls">
                                                <input name="user_address" class="span6" maxlength="255" type="text" value="<?php echo $this->session->flashdata('user_address'); ?>" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Birthday</label>
                                            <div class="controls">
                                                <input name="user_birthday" class="span3" maxlength="100" type="date" value="<?php echo $this->session->flashdata('user_birthday'); ?>" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Number</label>
                                            <div class="controls">
                                                <input name="user_contact" class="span3" maxlength="25" type="text" value="<?php echo $this->session->flashdata('user_contact'); ?>" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Picture</label>
                                            <div class="controls">
                                                <input name="userfile" class="span5" type="file" />
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
                                            <label class="control-label">Role</label>
                                            <div class="controls">
                                                <select name="role_id" class="span3">
                                                    <option value="">-- SELECT --</option>
                                                    <?php foreach ($rs_role as $data) : ?>
                                                        <option value="<?php echo $data['role_id']; ?>"><?php echo $data['role_name']; ?></option>
                                                    <?php endforeach ; ?>
                                                </select>
                                                <span class="help-inline">* mandatory</span>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Name</label>
                                            <div class="controls">
                                                <input name="user_name" class="span5" maxlength="100" type="text" value="<?php echo $this->session->flashdata('user_name'); ?>" />
                                                <span class="help-inline">* mandatory</span>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Password</label>
                                            <div class="controls">
                                                <input name="user_pass" class="span3" maxlength="100" type="password" value="" />
                                                <span class="help-inline">* mandatory</span>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Email</label>
                                            <div class="controls">
                                                <input name="user_email" class="span5" maxlength="255" type="text" value="<?php echo $this->session->flashdata('user_email'); ?>" />
                                                <span class="help-inline">* mandatory</span>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Status</label>
                                            <div class="controls">
                                                <select name="user_st" class="span2">
                                                    <option value="unlock">Unlock</option>
                                                    <option value="lock">Lock</option>
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
