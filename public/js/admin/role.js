$(function() {
    $('#roles-table').DataTable({
        processing: true,
        serverSide: true,
        ordering: false,
        ajax: {
            url: '/admin/role/getlist',
        },
        columns: [
        { 
            data: 'DT_RowIndex', 
            name: 'STT', searchable: false 
        },
        {
            data: 'title',
            name: 'title',
            render: function (data, type, row) {

                return data.substr(0, 30) + "...";
            }
        },
        { 
            data: 'permission',
            name: 'permission',
            render: function (data, type, row) {
                $string = '';
                JSON.parse(data).forEach ( function(value) {
                    $string += '<button type="button" data-toggle="tooltip" title="' + value.title + '" class="btn m-btn--pill btn-info m-btn m-btn--custom m-btn--bolder">' + value.code + '<a href="#" onclick="deletePermission(' + value.id + ', ' + row.id + ' );"> <span ><i class="fas fa-trash"></i></span><a/></button>';
                });

                return $string;
            }
        },
        { data: 'created_at', name: 'created_at' },
        {
            data: 'id',
            name: 'id',
            render: function (data, type, row) {

                return '<a href="#" class="btn btn-xs btn-primary" data-toggle="tooltip"  onclick="addPermission(' + data + ');"><i class="fas fa-plus"></i></a>' +
                '<a href="#" class="btn btn-xs btn-warning" data-toggle="tooltip"  onclick="edit(' + data + ');"><i class="fas fa-pencil-alt"></i></a>' +
                '<a href="#" class="btn btn-xs btn-danger" data-toggle="tooltip" onclick="deleteRole(' + data + ');"><i class="fas fa-trash"></i></a>';
            }
        },
        ]
    });
});

function addPermission($id){
    $("#modal-permission").modal('show');
    $('#role_id').val($id);       
}

function deletePermission(permission_id, role_id){
    $.ajax({
        url: '/admin/role/permission/' + role_id + '/' + permission_id ,
        type: 'get',
        contentType: false,
        processData: false,
        success: function (data) {
            $('#modal-permission').modal('hide');
            $('#roles-table').DataTable().ajax.reload();
            swal(data.message, {
                icon: "success",
            });                       
        },
        error: function (error) {
            toastr.error(error.message);
        }
    });
}

$('#permission_add').on('submit', function(e){
    e.preventDefault();
    var formData = new FormData($(this)[0]);
    $.ajax({
        url: '/admin/role/permission',
        data: formData,
        type: 'post',
        contentType: false,
        processData: false,
        success: function (data) {
            $('#modal-permission').modal('hide');
            $('#roles-table').DataTable().ajax.reload();
            swal(data.message, {
                icon: "success",
            });                       
        },
        error: function (error) {
            toastr.error(error.message);
        }
    });
});

$('#role_add').on('submit', function(e){
    e.preventDefault();
    var formData = new FormData($(this)[0]);
    $.ajax({
        url: '/admin/role/store',
        data: formData,
        type: 'post',
        contentType: false,
        processData: false,
        success: function (data) {
            $('#modal-add').modal('hide');
            $('#roles-table').DataTable().ajax.reload();
            swal(data.message, {
                icon: "success",
            });                       
        },
        error: function (error) {
            toastr.error(error.message);
        }
    });
});

function deleteRole($id){
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
                url: '/admin/role/delete/' + $id,
                success: function(data) {
                    swal(data.message, {
                        icon: "success",
                    });
                    $('#roles-table').DataTable().ajax.reload();
                }
            });
        }
    })
}
