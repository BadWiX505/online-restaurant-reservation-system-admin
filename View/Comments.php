<?php 

require 'View/Reviews/text-reviews.php';
require 'View/Footer.php';

?>
<script src="Public/JS/SeeMore.js" defer></script>
<script src="Public/JS/comments.js" defer></script>



<script>
    $(document).ready(() => {
        let ISPENDING=true;
        let OFFSET = {
            value: 0
        };
        seeMore('moreComments', OFFSET, $('#commenstCont'), 6);
        $('.seemore').on("click", () => {
            var action='moreComments';
            if(!ISPENDING){
                action='moreConfirmedComments';
            }
            seeMore(action, OFFSET, $('#commenstCont'), 6);
        })

        $(document).on("click", ".accept", function(event) {
            var clickedButton = $(event.currentTarget);
            var idCo = clickedButton.closest('li').find('.idCo').text();
           acceptComment('acceptComment',idCo,clickedButton.closest('li'));
        })

        $(document).on("click", ".del", function(event) {
            var clickedButton = $(event.currentTarget);
            var idCo = clickedButton.closest('li').find('.idCo').text();
           acceptComment('removeComment',idCo,clickedButton.closest('li'));
        })
          
        $('.accepted').on("click",(e)=>{
            ISPENDING=false;
            OFFSET.value=0;
            e.preventDefault();
            $('#commenstCont').html('');
            seeMore('moreConfirmedComments', OFFSET, $('#commenstCont'), 6);
        });

        $('.pending').on("click",(e)=>{
            ISPENDING=true;
            OFFSET.value=0;
            e.preventDefault();
            $('#commenstCont').html('');
            seeMore('moreComments', OFFSET, $('#commenstCont'), 6);
        });

        

        });
</script>