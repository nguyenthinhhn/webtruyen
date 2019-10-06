$(function() {
    $('#categories-table').DataTable({
        processing: true,
        serverSide: true,
        ordering: false,
        ajax: {
            url: '/admin/category/getlist',
        },
        columns: [
        { data: 'action', name: 'action' },
        { data: 'name', name: 'name' },
        { data: 'slug', name: 'slug' },
        { data: 'meta_title', name: 'meta_title' },
        { data: 'meta_description', name: 'meta_description' },
        { data: 'meta_keywords', name: 'meta_keywords' },
        { data: 'created_at', name: 'created_at' },
        ]
    });
});

function edit_slug() {
    var text = document.getElementById("name_add");
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

function deleteCategory($id){
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
                url: '/admin/category/delete/' + $id,
                success: function(data) {
                    swal(data.message, {
                        icon: "success",
                    });
                    $('#categories-table').DataTable().ajax.reload();
                }
            });
        }
    })
}

$('#category_add').on('submit', function(e){
    e.preventDefault();
    var formData = new FormData($(this)[0]);
    $.ajax({
        url: '/admin/category/store',
        data: formData,
        type: 'post',
        contentType: false,
        processData: false,
        success: function (data) {
            $('#modal-add').modal('hide');
            $('#categories-table').DataTable().ajax.reload();
            swal(data.message, {
                icon: "success",
            });                     
        },
        error: function (data) {
            jQuery.each(data.responseJSON.errors, function(key, value){
                toastr.error(value) 
            });
        }
    });
});

function edit($id){
    $("#modal-edit").modal('show');
    $.ajax({
        type: 'get',
        url: '/admin/category/' + $id + '/edit',
        success: function(response) {
            console.log(response);
            $('#id_edit').val(response.id);
            $('#name_edit').val(response.name);
            $('#meta_description_edit').val(response.meta_description);
            $('#meta_keywords_edit').val(response.meta_keywords);
            $('#meta_title_edit').val(response.meta_title);               
            $('#slug_edit').val(response.slug);               
        }       
    });         
}
$('#category_edit').on('submit', function(e){
    e.preventDefault();
    var formData = new FormData($(this)[0]);
    $.ajax({
        url: '/admin/category/update', 
        data: formData,
        type: 'post',
        contentType: false,
        processData: false,
        success: function (data) {
            $('#modal-edit').modal('hide');
            $('#categories-table').DataTable().ajax.reload();
            swal( data.message, {
                icon: "success",
            });                     
        },
        error: function (data) {
            jQuery.each(data.responseJSON.errors, function(key, value){
                toastr.error(value) 
            });
        }
    });
});
