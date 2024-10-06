function confCanc(idRE,action){
    $.ajax({
        url: "index.php?action="+action, // URL of the PHP script to load gallery items
        type: "GET",
        dataType: "text",
        data: {
            idR:idRE  // Pass page number as data
        },
        success: function (response) {
            response = response.replace(/\s+/g, '');
                if(response=='good'){
                    $('.success').click();
                    location.reload();
                } else {
                    $('#sa-error').click();
                    console.log(response)
                }        
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
            window.location.href = "index.php?action=err";
        }
    });
}


$(document).ready(()=>{
    $(document).on("click", ".confBtn", function(event) {
        var clickedButton = $(event.currentTarget);
        var row = clickedButton.closest('tr');

        var idColumn = row.find('td:first-child');

        var idValue = idColumn.text().trim();
        confCanc(idValue,'confirmRes');
    });


    $(document).on("click", ".cancBTN", function(event) {
        var clickedButton = $(event.currentTarget);
        var row = clickedButton.closest('tr');

        var idColumn = row.find('td:first-child');

        var idValue = idColumn.text().trim();
        confCanc(idValue,'cancelRes');
    });
})