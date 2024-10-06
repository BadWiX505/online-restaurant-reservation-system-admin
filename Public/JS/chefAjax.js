

function deleteChef(id,btn){


    $.ajax({
        url: "index.php?action=removeChef", // URL of the PHP script to load gallery items
        type: "POST",
        dataType: "text",
        data: {
            idC:id 
        },
        success: function (response) {
            response = response.replace(/\s+/g, '');
                if(response=='good'){
                    $('.success').click();
                    $(btn).closest('li').remove();
                }      
                else{
                    $('#sa-error').click();
                } 
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
            window.location.href = "index.php?action=err";
        }
    });
}



function EditChef(){
    var formData = new FormData($('form')[0]);

    $.ajax({
        url: "index.php?action=editChef", // URL of the PHP script to load food items
        type: "POST",
        dataType: "text",
        data: formData, // Directly pass formData
        processData: false, // Important: prevent jQuery from processing the data
        contentType: false, // Important: let jQuery set the contentType
        success: function (response) {
            response = response.replace(/\s+/g, '');
            if ( response == 'good') {
                $('.success').click();
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

$('form').on("submit",e=>{
    e.preventDefault();
    EditChef();
})
