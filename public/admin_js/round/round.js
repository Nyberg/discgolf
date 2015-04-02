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

            $.post('/getTees', {id: $(".teepads" ).val()}, function(data){
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

            if($(".type").val() == 'Grupp'){

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
});