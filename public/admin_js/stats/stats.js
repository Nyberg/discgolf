/* Översiktligt statistik, birdies, bfr, unika banor (laddas automatiskt) */
function getData(){

    $.get('/getUserData', {id: $("#id").val(), model: $("#model").val()}, function (data) {

    if (data['msg'] == 'success') {

        $('#chart-round-avg').highcharts({
            chart: {
                type: 'column',
                backgroundColor: {
                    linearGradient: { x1: 0, y1: 0, x2: 1, y2: 1 },
                    stops: [
                        [0, '#333'],
                        [1, '#333']
                    ]
                },
                style: {
                    fontFamily: "'Unica One', sans-serif",
                    color: '#ffffff'
                },
                plotBorderColor: '#87D37C'
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
                lineColor: '#555',
                minorGridLineColor: '#555',
                tickColor: '#555',
                tickWidth: 0,
                title: {
                    style: {
                        color: '#E0E0E3'
                    }
                }
            },
            yAxis: {
                gridLineColor: '#444',
                labels: {
                    style: {
                        color: '#E0E0E3'
                    }
                },
                lineColor: '#444',
                minorGridLineColor: '#444',
                tickColor: '#444',
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
            colors: ["#87D37C", "#87D37C", "#87D37C", "#87D37C", "#aaeeee", "#ff0066", "#eeaaee",
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

/* Översiktligt statistik, birdies, bfr, unika banor (laddas vid klick) */
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
                                [0, '#333'],
                                [1, '#333']
                            ]
                        },
                        style: {
                            fontFamily: "'Unica One', sans-serif",
                            color: '#ffffff'
                        },
                        plotBorderColor: '#87D37C'
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
                        lineColor: '#555',
                        minorGridLineColor: '#555',
                        tickColor: '#555',
                        tickWidth: 0,
                        title: {
                            style: {
                                color: '#E0E0E3'
                            }
                        }
                    },
                    yAxis: {
                        gridLineColor: '#444',
                        labels: {
                            style: {
                                color: '#E0E0E3'
                            }
                        },
                        lineColor: '#444',
                        minorGridLineColor: '#444',
                        tickColor: '#444',
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
                    colors: ["#87D37C", "#87D37C", "#87D37C", "#87D37C", "#aaeeee", "#ff0066", "#eeaaee",
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
                                [0, '#333333'],
                                [1, '#333333']
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
                            [0, '#333333'],
                            [1, '#333333']
                        ]
                    },
                    style: {
                        fontFamily: "'Unica One', sans-serif",
                        color: '#ffffff'
                    },
                    plotBorderColor: '#87D37C'
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
                    gridLineColor: '#444444',
                    labels: {
                        style: {
                            color: '#E0E0E3'
                        }
                    },
                    lineColor: '#87D37C',
                    minorGridLineColor: '#87D37C',
                    tickColor: '#87D37C',
                    tickWidth: 0,
                    title: {
                        style: {
                            color: '#E0E0E3'
                        }
                    }
                },
                colors: ["#87D37C", "#87D37C", "#87D37C", "#7798BF", "#aaeeee", "#ff0066", "#eeaaee",
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
                            text: 'Antal kast: ' + data['shots'] + ' | Snittresultat: ' + data['avg']
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
                            [0, '#333333'],
                            [1, '#333333']
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
                                    [0, '#333333'],
                                    [1, '#333333']
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
                            gridLineColor: '#444444',
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
                        colors: ["#87D37C", "#87D37C", "#87D37C", "#7798BF", "#aaeeee", "#ff0066", "#eeaaee",
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

    /* Rundor per måndad (bana och användare. (autoladdas) */
    function getUserRounds(){

        $('.fa-spinner').remove();
        $('#stats').append('<br /><br/><i class="fa fa-spinner fa-spin fa-2x"></i>');
        $.get('/getRoundsPerMonth', {id: $("#id").val(), model: $("#model").val()}, function (data) {

                console.log(data);

                $("#chart-round-avg").highcharts({
                    chart: {
                        type: 'areaspline',
                        backgroundColor: {
                            linearGradient: {x1: 0, y1: 0, x2: 1, y2: 1},
                            stops: [
                                [0, '#333333'],
                                [1, '#333333']
                            ]
                        },
                        style: {
                            fontFamily: "'Unica One', sans-serif",
                            color: '#ffffff'
                        },
                        plotBorderColor: '#87D37C'
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
                        gridLineColor: '#444',
                        labels: {
                            style: {
                                color: '#E0E0E3'
                            }
                        },
                        lineColor: '#87D37C',
                        minorGridLineColor: '#87D37C',
                        tickColor: '#87D37C',
                        tickWidth: 0,
                        title: {
                            style: {
                                color: '#E0E0E3'
                            }
                        }
                    },
                    colors: ["#ffffff", "#87D37C", "#f45b5b", "#7798BF", "#aaeeee", "#ff0066", "#eeaaee",
                        "#55BF3B", "#DF5353", "#7798BF", "#aaeeee"],
                    tooltip: {
                        valueSuffix: 'st'
                    },
                    series: [
                        {
                            name: data['model_name'],
                            data: [data['jan'], data['feb'], data['mar'], data['apr'], data['maj'], data['jun'], data['jul'], data['aug'], data['sep'], data['okt'], data['nov'], data['dec']]
                        },
                        {
                            name: data['user'],
                            data: [data['u_jan'], data['u_feb'], data['mar'], data['apr'], data['maj'], data['jun'], data['jul'], data['aug'], data['sep'], data['okt'], data['nov'], data['dec']]
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
                            [0, '#333333'],
                            [1, '#333333']
                        ]
                    },
                    style: {
                        fontFamily: "'Unica One', sans-serif",
                        color: '#ffffff'
                    },
                    plotBorderColor: '#87D37C'
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
                    gridLineColor: '#444444',
                    labels: {
                        style: {
                            color: '#E0E0E3'
                        }
                    },
                    lineColor: '#444444',
                    minorGridLineColor: '#E74C3C',
                    tickColor: '#87D37C',
                    tickWidth: 0,
                    title: {
                        style: {
                            color: '#E0E0E3'
                        }
                    }
                },
                colors: ["#ffffff", "#87D37C", "#f45b5b", "#7798BF", "#aaeeee", "#ff0066", "#eeaaee",
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

        $.get('/getRoundAvgScore', {id: $("#id").val(), model: $("#model").val()}, function (data) {

                console.log(data);

                $('#chart-two').highcharts({
                    chart: {
                        type: 'line'
                    },
                    title: {
                        text: 'Snittresultat'
                    },
                    subtitle: {
                        text: 'Grafen visar rundans resultat per hål, ditt snitt och snittet för alla hål på banan.'
                    },
                    xAxis: {
                        categories: data[0],
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
                        name: 'Ditt snitt',
                        data: data[1]
                    },
                        {
                            name: 'Resultat',
                            data: data[2]
                        },
                        {
                            name: 'Bansnitt',
                            data: data[3]
                        }]
                });

            },'json'
        );
        return false;
    }

var i = 0;
function getRoundAvgStats(){
    $('#info').show();
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
            i++;
            var from = $('#date_from').val();
            var to = $('#date_to').val();
            var bana = $('#teepads').val();

            if(bana == 0){
                bana = 'Ingen bana vald';
            }else{
                bana = $('#teepads option:selected').text();
            }

            $('#round-data').append('<div class="row"><div class="col-sm-12"><h5 class="text-center">Sökning '+i+': '+bana+' - '+from+' - '+to+'</h5></div>');
            $.each(data[3]['rounds'], function(index, value) {
                var par = getTotal(value.total, value['tee'].par);
                $('#round-data').append('<div class="col-sm-3 col-md-3 text-center"><a href="/round/'+value.id+'/course/'+value.course_id+'" target="_blank"><div class="thumbnail"><div class="caption text-center"><h3 class="green">'+value.total+' '+par+'</h3><h4>'+value['course'].name+'</h4> <p>'+value.date+' </p></a></div></div></div>');

            })
            $('#round-data').append('</div><div class="row"></div><hr class="divider"/>');

            console.log(data);


                $('#chart-round-avg').highcharts({
                    chart: {
                        type: 'areaspline',
                        backgroundColor: {
                            linearGradient: {x1: 0, y1: 0, x2: 1, y2: 1},
                            stops: [
                                [0, '#333333'],
                                [1, '#333333']
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
                        gridLineColor: '#444444',
                        labels: {
                            style: {
                                color: '#E0E0E3'
                            }
                        },
                        lineColor: '#87D37C',
                        minorGridLineColor: '#87D37C',
                        tickColor: '#87D37C',
                        tickWidth: 0,
                        title: {
                            style: {
                                color: '#E0E0E3'
                            }
                        }
                    },
                    colors: ["#87D37C", "#87D37C", "#87D37C", "#7798BF", "#aaeeee", "#ff0066", "#eeaaee",
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

/* Övriga funktioner */

function getTotal(total, par){
    var sum = total - par;
    return '(' + sum + ')';
}