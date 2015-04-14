var k = 1;
var j = 0;

function getGroupRounds(){
    $('#submit_gr').append('<i class="fa fa-spinner fa-spin"></i>');
    $.post(
        $(this).prop('action'),
        {
            "id": $('#group_id').val(),
            "round_id": $('#round_id').val()
        },
        function (data) {
            $('.fa-spinner').remove();
            $.each(data, function(index, value) {
                var j = 0;
                var par = getTotal(value.total);
                $('#group_round_'+k+'').append('<td><span data-toggle="tooltip" data-placement="top" title="'+value.username+'">' + value.username + ' - ' + value.total + ' ' +par+ '</span></td>');
                    $.each(data[k][j], function(index, value){
                        var result = getScore(value.score, value.par);
                        $('#group_round_'+k+'').append('<td class="'+result+'">' + value.score + ' (' + value.par + ')</span></td>');
                    j++;

                })
                k++;
            })

            $('#submit_gr').addClass('disabled');

            if(k == 1){
                $('#submit_gr').val('Hittade inga aktiva rundor!');
            }else{
                $('#submit_gr').val('Grupprundor hämtade!');
            }

        },'json'
    );
    return false;
}

function getTotal(total){
    var p = $('#par').text();
    var sum = total - p;
    return '(' + sum + ')';
}

function getScore(score, par){
    var num = score - par;

    if(par == 3){
        if(num == -2){
            return 'hole-in-one';
        }if(num == -1){
            return 'birdie';
        }if(num == 0){
            return 'par';
        }if(num == +1){
            return 'bogey';
        }if(num == +2){
            return 'dblbogey';
        }if(num == +3){
            return 'trpbogey';
        }if(num == +4){
            return 'quad';
        }
    }if(par == 4){
        if(num == -3){
            return 'hole-in-one';
        }
        if(num == -2){
            return 'eagle';
        }if(num == -1){
            return 'birdie';
        }if(num == 0){
            return 'par';
        }if(num == +1){
            return 'bogey';
        }if(num == +2){
            return 'dblbogey';
        }if(num == +3){
            return 'trpbogey';
        }if(num == +4){
            return 'quad';
        }
    }
}