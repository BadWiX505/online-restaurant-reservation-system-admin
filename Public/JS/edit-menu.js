function EditMenu(){
    var formData = new FormData($('form')[0]);

    $.ajax({
        url: "index.php?action=editMenu", // URL of the PHP script to load food items
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
 let OriginalPrice = $('#price').val();
 promodisplay();

    function promodisplay(){
        if($('#promotion').val()==='true'){
            $('#NP').show();
            $('#promC').show();
        }
        else{
            $('#NP').hide();
            $('#promC').hide();
        }
    }

    $('#promotion').change(function () {
        promodisplay();
    });


    $('#price').on('input', function() {
        $('#demo1').trigger('input'); 
    });



    $('#demo1').on('input', function() {
        np = OriginalPrice-(OriginalPrice*($(this).val()/100))
        $('#np').val(np);
    });
   
    $('form').on("submit", function(e) {
        e.preventDefault();
        EditMenu();
    });
    $('#demo1').trigger('input');


})