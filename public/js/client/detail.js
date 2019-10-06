$('body').on('submit','#comment', function(e){
    e.preventDefault();
    var formData = new FormData($(this)[0]);
    $.ajax({
        url: "/manga/comment", 
        data: formData,
        type: 'post',
        contentType: false,
        processData: false,
        success: function (data) {
            $("#append").append("<div class='m-widget3__item'><div class='m-widget3__header'><div class='m-widget3__user-img'><img class='m-widget3__img' src='/storage/" + data.avatar + "' alt=''></div><div class='m-widget3__info'><span class='m-widget3__username'>" + data.username + "</span><br><span class='m-widget3__time'>Vừa xong</span></div></div><div class='m-widget3__body'><p class='m-widget3__text'>" + data.content + "</p></div></div>");
        },
        error: function (data) {
            toastr.error(data) 
        }
    })
});

function follow($id)
{
    $.ajax({
        url: "/follow/" + $id, 
        type: 'get',
        contentType: false,
        processData: false,
        success: function (data) {
            if (data.error)
            {
                toastr.success(data) 
            } else {
                toastr.success(data) 
            }
        },
        error: function (data) {
            toastr.error(data.message) 
        }
    })
}
