let main = {
    auth: {
        facebook: () => {
            let btn = $('#login_facebook_btn');
            btn.on('click', main.function.auth_facebook);

        },
    },
    config: {
        firebase: {
            apiKey: "AIzaSyAvL2w6RFtgNQtDA_iNV0cAl9N6BPcKfqI",
            authDomain: "manga-mega.firebaseapp.com",
            databaseURL: "https://manga-mega.firebaseio.com",
            projectId: "manga-mega",
            storageBucket: "manga-mega.appspot.com",
            messagingSenderId: "560891865290",
            appId: "1:560891865290:web:79104537d30e372f"
        }
    },
    function: {
        async auth_facebook() {
            mApp.blockPage();
            let btn = $('#login_facebook_btn');
            let provider = new firebase.auth.FacebookAuthProvider();
            let fb = await firebase.auth().signInWithPopup(provider).catch((error) => mApp.unblockPage());
            if (fb) {
                $.ajax({
                    data: {
                        isNewUser: fb.additionalUserInfo.isNewUser,
                        profile: fb.additionalUserInfo.profile,
                        providerId: fb.additionalUserInfo.providerId,
                    },
                    type: 'post',
                    url: btn.attr('route'),
                    success: function (r, s, x) {
                        if (r.status === 'success') {
                            location.href = '.';
                        }
                    },
                    error: function () {

                    },
                    complete: function () {
                        mApp.unblockPage();
                    }
                });
            }
        },
        mQuickSidebar() {
            let t = $("#m_quick_sidebar"), e = $("#m_quick_sidebar_tabs"), a = t.find(".m-quick-sidebar__content"),
                n = function () {
                    var a, n, o, i;
                    a = mUtil.find(mUtil.get("m_quick_sidebar_tabs_messenger"), ".m-messenger__messages"), n = $("#m_quick_sidebar_tabs_messenger .m-messenger__form"), mUtil.scrollerInit(a, {
                        disableForMobile: !0,
                        resetHeightOnDestroy: !1,
                        handleWindowResize: !0,
                        height: function () {
                            return t.outerHeight(!0) - e.outerHeight(!0) - n.outerHeight(!0) - 120
                        }
                    }), (o = mUtil.find(mUtil.get("m_quick_sidebar_tabs_settings"), ".m-list-settings")) && mUtil.scrollerInit(o, {
                        disableForMobile: !0,
                        resetHeightOnDestroy: !1,
                        handleWindowResize: !0,
                        height: function () {
                            return mUtil.getViewPort().height - e.outerHeight(!0) - 60
                        }
                    }), (i = mUtil.find(mUtil.get("m_quick_sidebar_tabs_logs"), ".m-list-timeline")) && mUtil.scrollerInit(i, {
                        disableForMobile: !0,
                        resetHeightOnDestroy: !1,
                        handleWindowResize: !0,
                        height: function () {
                            return mUtil.getViewPort().height - e.outerHeight(!0) - 60
                        }
                    })
                };
            return {
                init: function () {
                    0 !== t.length && new mOffcanvas("m_quick_sidebar", {
                        overlay: !0,
                        baseClass: "m-quick-sidebar",
                        closeBy: "m_quick_sidebar_close",
                        toggleBy: "m_quick_sidebar_toggle"
                    }).one("afterShow", function () {
                        mApp.block(t), setTimeout(function () {
                            mApp.unblock(t), a.removeClass("m--hide"), n();
                            let chatbox = $('#chatbox');
                            let height = chatbox.prop('scrollHeight');
                            chatbox.scrollTop(height);
                        }, 1e3)
                    })

                }
            }
        },
        csrf_token_ajax() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        },
    },
};

$(document).ready(function () {
    firebase.initializeApp(main.config.firebase);
    main.auth.facebook();
    main.function.csrf_token_ajax();
    main.function.mQuickSidebar().init();
});


$(window).on('load', function () {
    $('body').removeClass('m-page--loading');
});

$('#header-search').on('keyup', function () {
    var search = $(this).serialize();
    if ($(this).find('.m-input').val() == '') {
        $('#search-suggest div').hide();
    } else {
        $.ajax({
            url: '/search',
            type: 'POST',
            data: search,
        })
            .done(function (res) {
                $('#search-suggest').html('');
                res.forEach(function (data) {
                    $('#search-suggest').append("<div class='row'><span><a href='/manga/" + data.slug + "'>&nbsp&nbsp<img class='width70' src='/storage" + data.image + "'></a> &nbsp&nbsp</span><span><h6 class='m--font-brand'><a href='/manga/" + data.slug + "''>" + data.name + "</a></h6></span></div><br>")
                });
            })
    }
    ;
});

