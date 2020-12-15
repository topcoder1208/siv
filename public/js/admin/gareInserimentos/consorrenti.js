$(document).ready(function () {
   var modalTable; 
   var listTable;
   var fileUploader;

   $("#tabs a").click(function () {
        if(this.id != "nav-concorrenti-tab") {
            return;
        }

        if(!listTable) {
            listTable = $("#consorrenti_lists").DataTable({
                ajax: {
                    url: getLatestUrl($("#consorrenti_lists").attr('url'))
                },
                columns: [
                    {'data': 'id'},
                    {'data': 'valore_n_1'},
                    {'data': 'descrizione_valore'},
                ],
                columnDefs: [
                    {
                        'targets': [0],
                        "visible": false,
                        "searchable": false
                    }
                ]
            });
            fileUploader = $("#consorrenti-file").uploadFile({
                url:getLatestUrl($("#consorrenti-file").attr("url")),
                multiple:false,
                acceptFiles:".xlsx",
                fileName:"file",
                autoSubmit: false,
                uploadStr:"Scelgi il file di elenco",
                formData: {"_token":$('meta[name="csrf-token"]').attr('content')},
                onSuccess:function(files,data,xhr,pd)
                {
                    listTable.clear();
                    for(var i = 0;i < data.length;i ++) {
                        listTable.row.add({
                                id: '', 
                                valore_n_1: (data[i].valore_n_1 || ""), 
                                descrizione_valore: (data[i].descrizione_valore || "")
                            });
                    }
                    listTable.draw();
                }
            });
        }
        else {
            listTable.ajax.url(getLatestUrl($("#consorrenti_lists").attr('url')));
            fileUploader.find('form').attr('action', getLatestUrl($("#consorrenti-file").attr("url")));
        }
   });

    $("#btn_insert_consorrenti").click(function () {
        var url = getLatestUrl($("#form_consorrenti").attr("action"));

        if($("#consorrenti-radio1").prop("checked")){
            $.get(url, function (data) {
                listTable.clear();
                for(var i = 0;i < data.length;i ++) {
                    listTable.row.add({
                        id: '', 
                        valore_n_1: (data[i].valore_n_1 || ""), 
                        descrizione_valore: (data[i].descrizione_valore || "")
                    });
                }
                listTable.draw();

            });
        } else if($("#consorrenti-radio2").prop("checked")) {
            fileUploader.startUpload();
        } else {
            $("#insert_consorrenti_modal").modal();
            if(!modalTable) {
                modalTable = $("#inserted_point_lists").DataTable({
                    ajax: {
                        url: getLatestUrl($("#inserted_point_lists").attr("url"))
                    },
                    iDisplayLength: 10,
                    columns: [
                        {data: 'id'},
                        {data: 'codice'},
                        {data: 'name'},
                        {data: 'indirizzo'},
                        {data: 'cap'},
                        {data: 'provincia'},
                        {data: 'citta'},
                        {data: 'regione'},
                        {data: '_id'}
                    ],
                    columnDefs: [ {
                        'targets': 0,
                        'checkboxes': {
                           'selectRow': true
                        }
                    }, {
                        'targets': [8],
                        'visible': false,
                        'searchable': false
                    }],
                    'select': {
                     'style': 'multi'
                    },
                    rowCallback: function (row, data, ind) {
                        if(data._id) {
                            $(row).find('input[type="checkbox"]').prop('checked', true);
                            $(row).addClass('selected');
                        }
                    },
                    initComplete: function (setttings, data) {
                        var firstIds = [];
                        for(var i = 0;i < data.data.length;i ++) {
                            if(data.data[i]._id) {
                                setttings.checkboxes.s.data[0][data.data[i].id] = 1;
                                if(firstIds.indexOf(data.data[i].id) == -1)
                                    firstIds.push(data.data[i].id);
                            }
                        }

                        modalTable.firstIds = firstIds;
                        modalTable.setttings = setttings;
                    }
                });
            }
        }
    });

    $("#form-select-inserted-dettaglis").submit(function (e){
        e.preventDefault();
        var url = $(this).attr("action");

        var data = {"data":[], "deleted_data": []};
        var rows_selected = modalTable.setttings.checkboxes.s.data[0];
        $.each(rows_selected, function(rowId, val){
            if(modalTable.firstIds.indexOf(parseInt(rowId)) == -1) {
                data["data"].push(parseInt(rowId));
            }
        });

        $.each(modalTable.firstIds, function (ind, rowId) {
            if(!rows_selected[rowId+""]) {
                data['deleted_data'].push(rowId);
            }
        });

        modalTable.firstIds = data['data'];

        data['gare-inserimentos-id'] = $("#gare-inserimentos-id").val();
        data['tipologia_id'] = 14;

        $.ajax({
            url: url,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            data: data
        }).done(function (data) {
            $("#insert_consorrenti_modal").click();
            listTable.clear();
            for(var i = 0;i < data.length;i ++) {
                listTable.row.add({
                    id: '', 
                    valore_n_1: (data[i].valore_n_1 || ""), 
                    descrizione_valore: (data[i].descrizione_valore || "")
                });
            }
            listTable.draw();
        });
    });

    $("#btn_copy_points").click(function () {
        var url = getLatestUrl($(this).attr("url"));

        $.get(url, function (data) {
            listTable.clear();
            for(var i = 0;i < data.length;i ++) {
                listTable.row.add({
                    id: '', 
                    valore_n_1: (data[i].valore_n_1 || ""), 
                    descrizione_valore: (data[i].descrizione_valore || "")
                });
            }
            listTable.draw();
        })
    });

});