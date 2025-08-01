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

        @if (!Gate::allows('motoboy') && !Gate::allows('atendente'))
            <div class="row column1">
                @if (!Gate::allows('cliente'))
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
                @endif
                <div class="col-md-6 col-lg-{{ !Gate::allows('cliente') ? '3' : '4' }}">
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
                <div class="col-md-6 col-lg-{{ !Gate::allows('cliente') ? '3' : '4' }}">
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
                <div class="col-md-6 col-lg-{{ !Gate::allows('cliente') ? '3' : '4' }}">
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
        @endif

        @can('atendente')
            <div class="row column1">
                <div class="col-12">
                    <div class="full counter_section margin_bottom_30"
                        style="background-color: #f0f8ff; border-left: 5px solid #1e90ff; border-radius: 8px; padding: 15px;">
                        <div class="couter_icon" style="float: left; margin-right: 15px;">
                            <div
                                style="background-color: #1e90ff; border-radius: 50%; width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fa fa-receipt" style="color: white; font-size: 24px;"></i>
                            </div>
                        </div>
                        <div class="counter_no">
                            <div>
                                <p class="head_couter"
                                    style="font-size: 18px; font-weight: bold; color: #1e90ff; margin-top: 10px;">
                                    <i class="fa fa-user-circle" style="margin-right: 5px;"></i>
                                    Exclusivamente Para Atendentes
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row column1">
                    <div class="col-md-12">
                        <div class="white_shd full margin_bottom_30" style="border-radius: 8px;">
                            <div class="full graph_head"
                                style="background-color: #1e90ff; border-radius: 8px 8px 0 0; padding: 12px;">
                                <div class="heading1 margin_0">
                                    <h2 style="color: white; font-size: 18px; margin: 0;">Informações Importantes</h2>
                                </div>
                            </div>
                            <div class="full progress_bar_inner" style="padding: 20px;">
                                <div class="msg_section padding_infor_info" style="font-size: 15px; color: #333;">
                                    <p><i class="fa fa-check-circle" style="color: #1e90ff;"></i> Confirme todos os pedidos
                                        com clareza antes de finalizar.</p>
                                    <p><i class="fa fa-comments" style="color: #1e90ff;"></i> Use uma linguagem clara e
                                        educada com os clientes.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endcan



        @can('motoboy')
            <div class="row column1">
                <div class="col-12">
                    <div class="full counter_section margin_bottom_30">
                        <div class="couter_icon">
                            <div>
                                <i class="fa fa-motorcycle green_color"></i>
                            </div>
                        </div>
                        <div class="counter_no">
                            <div>
                                <p class="head_couter">Exclusivamente Para Entregadores</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row column1">
                    <div class="col-md-12">
                        <div class="white_shd full margin_bottom_30">
                            <div class="full graph_head">
                                <div class="heading1 margin_0">
                                    <h2>Informações Importantes</h2>
                                </div>
                            </div>
                            <div class="full progress_bar_inner">
                                <div class="msg_section padding_infor_info">
                                    <p><i class="fa fa-info-circle"></i> Mantenha seu estado actualizado com a central.
                                    </p>
                                    <p><i class="fa fa-map-marker"></i> Verifique o endereço antes de sair para entrega.
                                    </p>
                                    <p><i class="fa fa-phone"></i> Em caso de problema, entre em contacto com o suporte.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endcan

        @include('inc.footer')
    </div>
    <script src="{{ asset('assets/js/a_chart.js') }}"></script>
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
                datasets: [{
                        label: 'Pratos',
                        data: dishesData,
                        borderColor: '#007bff',
                        backgroundColor: 'rgba(0, 123, 255, 0.2)',
                        fill: true,
                        tension: 0.4
                    },
                    {
                        label: 'Bebidas',
                        data: drinksData,
                        borderColor: '#28a745',
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
                        intersect: true,
                        filter: function(tooltipItem) {
                            return tooltipItem.element && tooltipItem.element.active;
                        }
                    },
                    legend: {
                        position: 'top'
                    }
                },
                interaction: {
                    mode: 'nearest',
                    intersect: true
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
