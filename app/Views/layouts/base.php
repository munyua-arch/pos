<?php 
$page_title = 'POS System';

?>
<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
		<title><?= isset($page_title) ? $page_title: 'POS System'; ?></title>

		<!-- Site favicon -->
		<link
			rel="apple-touch-icon"
			sizes="180x180"
			type="image/x-icon"
			href="<?= base_url() ;?>/public/backend/vendors/images/satellite_icon.ico"
		/>
		<link
			rel="icon"
			type="image/x-icon"
			sizes="32x32"
			href="<?= base_url() ;?>/public/backend/vendors/images/satellite_icon.ico"
		/>
		<link
			rel="icon"
			type="image/x-icon"
			sizes="16x16"
			href="<?= base_url() ;?>/public/backend/vendors/images/satellite_icon.ico"
		/>
		<!-- Boostrap 5 css links -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

		<!-- Mobile Specific Metas -->
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1, maximum-scale=1"
		/>

		<!-- Google Font -->
		<link
			href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
			rel="stylesheet"
		/>
		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="<?= base_url() ;?>/public/backend/vendors/styles/core.css" />
		<link
			rel="stylesheet"
			type="text/css"
			href="<?= base_url() ;?>/public/backend/vendors/styles/icon-font.min.css"
		/>
		<link rel="stylesheet" type="text/css" href="<?= base_url() ;?>/public/backend/vendors/styles/style.css" />

        <?= $this->renderSection('stylesheets'); ?>
	</head>
	<body>

  <?= $this->renderSection('content')?>


    <!-- js -->
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
		<script src="<?= base_url() ;?>/public/backend/vendors/scripts/core.js"></script>
		<script src="<?= base_url() ;?>/public/backend/vendors/scripts/script.min.js"></script>
		<script src="<?= base_url() ;?>/public/backend/vendors/scripts/process.js"></script>
		<script src="<?= base_url() ;?>/public/backend/vendors/scripts/layout-settings.js"></script>

  </body>
</html>