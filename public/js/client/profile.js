
// upload image profile 
$('body').on('click','#avatar_pro', function(e){
    $('#avatar_pr').click();
})
// hien thi anh profile
$('body').on('change','#avatar_pr', function(e){
    if ($(this).val() != '') {
        var reader = new FileReader();
        reader.onload = function (e){
            $('#avatar_profile').attr('src', e.target.result);             
            $('#avatar_pro').attr('src', e.target.result);             
        }
        reader.readAsDataURL(this.files[0]);
    }
})


$('body').on('submit','#editpass', function(e){
    e.preventDefault();
    $pw1 = $('#pw2').val();
    $pw2 = $('#pw3').val();
    if ($pw1.length >= 6 ) {
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
            toastr.error('Mật khẩu xác nhận không khớp');
        }
    }else{
        toastr.error('Mật khẩu phải dài hơn 5 ký tự');
    }
});

$('body').on('submit','#updateprofile', function(e){
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
            jQuery.each(data.responseJSON.errors, function(key, value){
                toastr.error(value) 
            }); 
        }
    })
});

$('body').on('submit','#update_avatar_profile', function(e){
    e.preventDefault();
    var formData = new FormData($(this)[0]);
    console.log(formData);
    $.ajax({
        url: "/admin/profile/avatar", 
        data: formData,
        type: 'post',
        contentType: false,
        processData: false,
        success: function (data) {
            toastr.success(data.message);
            setTimeout(function(){
                location.reload();
            }, 2000);
        },
        error: function (data) {
            jQuery.each(data.responseJSON.errors, function(key, value){
                toastr.error(value) 
            })
            setTimeout(function(){
                location.reload();
            }, 2000);
           
        }
    })
});
