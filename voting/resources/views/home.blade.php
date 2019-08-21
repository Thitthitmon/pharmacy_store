@extends('layouts.app')  
@section('content')


  <div class="container">
        <div class="row">
            <div class="col-md-3"> 
                 <div class="panel panel-default">
                    <div class="panel-heading">Total Revenue</div>
                    <div class="panel-body">{!! $total->total !!}</div>
                  </div>
            </div>
            <div class="col-md-3"> 
                 <div class="panel panel-default">
                    <div class="panel-heading">Total SMS IN</div>
                    <div class="panel-body">{!! $total_sms->total !!}</div>
                  </div>
            </div>
            <div class="col-md-3"> 
                 <div class="panel panel-default">
                    <div class="panel-heading">Total Competitor</div>
                    <div class="panel-body">{!! $totalCompetitor->count !!}</div>
                  </div>
            </div>
            <div class="col-md-3"> 
                 <div class="panel panel-default">
                    <div class="panel-heading">Remain Competitor</div>
                    <div class="panel-body">{!! $remainCompetitor->count !!}</div>
                  </div>
            </div>
            <hr>

{!! Form::open(['route' => 'voting.search']) !!}
<br>
        <div class="row">
            
             <div class="col-md-2">
             <br>                
                <div class="pull-left ">
                    <a href="{{route('detail')}}" class="btn btn-info">
                     View Detail Count</a>
                </div>
            </div>            

             <div class="col-md-3">             
                 
                <p>From:<br> <input type="date" name="from" class="form-control"></p>
             </div>
            
            <div class="col-md-3">  
                           
                <p>To: <br> <input type="date" name="to"  class="form-control"></p>

            </div>
            <div class="col-md-1">
                <br>
                <button type="submit" class="btn btn-primary pull-right">Search
                </button>
            </div>

             


{!! Form::close() !!}  
        <br>
    
<style>
#chartdiv {
  width: 100%;
  height: 500px;
}
</style>

<!-- Resources -->
<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>

<!-- Chart code -->
<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("chartdiv", am4charts.XYChart);
chart.scrollbarX = new am4core.Scrollbar();

// Add data
chart.data = [ <?php foreach($missVotings as $missVoting)  {?>
                {
                    "visits" : <?php echo $missVoting->voting_count.'.0'; ?>,
                    "country" : <?php echo '"'.$missVoting->keyword.'"'; ?>

                },
            <?php } ?>
];

// Create axes
var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "country";
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.renderer.minGridDistance = 30;
categoryAxis.renderer.labels.template.horizontalCenter = "right";
categoryAxis.renderer.labels.template.verticalCenter = "middle";
categoryAxis.renderer.labels.template.rotation = 270;
categoryAxis.tooltip.disabled = true;
categoryAxis.renderer.minHeight = 110;

var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis.renderer.minWidth = 50;

// Create series
var series = chart.series.push(new am4charts.ColumnSeries());
series.sequencedInterpolation = true;
series.dataFields.valueY = "visits";
series.dataFields.categoryX = "country";
series.tooltipText = "[{categoryX}: bold]{valueY}[/]";
series.columns.template.strokeWidth = 0;

series.tooltip.pointerOrientation = "vertical";

series.columns.template.column.cornerRadiusTopLeft = 10;
series.columns.template.column.cornerRadiusTopRight = 10;
series.columns.template.column.fillOpacity = 0.8;

// on hover, make corner radiuses bigger
var hoverState = series.columns.template.column.states.create("hover");
hoverState.properties.cornerRadiusTopLeft = 0;
hoverState.properties.cornerRadiusTopRight = 0;
hoverState.properties.fillOpacity = 1;

series.columns.template.adapter.add("fill", function(fill, target) {
  return chart.colors.getIndex(target.dataItem.index);
});

// Cursor
chart.cursor = new am4charts.XYCursor();

}); // end am4core.ready()
</script>

<!-- HTML -->
<div id="chartdiv"></div>       
   
    @endsection                             