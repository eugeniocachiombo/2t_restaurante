<div wire:ignore.self class="modal fade" id="modal-add" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="ingredient" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fa fa-leaf"></i> {{ $edit ? 'Editar Ingrediente' : 'Adicionar Ingrediente' }}
                </h5>
                <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="mb-2">
                    <label>Descrição</label>
                    <input type="text" class="form-control" wire:model="description">
                    @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-2">
                    <label>Unidade</label>
                    <select class="form-select" wire:model="unit">
                        <option value="">Selecione</option>
                        <option value="unidade">unidade</option>
                        <option value="kg">kg</option>
                        <option value="g">g</option>
                        <option value="L">L</option>
                        <option value="mL">mL</option>
                    </select>
                    @error('unit') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-2">
                    <label>Categoria</label>
                    <select  class="form-select" wire:model="category_id">
                        <option value="">Selecione</option>
                        @foreach ($categories as $item)
                        <option value="{{$item->id}}">{{$item->description}}</option>
                        @endforeach
                    </select>
                    @error('category_id') <span class="text-danger">{{ $message }}</span> @enderror
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
