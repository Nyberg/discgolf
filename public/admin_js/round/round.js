$(document).ready(function() {

    $( ".user" ).hide();
    $( ".tee" ).hide();
    $("#scorePage").hide();

    $i = 0;

    $('.teepads').on('click', function() {

        $i++;

    });

    $( ".teepads" ).change(function() {

        $(".tee").show();

        if($i > 1){

            $('#dropdown').remove();
        }else{

        }

            $.post('http://178.62.90.148/getTees', {id: $(".teepads" ).val()}, function(data){
            $.each(data, function(index, value) {

                $('#target').append(' <option value='+value.id+' id="dropdown">' + value.color +'</option>');

            })
        })

    });

    $j = 0;

    $('.type').on('click', function() {

        $j++;

    });

    $(".type").change(function(){

        if($(".type").val() == 'Singel'){

            $(".user").hide();
        }

            if($(".type").val() == "Par") {

                $(".user").show();

            if($j == 1){

                $.get('http://178.62.90.148/getUsers', function (data) {
                    $.each(data, function (index, value) {
                        $('#players').append(' <option value='+value.id+' id="userdropdown">' + value.first_name + ' ' + value.last_name + '</option>');
                    })
                })

            }else{

            }

        }
    })

  /*  $(".getScore").on('click', function(){

        $("#scorePage").show();
        $("#scorecard").show();

        $.post('http://dg.dev:8000/getScore', {id: $('#target').find(":selected").val()}, function (data) {
            $.each(data, function (index, value) {
                $('#scorecard').append(' <div class="col-lg-6"><p>' + value.id + ' ' + value.par + '</p></div>');
            })
        })

    }); */


});