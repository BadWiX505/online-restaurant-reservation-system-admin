
    $('.edit-avatar').click(()=>{
        $('#fileinput').click();
    });


    
    $('#fileinput').on('change', function(event) {

        // Access the selected file(s)
          selectedFile = event.target.files[0]; // Assuming only one file is selected
        if (selectedFile) {
            var reader = new FileReader();
            reader.onload = function(event) {
                let img = document.querySelector('.avatar-photo');
                img.src = event.target.result;
            };
            reader.readAsDataURL(selectedFile);
        }
       
    });
    
