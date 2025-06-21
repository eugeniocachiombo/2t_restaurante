<div wire:ignore.self class="modal fade" id="modal-cart" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="cart" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fa fa-shopping-cart"></i> Itens no Carrinho
                </h5>
                <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                @if(count($cartItems) > 0)
                    <table class="table table-bordered align-middle">
                        <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Item</th>
                                <th>Tipo</th>
                                <th>Preço</th>
                                <th>Quantidade</th>
                                <th>Total</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cartItems as $item)
                                <tr>
                                    <td style="width: 80px; text-align: center;">
                                        @if($item->photo)
                                            <img src="{{ asset('storage/' . $item->photo) }}" alt="{{ $item->description }}" style="max-width: 70px; max-height: 70px; object-fit: cover;">
                                        @else
                                            <i class="fa fa-image fa-2x text-secondary"></i>
                                        @endif
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->dish_id ? 'Prato' : 'Bebida' }}</td>
                                    <td>{{ number_format($item->price, 2, ',', '.') }} AOA</td>
                                    <td style="width: 100px;">
                                        <input 
                                            type="number" 
                                            min="1" 
                                            value="{{ $item->qty }}" 
                                            wire:change="updateQty('{{ $item->id }}', $event.target.value)"
                                            class="form-control form-control-sm text-center" />
                                    </td>
                                    <td>{{ number_format($item->price * $item->qty, 2, ',', '.') }} AOA</td>
                                    <td>
                                        <button wire:click.prevent="removeItem('{{ $item->id }}')" class="btn btn-danger btn-sm" title="Remover item">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="5" class="text-end"><strong>Total:</strong></td>
                                <td colspan="2"><strong>{{ number_format($cartTotal, 2, ',', '.') }} AOA</strong></td>
                            </tr>
                        </tbody>
                    </table>
                @else
                    <p class="text-center">Nenhum item no carrinho.</p>
                @endif
            </div>
            
            
            <div class="modal-footer d-flex justify-content-between">
                @if(count($cartItems) > 0)
                    <button wire:click.prevent="clearAll" wire:target="clearAll"
                     class="btn btn-warning ">
                        <i wire:loading wire:target="clearAll" class="fa fa-spinner fa-spin text-dark"></i>
                        <i wire:loading.remove wire:target="clearAll" class="fa fa-trash text-dark"></i> Limpar Carrinho
                    </button>
                    <button wire:click.prevent="makeOrder" wire:target="makeOrder" class="btn main_bt">
                        <i wire:loading wire:target="makeOrder" class="fa fa-spinner fa-spin text-white"></i>
                        <i wire:loading.remove wire:target="makeOrder" class="fa fa-check"></i> {{ ($orderType && $localConfirmed) ? 'Concluir' : 'Fazer Pedido' }} 
                    </button>
                @endif
            </div>
            
        </div>
    </div>
</div>

<script>
    document.addEventListener('livewire:init', function () {
        Livewire.on('open_modal', () => {
            var myModal = new bootstrap.Modal(document.getElementById('modal-cart'));
            myModal.show();
        });

        Livewire.on('close_modal', () => {
            const modal = document.getElementById('modal-cart');

            modal.classList.remove('show');
            modal.classList.remove('fade'); 
            modal.style.display = 'none';
            
            document.body.classList.remove('modal-open');
            document.body.style = ''; 

            const backdrop = document.querySelector('.modal-backdrop');
            if (backdrop) {
                backdrop.parentNode.removeChild(backdrop);
            }
        });
    });
</script>
