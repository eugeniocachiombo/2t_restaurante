@section('title', 'Fazer Pedido')

<div class="midde_cont">
    <link rel="stylesheet" href="{{asset('assets/css/makeorder.css')}}">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title d-flex align-items-center justify-content-between">
                    <h2>@yield('title')</h2>

                    <div class="position-relative">
                        <span class="me-2"><b>Total:</b> {{ number_format($cartTotal, 2, ',', '.') ?? 0, 00 }} kz</span>
                        <i class="fa fa-cart-plus text-dark fa-2x"></i>
                        <span
                            class="cart-total-badge position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            {{ $cartQt ?? 0 }}
                        </span>
                    </div>

                </div>
            </div>
        </div>
        <div class="row column1 ">
            <div class="col-md-12">
                <div class="white_shd full ">
                    <div class="full graph_head">
                        <div class="heading1 margin_0">
                            <h2>@yield('title')</h2>
                        </div>
                    </div>


                    <div class="full price_table padding_infor_info">
                        <div class="row">
                            <section id="pricing" class="pricing section">

                                <div class="row section-title" data-aos="fade-up">
                                    <h2>Pratos Disponíveis</h2>
                                    <p>Sabores que conquistam todos os dias. Escolha seu favorito e aproveite uma
                                        experiência gastronômica inesquecível.</p>
                                </div>

                                <div class="row ">
                                    @foreach ($dishes as $item)
                                        <div  class="col-xl-3 col-lg-6" data-aos="fade-up" data-aos-delay="100">
                                            <div class="pricing-item">
                                                @if ($item->photo)
                                                    <a target="blank" href="{{ asset('storage/' . $item->photo) }}">
                                                        <img src="{{ asset('storage/' . $item->photo) }}"
                                                            alt="{{ $item->description }}">
                                                    </a>
                                                @else
                                                    <div class="d-flex justify-content-center align-items-center">
                                                        <i class="fa fa-image fa-5x fa-5x" style="font-size: 150px"></i>
                                                    </div>
                                                @endif
                                                <h3>{{ $item->description }}</h3>
                                                <h4><sup>AOA</sup>{{ number_format($item->price, 2, ',', '.') }}<span> /
                                                        prato</span></h4>
                                                <ul>
                                                    <li>Com desconto de <b>{{intval($item->discount)}}%</b></li>
                                                </ul>
                                                <div class="btn-wrap" >
                                                    <span style="cursor: pointer"
                                                    wire:click.prevent='addToCart({{$item->id}})' class="btn-buy">
                                                        <i class="fa fa-cart-plus"></i> Adicionar
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                            </section>
                        </div>
                    </div>

                </div>
            </div>
            <!-- end row -->
        </div>
    </div>
    @include('inc.footer')
</div>
