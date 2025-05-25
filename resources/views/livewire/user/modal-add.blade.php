<div wire:ignore.self class="modal fade" id="modal-user" tabindex="-1" role="dialog" aria-labelledby="userModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $edit ? 'Editar' : 'Adicionar' }} Cliente</h5>
                <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body row">
                <div class="form-group col-md-6">
                    <label>Nome</label>
                    <input type="text" class="form-control" wire:model.defer="first_name">
                    @error('first_name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group col-md-6">
                    <label>Sobrenome</label>
                    <input type="text" class="form-control" wire:model.defer="last_name">
                    @error('last_name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group col-md-6">
                    <label>Gênero</label>
                    <select class="form-control" wire:model.defer="gender">
                        <option value="">Selecione</option>
                        <option value="MASCULINO">Masculino</option>
                        <option value="FEMININO">Feminino</option>
                    </select>
                    @error('gender') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group col-md-6">
                    <label>Data de Nascimento</label>
                    <input type="date" class="form-control" wire:model.defer="birth_date">
                    @error('birth_date') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group col-md-6">
                    <label>Email</label>
                    <input type="email" class="form-control" wire:model.defer="email">
                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group col-md-6">
                    <label>Telefone</label>
                    <input type="text" class="form-control" wire:model.defer="phone">
                    @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group col-md-6">
                    <label>NIF</label>
                    <input type="text" class="form-control" wire:model.defer="nif">
                    @error('nif') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group col-md-6">
                    <label>Endereço</label>
                    <select class="form-control" wire:model.defer="address_id">
                        <option value="">Selecione</option>
                        @foreach($addresses as $address)
                            <option value="{{ $address->id }}">{{ $address->description }}</option>
                        @endforeach
                    </select>
                    @error('address_id') <span class="text-danger">{{ $message }}</span> @enderror
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
        </form>
    </div>
</div>
