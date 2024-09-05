@extends('layouts.main')

@section('title', 'GDSCP - Dashboard')

@section('content')

<div class="row">
    <div class="col-sm-2">  
        <ion-icon name="medkit-outline"></ion-icon>
        Pacientes em Leito
        <h3 class="leito">17</h3>
    </div>
    <div class="col-sm-2">
        <ion-icon name="log-out-outline"></ion-icon>
        Pacientes com Alta
        <h3 class="alta">25</h3>
    </div>
</div>

<br>

<div class="main-container-graph">
    <h3>Perfil etário dos pacientes com lesão no mês</h3>
    <div class="row chart-container">
        <div class="col-sm-6">
            <canvas id="barChart"></canvas>
        </div>
        <div class="col-sm-3">
            <canvas id="pieChart"></canvas>
        </div>
    </div>
</div>

<script>
    // Dados para o gráfico de barras
    var barData = {
        labels: ['0-10', '11-20', '21-30', '31-40', '41-50', '51-60', '61-70', '71+'],
        datasets: [{
            label: 'Perfil etário dos paciente com lesão no mês',
            data: [25, 30, 35, 40, 30, 25, 35, 40],
            backgroundColor: 'rgba(54, 162, 235, 0.5)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 2,
            borderRadius: 5
        }]
    };
    // Dados para o gráfico de pizza
    var pieData = {
        labels: ['Pacientes em Leito', 'Pacientes com Alta'],
        datasets: [{
            data: [17, 25],
            backgroundColor: ['#FF0000', '#0000FF'],
            hoverBackgroundColor: ['#FF0000', '#0000FF']
        }]
    };
    // Configuração do gráfico de barras
    var barConfig = {
        type: 'bar',
        data: barData,
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    };
    // Configuração do gráfico de pizza
    var pieConfig = {
        type: 'pie',
        data: pieData,
        options: {
            responsive: true
        }
    };
    // Renderização dos gráficos
    window.onload = function() {
        var barCtx = document.getElementById('barChart').getContext('2d');
        var pieCtx = document.getElementById('pieChart').getContext('2d');
        new Chart(barCtx, barConfig);
        new Chart(pieCtx, pieConfig);
    };
</script>
@endsection