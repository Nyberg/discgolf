$(document).ready(function() {

    $( "#userDiscs" ).hide();
    $( "#datum" ).hide();
    $( "#bana" ).hide();
    $( "#type_form" ).hide();
    $( ".hole" ).hide();

    $(".status").change(function () {

        if ($(".status").val() == 'lost') {

            $( "#type_form" ).hide();
            $( "#userDiscs" ).show();
            $( "#datum" ).show();
            $( "#bana" ).show();

        }
        if($(".status").val() == 'found'){
            $("#type_form").show();
            $( "#userDiscs" ).hide();
            $( "#datum" ).show();
            $( "#bana" ).show();
        }
        if($(".status").val() == '0'){
            $( "#userDiscs" ).hide();
            $( "#type_form" ).hide();
        }
    });

    $i = 0;

    $(".course").change(function () {

        $i++;

        $(".hole").show();

        $("#target").find('option')
            .remove()
            .end()

        $('#target').html(' <option value="0" id="dropdown">Välj hål</option>');

        $.post('http://dg.dev:8000/getHoles', {id: $(".course").val()}, function (data) {
         $.each(data, function (index, value) {

         $('#target').append(' <option value=' + value.id + ' id="dropdown">' + value.number + '</option>');

            })
         })

    });

/*
    $(".type").change(function(){

                $.get('http://dg.dev:8000/getUsers', function (data) {
                    $.each(data, function (index, value) {
                        $('#players').append(' <option value='+value.id+' id="userdropdown">' + value.first_name + ' ' + value.last_name + '</option>');
                    })
                })

        }) */

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