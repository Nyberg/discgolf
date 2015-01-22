var Script = function () {

    var pieData = [
        {
            value: 30,
            color:"#1abc9c"
        },
        {
            value : 50,
            color : "#16a085"
        },
        {
            value : 100,
            color : "#27ae60"
        }

    ];


    new Chart(document.getElementById("pie").getContext("2d")).Pie(pieData);


}();