var i = 0;

function getCompareRound(){
    $('#compare_round_'+i+'').append('<i class="fa fa-spinner fa-spin center-block"></i>');
    $('#compare').modal('hide');
    var info =  $('#type_id option:selected').text();
    i++;

    $.post(
        $(this).prop('action'),
        {
            "id": $('#type_id').val()
        },
        function (data) {
            console.log(data);
            $('.fa-spinner').remove();
            $('#compare_round_'+i+'').html('<td>'+info+'</td>');
            $.each(data, function(index, value) {
                var result = getScore(value.score, value.par);
                $('#compare_round_'+i+'').append('<td class="'+result+'">' + value.score + ' (' + value.par + ')</td>');
            })
        },'json'
    );
    return false;
}

function getScore(score, par){
    var num = score - par;

    if(par == 3){
        if(num == -2){
            return 'ace';
        }if(num == -1){
            return 'birdie';
        }if(num == 0){
            return '';
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
            return 'ace';
        }
        if(num == -2){
            return 'eagle';
        }if(num == -1){
            return 'birdie';
        }if(num == 0){
            return '';
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

