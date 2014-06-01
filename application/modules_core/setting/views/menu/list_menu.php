				<!-- Main window -->
				<div class="main_container" id="tables_page">

		            <div class="row-fluid">
		                <ul class="breadcrumb">
		                    <li><a>Management Menu</a> <span class="divider">/</span></li>
                            <li><a href="<?php echo base_url(); ?>setting/menu">Portal List</a> <span class="divider">/</span></li>
		                    <li class="active">Menu List</li>
		                </ul>
		            </div>

		            <div class="row-fluid">
		                <div class="widget widget-padding span12">
		                    <div class="widget-header">
		                        <i class="icon-group"></i>
		                        <h5>Menu List</h5>

		                        <div class="widget-buttons">
		                            <a href="<?php echo base_url(); ?>setting/menu/add/<?php echo $portal['portal_slug']; ?>" data-title="Add Data" class="tip"><i class="icon-plus"></i></a>
		                            <a data-title="Collapse" data-collapsed="false" class="tip collapse"><i class="icon-chevron-up"></i></a>
		                        </div>
		                    </div>

		                    <div class="widget-body">
		                        <table id="users" class="table table-striped table-bordered dataTable">
		                            <thead>
		                                <tr>
		                                    <th>#</th>
		                                    <th>Name</th>
		                                    <th>Description</th>
		                                    <th>Order</th>
		                                    <th style="width:12%;"></th>
		                                </tr>
		                            </thead>
		                            <tbody>
                                        <?php $no = 1; foreach ($rs_menu as $key) : ?>
                                        	<tr>
                                        		<td><?php echo $no; ?></td>
                                        		<td><?php echo "- " . $key['menu_name']; ?></td>
                                        		<td><?php echo $key['menu_desc']; ?></td>
                                        		<td><?php echo $key['menu_order']; ?></td>
                                        		<td>
                                   					<a class="btn btn-primary btn-small" href="<?php echo base_url(); ?>setting/menu/edit/<?php echo $portal['portal_slug']; ?>/<?php echo $key['menu_slug']; ?>"><i class="menu-edit"></i> Edit</a>
                                   					<a class="btn btn-primary btn-small" href="<?php echo base_url(); ?>setting/menu/delete/<?php echo $portal['portal_slug']; ?>/<?php echo $key['menu_slug']; ?>"><i class="menu-edit"></i> Delete</a>
                                        		</td>
                                        	</tr>
                                            <?php if (!empty($key['detail'])) : ?>
                                                <?php foreach ($key['detail'] as $value) : $no++; ?>
		                                        	<tr>
		                                        		<td><?php echo $no; ?></td>
		                                        		<td><?php echo "-- " . $value['menu_name']; ?></td>
		                                        		<td><?php echo $value['menu_desc']; ?></td>
		                                        		<td><?php echo $value['menu_order']; ?></td>
		                                        		<td>
		                                        			<a class="btn btn-primary btn-small" href="<?php echo base_url(); ?>setting/menu/edit/<?php echo $portal['portal_slug']; ?>/<?php echo $value['menu_slug']; ?>"><i class="menu-edit"></i> Edit</a>
		                                        			<a class="btn btn-primary btn-small" href="<?php echo base_url(); ?>setting/menu/delete/<?php echo $portal['portal_slug']; ?>/<?php echo $value['menu_slug']; ?>"><i class="menu-edit"></i> Delete</a>
		                                        		</td>
		                                        	</tr>
                                                <?php endforeach ; ?>
                                            <?php endif ; ?>
                                        <?php $no++; endforeach ; ?>
		                            </tbody>
		                        </table>
		                    </div> <!-- /widget-body -->
		                </div> <!-- /widget -->
		            </div> <!-- /row-fluid -->

				</div>
				<!-- /Main window -->

			</div>
			<!--/.fluid-container-->
		</div>
		<!-- wrap ends-->
