$(document).ready(function() {
    var i = 0;
    $.get('http://178.62.90.148/notiser', function(data){
        $.each(data, function(index, value) {
            console.log(value);
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
        $.get('http://178.62.90.148/removereadnotifications', function(data){

        })
    })
});