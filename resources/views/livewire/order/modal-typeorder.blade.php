<div wire:ignore.self class="modal fade" id="modal-order-type" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="orderType" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content shadow-lg">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">
                    <i class="fa fa-map-marker-alt"></i> Escolher Tipo de Pedido
                </h5>
                <button type="button" class="btn btn-close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body text-center">
                <p class="mb-4 fs-5">Como deseja receber o seu pedido?</p>

                <div class="d-flex justify-content-around">
                    <button wire:click="setOrderType('online')"
                        class="btn btn-lg w-45 {{ $orderType === 'online' ? 'btn-success' : 'btn-outline-success' }}">
                        <i class="fa fa-globe"></i> Online
                    </button>

                    <button wire:click="setOrderType('presencial')"
                        class="btn btn-lg w-45 {{ $orderType === 'presencial' ? 'btn-info' : 'btn-outline-info' }}">
                        <i class="fa fa-store"></i> Presencial
                    </button>
                </div>

                @if ($orderType === 'presencial')
                    <div class="mt-4 text-start">
                        <label for="address" class="form-label fw-bold">Selecione a Morada:</label>
                        <select wire:model="address" id="address" class="form-control">
                            <option value="">-- Selecione --</option>
                            <option value="Golf 2 Projecto Nova Vida">Golf 2 Projecto Nova Vida</option>
                            <option value="Maianga">Maianga</option>
                            <option value="Viana">Viana</option>
                            <option value="Cazenga">Cazenga</option>
                            <option value="Outros">Outros</option>
                        </select>

                        <span class="text-danger">
                            @error('address')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    @if ($address)
                        <div class="alert alert-warning mt-4" role="alert">
                            <i class="fa fa-info-circle"></i>
                            <strong>Nota:</strong> Será cobrada uma taxa de deslocação de
                            <strong>{{ number_format($deliveryFee, 2, ',', '.') }} AOA</strong>.
                        </div>
                    @endif
                @endif
            </div>

            <div class="modal-footer justify-content-center">
                <button type="button" wire:click.prevent="unsetOrderType" class="btn btn-secondary"
                    data-dismiss="modal">Cancelar</button>
                <button wire:click.prevent="confirmOrderType" wire:target="confirmOrderType" class="btn btn-primary">
                    <i wire:loading wire:target="confirmOrderType" class="fa fa-spinner fa-spin text-white"></i>
                    <i wire:loading.remove wire:target="confirmOrderType" class="fa fa-check"></i> Confirmar
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('livewire:init', function() {
        Livewire.on('open_order_type_modal', () => {
            var modal = new bootstrap.Modal(document.getElementById('modal-order-type'));
            modal.show();
        });

        Livewire.on('close_order_type_modal', () => {
            const modal = document.getElementById('modal-order-type');

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
