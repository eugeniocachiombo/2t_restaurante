<nav id="sidebar" style="background: #222">
    <div class="sidebar_blog_1">
        <div class="sidebar-header">
            <div class="logo_section" style="background: #222">
                <a href="{{ asset('assets/index.html') }}">
                    <img class="logo_icon img-responsive"
                        src="{{ asset('assets/images/logo/logo_icon.png') }}" alt="#" />
                </a>
            </div>
        </div>
        <div class="sidebar_user_info" style="background: #222">
            <div class="icon_setting"></div>
            <div class="user_profle_side">
                <div class="user_img">
                    <img class="img-responsive" src="{{ asset('assets/images/layout_img/user_img.jpg') }}"
                        alt="#" />
                </div>
                <div class="user_info">
                    <h6>{{ucwords(auth()->user()->first_name)}} {{ucwords(auth()->user()->last_name)}}</h6>
                    <p><span class="online_animation"></span> Online</p>
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar_blog_2" >
        <h4 style="background: #222;">{{ucwords(auth()->user()->getAccess->description)}}</h4>
        <ul class="list-unstyled components">
            <li class="active">
                <a href="#dashboard" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fa fa-dashboard yellow_color"></i> <span>Painel Principal</span>
                </a>
                <ul class="collapse list-unstyled" id="dashboard">
                    <li><a href="{{ asset('assets/dashboard.html') }}">> <span>Painel Padrão</span></a>
                    </li>
                    <li><a href="{{ asset('assets/dashboard_2.html') }}">> <span>Estilo do Painel
                                2</span></a></li>
                </ul>
            </li>
            <li>
                <a href="{{ asset('assets/widgets.html') }}">
                    <i class="fa fa-clock-o orange_color"></i> <span>Widgets</span>
                </a>
            </li>
            <li>
                <a href="#element" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fa fa-diamond purple_color"></i> <span>Elementos</span>
                </a>
                <ul class="collapse list-unstyled" id="element">
                    <li><a href="{{ asset('assets/general_elements.html') }}">> <span>Elementos
                                Gerais</span></a></li>
                    <li><a href="{{ asset('assets/media_gallery.html') }}">> <span>Galeria de
                                Mídia</span></a></li>
                    <li><a href="{{ asset('assets/icons.html') }}">> <span>Ícones</span></a></li>
                    <li><a href="{{ asset('assets/invoice.html') }}">> <span>Factura</span></a></li>
                </ul>
            </li>
            <li>
                <a href="{{ asset('assets/tables.html') }}">
                    <i class="fa fa-table purple_color2"></i> <span>Tabelas</span>
                </a>
            </li>
            <li>
                <a href="#apps" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fa fa-object-group blue2_color"></i> <span>Aplicações</span>
                </a>
                <ul class="collapse list-unstyled" id="apps">
                    <li><a href="{{ asset('assets/email.html') }}">> <span>Email</span></a></li>
                    <li><a href="{{ asset('assets/calendar.html') }}">> <span>Calendário</span></a></li>
                    <li><a href="{{ asset('assets/media_gallery.html') }}">> <span>Galeria de
                                Mídia</span></a></li>
                </ul>
            </li>
            <li>
                <a href="{{ asset('assets/price.html') }}">
                    <i class="fa fa-briefcase blue1_color"></i> <span>Tabelas de Preços</span>
                </a>
            </li>
            <li>
                <a href="{{ asset('assets/contact.html') }}">
                    <i class="fa fa-paper-plane red_color"></i> <span>Contacto</span>
                </a>
            </li>
            <li class="active">
                <a href="#additional_page" data-toggle="collapse" aria-expanded="false"
                    class="dropdown-toggle">
                    <i class="fa fa-clone yellow_color"></i> <span>Páginas Adicionais</span>
                </a>
                <ul class="collapse list-unstyled" id="additional_page">
                    <li><a href="{{ asset('assets/profile.html') }}">> <span>Perfil</span></a></li>
                    <li><a href="{{ asset('assets/project.html') }}">> <span>Projectos</span></a></li>
                    <li><a href="{{ asset('assets/login.html') }}">> <span>Iniciar Sessão</span></a></li>
                    <li><a href="{{ asset('assets/404_error.html') }}">> <span>Erro 404</span></a></li>
                </ul>
            </li>
            <li>
                <a href="{{ asset('assets/map.html') }}">
                    <i class="fa fa-map purple_color2"></i> <span>Mapa</span>
                </a>
            </li>
            <li>
                <a href="{{ asset('assets/charts.html') }}">
                    <i class="fa fa-bar-chart-o green_color"></i> <span>Gráficos</span>
                </a>
            </li>
            <li>
                <a href="{{ asset('assets/settings.html') }}">
                    <i class="fa fa-cog yellow_color"></i> <span>Definições</span>
                </a>
            </li>
        </ul>
    </div>
</nav>