<?php 

$page_session = \CodeIgniter\Config\Services::session();


?>

<?= $this->extend('backend/admin-layouts'); ?>
<?= $this->section('content'); ?>

				<div class="min-height-200px">
					<div class="page-header">
						<div class="row">
							<div class="col-md-6 col-sm-12">
								<div class="title">
									<h4>Roles & Permissions</h4>
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item">
											<a href="<?= base_url().'admindashboard/'?>">Home</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">
                                        Roles & Permissions
										</li>
									</ol>
								</nav>
								
							</div>
						</div>
					</div>

					
					


                        <div class="col col-sm-12 mb-30">
							<div class="card-box height-100-p overflow-hidden">
								<div class="profile-tab height-100-p">
									<div class="tab height-100-p">
										<ul class="nav nav-tabs customtab" role="tablist">
											<li class="nav-item">
												<a
													class="nav-link active"
													data-toggle="tab"
													href="#timeline"
													role="tab"
													>Roles</a
												>
											</li>

											<li class="nav-item">
												<a
													class="nav-link"
													data-toggle="tab"
													href="#setting"
													role="tab"
													>Permissions</a
												>
											</li>
										</ul>
										<div class="tab-content">
											<!-- Roles Tab start -->
											<div
												class="tab-pane fade show active"
												id="timeline"
												role="tabpanel"
											>
												<div class="pd-20">

												<?php if($page_session->get('role_success')):?>
													<div class="alert alert-success alert-dismissible fade show" role="alert">
														<?= $page_session->get('role_success')?>
														<button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
													</div>
												<?php endif;?>

												<?php if($page_session->get('role_error')):?>
													<div class="alert alert-danger alert-dismissible fade show" role="alert">
														<?= $page_session->get('role_error')?>
														<button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
													</div>
												<?php endif;?>

												<?php if(isset($validation)):?>
													<div class="alert alert-danger alert-dismissible fade show" role="alert">
														<?= $validation->listErrors()?>
														<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
													</div>
													
												<?php endif;?>
                                                    
													<div class="d-flex justify-content-end">
                                                        
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                        + Add
                                                    </button>
                                                    </div>

                                                    <h3>Available Roles (3)</h3>

                                                    <!-- role tables -->
                                                        <table class="table table-striped mt-4">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">Role</th>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th scope="col">Permissions</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>Admin</td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td class="mr-2">
                                                                        <span class="badge text-bg-success">Create Employee</span>
                                                                        <span class="badge text-bg-danger">Delete User</span>
                                                                        <span class="badge text-bg-info">Edit User</span>
                                                                        <span class="badge text-bg-secondary">View User</span>
                                                                    </td>
                                                                   
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    <!-- role end -->
														
												</div>
											</div>
								
											<!-- Permission Tab start -->
											<div
												class="tab-pane fade height-100-p"
												id="setting"
												role="tabpanel"
											>
												<div class="profile-setting">
													<form>
														<ul class="profile-edit-list row">
															<li class="weight-500 col col-sm-12">

															<?php if(isset($permission_validation)):?>
																<div class="alert alert-danger alert-dismissible fade show" role="alert">
																	<?= $permission_validation->listErrors()?>
																	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
																</div>
															<?php endif;?>

															<?php if($page_session->get('permission_success')):?>
																<div class="alert alert-success alert-dismissible fade show" role="alert">
																	<?= $page_session->get('permission_success')?>
																	<button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
																</div>
															<?php endif;?>

															<?php if($page_session->get('permission_error')):?>
																<div class="alert alert-danger alert-dismissible fade show" role="alert">
																	<?= $page_session->get('permission_error')?>
																	<button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
																</div>
															<?php endif;?>

																<div class="d-flex justify-content-end">
																	<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#permissionModal">
																		+ Add
																	</button>
																</div>

																<h4 class="text-blue h5 mb-20">
																	Permission Type
																</h4>

																<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Magni amet et minus eveniet. Consequatur, modi dignissimos.</p>
																
															</li>
															
														</ul>
													</form>
												</div>
											</div>
											<!-- Setting Tab End -->
										</div>
									</div>
								</div>
							</div>
						</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Role</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <?php if(isset($validation)):?>
							<div class="alert alert-danger alert-dismissible fade show" role="alert">
								<?= $validation->listErrors()?>
								<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>
						<?php endif;?>

      <div class="modal-body">
        <?= form_open('admindashboard/roles', ['id' => 'addRole'])?>

			<input type="hidden" name="form_type" value="role_form">

            <div class="form-group">
                <label>Role Type</label>
                <input type="text" class="form-control" name="role_type">
            </div>

            <div class="form-group">
                <select name="permissions[]"  class="form-select" multiple>
                    <option value="Create User" class="badge text-bg-success mr-2">Create User</option>
                    <option value="Delete User" class="badge text-bg-danger mr-2">Delete User</option>
                </select>
            </div>
        <?= form_close()?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" form="addRole">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Permission Modal -->
<div class="modal fade" id="permissionModal" tabindex="-1" aria-labelledby="permissionModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Role</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      					<?php if(isset($permission_validation)):?>
							<div class="alert alert-danger alert-dismissible fade show" role="alert">
								<?= $permission_validation->listErrors()?>
								<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>
						<?php endif;?>

      <div class="modal-body">
        <?= form_open('admindashboard/roles', ['id' => 'addPermission'])?>

			<input type="hidden" name="form_type" value="permission_form">

            <div class="form-group">
                <label>Permission Name</label>
                <input type="text" class="form-control" name="permission_name">
            </div>

        <?= form_close()?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" form='addPermission'>Save changes</button>
      </div>
    </div>
  </div>
</div>
    
<?= $this->endSection(); ?>