@section('title', 'Fazer Pedido')

<div class="midde_cont">
    <link rel="stylesheet" href="{{ asset('assets/css/makeorder.css') }}">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title d-flex align-items-center justify-content-between">
                    <h2>@yield('title')</h2>

                    <div style="cursor: pointer" class="position-relative" wire:poll.visible
                    data-toggle="modal" data-target="#modal-cart">
                        <span class="me-2"><b>Total:</b> {{ number_format($cartTotal, 2, ',', '.') ?? 0, 00 }}
                            kz</span>
                        <i class="fa fa-cart-plus text-dark fa-2x"></i>
                        <span 
                            class="cart-total-badge position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            {{ $cartQt ?? 0 }}
                        </span>
                    </div>

                </div>
            </div>
        </div>
        @include('livewire.order.modal-cart')
        @include('livewire.order.modal-typeorder')
        @livewire('order.cardapio-component')
    </div>
    @include('inc.footer')
</div>
