$(function() {
    $('#data').DataTable({
        processing: true,
        serverSide: true,
        ordering: false,
        ajax: {
            url: '/admin/database/getlist',
        },
        columns: [
        { 
            data: 'DT_RowIndex', 
            name: 'STT', searchable: false 
        },
        {
            data: 'name',
            name: 'name',
        },
        { 
            data: 'link',
            name: 'link',
            render: function (data, type, row) {
                return data.substr(0, 30) + "...";
            }
        },
        { 
            data: 'size',
            name: 'size',
            render: function (data, type, row) {
                return data + " kb";
            }
        },
        { data: 'created_at', name: 'created_at' },
        {
            data: 'id',
            name: 'id',
            render: function (data, type, row) {
                return '<a href="#" class="btn btn-xs btn-danger" data-toggle="tooltip" onclick="backup(' + data + ');"><i class="fas fa-retweet"></i></a>';
            }
        },
        ]
    });
});

function backup($id){
    $.ajax({
        url: '/admin/backup/' + $id,
        type: 'get',
        contentType: false,
        processData: false,
        success: function (data) {
            if (!data.error) {
                $('#data').DataTable().ajax.reload();
                swal(data.message, {
                    icon: "success",
                });
            } else {
                toastr.error(data.message);
            }         
        },
        error: function (error) {
            toastr.error(error);
        }
    });
}
