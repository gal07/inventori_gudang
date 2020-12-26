$(document).ready(function(){
    

    function af(params) {
        alert('asd')
    }

    $("#jenis_action").on("change",function() {
        if($(this).val() == 'baru'){
            $("#form-create-barang").css('display','block');
            $("#form-create-barang2").css('display','none');
        }else if($(this).val() == 'masuk'){
            $("#form-create-barang2").css('display','block');
            $("#form-create-barang").css('display','none');
        }
    })

    // Membuat akun 
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

    // Barang Masuk (Barang baru)
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
             if (res.code == 1) {
                swal({
                    title: "Success",
                    type:"success",
                    text: res.msg,
                    timer: 2000,
                    showConfirmButton: false
                 });
                 window.location = $("#url").val()+'listbarang';
             }else if(res.code == 2){
                swal({
                    title: "Failed",
                    type:"error",
                    text: res.msg,
                    timer: 2000,
                    showConfirmButton: false
                 });
             }
             else if(res.code == 3){
                swal({
                    title: "Failed",
                    type:"error",
                    text: res.msg,
                    timer: 2000,
                    showConfirmButton: false
                 });
             }
             else if(res.code == 4){
                swal({
                    title: "Failed",
                    type:"error",
                    text: res.msg,
                    timer: 2000,
                    showConfirmButton: false
                 });
             }
             else{
                swal({
                    title: "Failed",
                    text: res.msg,
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

    // Barang masuk (barang yg sudah ada) 
    $("#form-create-barang2").on("submit",function(e) {
        e.preventDefault();
        var url = $("#url").val();
        var data = new FormData(this);    
        console.log(data)
        $.ajax({
            url: url+"barangmasuk",
            data: data,
            enctype: 'multipart/form-data',
            type: "post",
            dataType: "json",
            contentType: false,
            processData: false,
            success: function (res) {
                console.log(res)
                if (res.code == 1) {
                   swal({
                       title: "Success",
                       type:"success",
                       text: res.msg,
                       timer: 2000,
                       showConfirmButton: false
                    });
                    // window.location = $("#url").val()+'listbarang';
                }else if(res.code == 2){
                   swal({
                       title: "Failed",
                       type:"error",
                       text: res.msg,
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

    // Barang Keluar
    $("#form-out-barang").on("submit",function(e){
        e.preventDefault();
        var url = $("#url").val();
        var data = new FormData(this);    
        console.log(data)
        $.ajax({
            url: url+"actionkeluar",
            data: data,
            enctype: 'multipart/form-data',
            type: "post",
            dataType: "json",
            contentType: false,
            processData: false,
            success: function (res) {
                console.log(res)
                if (res.code == 1) {
                   swal({
                       title: "Success",
                       type:"success",
                       text: res.msg,
                       timer: 2000,
                       showConfirmButton: false
                    });
                    // window.location = $("#url").val()+'listbarang';
                }else if(res.code == 3){
                   swal({
                       title: "Failed",
                       type:"error",
                       text: res.msg,
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

    // Hapus Data Barang 
    let table = $("#datatables").DataTable();
    table.on("click", ".hpsBarang", function(e) {
        var url = $("#url").val();
        var id = $(this).attr("id");
        var data = {
            id:id
         };

        swal({
         title: 'Yakin untuk menghapus data ?',
         text: "Data akan dihapus permanen !",
         type: 'warning',
         showCancelButton: true,
         confirmButtonClass: 'btn btn-success',
         cancelButtonClass: 'btn btn-danger',
         confirmButtonText: 'Hapus',
         buttonsStyling: false
         }).then(function() {
 
             $.ajax({
                 url: url+"deletebarang",
                 data: data,
                 enctype: 'multipart/form-data',
                 type: "POST",
                 dataType: "json",
                 success: function (res) {
                    // $tr = $(this).closest("tr");
                    // table.row($tr).remove().draw();
 
                     console.log(res)
                     if (res.code == 1) {
                     swal({
                         title: "Success",
                         type:"success",
                         text: res.msg,
                         timer: 2000,
                         showConfirmButton: false
                         });
                         
                         window.location = $("#url").val()+'listbarang';

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
 
         });
 


    });


})