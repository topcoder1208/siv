$(document).ready(function (){
    var pointsModalTable;
    var agentisModalTable;
    var dealersModalTable;
    var pointsTable;
    var agentiaTable;
    var dealersTable;
    var pointFileUploader;
    var agentiaFileUploader;
    var dealerFileUploader;
    $("#tabs a").on('click', function () {
        if(this.id != "nav-beneficiari-tab")
        {
            return;
        }

        if(!pointsTable) {
            pointsTable = $("#beneficiar_point_lists").DataTable({
                ajax: {
                    url: getLatestUrl($("#beneficiar_point_lists").attr('url'))
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
            agentiaTable = $("#beneficiar_agentia_lists").DataTable({
                ajax: {
                    url: getLatestUrl($("#beneficiar_agentia_lists").attr('url'))
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
            dealersTable = $("#beneficiar_dealer_lists").DataTable({
                ajax: {
                    url: getLatestUrl($("#beneficiar_dealer_lists").attr('url'))
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

            pointFileUploader = $("#beneficiari-pdv-file").uploadFile({
                url:getLatestUrl($("#beneficiari-pdv-file").attr("url")),
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

            agentiaFileUploader = $("#beneficiari-agentia-file").uploadFile({
                url:getLatestUrl($("#beneficiari-agentia-file").attr("url")),
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

            dealerFileUploader = $("#beneficiari-dealer-file").uploadFile({
                url:getLatestUrl($("#beneficiari-dealer-file").attr("url")),
                multiple:false,
                acceptFiles:".xlsx",
                fileName:"file",
                autoSubmit: false,
                uploadStr:"Scelgi il file di elenco",
                formData: {"_token":$('meta[name="csrf-token"]').attr('content')},
                onSuccess:function(files,data,xhr,pd)
                {
                    dealersTable.clear();
                    for(var i = 0;i < data.length;i ++) {
                        dealersTable.row.add({
                                id: '', 
                                valore_n_1: (data[i].valore_n_1 || ""), 
                                descrizione_valore: (data[i].descrizione_valore || "")
                            });
                    }
                    dealersTable.draw();
                }
            });
        } else {
            pointsTable.ajax.url(getLatestUrl($("#beneficiar_point_lists").attr('url')));
            agentiaTable.ajax.url(getLatestUrl($("#beneficiar_agentia_lists").attr('url')));
            dealersTable.ajax.url(getLatestUrl($("#beneficiar_dealer_lists").attr('url')));
            pointFileUploader.find('form').attr('action', getLatestUrl($("#beneficiari-pdv-file").attr("url")));
            agentiaFileUploader.find('form').attr('action', getLatestUrl($("#beneficiari-agentia-file").attr("url")));
            dealerFileUploader.find('form').attr('action', getLatestUrl($("#beneficiari-dealer-file").attr("url")));
        }
    });

    $("#btn-beneficiari-pdv-seleziona").click(function () {
        var url = getLatestUrl($("#nav-pdv").attr("url"));

        if($("#benficiari_pdv_tutti").prop("checked")){
            $.get(url, function (data) {
                pointsTable.ajax.reload();
            });
        } else if($("#benficiari_pdv_solo").prop("checked")) {
            pointFileUploader.startUpload();
        } else {
            $("#insert_pdv_modal").modal();
            if(!pointsModalTable) {
                pointsModalTable = $("#pdv_lists").DataTable({
                    ajax: {
                        url: getLatestUrl($("#pdv_lists").attr("url"))
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

    $("#btn_insert_agenti_modal").click(function () {
        var url = getLatestUrl($("#nav-agenti").attr("url"));

        if($("#benficiari_agneti_tutti").prop("checked")){
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
        } else if($("#benficiari_agneti_pdv_solo").prop("checked")) {
            agentiaFileUploader.startUpload();
        } else {
            $("#insert_agenti_modal").modal();
            if(!agentisModalTable) {
                agentisModalTable = $("#agenti_lists").DataTable({
                    ajax: {
                        url: getLatestUrl($("#agenti_lists").attr("url"))
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

    $("#btn_insert_dealer_modal").click(function () {
        var url = getLatestUrl($("#nav-dealer").attr("url"));

        if($("#benficiari_dealer_tutti").prop("checked")){
            $.get(url, function (data) {
                dealersTable.clear();
                for(var i = 0;i < data.length;i ++) {
                    dealersTable.row.add({
                        id: '', 
                        valore_n_1: (data[i].valore_n_1 || ""), 
                        descrizione_valore: (data[i].descrizione_valore || "")
                    });
                }
                dealersTable.draw();
            });
        } else if($("#benficiari_dealer_pdv_solo").prop("checked")) {
            dealerFileUploader.startUpload();
        } else {
            $("#insert_dealer_modal").modal();
            if(!dealersModalTable) {
                dealersModalTable = $("#dealer_lists").DataTable({
                    ajax: {
                        url: getLatestUrl($("#dealer_lists").attr("url"))
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

                        dealersModalTable.firstIds = firstIds;
                        dealersModalTable.setttings = setttings;
                    }
                });
            }
        }
    });

    $("#form-select-dealer-points").submit(function (e){
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
        data['tipologia_id'] = 10;
        $.ajax({
            url: url,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            data: data
        }).done(function (data) {
            $("#insert_pdv_modal").click();
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

    $("#form-select-dealers").submit(function (e){
        e.preventDefault();
        var url = $(this).attr("action");

        var data = {"data":[], "deleted_data": []};
        var rows_selected = dealersModalTable.setttings.checkboxes.s.data[0];
        $.each(rows_selected, function(rowId, val){
            if(dealersModalTable.firstIds.indexOf(rowId) == -1) {
                data["data"].push(rowId);
            }
        });

        $.each(dealersModalTable.firstIds, function (ind, rowId) {
            if(!rows_selected[rowId]) {
                data['deleted_data'].push(rowId);
            }
        });

        dealersModalTable.firstIds = data['data'];

        data['gare-inserimentos-id'] = $("#gare-inserimentos-id").val();
        data['tipologia_id'] = 11;
        $.ajax({
            url: url,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            data: data
        }).done(function (data) {
            $("#insert_dealer_modal").click();
            dealersTable.clear();
            for(var i = 0;i < data.length;i ++) {
                dealersTable.row.add({
                    id: '', 
                    valore_n_1: (data[i].valore_n_1 || ""), 
                    descrizione_valore: (data[i].descrizione_valore || "")
                });
            }
            dealersTable.draw();
        });
    });

    $("#form-select-agenti").submit(function (e){
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
        data['tipologia_id'] = 12;
        $.ajax({
            url: url,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            data: data
        }).done(function (data) {
            $("#insert_agenti_modal").click();
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