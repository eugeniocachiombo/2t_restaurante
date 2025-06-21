<div wire:ignore.self class="modal fade" id="modal-order-type" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="orderType" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content shadow-lg">
            <div class="modal-header bg-warning text-dark">
                <h5 class="modal-title text-dark">
                    <i class="fa fa-map-marker-alt "></i> Escolher Tipo de Pedido
                </h5>
                <button type="button" class="btn btn-close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body text-center">
                <p class="mb-4 fs-5">Como deseja receber o seu pedido?</p>

                <div class="d-flex justify-content-around">
                    <button wire:click="setOrderType('presencial')"
                        class="btn btn-lg w-45 {{ $orderType === 'presencial' ? 'btn-primary' : 'btn-outline-primary' }}">
                        <i class="fa fa-user"></i> Presencial
                    </button>

                    <button wire:click="setOrderType('online')"
                        class="btn btn-lg w-45 {{ $orderType === 'online' ? 'btn-primary' : 'btn-outline-primary' }}">
                        <i class="fa fa-truck"></i> Entrega
                    </button>
                </div>

                @if ($orderType === 'online')
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
                        <div class="alert alert-primary mt-4" role="alert">
                            <i class="fa fa-info-circle"></i>
                            <strong>Nota:</strong> Será cobrada uma taxa de deslocação de
                            <strong>{{ number_format($deliveryFee, 2, ',', '.') }} AOA</strong>.
                        </div>
                    @endif

                    <div class="mt-4 text-start">
                        <label for="paymentMethod" class="form-label fw-bold">Forma de Pagamento:</label>
                        <select wire:change="generateCodeRef" wire:model="paymentMethod" id="paymentMethod"
                            class="form-control">
                            <option value="">-- Selecione --</option>
                            <option value="ref">Referência</option>
                            <option value="transfer">Transferência</option>
                            <option value="qrcode">Código QR</option>
                        </select>

                        <span class="text-danger">
                            @error('paymentMethod')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    @if ($paymentMethod == 'ref')
                        <div class="alert alert-danger mt-4 " role="alert">
                            <i class="fa fa-warning"></i> Indisponível de momento
                            {{-- 
                            <h4>Pagamento por Referência</h4>
                            <p class="text-start"><h5 class="tex-dark">Entidade:</h5> <h4 class="text-secondary pt-2">Pryanick - Snack Bar</h4></p> 
                            <p><h5 class="tex-dark">Código de Referência:</h5> <h4 class="text-secondary pt-2">{{ $refcode }}</h4></p> 
                           --}}
                        </div>
                    @elseif ($paymentMethod == 'transfer')
                        <h4>Coordenadas Bancárias</h4>
                        @foreach ($accounts as $item)
                            <div class="alert alert-primary mt-4" role="alert">
                                <div class="reference-code"> <b>{{ $item->description ?? 'n/d' }}</b> – IBAN: AO06
                                    {{ $item->iban }}</div>
                            </div>
                        @endforeach
                    @elseif ($paymentMethod == 'qrcode')
                    @endif

                    @if ($paymentMethod != 'ref')
                        <div class="mb-2">
                            <label class="text-start mb-2">Anexar o Comprovativo de Pagamento (PDF/Imagem)</label>
                            <input type="file" class="form-control" wire:model="invoice">

                            {{-- Barra de progresso com wire:loading --}}
                            <div class="my-2" wire:loading wire:target="invoice">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary"
                                        style="width: 100%">
                                        Carregando...
                                    </div>
                                </div>
                            </div>

                            {{-- Pré-visualização se imagem --}}
                            @if ($invoice && Str::startsWith($invoice->getMimeType(), 'image'))
                                <center>
                                    <div class="my-3">
                                        <img src="{{ $invoice->temporaryUrl() }}" class="img-fluid rounded"
                                            style="max-height: 100px;">
                                        <br>
                                        <button type="button" class="btn btn-sm btn-danger mt-2"
                                            wire:click="$set('invoice', null)">
                                            Remover Comprovativo
                                        </button>
                                    </div>
                                </center>
                            @endif

                            @error('invoice')
                            <br>
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
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
