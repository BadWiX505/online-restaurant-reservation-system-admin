

$('form').on("submit",e=>{
    e.preventDefault();
    var formData = new FormData($('form')[0]);
    $.ajax({
        url: "index.php?action=editProfile", // URL of the PHP script to load food items
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
})