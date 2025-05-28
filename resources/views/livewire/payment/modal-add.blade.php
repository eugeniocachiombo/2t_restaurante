<div wire:ignore.self class="modal fade" id="modal-bank-account" tabindex="-1" role="dialog" aria-labelledby="userModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <form class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $edit ? 'Editar' : 'Adicionar' }} Cliente</h5>
                <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body row">
                <div class="form-group col-12 py-3">
                    <label>Descrição</label>
                    <input type="text" class="form-control" wire:model.defer="description">
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-12 py-3">
                    <label>IBAN</label>
                    <input type="text" class="form-control" id="iban" wire:model="iban">
                    @error('iban')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <script>
                        $("#iban").mask('0000 0000 0000 0000 0000 0', { reverse: false });
                    </script>
                </div>

                <div class="modal-footer">
                    <button wire:click.prevent="submit" wire:loading.attr="disabled" wire:target="submit"
                        class="btn main_bt">
                        <span wire:loading.remove wire:target="submit">
                            {{ $edit ? 'Actualizar' : 'Adicionar' }}
                        </span>
                        <span wire:loading wire:target="submit">
                            <i class="fa fa-spinner fa-spin"></i> A processar...
                        </span>
                    </button>
                </div>
        </form>
    </div>
</div>
<script>
    document.addEventListener('livewire:init', function () {
        Livewire.on('open_modal', () => {
            var myModal = new bootstrap.Modal(document.getElementById('modal-bank-account'));
            myModal.show();
        });

        Livewire.on('close_modal', () => {
            const modal = document.getElementById('modal-bank-account');

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