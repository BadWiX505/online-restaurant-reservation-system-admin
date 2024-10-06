<link rel="stylesheet" type="text/css" href="Public/vendors/styles/core.css">
<link rel="stylesheet" type="text/css" href="Public/vendors/styles/icon-font.min.css">
<link rel="stylesheet" type="text/css" href="Public/vendors/styles/style.css">
<link rel="stylesheet" type="text/css" href="Public/plugins/switchery/switchery.min.css">
<link rel="stylesheet" type="text/css" href="Public/plugins/jquery-steps/jquery.steps.css">
<link rel="stylesheet" type="text/css" href="Public/plugins/sweetalert2/sweetalert2.css">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>




<?php require 'View/main.php'; ?>
<style>
    img {
        max-height: 200px;
    }
</style>


<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="title">
                            <h4>Menu</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Menu</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Menu-Edit</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>


            <div class="row clearfix">
                <div class="col-lg-3 col-md-6 col-sm-12 mb-30 mx-auto"> <!-- Added mx-auto class -->
                    <div class="card card-box">
                        <img class="card-img-top" src="<?php echo "data:image;base64," . base64_encode($foode->Image); ?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title weight-500"><?= $foode->foodName ?></h5>

                        </div>
                    </div>
                </div>
            </div>




            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <h4 class="text-blue h4">Steps for editing menu</h4>
                    <p class="mb-30">Edit menu</p>
                </div>
                <div class="wizard-content">

                    <form>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Food name : </label>
                            <div class="col-sm-12 col-md-10">
                                <input type="hidden" name="idFood" value="<?= $foode->idFood ?>">
                                <input class="form-control" type="text" placeholder="Food" name="foodName" value="<?= $foode->foodName ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Price : </label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" placeholder="Price" id="price"  name="price"  value="<?= $foode->price ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Description</label>
                            <div class="col-sm-12 col-md-10">
                                <textarea class="form-control" name="food_description"><?php echo $foode->food_description ?></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Meal Time</label>
                            <div class="col-sm-12 col-md-10">
                                <select class="custom-select col-12" id="mealTime" name="mealtime_name">
                                    <option value="Breakfast" <?php if ($foode->mealtime_name == "Breakfast") echo "selected"; ?>>Breakfast</option>
                                    <option value="Lunch" <?php if ($foode->mealtime_name == "Lunch") echo "selected"; ?>>Lunch</option>
                                    <option value="Snack" <?php if ($foode->mealtime_name == "Snack") echo "selected"; ?>>Snack</option>
                                    <option value="Dinner" <?php if ($foode->mealtime_name == "Dinner") echo "selected"; ?>>Dinner</option>
                                    <option value="Beverages" <?php if ($foode->mealtime_name == "Beverages") echo "selected"; ?>>Beverages</option>
                                    <option value="Desserts" <?php if ($foode->mealtime_name == "Desserts") echo "selected"; ?>>Desserts</option>
                                </select>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Sub categorie</label>
                            <div class="col-sm-12 col-md-10">
                                <select class="custom-select col-12" id="subCategorie" name="subCategorie_name">
                                    <option value="Eggs & Omelettes">Eggs & Omelettes</option>
                                    <option value="Pancakes & Waffles">Pancakes & Waffles</option>
                                    <option value="Healthy Start">Healthy Start</option>
                                    <option value="Bakery Delights">Bakery Delights</option>
                                </select>


                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Categorie</label>
                            <div class="col-sm-12 col-md-10">
                                <select class="custom-select col-12" value="<?= $foode->categorie_name ?>" name="categorie_name">
                                    <option value="meat" <?php if ($foode->categorie_name == "meat") echo "selected"; ?>>Meat</option>
                                    <option value="SEAFOOD" <?php if ($foode->categorie_name == "SEAFOOD") echo "selected"; ?>>Seafood</option>
                                    <option value="Vegetables" <?php if ($foode->categorie_name == "Vegetables") echo "selected"; ?>>Vegetables</option>
                                    <option value="Fruits" <?php if ($foode->categorie_name == "Fruits") echo "selected"; ?>>Fruits</option>
                                    <option value="Grains" <?php if ($foode->categorie_name == "Grains") echo "selected"; ?>>Grains</option>
                                    <option value="Dairy" <?php if ($foode->categorie_name == "Dairy") echo "selected"; ?>>Dairy</option>
                                    <option value="Legumes" <?php if ($foode->categorie_name == "Legumes") echo "selected"; ?>>Legumes</option>
                                    <option value="Seeds" <?php if ($foode->categorie_name == "Seeds") echo "selected"; ?>>Seeds</option>
                                    <option value="Fats" <?php if ($foode->categorie_name == "Fats") echo "selected"; ?>>Fats</option>
                                    <option value="Desserts" <?php if ($foode->categorie_name == "Desserts") echo "selected"; ?>>Desserts</option>

                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">isAvailable</label>
                            <div class="col-sm-12 col-md-10">
                                <select class="custom-select col-12" id="available" name="isAvailable">
                                    <option value="true" <?php if ($foode->isAvailable) echo "selected"; ?>>Yes</option>
                                    <option value="false" <?php if (!$foode->isAvailable) echo "selected"; ?>>No</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Food Image</label>
                            <div class="col-sm-12 col-md-10">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" accept="image/*" name="image">
                                    <label class="custom-file-label">Choose file</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">isPromotion</label>
                            <div class="col-sm-12 col-md-10">
                                <select class="custom-select col-12" id="promotion" name="isInPromotion">
                                    <option value="true" <?php if ($foode->isInPromo) echo "selected"; ?>>Yes</option>
                                    <option value="false" <?php if (!$foode->isInPromo) echo "selected"; ?>>No</option>

                                </select>
                            </div>

                        </div>

                        <div class="form-group row" id="promC">
                            <label class="col-sm-12 col-md-2 col-form-label">Discount in %</label>
                            <div class="col-sm-12 col-md-10">
                                <input id="demo1" type="text" class="form-control" name="discount" value="<?=$foode->discount?>">
                            </div>
                        </div>
           

                        <div class="form-group row" id="NP">
                            <label class="col-sm-12 col-md-2 col-form-label">New price </label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" placeholder="New price" readonly id="np" name="newPrice">
                            </div>
                        </div>

                        <div class="container">
                            <div class="row justify-content-end">
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary" style="color: white;" class="subBtn">Save changes</button>
                                </div>
                            </div>
                        </div>


                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

<button type="button" class="btn mb-20 btn-primary btn-block" id="sa-error" style="display: none;">Click me</button>
<button type="button" class="btn mb-20 btn-primary btn-block success" data-title="Updated successfully" id="sa-custom-position" style="display: none;">Click me</button>


<script src="Public/plugins/switchery/switchery.min.js"></script>
<script src="Public/vendors/scripts/advanced-components.js"></script>

<script src="Public/JS/add-menu.js"></script>
<script src="Public/JS/edit-menu.js"></script>


<script src="Public/plugins/sweetalert2/sweetalert2.all.js"></script>
<script src="Public/plugins/sweetalert2/sweet-alert.init.js"></script>