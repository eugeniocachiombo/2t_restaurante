<div class="row column1 ">
    <div class="col-md-12">
        <div class="white_shd full ">
            <div class="full graph_head">
                <div class="heading1 margin_0">
                    <h2>Cardápio</h2>
                </div>
            </div>


            <div class="full price_table padding_infor_info">
                <div class="row section-title" data-aos="fade-up">
                    <h4>Escolha entre nossos pratos e bebidas deliciosas.</h4>
                </div>
                <div class="row">
                    <section id="pricing" class="pricing section">

                        <!-- Nav Tabs -->
                        <ul class="nav nav-tabs mb-4" id="menuTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button wire:click="set_tab('dish-tab')"
                                    class="nav-link {{ $tab == 'dish-tab' ? 'active' : '' }}" id="dish-tab"
                                    data-bs-toggle="tab" data-bs-target="#pratos" type="button" role="tab"
                                    aria-controls="dish" aria-selected="true">Pratos</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button wire:click="set_tab('drink-tab')"
                                    class="nav-link {{ $tab == 'drink-tab' ? 'active' : '' }}" id="drink-tab"
                                    data-bs-toggle="tab" data-bs-target="#bebidas" type="button" role="tab"
                                    aria-controls="drink" aria-selected="false">Bebidas</button>
                            </li>
                        </ul>

                        <!-- Tab Content -->
                        <div class="tab-content" id="menuTabsContent">

                            <!-- Aba de Pratos -->
                            <div class="tab-pane fade {{ $tab == 'dish-tab' ? 'show active' : '' }}" id="dish"
                                role="tabpanel" aria-labelledby="dish-tab">
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <input type="text" id="searchDishInput" class="form-control"
                                            placeholder="Pesquisar prato...">
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-select" wire:model.live="perPageDish">
                                            <option value="6">Mostrar apenas: 6</option>
                                            <option value="10">Mostrar apenas: 10</option>
                                            <option value="20">Mostrar apenas: 20</option>
                                            <option value="50">Mostrar apenas: 50</option>
                                            <option value="100">Mostrar apenas: 100</option>
                                            <option value="200">Mostrar apenas: 200</option>
                                            <option value="300">Mostrar apenas: 300</option>
                                            <option value="1000">Mostrar apenas: 1000</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    @forelse ($dishes as $item)
                                        <div class="col-xl-3 col-lg-6 dish-item"
                                            data-nome="{{ strtolower($item->description) }}" data-aos="fade-up"
                                            data-aos-delay="100">
                                            <div class="pricing-item">
                                                @if ($item->photo)
                                                    <a target="blank" href="{{ asset('storage/' . $item->photo) }}">
                                                        <img src="{{ asset('storage/' . $item->photo) }}"
                                                            alt="{{ $item->description }}">
                                                    </a>
                                                @else
                                                    <div class="d-flex justify-content-center align-items-center">
                                                        <i class="fa fa-image fa-5x" style="font-size: 150px"></i>
                                                    </div>
                                                @endif
                                                <h3>{{ $item->description }}</h3>
                                                <h4><sup>AOA</sup>{{ number_format($item->price, 2, ',', '.') }}<span> /
                                                        prato</span></h4>
                                                <ul>
                                                    <li>Com desconto de <b>{{ intval($item->discount) }}%</b></li>
                                                </ul>
                                                <div class="btn-wrap">
                                                    <span style="cursor: pointer"
                                                        wire:click.prevent='addDishToCart({{ $item->id }})'
                                                        class="btn-buy">
                                                        <i class="fa fa-cart-plus"></i> Adicionar
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        Nenhum prato disponível de momento
                                    @endforelse

                                    <div class="row">
                                        <div class="container">
                                            <div class="d-flex justify-content-end">
                                                {{ $dishes->links('pagination::bootstrap-5') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Aba de Bebidas -->
                            <div class="tab-pane fade {{ $tab == 'drink-tab' ? 'show active' : '' }}" id="drink"
                                role="tabpanel" aria-labelledby="drink-tab">
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <input type="text" id="searchDrinkInput" class="form-control"
                                            placeholder="Pesquisar bebida...">
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-select" wire:model.live="perPageDrink">
                                            <option value="6">Mostrar apenas: 6</option>
                                            <option value="10">Mostrar apenas: 10</option>
                                            <option value="20">Mostrar apenas: 20</option>
                                            <option value="50">Mostrar apenas: 50</option>
                                            <option value="100">Mostrar apenas: 100</option>
                                            <option value="200">Mostrar apenas: 200</option>
                                            <option value="300">Mostrar apenas: 300</option>
                                            <option value="1000">Mostrar apenas: 1000</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    @forelse ($drinks as $item)
                                        <div class="col-xl-3 col-lg-6 drink-item"
                                            data-nome="{{ strtolower($item->description) }}" data-aos="fade-up"
                                            data-aos-delay="100">
                                            <div class="pricing-item">
                                                @if ($item->photo)
                                                    <a target="blank" href="{{ asset('storage/' . $item->photo) }}">
                                                        <img src="{{ asset('storage/' . $item->photo) }}"
                                                            alt="{{ $item->description }}">
                                                    </a>
                                                @else
                                                    <div class="d-flex justify-content-center align-items-center">
                                                        <i class="fa fa-image fa-5x" style="font-size: 150px"></i>
                                                    </div>
                                                @endif
                                                <h3>{{ $item->description }}</h3>
                                                <h4><sup>AOA</sup>{{ number_format($item->price, 2, ',', '.') }}<span>
                                                        / bebida</span></h4>
                                                <ul>
                                                    <li>Com desconto de <b>{{ intval($item->discount) }}%</b></li>
                                                </ul>
                                                <div class="btn-wrap">
                                                    <span style="cursor: pointer"
                                                        wire:click.prevent='addDrinkToCart({{ $item->id }})'
                                                        class="btn-buy">
                                                        <i class="fa fa-cart-plus"></i> Adicionar
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        Nenhuma bebida disponível de momento
                                    @endforelse

                                    <div class="row d-none">
                                        <div class="container">
                                            <div class="d-flex justify-content-end">
                                                {{ $drinks->links('pagination::bootstrap-5') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>

            @push('scripts')
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        const filterItems = (inputId, className) => {
                            const input = document.getElementById(inputId);
                            const items = document.querySelectorAll(className);

                            input.addEventListener('keyup', function() {
                                const filter = this.value.toLowerCase();
                                items.forEach(item => {
                                    const nome = item.getAttribute('data-nome');
                                    item.style.display = nome.includes(filter) ? '' : 'none';
                                });
                            });
                        };

                        filterItems('searchDishInput', '.dish-item');
                        filterItems('searchDrinkInput', '.drink-item');
                    });
                </script>
            @endpush



        </div>
    </div>
    <!-- end row -->
</div>
