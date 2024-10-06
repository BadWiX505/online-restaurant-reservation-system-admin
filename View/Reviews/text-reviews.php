<link rel="stylesheet" type="text/css" href="Public/vendors/styles/core.css">
<link rel="stylesheet" type="text/css" href="Public/vendors/styles/icon-font.min.css">
<link rel="stylesheet" type="text/css" href="Public/vendors/styles/style.css">


<?php require 'View/main.php'; ?>
<style>
    .card-box{
        position: fixed;
        top: 50%;
        left: 80%;
        transform: translateY(-50%);
    }
</style>

<div class="main-container">
    <div class="pd-ltr-20 height-100-p xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="title">
                            <h4>Reviews</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Reviews</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Comments</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="blog-wrap">
                <div class="container pd-0">
                    <div class="row">
                        <div class="col-md-8 col-sm-12">
                            <div class="blog-list">
                                <ul id="commenstCont">
                                  
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
                <div class="card-box mb-30">
        <h5 class="pd-20 h5 mb-0">Status</h5>
        <div class="list-group">
            <a href="#" class="list-group-item d-flex align-items-center justify-content-between accepted">Accepted</a>
            <a href="#" class="list-group-item d-flex align-items-center justify-content-between pending">Pending </a>
           </div>
    </div>
            </div>

            
        </div>

        
    </div>

   
</div>