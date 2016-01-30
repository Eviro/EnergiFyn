@extends('template.site')
@section('content')
    <div class="row">
        <div class="header">
            <h1>Strømforbrug dashboard</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2 sidebar-wrapper">
            <ul>
                <li><a href="/latestday">Seneste dag</a></li>
                <li><a href="/latest7days">Seneste 7 dage</a></li>
                <li><a href="/thismonth">Denne månede</a></li>
                <li><a href="/alltime">All-time</a></li>
            </ul>
        </div>
        <div class="col-md-10">
            <div class="data-stats">
                <table>
                    <tr>
                        <td>Number of datapoints in database:</td>
                        <td>@{{ numberOfDatapoints }}</td>
                    </tr>
                    <tr>
                        <td>Oldest datapoint in database:</td>
                        <td>@{{ oldestpoint.date }}</td>
                    </tr>
                    <tr>
                        <td>Newest datapoint in database:</td>
                        <td>@{{ newestpoint.date }}</td>
                    </tr>
                </table>


            </div>
        </div>
    </div>
    <script>
        new Vue({
            el: '#app',
            data: {
                numberOfDatapoints: "N/A",
                oldestpoint: 'N/A',
                newestpoint: 'N/A'
            },
            ready: function()
            {
                var self = this;
                $.getJSON('/consumptiondata/count',function(data){
                    self.numberOfDatapoints=data.datapoints;
                });

                // Get oldest data point
                $.getJSON('/consumptiondata/oldest',function(data){
                    self.oldestpoint=data[0];
                });
                // Get latest data point
                $.getJSON('/consumptiondata/latest',function(data){
                    self.newestpoint=data[0];
                });
            }





        })
    </script>

    @stop