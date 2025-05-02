@section('title', 'Autenticação')
<div class="full_container" 
style="background: rgba(21, 40, 60, .8); background-image: url('{{ asset('assets/img/rest/1(1).jpg') }}'); background-size: cover; background-position: center; ">
    <div class="container" >
        <div class="center verticle_center full_height">
            <div class="login_section">
                <div class="logo_login">
                    <div class="center">
                        <img width="210" src="{{ asset('assets/images/logo/logo.png') }}" alt="#" />
                    </div>
                </div>
                <div class="login_form">
                    <form>
                        <fieldset >
                            <div class="field">
                                <label class="label_field">E-mail/Telefone</label>
                                <input type="text" wire:model="emailphone" name="emailphone" placeholder="Digite o Email ou Telefone" />
                                @error('emailphone')
                                        <span class="text-danger mt-2">{{$message}}</span>
                                    @enderror
                            </div>
                            <div class="field">
                                <label class="label_field">Palavra-passe</label>
                                <input type="password" wire:model="password" name="password" placeholder="******" />
                                @error('password')
                                        <span class="text-danger mt-2">{{$message}}</span>
                                    @enderror
                            </div>
                            <div class="ms-md-4 mb-md-2 d-md-flex align-items-center">
                                <input type="checkbox" class="me-2" wire:model='remember_me'> Lembrar-me 
                            </div>
                            
                            <div class="">
                                <a class="forgot" href="" >Esqueceu a palavra-passe?</a>
                            </div>
                            <div class="field margin_0">
                                <label class="label_field hidden">hidden label</label>
                                <button wire:click.prevent="authenticate" wire:loading.attr="disabled"
                                    wire:target="authenticate" class="main_bt">
                                    <span wire:loading.remove wire:target="authenticate">Entrar</span>
                                    <span wire:loading wire:target="authenticate">
                                        <i class="fa fa-spinner fa-spin"></i> A processar... 
                                    </span>
                                </button>
                            </div>
                            <div class="field ">
                                <a class="forgot" href="{{route('auth.signup')}}" >Criar uma conta</a>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
