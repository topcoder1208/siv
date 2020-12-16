$(document).ready(function () {
    $("#tabs a").on('click', function () {
        if(this.id != "nav-visibilita-tab")
        {
            return;
        }

        var url = getLatestUrl($("#form_visibilitas").attr("url"));
        console.log(url);
        $.get(url, function (data) {
            for(var i = 0;i < data.length;i ++)
            {
                $("#visibillita_" + data[i].valore_n_1).prop("checked", true);
            }
        });
    });

    $("#form_visibilitas").submit(function (e){
        e.preventDefault();
        var url = $(this).attr("action");
        var data = $(this).serializeArray();
        data.push({'name': 'gare-inserimentos-id', 'value': $("#gare-inserimentos-id").val()});

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