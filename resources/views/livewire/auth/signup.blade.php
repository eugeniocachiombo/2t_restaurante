@section('title', 'Criar conta')
<div class="" style="background: #222; ">
    <div class="logo_login">
        <div class="center">
            <img width="210" src="{{ asset('assets/images/logo/logo.png') }}" alt="#" />
        </div>
    </div>
    <div class="login_form">
        <form class="" >
                <div class="container">
                    <h4>Criar Conta</h4>
                    <hr>
                </div>
                <div class="container">

                    <div class="col-md-12">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class=" first_name">Nome</label>
                                <input class="form-control" type="text" wire:model='first_name' name="first_name"
                                    id="first_name" />
                            </div>

                            <div class="col-md-6">
                                <label class=" last_name">Sobrenome</label>
                                <input class="form-control" type="text" wire:model='last_name' name="last_name"
                                    id="last_name" />
                            </div>

                            <div class="col-md-6">
                                <label class=" gender">Gênero</label>
                                <select class="form-select" wire:model='gender' name="gender" id="gender">
                                    <option value="">Selecione</option>
                                    <option value="MASCULINO">Masculino</option>
                                    <option value="FEMININO">Feminino</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class=" birth_date">Nascimento</label>
                                <input class="form-control" type="date" wire:model='birth_date' name="birth_date"
                                    id="birth_date" />
                            </div>

                            <div class="col-md-6">
                                <label class="email">E-mail</label>
                                <input type="email" wire:model='email' class="form-control" name="email"
                                    id="email" />
                            </div>
                            <div class="col-md-6">
                                <label class="phone">Telefone</label>
                                <input type="number" wire:model='phone' class="form-control" name="phone"
                                    id="phone" />
                            </div>
                            <div class="col-md-6">
                                <label class=" password">Palavra-passe</label>
                                <input wire:model='password' id="password" class="form-control" type="password"
                                    name="password" />
                            </div>

                            <div class="col-md-6">
                                <label class="confirmpassword">Confirmar Palavra-passe</label>
                                <input wire:model='confirmpassword' id="confirmpassword" class="form-control" type="password"
                                    name="confirmpassword" />
                            </div>
                            
                        </div>
                    </div>

                    {{--<div class="col-6">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class=" province_id">Província</label>
                                <select class="form-select" wire:model='province_id' name="province_id"
                                    id="province_id">
                                    <option value="">Selecione</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class=" municipality_id">Município</label>
                                <select class="form-select" wire:model='municipality_id' name="municipality_id"
                                    id="municipality_id">
                                    <option value="">Selecione</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class=" address_id">Morada</label>
                                <select class="form-select" wire:model='address_id' name="address_id" id="address_id">
                                    <option value="">Selecione</option>
                                </select>
                            </div>
                            
                            <div class="col-md-6">
                                <label class=" nif">NIF/BI</label>
                                <input class="form-control" type="text" wire:model='nif' name="nif"
                                    id="nif" />
                            </div>
                            
                           


                            
                        </div>
                    </div> --}}

                    <div class="mt-3">
                        <button wire:click.prevent="save" wire:loading.attr="disabled"
                            wire:target="save" class="btn main_bt">
                            <span wire:loading.remove wire:target="save">Cadastrar</span>
                            <span wire:loading wire:target="save">
                                <i class="fa fa-spinner fa-spin"></i> A processar...
                            </span>
                        </button>
                    </div>
                </div>
        </form>
    </div>
</div>
