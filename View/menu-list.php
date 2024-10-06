<?php 

require 'View/Menu/Menu-list.php';
require 'View/Footer.php';

?>


<script src="Public/JS/SeeMore.js" defer></script>

<script>
    $(document).ready(() => {
        let OFFSET = {value: 0};
        let inputValue = '';
        seeMore('moreListFood', OFFSET, $('tbody'), 6 ,inputValue,'input');
        $('.seemore').on("click",()=>{
            seeMore('moreListFood', OFFSET, $('tbody'), 6,inputValue,'more');
        })

        $('.search-input').on("input",()=>{
        inputValue = $('.search-input').val(); 
        OFFSET.value=0;
        seeMore('moreListFood', OFFSET, $('tbody'),6,inputValue,'input');
         })
    });
</script>