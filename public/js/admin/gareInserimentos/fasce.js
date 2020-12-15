$(document).ready(function () {
    $("#nav-fasce .save").click(function () {
        var url = $(this).attr("action");

        var data = {};
        data['gare-inserimentos-id'] = $("#gare-inserimentos-id").val();
        data['brand-tiplogias'] = [];
        for(var i = 0;i < $("[name='brand-tiplogias']").length;i ++) {
            if($("[name='brand-tiplogias']").eq(i).prop("checked")) 
            {
                data['brand-tiplogias'].push($("[name='brand-tiplogias']").eq(i).val());
            }
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