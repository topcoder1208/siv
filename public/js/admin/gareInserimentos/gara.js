$(document).ready(function (){
    $("#form-gareInserimentos-gara").submit(function (e) {
        e.preventDefault();
        var url = $(this).attr("action");
        var formValues = $(this).serializeArray();
        var data = {};
        for(var i = 0;i < formValues.length;i ++) {
            data[formValues[i].name] = formValues[i].value;
        }
        delete data['_token'];

        delete data['gare-inserimentos-id'];

        $.ajax({
            url: url,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            data: data
        }).done(function (data) {
            if(data.result == "success") {
                $("#gare-inserimentos-id").val(data.id);
            }
        });
    });
});