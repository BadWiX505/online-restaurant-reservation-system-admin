<link rel="stylesheet" type="text/css" href="Public/vendors/styles/core.css">
<link rel="stylesheet" type="text/css" href="Public/vendors/styles/icon-font.min.css">
<link rel="stylesheet" type="text/css" href="Public/vendors/styles/style.css">


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
									<li class="breadcrumb-item active" aria-current="page">Chefs Grid</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<div class="product-wrap">
					<div class="product-list">
						<ul class="row chefGrid">
							<?php foreach($chefs as $chef) : ?>
							<li class="col-lg-4 col-md-6 col-sm-12">
								<div class="product-box">
									<div class="producct-img"><img src="<?php echo 'data:image;base64,' . base64_encode($chef->getImage()) .''?>" alt=""></div>
									<div class="product-caption">
										<h4><a href="#"><?php echo $chef->getChefFullName(); ?></a></h4>
										<div class="price">
                                             <?php echo $chef->getLevel();?>
										</div>
										<a href="index.php?action=edit-chef&idC=<?php echo $chef->getIdChef(); ?>" class="btn btn-outline-primary">Edit</a>
                                        <a class='btn btn-outline-danger delCBtn' onclick="deleteChef(<?php echo $chef->getIdChef(); ?>,this)">Delete</a>
									</div>
								</div>
							</li>
							<?php endforeach; ?>
							<button type="button" class="btn mb-20 btn-primary btn-block success" data-title="Added successfully" id="sa-custom-position" style="display: none;">Click me</button>
                            <button type="button" class="btn mb-20 btn-primary btn-block" id="sa-error"  style="display: none;">Click me</button>

						</div>
					</div>
				</div>
			</div>
        </div>
