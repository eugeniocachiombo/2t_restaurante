<div wire:ignore.self class="modal fade" id="modal-invoice" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="invoice" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fa fa-file"></i> {{ $edit ? 'Editar Fatura' : 'Submeter Fatura' }}
                </h5>
                <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="mb-2">
                    <label>Nº da Fatura</label>
                    <input type="text" class="form-control" wire:model="number">
                    @error('number') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-2">
                    <label>Comprovativo (PDF/Imagem)</label>
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
                                <img src="{{ $invoice->temporaryUrl() }}" class="img-fluid rounded" style="max-height: 100px;">
                                <br>
                                <button type="button" class="btn btn-sm btn-danger mt-2" wire:click="$set('invoice', null)">
                                    Remover Comprovativo
                                </button>
                            </div>
                        </center>
                    @endif

                    @error('invoice') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="modal-footer">
                <button wire:click.prevent="submit"
                    wire:loading.attr="disabled"
                    wire:target="submit"
                    class="btn main_bt">
                    <span wire:loading.remove wire:target="submit">
                        {{ $edit ? 'Actualizar' : 'Submeter' }}
                    </span>
                    <span wire:loading wire:target="submit">
                        <i class="fa fa-spinner fa-spin"></i> A processar...
                    </span>
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('livewire:init', function () {
        Livewire.on('open_modal', () => {
            var myModal = new bootstrap.Modal(document.getElementById('modal-invoice'));
            myModal.show();
        });

        Livewire.on('close_modal', () => {
            var myModal = bootstrap.Modal.getInstance(document.getElementById('modal-invoice'));
            if (myModal) myModal.hide();
        });
    });
</script>
