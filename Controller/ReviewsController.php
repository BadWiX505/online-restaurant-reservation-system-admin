<?php
require 'Model/ReviewModel.php';
function displayCommentReviews()
{
   require 'View/Comments.php';
}

function displayStarsReviews()
{
   require 'View/review.php';
}


function seemoreComments()
{
   $offset = $_GET['pageN'];
   $revMan = new ReviewManager();
   $comments = $revMan->commentsList($offset);
   echo generateHTMLcomments($comments,true);
}

function seemoreConfirmedComments()
{
   $offset = $_GET['pageN'];
   $revMan = new ReviewManager();
   $comments = $revMan->ConfirmedCommentList($offset);
   echo generateHTMLcomments($comments,false);
}


function seeMoreReviews(){
    $offset = $_GET['pageN'];
    $search = $_GET['search'];
   $revMan = new ReviewManager();
   $reviews = $revMan->reviewsList($offset,$search);
   echo generateHTMLReviews($reviews);
}

function acceptCommentAction(){
    $idC = $_GET['idCom'];
    $revMan = new ReviewManager();
    if($revMan->AcceptComment($idC)){
        echo 'good';
    }
    else{
        echo 'bad';
    }
}


function deleteCommentAction(){
    $idC = $_GET['idCom'];
    $revMan = new ReviewManager();
    if($revMan->removeComment($idC)){
        echo 'good';
    }
    else{
        echo 'bad';
    }
}


function generateHTMLReviews($reviews){
    $htm = '';
    if($reviews!=null){
    foreach ($reviews as $review) {
        $htm .= '<tr>';
        $htm .= '<td>' . $review->client_F_Name . ' '.$review->client_L_Name.'</td>';
        $htm .= '<td><div class="oredrImageContainer"><img src="data:image;base64,' . base64_encode($review->clientImage) . '" alt="Client Image"></div></td>';
        $htm .= '<td>' . $review->foodName . '</td>';
        $htm .= '<td><div class="oredrImageContainer"><img src="data:image;base64,' . base64_encode($review->foodImage) . '" alt="Food Image"></div></td>';
        $htm .= '<td>';
        for($i=0;$i<$review->stars_Number;$i++) {
            $htm .= '<i class="dw dw-star"></i> ';
        }
        $htm .= '</td>';
        $htm .= '<td>' . $review->stars_Number . '</td>';
        $htm .= '</tr>';
    }
}
   return $htm;    
}

function generateHTMLcomments($comments,$choice)
{
   $html = '';
   if($comments!=null){
   foreach ($comments as $comment) {
      $imageData = "data:image/jpeg;base64," . base64_encode($comment->image); 
      $html .= '<li>
    <div class="row no-gutters">
        <div class="col-lg-4 col-md-12 col-sm-12">
            <div class="blog-img">
                <img src="' . $imageData . '" alt="" class="bg_img">
            </div>
        </div>
        <div class="col-lg-8 col-md-12 col-sm-12">
            <div class="blog-caption">
                <h4><a href="#">' . $comment->CF . ' '.$comment->CL.'</a></h4>
                <div class="blog-by">
                    <p>' . $comment->comm . '</p>
                    <div class="pt-10">
                    ';
                    if($choice)
                    $html .= '<button class="btn btn-outline-primary accept">Accept</button>';

                        $html .= '<button class="btn btn-outline-danger del">Delete</button>
                        <span class="idCo" style="display:none;">'.$comment->idCom.'</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</li>';
   }
}

   return $html;
}
