<div wire:ignore.self class="modal fade" id="modal-add" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="product" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fa fa-tag"></i> {{ $edit ? 'Editar Bebida' : 'Adicionar Bebida' }}
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
                    <label>Preço</label>
                    <input type="text" id="price" class="form-control" wire:model="price">
                    @error('price') <span class="text-danger">{{ $message }}</span> @enderror
                    <script>
                        $("#price").mask('000.000.000.000.000,00', {
                            reverse: true
                        });
                    </script>
                </div>

                <div class="mb-2">
                    <label>Foto</label>
                    <input type="file" class="form-control" wire:model="photo">
                    
                    <!-- Barra de progresso simples com wire:loading -->
                    <div class="my-2 w-100" wire:loading wire:target="photo">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary"
                                role="progressbar" style="width: 100%">
                                Carregando...
                            </div>
                        </div>
                    </div>

                    <!-- Pré-visualização -->
                    <center>
                        @if ($photo)
                            <div class="my-3">
                                <img src="{{ $photo->temporaryUrl() }}" alt="Pré-visualização da Foto"
                                    class="img-fluid rounded" style="max-height: 100px;"> <br>
                                <button type="button" class="btn btn-sm btn-danger mt-2"
                                    wire:click="$set('photo', null)">
                                    Remover Foto
                                </button>
                            </div>
                        @endif
                    </center>

                    @error('photo') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

            </div>

            <div class="modal-footer">
                <button wire:click.prevent="submit"
                    wire:loading.attr="disabled"
                    wire:target="submit"
                    class="btn main_bt">
                    <span wire:loading.remove wire:target="submit">
                        {{ $edit ? 'Atualizar' : 'Adicionar' }}
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
