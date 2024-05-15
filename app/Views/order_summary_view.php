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
									<h4>Order Summary</h4>
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item">
											<a href="<?= base_url().'dashboard/'?>">Home</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">
											Order Summary
										</li>
									</ol>
								</nav>
							</div>
						</div>
					</div>

                    <div class="invoice-wrap">
						<div class="invoice-box">
							<div class="invoice-header">
								<div class="logo text-center">
									<img src="vendors/images/deskapp-logo.png" alt="" />
								</div>
							</div>
							<h4 class="text-center mb-30 weight-600">INVOICE</h4>
							<div class="row pb-30">
								<div class="col-md-6">
									<h5 class="mb-15">Client Name</h5>
									<p class="font-14 mb-5">
										Date Issued: <strong class="weight-600">10 Jan 2018</strong>
									</p>
									<p class="font-14 mb-5">
										Invoice No: <strong class="weight-600">4556</strong>
									</p>
								</div>
								<div class="col-md-6">
									<div class="text-right">
										<p class="font-14 mb-5">Your Name</p>
										<p class="font-14 mb-5">Your Address</p>
										<p class="font-14 mb-5">City</p>
										<p class="font-14 mb-5">Postcode</p>
									</div>
								</div>
							</div>
							<div class="invoice-desc pb-30">
								<div class="invoice-desc-head clearfix">
									<div class="invoice-sub">ID</div>
									<div class="invoice-rate">Product Name</div>
									<div class="invoice-hours">Price</div>
									<div class="invoice-subtotal">Quantity</div>
                                    <div class="invoice-total">Total Price</div>
								</div>
								<div class="invoice-desc-body">
									<ul>
										<li class="clearfix">
											<div class="invoice-sub">1</div>
											<div class="invoice-rate">Cement</div>
											<div class="invoice-hours">550</div>
                                            <div class="invoice-subtotal">2</div>
											<div class="invoice-subtotal">
												<span class="weight-600">kes 2670</span>
											</div>
										</li>
									</ul>
								</div>
								<button id="printButton" class="btn btn-outline-info">
									Print

								</button>
								<h4 class="text-center pb-20">Thank You!!</h4>
							</div>
							
						</div>
					</div>

<script>
	document.getElementById('printButton').addEventListener('click', fucntion(){
		window.print();
	});
</script>
    
<?= $this->endSection(); ?>