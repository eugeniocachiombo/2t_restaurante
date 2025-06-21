<div class="topbar">
    <nav class="navbar navbar-expand-lg navbar-light" style="background: #222;">
        <div class="full">
            <button style="background: #222;" type="button" id="sidebarCollapse" class="sidebar_toggle">
                <i class="fa fa-bars"></i>
            </button>
            <div class="logo_section">
                <a href="/">
                    <img class="img-responsive" src="{{ asset('assets/images/logo/logo.png') }}" alt="#" />
                </a>
            </div>
            <div class="right_topbar">
                <div class="icon_info ">
                    <ul class="">
                        <li>
                            @livewire('home.notification-component')
                        </li>
                        <li class="d-none">
                            <a href="#"><i class="fa fa-question-circle"></i></a>
                        </li>
                        <li class="d-none">
                            <a href="#"><i class="fa fa-envelope-o"></i><span class="badge"
                                    style="background: #133070">3</span></a>
                        </li>
                    </ul>
                    <ul class="user_profile_dd">
                        <li style="background: #222">
                            <a class="dropdown-toggle" data-toggle="dropdown">
                                @if (auth()->user()->photo)
                                    <img class="img-fluid rounded-circle"
                                        src="{{ asset('storage/' . auth()->user()->photo) }}" alt="photo de perfil"
                                        style="width: 40px; height: 40px">
                                @else
                                    <i class="fa fa-image text-white fa-2x"></i>
                                @endif
                                <span class="name_user">{{ ucwords(auth()->user()->first_name) }}
                                    {{ ucwords(auth()->user()->last_name) }}</span>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('user.profile') }}">Meu Perfil</a>
                                @can('admin')
                                    <a class="dropdown-item" href="{{ route('payment.account') }}">Definições</a>
                                @endcan

                                <a class="dropdown-item" href="{{ route('auth.help') }}">Ajuda</a>
                                <a class="dropdown-item" href="{{ route('auth.logout') }}"><span>Terminar Sessão</span>
                                    <i class="fa fa-sign-out"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    @livewire('home.notification-modal')
</div>
