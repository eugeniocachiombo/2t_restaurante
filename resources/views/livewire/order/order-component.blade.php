@section('title', 'Pedidos')

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
                        <div><i class="fa fa-clipboard orange_color"></i></div> <!-- Ícone sugestão -->
                    </div>
                    <div class="counter_no">
                        <div>
                            <p class="total_no">{{ count($orders) }}</p>
                            <p class="head_couter">@yield('title')</p>
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
                            <h2>Lista de @yield('title')</h2>
                        </div>
                        <div class="heading1 margin_0">
                           
                        </div>
                    </div>

                    <div class="full price_table padding_infor_info">
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table datatablePT py-4">
                                    <thead class="bg-dark text-white">
                                        <tr>
                                            <th class="bg-dark text-white text-center">ID</th>
                                            <th class="bg-dark text-white text-center">Descrição</th>
                                            <th class="bg-dark text-white text-center">Unidade</th>
                                            <th class="bg-dark text-white text-center">Categoria</th>
                                            <th class="bg-dark text-white text-center">Responsável</th>
                                            <th class="bg-dark text-white text-center">Ação</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($orders as $item)
                                            <tr class="border">
                                                <td class="text-center border">{{ $item->id }}</td>
                                                <td class="text-center border">{{ $item->description }}</td>
                                                <td class="text-center border">{{ $item->unit }}</td>
                                                <td class="text-center border">{{ $item->getCategories->description }}</td>
                                                <td class="text-center border">
                                                    {{ $item->getUser->first_name ?? '' }} {{ $item->getUser->last_name ?? '' }}
                                                </td>
                                                <td class="text-center border">
                                                    <button wire:click.prevent="setData({{ $item->id }})"
                                                            data-toggle="modal" data-target="#modal-add"
                                                            class="btn btn-sm btn-primary">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button wire:click.prevent="delete({{ $item->id }})"
                                                            class="btn btn-sm btn-danger">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center p-5"
                                                    style="font-size: 20px; font-weight: bold">
                                                    <i class="fa fa-leaf"></i><br>Nenhuma informação encontrada
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
        @include('inc.footer')
    </div>
</div>
