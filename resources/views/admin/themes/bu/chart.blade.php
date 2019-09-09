@extends('admin.layout.index')
@section('title','Chart Bu')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <form action="" method="post">
                    @csrf
                    <div class="d-flex justify-content-between">
                        <div class="row">
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
                                <button type="submit" class="btn btn-primary mt-4">Filter</button>
                            </div>
                        </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
        <div id="piechart"></div>
        <div id="columnchart_material" style="width: 800px; height: 500px;"></div>
</div>

@endsection
@push('js')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
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
        'width': 800,
        'height': 450
    };

    // Display the chart inside the <div> element with id="piechart"
    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    chart.draw(data, options);
}
google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart_);
function drawChart_() {
        var data_ = google.visualization.arrayToDataTable([
          ['Year', 'Cost', 'Revenue', 'Profix'],
          ['{{ $date_one }}', {{$one_week_cost}}, {{$one_week_revenue}}, {{$one_week_profixshare}}],
          ['{{ $date_two }}', {{$two_week_cost}}, {{$two_week_revenue}}, {{$two_week_profixshare}}],
        ]);

        var options_ = {
          chart: {
            title: 'Chart of statistics column Bu',
            subtitle: 'Cost, Revenue, and Profix',
          }
        };

        var chart_ = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart_.draw(data_, google.charts.Bar.convertOptions(options_));
      }
</script>
@endpush