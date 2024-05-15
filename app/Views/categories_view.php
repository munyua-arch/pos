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
									<h4>Categories</h4>
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item">
											<a href="<?= base_url().'dashboard/'?>">Home</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">
											Categories
										</li>
									</ol>
								</nav>
							</div>
						</div>
					</div>

					
					<?php if($page_session->getTempdata('category_success')):?>
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							<?= $page_session->getTempdata('category_success')?>
							<button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
					<?php endif;?>

					<?php if($page_session->getTempdata('category_error')):?>
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							<?= $page_session->getTempdata('category_error')?>
							<button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
					<?php endif;?>


					<!-- Simple Datatable start -->
					<div class="card-box mb-30">
						<div class="pd-20 d-flex justify-content-between align-items-center">
							<h4 class="text-blue h4">Products Information</h4>
                            
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            <i class="icon-copy bi bi-bag-plus-fill m-1"></i>
                                Add Category
                            </button>
						</div>

						<div class="pb-20">

							<!-- if -->
								<table class="data-table table stripe hover nowrap">
								<thead>
									<tr>
										<th class="table-plus datatable-nosort">S/N</th>
										<th>Category Name</th>
                                        <th>Created At</th>
										<th class="datatable-nosort">Action</th>
									</tr>
								</thead>
								<tbody>
									
								<!-- foreach -->
									<tr>
										<td>1</td>
                                        <td>Building & Construction</td>
                                        <td>April 2nd, 2025</td>
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
												
													<a class="dropdown-item" href="<?= base_url().'dashboard/edit-supplier/'?>"
														><i class="dw dw-edit2"></i> Edit</a
													>
													<a class="dropdown-item" href="<?= base_url().'dashboard/delete-supplier/'?>"
														><i class="dw dw-delete-3"></i> Delete</a
													>
												</div>
											</div>
										</td> 
									</tr>
								<!-- endforeach -->

								</tbody>
							</table>
							<!-- endif -->


						</div>
					</div>
					<!-- Simple Datatable End -->
					
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Category</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?= form_open('dashboard/categories', ['id' => 'addCategory']) ?>
                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" class="form-control" name="category_name">
                    </div>
                    
                    <?= form_close() ?>
                </div>
                <div class="modal-footer">
					<input type="submit" form="addCategory" class="btn btn-primary" value="Submit">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Add JavaScript for the loading indicator -->
<!-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        var modalForm = document.getElementById('staticBackdrop').querySelector('form');
        var modalSubmitButton = document.getElementById('submitButton');

        modalSubmitButton.addEventListener('click', function() {
            var button = this;
            button.disabled = true; // Disable the button to prevent multiple clicks
            button.innerHTML = `
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                Please Wait...
            `;
            // Simulate a backend action with a setTimeout
            setTimeout(function() {
                // Once the backend action is complete re-enable the button and change its text back
                button.disabled = false;
                button.innerHTML = 'Submit';
                // Close the modal (optional)
                // $('#staticBackdrop').modal('hide');
                // Reset the form fields (optional)
                // modalForm.reset();
            }, 2000); // 2000 milliseconds = 2 seconds (change this time as needed)
        });
    });
</script> -->

    
<?= $this->endSection(); ?>