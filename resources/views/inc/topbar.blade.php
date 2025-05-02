<div class="topbar" >
    <nav class="navbar navbar-expand-lg navbar-light" style="background: #222;">
        <div class="full">
                <button style="background: #222;" type="button" id="sidebarCollapse" class="sidebar_toggle">
                    <i class="fa fa-bars"></i>
                </button>
            <div class="logo_section">
                <a href="{{ asset('assets/index.html') }}">
                    <img class="img-responsive" src="{{ asset('assets/images/logo/logo.png') }}"
                        alt="#" />
                </a>
            </div>
            <div class="right_topbar" >
                <div class="icon_info">
                    <ul>
                        <li>
                            <a href="#"><i class="fa fa-bell-o"></i><span
                                    class="badge" style="background: #133070">2</span></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-question-circle"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-envelope-o"></i><span
                                    class="badge" style="background: #133070">3</span></a>
                        </li>
                    </ul>
                    <ul class="user_profile_dd" >
                        <li style="background: #222">
                            <a  class="dropdown-toggle" data-toggle="dropdown">
                                <img class="img-responsive rounded-circle"
                                    src="{{ asset('assets/images/layout_img/user_img.jpg') }}"
                                    alt="#" />
                                <span class="name_user">{{ucwords(auth()->user()->first_name)}} {{ucwords(auth()->user()->last_name)}}</span>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item"
                                    href="{{ route('user.profile') }}">Meu Perfil</a>
                                <a class="dropdown-item"
                                    href="{{ asset('assets/settings.html') }}">Definições</a>
                                <a class="dropdown-item"
                                    href="{{ asset('assets/help.html') }}">Ajuda</a>
                                <a class="dropdown-item" href="#"><span>Terminar Sessão</span>
                                    <i class="fa fa-sign-out"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>