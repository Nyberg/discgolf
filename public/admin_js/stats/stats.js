
function getUserPie() {

    $.post(
        $(this).prop('action'),
        {
            "id": $('#id').val(),
            "user_id": $('#user_id').val(),
            "model": $('#model').val()
        },
        function (data) {

            if (data['msg'] == 'success') {

                $('#chart-user').highcharts({
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false
                    },
                    title: {
                        text: 'Dina resultat'
                    },
                    subtitle: {
                        text: 'Antal kast: '+data['shots'] + ' | Snittresultat: '+ data['avg'],
                        x: -20
                    },
                    tooltip: {
                        formatter: function () {
                            return 'Antal '+this.point.name+':<b> ' + this.y +' </b> (' + this.point.percentage.toFixed(2) +'%)</b>';
                        }
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: false
                            },
                            showInLegend: true
                        }
                    },
                    colors: ['#FFCE00', '#90FF7E', '#C0FFB6', '#F5F5F5', '#FFC1C1',
                        '#f99090', '#f97777', '#f55656'],
                    series: [{
                        type: 'pie',
                        name: 'Procent',
                        data: [
                            ['Ace',   data['ace']],
                            ['Eagle',   data['eagle']],
                            ['Birdie',   data['birdie']],
                            ['Par',       data['par']],
                            ['Bogey',       data['bogey']],
                            ['Dubbel Bogey',       data['dblbogey']],
                            ['Trippel Bogey',       data['trpbogey']],
                            ['Quad Bogey',       data['quad']]
                        ]
                    }]
                });

            }
        }, 'json'
    );
    return false;
}

function getRoundAvg(){

    $.post(
        $(this).prop('action'),
        {
            "id": $('#id').val(),
            "user_id": $('#user_id').val(),
            "model": $('#model').val()
        },
        function (data) {

            if (data['msg'] == 'success') {
                $('#chart-round-avg').highcharts({
                    title: {
                        text: '5 senaste resultaten',
                        x: -20 //center
                    },
                    xAxis: {
                        categories: [data['d1'], data['d2'], data['d3'], data['d4'], data['d5']]
                    },
                    yAxis: {
                        title: {
                            text: 'Rundor'
                        },
                        plotLines: [{
                            value: 0,
                            width: 1,
                            color: '#808080'
                        }]
                    },
                    tooltip: {
                        valueSuffix: ''
                    },
                    colors: ['#E74C3C'],

                    series: [{
                        name: 'Resultat',
                        data: [data['1'], data['2'], data['3'], data['4'], data['5']]
                    }]
                });
            }
        },'json'
    );
    return false;
}

    function getFirstPie() {

        $('#stats').append('<br /><br/><i class="fa fa-spinner fa-spin fa-2x"></i>');
        $.get('http://dg.dev:8000/getHoleStats', {id: $("#id").val(), model: $("#model").val()}, function (data) {

                if (data['msg'] == 'success') {
                    $('.fa-spinner').remove();

                    $('#chart-one').highcharts({
                        chart: {
                            plotBackgroundColor: null,
                            plotBorderWidth: null,
                            plotShadow: false
                        },
                        title: {
                            text: 'Antal resultat för alla rundor'
                        },
                        subtitle: {
                            text: 'Antal kast: '+data['shots'] + ' | Snittresultat: '+ data['avg'],
                            x: -20
                        },
                        tooltip: {
                            formatter: function () {
                                return 'Antal '+this.point.name+':<b> ' + this.y +' </b> (' + this.point.percentage.toFixed(2) +
                                '%)</b>';
                            }
                        },
                        plotOptions: {
                            pie: {
                                allowPointSelect: true,
                                cursor: 'pointer',
                                dataLabels: {
                                    enabled: false
                                },
                                showInLegend: true
                            }
                        },
                        colors: ['#FFCE00', '#90FF7E', '#C0FFB6', '#F5F5F5', '#FFC1C1',
                            '#f99090', '#f97777', '#f55656'],
                        series: [{
                            type: 'pie',
                            name: 'Procent',
                            data: [
                                ['Ace',   data['ace']],
                                ['Eagle',   data['eagle']],
                                ['Birdie',   data['birdie']],
                                ['Par',       data['par']],
                                ['Bogey',       data['bogey']],
                                ['Dubbel Bogey',       data['dblbogey']],
                                ['Trippel Bogey',       data['trpbogey']],
                                ['Quad Bogey',       data['quad']]
                            ]
                        }]
                    });
                }
            }, 'json'
        );
        return false;
    }

    function getSecondPie(){

        $('.fa-spinner').remove();
        $('#stats').append('<br /><br/><i class="fa fa-spinner fa-spin fa-2x"></i>');
        $.get('http://dg.dev:8000/getRoundsPerMonth', {id: $("#id").val(), model: $("#model").val()}, function (data) {


            $('#chart-two').highcharts({
                title: {
                    text: 'Rundor varje månad',
                    x: -20 //center
                },
                xAxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Maj', 'Jun',
                        'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Dec']
                },
                yAxis: {
                    title: {
                        text: 'Rundor'
                    },
                    plotLines: [{
                        value: 0,
                        width: 1,
                        color: '#808080'
                    }]
                },
                tooltip: {
                    valueSuffix: 'st'
                },
                series: [{
                    name: data['user'],
                    data: [data['jan'], data['feb'], data['mar'], data['apr'], data['maj'], data['jun'], data['jul'], data['aug'], data['sep'], data['okt'], data['nov'], data['dec']]
                }]
            });


        },'json'
    );
    return false;
}

function getUserRounds(){

    $('.fa-spinner').remove();
    $('#stats').append('<br /><br/><i class="fa fa-spinner fa-spin fa-2x"></i>');
    $.get('http://dg.dev:8000/getRoundsPerMonth', {id: $("#id").val(), model: $("#model").val()}, function (data) {

            $('#chart-two').highcharts({
                title: {
                    text: 'Rundor varje månad',
                    x: -20 //center
                },
                xAxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Maj', 'Jun',
                        'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Dec']
                },
                yAxis: {
                    title: {
                        text: 'Rundor'
                    },
                    plotLines: [{
                        value: 0,
                        width: 1,
                        color: '#808080'
                    }]
                },
                tooltip: {
                    valueSuffix: 'st'
                },
                colors: ['#E74C3C', '#2C3E50'],

                series: [{
                        name: data['user'],
                        data: [data['u_jan'], data['u_feb'], data['mar'], data['apr'], data['maj'], data['jun'], data['jul'], data['aug'], data['sep'], data['okt'], data['nov'], data['dec']]
                    },
                    {
                        name: data['model_name'],
                        data: [data['jan'], data['feb'], data['mar'], data['apr'], data['maj'], data['jun'], data['jul'], data['aug'], data['sep'], data['okt'], data['nov'], data['dec']]
                    }]
            });

        },'json'
    );
    return false;
}



function getRoundAvgScore(){

    $('.fa-spinner').remove();
    $.get('http://dg.dev:8000/getRoundAvgScore', {id: $("#id").val(), model: $("#model").val()}, function (data) {
            console.log(data);
            $('#chart-two').highcharts({
                chart: {
                    type: 'line'
                },
                title: {
                    text: 'Snittresultat',
                    x: -20 //center
                },
                subtitle: {
                    text: 'Grafen visar rundans resultat per hål och snittet för alla hål på banan.',
                    x: -20
                },
                xAxis: {
                    categories: ['1', '2', '3', '4', '5', '6',
                        '7', '8', '9', '10', '11', '12', '13','14','15','16','17','18']
                ,
                    tickmarkPlacement: 'on',
                    title: {
                        enabled: false
                    }
                },
                yAxis: {
            title: {
                text: 'Resultat'
            }

        },
        tooltip: {
            shared: true,
                valueSuffix: ''
        },
        plotOptions: {
            area: {
                pointStart: 0,
                marker: {
                    enabled: false,
                    symbol: 'circle',
                    radius: 2,
                    states: {
                        hover: {
                            enabled: true
                        }
                    }
                }
            }
        },
                colors: ['#2C3E50', '#C0FFB6', '#E74C3C'],
                series: [{
                    name: 'Resultat',
                    data: [data['1'], data['2'], data['3'], data['4'], data['5'], data['6'], data['7'], data['8'], data['9'], data['10'], data['11'], data['12'], data['13'], data['14'], data['15'], data['16'], data['17'], data['18']]
                },
                {
                    name: 'Bansnitt',
                    data: [data['a1'], data['a2'], data['a3'], data['a4'], data['a5'], data['a6'], data['a7'], data['a8'], data['a9'], data['a10'], data['a11'], data['a12'], data['a13'], data['a14'], data['a15'], data['a16'], data['a17'], data['a18']]

                },
                {
                    name: 'Ditt snitt (kommer snart)',
                    data: [data['u1'], data['u2'], data['u3'], data['u4'], data['u5'], data['u6'], data['u7'], data['u8'], data['u9'], data['u10'], data['u11'], data['u12'], data['u13'], data['u14'], data['u15'], data['u16'], data['u17'], data['u18']]

                }]
            });

        },'json'
    );
    return false;
}

