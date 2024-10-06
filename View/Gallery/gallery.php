<link rel="stylesheet" type="text/css" href="Public/vendors/styles/core.css">
<link rel="stylesheet" type="text/css" href="Public/vendors/styles/icon-font.min.css">
<link rel="stylesheet" type="text/css" href="Public/vendors/styles/style.css">
<link rel="stylesheet" type="text/css" href="Public/plugins/fancybox/dist/jquery.fancybox.css">
<link rel="stylesheet" type="text/css" href="Public/plugins/sweetalert2/sweetalert2.css">



<?php require 'View/main.php'; ?>
<style>
    a {
        padding: 10px 10px;
    }
</style>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="title">
                            <h4>Gallery</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Gallery</a></li>
                                <li class="breadcrumb-item active" aria-current="page">gallery</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <h4 class="text-blue h4">Steps for Adding Image to gallery</h4>
                    <p class="mb-30">Add to Gallery</p>
                </div>
                <div class="wizard-content">
                    <form >


                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Description : </label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" placeholder="Enter Description here" name="desc">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Image : </label>
                            <div class="col-sm-12 col-md-10">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="image"  accept="image/*" >
                                    <label class="custom-file-label">Choose file</label>
                                </div>
                            </div>
                        </div>

                        <div class="container pd-0">
                            <div class="row justify-content-end">
                              
                            <div class="col-auto">
                                    <input type="submit" class="btn btn-primary" style="color: white;" value="Save">
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn mb-20 btn-primary btn-block success" data-title="Added successfully" id="sa-custom-position" style="display: none;">Click me</button>
                        <button type="button" class="btn mb-20 btn-primary btn-block" id="sa-error"  style="display: none;">Click me</button>

                    </form>
                </div>
            </div>
        </div>


        <div class="gallery-wrap">
            <ul class="row galList">
               
            </ul>
            <div class="row justify-content-center">
                <div class="col-auto">
                    <button type="button" class="btn btn-outline-warning mb-3 seemore">See more</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<!-- add sweet alert js & css in footer -->
<script src="Public/JS/galAjax.js"></script>

<script src="Public/plugins/sweetalert2/sweetalert2.all.js"></script>
	<script src="Public/plugins/sweetalert2/sweet-alert.init.js"></script>