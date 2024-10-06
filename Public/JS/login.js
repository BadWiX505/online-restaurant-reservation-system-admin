function login(username,password){
    $.ajax({
        url: "index.php?action=loginToAccount", // URL of the PHP script to load gallery items
        type: "POST",
        dataType: "text",
        data: {
            login: username,
            pass: password  // Pass page number as data
        },
        success: function (response) {
            response = response.replace(/\s+/g, '');
            if (response!='good'){
                console.log(response);
                $('#sa-error').click();
            }
            else{
                window.location.href='index.php';
            }
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
            window.location.href = "index.php?action=err";
        }
    });
}



$(document).ready(()=>{
    $('form').on("submit",(e)=>{
        e.preventDefault();
        pass= $('.pass').val();
        log = $('.login').val();
         login(log,pass);
    })
       
})