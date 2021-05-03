<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view("includes/head"); ?>
	<?php $this->load->view("search/search_list/page_style"); ?>
</head>
<body class="fixed-top">
	

	<!--  header -->
	<?php $this->load->view("includes/header"); ?>
	<!--  #header -->

	<!-- BEGIN CONTAINER -->
	<div id="container" class="row-fluid">
		<?php $this->load->view("includes/sidebar"); ?>
		<!-- BEGIN PAGE -->  
		<div id="main-content">
			<!-- BEGIN PAGE CONTAINER-->
			<div class="container-fluid">
				<?php $this->load->view("search/search_list/breadcrubm"); ?>

				
				<?php $this->load->view("search/search_list/main_content"); ?>
				

			</div>
			<!-- END PAGE CONTAINER-->
		</div>
		<!-- END PAGE -->  
	</div>
	<!-- END CONTAINER -->


	<!--  footer -->
	<?php $this->load->view("includes/footer"); ?>
	<?php $this->load->view("search/search_list/page_script"); ?>
	<!--  #footer -->
</body>
</html>