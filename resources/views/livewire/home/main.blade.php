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
                            <p class="total_no">{{count($customers)}}</p>
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
                            <p class="total_no">{{count($orders)}}</p>
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
                            <p class="total_no">{{count($dishes)}}</p>
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
                            <p class="total_no">{{count($drinks)}}</p>
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
                     <canvas id="line_chart"></canvas>
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
                     <canvas id="bar_chart"></canvas>
                  </div>
               </div>
            </div>
         </div>
    </div>
    @include('inc.footer')
</div>
