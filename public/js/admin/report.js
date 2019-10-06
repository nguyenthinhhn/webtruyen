var table = $('#local_record_selection');
var DatatableRecordSelection = function () {
    var t = {
        data: {
            type: "remote",
            source: {
                read: {
                    url: table.attr('gets'),
                    method: 'GET',
                    map: function (t) {
                        var e = t;
                        return void 0 !== t.data && (e = t.data), e
                    }
                }
            },
            pageSize: 10,
            serverPaging: !0,
            serverFiltering: !0,
            serverSorting: !0
        },
        order: [[1, "desc"]],
        layout: {
            scroll: !1,
            footer: !1
        },
        sortable: !0,
        pagination: !0,
        translate: i18n.backend.dataTable,
        toolbar: {
            items: {
                pagination: {
                    pageSizeSelect: [10, 20, 30, 50, 100]
                }
            }
        },
        search: {
            input: $("#slug")
        },
        columns: [
            {
                field: "id",
                title: "#",
                sortable: 1,
                width: 40,
                selector: {class: "m-checkbox--solid m-checkbox--brand"}
            },
            {
                field: "report_type",
                title: "Loại",
                sortable: 1,
                template: function (t) {
                    let e = {
                        1: {title: i18n.backend.error_img, class: 'm-badge--danger'},
                    };
                    return `<span class="m-badge ${e[t.report_type].class} m-badge--wide">${e[t.report_type].title}</span>`;
                }
            },
            {
                field: "report_content",
                title: "Nội dung",
                sortable: 1,
                template: function (t) {
                    return `<a class="m-link" target="_blank" href='${t.report_content}'>${i18n.backend.view}</a>`;
                }
            },
            {
                field: "manga_id",
                title: "Manga",
                sortable: 1,
            },
            {
                field: "chapter_id",
                title: "Chapter",
                sortable: 1,
            },
        ],
    };
    return {
        init: function () {
            var e = $('#local_record_selection').mDatatable(t);
            $("#m_form_status").on("change", function () {
                e.search($(this).val().toLowerCase(), "status")
            }),
                $("#m_form_type").on("change", function () {
                    e.search($(this).val().toLowerCase(), $(this).attr('name'))
                }),
                $("#m_form_status,#m_form_type").selectpicker({liveSearch: true}),
                e.on("m-datatable--on-check m-datatable--on-uncheck m-datatable--on-layout-updated", function (t) {
                    var a = e.rows(".m-datatable__row--active").nodes().length;
                    $("#m_datatable_selected_number").html(a),
                        a > 0 ? $("#m_datatable_group_action_form").collapse("show") : $("#m_datatable_group_action_form").collapse("hide")
                }),
                $("#m_modal_fetch_id").on("show.bs.modal", function (t) {
                    for (var a = e.rows(".m-datatable__row--active").nodes().find('.m-checkbox--single > [type="checkbox"]').map(function (t, e) {
                        return $(e).val()
                    }), n = document.createDocumentFragment(), l = 0; l < a.length; l++) {
                        var i = document.createElement("li");
                        i.setAttribute("data-id", a[l]), i.innerHTML = a[l],
                            n.appendChild(i)
                    }
                    $(t.target).find(".m_datatable_selected_ids").append(n)
                }).on("hide.bs.modal", function (t) {
                    $(t.target).find(".m_datatable_selected_ids").empty()
                });
        },
        add: () => {
            $('#addRow').on('click', () => {

            });


        },
    }
}();
jQuery(document).ready(function () {
    DatatableRecordSelection.init();
    // DatatableRecordSelectionDemo.add();
});
