<div>
    <main class="main">

        <!-- Seção Hero -->
        <section id="hero" class="hero section dark-background">
            <img src="{{ asset('assets/img/rest/1(1).jpg') }}" alt="Imagem do restaurante" data-aos="fade-in">

            <div class="container text-center" data-aos="fade-up" data-aos-delay="100">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <h2>Bem-vindo ao <span class="sitename">@include('inc.namewebsite')</span></h2>
                        <p>Uma experiência gastronômica completa — no seu prato, na sua casa ou no nosso espaço</p>
                        <a href="#about" class="btn-get-started">Descubra mais</a>
                    </div>
                </div>
            </div>
        </section><!-- /Seção Hero -->


        <!-- Seção Sobre -->
        <section id="about" class="about section">
            <!-- Título da Seção -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Sobre</h2>
                <p>Sabores que conectam pessoas — do nosso espaço até a sua casa</p>
            </div><!-- Fim do Título da Seção -->

            <div class="container">
                <div class="row gy-5">
                    <div class="content col-xl-5 d-flex flex-column" data-aos="fade-up" data-aos-delay="100">
                        <h3>Um restaurante que vai além da experiência à mesa</h3>
                        <p>
                            Somos apaixonados por oferecer experiências gastronômicas únicas, seja em nosso ambiente
                            acolhedor ou através de um clique, com nosso serviço de entregas online. Com um cardápio
                            diversificado de comidas e bebidas preparado com ingredientes selecionados, nossa missão é
                            unir sabor, qualidade e praticidade para atender a todos os momentos do seu dia.
                        </p>
                        <a href="#menu" class="about-btn align-self-center align-self-xl-start"><span>Conheça nosso
                                menu</span>
                            <i class="bi bi-chevron-right"></i></a>
                    </div>

                    <div class="col-xl-7" data-aos="fade-up" data-aos-delay="200">
                        <div class="row gy-4">
                            <div class="col-md-6 icon-box position-relative">
                                <i class="bi bi-briefcase"></i>
                                <h4><a href="" class="stretched-link">Atendimento presencial e online</a></h4>
                                <p>Saboreie nossos pratos no local ou peça do conforto da sua casa</p>
                            </div>

                            <div class="col-md-6 icon-box position-relative">
                                <i class="bi bi-gem"></i>
                                <h4><a href="" class="stretched-link">Qualidade em cada detalhe</a></h4>
                                <p>Pratos elaborados com carinho, ingredientes frescos e excelência no preparo</p>
                            </div>

                            <div class="col-md-6 icon-box position-relative">
                                <i class="bi bi-broadcast"></i>
                                <h4><a href="" class="stretched-link">Entrega rápida e segura</a></h4>
                                <p>Levamos o sabor até você com agilidade e total cuidado com cada pedido</p>
                            </div>

                            <div class="col-md-6 icon-box position-relative">
                                <i class="bi bi-easel"></i>
                                <h4><a href="" class="stretched-link">Ambiente acolhedor</a></h4>
                                <p>Nosso espaço foi pensado para tornar cada refeição uma ocasião especial</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /Seção Sobre -->


        <!-- Seção de Estatísticas -->
        <section id="stats" class="stats section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Clientes</p>
                        </div>
                    </div><!-- Fim do Item de Estatística -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Projetos</p>
                        </div>
                    </div><!-- Fim do Item de Estatística -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="1453" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Horas de Suporte</p>
                        </div>
                    </div><!-- Fim do Item de Estatística -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="32" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Colaboradores</p>
                        </div>
                    </div><!-- Fim do Item de Estatística -->

                </div>

            </div>

        </section><!-- /Seção de Estatísticas -->

        <!-- Seção de Serviços em Destaque -->
        <section id="featured-services" class="featured-services section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="200">
                        <div class="service-item position-relative">
                            <div class="img">
                                <img src="{{ asset('assets/img/services-1.jpg') }}" class="img-fluid" alt="">
                            </div>
                            <div class="details">
                                <a href="service-details.html" class="stretched-link">
                                    <h3>Consultoria Estratégica</h3>
                                </a>
                                <p>Oferecemos soluções eficazes para impulsionar o crescimento do seu negócio com
                                    confiança e segurança.</p>
                            </div>
                        </div>
                    </div><!-- Fim do Item de Serviço -->

                    <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="300">
                        <div class="service-item position-relative">
                            <div class="img">
                                <img src="{{ asset('assets/img/services-2.jpg') }}" class="img-fluid" alt="">
                            </div>
                            <div class="details">
                                <a href="service-details.html" class="stretched-link">
                                    <h3>Suporte Personalizado</h3>
                                </a>
                                <p>Atendimento dedicado, pensado para resolver suas necessidades com rapidez, clareza e
                                    eficiência.</p>
                            </div>
                        </div>
                    </div><!-- Fim do Item de Serviço -->

                    <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="400">
                        <div class="service-item position-relative">
                            <div class="img">
                                <img src="{{ asset('assets/img/services-3.jpg') }}" class="img-fluid" alt="">
                            </div>
                            <div class="details">
                                <a href="service-details.html" class="stretched-link">
                                    <h3>Marketing Digital</h3>
                                </a>
                                <p>Criamos estratégias de marketing sob medida para aumentar sua visibilidade e atrair
                                    mais clientes.</p>
                            </div>
                        </div>
                    </div><!-- Fim do Item de Serviço -->

                    <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="500">
                        <div class="service-item position-relative">
                            <div class="img">
                                <img src="{{ asset('assets/img/services-4.jpg') }}" class="img-fluid" alt="">
                            </div>
                            <div class="details">
                                <a href="service-details.html" class="stretched-link">
                                    <h3>Gestão de Projetos</h3>
                                </a>
                                <p>Planejamos, executamos e entregamos projetos com excelência e dentro do prazo,
                                    superando expectativas.</p>
                            </div>
                        </div>
                    </div><!-- Fim do Item de Serviço -->

                </div>

            </div>

        </section><!-- /Seção de Serviços em Destaque -->

        <!-- Seção de Serviços -->
        <section id="services" class="services section">

            <!-- Título da Seção -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Serviços</h2>
                <p>Soluções pensadas para atender suas necessidades com qualidade e eficiência.</p>
            </div><!-- Fim do Título da Seção -->

            <div class="container">

                <div class="row g-5">

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item item-cyan position-relative">
                            <i class="bi bi-activity icon"></i>
                            <div>
                                <h3>Consultoria Estratégica</h3>
                                <p>Oferecemos soluções personalizadas para garantir o crescimento sustentável do seu
                                    negócio.</p>
                                <a href="service-details.html" class="read-more stretched-link">Saiba Mais <i
                                        class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div><!-- Fim do Item de Serviço -->

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-item item-orange position-relative">
                            <i class="bi bi-broadcast icon"></i>
                            <div>
                                <h3>Marketing Digital</h3>
                                <p>Impulsione sua marca com estratégias eficazes de marketing nas principais
                                    plataformas.</p>
                                <a href="service-details.html" class="read-more stretched-link">Saiba Mais <i
                                        class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div><!-- Fim do Item de Serviço -->

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-item item-teal position-relative">
                            <i class="bi bi-easel icon"></i>
                            <div>
                                <h3>Design Criativo</h3>
                                <p>Desenvolvemos identidades visuais modernas e impactantes que representam a sua marca.
                                </p>
                                <a href="service-details.html" class="read-more stretched-link">Saiba Mais <i
                                        class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div><!-- Fim do Item de Serviço -->

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="service-item item-red position-relative">
                            <i class="bi bi-bounding-box-circles icon"></i>
                            <div>
                                <h3>Tecnologia e Inovação</h3>
                                <p>Implementamos soluções tecnológicas inovadoras para otimizar seus processos e
                                    resultados.</p>
                                <a href="service-details.html" class="read-more stretched-link">Saiba Mais <i
                                        class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div><!-- Fim do Item de Serviço -->

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="500">
                        <div class="service-item item-indigo position-relative">
                            <i class="bi bi-calendar4-week icon"></i>
                            <div>
                                <h3>Gestão de Projetos</h3>
                                <p>Gerenciamos seu projeto do início ao fim com planejamento, organização e controle.
                                </p>
                                <a href="service-details.html" class="read-more stretched-link">Saiba Mais <i
                                        class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div><!-- Fim do Item de Serviço -->

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="600">
                        <div class="service-item item-pink position-relative">
                            <i class="bi bi-chat-square-text icon"></i>
                            <div>
                                <h3>Atendimento ao Cliente</h3>
                                <p>Oferecemos suporte completo e humanizado para garantir a sua total satisfação.</p>
                                <a href="service-details.html" class="read-more stretched-link">Saiba Mais <i
                                        class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div><!-- Fim do Item de Serviço -->

                </div>

            </div>

        </section><!-- /Seção de Serviços -->



        <!-- Seção de Depoimentos -->
        <section id="testimonials" class="testimonials section">

            <!-- Título da Seção -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Depoimentos</h2>
                <p>Veja o que nossos clientes dizem sobre nossos serviços e experiências.</p>
            </div><!-- Fim do Título da Seção -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="swiper init-swiper">
                    <script type="application/json" class="swiper-config">
                {
                  "loop": true,
                  "speed": 600,
                  "autoplay": {
                    "delay": 5000
                  },
                  "slidesPerView": "auto",
                  "pagination": {
                    "el": ".swiper-pagination",
                    "type": "bullets",
                    "clickable": true
                  },
                  "breakpoints": {
                    "320": {
                      "slidesPerView": 1,
                      "spaceBetween": 40
                    },
                    "1200": {
                      "slidesPerView": 3,
                      "spaceBetween": 1
                    }
                  }
                }
            </script>

                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    A equipe foi extremamente profissional e atenciosa. Superaram todas as nossas
                                    expectativas!
                                </p>
                                <div class="profile mt-auto">
                                    <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img"
                                        alt="">
                                    <h3>Saul Goodman</h3>
                                    <h4>CEO &amp; Fundador</h4>
                                </div>
                            </div>
                        </div><!-- Fim do Depoimento -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    O serviço prestado foi impecável, com soluções criativas e eficazes para o nosso
                                    projeto.
                                </p>
                                <div class="profile mt-auto">
                                    <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img"
                                        alt="">
                                    <h3>Sara Wilsson</h3>
                                    <h4>Designer</h4>
                                </div>
                            </div>
                        </div><!-- Fim do Depoimento -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    Desde o primeiro contato, me senti segura e bem atendida. Recomendo sem dúvidas!
                                </p>
                                <div class="profile mt-auto">
                                    <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img"
                                        alt="">
                                    <h3>Jena Karlis</h3>
                                    <h4>Proprietária de Loja</h4>
                                </div>
                            </div>
                        </div><!-- Fim do Depoimento -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    Atendimento ágil, soluções modernas e uma equipe que realmente entende do assunto.
                                </p>
                                <div class="profile mt-auto">
                                    <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img"
                                        alt="">
                                    <h3>Matt Brandon</h3>
                                    <h4>Freelancer</h4>
                                </div>
                            </div>
                        </div><!-- Fim do Depoimento -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    Trabalhar com essa equipe foi uma das melhores decisões que tomei para o meu
                                    negócio.
                                </p>
                                <div class="profile mt-auto">
                                    <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img"
                                        alt="">
                                    <h3>John Larson</h3>
                                    <h4>Empreendedor</h4>
                                </div>
                            </div>
                        </div><!-- Fim do Depoimento -->

                    </div>

                    <div class="swiper-pagination"></div>
                </div>

            </div>

        </section><!-- /Seção de Depoimentos -->


        <!-- Seção de Chamada para Ação -->
        <section id="call-to-action" class="call-to-action section dark-background">

            <div class="container">
                <div class="row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
                    <div class="col-xl-10">
                        <div class="text-center">
                            <h3>Pronto para transformar sua ideia?</h3>
                            <p>Estamos aqui para ajudar você a tirar seu projeto do papel com soluções criativas e
                                eficientes. Entre em contato e descubra como podemos colaborar.</p>
                            <a class="cta-btn" href="#">Fale Conosco</a>
                        </div>
                    </div>
                </div>
            </div>

        </section><!-- /Seção de Chamada para Ação -->


        <!-- Seção de Portfólio -->
        <section id="portfolio" class="portfolio section">

            <!-- Título da Seção -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Portfólio</h2>
                <p>Confira alguns dos nossos trabalhos mais recentes, criados com dedicação e criatividade.</p>
            </div><!-- Fim do Título da Seção -->

            <div class="container">

                <div class="isotope-layout" data-default-filter="*" data-layout="masonry"
                    data-sort="original-order">

                    <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                        <li data-filter="*" class="filter-active">Todos</li>
                        <li data-filter=".filter-app">Aplicativos</li>
                        <li data-filter=".filter-product">Produtos</li>
                        <li data-filter=".filter-branding">Identidade Visual</li>
                        <li data-filter=".filter-books">Publicações</li>
                    </ul><!-- Fim dos Filtros -->

                    <!-- Aqui permanecem os itens do portfólio, você pode apenas ajustar os títulos e descrições se quiser -->

                </div>

            </div>

        </section><!-- /Seção de Portfólio -->


        <!-- Seção da Equipe -->
        <section id="team" class="team section light-background">

            <!-- Título da Seção -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Nosso Time</h2>
                <p>Conheça os profissionais que tornam tudo possível com dedicação, talento e inovação.</p>
            </div><!-- Fim do Título da Seção -->

            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up"
                        data-aos-delay="100">
                        <div class="team-member">
                            <div class="member-img">
                                <img src="assets/img/team/team-1.jpg" class="img-fluid" alt="">
                                <div class="social">
                                    <a href="#"><i class="bi bi-twitter-x"></i></a>
                                    <a href="#"><i class="bi bi-facebook"></i></a>
                                    <a href="#"><i class="bi bi-instagram"></i></a>
                                    <a href="#"><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>Walter White</h4>
                                <span>Diretor Executivo (CEO)</span>
                            </div>
                        </div>
                    </div><!-- Fim do Membro -->

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up"
                        data-aos-delay="200">
                        <div class="team-member">
                            <div class="member-img">
                                <img src="assets/img/team/team-2.jpg" class="img-fluid" alt="">
                                <div class="social">
                                    <a href="#"><i class="bi bi-twitter-x"></i></a>
                                    <a href="#"><i class="bi bi-facebook"></i></a>
                                    <a href="#"><i class="bi bi-instagram"></i></a>
                                    <a href="#"><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>Sarah Johnson</h4>
                                <span>Gerente de Produto</span>
                            </div>
                        </div>
                    </div><!-- Fim do Membro -->

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up"
                        data-aos-delay="300">
                        <div class="team-member">
                            <div class="member-img">
                                <img src="assets/img/team/team-3.jpg" class="img-fluid" alt="">
                                <div class="social">
                                    <a href="#"><i class="bi bi-twitter-x"></i></a>
                                    <a href="#"><i class="bi bi-facebook"></i></a>
                                    <a href="#"><i class="bi bi-instagram"></i></a>
                                    <a href="#"><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>William Anderson</h4>
                                <span>Diretor de Tecnologia (CTO)</span>
                            </div>
                        </div>
                    </div><!-- Fim do Membro -->

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up"
                        data-aos-delay="400">
                        <div class="team-member">
                            <div class="member-img">
                                <img src="assets/img/team/team-4.jpg" class="img-fluid" alt="">
                                <div class="social">
                                    <a href="#"><i class="bi bi-twitter-x"></i></a>
                                    <a href="#"><i class="bi bi-facebook"></i></a>
                                    <a href="#"><i class="bi bi-instagram"></i></a>
                                    <a href="#"><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>Amanda Jepson</h4>
                                <span>Contadora</span>
                            </div>
                        </div>
                    </div><!-- Fim do Membro -->

                </div>

            </div>

        </section><!-- /Seção da Equipe -->


        <!-- Seção de Preços -->
        <section id="pricing" class="pricing section">

            <!-- Título da Seção -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Planos</h2>
                <p>Escolha o plano ideal para você e aproveite todos os recursos oferecidos pela nossa plataforma.</p>
            </div><!-- Fim do Título da Seção -->

            <div class="container">

                <div class="row gy-3">

                    <div class="col-xl-3 col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="pricing-item">
                            <h3>Gratuito</h3>
                            <h4><sup>R$</sup>0<span> / mês</span></h4>
                            <ul>
                                <li>Acesso limitado</li>
                                <li>Suporte básico</li>
                                <li>Funcionalidades restritas</li>
                                <li class="na">Integrações avançadas</li>
                                <li class="na">Suporte prioritário</li>
                            </ul>
                            <div class="btn-wrap">
                                <a href="#" class="btn-buy">Assinar</a>
                            </div>
                        </div>
                    </div><!-- Fim do Plano -->

                    <div class="col-xl-3 col-lg-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="pricing-item featured">
                            <h3>Business</h3>
                            <h4><sup>R$</sup>19<span> / mês</span></h4>
                            <ul>
                                <li>Acesso completo</li>
                                <li>Integrações básicas</li>
                                <li>Dashboard personalizável</li>
                                <li>Suporte por e-mail</li>
                                <li class="na">Suporte 24/7</li>
                            </ul>
                            <div class="btn-wrap">
                                <a href="#" class="btn-buy">Assinar</a>
                            </div>
                        </div>
                    </div><!-- Fim do Plano -->

                    <div class="col-xl-3 col-lg-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="pricing-item">
                            <h3>Desenvolvedor</h3>
                            <h4><sup>R$</sup>29<span> / mês</span></h4>
                            <ul>
                                <li>Acesso completo</li>
                                <li>API para desenvolvedores</li>
                                <li>Ambiente de testes</li>
                                <li>Suporte técnico</li>
                                <li>Documentação avançada</li>
                            </ul>
                            <div class="btn-wrap">
                                <a href="#" class="btn-buy">Assinar</a>
                            </div>
                        </div>
                    </div><!-- Fim do Plano -->

                    <div class="col-xl-3 col-lg-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="pricing-item">
                            <span class="advanced">Avançado</span>
                            <h3>Ultimate</h3>
                            <h4><sup>R$</sup>49<span> / mês</span></h4>
                            <ul>
                                <li>Todos os recursos liberados</li>
                                <li>Suporte 24/7</li>
                                <li>Integrações ilimitadas</li>
                                <li>Acesso antecipado a novidades</li>
                                <li>Consultoria personalizada</li>
                            </ul>
                            <div class="btn-wrap">
                                <a href="#" class="btn-buy">Assinar</a>
                            </div>
                        </div>
                    </div><!-- Fim do Plano -->

                </div>

            </div>

        </section><!-- /Seção de Preços -->


        <!-- Seção de Perguntas Frequentes -->
        <section id="faq" class="faq section light-background">

            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="content px-xl-5">
                            <h3><span>Perguntas </span><strong>Frequentes</strong></h3>
                            <p>
                                Aqui você encontra as respostas para as dúvidas mais comuns sobre nossos serviços. Caso
                                não encontre a resposta, entre em contato conosco.
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">

                        <div class="faq-container">
                            <div class="faq-item faq-active">
                                <h3><span class="num">1.</span> <span>Como posso começar a usar os serviços?</span>
                                </h3>
                                <div class="faq-content">
                                    <p>Para começar a usar, basta se cadastrar no nosso site e escolher o plano que mais
                                        atende às suas necessidades. Após o cadastro, você terá acesso imediato às
                                        funcionalidades.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- Fim do item de FAQ-->

                            <div class="faq-item">
                                <h3><span class="num">2.</span> <span>Quais são as formas de pagamento
                                        aceitas?</span></h3>
                                <div class="faq-content">
                                    <p>Aceitamos pagamentos via cartões de crédito, débito, e transferências bancárias.
                                        Além disso, oferecemos opções de pagamento via PayPal e outros meios de
                                        pagamento online.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- Fim do item de FAQ-->

                            <div class="faq-item">
                                <h3><span class="num">3.</span> <span>Posso cancelar a assinatura a qualquer
                                        momento?</span></h3>
                                <div class="faq-content">
                                    <p>Sim, você pode cancelar sua assinatura a qualquer momento. Após o cancelamento,
                                        você continuará tendo acesso aos serviços até o final do período de pagamento
                                        atual.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- Fim do item de FAQ-->

                            <div class="faq-item">
                                <h3><span class="num">4.</span> <span>Como posso entrar em contato com o
                                        suporte?</span></h3>
                                <div class="faq-content">
                                    <p>Você pode entrar em contato conosco através do nosso chat online ou por e-mail.
                                        Nossa equipe de suporte está disponível para ajudá-lo com qualquer dúvida ou
                                        problema.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- Fim do item de FAQ-->

                            <div class="faq-item">
                                <h3><span class="num">5.</span> <span>Quais são as vantagens de assinar o plano
                                        Business?</span></h3>
                                <div class="faq-content">
                                    <p>O plano Business oferece uma série de benefícios, incluindo acesso a recursos
                                        exclusivos, suporte dedicado e integrações avançadas para ajudar a otimizar suas
                                        operações.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- Fim do item de FAQ-->

                        </div>

                    </div>
                </div>

            </div>

        </section><!-- /Seção de Perguntas Frequentes -->


        <!-- Seção de Contato -->
        <section id="contact" class="contact section">

            <!-- Título da Seção -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Contato</h2>
                <p>Entre em contato conosco e tire suas dúvidas. Estamos prontos para ajudar!</p>
            </div><!-- Fim do Título da Seção -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="mb-4" data-aos="fade-up" data-aos-delay="200">
                    <iframe style="border:0; width: 100%; height: 270px;"
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d48389.78314118045!2d-74.006138!3d40.710059!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a22a3bda30d%3A0xb89d1fe6bc499443!2sDowntown%20Conference%20Center!5e0!3m2!1sen!2sus!4v1676961268712!5m2!1sen!2sus"
                        frameborder="0" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div><!-- Fim do Google Maps -->

                <div class="row gy-4">

                    <div class="col-lg-4">
                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                            <i class="bi bi-geo-alt flex-shrink-0"></i>
                            <div>
                                <h3>Endereço</h3>
                                <p>Avenida Adam, 108, Nova York, NY 535022</p>
                            </div>
                        </div><!-- Fim do Item de Informações -->

                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                            <i class="bi bi-telephone flex-shrink-0"></i>
                            <div>
                                <h3>Nos Ligue</h3>
                                <p>+1 5589 55488 55</p>
                            </div>
                        </div><!-- Fim do Item de Informações -->

                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
                            <i class="bi bi-envelope flex-shrink-0"></i>
                            <div>
                                <h3>Envie um E-mail</h3>
                                <p>info@exemplo.com</p>
                            </div>
                        </div><!-- Fim do Item de Informações -->

                    </div>

                    <div class="col-lg-8">
                        <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up"
                            data-aos-delay="200">
                            <div class="row gy-4">

                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control" placeholder="Seu Nome"
                                        required="">
                                </div>

                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email"
                                        placeholder="Seu E-mail" required="">
                                </div>

                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="subject" placeholder="Assunto"
                                        required="">
                                </div>

                                <div class="col-md-12">
                                    <textarea class="form-control" name="message" rows="6" placeholder="Mensagem" required=""></textarea>
                                </div>

                                <div class="col-md-12 text-center">
                                    <div class="loading">Carregando</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Sua mensagem foi enviada. Obrigado!</div>

                                    <button type="submit">Enviar Mensagem</button>
                                </div>

                            </div>
                        </form>
                    </div><!-- Fim do Formulário de Contato -->

                </div>

            </div>

        </section><!-- /Seção de Contato -->


    </main>
</div>
