<?php 

require 'View/Reviews/stars-reviews.php';
require 'View/Footer.php';

?>
<script src="Public/JS/SeeMore.js" defer></script>

<script>
    $(document).ready(() => {
        let OFFSET = {value: 0};
        let inputValue = '';
        
        seeMore('moreRev', OFFSET, $('.starsBody'),6,inputValue,'input');

        $('.seemore').on("click",()=>{
            seeMore('moreRev', OFFSET, $('.starsBody'),6,inputValue,'more');
        })

        $('.search-input').on("input",()=>{
        inputValue = $('.search-input').val(); 
        OFFSET.value=0;
        seeMore('moreRev', OFFSET, $('.starsBody'),6,inputValue,'input');
        console.log(inputValue);
         })
    });
</script>