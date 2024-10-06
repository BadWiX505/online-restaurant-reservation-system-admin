<link rel="stylesheet" type="text/css" href="Public/vendors/styles/core.css">
<link rel="stylesheet" type="text/css" href="Public/vendors/styles/icon-font.min.css">
<link rel="stylesheet" type="text/css" href="Public/vendors/styles/style.css">
<link rel="stylesheet" type="text/css" href="Public/plugins/jquery-steps/jquery.steps.css">
<link rel="stylesheet" type="text/css" href="Public/plugins/sweetalert2/sweetalert2.css">





<?php require 'View/main.php'; ?>

<div class="main-container">
	<div class="pd-ltr-20 xs-pd-20-10">
		<div class="min-height-200px">
			<div class="page-header">
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<div class="title">
							<h4>Menu-Add</h4>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.html">Menu</a></li>
								<li class="breadcrumb-item active" aria-current="page">Menu-Add</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>

			<div class="pd-20 card-box mb-30">
				<div class="clearfix">
					<h4 class="text-blue h4">Steps for adding menu</h4>
					<p class="mb-30">Add new menu</p>
				</div>
				<div class="wizard-content">
					<form class="tab-wizard wizard-circle wizard vertical" action="index.php?action=add-menu" method="post" enctype="multipart/form-data">

						<h5>Main Info</h5>
						<section>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Food Name :</label>
										<input type="text" class="form-control" name="foodName">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Price :</label>
										<input type="text" class="form-control" placeholder="Price in $" name="price">
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Description</label>
									<textarea class="form-control" name="food_description"></textarea>
								</div>
							</div>
						</section>
						<!-- Step 2 -->
						<h5>Categories</h5>
						<section>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Meal time :</label>
										<select class="form-control" id="mealTime" name="id_mealTime">
											<option value="Breakfast">Breakfast</option>
											<option value="Lunch">Lunch</option>
											<option value="Snack">Snack</option>
											<option value="Dinner">Dinner</option>
											<option value="Beverages">Beverages</option>
											<option value="Desserts">Desserts</option>
										</select>
									</div>

									<div class="form-group">
										<label>Categorie :</label>
										<select class="form-control" name="id_categorie">
											<option value="Meat">Meat</option>
											<option value="SEAFOOD">Seafood</option>
											<option value="Vegetables">Vegetables</option>
											<option value="Fruits">Fruits</option>
											<option value="Grains">Grains</option>
											<option value="Dairy">Dairy</option>
											<option value="Legumes">Legumes</option>
											<option value="Seeds">Seeds</option>
											<option value="Fats">Fats</option>
											<option value="Desserts">Desserts</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Sub categorie :</label>
										<select class="form-control" id="subCategorie" name="id_Subcategorie">
											<option value="Eggs & Omelettes">Eggs & Omelettes</option>
											<option value="Pancakes & Waffles">Pancakes & Waffles</option>
											<option value="Healthy Start">Healthy Start</option>
											<option value="Bakery Delights">Bakery Delights</option>
										</select>
									</div>

								</div>

							</div>
						</section>
						<!-- Step 3 -->

						<h5>Food image</h5>
						<section>
							<div class="form-group">
								<label>Select an Image</label>
								<div class="custom-file">
									<input type="file" class="custom-file-input" name="image" accept="image/*">
									<label class="custom-file-label">Choose file</label>
								</div>
							</div>
							<div>
							</div>
						</section>

					</form>
				</div>
			</div>

		</div>
	</div>
</div>
<button type="button" class="btn mb-20 btn-primary btn-block" id="sa-error" style="display: none;">Click me</button>
<button type="button" class="btn mb-20 btn-primary btn-block success" data-title="Added successfully" id="sa-custom-position" style="display: none;">Click me</button>


<script src="Public/JS/add-menu.js" defer></script>

<script>
	$(document).on("click", 'a[href="#finish"]', (event) => {
		addMenu();
	});
</script>


<script src="Public/plugins/sweetalert2/sweetalert2.all.js"></script>
<script src="Public/plugins/sweetalert2/sweet-alert.init.js"></script>