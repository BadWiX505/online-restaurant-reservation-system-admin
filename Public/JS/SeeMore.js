


 function seeMore(action,offset,container,step,query,queryMode){
    $.ajax({
        url: "index.php?action="+action, // URL of the PHP script to load gallery items
        type: "GET",
        dataType: "html",
        data: {
            pageN: offset.value,
            search : query  ,
        },
        success: function (response) {
            if (response && response!== ''){
                if(queryMode==='more')
                $(container).append(response);
                 else{
                 $(container).html(response);
                 }
                
                offset.value += step;
            }
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
            window.location.href = "index.php?action=err";
        }
    });
}


function Orders(action,container,idRE){
    $.ajax({
        url: "index.php?action="+action, // URL of the PHP script to load gallery items
        type: "GET",
        dataType: "html",
        data: {
            idR:idRE  // Pass page number as data
        },
        success: function (response) {
            if (response && response!== ''){
                $(container).html(response);
            }
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
            window.location.href = "index.php?action=err";
        }
    });
}