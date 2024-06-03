<?php 

$page_session = \CodeIgniter\Config\Services::session();
?>

<?= $this->extend('backend\admin-layouts'); ?>
<?= $this->section('content'); ?>

<section>

                    <div class="min-height-200px">
                        <div class="page-header">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="title">
                                        <h4>Incoming Goods</h4>
                                    </div>
                                    <nav aria-label="breadcrumb" role="navigation">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="<?= base_url().'admindashboard/'?>">Home</a>
                                            </li>
                                            <li class="breadcrumb-item active" aria-current="page">
											Incoming Goods
                                            </li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
					</div>

                    <!-- Display invalid form errors -->
                            
                    <?php if(isset($validation)):?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <?= $validation->listErrors(); ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php endif;?>
                        <!-- Display invalid form errors -->
                        
                    <?php if($page_session->has('income_success')): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?= $page_session->get('income_success') ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif;?>

                        <?php if($page_session->has('income_error')): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?= $page_session->get('income_error') ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif;?>

    <!-- horizontal Basic Forms Start -->
    <div class="pd-20 card-box mb-30">
						<div class="clearfix">
							<div class="pull-left">
								<h4 class="text-blue h4">Incoming Goods Form</h4>
							</div>
						</div>

                        

                        
                        


						<?= form_open();?>

                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Entry Date</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="entry_date" value="<?= set_value('entry_date')?>">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Supplier</label>
                            <div class="col-sm-10">
                            
                                    <select class="form-select" aria-label="Default select example" name="supplier">
                                        <option selected>-- choose supplier --</option>
                                            <?php if(count($suppliers)):?>
                                                <?php foreach($suppliers as $supplier):?>
                                                  <option value="<?= $supplier['supplier_name']?>"><?= $supplier['supplier_name']?></option>
                                                  <?php endforeach;?>

                                            <?php endif;?>
                                    </select>
                                
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Goods</label>
                            <div class="col-sm-10">
                            <select class="form-select" aria-label="Default select example" name="goods">
                                <option selected>-- choose goods --</option>
                                <?php if(count($goods)):?>
                                    <?php foreach($goods as $good):?>
                                        <option value="<?= $good['product_name']?>"><?= $good['product_name']?></option>
                                    <?php endforeach?>
                                <?php endif;?>
                            </select>
                            </div>
                        </div>
                        
           

                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Quantity</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="quantity">
                            </div>
                        </div>

 
                                

                            <input type="submit" name="submit" value="Save" class="btn btn-lg btn-primary">  
						
						<?= form_close();?>

                       

							</div>
						</div>
					</div>
					<!-- horizontal Basic Forms End -->
</section>

<?= $this->endSection(); ?>