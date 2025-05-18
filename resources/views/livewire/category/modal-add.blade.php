<div wire:ignore.self class="modal fade " id="modal-add" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="category" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    <i class="fa fa-tag"></i> Adicionar Categoria
                </h5>
                <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <label for="description">Descrição</label>
                    <input class="form-control" type="text" wire:model='description' name="description"
                        id="description" />
                        @error('description')
                            <span class="text-danger mt-2">{{$message}}</span>
                        @enderror
                </div>
            </div>

            <div class="modal-footer">
                <button wire:click.prevent="submit"
                    wire:loading.attr="disabled"
                    wire:target="submit"
                    class="btn main_bt">
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
        Livewire.on('open_modal', (message) => {
            var myModal = new bootstrap.Modal(document.getElementById('modal-add'));
            myModal.show();
        });

        Livewire.on('close_modal', (message) => {
            var myModal = new bootstrap.Modal(document.getElementById('modal-add'));
            myModal.hide();
        });
    });
</script>
