$(document).ready(function () {
    var datatable = $("#offertes_list").DataTable({
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

    $.get(getLatestUrl($("#offertes_list").attr("url")), function (data) {
        var ids = [];
        var i = 0;
        while(1) {
            if(datatable.row(i).data() === undefined) {
                break;
            }
            ids.push(parseInt(datatable.row(i).data()[0]));
            i ++;
        }

        for(var i = 0;i < data.length;i ++) {
            if(ids.indexOf(parseInt(data[i].valore_n_1)) > -1)
            {
                datatable.row(ids.indexOf(parseInt(data[i].valore_n_1))).select(true);
            }
        }
    });

    $("#nav-fasce .save").click(function () {
        var url = $(this).attr("action");
        
        var ids = [];
        var i = 0;
        while(1) {
            if(datatable.row(i).data() === undefined) {
                break;
            }
            ids.push(parseInt(datatable.row(i).data()[0]));
            i ++;
        }

        var data = {};
        data['gare-inserimentos-id'] = $("#gare-inserimentos-id").val();
        data['offertes-ids'] = [];
        data['offertes-names'] = [];
        var checked = datatable.column(0).checkboxes.selected();
        for(var i = 0;i < checked.length;i ++) {
            data['offertes-ids'].push(checked[i]);
            data['offertes-names'].push(datatable.row(ids.indexOf(parseInt(checked[i]))).data()[1]);
        }

        data['val'] = $("#inp_fasce").val();
        $.ajax({
            url: url,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            data: data
        }).done(function (data) {
            
        });
    });
});