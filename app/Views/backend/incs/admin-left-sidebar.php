<div class="left-side-bar" style="background-color:#092241;">
			<div class="brand-logo">
			<a href="index.html">
					<!-- <img src="<?= base_url() ;?>/public/backend/vendors/images/satelite.png" alt="" class="img-fluid img-thumbnail "/>	 -->
					<h5 class="text-primary">Leave System</h5></p>
					
				</a>
				<div class="close-sidebar" data-toggle="left-sidebar-close">
					<i class="ion-close-round"></i>
				</div>	
			</div>
			<div class="menu-block customscroll">
				<div class="sidebar-menu" >
					<ul id="accordion-menu">
						<li>
							<a href="<?= base_url().'admindashboard/'?>" class="dropdown-toggle no-arrow">
							<span class="micon bi bi-speedometer"></span>
								<span class="mtext">Dashboard</span>
							</a>
						</li>
						<li>
							<a href="<?= base_url().'admindashboard/employees'?>" class="dropdown-toggle no-arrow">
								<span class="micon bi bi-people-fill"></span
								><span class="mtext">Employee Section</span>
							</a>
						</li>
						<li>
							<a href="<?= base_url().'admindashboard/admin-suppliers'?>" class="dropdown-toggle no-arrow">
								<span class="micon bi bi-people"></span>
								<span class="mtext">Suppliers</span>
							</a>
						</li>
                        <li>
							<a href="<?= base_url().'admindashboard/admin-products'?>" class="dropdown-toggle no-arrow">
								<span class="micon bi bi-boxes"></span>
								<span class="mtext">Products</span>
							</a>
						</li>
						<li>
							<a href="<?= base_url().'admindashboard/admin-categories'?>" class="dropdown-toggle no-arrow">
								<span class="micon bi bi-stack"></span>
								<span class="mtext">Categories</span>
							</a>
						</li>

						<li>
							<a href="<?= base_url().'admindashboard/admin'?>" class="dropdown-toggle no-arrow">
								<span class="micon bi bi-people-fill"></span
								><span class="mtext">Admin Section</span>
							</a>
						</li>

						<li class="dropdown">
							<a href="javascript:;" class="dropdown-toggle">
								<span class="micon bi bi-gear"></span
								><span class="mtext">Settings</span>
							</a>
							<ul class="submenu">
								<li><a href="<?= base_url().'admindashboard/admin-change-password'?>">Change Password</a></li>
								<li><a href="<?= base_url().'admindashboard/update-admin'?>">Edit Profile</a></li>		
							</ul>
						</li>
				
					</ul>
				</div>
			</div>
		</div>