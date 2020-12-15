$(document).ready(function (){
    $(".go-back").click(function () {
        $("#nav-tab > .active").prev().click();
    });

    $(".go-next").click(function () {
        $("#nav-tab > .active").next().click();
    });

    $("#form_dipendenze").submit(function (e) {
        e.preventDefault();
        var url = getLatestUrl($(this).attr("action"));
        $.ajax({
            url: url,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "PUT",
            data: $(this).serialize()
        }).done(function (data) {
            if(data == "success") {
                // alert("Success");
            }
        });
    });
});

function getLatestUrl(base_url) {
    base_url = base_url.split("/");
    base_url[base_url.length - 1] = ($("#gare-inserimentos-id").val() || 0);
    base_url = base_url.join("/");
    return base_url;
}