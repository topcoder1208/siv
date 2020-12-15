$(document).ready(function (){
    $("#form-gareInserimentos-brand").submit(function (e) {
        e.preventDefault();
        var url = $(this).attr("action");
        var formValues = $(this).serializeArray();
        var data = {brand_categories: []};
        for(var i = 0;i < formValues.length;i ++) {
            if(formValues[i].name == "brand_category")
            {
                data.brand_categories.push(formValues[i].value);
            }
            else
            {
                data[formValues[i].name] = formValues[i].value;
            }
        }

        data['gare-inserimentos-id'] = $('#gare-inserimentos-id').val();

        delete data['_token'];

        $.ajax({
            url: url,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            data: data
        }).done(function (data) {
            if(data == "success") {
                // alert("Success");
            }
        });
    });

    $("#tim-all-checkbox").change(function (){
        if($(this).prop("checked")) {
            $(".brand-check").prop("checked", true);
        }else {
            $(".brand-check").prop("checked", false);
        }
    });
});