$(document).ready(function (){
    datatable = $("#esito_lists").DataTable({
        iDisplayLength: 10,
        columnDefs: [ {
            'targets': 0,
            'checkboxes': {
               'selectRow': true
            }
        }],
        'select': {
         'style': 'multi'
        },
        initComplete: function (table) {
            setTimeout(function () {
                for(var i = 0;i < table.aoData.length;i ++) {
                    if($("#esito_" + table.aoData[i]._aData[0]).length > 0) {
                        datatable.row(i).select(true);
                    }
                }
            }, 100)
        }
    });

    $("#esito_modal_save_button").click(function() {
        $("#esito_modal").click();
        var checked = datatable.column(0).checkboxes.selected();
        for(var i = 0;i < checked.length;i ++) {
            if($('#esito_' +checked[i]).length > 0) {
                $('#esito_' +checked[i]).prop("checked", true);
                continue;
            }

            $("#esito_checked_wrapper").append('<p>\
                            <div class="form-check" style="padding-left: 30px">\
                                <input class="form-check-input" type="checkbox" name="esito_gare[]" id="esito_' +checked[i]+ '" value="' +checked[i]+ '" checked>\
                                <label class="form-check-label" for="esito_' +checked[i]+ '">' +''+ '</label>\
                            </div>\
                        </p>');
        }
    });

    $("#btn_esito_open_modal").click(function () {
        $("#esito_modal").modal();
        var ids = [];
        var i = 0;
        while(1) {
            var rowData = datatable.row(i).data();
            if(rowData === undefined) {
                break;
            }
            if($("#esito_" + rowData[0]).length > 0) {
                if($("#esito_" + rowData[0]).prop('checked')) {
                    datatable.row(i).select(true);
                } else {
                    datatable.row(i).select(false);
                }
            }
            i ++;
        }
    });

    $("#esito_form").submit(function (e) {
        e.preventDefault();
        var url = $(this).attr("action");
        if($("#esito_no").prop("checked")) {
            $("#esito_incremento").val("");
            $("#esito_decremento").val("");
        }

        var formValues = $(this).serializeArray();
        formValues.push({name: "gare-inserimentos-id", value: $("#gare-inserimentos-id").val()});

        $.ajax({
            url: url,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            data: formValues
        }).done(function (data) {
            if(data.result == "success") {
                
            }
        });
    });
});