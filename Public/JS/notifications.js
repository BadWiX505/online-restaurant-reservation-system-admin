function fetchOldNotifications() {
    $.ajax({
        url: "index.php?action=cloneOldNotify", // URL of the PHP script to load gallery items
        type: "GET",
        dataType: "html",
        success: function (response) {
            if (response != '') {
                $('.notify-wrapper').prepend(response);
            }

            fetchNewNotifications();


        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
            window.location.href = "index.php?action=err";
        }
    });
}


function fetchNewNotifications() {
    $.ajax({
        url: "index.php?action=cloneNewNotify", // URL of the PHP script to load gallery items
        type: "GET",
        dataType: "html",
        success: function (response) {
            if (response != '') {
                $('.notify-wrapper').prepend(response);
                playSound('Resources/songs/msg.wav');
                $('.noti-badge').show();
            }
            const ID_TIMER = setTimeout(() => {
                clearTimeout(ID_TIMER);
                fetchNewNotifications();
            }, 10000);
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
            window.location.href = "index.php?action=err";
        }
    });
}


function ClearNotifications(){
    $.ajax({
        url: "index.php?action=clearNewNotify", // URL of the PHP script to load gallery items
        type: "GET",
        dataType: "text",
        success: function (response) {
            if (response != 'good') {
                $('#sa-error').click();
            }
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
            window.location.href = "index.php?action=err";
        }
    });
}

function playSound(soundPath) {
    // Create an audio element
    var audioElement = new Audio(soundPath);

    // Play the sound
    audioElement.play();
}


$(document).ready(function () {

 
    fetchOldNotifications();


    $('.dropdown-toggle').on("click", () => {
        setTimeout(() => {
            var isNotificationListVisible = $(".notification-list").is(":visible");
            if (isNotificationListVisible) {
                $('.noti-badge').hide();
            }
        }, 10);

    })

    $('.clrN').on("click",()=>{
        ClearNotifications();
        $('.notify-wrapper').html('');
    });

})