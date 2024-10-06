<link rel="stylesheet" type="text/css" href="Public/vendors/styles/core.css">
<link rel="stylesheet" type="text/css" href="Public/vendors/styles/icon-font.min.css">
<link rel="stylesheet" type="text/css" href="Public/vendors/styles/style.css">
<link rel="stylesheet" type="text/css" href="Public/plugins/sweetalert2/sweetalert2.css">


<?php require 'View/main.php'; ?>
<style>
    .reBtnC,
    .reBtnF {
        color: #fff;
        border-color: transparent;
        border: none;
    }

    .reBtnC:hover {
        color: #fff;
        background-color: #28a76F;
    }

    .reBtnF:hover {
        color: #fff;
        background-color: red;
    }
    .oredrImageContainer{
        width: 120px;
        height: 120px;
    }
    .oredrImageContainer  img{
        width: 100%;
        height: 100%;
        object-fit: fill;
        border-radius: 50%;
    }
    .btnTD{
        display: grid;
        grid-template-columns: repeat(3,1fr);
        column-gap: 10px;
    }
 
</style>
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="title">
                            <h4>Reservations-List</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Reservations</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Reservations-List</li>
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
                        <h4 class="text-blue h4">Reservations</h4>
                    </div>
                </div>


                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Client Name</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Persons</th>
                                <th>Phone</th>
                                <th>Action Time</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="resBODY">
                           
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

        <div class="pd-20 card-box mb-30">
            <div class="clearfix mb-20">
                <div class="pull-left">
                    <h4 class="text-blue h4">Orders</h4>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table" id="ordersTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Food image</th>
                            <th>Food name</th>
                            <th>Qte</th>
                            <th>Total Price</th>
                        </tr>
                    </thead>
                    <tbody class="ordersBody">
                 

                 
                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
</div>
<button type="button" class="btn mb-20 btn-primary btn-block" id="sa-error" style="display: none;">Click me</button>
<button type="button" class="btn mb-20 btn-primary btn-block success" data-title="Updated successfully" id="sa-custom-position" style="display: none;">Click me</button>



<script src="Public/plugins/sweetalert2/sweetalert2.all.js"></script>
<script src="Public/plugins/sweetalert2/sweet-alert.init.js"></script>