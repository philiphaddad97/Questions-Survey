<!DOCTYPE html>
<html lang="en">

<head>
    <title>Survey</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('layouts.css-libs')
    <link rel="stylesheet" type="text/css" href="{{asset('css\main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css\Chart.min.css')}}">

</head>

<body>

<div class="contact1">
    @include('layouts.nav-bar')

    <div class="container-contact1" style="padding: 35px !important;">

        <div class="contact1-form validate-form" style="width: 100%">
        <span class="contact1-form-title">
          SOME CHARTS ABOUT OUR SURVEYS!😉
        </span>
            <div class="row">
                <div class="col-md-6  d-flex justify-content-center">
                    <div style="width: 350px !important; height: 350px !important;">
                        <canvas id="myChart" width="350" height="350"></canvas>
                    </div>
                </div>
                <div class="col-md-6  d-flex justify-content-center">
                    <div style="width: 350px !important; height: 350px !important;">
                        <canvas id="line-chart" width="350" height="350"></canvas>
                    </div>
                </div>

            </div>
        </div>
    </div>


</div>
</div>

@include('layouts.js-libs')
<script src="{{asset('js\Chart.bundle.min.js')}}"></script>
<script>


    var data = [
        @foreach($perSurvey as $item)
            '{{$item->data}}',
        @endforeach

    ];

    var label = [
        @foreach($perSurvey as $item)
            '{{$item->label}}',
        @endforeach

    ];


    var myChart = new Chart(document.getElementById('myChart').getContext('2d'), {
        type: 'bar',
        legend: 'disabled',
        data: {
            labels: label,
            datasets: [{
                label: '# of Submissions',
                data: data,
                backgroundColor: "rgb(165, 218, 255, 0.5)",
                borderColor: "#0077FF",
                borderWidth: 1
            }]
        },
        options: {
            legend: {
                display: false
            },
            title: {
                display: true,
                text: 'Number of Submissions Per Survey'
            }

        }
    });


    data = [
        @foreach($perMonth as $item)
            '{{$item->data}}',
        @endforeach

    ];

    label = [
        @foreach($perMonth as $item)
            '{{$item->label}}',
        @endforeach

    ];



    var myLineChart = new Chart(document.getElementById("line-chart"), {
        type: 'line',
        data: {
            labels: label,
            datasets: [{
                data: data,
                backgroundColor: "rgb(165, 218, 255, 0.5)",
                borderColor: "#0077FF",
                fill: true
            },
            ]
        },
        options: {
            legend: {
                display: false
            },
            title: {
                display: true,
                text: 'Number of Submissions Per Month'
            }
        }
    });
</script>
</body>

</html>
