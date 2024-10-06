<?php

require 'View/Reservations/manage-Reservations.php';
require 'View/Footer.php';

?>

<script src="Public/JS/SeeMore.js" defer></script>
<script src="Public/JS/confCanc.js" defer></script>

<script>
    $(document).ready(() => {
        let OFFSET = {
            value: 0
        };
        let inputValue = '';

        seeMore('moreReservation', OFFSET, $('.resBODY'), 6,inputValue,'input');
        $('.seemore').on("click", () => {
            seeMore('moreReservation', OFFSET, $('.resBODY'), 6 ,inputValue,'more');
        })

        $('.search-input').on("input",()=>{
        inputValue = $('.search-input').val(); 
        OFFSET.value=0;
        seeMore('moreReservation', OFFSET, $('.resBODY'),6,inputValue,'input');
         })

        $(document).on("click", ".ordersBtn", function(event) {
            var clickedButton = $(event.currentTarget);
            var row = clickedButton.closest('tr');

            var idColumn = row.find('td:first-child');

            var idValue = idColumn.text().trim();

            Orders('Orders', $('.ordersBody'), idValue);

            var targetElement = $('#ordersTable');
            $('html, body').animate({
                scrollTop: targetElement.offset().top
            }, 800);
        });
    });
</script>