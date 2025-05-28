@section('title', 'Submissão de Faturas')

<div class="midde_cont">
    <div class="container-fluid">
        <!-- Título -->
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>@yield('title')</h2>
                </div>
            </div>
        </div>

        <!-- Contador -->
        <div class="row column1">
            <div class="col">
                <div class="full counter_section margin_bottom_30 d-md-flex">
                    <div class="couter_icon">
                        <div><i class="fa fa-file green_color"></i></div> <!-- Ícone sugestão -->
                    </div>
                    <div class="counter_no">
                        <div>
                            <p class="total_no">{{ count($invoices) }}</p>
                            <p class="head_couter">Faturas Submetidas</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabela -->
        <div class="row column1">
            <div class="col-md-12">
                <div class="white_shd full">
                    <div class="full graph_head d-flex justify-content-between">
                        <div class="heading1 margin_0">
                            <h2>Lista de Faturas Submetidas</h2>
                        </div>
                        <div class="heading1 margin_0">
                            <button class="btn btn-primary" type="button" 
                                    data-toggle="modal" data-target="#modal-invoice">
                                <i class="fa fa-plus-circle"></i> Adicionar
                            </button>
                        </div>
                    </div>

                    <div class="full price_table padding_infor_info">
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table datatablePT py-4">
                                    <thead class="bg-dark text-white">
                                        <tr>
                                            <th class="bg-dark text-white text-center">ID</th>
                                            <th class="bg-dark text-white text-center">Nº Fatura</th>
                                            <th class="bg-dark text-white text-center">Comprovativo</th>
                                            <th class="bg-dark text-white text-center">Ação</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($invoices as $item)
                                            <tr class="border">
                                                <td class="text-center border">{{ $item->id }}</td>
                                                <td class="text-center border">{{ $item->number }}</td>
                                                <td class="text-center border"><a href="{{ asset('storage/' . $item->invoice) }}"> <i class="fa fa-file"></i> doc</a></td>
                                                <td class="text-center border">
                                                   <button wire:click.prevent="viewOrderItems({{ $item->id }})"
                                                        data-toggle="modal" data-target="#modal-view-items"
                                                        class="btn btn-sm btn-primary">
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center p-5"
                                                    style="font-size: 20px; font-weight: bold">
                                                    <i class="fa fa-file"></i><br>Nenhuma informação encontrada
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('livewire.order.modal-invoice')
        @include('livewire.order.modal-order-items')
        @include('inc.footer')
    </div>
</div>
