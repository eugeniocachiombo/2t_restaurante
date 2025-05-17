<nav id="sidebar" style="background: #222">
    <div class="sidebar_blog_1">
        <div class="sidebar-header">
            <div class="logo_section" style="background: #222">
                <a href="{{ asset('assets/index.html') }}">
                    <img class="logo_icon img-responsive" src="{{ asset('assets/images/logo/logo_icon.png') }}"
                        alt="#" />
                </a>
            </div>
        </div>
        <div class="sidebar_user_info" style="background: #222">
            <div class="icon_setting"></div>
            <div class="user_profle_side ">
                <div class="user_img d-flex align-items-center justify-content-center">
                    @if (auth()->user()->photo)
                        <a href="{{ asset('storage/' . auth()->user()->photo) }}">
                            <img  class="img-fluid rounded-circle"
                                src="{{ asset('storage/' . auth()->user()->photo) }}" alt="photo de perfil"
                                style="width: 50px; height: 50px">
                        </a>
                    @else
                    <i class="fa fa-image text-white fa-3x"></i>
                    @endif
                </div>
                <div class="user_info">
                    <h6>{{ ucwords(auth()->user()->first_name) }} {{ ucwords(auth()->user()->last_name) }}</h6>
                    <p><span class="online_animation"></span> Online</p>
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar_blog_2">
        <h4 style="background: #222;">{{ ucwords(auth()->user()->getAccess->description) }}</h4>
        <ul class="list-unstyled components">
            <li class="active">
                <a href="{{ route('homepage') }}">
                    <i class="fa fa-dashboard yellow_color"></i> <span>Painel Principal</span>
                </a>
            </li>
            <li>
                <a href="{{ route('user.profile') }}">
                    <i class="fa fa-user red_color"></i> <span>Perfil</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-clipboard orange_color"></i> <span>Pedidos</span>
                </a>
            </li>
            <li>
                <a href="#drinks" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fa fa-glass purple_color"></i> <span>Bebidas</span>
                </a>
                <ul class="collapse list-unstyled" id="drinks">
                    <li><a href="{{ route('drink.stockenter.component') }}"><i class="fa fa-plus-circle purple_color"></i> <span>Entrada de Estoque</span></a></li>
                    <li><a href="{{ route('drink.component') }}"><i class="fa fa-glass purple_color"></i> <span>Lista de bebidas</span></a></li>
                </ul>
            </li>
            <li>
                <a href="#recipes" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fa fa-fire orange_color2"></i> <span>Cozinha</span>
                </a>
                <ul class="collapse list-unstyled" id="recipes">
                    
                    <li>
                        <a href="{{ route('category.component') }}">
                            <i class="fa fa-tag red_color"></i> <span>Categorias</span>
                        </a>    
                    </li>
                    <li>
                        <a href="{{ route('ingredient.component') }}">
                            <i class="fa fa-leaf green_color"></i> <span>Ingredientes</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('drink.stockenter.component') }}">
                             <span><i class="fa fa-book purple_color2"></i> Receitas</span></a>
                    </li>
                    
                </ul>
            </li>
            <li>
                <a href="{{ route('dish.component') }}">
                    <i class="fa fa-cutlery blue1_color"></i> <span>Pratos</span>
                </a>
            </li>
            <li class="active">
                <a href="#users" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fa fa-users yellow_color"></i> <span>Utilizadores</span>
                </a>
                <ul class="collapse list-unstyled" id="users">
                    <li><a href="#">> <span>Clientes</span></a></li>
                    <li><a href="#">> <span>Atendentes</span></a></li>
                    <li><a href="#">> <span>Supervisores</span></a></li>
                    <li><a href="#">> <span>Cozinheiros</span></a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
