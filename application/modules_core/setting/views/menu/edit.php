                <!-- Main window -->
                <div class="main_container" id="tables_page">

                    <div class="row-fluid">
                        <ul class="breadcrumb">
                            <li><a>Management Menu</a> <span class="divider">/</span></li>
                            <li><a href="<?php echo base_url(); ?>setting/menu">Portal List</a> <span class="divider">/</span></li>
                            <li><a href="<?php echo base_url(); ?>setting/menu/list_menu/<?php echo $portal['portal_slug']; ?>">Menu List</a> <span class="divider">/</span></li>
                            <li class="active"><?php echo $result['menu_name']; ?></li>
                        </ul>
                    </div>

                    <div class="row-fluid">
                        <div class="widget widget-padding span12">
                            <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>setting/menu/edit_process">
                                <input type="hidden" name="user_id" value="<?php echo $user['user_id'] ?>">
                                <input type="hidden" name="menu_id" value="<?php echo $result['menu_id'] ?>">
                                <input type="hidden" name="portal_slug" value="<?php echo $portal['portal_slug'] ?>">
                                <input type="hidden" name="menu_slug" value="<?php echo $result['menu_slug'] ?>">
                                <div class="widget-header">
                                    <i class="icon-list-alt"></i><h5>Edit Menu</h5>
                                    <div class="widget-buttons">
                                        <a data-title="Collapse" data-collapsed="false" class="tip collapse"><i class="icon-chevron-up"></i></a>
                                    </div>
                                </div>
                                <div class="widget-body">
                                    <div class="widget-forms clearfix">
                                        <div class="control-group">
                                            <label class="control-label">Parent Menu</label>
                                            <div class="controls">
                                                <select name="parent_id">
                                                    <option value=""></option>
                                                    <?php foreach ($rs_menu as $key) : ?>
                                                        <option value="<?php echo $key['menu_id']; ?>" <?php ($result['parent_id'] == $key['menu_id']) ? print "selected='selected'" : ""; ?>> - <?php echo $key['menu_name']; ?></option>
                                                        <?php if (!empty($key['detail'])) : ?>
                                                            <?php foreach ($key['detail'] as $value) : ?>
                                                                <option value="<?php echo $value['menu_id']; ?>" <?php ($result['parent_id'] == $value['menu_id']) ? print "selected='selected'" : ""; ?>> -- <?php echo $value['menu_name']; ?></option>
                                                            <?php endforeach ; ?>
                                                        <?php endif ; ?>
                                                    <?php endforeach ; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Name</label>
                                            <div class="controls">
                                                <input name="menu_name" class="span5" maxlength="100" type="text" value="<?php echo $result['menu_name']; ?>" />
                                                <span class="help-inline">* mandatory</span>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Description</label>
                                            <div class="controls">
                                                <textarea name="menu_desc" class="span7" style="height:250px;" ><?php echo $result['menu_desc']; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Url</label>
                                            <div class="controls">
                                                <input name="menu_url" class="span2" maxlength="100" type="text" value="<?php echo $result['menu_url']; ?>" />
                                                <span class="help-inline">* mandatory</span>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Order</label>
                                            <div class="controls">
                                                <input name="menu_order" class="span1" maxlength="11" type="text" value="<?php echo $result['menu_order']; ?>" />
                                                <span class="help-inline">* mandatory</span>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Icon</label>
                                            <div class="controls">
                                                <input name="menu_icon" class="span2" maxlength="25" type="text" value="<?php echo $result['menu_icon']; ?>" />
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
