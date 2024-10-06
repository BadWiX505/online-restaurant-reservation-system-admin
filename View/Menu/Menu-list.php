<link rel="stylesheet" type="text/css" href="Public/vendors/styles/core.css">
<link rel="stylesheet" type="text/css" href="Public/vendors/styles/icon-font.min.css">
<link rel="stylesheet" type="text/css" href="Public/vendors/styles/style.css">


<?php require 'View/main.php'; ?>
<style>
    .oredrImageContainer{
        width: 70px;
        height: 70px;
    }
    .oredrImageContainer  img{
        width: 100%;
        height: 100%;
        object-fit: fill;
        border-radius: 50%;
    }
</style>
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="title">
                            <h4>Menu-List</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Menu</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Menu-List</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="header-search mb-3">
                <input type="text" class="form-control search-input" placeholder="Search Here">
            </div>

            <div class="pd-20 card-box mb-30">
                <div class="clearfix mb-20">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Menu table</h4>
                    </div>
                </div>


                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Food Name</th>
                                <th>Price</th>
                                <th>Is In Promo</th>
                                <th>Is Available</th>
                                <th>Action Date</th>
                                <th>Categorie</th>
                                <th>Meal Time</th>
                                <th>Subcategorie</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                            </table>
                    <div class="row justify-content-center">
                        <div class="col-auto">
                            <button type="button" class="btn btn-outline-warning mb-3 seemore">See more</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>