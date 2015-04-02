$(document).ready(function() {

    $( "#userDiscs" ).hide();
    $( "#datum" ).hide();
    $( "#bana" ).hide();
    $( "#type_form" ).hide();

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
});