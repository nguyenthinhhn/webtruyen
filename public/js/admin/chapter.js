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

function edit_slug() {
    var text = document.getElementById("name");
    var code = document.getElementById("slug_add");
    slug = text.value.toLowerCase();
    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
    slug = slug.replace(/đ/gi, 'd');
    //Xóa các ký tự đặt biệt
    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
    //Đổi khoảng trắng thành ký tự gạch ngang
    slug = slug.replace(/ /gi, "-");
    //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
    //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
    slug = slug.replace(/\-\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-/gi, '-');
    slug = slug.replace(/\-\-/gi, '-');
    //Xóa các ký tự gạch ngang ở đầu và cuối
    slug = '@' + slug + '@';
    slug = slug.replace(/\@\-|\-\@|\@/gi, '');
    //In slug ra textbox có id “slug”
    code.value = slug;
}
 
$(function() {
    $manga_id = $('#manga_id').val();
    $('#chapters-table').DataTable({
        processing: true,
        serverSide: true,
        ordering: false,
        ajax: {
            url:'/admin/chapter/getlist/' + $manga_id,
        },
        columns: [
        {
            data: 'id',
            name: 'action' ,
            render: function (data, type, row) {

            return  '<a href="#" class="btn btn-xs btn-warning" data-toggle="tooltip" title="Sửa" onclick="edit(' + data + ');"><i class="fas fa-edit"></i></a>' +
                '<a href="#" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Xóa" onclick="deleteChapter(' + data + ');"><i class="fas fa-trash"></i></a>';
            }
        },
        {
            data: 'name',
            name: 'name',
            render: function (data, type, row) {
                return data.substr(0, 30) + "...";
            }
        },
        {
            data: 'description',
            name: 'description',
            render: function (data, type, row) {
                return data.substr(0, 100) + "...";
            }
        },
        { data: 'slug', name: 'slug' },
        { data: 'view', name: 'view' },
        {
            data: 'status',
            name: 'status',
            render: function (data, type, row) {
                $checked = '';
                if (data == 1) {
                    $checked = 'checked';
                }

                return '<label class="switch" onchange="updateStatus(' + row.id + ');"><input type="checkbox"' + $checked + '><span class="slider round"></span></label>';
            }
        },
        ]
    });
});
        
function updateStatus(id) {
    $.ajax({
        url: '/admin/chapter/status/' + id,
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

function deleteChapter($id){
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
            url: '/admin/chapter/delete/' + $id,
            success: function(res) {
                swal("Delete success", {
                    icon: "success",
                });
                $('#chapters-table').DataTable().ajax.reload();
            }
        });
    }
})
}

$('#chapter_add').on('submit',function(e){
    e.preventDefault();
    var formData = new FormData($(this)[0]);
    formData.append('content', CKEDITOR.instances['content'].getData());
    $.ajax({
        url: "/admin/chapter/store", 
        data: formData,
        type: 'post',
        contentType: false,
        processData: false,
        success: function (data) {
            $('#modal-add').modal('hide');
            $('#chapters-table').DataTable().ajax.reload();
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
});

function edit($id){
    $("#modal-edit").modal('show');
    $.ajax({
        type: 'get',
        url: '/admin/chapter/' + $id + '/edit',
        success: function(response) {
            console.log(response);
            $('#id_edit').val(response.id);
            $('#name_edit').val(response.name);
            $('#description_edit').val(response.description);         
            $('#slug_edit').val(response.slug);             
            CKEDITOR.instances['content_edit'].setData(response.content);             
        }       
    });         
}
$('#chapter_edit').on('submit',function(e){
    e.preventDefault();
    var formData = new FormData($(this)[0]);
    formData.append('content', CKEDITOR.instances['content_edit'].getData());
    $.ajax({
        url: "/admin/chapter/update", 
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
                $('#chapters-table').DataTable().ajax.reload();
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
