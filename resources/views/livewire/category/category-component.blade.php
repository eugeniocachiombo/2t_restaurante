@section('title', 'Categorias')
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
            <div class="col">
                <div class="full counter_section margin_bottom_30 d-md-flex">
                    <div class="couter_icon">
                        <div>
                            <i class="fa fa-tag red_color"></i>
                        </div>
                    </div>
                    <div class="counter_no">
                        <div>
                            <p class="total_no">{{ count($categories) }}</p>
                            <p class="head_couter">Categorias</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row column1 ">
            <div class="col-md-12">
                <div class="white_shd full ">
                    <div class="full graph_head d-flex justify-content-between">
                        <div class="heading1 margin_0">
                            <h2>Lista de @yield('title')</h2>
                        </div>
                        <div class="heading1 margin_0">
                            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal-add">
                                <i class="fa fa-plus-circle"></i> Adicionar
                            </button>
                        </div>
                    </div>
                    <div class="full price_table padding_infor_info">
                        <div class="row">
                            <div class="table-responsive ">
                                <table class="table datatablePT py-4">
                                    <thead class="bg-dark text-white ">
                                        <tr class="bg-dark text-white mt-2">
                                            <th class="bg-dark text-white text-center fw-bold">Id</th>
                                            <th class="bg-dark text-white text-center fw-bold">Descrição</th>
                                            <th class="bg-dark text-white text-center fw-bold">Responsável</th>
                                            <th class="bg-dark text-white text-center fw-bold">Acção</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($categories as $item)
                                            <tr class="border">
                                                <td class="border text-center">{{ $item->id }}</td>
                                                <td class="border text-center">{{ $item->description }}</td>
                                                <td class="border text-center">{{ $item->getUser->first_name ?? '' }}
                                                    {{ $item->getUser->last_name ?? '' }}</td>
                                                <td class="border text-center">
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
                                                <td class="text-center p-5" style="font-size: 20px; font-weight: bold"
                                                    colspan="4">
                                                    <i class="fa fa-tag"></i> <br>
                                                    Nenhuma informação encontrada
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
    @include('livewire.category.modal-add')
    @include('inc.footer')
</div>
@push('scripts')
    <script>
        /*   $(document).ready(function() {
                            $('#province_id').select2({
                                theme: 'bootstrap-5',
                                width: "100%"
                            });
                            $('#province_id').on('change', function(e) {
                                @this.set('province_id', $('#province_id').select2("val"));
                                @this.get_local();
                            });
                        });*/
    </script>
@endpush
