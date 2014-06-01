                <!-- Main window -->
                <div class="main_container" id="tables_page">

                    <div class="row-fluid">
                        <ul class="breadcrumb">
                            <li><a>Management Permission</a> <span class="divider">/</span></li>
                            <li><a href="<?php echo base_url(); ?>setting/permission">Permission List</a> <span class="divider">/</span></li>
                            <li class="active">Edit</li>
                        </ul>
                    </div>

                    <div class="row-fluid">
                        <div class="widget widget-padding span12">
                            <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>setting/permission/edit_process">
                                <input type="hidden" name="user_id" value="<?php echo $user['user_id'] ?>">
                                <input type="hidden" name="role_id" value="<?php echo $result['role_id'] ?>">
                                <div class="widget-header">
                                    <i class="icon-list-alt"></i><h5>Edit Permission</h5>
                                    <div class="widget-buttons">
                                        <a data-title="Collapse" data-collapsed="false" class="tip collapse"><i class="icon-chevron-up"></i></a>
                                    </div>
                                </div>
                                <div class="widget-body">
                                    <div class="widget-forms clearfix">
                                        <div class="control-group">
                                            <label class="control-label"></label>
                                            <label style="text-align:center;" class="control-label"><b>Create</b></label>
                                            <label style="text-align:center;" class="control-label"><b>Read</b></label>
                                            <label style="text-align:center;" class="control-label"><b>Update</b></label>
                                            <label style="text-align:center;" class="control-label"><b>Delete</b></label>
                                        </div>
                                        <?php foreach ($rs_menu as $data) : ?>
                                            <div class="control-group">
                                                <label style="text-align:left;" class="control-label"><b><input type="checkbox" class="all" value="<?php echo $data['menu_id']; ?>" style="margin-top:-2px;" <?php ($data['permission'] != "") ? print "checked='checked'" : "" ; ?> /> + <?php echo $data['menu_name']; ?></b></label>
                                                <label style="text-align:center;" class="control-label"><input name="permission[<?php echo $data['menu_id']; ?>][1]" class="menu<?php echo $data['menu_id']; ?>" type="checkbox" <?php (substr($data['permission'], 0, 1) == "1") ? print "checked='checked'" : "" ; ?> /></label>
                                                <label style="text-align:center;" class="control-label"><input name="permission[<?php echo $data['menu_id']; ?>][2]" class="menu<?php echo $data['menu_id']; ?>" type="checkbox" <?php (substr($data['permission'], 1, 1) == "1") ? print "checked='checked'" : "" ; ?> /></label>
                                                <label style="text-align:center;" class="control-label"><input name="permission[<?php echo $data['menu_id']; ?>][3]" class="menu<?php echo $data['menu_id']; ?>" type="checkbox" <?php (substr($data['permission'], 2, 1) == "1") ? print "checked='checked'" : "" ; ?> /></label>
                                                <label style="text-align:center;" class="control-label"><input name="permission[<?php echo $data['menu_id']; ?>][4]" class="menu<?php echo $data['menu_id']; ?>" type="checkbox" <?php (substr($data['permission'], 3, 1) == "1") ? print "checked='checked'" : "" ; ?> /></label>
                                            </div>
                                            <?php if (!empty($data['detail'])) : foreach ($data['detail'] as $value) : ?>
                                                <div class="control-group">
                                                    <label style="text-align:left;" class="control-label"><b><input type="checkbox" class="sub" value="<?php echo $value['menu_id']; ?>" style="margin-top:-2px;" <?php ($value['permission'] != "") ? print "checked='checked'" : "" ; ?> /> &nbsp;&nbsp;&nbsp;- <?php echo $value['menu_name']; ?></b></label>
                                                    <label style="text-align:center;" class="control-label"><input name="permission[<?php echo $value['menu_id']; ?>][1]" class="menu<?php echo $value['menu_id']; ?>" type="checkbox" <?php (substr($value['permission'], 0, 1) == "1") ? print "checked='checked'" : "" ; ?> /></label>
                                                    <label style="text-align:center;" class="control-label"><input name="permission[<?php echo $value['menu_id']; ?>][2]" class="menu<?php echo $value['menu_id']; ?>" type="checkbox" <?php (substr($value['permission'], 1, 1) == "1") ? print "checked='checked'" : "" ; ?> /></label>
                                                    <label style="text-align:center;" class="control-label"><input name="permission[<?php echo $value['menu_id']; ?>][3]" class="menu<?php echo $value['menu_id']; ?>" type="checkbox" <?php (substr($value['permission'], 2, 1) == "1") ? print "checked='checked'" : "" ; ?> /></label>
                                                    <label style="text-align:center;" class="control-label"><input name="permission[<?php echo $value['menu_id']; ?>][4]" class="menu<?php echo $value['menu_id']; ?>" type="checkbox" <?php (substr($value['permission'], 3, 1) == "1") ? print "checked='checked'" : "" ; ?> /></label>
                                                </div>
                                            <?php endforeach ; endif ; ?>
                                        <?php endforeach ; ?>
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
