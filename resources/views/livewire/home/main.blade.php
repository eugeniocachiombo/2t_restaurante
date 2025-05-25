@section('title', 'Painel Principal')
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>@yield('title')</h2>
                </div>
            </div>
        </div>
        <div class="row column1">
            <div class="col-md-6 col-lg-3">
                <div class="full counter_section margin_bottom_30">
                    <div class="couter_icon">
                        <div>
                            <i class="fa fa-users yellow_color"></i>
                        </div>
                    </div>
                    <div class="counter_no">
                        <div>
                            <p class="total_no">{{ count($customers) }}</p>
                            <p class="head_couter">Clientes</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="full counter_section margin_bottom_30">
                    <div class="couter_icon">
                        <div>
                            <i class="fa fa-clipboard orange_color"></i>
                        </div>
                    </div>
                    <div class="counter_no">
                        <div>
                            <p class="total_no">{{ count($orders) }}</p>
                            <p class="head_couter">Pedidos</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="full counter_section margin_bottom_30">
                    <div class="couter_icon">
                        <div>
                            <i class="fa fa-cutlery blue1_color"></i>
                        </div>
                    </div>
                    <div class="counter_no">
                        <div>
                            <p class="total_no">{{ count($dishes) }}</p>
                            <p class="head_couter">Pratos</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="full counter_section margin_bottom_30">
                    <div class="couter_icon">
                        <div>
                            <i class="fa fa-glass purple_color"></i>
                        </div>
                    </div>
                    <div class="counter_no">
                        <div>
                            <p class="total_no">{{ count($drinks) }}</p>
                            <p class="head_couter">Bebidas</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row column1">
            <div class="col-lg-6">
                <div class="white_shd full margin_bottom_30">
                    <div class="full graph_head">
                        <div class="heading1 margin_0">
                            <h2>Gráfico de Análise de Pedidos</h2>
                        </div>
                    </div>
                    <div class="map_section padding_infor_info">
                        <canvas id="orders_analysis_chart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="white_shd full margin_bottom_30">
                    <div class="full graph_head">
                        <div class="heading1 margin_0">
                            <h2>Gráfico de Análise de Vendas</h2>
                        </div>
                    </div>
                    <div class="map_section padding_infor_info">
                        <canvas id="sales_analysis_chart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('inc.footer')
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const monthLabels = {!! json_encode($monthlyOrderStatusCounts['labels']) !!};
    const statusData = {!! json_encode($monthlyOrderStatusCounts['data']) !!};

    const statusColors = {
        'PENDENTE': '#ffc107',
        'PAGO': '#28a745',
        'CANCELADO': '#dc3545',
        'RECEBIDO': '#17a2b8'
    };

    const statusLabels = {
        'PENDENTE': 'Pendente',
        'PAGO': 'Pago',
        'CANCELADO': 'Cancelado',
        'RECEBIDO': 'Recebido'
    };

    const datasets = Object.keys(statusData).map(status => ({
        label: statusLabels[status],
        data: statusData[status],
        backgroundColor: statusColors[status]
    }));

    const ctx = document.getElementById('orders_analysis_chart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: monthLabels,
            datasets: datasets
        },
        options: {
            responsive: true,
            plugins: {
                tooltip: {
                    mode: 'nearest', // mostra tooltip apenas do item mais próximo
                    intersect: true // somente quando o mouse está sobre a barra
                },
                legend: {
                    position: 'top'
                }
            },
            interaction: {
                mode: 'nearest',
                axis: 'x',
                intersect: true // mesma configuração para interação
            },
            scales: {
                x: {
                    stacked: false
                },
                y: {
                    stacked: false,
                    beginAtZero: true
                }
            }
        }

    });
</script>

<script>
    const salesLabels = {!! json_encode($monthlySalesAnalysis['labels']) !!};
    const dishesData = {!! json_encode($monthlySalesAnalysis['dishes']) !!};
    const drinksData = {!! json_encode($monthlySalesAnalysis['drinks']) !!};

    const ctxSales = document.getElementById('sales_analysis_chart').getContext('2d');

    new Chart(ctxSales, {
        type: 'line',
        data: {
            labels: salesLabels,
            datasets: [
                {
                    label: 'Pratos',
                    data: dishesData,
                    borderColor: '#007bff', // azul
                    backgroundColor: 'rgba(0, 123, 255, 0.2)',
                    fill: true,
                    tension: 0.4
                },
                {
                    label: 'Bebidas',
                    data: drinksData,
                    borderColor: '#28a745', // verde
                    backgroundColor: 'rgba(40, 167, 69, 0.2)',
                    fill: true,
                    tension: 0.4
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: 'Análise de Vendas por Mês'
                },
                tooltip: {
                    mode: 'nearest',
                    intersect: false
                },
                legend: {
                    position: 'top'
                }
            },
            interaction: {
                mode: 'nearest',
                axis: 'x',
                intersect: false
            },
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Quantidade vendida'
                    }
                }
            }
        }
    });
</script>
