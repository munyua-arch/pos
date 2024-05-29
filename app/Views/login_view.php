<?php 

$page_session = \CodeIgniter\Config\Services::session();
?>

<?= $this->extend('layouts/base')?>
<?= $this->section('content')?>

<div class="d-flex justify-content-center mt-5">
<div class="col-md-6 col-lg-5">
						<div class="login-box bg-white box-shadow border-radius-10">
							<div class="login-title">
								<h2 class="text-center text-primary">POS SYSTEM</h2>
							</div>


							<?= form_open()?>
								
								<div class="input-group custom">
								<input 
									type="email" 
									class="form-control form-control-lg" 
									placeholder="ian212@gmail.com"
									name="email"
								>
									<div class="input-group-append custom">
										<span class="input-group-text"
											><i class="icon-copy dw dw-user1"></i
										></span>
									</div>
								</div>
								<div class="input-group custom">
								<input 
									type="password" 
									class="form-control form-control-lg" 
									placeholder="******"
									name="password"
								>
									<div class="input-group-append custom">
										<span class="input-group-text"
											><i class="dw dw-padlock1"></i
										></span>
									</div>
								</div>
								<div class="row pb-30">
									<div class="col-6">
									</div>
									<div class="col-6">
										<div class="forgot-password">
											<a href="<?= base_url().'login/forgot-password'?>">Forgot Password</a>
										</div>
									</div>
								</div>
								

								<div class="row">
									<div class="col-sm-12">
										<div class="input-group mb-0">
											<input type="submit" class="btn btn-block btn-primary">
										</div>
								</div>
								
							<?= form_close()?>
						</div>

						<?= form_open()?>
								<div class="form-group">
									
								</div>

								<div class="form-group">
									
								</div>

								
							<?= form_close()?>

						
					</div> 
					<div class="d-flex justify-content-center mt-5">
					<p>Are you an <strong>Admin</strong>? <a href="<?= base_url().'admin-login'?>">Login Here</a></p>
					</div>
</div>


<?= $this->endSection() ?>