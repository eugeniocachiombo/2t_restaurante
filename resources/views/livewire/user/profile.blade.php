@section('title', 'Perfil do Utilizador')
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>@yield('title')</h2>
                </div>
            </div>
        </div>
        <div class="row column1 ">
            <div class="col-md-12">
                <div class="white_shd full ">
                    <div class="full graph_head">
                        <div class="heading1 margin_0">
                            <h2>@yield('title')</h2>
                        </div>
                    </div>
                    <div class="full price_table padding_infor_info">
                        <div class="row">
                            <!-- profile image -->
                            <div class="col-lg-12">
                                <div class="full dis_flex center_text">
                                    <div class="profile_img"><img width="180" class="rounded-circle"
                                            src="{{asset('assets/images/layout_img/user_img.jpg')}}" alt="#" /></div>
                                    <div class="profile_contant">
                                        <div class="contact_inner">
                                            <h3>{{ ucwords($user->first_name) }}
                                                {{ ucwords($user->last_name) }}</h3>
                                            <p style="font-size: 12px"><strong>Acesso:
                                                </strong>{{ ucwords($user->getAccess->description) }}</p>
                                        </div>

                                    </div>
                                </div>
                                <!-- profile contant section -->
                                <div class="full inner_elements margin_top_30">
                                    <div class="tab_style2">
                                        <div class="tabbar">
                                            <nav>
                                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                    <a class="nav-item nav-link {{ $tab == 'profile_section' ? 'active' : '' }}"
                                                        wire:click="set_tab('profile_section')" id="nav-contact-tab"
                                                        data-toggle="tab" href="#profile_section" role="tab"
                                                        aria-selected="false">Perfil</a>
                                                    <a class="nav-item nav-link {{ $tab == 'recent_activity' ? 'active' : '' }}"
                                                        wire:click="set_tab('recent_activity')" id="nav-home-tab"
                                                        data-toggle="tab" href="#recent_activity" role="tab"
                                                        aria-selected="true">Actualizar dados</a>
                                                    <a class="nav-item nav-link {{ $tab == 'project_worked' ? 'active' : '' }}"
                                                        wire:click="set_tab('project_worked')" id="nav-profile-tab"
                                                        data-toggle="tab" href="#project_worked" role="tab"
                                                        aria-selected="false">Alterar Senha</a>
                                                </div>
                                            </nav>
                                            <div class="tab-content" id="nav-tabContent">
                                                <div class="tab-pane fade {{ $tab == 'profile_section' ? 'show active' : '' }} "
                                                    id="profile_section" role="tabpanel"
                                                    aria-labelledby="nav-contact-tab">
                                                    <h3 class="mb-2">Dados Pessoais</h3>

                                                    <ul class="list-unstyled" style="font-size: 15px">
                                                        <li class="my-3"><i class="fa fa-tag"></i> Gênero:
                                                            {{ ucwords($user->gender) }}</li>
                                                        <li class="my-3"><i class="fa fa-calendar"></i> Data de
                                                            nascimento:
                                                            {{ $this->format_birth_date($user->birth_date) }}
                                                        </li>
                                                        <li class="my-3"><i class="fa fa-ticket"></i> Portador BI/NIF:
                                                            {{ $user->nif ?? 'n/d' }}</li>
                                                        <li class="my-3"><i class="fa fa-envelope-o"></i> Email:
                                                            {{ ucwords($user->email) }}</li>
                                                        <li class="my-3"><i class="fa fa-phone"></i> Telefone:
                                                            {{ ucwords($user->phone) }}</li>
                                                        <li class="my-3"><i class="fa fa-map"></i> Morada:
                                                            @if ($user->address_id)
                                                                {{ $user->getAddress->description }},
                                                                {{ $user->getAddress->getMunicipality->description }},
                                                                {{ $user->getAddress->getProvince->description }}
                                                            @else
                                                                n/d
                                                            @endif
                                                        </li>

                                                    </ul>
                                                </div>
                                                <div class="tab-pane fade {{ $tab == 'recent_activity' ? 'show active' : '' }} "
                                                    id="recent_activity" role="tabpanel" aria-labelledby="nav-home-tab">
                                                    <div class="msg_list_main">
                                                        <h1>Actualizar dados</h1>
                                                        <hr>
                                                        <div class="row g-3">
                                                            <div class="col-md-6">
                                                                <label for="first_name">Nome</label>
                                                                <input class="form-control" type="text"
                                                                    wire:model='first_name' name="first_name"
                                                                    id="first_name" />
                                                                @error('first_name')
                                                                    <span
                                                                        class="text-danger mt-2">{{ $message }}</span>
                                                                @enderror
                                                            </div>

                                                            <div class="col-md-6">
                                                                <label for="last_name">Sobrenome</label>
                                                                <input class="form-control" type="text"
                                                                    wire:model='last_name' name="last_name"
                                                                    id="last_name" />
                                                                @error('last_name')
                                                                    <span
                                                                        class="text-danger mt-2">{{ $message }}</span>
                                                                @enderror
                                                            </div>

                                                            <div class="col-md-6">
                                                                <label for="gender">Gênero</label>
                                                                <select class="form-select" wire:model='gender'
                                                                    name="gender" id="gender">
                                                                    <option value="">Selecione</option>
                                                                    <option value="MASCULINO">Masculino</option>
                                                                    <option value="FEMININO">Feminino</option>
                                                                </select>
                                                                @error('gender')
                                                                    <span
                                                                        class="text-danger mt-2">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="birth_date">Nascimento</label>
                                                                <input class="form-control" type="date"
                                                                    wire:model='birth_date' name="birth_date"
                                                                    id="birth_date" />
                                                                @error('birth_date')
                                                                    <span
                                                                        class="text-danger mt-2">{{ $message }}</span>
                                                                @enderror
                                                            </div>

                                                            <div class="col-md-6">
                                                                <label for="email">E-mail</label>
                                                                <input type="email" wire:model='email'
                                                                    class="form-control" name="email"
                                                                    id="email" />
                                                                @error('email')
                                                                    <span
                                                                        class="text-danger mt-2">{{ $message }}</span>
                                                                @enderror
                                                            </div>

                                                            <div class="col-md-6">
                                                                <label for="phone">Telefone</label>
                                                                <input type="number" wire:model='phone'
                                                                    class="form-control" name="phone"
                                                                    id="phone" />
                                                                @error('phone')
                                                                    <span
                                                                        class="text-danger mt-2">{{ $message }}</span>
                                                                @enderror
                                                            </div>

                                                            <div class="col-md-6">
                                                                <label class=" nif">NIF/BI</label>
                                                                <input class="form-control" type="text"
                                                                    wire:model='nif' name="nif" id="nif" />
                                                                @error('nif')
                                                                    <span
                                                                        class="text-danger mt-2">{{ $message }}</span>
                                                                @enderror
                                                            </div>

                                                            <div class="col-md-6">
                                                                <label class=" province_id">Província</label>
                                                                <select class="form-control" style="width: 100%"
                                                                    wire:change='get_local' wire:model='province_id'
                                                                    name="province_id" id="province_id">
                                                                    <option value="">Selecione</option>
                                                                    @foreach ($provinces as $item)
                                                                        <option value="{{ $item->id }}">
                                                                            {{ $item->description }}</option>
                                                                    @endforeach
                                                                </select>

                                                                @error('province_id')
                                                                    <span
                                                                        class="text-danger mt-2">{{ $message }}</span>
                                                                @enderror
                                                            </div>

                                                            <div class="col-md-6">
                                                                <label class=" municipality_id">Município</label>
                                                                <select class="form-select" wire:change='get_local'
                                                                    wire:model='municipality_id'
                                                                    name="municipality_id" id="municipality_id">
                                                                    <option value="">Selecione</option>
                                                                    @foreach ($municipalities as $item)
                                                                        <option value="{{ $item->id }}">
                                                                            {{ $item->description }}</option>
                                                                    @endforeach
                                                                </select>

                                                                @error('municipality_id')
                                                                    <span
                                                                        class="text-danger mt-2">{{ $message }}</span>
                                                                @enderror
                                                            </div>

                                                            <div class="col-md-6">
                                                                <label class=" address_id">Morada</label>
                                                                <select class="form-select" wire:model='address_id'
                                                                    name="address_id" id="address_id">
                                                                    <option value="">Selecione</option>
                                                                    @foreach ($addresses as $item)
                                                                        <option value="{{ $item->id }}">
                                                                            {{ $item->description }}</option>
                                                                    @endforeach
                                                                </select>

                                                                @error('address_id')
                                                                    <span
                                                                        class="text-danger mt-2">{{ $message }}</span>
                                                                @enderror
                                                            </div>

                                                            <div class="my-3">
                                                                <button wire:click.prevent='update' wire:loading.attr="disabled"
                                                                    wire:target="update" class="btn main_bt">
                                                                    <span wire:loading.remove
                                                                        wire:target="update">Actualizar</span>
                                                                    <span wire:loading wire:target="update">
                                                                        <i class="fa fa-spinner fa-spin"></i> A
                                                                        processar...
                                                                    </span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade {{ $tab == 'project_worked' ? 'show active' : '' }} "
                                                    id="project_worked" role="tabpanel"
                                                    aria-labelledby="nav-profile-tab">
                                                    <h1>Alterar palavra-passe</h1> <hr>
                                                    <div class="row g-3 col-md-6">
                                                        <div class="col-md-7">
                                                            <label class="oldpassword">Antiga</label>
                                                            <input wire:change='check_password' class="form-control" type="password"
                                                                wire:model='oldpassword' name="oldpassword" id="oldpassword" />
                                                            @error('oldpassword')
                                                                <span
                                                                    class="text-danger mt-2">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-7">
                                                            <label class="newpassword">Nova</label>
                                                            <input wire:change='check_password' class="form-control" type="password"
                                                                wire:model='newpassword' name="newpassword" id="newpassword" />
                                                            @error('newpassword')
                                                                <span
                                                                    class="text-danger mt-2">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-7">
                                                            <label class="confirmpassword">Confirmar</label>
                                                            <input wire:change='check_password' class="form-control" type="password"
                                                                wire:model='confirmpassword' name="confirmpassword" id="confirmpassword" />
                                                            @error('confirmpassword')
                                                                <span
                                                                    class="text-danger mt-2">{{ $message }}</span>
                                                            @enderror
                                                        </div>

                                                        <div class="my-3">
                                                            <button wire:click.prevent='change_password' wire:loading.attr="disabled"
                                                                wire:target="change_password" class="btn main_bt">
                                                                <span wire:loading.remove
                                                                    wire:target="change_password">Alterar</span>
                                                                <span wire:loading wire:target="change_password">
                                                                    <i class="fa fa-spinner fa-spin"></i> A
                                                                    processar...
                                                                </span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end user profile section -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
    </div>
    @include('inc.footer')
</div>
@push('scripts')
    <script>
        /*   $(document).ready(function() {
                    $('#province_id').select2({
                        theme: 'bootstrap-5',
                        width: "100%"
                    });
                    $('#province_id').on('change', function(e) {
                        @this.set('province_id', $('#province_id').select2("val"));
                        @this.get_local();
                    });
                });*/
    </script>
@endpush
