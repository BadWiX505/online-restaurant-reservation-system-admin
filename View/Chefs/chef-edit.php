<link rel="stylesheet" type="text/css" href="Public/vendors/styles/core.css">
<link rel="stylesheet" type="text/css" href="Public/vendors/styles/icon-font.min.css">
<link rel="stylesheet" type="text/css" href="Public/vendors/styles/style.css">
<link rel="stylesheet" type="text/css" href="Public/plugins/switchery/switchery.min.css">
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
                                <li class="breadcrumb-item active" aria-current="page">Chefs-Edit</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>


            <div class="product-list">
                <ul class="row justify-content-center">
                    <li class="col-lg-4 col-md-6 col-sm-12">
                        <div class="product-box">
                            <div class="producct-img"><img src="<?php echo 'data:image;base64,' . base64_encode($chef->getImage()) .''?>"  alt=""></div>
                            <div class="product-caption">
                                <h4><a href="#"><?php echo $chef->getChefFullName(); ?></a></h4>
                                <div class="price">
                                <?php echo $chef->getLevel();?>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>




            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <h4 class="text-blue h4">Steps for editing Chef</h4>
                    <p class="mb-30">Edit Chef</p>
                </div>
                <div class="wizard-content">

                    <form>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Full name : </label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" placeholder="Chef name" value="<?php echo $chef->getChefFullName(); ?>" name="chefName">
                            </div>
                        </div>
                        <input type="hidden" name="chefId" value="<?php echo $chef->getIdChef(); ?>">

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label" >Level : </label>
                            <div class="col-sm-12 col-md-10">
                                <select class="custom-select col-12" name="chefLevel">
                                    <option value="Beginner Chef" <?php echo ($chef->getLevel()=='Beginner Chef' ? 'selected' : '') ?> >Beginner Chef</option>
                                    <option value="Intermediate Chef" <?php echo ($chef->getLevel()=='Intermediate Chef' ? 'selected' : '') ?> >Intermediate Chef</option>
                                    <option value="Advanced Chef" <?php echo ($chef->getLevel()=='Advanced Chef' ? 'selected' : '') ?> >Advanced Chef</option>
                                    <option value="Master Chef" <?php echo ($chef->getLevel()=='Master Chef' ? 'selected' : '') ?> >Master Chef</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">instagram : </label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="url" placeholder="instagram" value="<?php echo $chef->getIg(); ?>" name="chefIg">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">facebook : </label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="url" placeholder="facebook" value="<?php echo $chef->getFb(); ?>" name="chefFb">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">linkedin : </label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="url" placeholder="linkedin" value="<?php echo $chef->getIn(); ?>" name="chefIn">
                            </div>
                        </div>
                        



                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Chef Image</label>
                            <div class="col-sm-12 col-md-10">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" accept="image/*" name="chefImage">
                                    <label class="custom-file-label">Choose file</label>
                                </div>
                            </div>
                        </div>


                        <div class="container">
                            <div class="row justify-content-end">
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary" style="color: white;">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <button type="button" class="btn mb-20 btn-primary btn-block" id="sa-error" style="display: none;">Click me</button>
                    <button type="button" class="btn mb-20 btn-primary btn-block success" data-title="Updated successfully" id="sa-custom-position" style="display: none;">Click me</button>

                </div>
            </div>

        </div>
    </div>
</div>

<script src="Public/plugins/switchery/switchery.min.js"></script>
<script src="Public/vendors/scripts/advanced-components.js"></script>



<script src="Public/plugins/sweetalert2/sweetalert2.all.js"></script>
<script src="Public/plugins/sweetalert2/sweet-alert.init.js"></script>
