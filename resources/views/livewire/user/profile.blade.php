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
        <div class="row column1">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="white_shd full margin_bottom_30">
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
                                            src="images/layout_img/user_img.jpg" alt="#" /></div>
                                    <div class="profile_contant">
                                        <div class="contact_inner">
                                            <h3>{{ ucwords(auth()->user()->first_name) }}
                                                {{ ucwords(auth()->user()->last_name) }}</h3>
                                            <p><strong>Acesso:
                                                </strong>{{ ucwords(auth()->user()->getAccess->description) }}</p>
                                            <ul class="list-unstyled">
                                                <li><i class="fa fa-envelope-o"></i> :
                                                    {{ ucwords(auth()->user()->email) }}</li>
                                                <li><i class="fa fa-phone"></i> : {{ ucwords(auth()->user()->phone) }}
                                                </li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                                <!-- profile contant section -->
                                <div class="full inner_elements margin_top_30">
                                    <div class="tab_style2">
                                        <div class="tabbar">
                                            <nav>
                                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                    <a class="nav-item nav-link active" id="nav-contact-tab"
                                                        data-toggle="tab" href="#profile_section" role="tab"
                                                        aria-selected="false">Perfil</a>
                                                    <a class="nav-item nav-link " id="nav-home-tab" data-toggle="tab"
                                                        href="#recent_activity" role="tab"
                                                        aria-selected="true">Actualizar dados</a>
                                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab"
                                                        href="#project_worked" role="tab"
                                                        aria-selected="false">Alterar Senha</a>

                                                </div>
                                            </nav>
                                            <div class="tab-content" id="nav-tabContent">
                                                <div class="tab-pane fade show active" id="profile_section"
                                                    role="tabpanel" aria-labelledby="nav-contact-tab">
                                                    <h3 class="mb-2">{{ ucwords(auth()->user()->first_name) }}
                                                        {{ ucwords(auth()->user()->last_name) }}</h3>

                                                    <ul class="list-unstyled" style="font-size: 15px">
                                                        <li class="my-3"><i class="fa fa-tag"></i> Gênero:
                                                            {{ ucwords(auth()->user()->gender) }}</li>
                                                        <li class="my-3"><i class="fa fa-calendar"></i> Data de nascimento:
                                                            {{ auth()->user()->birth_date }}</li>
                                                        <li class="my-3"><i class="fa fa-ticket"></i> Portador BI/NIF:
                                                            {{ auth()->user()->nif ?? "n/d" }}</li>
                                                        <li class="my-3"><i class="fa fa-envelope-o"></i> Email:
                                                            {{ ucwords(auth()->user()->email) }}</li>
                                                        <li class="my-3"><i class="fa fa-phone"></i> Telefone:
                                                            {{ ucwords(auth()->user()->phone) }}</li>
                                                        <li class="my-3"><i class="fa fa-map"></i> Morada:
                                                            {{ auth()->user()->address_id ?? 'n/d' }}</li>
                                                    </ul>
                                                </div>
                                                <div class="tab-pane fade " id="recent_activity" role="tabpanel"
                                                    aria-labelledby="nav-home-tab">
                                                    <div class="msg_list_main">
                                                        <ul class="msg_list">
                                                            <li>
                                                                <span><img src="images/layout_img/msg2.png"
                                                                        class="img-responsive" alt="#"></span>
                                                                <span>
                                                                    <span class="name_user">Taison Jack</span>
                                                                    <span class="msg_user">Sed ut perspiciatis unde
                                                                        omnis.</span>
                                                                    <span class="time_ago">12 min ago</span>
                                                                </span>
                                                            </li>
                                                            <li>
                                                                <span><img src="images/layout_img/msg3.png"
                                                                        class="img-responsive" alt="#"></span>
                                                                <span>
                                                                    <span class="name_user">Mike John</span>
                                                                    <span class="msg_user">On the other hand, we
                                                                        denounce.</span>
                                                                    <span class="time_ago">12 min ago</span>
                                                                </span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="project_worked" role="tabpanel"
                                                    aria-labelledby="nav-profile-tab">
                                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                                                        accusantium doloremque laudantium, totam rem aperiam, eaque ipsa
                                                        quae ab illo inventore veritatis et
                                                        quasi architecto beatae vitae dicta sunt explicabo. Nemo enim
                                                        ipsam voluptatem quia voluptas sit aspernatur aut odit aut
                                                        fugit, sed quia consequuntur magni dolores eos
                                                        qui ratione voluptatem sequi nesciunt.
                                                    </p>
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
                <div class="col-md-2"></div>
            </div>
            <!-- end row -->
        </div>
    </div>
    @include('inc.footer')
</div>
