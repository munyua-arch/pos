<?php 

$page_session = \CodeIgniter\Config\Services::session();


?>

<?= $this->extend('backend/page-layouts'); ?>
<?= $this->section('content'); ?>

				<div class="min-height-200px">
					<div class="page-header">
						<div class="row">
							<div class="col-md-6 col-sm-12">
								<div class="title">
									<h4>Suppliers</h4>
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item">
											<a href="<?= base_url().'dashboard/'?>">Home</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">
											Suppliers
										</li>
									</ol>
								</nav>
							</div>
						</div>
					</div>

					<?php if($page_session->getTempdata('supplier_delete')):?>
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							<?= $page_session->getTempdata('supplier_delete')?>
							<button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
					<?php endif;?>

					<?php if($page_session->getTempdata('supplier_success')):?>
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							<?= $page_session->getTempdata('supplier_success')?>
							<button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
					<?php endif;?>


					<!-- Simple Datatable start -->
					<div class="card-box mb-30">
						<div class="pd-20 d-flex justify-content-between align-items-center">
							<h4 class="text-blue h4">Suppliers Information</h4>
                            
							<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
							<i class="icon-copy bi bi-person-plus-fill m-1"></i>
                            Add Suppliers
                            </button>
						</div>

						<div class="pb-20">

							<!-- if -->
							<?php if(count($suppliers)):?>
								<table class="data-table table stripe hover nowrap">
								<thead>
									<tr>
										<th class="table-plus datatable-nosort">S/N</th>
										<th>Supplier Name</th>
                                        <th>Company</th>
										<th>Location</th>
										<th>Email</th>
										<th>Phone Number</th>
										<th class="datatable-nosort">Action</th>
									</tr>
								</thead>
								<tbody>
									
								<!-- foreach -->
								<?php foreach($suppliers as $sup):?>
									<tr>
										<td><?= $sup['id']?></td>
                                        <td><?= $sup['supplier_name']?></td>
                                        <td><?= $sup['company']?></td>
										<td><?= $sup['location']?></td>
                                        <td><?= $sup['email']?></td>
                                        <td><?= $sup['phone']?></td>
										<td>
											<div class="dropdown">
												<a
													class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
													href="#"
													role="button"
													data-toggle="dropdown"
												>
													<i class="dw dw-more"></i>
												</a>
												<div
													class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
												>
												
													<a class="dropdown-item" href="<?= base_url().'dashboard/edit-supplier/'.$sup['id']?>"
														><i class="dw dw-edit2"></i> Edit</a
													>
													<a class="dropdown-item" href="<?= base_url().'dashboard/delete-supplier/'.$sup['id']?>"
														><i class="dw dw-delete-3"></i> Delete</a
													>
												</div>
											</div>
										</td> 
									</tr>
								<?php endforeach;?>
								<!-- endforeach -->

								</tbody>
								</table>
							<?php else:?>
								<p class="d-flex justify-content-center align-items text-danger">
									No Available suppliers
								</p>
							<?php endif;?>
							<!-- endif -->


						</div>
					</div>
					<!-- Simple Datatable End -->
					

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Supplier</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
				<?php if(isset($validation)):?>
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<?= $validation->listErrors()?>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
				<?php endif;?>
				

                <div class="modal-body">
                    <?= form_open('dashboard/suppliers', ['id' => 'addSupplier']) ?>
                    <div class="form-group">
                        <label>Supplier's Name</label>
                        <input type="text" class="form-control" name="supplier_name" value="<?= set_value('James')?>">
                    </div>
                    <div class="form-group">
                        <label>Company Name</label>
                        <input type="text" class="form-control" name="company">
                    </div>
					<div class="form-group">
                        <label>Location</label>
                        <input type="text" class="form-control" name="location">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="tel" class="form-control" name="phone">
                    </div>
                    <?= form_close() ?>
                </div>
                <div class="modal-footer">
					<input type="submit" value="Submit" form="addSupplier" id="submitButton" class="btn btn-primary">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Add JavaScript for the loading indicator -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    var addSupplierForm = document.getElementById('addSupplier');
    var submitButton = document.getElementById('submitButton');

    addSupplierForm.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission behavior
        
        var button = submitButton;
        button.disabled = true; // Disable the button to prevent multiple clicks
        button.value = 'Please Wait...'  // Update button HTML to indicate loading
        
        // Simulate a backend action with a setTimeout
        setTimeout(function() {
            // Once the backend action is complete (after 2 seconds in this example), re-enable the button and change its HTML back
            button.disabled = false;
            button.innerHTML = 'Submit';
            
            // Manually submit the form
            addSupplierForm.submit();
        }, 2000); // 2000 milliseconds = 2 seconds (change this time as needed)
    });
});


</script>
    
<?= $this->endSection(); ?>

