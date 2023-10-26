@extends('backoffice.main')
@section('content')
<style>
.chart-container {
    width: 60%;
    margin: 100px auto; /* Add margin to create space below the navbar */
    padding: 10px;
    background-color: #f2f2f2;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
    text-align: center;
}

.chart-container canvas {
    max-width: 100%; /* Ensure the canvas remains responsive */
    height: auto;
    display: inline-block;
}

  </style>
<body>
    
    <div class="chart-container">
        <canvas id="myChart"></canvas>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript">
        var labels = @json($labels);
        var dateS = @json($data);

        const dataa = {
            labels: labels,
            datasets: [{
                label: 'Nombre réclamations par mois',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1,
                data: dateS,
            }]
        };

        const config = {
            type: 'line',
            data: dataa,
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
            },
        };

        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>
</body>
</html>
@endsection