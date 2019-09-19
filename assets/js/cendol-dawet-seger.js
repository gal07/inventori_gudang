$(document).ready(function(){
    

    $("#form-create-account").on("submit",function(e){
        e.preventDefault();
        var url = $("#url").val();
        var username = $("#username").val();
        var email = $("#email").val();
        var telepon = $("#telepon").val();
        var password = $("#password").val();

        if (password.length == '') {
            swal({
                title: "Failed",
                type:"error",
                text: 'Field Password Harus Di Isi',
                timer: 2000,
                showConfirmButton: false
             });
        }

        if (username.length == 0 || email.length == 0 || telepon.length == 0 || password.length == 0) {
            swal({
                title: "Failed",
                type:"error",
                text: 'Semua Field Harus Di Isi',
                timer: 2000,
                showConfirmButton: false
             });
        }

        var data = {
            username:username,
            email:email,
            telepon:telepon,
            password:password,
        }
        $.ajax({
            url: url+"createaccount",
            data: data,
            type: "post",
            dataType: "json",
            success: function (res) {
             if (res.success == 1) {
                swal({
                    title: "Success",
                    type:"success",
                    text: res.message,
                    timer: 2000,
                    showConfirmButton: false
                 });
                 window.location = $("#url").val()+'listaccount';
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

    $("#form-create-barang").on("submit",function(e){
        e.preventDefault();
        var url = $("#url").val();
        var data = new FormData(this);
        console.log(data)
        $.ajax({
            url: url+"savebarang",
            data: data,
            enctype: 'multipart/form-data',
            type: "post",
            dataType: "json",
            contentType: false,
            processData: false,
            success: function (res) {
                console.log(res)
            //  if (res.success == 1) {
            //     swal({
            //         title: "Success",
            //         type:"success",
            //         text: res.message,
            //         timer: 2000,
            //         showConfirmButton: false
            //      });
            //      window.location = $("#url").val()+'listaccount';
            //  }else{
            //     swal({
            //         title: "Failed",
            //         text: res.message,
            //         timer: 2000,
            //         showConfirmButton: false
            //      });
            //  }

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