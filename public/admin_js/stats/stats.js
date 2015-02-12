
function getUserPie() {

    $('.fa-spinner').remove();
    $('.percent-calc').remove();
    $('#result').append('<br /><br/><i class="fa fa-spinner fa-spin fa-2x"></i>');

    $.post(
        $(this).prop('action'),
        {
            "id": $('#id').val(),
            "user_id": $('#user_id').val(),
            "model": $('#model').val()
        },
        function (data) {

            if (data['msg'] == 'success') {
                $('.fa-spinner').remove();
                $("#result").html('<br/><h4>Din Statistik</h4><p class="text-center">Snittresultat: ' + data['avg'] + ' | Antal kast: ' + data['shots'] + ' | Antal rundor: ' + data['rounds'] + '</p>');

                Morris.Donut({
                    element: 'donut-example',
                    data: [
                        {
                            label: "Ace",
                            value: data['ace'],
                            formatted: data['ace'] + ' (' + (data['ace'] / data['results'] * 100).toFixed(2) + '% )'
                        },
                        {
                            label: "Eagle",
                            value: data['eagle'],
                            formatted: data['eagle'] + ' (' + (data['eagle'] / data['results'] * 100).toFixed(2) + '%)'
                        },
                        {
                            label: "Birdie",
                            value: data['birdie'],
                            formatted: data['birdie'] + ' (' + (data['birdie'] / data['results'] * 100).toFixed(2) + '%)'
                        },
                        {
                            label: "Par",
                            value: data['par'],
                            formatted: data['par'] + ' (' + (data['par'] / data['results'] * 100).toFixed(2) + '%)'
                        },
                        {
                            label: "Bogey",
                            value: data['bogey'],
                            formatted: data['bogey'] + ' (' + (data['bogey'] / data['results'] * 100).toFixed(2) + '%)'
                        },
                        {
                            label: "Double Bogey",
                            value: data['dblbogey'],
                            formatted: data['dblbogey'] + ' (' + (data['dblbogey'] / data['results'] * 100).toFixed(2) + '%)'
                        },
                        {
                            label: "Trippel Bogey",
                            value: data['trpbogey'],
                            formatted: data['trpbogey'] + ' (' + (data['trpbogey'] / data['results'] * 100).toFixed(2) + '%)'
                        },
                        {
                            label: "Quad Bogey",
                            value: data['quad'],
                            formatted: data['quad'] + ' (' + (data['quad'] / data['results'] * 100).toFixed(2) + '%)'
                        }
                    ],
                    labelColor: '#2C3E50',
                    colors: [
                        '#FFCE00',
                        '#90FF7E',
                        '#C0FFB6',
                        '#F5F5F5',
                        '#FFC1C1',
                        '#f99090',
                        '#f97777',
                        '#f55656'
                    ],
                    formatter: function (x, data) {
                        return data.formatted
                    }
                });

            }
        }, 'json'
    );
    return false;
}

    function getFirstPie() {

        $('.fa-spinner').remove();
        $('.percent-calc').remove();
        $('#stats').append('<br /><br/><i class="fa fa-spinner fa-spin fa-2x"></i>');
        $.get('http://dg.dev:8000/getHoleStats', {id: $("#id").val(), model: $("#model").val()}, function (data) {

                if (data['msg'] == 'success') {
                    $('.fa-spinner').remove();

                    Morris.Donut({
                        element: 'donut-stats',
                        data: [
                            {
                                label: "Ace",
                                value: data['ace'],
                                formatted: data['ace'] + ' (' + (data['ace'] / data['results'] * 100).toFixed(2) + '% )'
                            },
                            {
                                label: "Eagle",
                                value: data['eagle'],
                                formatted: data['eagle'] + ' (' + (data['eagle'] / data['results'] * 100).toFixed(2) + '%)'
                            },
                            {
                                label: "Birdie",
                                value: data['birdie'],
                                formatted: data['birdie'] + ' (' + (data['birdie'] / data['results'] * 100).toFixed(2) + '%)'
                            },
                            {
                                label: "Par",
                                value: data['par'],
                                formatted: data['par'] + ' (' + (data['par'] / data['results'] * 100).toFixed(2) + '%)'
                            },
                            {
                                label: "Bogey",
                                value: data['bogey'],
                                formatted: data['bogey'] + ' (' + (data['bogey'] / data['results'] * 100).toFixed(2) + '%)'
                            },
                            {
                                label: "Double Bogey",
                                value: data['dblbogey'],
                                formatted: data['dblbogey'] + ' (' + (data['dblbogey'] / data['results'] * 100).toFixed(2) + '%)'
                            },
                            {
                                label: "Trippel Bogey",
                                value: data['trpbogey'],
                                formatted: data['trpbogey'] + ' (' + (data['trpbogey'] / data['results'] * 100).toFixed(2) + '%)'
                            },
                            {
                                label: "Quad Bogey",
                                value: data['quad'],
                                formatted: data['quad'] + ' (' + (data['quad'] / data['results'] * 100).toFixed(2) + '%)'
                            }
                        ],
                        labelColor: '#2C3E50',
                        colors: [
                            '#FFCE00',
                            '#90FF7E',
                            '#C0FFB6',
                            '#F5F5F5',
                            '#FFC1C1',
                            '#f99090',
                            '#f97777',
                            '#f55656'
                        ],
                        formatter: function (x, data) {
                            return data.formatted
                        }
                    });

                }
            }, 'json'
        );
        return false;
    }




