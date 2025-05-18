<div wire:ignore.self class="modal fade" id="modal-add-stockenter" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="product" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content" >
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fa fa-tag"></i> Dar Entrada
                </h5>
                <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="mb-2">
                    <label>Bebida</label>
                    <select {{ $edit ? 'disabled' : '' }} class="form-control" wire:model="drink_id">
                        <option value="">Selecione</option>
                        @foreach ($drinks as $drink)
                            <option value="{{ $drink->id }}">{{ $drink->description }}</option>
                        @endforeach
                    </select>
                    @error('drink_id') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-2">
                    <label>Quantidade</label>
                    <input {{ $edit ? 'disabled' : '' }} type="text" id="quantity" class="form-control" wire:model="quantity">
                    @error('quantity') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-2">
                    <label>Data de Expiração</label>
                    <input {{ $edit ? 'disabled' : '' }} type="date" class="form-control" wire:model="expiration_date">
                    @error('expiration_date') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="modal-footer">
                <button wire:click.prevent="submit"
                    wire:loading.attr="disabled"
                    wire:target="submit"
                    class="btn main_bt {{ $edit ? 'd-none' : '' }}">
                    <span wire:loading.remove wire:target="submit">
                        {{ $edit ? 'Actualizar' : 'Adicionar' }}
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
    document.addEventListener('livewire:init', function() {
        Livewire.on('open_modal', () => {
            var myModal = new bootstrap.Modal(document.getElementById('modal-add'));
            myModal.show();
        });

        Livewire.on('close_modal', () => {
            var myModal = bootstrap.Modal.getInstance(document.getElementById('modal-add'));
            if (myModal) myModal.hide();
        });
    });
</script>
