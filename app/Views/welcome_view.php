<?php 

$page_session = \CodeIgniter\Config\Services::session();
?>

<?= $this->extend('layouts/base')?>
<?= $this->section('content')?>

<div class="d-flex justify-content-center mt-5">
<div class="col-md-6 col-lg-5">
						<div class="login-box bg-white box-shadow border-radius-10">
							<div class="login-title">
								<h2 class="text-center text-primary">Business Name</h2>
							</div>


								

								<div class="row">
									<div class="col-sm-12">
										<div class="input-group mb-0">
											<a href="<?= base_url().'login'?>" class="btn btn-block btn-primary">Click Here to login</a>
										</div>	
								</div>
								
						</div>

						
					</div> 
</div>
<?= $this->endSection() ?>