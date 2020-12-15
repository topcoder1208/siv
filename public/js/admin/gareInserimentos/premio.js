$(document).ready(function () {
    $("#tabs a").on('click', function () {
        if(this.id != "nav-premio-tab")
        {
            return;
        }

        var fasco = parseInt($("#inp_fasce").val());
        if(isNaN(fasco)) {
            alert("please input fasco");
            return;
        }

        var url = $("#premio_table").attr("url");
        url = url.split("/");
        url[url.length - 1] = $("#gare-inserimentos-id").val();
        url = url.join("/");
        $.get(url, function (data) {
            var str = "";
            str += "<tr>";
            str += "<td>#</td>";
            for(var i = 0;i < fasco;i ++) {
                str += "<td colspan='4'>F" +(i + 1)+ "</td>";
            }
            str += "</tr>";
            str += "<tr>";
            str += "<td>Quantità da applicare a tutti</td>";
            for(var i = 0;i < fasco;i ++) {
                str += '<td colspan="2" class="tar">';
                str += '<input type="text" class="form-control input-apply-' +i+ '">';
                str += '</td>';
                str += '<td colspan="2" class="tal">';
                str += '<button class="btn btn-outline-info btn-apply" col="' +i+ '">Applica</button>';
                str += '</td>';
            }
            str += '</tr>';
            str += '<tr><td>SOGLIE</td>';
            for(var i = 0;i < fasco;i ++) {
                str += '<td class="tar">>=</td>\
                <td class="tal"><input type="text" name="soglies" class="form-control input-soglies"></td>\
                <td class="tar"><=</td>\
                <td class="tal"><input type="text" name="soglies" class="form-control input-soglies"></td>';
            }
            str += "</tr>";
                
            for(var i = 0;i < data.checked_categories.length;i ++) {
                str += '<tr>';
                str += '<td>' + data.checked_categories[i].descrizione_valore + '</td>';
                for(var j = 0;j < fasco;j ++) {
                    str += '<td colspan="4">';
                    str += '<input type="text" name="" class="form-control value-inputs apply-col-' +j+ '" col="' +j+ '">';
                    str += '</td>';
                }
                str += '</tr>';
            }

            $("#premio_table").html(str);
            for(var i = 0;i < data.soglies.length;i ++) {
                $(".input-soglies").eq(i).val(data.soglies[i].valore_n_1);
            }

            for(var i = 0;i < data.values.length;i ++) {
                $(".apply-col-" + data.values[i].valore_n_2).eq(data.values[i].valore_n_3).val(data.values[i].valore_n_1);
            }
        });
    });

    $("body").on("click", ".btn-apply", function () {
        var col = $(this).attr("col");
        var val = $(".input-apply-" + col).val();
        $(".apply-col-" + col).val(val);
    });

    $("#nav-premio .save").click(function (){
        var url = $(this).attr("action");
        var data = {};
        data['gare-inserimentos-id'] = $("#gare-inserimentos-id").val();
        data['premio_type'] = ($("#premio_subject").prop("checked") ? $("#premio_subject").val() : $("#premio_money").val());
        data['premio_value'] = $("#premio_value").val();

        data['soglies'] = [];
        var soglies_inputs = $(".input-soglies");
        for(var i = 0;i < soglies_inputs.length;i ++) {
            data['soglies'].push(soglies_inputs.eq(i).val());
        }

        data['values'] = [];
        var value_inputs = $(".value-inputs");
        for(var i = 0;i < value_inputs.length;i ++) {
            var col = parseInt(value_inputs.eq(i).attr('col'));
            if(!data['values'][col])
            {
                data['values'][col] = [];
            }

            data['values'][col].push(value_inputs.eq(i).val());
        }

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