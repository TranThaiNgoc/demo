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
        <div id="piechart"></div>
    </div>
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
        ['Cost', {{$cost}}],
        ['Revenue', {{$bu_burevenue}}],
        ['Profit', {{$bu_buprofitshare}}],
    ]);

    // Optional; add a title and set the width and height of the chart
    var options = {
        'title': 'The chart shows the structure of the company',
        'width': 650,
        'height': 450
    };

    // Display the chart inside the <div> element with id="piechart"
    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    chart.draw(data, options);
}
</script>
@endpush