
function addMenu(){
    var formData = new FormData($('form')[0]);

    $.ajax({
        url: "index.php?action=add-menu-action", // URL of the PHP script to load food items
        type: "POST",
        dataType: "text",
        data: formData, // Directly pass formData
        processData: false, // Important: prevent jQuery from processing the data
        contentType: false, // Important: let jQuery set the contentType
        success: function (response) {
            console.log(response)
            response = response.replace(/\s+/g, '');
            if ( response == 'good') {
                $('.success').click();
                console.log(response);
            } else {
                $('#sa-error').click();
            }
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
            window.location.href = "index.php?action=err";
        }
    });
}



$(document).ready(function () {
    $('#mealTime').change(function () {
        var selectedOption = $(this).val();
        switch (selectedOption) {
            case 'Breakfast': $('#subCategorie').html(
                `<option value="Eggs & Omelettes">Eggs & Omelettes</option>
            <option value="Pancakes & Waffles">Pancakes & Waffles</option>
            <option value="Healthy Start">Healthy Start</option>
            <option value="Bakery Delights">Bakery Delights</option>`
            ); break;

            case 'Lunch':
                $('#subCategorie').html(
                    `<option value="Starters & Appetizers">Starters & Appetizers</option>
                <option value="Salads & Bowls">Salads & Bowls</option>
                <option value="Sandwiches & Wraps">Sandwiches & Wraps</option>
                <option value="Main Courses">Main Courses</option>`
                );
                break;

            case 'Snack':
                $('#subCategorie').html(
                    `<option value="Finger Foods">Finger Foods</option>
                    <option value="Healthy Bites">Healthy Bites</option>
                    <option value="Quick Snacks">Quick Snacks</option>
                    <option value="Dips & Salsas">Dips & Salsas</option>`
                );
                break;

            case 'Dinner':
                $('#subCategorie').html(
                    `<option value="Soups & Starters">Soups & Starters</option>
                        <option value="Pasta & Risotto">Pasta & Risotto</option>
                        <option value="Grilled Specialties">Grilled Specialties</option>
                        <option value="Chef's Specials">Chef's Specials</option>`
                );
                break;
                
            case 'Beverages':
                $('#subCategorie').html(
                    `<option value="Refreshing Juices">Refreshing Juices</option>
                        <option value="Smoothies">Smoothies</option>
                        <option value="Mocktails">Mocktails</option>
                        <option value="Hot and Cold Beverages">Hot and Cold Beverages</option>`
                );
                break;

            case 'Desserts':
                $('#subCategorie').html(
                    `<option value="Indulgent Treats">Indulgent Treats</option>
                        <option value="Ice Creams & Sorbets">Ice Creams & Sorbets</option>
                        <option value="Chef's Dessert Creations">Chef's Dessert Creations</option>`
                );
                break;


        }
    });

        $('#mealTime').trigger('change');

      
});