<?php 

$page_session = \CodeIgniter\Config\Services::session();


?>

<?= $this->extend('backend/page-layouts'); ?>
<?= $this->section('content'); ?>

<section>

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
										<li class="breadcrumb-item" aria-current="page">
											<a href="<?= base_url().'dashboard/create-order'?>">Create Order</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">
											Order Summary
										</li>
									</ol>
								</nav>
							</div>

							<div class="col-md-6 col-sm-12 text-right">
								<button class="btn btn-primary" id="print">Print</button>
							</div>
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
			<h5 class="text-center mb-30 weight-600">Business name</h5>
			<h5>P.O Box 122-60401, Chogoria</h5>
			

				<div class="row pb-30 mt-3">
					<div class="col-md-6">
						<h5 class="mb-15">Client Name</h5>
						<p class="font-14 mb-5">
							Date Issued: <strong class="weight-600">3 Jan 2024</strong>
						</p>
					</div>
					<div class="col-md-6">
					    <div class="text-right">
						    <p class="font-14 mb-5">name</p>
							<p class="font-14 mb-5">phone</p>
							<p class="font-14 mb-5">chogoria</p>
						   
						</div>
					</div>
							</div>
							<!-- if -->
							<?php if(count($prints)):?>
							<div class="invoice-desc pb-30">
								<div class="invoice-desc-head clearfix">
									<div class="invoice-sub">Item</div>
									<div class="invoice-rate">Price</div>
									<div class="invoice-hours">Unit Cost</div>
									<div class="invoice-subtotal">Quantity</div>
								</div>
								<!-- foreach -->
								<?php foreach($prints as $print):?>
								<div class="invoice-desc-body">
									<ul>
										<li class="clearfix">
											<div class="invoice-sub"><?= $print['product_name']?></div>
											<div class="invoice-rate"><?= $print['price']?></div>
											<div class="invoice-hours"><?= $print['quantity']?></div>
											<div class="invoice-subtotal">
												<span class="weight-600"><?= $print['total_price']?></span>
											</div>
										</li>
									</ul>
								</div>
								<?php endforeach;?>
								<!-- endforeach -->


								<!-- <div class="invoice-desc-footer">
									<div class="invoice-desc-head clearfix">
										<div class="invoice-subtotal text-center">Total Due</div>
									</div>
									<div class="invoice-desc-body">
										<ul>
											<li class="clearfix">
												<div class="invoice-sub">
												</div>
												<div class="invoice-rate font-20 weight-600">
													10 Jan 2018
												</div>
												<div class="invoice-subtotal">
													<span class="weight-600 font-24 text-danger"
														>$8000</span
													>
												</div>
											</li>
										</ul>
									</div>
								</div> -->
								<?php endif;?>
								<!-- endif -->
							</div>
							<h4 class="text-center pb-20">Thank You!!</h4>
						</div>
</section>


<script>
	const printBtn = document.getElementById('print');

	printBtn.addEventListener('click', function(){
		window.print();
	});
</script>
    
<?= $this->endSection(); ?>