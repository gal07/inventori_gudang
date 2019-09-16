$(document).ready(function() {
    
    $("#form-login").on("submit",function(e) {
        e.preventDefault();
        if ($("#username").val() == '' || $("#username").val().length == 0 || $("#password").val() == '' || $("#password").val().length == 0) {
            swal({ title: "Failed",
            	   text: "Username Atau Password Tidak Boleh Kosong",
            	   timer: 2000,
            	   showConfirmButton: false
            });
            return false;
        }
        // var data = new FormData(this);
        var data = {
            username:$("#username").val(),
            password:$("#password").val()
        };
        var url = $("#url").val()+"login/loginFlow";
        $.ajax({
            url: url,
            data: data,
            type: "post",
            dataType: "json",
            success: function (res) {
             if (res.success == 1) {
                 window.location = $("#url").val()+'admin';
             }else{
                swal({
                    title: "Failed",
                    text: res.message,
                    timer: 2000,
                    showConfirmButton: false
                 });
             }

            },
            complete: function () {

            },
            error: function () {
                swal({
                    title: "Connection Error",
                    type: "error",
                    text: "Try Again !",
                    timer: 2000,
                    showConfirmButton: false
                });
            }

        });

    })

    

})