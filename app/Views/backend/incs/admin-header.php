<?php
// Initialize variables
$username = '';
$userprofile = '';

// Check if $userdata is set and not empty
if (isset($userdata) && !empty($userdata)) {
    // Assign values if $userdata is set
    $username = isset($userdata['username']) ? $userdata['username'] : '';
    $userprofile = isset($userdata['profile']) ? $userdata['profile'] : '';
}
?>

<div class="header" style="background-color: #092241;">
			<div class="header-left">
				<div class="menu-icon bi bi-list text-white"></div>
				<div
					class="search-toggle-icon bi bi-search"
					data-toggle="header_search"
				></div>
				
			</div>
			<div class="header-right">
				<div class="dashboard-setting user-notification">
					<div class="dropdown">
						<a
							class="dropdown-toggle no-arrow"
							href="javascript:;"
							data-toggle="right-sidebar"
						>
							<i class="dw dw-settings2 text-white"></i>
						</a>
					</div>
				</div>
	
				<div class="user-info-dropdown mt-2">
					<div class="dropdown text-white">
						<a
							class="dropdown-toggle text-white"
							href="#"
							role="button"
							data-toggle="dropdown"
						>
							<!-- <img src="public/backend/vendors/images/person.svg" alt=""> -->
							Dennis Murimi
							<span class="user-name mt-2"></span>
						</a>
						<div
							class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
						>
							<a class="dropdown-item" href="<?= base_url().'admindashboard/logout';?>"
								><i class="dw dw-logout"></i> Log Out</a
							>
						</div>
					</div>
				</div>
			</div>
		</div>