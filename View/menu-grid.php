<?php 

require 'View/Menu/Menu-grid.php';
require 'View/Footer.php';

?>


<script src="Public/JS/SeeMore.js" defer></script>

<script>
    $(document).ready(() => {
        let OFFSET = {value: 0};
        let inputValue = '';
        seeMore('moreGridMenu', OFFSET, $('.clearfix'), 8,inputValue,'input');
        $('.seemore').on("click",()=>{
            seeMore('moreGridMenu', OFFSET, $('.clearfix'), 8,inputValue,'more');
        })


         $('.search-input').on("input",()=>{
        inputValue = $('.search-input').val(); 
        OFFSET.value=0;
        seeMore('moreGridMenu',OFFSET, $('.clearfix'), 8,inputValue,'input');
        console.log(inputValue);
        
         })


    });

   



</script>
