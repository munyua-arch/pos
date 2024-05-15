<?php 

$page_session = \CodeIgniter\Config\Services::session();
?>

<?= $this->extend('backend\page-layouts'); ?>
<?= $this->section('content'); ?>

<section>

                    <div class="min-height-200px">
                        <div class="page-header">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="title">
                                        <h4>Edit Supplier</h4>
                                    </div>
                                    <nav aria-label="breadcrumb" role="navigation">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="<?= base_url().'dashboard/'?>">Home</a>
                                            </li>
                                            <li class="breadcrumb-item">
                                                <a href="<?= base_url().'dashboard/suppliers'?>">Suppliers</a>
                                            </li>
                                            <li class="breadcrumb-item active" aria-current="page">
                                                Edit Supplier
                                            </li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
					</div>

    <!-- horizontal Basic Forms Start -->
    <div class="pd-20 card-box mb-30">
						<div class="clearfix">
							<div class="pull-left">
								<h4 class="text-blue h4">Edit Supplier </h4>
								<p class="mb-30">Please fill the form below to update supplier info</p>
							</div>
						</div>

                        <!-- Display invalid form errors -->
                            
                                <?php if(isset($validation)):?>
                                    <div class="alert alert-danger alert-dimissible fade show" role="alert">
                                        <?= $validation->listErrors(); ?>
                                        <button class="btn-close" type="button" data-bs-dismiss="alert" role="Close"></button>
                                    </div>
                                <?php endif;?>
                            
                        <!-- Display invalid form errors -->

                        
                        <?php if($page_session->has('create_success')): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?= $page_session->get('create_success') ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif;?>

                        <?php if($page_session->has('create_error')): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?= $page_session->get('create_error') ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif;?>


						<?= form_open();?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" name="supplier_name" class="form-control" id="floatingInput" placeholder="Supplier Name" value="<?= $editSupplier['supplier_name']?>">
                                    <label for="floatingInput">Supplier Name</label>
                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" name="company" class="form-control" id="floatingInput" placeholder="Last Name" value="<?= $editSupplier['company']?>">
                                    <label for="floatingInput">Company</label>
                                   
                                </div>
                            </div>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" name="location" class="form-control" id="floatingInput" placeholder="Location" value="<?= $editSupplier['location']?>">
                            <label for="floatingInput">Location</label>
                                    
                        </div>

                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control" id="floatingInput"  placeholder="name@email.com" value="<?= $editSupplier['email']?>">
                                <label for="floatingInput">Email</label>
                                    
                        </div>
                       
                               
                        <div class="form-floating mb-3">
                            <input type="tel" name="phone" class="form-control" id="floatingInput"  placeholder="name@email.com" value="<?= $editSupplier['phone']?>">
                            <label for="floatingInput">Phone Number</label>
                                    
                        </div>
                        
           
                       
                                

                            <input type="submit" name="submit" value="Update Info" class="btn btn-lg btn-primary">  
						
						<?= form_close();?>

                       

							</div>
						</div>
					</div>
					<!-- horizontal Basic Forms End -->
</section>

<?= $this->endSection(); ?>