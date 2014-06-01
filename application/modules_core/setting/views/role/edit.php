                <!-- Main window -->
                <div class="main_container" id="tables_page">

                    <div class="row-fluid">
                        <ul class="breadcrumb">
                            <li><a>Management Role</a> <span class="divider">/</span></li>
                            <li><a href="<?php echo base_url(); ?>setting/role">Role List</a> <span class="divider">/</span></li>
                            <li class="active">Edit</li>
                        </ul>
                    </div>

                    <div class="row-fluid">
                        <div class="widget widget-padding span12">
                            <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>setting/role/edit_process">
                                <input type="hidden" name="user_id" value="<?php echo $user['user_id'] ?>">
                                <input type="hidden" name="role_id" value="<?php echo $result['role_id'] ?>">
                                <div class="widget-header">
                                    <i class="icon-list-alt"></i><h5>Edit Role</h5>
                                    <div class="widget-buttons">
                                        <a data-title="Collapse" data-collapsed="false" class="tip collapse"><i class="icon-chevron-up"></i></a>
                                    </div>
                                </div>
                                <div class="widget-body">
                                    <div class="widget-forms clearfix">
                                        <div class="control-group">
                                            <label class="control-label">Portal</label>
                                            <div class="controls">
                                                <select name="portal_id" class="span5">
                                                    <option value="">-- SELECT --</option>
                                                    <?php foreach ($rs_portal as $data) : ?>
                                                        <option value="<?php echo $data['portal_id']; ?>" <?php ($result['portal_id'] == $data['portal_id']) ? print "selected='selected'" : "" ; ?>><?php echo $data['portal_name']; ?></option>
                                                    <?php endforeach ; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Name</label>
                                            <div class="controls">
                                                <input name="role_name" class="span5" maxlength="100" type="text" value="<?php echo $result['role_name']; ?>" />
                                                <span class="help-inline">* mandatory</span>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Description</label>
                                            <div class="controls">
                                                <textarea name="role_desc" class="span7" style="height:250px;" ><?php echo $result['role_desc']; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Default URL</label>
                                            <div class="controls">
                                                <input name="role_default_url" class="span4" maxlength="100" type="text" value="<?php echo $result['role_default_url']; ?>" />
                                                <span class="help-inline">* mandatory</span>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Status</label>
                                            <div class="controls">
                                                <select name="role_st" class="span2">
                                                    <option value="unlock" <?php ($result['role_st'] == "unlock") ? print "selected='selected'": ""; ?>>Unlock</option>
                                                    <option value="lock" <?php ($result['role_st'] == "lock") ? print "selected='selected'": ""; ?>>Lock</option>
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
