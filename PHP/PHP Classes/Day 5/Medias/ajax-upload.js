$(document).ready(function (e){  
    $("#uploadForm").on('submit',(function(e){  
        e.preventDefault();  
        $.ajax({  
            url: "upload.php",  
            type: "POST",  
            data:  new FormData(this),            
            success: function(data){  
                $("#targetLayer").html(data);  
            },  
        });  
    }));  
});  
