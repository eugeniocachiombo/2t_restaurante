@section('title', 'Pratos')

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
                        <div><i class="fa fa-cutlery blue1_color"></i></div>
                    </div>
                    <div class="counter_no">
                        <div>
                            <p class="total_no">{{ count($dishes) }}</p>
                            <p class="head_couter">Pratos</p>
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
                            @if (!Gate::allows('cliente') && !Gate::allows('atendente'))
                                <button class="btn btn-primary" type="button" wire:click.prevent='clear'
                                    data-toggle="modal" data-target="#modal-add">
                                    <i class="fa fa-plus-circle"></i> Adicionar
                                </button>
                            @endif
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
                                            <th class="bg-dark text-white text-center">Preço</th>
                                            <th class="bg-dark text-white text-center">Qtd. Disponível</th>
                                            <th class="bg-dark text-white text-center">Status</th>

                                            @cannot('cliente')
                                            <th class="bg-dark text-white text-center">Responsável</th>
                                            @endcannot
                                            
                                            @if (Gate::allows('admin') || Gate::allows('supervisor'))
                                                <th class="bg-dark text-white text-center">Ação</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($dishes as $item)
                                            <tr class="border">
                                                <td class="text-center border ">{{ $item->id }}</td>
                                                <td class="text-center border ">
                                                    <div>
                                                        @if ($item->photo)
                                                            <a target="blank"
                                                                href="{{ asset('storage/' . $item->photo) }}">
                                                                <img src="{{ asset('storage/' . $item->photo) }}"
                                                                    alt="Foto" width="40" height="40"
                                                                    class="rounded-circle">
                                                            </a>
                                                        @else
                                                            <div
                                                                class="d-flex justify-content-center align-items-center">
                                                                <i class="fa fa-image fa-3x"></i>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <b>{{ $item->description }}</b>
                                                </td>
                                                <td class="text-center border">
                                                    {{ number_format($item->price, 2, ',', '.') }} Kz
                                                </td>
                                                <td class="text-center border">
                                                    {{ $item->quantity }}
                                                </td>
                                                <td class="text-center border">
                                                    <span
                                                        class="badge {{ $item->status === 'DISPONIVEL' ? 'bg-success' : 'bg-danger' }}">
                                                        {{ $item->status }}
                                                    </span>
                                                </td>

                                                @cannot('cliente')
                                                    
                                                <td class="text-center border">
                                                    {{ $item->getUser->first_name ?? '' }}
                                                    {{ $item->getUser->last_name ?? '' }}
                                                </td>
                                                @endcannot

                                                @if (Gate::allows('admin') || Gate::allows('supervisor'))
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
                                                @endif
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center p-5"
                                                    style="font-size: 20px; font-weight: bold">
                                                    <i class="fa fa-tag"></i><br>Nenhuma informação encontrada
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

        @include('livewire.dish.modal-add')
        @include('inc.footer')
    </div>
</div>
