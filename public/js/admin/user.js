// upload image
$('#avatar_show_add').on('click',function(){
    $('#avatar').click();
})
// hien thi anh
$('#avatar').change(function () {
    if ($(this).val() != '') {
        var reader = new FileReader();
        reader.onload = function (e){
            $('#avatar_show_add').attr('src', e.target.result);             
        }
        reader.readAsDataURL(this.files[0]);
    }
})

// upload image edit
$('#avatar_show_edit').on('click',function(){
    $('#avatar_edit').click();
})

$('#avatar_edit').change(function () {
    if ($(this).val() != '') {
        var reader = new FileReader();
        reader.onload = function (e){
            $('#avatar_show_edit').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    }
})

$(function() {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ordering: false,
        ajax: {
            url:'/admin/user/getlist',
        },
        columns: [
        { data: 'action', name: 'action' },
        { data: 'username', name: 'username' },
        { data: 'fullname', name: 'fullname' },
        { data: 'email', name: 'email' },
        { data: 'avatar', name: 'avatar' },
        { data: 'role', name: 'role' },
        { data: 'exp', name: 'exp' },
        { data: 'point', name: 'point' },
        { data: 'status', name: 'status' },
        { data: 'created_at', name: 'created_at' },
        ]
    });
});

function updateStatus(id) {
    $.ajax({
        url: '/admin/user/status/' + id,
        success: function(res) {
            if (!res.error) {
                toastr.success(res.message);
                $('#users-table').DataTable().ajax.reload();
            }
            else {
                toastr.error(res.message);
            }
        }
    });
}

function deleteUser($id){
    swal({
        title: 'Bạn có chắc muốn xóa ?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: 'get',
                url: '/admin/user/delete/' + $id,
                success: function(res) {
                    swal("Xóa Thành công", {
                        icon: "success",
                    });
                    $('#users-table').DataTable().ajax.reload();
                }
            });
        }
    })
}

$('#user_add').on('submit',function(e){
    e.preventDefault();
    $pw1 = $('#password1_add').val();
    $pw2 = $('#password2_add').val();
    if ($pw1 == $pw2) {
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: "/admin/user/store", 
            data: formData,
            type: 'post',
            contentType: false,
            processData: false,
            success: function (data) {
                $('#modal-add').modal('hide');
                $('#users-table').DataTable().ajax.reload();
                swal( data.message , {
                    icon: "success",
                });                     
            },
            error: function (data) {
                jQuery.each(data.responseJSON.errors, function(key, value){
                    toastr.error(value) 
                }); 
            }
        })
    } else {
        toastr.error('The password is incorrect');
    } 
});

function edit($id){
    $("#modal-edit").modal('show');
    $.ajax({
        type: 'get',
        url: '/admin/user/' + $id + '/edit',
        success: function(response) {
            console.log(response);
            $('#id_edit').val(response.id);
            $('#fullname_edit').val(response.fullname);
            $('#email_edit').val(response.email);
            $('#username_edit').val(response.username);
            $('#role_edit').val(response.role);
            if (response.avatar != null){
                $('#avatar_show_edit').attr('src', '/storage/' + response.avatar);
            }                  
        }       
    });         
}

$('#user_edit').on('submit',function(e){
    e.preventDefault();
    var formData = new FormData($(this)[0]);
    $.ajax({
        url: "/admin/user/update", 
        data: formData,
        type: 'post',
        contentType: false,
        processData: false,
        success: function (data) {
            if (data.error) {
                jQuery.each(data.message, function(key, value){
                    toastr.error(value) 
                }); 
            }
            else {
                $('#modal-edit').modal('hide');
                $('#users-table').DataTable().ajax.reload();
                swal( data.message , {
                    icon: "success",
                });                     
            }
        },
        error: function (data) {
            jQuery.each(data.responseJSON.errors, function(key, value){
                toastr.error(value) 
            });
        }
    });
});

$('#updateprofile').on('submit',function(e){
    e.preventDefault();
    var formData = new FormData($(this)[0]);
    $.ajax({
        url: "/admin/user/profile", 
        data: formData,
        type: 'post',
        contentType: false,
        processData: false,
        success: function (data) {
            toastr.success(data.message);
        },
        error: function (data) {
            toastr.error(data);
        }
    })
});

$('#editpass').on('submit',function(e){
    e.preventDefault();
    $pw1 = $('#pw2').val();
    $pw2 = $('#pw3').val();
    if ($pw1 == $pw2) {
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: "/admin/password", 
            data: formData,
            type: 'post',
            contentType: false,
            processData: false,
            success: function (data) {
                if (!data.error) {
                    toastr.success(data.message);
                } else {
                    toastr.error(data.message);
                }
            },
            error: function (data) {
                toastr.error(data);
            }
        })
    } else {
        toastr.error('The password is incorrect');
    }
});
