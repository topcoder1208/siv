$(document).ready(function (){
    $("#tabs a").on('click', function () {
        if(this.id != "nav-metodo-attribuzione-tab") {
            return;
        }

        $.get(getLatestUrl($("#metodo_categories_lists").attr("url")), function (data) {
            for(var i = 0;i < data.length;i ++) {
                $("#metodo_checked_catatories_wrapper").append('<div class="row categories" data-id="' +data[i].valore_n_3+ '">\
                        <div class="form-group col-md-6">\
                            <label>Indicare il target soglia minima</label>\
                            <input type="text" class="form-control" name="valore_n_1[]" value="' +data[i].valore_n_1+ '">\
                        </div>\
                        <div class="form-group col-md-6">\
                            <label>ndicare il tipo di incremento/decremento del premio:</label>\
                            <input type="text" class="form-control" name="valore_n_2[]" value="' +data[i].valore_n_1+ '">\
                        </div>\
                        <input type="hidden" name="valore_n_3[]" value="' +data[i].valore_n_3+ '">\
                    </div>');
            }
        });
    });
    var datatable = $("#metodo_categories_lists").DataTable({
        iDisplayLength: 10,
        columnDefs: [ {
            'targets': 0,
            'checkboxes': {
               'selectRow': true
            }
        }],
        'select': {
         'style': 'multi'
        }
    });

    $("#modal_save_button").click(function() {
        $("#metodo_modal").click();
        var checked = datatable.column(0).checkboxes.selected();
        for(var i = 0;i < checked.length;i ++) {
            if($("[data-id='" +checked[i]+ "']").length > 0) {
                continue;
            }

            $("#metodo_checked_catatories_wrapper").append('<div class="row categories" data-id="' +checked[i]+ '">\
                        <div class="form-group col-md-6">\
                            <label>Indicare il target soglia minima</label>\
                            <input type="text" class="form-control" name="valore_n_1[]">\
                        </div>\
                        <div class="form-group col-md-6">\
                            <label>ndicare il tipo di incremento/decremento del premio:</label>\
                            <input type="text" class="form-control" name="valore_n_2[]">\
                        </div>\
                        <input type="hidden" name="valore_n_3[]" value="' +checked[i]+ '">\
                    </div>');
        }
    });

    $("#btn_metodo_open_modal").click(function () {
        $("#metodo_modal").modal();
    });

    $("#form_metodo").submit(function (e) {
        e.preventDefault();
        var url = $(this).attr("action");
        var formValues = $(this).serializeArray();
        formValues.push({
            name: 'gare-inserimentos-id',
            value: $('#gare-inserimentos-id').val()
        });

        $.ajax({
            url: url,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            data: formValues
        }).done(function (data) {
            if(data == "success") {
                // alert("Success");
            }
        });
    });
});