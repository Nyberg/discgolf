var i = 0;

function getCompareRound(){
    $('#submit_compare').append('<i class="fa fa-spinner fa-spin"></i>');
    $('#compare').modal('hide');
    var info =  $('#type_id option:selected').text();

    $.post(
        $(this).prop('action'),
        {
            "id": $('#type_id').val()
        },
        function (data) {
            i++;
            $('.fa-spinner').remove();
            $('#compare_round_'+i+'').html('<td>'+info+'</td>');
            $.each(data, function(index, value) {
                var result = getScore(value.score, value.par);
                $('#compare_round_'+i+'').append('<td class="'+result+'">' + value.score + ' (' + value.par + ')</td>');
            })

            if(i == 10){
                $('#submit_compare').addClass('disabled');
                $('#submit_compare').text('Du kan inte jämföra fler rundor!');
            }else{

            }
        },'json'
    );
    return false;
}

function addToCompare(){

    $.post(
        $(this).prop('action'),
        {
            "id": $('#round_id').val()
        },
        function (data) {
            console.log(data);
            if(data != 0)
            {
                $('.badge-compare').html(data);
                $('#add_to_compare_btn').addClass('disabled');
                $('#add_to_compare_btn').val('Rundan sparad!');
            }
        },'json'
    );
    return false;
}

function getCompareNumber(){

    $.get('/getCompareNumber', function(data){
        console.log(data);
        if(data != 0)
        {
            $('.badge-compare').append(data);
        }
    })
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
        }if(num >= +5){
            return 'other';
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
        }if(num >= +5){
            return 'other';
        }
    }
}

