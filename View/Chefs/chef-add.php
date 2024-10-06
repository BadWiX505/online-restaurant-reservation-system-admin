<link rel="stylesheet" type="text/css" href="Public/vendors/styles/core.css">
<link rel="stylesheet" type="text/css" href="Public/vendors/styles/icon-font.min.css">
<link rel="stylesheet" type="text/css" href="Public/vendors/styles/style.css">
<link rel="stylesheet" type="text/css" href="Public/plugins/jquery-steps/jquery.steps.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>




<?php require 'View/main.php'; ?>

<div class="main-container">
	<div class="pd-ltr-20 xs-pd-20-10">
		<div class="min-height-200px">
			<div class="page-header">
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<div class="title">
							<h4>Chefs</h4>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.html">Chefs</a></li>
								<li class="breadcrumb-item active" aria-current="page">Add Chefs</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>

			<div class="pd-20 card-box mb-30">
				<div class="clearfix">
					<h4 class="text-blue h4">Steps for adding chef</h4>
					<p class="mb-30">Add new chef</p>
				</div>
				<div class="wizard-content">
					<form class="tab-wizard wizard-circle wizard vertical">
						<h5>Main Info</h5>
						<section>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Full name :</label>
										<input type="text" class="form-control" name="chefName">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Level :</label>
										<select class="form-control" id="Cheflevel"  name="chefLevel">
											<option value="Beginner Chef" selected>Beginner Chef</option>
											<option value="Intermediate Chef">Intermediate Chef</option>
											<option value="Advanced Chef">Advanced Chef</option>
											<option value="Master Chef">Master Chef</option>
										</select>
									</div>
								</div>
							</div>



						</section>
						<!-- Step 2 -->
						<h5>Social info</h5>
						<section>
						<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>instagram :</label>
										<input type="url" class="form-control" name="chefIg">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>facebook :</label>
										<input type="url" class="form-control"  name="chefFb">
									</div>
								</div>
						</div>

						<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>linkdin :</label>
										<input type="url" class="form-control" name="chefIn" >
									</div>
								</div>
						</div>
						</section>
						<!-- Step 3 -->

						<h5>Chef image</h5>
						<section>
							<div class="form-group">
								<label>Select an Image</label>
								<div class="custom-file">
									<input type="file" class="custom-file-input" accept="image/*" name="chefImage">
									<label class="custom-file-label">Choose file</label>
								</div>
							</div>
						</section>
					</form>
				</div>
			</div>

			<button type="button" class="btn mb-20 btn-primary btn-block" id="sa-error" style="display: none;">Click me</button>
                    <button type="button" class="btn mb-20 btn-primary btn-block success" data-title="Added successfully" id="sa-custom-position" style="display: none;">Click me</button>

		</div>
	</div>
</div>

<script src="Public/JS/add-chef.js"></script>
<script>
	$(document).on("click", 'a[href="#finish"]', (event) => {
		addChef();
	});
</script>

<script src="Public/plugins/sweetalert2/sweetalert2.all.js"></script>
<script src="Public/plugins/sweetalert2/sweet-alert.init.js"></script>

