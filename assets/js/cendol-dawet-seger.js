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
        var gudang = $("#gudang").val();
        var target = ($(this).attr("letsgo") == "create" ? "createaccount":"editaccount");


        if (username.length == 0 || email.length == 0 || telepon.length == 0) {
            swal({
                title: "Failed",
                type:"error",
                text: 'Semua Field Harus Di Isi',
                timer: 2000,
                showConfirmButton: false
             });
        }

        var data = {
            id:($(this).attr("letsgo") == "edit" ? $(this).attr("userID"):null),
            username:username,
            email:email,
            telepon:telepon,
            password:password,
            gudang:gudang
        }
        $.ajax({
            url: url+target,
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
                 setTimeout(() => {
                    window.location = $("#url").val()+'listaccount';
                 }, 1000);
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
                 setTimeout(() => {
                    window.location = $("#url").val()+'listbarang';
                 }, 1000);
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
                    window.location = $("#url").val()+'branch';
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
                    window.location = $("#url").val()+'branch';
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
                        
                     setTimeout(() => {
                        window.location = $("#url").val()+'listbarang';
                     }, 1000);

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


    // create gudang
    $("#form-create-gudang").on("submit",function(e){
        e.preventDefault();
        var url = $("#url").val();
        var data = new FormData(this);
        var target = ($(this).attr("letsgo") == "create" ? "createnewgudang":"editgudang");    
        console.log(data)
        $.ajax({
            url: url+target,
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
                    setTimeout(() => {
                        window.location = $("#url").val()+'gudang';
                    }, 1000);
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

    // toggleStatus gudang
    let table1 = $("#datatables").DataTable();
    table1.on("click", ".toggleStatusgudang", function(e) {
        var url = $("#url").val();
        var types = $(this).attr("types");
        var id = $(this).attr("id");
        var data = {
            id:id
         };

        swal({
         title: 'Apakah anda yakin ingin '+types+' data ini ?',
         type: 'warning',
         showCancelButton: true,
         confirmButtonClass: 'btn btn-success',
         cancelButtonClass: 'btn btn-danger',
         confirmButtonText: (types == 'menghapus' ? 'Hapus':'Update'),
         buttonsStyling: false
         }).then(function() {
             var targetUrl = (types == 'menghapus' ? 'gudang/deleteGudang':'gudang/toggleStatus')
             $.ajax({
                 url: url+targetUrl,
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
                         
                         setTimeout(() => {
                            window.location = $("#url").val()+'gudang';
                         }, 1000);
                         

                     }else{
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
 
         });
 


    });

    //toggleStatus user
    let table2 = $("#datatables").DataTable();
    table2.on("click", ".toggleStatususer", function(e) {
        var url = $("#url").val();
        var types = $(this).attr("types");
        var id = $(this).attr("id");
        var data = {
            id:id
         };

        swal({
         title: 'Apakah anda yakin ingin '+types+' user ini ?',
         type: 'warning',
         showCancelButton: true,
         confirmButtonClass: 'btn btn-success',
         cancelButtonClass: 'btn btn-danger',
         confirmButtonText: (types == 'menghapus' ? 'Hapus':'Update'),
         buttonsStyling: false
         }).then(function() {
             var targetUrl = (types == 'menghapus' ? 'admin/deleteUser':'admin/toggleStatus')
             $.ajax({
                 url: url+targetUrl,
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
                         
                         setTimeout(() => {
                            window.location = $("#url").val()+'listaccount';
                         }, 1000);
                         

                     }else{
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
 
         });
 


    });

})