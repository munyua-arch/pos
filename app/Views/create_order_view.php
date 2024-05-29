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
                                        <h4>Create Order</h4>
                                    </div>
                                    <nav aria-label="breadcrumb" role="navigation">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="<?= base_url().'dashboard/'?>">Home</a>
                                            </li>
                                            <li class="breadcrumb-item active" aria-current="page">
                                                Create Order
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
								<h4 class="text-blue h4">Create New Order </h4>
								<p class="mb-30">Please fill the form below to create a new order</p>
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

                        <!-- cancel order success -->
                        <?php if($page_session->has('cancel_success')): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?= $page_session->get('cancel_success') ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif;?>
                        <!-- cancel order success -->

                        
                        <?php if($page_session->has('order_success')): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?= $page_session->get('order_success') ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif;?>

                        <?php if($page_session->has('order_error')): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?= $page_session->get('order_error') ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif;?>


						<?= form_open();?>
                        <div class="row">
                            <div class="col">
                                <label>Products</label>
                                <select class="form-select" aria-label="Default select example" name="product_name">
                                    <option selected>-- Select Product --</option>
                                    <?php if(count($products)):?>
                                        <?php foreach($products as $product):?>
                                            <option value="<?= $product['product_name']?>"><?= $product['product_name']?></option>
                                        <?php endforeach;?>
                                    <?php endif;?>
                                    
                                </select>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Quantity</label>
                                    <input type="number" class="form-control" name="quantity">
                                </div>
                            </div>
                        </div>

                        <input type="submit" name="submit" value="Add Item" class="btn btn-lg btn-primary">
						
						<?= form_close();?>

                       

							</div>
						</div>
					</div>
					<!-- horizontal Basic Forms End -->
</section>

<section>
    <!-- horizontal Basic Forms Start -->
    <div class="pd-20 card-box mb-30">
						<div class="clearfix">
							<div class="pull-left">
								<h4 class="text-blue h4">
                                    Cart <span class="badge text-bg-danger rounded-pill ">
                                        <?= $cartTotal?>
                                    </span>
                                </h4>
							</div>
						</div>

                        <!-- products table -->
                        <?php if(count($orders)):?>
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total Price</th>
                                    <th>Action</th>
                                    </tr>
                                </thead>
                                <?php foreach($orders as $order):?>
                                    <tbody>
                                        <tr>
                                        <th scope="row"><?= $order['id']?></th>
                                        <td><?= $order['product_name']?></td>
                                        <td><?= $order['price']?></td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                <button type="button" class="btn btn-primary decrease-btn">-</button>
                                                <button type="button" class="btn btn-outline-primary quantity-btn"><?= $order['quantity'] ?></button>
                                                <button type="button" class="btn btn-primary increase-btn">+</button>
                                            </div>
                                        </td>

                                        <td><?= $order['total_price']?></td>
                                        <td>
                                            <a href="<?= base_url().'dashboard/cancel-order/'.$order['id']?>?>" class="btn btn-outline-danger">Cancel</a>
                                        </td>
                                        </tr>
                                    </tbody>
                                <?php endforeach;?>
                            </table>
                        <?php else:?>
                            <p class="text-danger d-flex justify-content-center">No Orders to be processed</p>
                        <?php endif;?>

                        <div class="d-dlex justify-content-end">
                            <a href="<?= base_url().'dashboard/order-summary'?>" class="btn btn-lg btn-primary" id="checkout-btn" >Proceed to place order</a>
                        </div>
                        <!-- products table end -->

    </div>
</section>

<script>
    // Get all quantity buttons and their related elements
const decreaseButtons = document.querySelectorAll('.decrease-btn');
const quantityButtons = document.querySelectorAll('.quantity-btn');
const increaseButtons = document.querySelectorAll('.increase-btn');
const placeOrderBtn = document.getElementById('checkout-btn');

// Function to send AJAX request to update quantity in the database
function updateQuantity(productName, quantity) {
    fetch('dashboard/update-quantity', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-Requested-With': 'XMLHttpRequest' // Indicate it's an AJAX request
        },
        body: JSON.stringify({ product_name: productName, quantity: quantity })
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            console.log('Quantity updated successfully');
        } else {
            console.error('Error updating quantity:', data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

// Add event listeners to handle quantity changes
decreaseButtons.forEach((button, index) => {
    button.addEventListener('click', () => {
        // Decrease quantity by 1 if greater than 1
        if (parseInt(quantityButtons[index].innerText) > 1) {
            quantityButtons[index].innerText = parseInt(quantityButtons[index].innerText) - 1;
            const productName = quantityButtons[index].dataset.productName; // Assuming you have data-product-name attribute
            const newQuantity = parseInt(quantityButtons[index].innerText);
            // updateQuantity(productName, newQuantity); // Update the backend
        }
    });
});

increaseButtons.forEach((button, index) => {
    button.addEventListener('click', () => {
        // Increase quantity by 1
        quantityButtons[index].innerText = parseInt(quantityButtons[index].innerText) + 1;
        const productName = quantityButtons[index].dataset.productName; // Assuming you have data-product-name attribute
        const newQuantity = parseInt(quantityButtons[index].innerText);
        // updateQuantity(productName, newQuantity); // Update the backend
    });
});


// ONCLICK EVENT LISTNER
placeOrderBtn.addEventListener("click", async ()=>{
   await updateQuantity(productName, newQuantity)
})
</script>

<?= $this->endSection(); ?>