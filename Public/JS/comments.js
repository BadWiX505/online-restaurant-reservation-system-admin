
function acceptComment(action,idC,container){
    $.ajax({
        url: "index.php?action="+action, // URL of the PHP script to load gallery items
        type: "GET",
        dataType: "text",
        data: {
            idCom: idC 
        },
        success: function (response) {
            console.log(response);
            if ( response == 'good'){
            container.remove();         
           }
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
            window.location.href = "index.php?action=err";
        }
    });
}