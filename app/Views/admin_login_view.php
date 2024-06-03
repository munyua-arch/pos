<?php 

$page_session = \CodeIgniter\Config\Services::session();
?>

<?= $this->extend('layouts/base')?>
<?= $this->section('content')?>

<div class="d-flex justify-content-center mt-5">
<div class="col-md-6 col-lg-5">
						<div class="login-box bg-white box-shadow border-radius-10">
							<div class="login-title">
								<h2 class="text-center text-primary">POS ADMIN LOGIN</h2>
							</div>


							<?php if(isset($validation)):?>
								<div class="alert alert-danger alert-dismissible fade show" role="alert">
									<?= $validation->listErrors()?>
									<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
								</div>
							<?php endif;?>

							<?php if($page_session->getTempdata('admin_login_error')):?>
								<div class="alert alert-danger alert-dismissible fade show" role="alert">
									<?= $page_session->getTempdata('admin_login_error')?>
									<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
								</div>
							<?php endif;?>

							<?= form_open()?>
								
								<div class="input-group custom">
									<input
										type="email"
										class="form-control form-control-lg"
										placeholder="user@gmail.com"
										name="email"
									/>
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
										placeholder="**********"
										name="password"
									/>
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
											<a href="<?= base_url().'admin-login/admin-forgot-password'?>">Forgot Password</a>
										</div>
									</div>
								</div>
								

								<div class="row">
									<div class="col-sm-12">
										<div class="input-group mb-0">
											<input type="submit" value="Sign In" class="btn btn-primary btn-block">
										</div>	
								</div>
								
							<?= form_close()?>
						</div>

						
					</div> 

					<div class="d-flex justify-content-center mt-5">
						<p>Are you an <strong>Employee</strong>? <a href="<?= base_url().'login/'?>">Login Here</a></p>
					</div>
</div>
<?= $this->endSection() ?>