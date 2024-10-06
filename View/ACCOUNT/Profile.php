<link rel="stylesheet" type="text/css" href="Public/vendors/styles/core.css">
<link rel="stylesheet" type="text/css" href="Public/vendors/styles/icon-font.min.css">
<link rel="stylesheet" type="text/css" href="Public/vendors/styles/style.css">
<link rel="stylesheet" type="text/css" href="Public/plugins/fancybox/dist/jquery.fancybox.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>




<?php require 'View/main.php'; ?>
<style>
    a {
        padding: 7px 10px;
    }
</style>
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="title">
                            <h4>Profile</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Profile</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
                    <div class="pd-20 card-box height-100-p">
                        <div class="profile-photo">
                            <a data-toggle="modal" data-target="#modal" class="edit-avatar" style="cursor: pointer;"><i class="fa fa-pencil"></i></a>
                            <img src="<?php echo 'data:image;base64,' . base64_encode($infos->Image) .''?>"  alt="" class="avatar-photo" width="130px" height="130px"  style="border-radius: 50%;">

                        </div>
                        <h5 class="text-center h5 mb-0"> <?php echo   $infos->Admin_Full_Name; ?>
                        </h5>
                        <p class="text-center text-muted font-14">Welcome to your profile</p>
                        <div class="profile-info">
                            <h5 class="mb-20 h5 text-blue">Contact Information</h5>
                            <ul>
                                <li>
                                    <span>Admin Full Name:</span>
                                    <?php echo   $infos->Admin_Full_Name; ?>
                                </li>
                                <li>
                                    <span>Email Address:</span>
                                    <?php echo $infos->Email; ?>
                                </li>

                                <li>
                                    <span>Date of joining</span>
                                    <?php echo   $infos->Action_Date; ?>
                                </li>

                            </ul>
                        </div>


                    </div>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
                    <div class="card-box height-100-p overflow-hidden">
                        <div class="profile-tab height-100-p">
                            <div class="tab height-100-p">
                                <ul class="nav nav-tabs customtab" role="tablist">

                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#setting" role="tab">Settings</a>
                                    </li>
                                </ul>
                                <div class="tab-content">

                                    <!-- Setting Tab start -->
                                    <div class="tab-pane fade height-100-p" id="setting" role="tabpanel">
                                        <div class="profile-setting">
                                            <form>
                                                <ul class="profile-edit-list row">
                                                    <li class="weight-500 col-md-6">
                                                        <h4 class="text-blue h5 mb-20">Edit Your Personal Setting</h4>
                                                        <div class="form-group">
                                                            <label>Full Name</label>
                                                            <input class="form-control form-control-lg" type="text" name='adminName' value="<?php echo   $infos->Admin_Full_Name; ?>">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Old password</label>
                                                            <input class="form-control form-control-lg" type="password" name="oldPass">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>New Password</label>
                                                            <input class="form-control form-control-lg" type="password" name="pass">
                                                        </div>
                                                        <input type="file" name="image" style="display: none;" id="fileinput" accept="image/*" >

                                                        <div class="form-group mb-0">
                                                            <input type="submit" class="btn btn-primary" value="Update Information" style="color: white;">
                                                        </div>
                                                    </li>

                                                </ul>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- Setting Tab End -->
                                </div>
                                <button type="button" class="btn mb-20 btn-primary btn-block success" data-title="Updated successfully" id="sa-custom-position" style="display: none;">Click me</button>
                                 <button type="button" class="btn mb-20 btn-primary btn-block" id="sa-error"  style="display: none;">Click me</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- js -->
<script src="Public/JS/Profile.js"></script>
<script src="Public/JS/profileAjax.js"></script>

<script src="Public/plugins/sweetalert2/sweetalert2.all.js"></script>
<script src="Public/plugins/sweetalert2/sweet-alert.init.js"></script>