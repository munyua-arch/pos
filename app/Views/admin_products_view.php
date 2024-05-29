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
									<h4>Products</h4>
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item">
											<a href="<?= base_url().'admindashboard'?>">Home</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">
											Products
										</li>
									</ol>
								</nav>
							</div>
						</div>
					</div>

					<?php if($page_session->getTempdata('product_success')):?>
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							<?= $page_session->getTempdata('product_success')?>
							<button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
					<?php endif;?>

					<?php if($page_session->getTempdata('product_error')):?>
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							<?= $page_session->getTempdata('product_error')?>
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
                                Add A Product
                            </button>
						</div>

						<div class="pb-20">

							<!-- if -->
							<?php if(count($products)):?>
								<table class="data-table table stripe hover nowrap">
								<thead>
									<tr>
										<th class="table-plus datatable-nosort">S/N</th>
										<th>Product Name</th>
                                        <th>Category</th>
										<th>Price</th>
                                        <th>In Stock</th>
                                        <th>Status</th>
										<th class="datatable-nosort">Action</th>
									</tr>
								</thead>
								<tbody>
									
								<!-- foreach -->
								<?php foreach($products as $product):?>
									<tr>
										<td><?= $product['id']?></td>
                                        <td><?= $product['product_name']?></td>
                                        <td><?= $product['category']?></td>
                                        <td><?= 'KES'." ".$product['price']?></td>
                                        <td><?= $product['in_stock']?></td>
                                        <td>
											<?php 
											$statusClass = ($product['in_stock'] > 0) ? 'text-bg-success' : 'text-bg-danger';
											$statusText = ($product['in_stock'] > 0) ? 'Available' : 'Unavailable';
											?>
											<span class="badge <?= $statusClass ?>"><?= $statusText ?></span>
										</td>
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
								<?php endforeach;?>
								<!-- endforeach -->

								</tbody>
							</table>
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
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Product</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?= form_open('admindashboard/admin-products', ['id' => 'addProduct']) ?>
                    <div class="row">
						<div class="form-group col">
							<label>Product Name</label>
							<input type="text" class="form-control" name="product_name">
						</div>
						<div class="form-group col">
                        <label>Category</label>
                        <input type="text" class="form-control" name="category">
                    </div>
					</div>

                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" class="form-control" name="price">
                    </div>
					<div class="form-group">
                        <label>In Stock</label>
                        <input type="number" class="form-control" name="in_stock">
                    </div>
                    <?= form_close() ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input id="submitButton" type="submit" form="addProduct" class="btn btn-primary" value="Submit"></input>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Add JavaScript for the loading indicator -->
<!-- <script>
document.addEventListener('DOMContentLoaded', function() {
    var addProductForm = document.getElementById('addProduct');
    var submitButton = document.getElementById('submitButton');

    addProductForm.addEventListener('submit', function(event) {
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


</script> -->

    
<?= $this->endSection(); ?>