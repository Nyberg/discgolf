$(document).ready(function() {

    var url = 'dg.dev:8000';

    var i = 0;
    $.get('/notiser', function(data){
        $.each(data, function(index, value) {
            $('#notificationMenu').append('<li><a href="'+value.url+'" class="margin-top-bottom">'+ value.body +'</a></li>');
            if(value.is_read == 0)
            {
                i++;
            }
        })
        if(i != 0)
        {
            $('.badge-notify').append(i);
        }
    })
    $('#notification').click(function(e) {
        e.preventDefault();
        if(i != 0)
        {
            if(! $('.badge-notify').hasClass('hidden'))
            {
                $('.badge-notify').addClass('hidden');
            }
        }
        $.get('/removereadnotifications', function(data){

        })
    })
});