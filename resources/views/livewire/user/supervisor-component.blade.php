@section('title', 'Supervisores')

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
                        <div><i class="fa fa-users blue1_color"></i></div>
                    </div>
                    <div class="counter_no">
                        <div>
                            <p class="total_no">{{ count($users) }}</p>
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
                            <button class="btn btn-primary" wire:click.prevent='resetForm' data-toggle="modal" data-target="#modal-user">
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
                                            <th class="bg-dark text-white text-center">Nome</th>
                                            <th class="bg-dark text-white text-center">Gênero</th>
                                            <th class="bg-dark text-white text-center">Data Nasc.</th>
                                            <th class="bg-dark text-white text-center">Telefone</th>
                                            <th class="bg-dark text-white text-center">Email</th>
                                            <th class="bg-dark text-white text-center">Endereço</th>
                                            <th class="bg-dark text-white text-center">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($users as $user)
                                            <tr>
                                                <td class="border text-center">{{ $user->id }}</td>
                                                <td class="border text-center">
                                                    <div>
                                                        @if ($user->photo)
                                                            <a target="blank"
                                                                href="{{ asset('storage/' . $user->photo) }}">
                                                                <img src="{{ asset('storage/' . $user->photo) }}"
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
                                                    <b>{{ $user->first_name }} {{ $user->last_name }}</b>
                                                </td>
                                                <td class="border text-center">{{ $user->gender }}</td>
                                                <td class="border text-center">{{ \Carbon\Carbon::parse($user->birth_date)->format('d/m/Y') }}</td>
                                                <td class="border text-center">{{ $user->phone }}</td>
                                                <td class="border text-center">{{ $user->email }}</td>
                                                <td class="border text-center">{{ $user->getAddress->description ?? 'N/D' }}</td>
                                                <td class="border text-center" style="white-space: nowrap">
                                                    <button wire:click.prevent="setData({{ $user->id }})"
                                                            data-toggle="modal" data-target="#modal-user"
                                                            class="btn btn-sm btn-primary">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button wire:click.prevent="delete({{ $user->id }})"
                                                            class="btn btn-sm btn-danger">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="8" class="text-center p-5" style="font-size: 18px; font-weight: bold">
                                                    <i class="fa fa-user-times"></i><br>Nenhum supervisor encontrado.
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

    @include('livewire.user.modal-add')
    @include('inc.footer')
</div>
