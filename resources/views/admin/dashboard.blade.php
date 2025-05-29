@extends('admin.layout')
@section('content')
<div class="container mt-4" style="wrap: none;">
    <div class="row">
<div class="col-md-4 mb-2">
    <div class="card bg-dark" style="border: 2px solid orange;">
        <div class="row card-body">
            <div class="col-lg">
                <div class="d-flex justify-content-between">
                <div><h6 class="text-warning">All Recipes:</h6></div>
                <div><h6 class="text-warning">{{ $recipes }}</h6></div>
            </div>
        </div>
        </div>
    </div>
</div>
<div class="col-md-4 mb-2">
    <div class="card bg-dark" style="border: 2px solid orange;">
        <div class="row card-body">
            <div class="col-lg">
                <div class="d-flex justify-content-between">
                <div><h6 class="text-warning">Registered User:</h6></div>
                <div><h6 class="text-warning">{{ $users }}</h6></div>
            </div>
        </div>
        </div>
    </div>
</div>
<div class="col-md-4 mb-2">
    <div class="card bg-dark" style="border: 2px solid orange;">
        <div class="row card-body">
            <div class="col-lg">
                <div class="d-flex justify-content-between">
                <div><h6 class="text-warning">Today Messages:</h6></div>
                <div><h6 class="text-warning">{{ $messages }}</h6></div>
            </div>
        </div>
        </div>
    </div>
</div>
    </div>
</div>


<div class="container mt-1">
    <div class="row-lg">
        <div>
        <h2 class="mt-2 text-center text-uppercase">Registered Users By Month</h2>
    <div class="row-md" id="dashboard-resizer">
        <canvas id="registerChart"></canvas>
</div>
</div>
    <div class="row-lg pb-3">
        <h4 class="mt-2 text-center text-uppercase">Posting Blogs By Month</h4>
    <div class="row-md" id="dashboard-resizer2">
        <canvas id="postingChart"></canvas>
    </div>
</div>
</div>
    <script>
        var ctx = document.getElementById('registerChart').getContext('2d');
        var registersTotal = new Chart(ctx, {
            type: 'pie',
            data:{
                labels : @json($months),
                datasets : [{
                    label : 'Total Registered',
                    data: @json($mthTotals),
                    backgroundColor: ['#fca311', '#14213D','#8D99AE ', '#EDF2F4  ','#3D405B ', ],
                }]
                },
                options: {
                scales: {
                        y: {
                            beginAtZero: true,
                            stepSize: 1
                        }
                    }
            }

        })

        var ctx2 = document.getElementById('postingChart').getContext('2d');
        var postingTotal = new Chart(ctx2, {
            type: 'bar',
            data:{
                labels : @json($postMonths),
                datasets : [{
                    label : 'Total Post',
                    data: @json($postTotals),
                    backgroundColor: [ '#8D99AE ', '#EF233C   ','#3D405B ','#fca311', '#14213D',],
                }]
                },
                options: {
                scales: {
                        y: {
                            beginAtZero: true,
                            stepSize: 1
                        }
                    }
            }

        })

    </script>

</div>
@endsection
