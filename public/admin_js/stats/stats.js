
function getData(){

    $.get('http://178.62.90.148/getUserData', {id: $("#id").val(), model: $("#model").val()}, function (data) {

    if (data['msg'] == 'success') {

        $('#chart-round-avg').highcharts({
            chart: {
                type: 'column',
                backgroundColor: {
                    linearGradient: { x1: 0, y1: 0, x2: 1, y2: 1 },
                    stops: [
                        [0, '#2C3E50'],
                        [1, '#2C3E50']
                    ]
                },
                style: {
                    fontFamily: "'Unica One', sans-serif",
                    color: '#ffffff'
                },
                plotBorderColor: '#E74C3C'
            },
            title: {
                text: 'Data',
                style: {
                    color: '#E0E0E3',
                    textTransform: 'uppercase',
                    fontSize: '1em'
                }
            },
            legend: {
                itemStyle: {
                    color: '#E0E0E3'
                },
                itemHoverStyle: {
                    color: '#FFF'
                },
                itemHiddenStyle: {
                    color: '#606063'
                }
            },
            subtitle: {
                text: 'Antal rundor: ' + data['rounds'] + ' - Antal kast: ' + data['shots'],
                style: {
                    color: '#E0E0E3',
                    textTransform: 'uppercase',
                    fontSize: '1em'
                }
            },

            xAxis: {

                categories: ['Flest birdies på en runda', 'Unkia banor spelade', 'Snittresultat', 'Bogeyfria rundor'],
                labels: {
                    style: {
                        color: '#E0E0E3'
                    }
                },
                lineColor: '#E0E0E3',
                minorGridLineColor: '#E74C3C',
                tickColor: '#E74C3C',
                tickWidth: 0,
                title: {
                    style: {
                        color: '#E0E0E3'
                    }
                }
            },
            yAxis: {
                gridLineColor: '#3e5871',
                labels: {
                    style: {
                        color: '#E0E0E3'
                    }
                },
                lineColor: '#E74C3C',
                minorGridLineColor: '#E74C3C',
                tickColor: '#E74C3C',
                tickWidth: 0,
                title: {
                    style: {
                        color: '#E0E0E3'
                    }
                }
            },
            credits: {
                enabled: false
            },
            colors: ["#E74C3C", "#90ee7e", "#f45b5b", "#7798BF", "#aaeeee", "#ff0066", "#eeaaee",
                "#55BF3B", "#DF5353", "#7798BF", "#aaeeee"],
            series: [{
                name: data['user'],
                data: [data['birdies'], data['cp'], data['avg'], data['bfr']]
            }]
        });
    }
    },'json'
        );
        return false;
    }


function getDataReload(){


    $.post(
        $(this).prop('action'),
        {
            "id": $('#id').val(),
            "user_id": $('#user_id').val(),
            "model": $('#model').val()
        },
        function (data) {

            console.log(data);

            if (data['msg'] == 'success') {

                $('#chart-round-avg').highcharts({
                    chart: {
                        type: 'column',
                        backgroundColor: {
                            linearGradient: { x1: 0, y1: 0, x2: 1, y2: 1 },
                            stops: [
                                [0, '#2C3E50'],
                                [1, '#2C3E50']
                            ]
                        },
                        style: {
                            fontFamily: "'Unica One', sans-serif",
                            color: '#ffffff'
                        },
                        plotBorderColor: '#E74C3C'
                    },
                    title: {
                        text: 'Data',
                        style: {
                            color: '#E0E0E3',
                            textTransform: 'uppercase',
                            fontSize: '1em'
                        }
                    },
                    legend: {
                        itemStyle: {
                            color: '#E0E0E3'
                        },
                        itemHoverStyle: {
                            color: '#FFF'
                        },
                        itemHiddenStyle: {
                            color: '#606063'
                        }
                    },
                    subtitle: {
                        text: 'Antal rundor: ' + data['rounds'] + ' - Antal kast: ' + data['shots'],
                        style: {
                            color: '#E0E0E3',
                            textTransform: 'uppercase',
                            fontSize: '1em'
                        }
                    },

                    xAxis: {

                        categories: ['Flest birdies på en runda', 'Unkia banor spelade', 'Snittresultat', 'Bogeyfria rundor'],
                        labels: {
                            style: {
                                color: '#E0E0E3'
                            }
                        },
                        lineColor: '#E0E0E3',
                        minorGridLineColor: '#E74C3C',
                        tickColor: '#E74C3C',
                        tickWidth: 0,
                        title: {
                            style: {
                                color: '#E0E0E3'
                            }
                        }
                    },
                    yAxis: {
                        gridLineColor: '#3e5871',
                        labels: {
                            style: {
                                color: '#E0E0E3'
                            }
                        },
                        lineColor: '#E74C3C',
                        minorGridLineColor: '#E74C3C',
                        tickColor: '#E74C3C',
                        tickWidth: 0,
                        title: {
                            style: {
                                color: '#E0E0E3'
                            }
                        }
                    },
                    credits: {
                        enabled: false
                    },
                    colors: ["#E74C3C", "#90ee7e", "#f45b5b", "#7798BF", "#aaeeee", "#ff0066", "#eeaaee",
                        "#55BF3B", "#DF5353", "#7798BF", "#aaeeee"],
                    series: [{
                        name: data['user'],
                        data: [data['birdies'], data['cp'], data['avg'], data['bfr']]
                    }]
                });

            }
        }, 'json'
    );
    return false;
}


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

                $('#chart-round-avg').highcharts({
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false,
                        type: 'areaspline',
                        backgroundColor: {
                            linearGradient: {x1: 0, y1: 0, x2: 1, y2: 1},
                            stops: [
                                [0, '#2C3E50'],
                                [1, '#2C3E50']
                            ]
                        },
                        style: {
                            fontFamily: "'Unica One', sans-serif",
                            color: '#ffffff'
                        },
                        plotBorderColor: '#E74C3C'
                    },
                    title: {
                        text: 'Dina resultat',
                        style: {
                            color: '#E0E0E3',
                            textTransform: 'uppercase',
                            fontSize: '1em'
                        }
                    },
                    tooltip: {
                        formatter: function () {
                            return 'Antal '+this.point.name+':<b> ' + this.y +' </b> (' + this.point.percentage.toFixed(2) +
                            '%)</b>';
                        }
                    },
                    subtitle: {
                        text: 'Antal kast: '+data['shots'] + ' - Snittresultat: '+ data['avg'],
                        style: {
                            color: '#E0E0E3',
                            textTransform: 'uppercase',
                            fontSize: '1em'
                        }
                    },
                    legend: {
                        itemStyle: {
                            color: '#E0E0E3'
                        },
                        itemHoverStyle: {
                            color: '#FFF'
                        },
                        itemHiddenStyle: {
                            color: '#606063'
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

            $('#chart-round-avg').highcharts({
                chart: {
                    type: 'areaspline',
                    backgroundColor: {
                        linearGradient: {x1: 0, y1: 0, x2: 1, y2: 1},
                        stops: [
                            [0, '#2C3E50'],
                            [1, '#2C3E50']
                        ]
                    },
                    style: {
                        fontFamily: "'Unica One', sans-serif",
                        color: '#ffffff'
                    },
                    plotBorderColor: '#E74C3C'
                },
                title: {
                    text: 'Senaste resultaten',
                    style: {
                        color: '#E0E0E3',
                        textTransform: 'uppercase',
                        fontSize: '1em'
                    }
                },

                legend: {
                    enabled: false
                },
                xAxis: {
                    categories: data[2]['date'],
                    labels: {
                        style: {
                            color: '#E0E0E3'
                        }
                    }
                },
                yAxis: {
                    gridLineColor: '#2C3E50',
                    labels: {
                        style: {
                            color: '#E0E0E3'
                        }
                    },
                    lineColor: '#E74C3C',
                    minorGridLineColor: '#E74C3C',
                    tickColor: '#E74C3C',
                    tickWidth: 0,
                    title: {
                        style: {
                            color: '#E0E0E3'
                        }
                    }
                },
                colors: ["#E74C3C", "#E74C3C", "#E74C3C", "#7798BF", "#aaeeee", "#ff0066", "#eeaaee",
                    "#55BF3B", "#DF5353", "#7798BF", "#aaeeee"],
                tooltip: {
                    valueSuffix: '',
                    formatter: function() {
                        return 'Resultat:<br/>'+
                        this.x +': <b>'+ this.y+'</b>';
                    }
                },
                series: data
            });

        },'json'
    );
    return false;
}

    function getFirstPie() {

        $('#stats').append('<br /><br/><i class="fa fa-spinner fa-spin fa-2x"></i>');
        $.get('http://178.62.90.148/getHoleStats', {id: $("#id").val(), model: $("#model").val()}, function (data) {

                if (data['msg'] == 'success') {
                    $('.fa-spinner').remove();

                    $('#chart-two').highcharts({
                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'Antal resultat för alla rundor'
                        },
                        subtitle: {
                            text: 'Antal kast: ' + data['shots'] + ' | Snittresultat: ' + data['avg'],
                        },
                        tooltip: {
                            formatter: function () {
                                return 'Antal ' + this.point.name + ':<b> ' + this.y + ' </b> (' + this.point.percentage.toFixed(2) +
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
                                ['Ace', data['ace']],
                                ['Eagle', data['eagle']],
                                ['Birdie', data['birdie']],
                                ['Par', data['par']],
                                ['Bogey', data['bogey']],
                                ['Dubbel Bogey', data['dblbogey']],
                                ['Trippel Bogey', data['trpbogey']],
                                ['Quad Bogey', data['quad']]
                            ]
                        }]
                    });
                }
            },'json'
        );
        return false;
    }

    function getSecondPie(){

        $('.fa-spinner').remove();
        $('#stats').append('<br /><br/><i class="fa fa-spinner fa-spin fa-2x"></i>');
        $.get('http://178.62.90.148/getRoundsPerMonth', {id: $("#id").val(), model: $("#model").val()}, function (data) {

            $('#chart-round-avg').highcharts({
                chart: {
                    type: 'areaspline',
                    backgroundColor: {
                        linearGradient: { x1: 0, y1: 0, x2: 1, y2: 1 },
                        stops: [
                            [0, '#2C3E50'],
                            [1, '#2C3E50']
                        ]
                    },
                    style: {
                        fontFamily: "'Unica One', sans-serif",
                        color: '#ffffff'
                    },
                    plotBorderColor: '#E74C3C'
                },
                title: {
                    text: 'Rundor varje månad',
                    style: {
                        color: '#E0E0E3',
                        textTransform: 'uppercase',
                        fontSize: '1em'
                    }
                },
                legend: {
                    itemStyle: {
                        color: '#E0E0E3'
                    },
                    itemHoverStyle: {
                        color: '#FFF'
                    },
                    itemHiddenStyle: {
                        color: '#606063'
                    }
                },
                xAxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Maj', 'Jun',
                        'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Dec'],
                    labels: {
                        style: {
                            color: '#E0E0E3'
                        }
                    }
                },
                yAxis: {
                    gridLineColor: '#2C3E50',
                    labels: {
                        style: {
                            color: '#E0E0E3'
                        }
                    },
                    lineColor: '#2C3E50',
                    minorGridLineColor: '#2C3E50',
                    tickColor: '#2C3E50',
                    tickWidth: 0,
                    title: {
                        style: {
                            color: '#E0E0E3'
                        }
                    }
                },
                colors: ["#E74C3C", "#90ee7e", "#f45b5b", "#7798BF", "#aaeeee", "#ff0066", "#eeaaee",
                    "#55BF3B", "#DF5353", "#7798BF", "#aaeeee"],
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

    function getRoundsPerMonth(){

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
                        chart: {
                            type: 'areaspline',
                            backgroundColor: {
                                linearGradient: {x1: 0, y1: 0, x2: 1, y2: 1},
                                stops: [
                                    [0, '#2C3E50'],
                                    [1, '#2C3E50']
                                ]
                            },
                            style: {
                                fontFamily: "'Unica One', sans-serif",
                                color: '#ffffff'
                            },
                            plotBorderColor: '#E74C3C'
                        },
                        title: {
                            text: 'Rundor varje månad',
                            style: {
                                color: '#E0E0E3',
                                textTransform: 'uppercase',
                                fontSize: '1em'
                            }
                        },
                        legend: {
                            itemStyle: {
                                color: '#E0E0E3'
                            },
                            itemHoverStyle: {
                                color: '#FFF'
                            },
                            itemHiddenStyle: {
                                color: '#606063'
                            }
                        },
                        xAxis: {
                            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Maj', 'Jun',
                                'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Dec'],
                            labels: {
                                style: {
                                    color: '#E0E0E3'
                                }
                            }
                        },
                        yAxis: {
                            gridLineColor: '#2C3E50',
                            labels: {
                                style: {
                                    color: '#E0E0E3'
                                }
                            },
                            lineColor: '#E74C3C',
                            minorGridLineColor: '#E74C3C',
                            tickColor: '#E74C3C',
                            tickWidth: 0,
                            title: {
                                style: {
                                    color: '#E0E0E3'
                                }
                            }
                        },
                        colors: ["#E74C3C", "#90ee7e", "#f45b5b", "#7798BF", "#aaeeee", "#ff0066", "#eeaaee",
                            "#55BF3B", "#DF5353", "#7798BF", "#aaeeee"],
                        tooltip: {
                            valueSuffix: 'st'
                        },
                        series: [{
                            name: data['user'],
                            data: [data['jan'], data['feb'], data['mar'], data['apr'], data['maj'], data['jun'], data['jul'], data['aug'], data['sep'], data['okt'], data['nov'], data['dec']]
                        }]
                    });
                }
        },'json'
    );
    return false;
}

    function getUserRounds(){

        $('.fa-spinner').remove();
        $('#stats').append('<br /><br/><i class="fa fa-spinner fa-spin fa-2x"></i>');
        $.get('http://178.62.90.148/getRoundsPerMonth', {id: $("#id").val(), model: $("#model").val()}, function (data) {

                console.log(data);

                $('#chart-round-avg').highcharts({
                    chart: {
                        type: 'areaspline',
                        backgroundColor: {
                            linearGradient: {x1: 0, y1: 0, x2: 1, y2: 1},
                            stops: [
                                [0, '#2C3E50'],
                                [1, '#2C3E50']
                            ]
                        },
                        style: {
                            fontFamily: "'Unica One', sans-serif",
                            color: '#ffffff'
                        },
                        plotBorderColor: '#E74C3C'
                    },
                    title: {
                        text: 'Rundor varje månad',
                        style: {
                            color: '#E0E0E3',
                            textTransform: 'uppercase',
                            fontSize: '1em'
                        }
                    },
                    legend: {
                        itemStyle: {
                            color: '#E0E0E3'
                        },
                        itemHoverStyle: {
                            color: '#FFF'
                        },
                        itemHiddenStyle: {
                            color: '#606063'
                        }
                    },
                    xAxis: {
                        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Maj', 'Jun',
                            'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Dec'],
                        labels: {
                            style: {
                                color: '#E0E0E3'
                            }
                        }
                    },
                    yAxis: {
                        gridLineColor: '#2C3E50',
                        labels: {
                            style: {
                                color: '#E0E0E3'
                            }
                        },
                        lineColor: '#E74C3C',
                        minorGridLineColor: '#E74C3C',
                        tickColor: '#E74C3C',
                        tickWidth: 0,
                        title: {
                            style: {
                                color: '#E0E0E3'
                            }
                        }
                    },
                    colors: ["#ffffff", "#E74C3C", "#f45b5b", "#7798BF", "#aaeeee", "#ff0066", "#eeaaee",
                        "#55BF3B", "#DF5353", "#7798BF", "#aaeeee"],
                    tooltip: {
                        valueSuffix: 'st'
                    },
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

function getUserRoundsReload(){

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
                chart: {
                    type: 'areaspline',
                    backgroundColor: {
                        linearGradient: {x1: 0, y1: 0, x2: 1, y2: 1},
                        stops: [
                            [0, '#2C3E50'],
                            [1, '#2C3E50']
                        ]
                    },
                    style: {
                        fontFamily: "'Unica One', sans-serif",
                        color: '#ffffff'
                    },
                    plotBorderColor: '#E74C3C'
                },
                title: {
                    text: 'Rundor varje månad',
                    style: {
                        color: '#E0E0E3',
                        textTransform: 'uppercase',
                        fontSize: '1em'
                    }
                },
                legend: {
                    itemStyle: {
                        color: '#E0E0E3'
                    },
                    itemHoverStyle: {
                        color: '#FFF'
                    },
                    itemHiddenStyle: {
                        color: '#606063'
                    }
                },
                xAxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Maj', 'Jun',
                        'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Dec'],
                    labels: {
                        style: {
                            color: '#E0E0E3'
                        }
                    }
                },
                yAxis: {
                    gridLineColor: '#2C3E50',
                    labels: {
                        style: {
                            color: '#E0E0E3'
                        }
                    },
                    lineColor: '#E74C3C',
                    minorGridLineColor: '#E74C3C',
                    tickColor: '#E74C3C',
                    tickWidth: 0,
                    title: {
                        style: {
                            color: '#E0E0E3'
                        }
                    }
                },
                colors: ["#ffffff", "#E74C3C", "#f45b5b", "#7798BF", "#aaeeee", "#ff0066", "#eeaaee",
                    "#55BF3B", "#DF5353", "#7798BF", "#aaeeee"],
                tooltip: {
                    valueSuffix: 'st'
                },
                series: [{
                    name: data['user'],
                    data: [data['u_jan'], data['u_feb'], data['mar'], data['apr'], data['maj'], data['jun'], data['jul'], data['aug'], data['sep'], data['okt'], data['nov'], data['dec']]
                },
                    {
                        name: data['model_name'],
                        data: [data['jan'], data['feb'], data['mar'], data['apr'], data['maj'], data['jun'], data['jul'], data['aug'], data['sep'], data['okt'], data['nov'], data['dec']]
                    }]
            });
            }
        },'json'
    );
    return false;
}



    function getRoundAvgScore(){

        $.get('http://178.62.90.148/getRoundAvgScore', {id: $("#id").val(), model: $("#model").val()}, function (data) {

                console.log(data);

                $('#chart-two').highcharts({
                    chart: {
                        type: 'line'
                    },
                    title: {
                        text: 'Snittresultat'
                    },
                    subtitle: {
                        text: 'Grafen visar rundans resultat per hål och snittet för alla hål på banan.'
                    },
                    xAxis: {
                        categories: ['1', '2', '3', '4', '5', '6',
                            '7', '8', '9', '10', '11', '12', '13','14','15','16','17','18'],
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
                    colors: ['#2C3E50', '#E74C3C', '#90FF7E'],
                    series: [{
                        name: 'Resultat',
                        data: [data['1'], data['2'], data['3'], data['4'], data['5'], data['6'], data['7'], data['8'], data['9'], data['10'], data['11'], data['12'], data['13'], data['14'], data['15'], data['16'], data['17'], data['18']]
                    },
                    {
                        name: 'Bansnitt',
                        data: [data['a1'], data['a2'], data['a3'], data['a4'], data['a5'], data['a6'], data['a7'], data['a8'], data['a9'], data['a10'], data['a11'], data['a12'], data['a13'], data['a14'], data['a15'], data['a16'], data['a17'], data['a18']]

                    },
                    {
                        name: 'Ditt snitt',
                        data: [data['u1'], data['u2'], data['u3'], data['u4'], data['u5'], data['u6'], data['u7'], data['u8'], data['u9'], data['u10'], data['u11'], data['u12'], data['u13'], data['u14'], data['u15'], data['u16'], data['u17'], data['u18']]

                    }]
                });

            },'json'
        );
        return false;
    }

function getRoundAvgStats(){

    $.post(
        $(this).prop('action'),
        {
            "id": $('#id').val(),
            "user_id": $('#user_id').val(),
            "model": $('#model').val(),
            "date_from": $('#date_from').val(),
            "date_to": $('#date_to').val(),
            "course_id": $('#teepads').val()

        },
        function (data) {

            console.log(data);


                $('#chart-round-avg').highcharts({
                    chart: {
                        type: 'areaspline',
                        backgroundColor: {
                            linearGradient: {x1: 0, y1: 0, x2: 1, y2: 1},
                            stops: [
                                [0, '#2C3E50'],
                                [1, '#2C3E50']
                            ]
                        },
                        style: {
                            fontFamily: "'Unica One', sans-serif",
                            color: '#ffffff'
                        },
                        plotBorderColor: '#E74C3C'
                    },
                    title: {
                        text: 'Senaste resultaten',
                        style: {
                            color: '#E0E0E3',
                            textTransform: 'uppercase',
                            fontSize: '1em'
                        }
                    },

                    legend: {
                        enabled: false
                    },
                    xAxis: {
                        categories: data[2]['date'],
                        labels: {
                            style: {
                                color: '#E0E0E3'
                            }
                        }
                    },
                    yAxis: {
                        gridLineColor: '#2C3E50',
                        labels: {
                            style: {
                                color: '#E0E0E3'
                            }
                        },
                        lineColor: '#E74C3C',
                        minorGridLineColor: '#E74C3C',
                        tickColor: '#E74C3C',
                        tickWidth: 0,
                        title: {
                            style: {
                                color: '#E0E0E3'
                            }
                        }
                    },
                    colors: ["#E74C3C", "#E74C3C", "#E74C3C", "#7798BF", "#aaeeee", "#ff0066", "#eeaaee",
                        "#55BF3B", "#DF5353", "#7798BF", "#aaeeee"],
                    tooltip: {
                        valueSuffix: '',
                        formatter: function() {
                            return 'Resultat:<br/>'+
                            this.x +': <b>'+ this.y+'</b>';
                        }
                    },
                    series: data
                });

        },'json'
    );
    return false;
}