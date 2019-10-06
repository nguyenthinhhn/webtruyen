var SnippetLogin = function () {
    var e = $("#m_login"), i = function (e, i, a) {
        var l = $('<div class="m-alert m-alert--outline alert alert-' + i + ' alert-dismissible" role="alert">\t\t\t<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>\t\t\t<span></span>\t\t</div>');
        e.find(".alert").remove(), l.prependTo(e), mUtil.animateClass(l[0], "fadeIn animated"), l.find("span").html(a)
    }, err_signup = function (e, i, a) {
        let form = $('.m-login__signup form');
        let l = $('<div class="m-alert m-alert--outline alert alert-' + i + ' alert-dismissible" role="alert">' + a + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>\t\t\t<span></span>\t\t</div>');
        form.find(".alert").remove(), l.prependTo(form), mUtil.animateClass(l[0], "fadeIn animated");
    }, a = function () {
        e.removeClass("m-login--forget-password"), e.removeClass("m-login--signup"), e.addClass("m-login--signin"), mUtil.animateClass(e.find(".m-login__signin")[0], "flipInX animated")
    }, l = function () {
        $("#m_login_forget_password").click(function (i) {
            i.preventDefault(), e.removeClass("m-login--signin"), e.removeClass("m-login--signup"), e.addClass("m-login--forget-password"), mUtil.animateClass(e.find(".m-login__forget-password")[0], "flipInX animated")
        }), $("#m_login_forget_password_cancel").click(function (e) {
            e.preventDefault(), a()
        }), $("#m_login_signup").click(function (i) {
            i.preventDefault(), e.removeClass("m-login--forget-password"), e.removeClass("m-login--signin"), e.addClass("m-login--signup"), mUtil.animateClass(e.find(".m-login__signup")[0], "flipInX animated")
        }), $("#m_login_signup_cancel").click(function (e) {
            e.preventDefault(), a()
        })
    };
    return {
        init: function () {
            l(), $("#m_login_signin_submit").click(function (e) {
                e.preventDefault();
                var a = $(this), l = $(this).closest("form");
                l.validate({
                    rules: {
                        email: {required: !0, email: !0},
                        password: {required: !0},
                    },
                    messages: {
                        email: {required: i18n.validate.required, email: i18n.validate.email},
                        password: {required: i18n.validate.required},
                    }
                }),
                l.valid() && (a.addClass("m-loader m-loader--right m-loader--light").attr("disabled", !0),
                    l.ajaxSubmit({
                        url: l.attr('action'),
                        success: function (e, t, r, s) {
                            if (e.status === 'success') {
                                location.href = e.redirectTo;
                            }
                        },
                        error: function (x, s, e) {
                            if (x.status === 422) {
                                i(l, "danger", "Thông tin nhập không chính xác.");
                                a.removeClass("m-loader m-loader--right m-loader--light").attr("disabled", !1)
                            }
                        }
                    }))
            }), $("#m_login_signup_submit").click(function (l) {
                l.preventDefault();
                var t = $(this), r = $(this).closest("form");
                r.validate({
                    rules: {
                        fullname: {required: !0},
                        username: {required: !0},
                        email: {required: !0, email: !0},
                        password: {required: !0},
                        password_confirmation: {required: !0, equalTo: '[name="password"]'},
                        agree: {required: !0}
                    },
                    messages: {
                        fullname: {required: i18n.validate.required},
                        username: {required: i18n.validate.required},
                        email: {required: i18n.validate.required, email: i18n.validate.email},
                        password: {required: i18n.validate.required},
                        password_confirmation: {
                            required: i18n.validate.required,
                            equalTo: i18n.validate.equal_password
                        },
                        agree: {required: i18n.validate.required}
                    }
                }), r.valid() && (t.addClass("m-loader m-loader--right m-loader--light").attr("disabled", !0),
                        r.ajaxSubmit({
                            url: r.attr('action'),
                            success: function (l, s, n, o) {
                                if (l.status === 'success') {
                                    location.href = l.redirectTo;
                                }
                            },
                            error: function (x, s, e) {
                                if (x.status === 422) {
                                    err_signup(l, "danger", "Thông tin nhập không chính xác.");
                                    a.removeClass("m-loader m-loader--right m-loader--light").attr("disabled", !1)
                                }
                            }
                        })
                )
            }), $("#m_login_forget_password_submit").click(function (l) {
                l.preventDefault();
                var t = $(this), r = $(this).closest("form");
                r.validate({
                    rules: {
                        email: {
                            required: !0,
                            email: !0
                        }
                    }
                }), r.valid() && (t.addClass("m-loader m-loader--right m-loader--light").attr("disabled", !0), r.ajaxSubmit({
                    url: "",
                    success: function (l, s, n, o) {
                        setTimeout(function () {
                            t.removeClass("m-loader m-loader--right m-loader--light").attr("disabled", !1), r.clearForm(), r.validate().resetForm(), a();
                            var l = e.find(".m-login__signin form");
                            l.clearForm(), l.validate().resetForm(), i(l, "success", "Cool! Password recovery instruction has been sent to your email.")
                        }, 2e3)
                    }
                }))
            })
        }
    }
}();
jQuery(document).ready(function () {
    SnippetLogin.init()
});
