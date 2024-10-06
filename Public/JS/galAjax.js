let page = 0;


function addToGallery() {
    var formData = new FormData($('form')[0]);

    $.ajax({
        url: "index.php?action=insertGall", // URL of the PHP script to load food items
        type: "POST",
        dataType: "text",
        data: formData, // Directly pass formData
        processData: false, // Important: prevent jQuery from processing the data
        contentType: false, // Important: let jQuery set the contentType
        success: function (response) {
            console.log(response)
            if (response === 'good') {
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


function getGalleries() {
    $.ajax({
        url: "index.php?action=showGall", // URL of the PHP script to load gallery items
        type: "GET",
        dataType: "html",
        data: {
            pageN: page // Pass page number as data
        },
        success: function (response) {
            $('.galList').append(response);
            if (response != '')
                page += 6;
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
            window.location.href = "index.php?action=err";
        }
    });

}


function deleteGallery(id,liElement) {
    $.ajax({
        url: "index.php?action=delGal", // URL of the PHP script to load gallery items
        type: "GET",
        dataType: "text",
        data: {
            idGal: id // Pass page number as data
        },
        success: function (response) {
            if (response != 'good') {
                $('#sa-error').click();
            }
            else {
                liElement.remove();
            }

        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
            window.location.href = "index.php?action=err";
        }
    });

}




$(document).ready(function () {
    getGalleries();
    // Bind click event to all input[type="submit"] elements
    $('input[type="submit"]').on("click", function (e) {
        e.preventDefault(); // Prevent default form submission
        addToGallery(); // Call the addToGallery function
    });

    $('.seemore').on("click", function (e) {
        getGalleries();
    });


});


$(document).on("click", ".delGall", (event) => {
    id = $(event.currentTarget).data('idg');
    var liElement = $(event.currentTarget).closest('.ele');
   deleteGallery(id,liElement)
});