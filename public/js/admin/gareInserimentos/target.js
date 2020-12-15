$(document).ready(function (){
    var pointsModalTable;
    var agentisModalTable;
    var pointsTable;
    var agentiaTable;
    var pointFileUploader;
    var agentiaFileUploader;

    $("#tabs a").click(function () {
        if(this.id != "nav-target-tab") {
            return;
        }

        if(!pointsTable) {
            pointsTable = $("#target_dettaglis_point_lists").DataTable({
                ajax: {
                    url: getLatestUrl($("#target_dettaglis_point_lists").attr('url'))
                },
                iDisplayLength: 10,
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

            agentiaTable = $("#target_dettaglis_agenti_lists").DataTable({
                ajax: {
                    url: getLatestUrl($("#target_dettaglis_agenti_lists").attr('url'))
                },
                iDisplayLength: 10,
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


            pointFileUploader = $("#target-point-file").uploadFile({
                url: getLatestUrl($("#target-point-file").attr("url")),
                multiple:false,
                acceptFiles:".xlsx",
                fileName:"file",
                autoSubmit: false,
                uploadStr:"Scelgi il file di elenco",
                formData: {"_token":$('meta[name="csrf-token"]').attr('content')},
                onSuccess:function(files,data,xhr,pd)
                {
                    pointsTable.clear();
                    for(var i = 0;i < data.length;i ++) {
                        pointsTable.row.add({
                                id: '', 
                                valore_n_1: (data[i].valore_n_1 || ""), 
                                descrizione_valore: (data[i].descrizione_valore || "")
                            });
                    }
                    pointsTable.draw();
                }
            });

            agentiaFileUploader = $("#target-agenti-file").uploadFile({
                url: getLatestUrl($("#target-agenti-file").attr("url")),
                multiple:false,
                acceptFiles:".xlsx",
                fileName:"file",
                autoSubmit: false,
                uploadStr:"Scelgi il file di elenco",
                formData: {"_token":$('meta[name="csrf-token"]').attr('content')},
                onSuccess:function(files,data,xhr,pd)
                {
                    agentiaTable.clear();
                    for(var i = 0;i < data.length;i ++) {
                        agentiaTable.row.add({
                                id: '', 
                                valore_n_1: (data[i].valore_n_1 || ""), 
                                descrizione_valore: (data[i].descrizione_valore || "")
                            });
                    }
                    agentiaTable.draw();
                }
            });
        }
        else {
            pointsTable.ajax.url(getLatestUrl($("#target_dettaglis_point_lists").attr('url')));
            agentiaTable.ajax.url(getLatestUrl($("#target_dettaglis_agenti_lists").attr('url')));
            pointFileUploader.find('form').attr('action', getLatestUrl($("#target-point-file").attr("url")));
            agentiaFileUploader.find('form').attr('action', getLatestUrl($("#target-agenti-file").attr("url")));
        }
    });

    $("#btn_target_point").click(function () {
        var url = getLatestUrl($("#nav-target-pdv").attr("url"));  

        if($("#target_point_tutti").prop("checked")){
            $.get(url, function (data) {
                pointsTable.clear();
                for(var i = 0;i < data.length;i ++) {
                    pointsTable.row.add({
                        id: '', 
                        valore_n_1: (data[i].valore_n_1 || ""), 
                        descrizione_valore: (data[i].descrizione_valore || "")
                    });
                }
                pointsTable.draw();

            });
        } else if($("#target_pdv_tutti").prop("checked")) {
            pointFileUploader.startUpload();
        } else {
            $("#target_point_modal").modal();
            if(!pointsModalTable) {
                pointsModalTable = $("#target_point_lists").DataTable({
                    ajax: {
                        url: getLatestUrl($("#target_point_lists").attr("url"))
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

                        pointsModalTable.firstIds = firstIds;
                        pointsModalTable.setttings = setttings;
                    }
                });
            }
        }
    });

    $("#btn_target_agenti").click(function () {
        var url = getLatestUrl($("#nav-target-agenti").attr("url"));

        if($("#target_agenti_tutti").prop("checked")){
            $.get(url, function (data) {
                agentiaTable.clear();
                for(var i = 0;i < data.length;i ++) {
                    agentiaTable.row.add({
                        id: '', 
                        valore_n_1: (data[i].valore_n_1 || ""), 
                        descrizione_valore: (data[i].descrizione_valore || "")
                    });
                }
                agentiaTable.draw();
            });
        } else if($("#upload_target_agenti_from_file").prop("checked")) {
            agentiaFileUploader.startUpload();
        } else {
            $("#target_agenti_modal").modal();
            if(!agentisModalTable) {
                agentisModalTable = $("#target_agenti_lists").DataTable({
                    ajax: {
                        url: getLatestUrl($("#target_agenti_lists").attr("url"))
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

                        agentisModalTable.firstIds = firstIds;
                        agentisModalTable.setttings = setttings;
                    }
                });
            }
        }
    });

    $("#form_target_point").submit(function (e){
        e.preventDefault();
        var url = $(this).attr("action");

        var data = {"data":[], "deleted_data": []};
        var rows_selected = pointsModalTable.setttings.checkboxes.s.data[0];
        $.each(rows_selected, function(rowId, val){
            if(pointsModalTable.firstIds.indexOf(rowId) == -1) {
                data["data"].push(rowId);
            }
        });

        $.each(pointsModalTable.firstIds, function (ind, rowId) {
            if(!rows_selected[rowId]) {
                data['deleted_data'].push(rowId);
            }
        });

        pointsModalTable.firstIds = data['data'];

        data['gare-inserimentos-id'] = $("#gare-inserimentos-id").val();
        data['tipologia_id'] = 15;
        $.ajax({
            url: url,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            data: data
        }).done(function (data) {
            $("#target_point_modal").click();
            pointsTable.clear();
            for(var i = 0;i < data.length;i ++) {
                pointsTable.row.add({
                    id: '', 
                    valore_n_1: (data[i].valore_n_1 || ""), 
                    descrizione_valore: (data[i].descrizione_valore || "")
                });
            }
            pointsTable.draw();
        });
    })

    $("#form_target_agenti").submit(function (e){
        e.preventDefault();
        var url = $(this).attr("action");

        var data = {"data":[], "deleted_data": []};
        var rows_selected = agentisModalTable.setttings.checkboxes.s.data[0];
        $.each(rows_selected, function(rowId, val){
            if(agentisModalTable.firstIds.indexOf(rowId) == -1) {
                data["data"].push(rowId);
            }
        });

        $.each(agentisModalTable.firstIds, function (ind, rowId) {
            if(!rows_selected[rowId]) {
                data['deleted_data'].push(rowId);
            }
        });

        agentisModalTable.firstIds = data['data'];

        data['gare-inserimentos-id'] = $("#gare-inserimentos-id").val();
        data['tipologia_id'] = 16;
        $.ajax({
            url: url,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            data: data
        }).done(function (data) {
            $("#target_agenti_modal").click();
            agentiaTable.clear();
            for(var i = 0;i < data.length;i ++) {
                agentiaTable.row.add({
                    id: '', 
                    valore_n_1: (data[i].valore_n_1 || ""), 
                    descrizione_valore: (data[i].descrizione_valore || "")
                });
            }
            agentiaTable.draw();
        });
    });
});