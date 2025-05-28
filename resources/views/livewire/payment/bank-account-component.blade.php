@section('title', 'Configuração')

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
                        <div><i class="fa fa-credit-card blue1_color"></i></div>
                    </div>
                    <div class="counter_no">
                        <div>
                            <p class="total_no">{{ count($accounts) }}</p>
                            <p class="head_couter">Contas</p>
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
                            <h2>Lista de Contas</h2>
                        </div>
                        <div class="heading1 margin_0">
                            <button class="btn btn-primary" wire:click.prevent='resetForm' data-toggle="modal" data-target="#modal-bank-account">
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
                                            <th class="bg-dark text-white text-center">Descrição</th>
                                            <th class="bg-dark text-white text-center">IBAN</th>
                                            <th class="bg-dark text-white text-center">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($accounts as $item)
                                            <tr>
                                                <td class="border text-center">{{ $item->id }}</td>
                                                <td class="border text-center">{{ $item->description }}</td>
                                                <td class="border text-center">AO06 {{ $item->iban }}</td>
                                                <td class="border text-center">
                                                    <button wire:click.prevent="setData({{ $item->id }})"
                                                            data-toggle="modal" data-target="#modal-bank-account"
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
                                                <td colspan="8" class="text-center p-5" style="font-size: 18px; font-weight: bold">
                                                    <i class="fa fa-credit-card"></i><br>Nenhuma conta bancária foi encontrada.
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
    </div>

    @include('inc.footer')
    @include('livewire.payment.modal-add') 
</div>
