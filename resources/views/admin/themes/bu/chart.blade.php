@extends('admin.layout.index')
@section('title','Chart Bu')
@section('content')
<div class="container">
    <form action="" method="post" class="text-center">
        @csrf
        <div class="d-flex justify-content-between">
            <div class="row">
                <div class="col-md-8 offset-md-4" style="margin-left:267px;">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="from"><strong>Start day</strong></label>
                            <input type="date" class="form-control" name="start_day" required>
                            <span class="text-danger">{{ $errors->first('start_day') }}</span>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="from"><strong>End day</strong></label>
                            <input type="date" class="form-control" name="end_day" required>
                            <span class="text-danger">{{ $errors->first('end_day') }}</span>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label for="from"><strong>Filter</strong></label>
                            <button type="submit" class="btn btn-primary mt-4 form-control">Filter</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div id="container" class="text-center" style="max-width:900px ;height: 400px; margin: 0 auto"></div>
    <div id="produce" class="text-center" style="max-width:900px ;height: 400px; margin: 0 auto"></div>
    <div id="proline" class="text-center" style="max-width:900px ;height: 400px; margin: 0 auto"></div>
    <div id="piechart" class="text-center" style="max-width:900px ;height: 400px; margin: 0 auto"></div>
</div>    
@endsection
@push('js')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>

<script type="text/javascript">
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'The chart of all Bu money, 2019'
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: ''
        }

    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y} Đồng</b> of total<br/>'
    },

    series: [
        {
            name: "Total",
            colorByPoint: true,
            data: [
                {
                    name: "Revenue",
                    y: {{ $one_week_revenue }},
                    drilldown: "Revenue"
                },
                {
                    name: "Cost",
                    y: {{ $one_week_cost }},
                    drilldown: "cost"
                },
                {
                    name: "Profit share",
                    y: {{ $one_week_profixshare }},
                    drilldown: "Profit share"
                },
                {
                    name: "Profit",
                    y: {{ $one_week_profixshare_total }},
                    drilldown: "Profit"
                }
            ]
        }
    ],
    drilldown: {
        series: [
            {
                name: "Revenue",
                id: "Revenue",
                data: [
                    [
                        "v11.0",
                        3.39
                    ],
                    [
                        "v10.1",
                        0.96
                    ],
                    [
                        "v10.0",
                        0.36
                    ],
                    [
                        "v9.1",
                        0.54
                    ],
                    [
                        "v9.0",
                        0.13
                    ],
                    [
                        "v5.1",
                        0.2
                    ]
                ]
            },
            {
                name: "Cost",
                id: "Cost",
                data: [
                    [
                        "v16",
                        2.6
                    ],
                    [
                        "v15",
                        0.92
                    ],
                    [
                        "v14",
                        0.4
                    ],
                    [
                        "v13",
                        0.1
                    ]
                ]
            },
            {
                name: "Opera",
                id: "Opera",
                data: [
                    [
                        "v50.0",
                        0.96
                    ],
                    [
                        "v49.0",
                        0.82
                    ],
                    [
                        "v12.1",
                        0.14
                    ]
                ]
            }
        ]
    }
});
Highcharts.chart('produce', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'The chart of all Produce money, 2019'
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: ''
        }

    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y} Đồng</b> of total<br/>'
    },

    series: [
        {
            name: "Total",
            colorByPoint: true,
            data: [
                {
                    name: "Revenue",
                    y: {{ $one_week_pro_revenue }},
                    drilldown: "Revenue"
                },
                {
                    name: "Cost",
                    y: {{ $one_week_produce_cost }},
                    drilldown: "cost"
                },
                {
                    name: "Profit share",
                    y: {{ $one_week_pro_profixshare }},
                    drilldown: "Profit share"
                },
                {
                    name: "Profit",
                    y: {{ $one_week_pro_profixshare_total }},
                    drilldown: "Profit"
                }
            ]
        }
    ],
    drilldown: {
        series: [
            {
                name: "Revenue",
                id: "Revenue",
                data: [
                    [
                        "v11.0",
                        3.39
                    ],
                    [
                        "v10.1",
                        0.96
                    ],
                    [
                        "v10.0",
                        0.36
                    ],
                    [
                        "v9.1",
                        0.54
                    ],
                    [
                        "v9.0",
                        0.13
                    ],
                    [
                        "v5.1",
                        0.2
                    ]
                ]
            },
            {
                name: "Cost",
                id: "Cost",
                data: [
                    [
                        "v16",
                        2.6
                    ],
                    [
                        "v15",
                        0.92
                    ],
                    [
                        "v14",
                        0.4
                    ],
                    [
                        "v13",
                        0.1
                    ]
                ]
            },
            {
                name: "Opera",
                id: "Opera",
                data: [
                    [
                        "v50.0",
                        0.96
                    ],
                    [
                        "v49.0",
                        0.82
                    ],
                    [
                        "v12.1",
                        0.14
                    ]
                ]
            }
        ]
    }
});
Highcharts.chart('proline', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'The chart of all Proline money, 2019'
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: ''
        }

    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y} Đồng</b> of total<br/>'
    },

    series: [
        {
            name: "Total",
            colorByPoint: true,
            data: [
                {
                    name: "Revenue",
                    y: {{ $one_week_proline_revenue }},
                    drilldown: "Revenue"
                },
                {
                    name: "Cost",
                    y: {{ $one_week_proline_cost }},
                    drilldown: "cost"
                },
                {
                    name: "Profit share",
                    y: {{ $one_week_proline_profixshare }},
                    drilldown: "Profit share"
                },
                {
                    name: "Profit",
                    y: {{ $one_week_proline_profixshare_total }},
                    drilldown: "Profit"
                }
            ]
        }
    ],
    drilldown: {
        series: [
            {
                name: "Revenue",
                id: "Revenue",
                data: [
                    [
                        "v11.0",
                        3.39
                    ],
                    [
                        "v10.1",
                        0.96
                    ],
                    [
                        "v10.0",
                        0.36
                    ],
                    [
                        "v9.1",
                        0.54
                    ],
                    [
                        "v9.0",
                        0.13
                    ],
                    [
                        "v5.1",
                        0.2
                    ]
                ]
            },
            {
                name: "Cost",
                id: "Cost",
                data: [
                    [
                        "v16",
                        2.6
                    ],
                    [
                        "v15",
                        0.92
                    ],
                    [
                        "v14",
                        0.4
                    ],
                    [
                        "v13",
                        0.1
                    ]
                ]
            },
            {
                name: "Opera",
                id: "Opera",
                data: [
                    [
                        "v50.0",
                        0.96
                    ],
                    [
                        "v49.0",
                        0.82
                    ],
                    [
                        "v12.1",
                        0.14
                    ]
                ]
            }
        ]
    }
});

// Load google charts
google.charts.load('current', {
    'packages': ['corechart']
});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['Variable Cost', {{$bu_variable}}],
        ['Fixed Cost', {{$bu_fixed}}],
        ['Profit Share', {{$bu_buprofitshare}}],
    ]);

    // Optional; add a title and set the width and height of the chart
    var options = {
        'title': 'The chart shows the structure of the company',
        'width': 900,
        'height': 450
    };

    // Display the chart inside the <div> element with id="piechart"
    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    chart.draw(data, options);
}
</script>
@endpush