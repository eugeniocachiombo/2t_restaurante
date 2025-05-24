@section('title', 'Página de Inicial')
<div>
    <main class="main">

        <!-- Seção Hero -->
        <section id="hero" class="hero section dark-background">
            <img src="{{ asset('assets/img/rest/1(1).jpg') }}" alt="Imagem do restaurante" data-aos="fade-in">

            <div class="container text-center" data-aos="fade-up" data-aos-delay="100">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <h2>Bem-vindo ao <span class="sitename">
                             @include('inc.namewebsite')
                        </span></h2>
                        <p>Uma experiência gastronômica completa — no seu prato, na sua casa ou no nosso espaço</p>
                        <a href="#about" class="btn-get-started">Descubra mais</a>
                    </div>
                </div>
            </div>
        </section><!-- /Seção Hero -->


        <!-- Seção de Estatísticas -->
        <section id="stats" class="stats section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="{{count($dishes)}}" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Pratos Servidos</p>
                        </div>
                    </div><!-- Fim do Item de Estatística -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="{{count($drinks)}}" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Bebidas Preparadas</p>
                        </div>
                    </div><!-- Fim do Item de Estatística -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="{{count($orders)}}" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Pedidos Online</p>
                        </div>
                    </div><!-- Fim do Item de Estatística -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="{{count($cookers)}}" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Especialistas na Cozinha</p>
                        </div>
                    </div><!-- Fim do Item de Estatística -->

                </div>

            </div>

        </section><!-- /Seção de Estatísticas -->


        <!-- Seção de Pratos Mais Servidos -->
        <section id="featured-services" class="featured-services section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="200">
                        <div class="service-item position-relative">
                            <div class="img">
                                <img src="{{ asset('assets/img/rest/calulu.png') }}" class="img-fluid"
                                    alt="Funge com Calulu">
                            </div>
                            <div class="details">
                                <a href="service-details.html" class="stretched-link">
                                    <h3>Funge com Calulu</h3>
                                </a>
                                <p>Um prato tradicional e querido em toda Angola. O funge de milho ou bombó acompanha o
                                    delicioso calulu de peixe seco com quiabos e folhas.</p>
                            </div>
                        </div>
                    </div><!-- Fim do Prato -->

                    <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="300">
                        <div class="service-item position-relative">
                            <div class="img">
                                <img src="{{ asset('assets/img/rest/muamba-galinha.png') }}" class="img-fluid"
                                    alt="Muamba de Galinha">
                            </div>
                            <div class="details">
                                <a href="service-details.html" class="stretched-link">
                                    <h3>Muamba de Galinha</h3>
                                </a>
                                <p>Um clássico da culinária angolana. Frango cozido lentamente com óleo de palma,
                                    quiabos e especiarias, servido com funge ou arroz.</p>
                            </div>
                        </div>
                    </div><!-- Fim do Prato -->

                    <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="400">
                        <div class="service-item position-relative">
                            <div class="img">
                                <img src="{{ asset('assets/img/rest/caldeirada.png') }}" class="img-fluid"
                                    alt="Caldeirada de Cabrito">
                            </div>
                            <div class="details">
                                <a href="service-details.html" class="stretched-link">
                                    <h3>Caldeirada de Cabrito</h3>
                                </a>
                                <p>Carne de cabrito cozida lentamente com batatas, pimentões e ervas, formando um caldo
                                    saboroso e rico, perfeito para ocasiões especiais.</p>
                            </div>
                        </div>
                    </div><!-- Fim do Prato -->

                    <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="500">
                        <div class="service-item position-relative">
                            <div class="img">
                                <img src="{{ asset('assets/img/rest/muamba-ginguba.png') }}" class="img-fluid"
                                    alt="Moamba de Ginguba">
                            </div>
                            <div class="details">
                                <a href="service-details.html" class="stretched-link">
                                    <h3>Moamba de Ginguba</h3>
                                </a>
                                <p>Uma deliciosa variação da moamba, feita com molho de amendoim (ginguba), frango e
                                    legumes, ideal para quem aprecia sabores autênticos.</p>
                            </div>
                        </div>
                    </div><!-- Fim do Prato -->

                </div>

            </div>

        </section><!-- /Seção de Pratos Mais Servidos -->


        <!-- Seção de Serviços -->
        <section id="services" class="services section"
            style="background-image: url('{{ asset('assets/img/rest/1(2).jpg') }}'); background-size: cover; background-position: center;">

            <!-- Título da Seção -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Serviços</h2>
                <p>Sabores marcantes, atendimento acolhedor e experiências feitas sob medida para você.</p>
            </div><!-- Fim do Título da Seção -->

            <div class="container">
                <div class="row g-5">

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item item-cyan position-relative">
                            <i class="bi bi-bag-check icon"></i>
                            <div>
                                <h3>Entrega de Refeições</h3>
                                <p>Receba nossas delícias onde estiver! Um cardápio completo, preparado com carinho e
                                    entregue com agilidade, direto na sua porta.</p>
                                <a href="{{route("auth.login")}}" class="read-more stretched-link">Peça agora <i
                                        class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div><!-- Fim do Item de Serviço -->

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-item item-orange position-relative">
                            <i class="bi bi-box-seam icon"></i>
                            <div>
                                <h3>Pedidos Personalizados</h3>
                                <p>Cada pedido é único, assim como você. Seja para uma ocasião especial ou seu prato
                                    favorito com um toque extra, preparamos tudo sob medida.</p>
                                <a href="#contact" class="read-more stretched-link">Fazer pedido <i
                                        class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div><!-- Fim do Item de Serviço -->

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-item item-teal position-relative">
                            <i class="bi bi-stars icon"></i>
                            <div>
                                <h3>Eventos Gastronômicos</h3>
                                <p>Transformamos momentos em experiências inesquecíveis. Jantares temáticos, degustações
                                    e muito mais para surpreender seus convidados.</p>
                                <a href="#gallery" class="read-more stretched-link">Ver eventos <i
                                        class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div><!-- Fim do Item de Serviço -->

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="service-item item-red position-relative">
                            <i class="bi bi-person-lines-fill icon"></i>
                            <div>
                                <h3>Atendimento Personalizado</h3>
                                <p>Seu conforto é nossa prioridade. Atendimento cordial, ágil e atento aos detalhes,
                                    para que cada interação seja memorável.</p>
                                <a href="#contact" class="read-more stretched-link">Fale conosco <i
                                        class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div><!-- Fim do Item de Serviço -->

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="500">
                        <div class="service-item item-indigo position-relative">
                            <i class="bi bi-calendar-check icon"></i>
                            <div>
                                <h3>Reserva de Mesas</h3>
                                <p>Garanta seu lugar especial no nosso espaço! Perfeito para encontros, comemorações ou
                                    um almoço tranquilo no seu dia.</p>
                                <a href="#reservation" class="read-more stretched-link">Reservar agora <i
                                        class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div><!-- Fim do Item de Serviço -->

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="600">
                        <div class="service-item item-pink position-relative">
                            <i class="bi bi-lightbulb icon"></i>
                            <div>
                                <h3>Consultoria Gastronômica</h3>
                                <p>Tem um evento e não sabe o que servir? Nós ajudamos com sugestões criativas e
                                    combinações perfeitas para impressionar.</p>
                                <a href="#contact" class="read-more stretched-link">Saiba como <i
                                        class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div><!-- Fim do Item de Serviço -->

                </div>
            </div>

        </section><!-- /Seção de Serviços -->



        <!-- Seção de Chamada para Ação -->
        <section id="call-to-action" class="call-to-action section dark-background">

            <div class="container">
                <div class="row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
                    <div class="col-xl-10">
                        <div class="text-center">
                            <h3>Pronto para fazer seu pedido?</h3>
                            <p>Delícias autênticas, preparadas com carinho, estão à sua espera. Faça seu pedido agora e
                                experimente o melhor da nossa cozinha no conforto da sua casa ou na nossa mesa.</p>
                            <a class="cta-btn" href="#">Peça Agora</a>
                        </div>
                    </div>
                </div>
            </div>

        </section><!-- /Seção de Chamada para Ação -->



        <!-- Seção da Equipe -->
        <section id="team" class="team section light-background"
        style="background-image: url('{{ asset('assets/img/rest/1(1).jpg') }}'); background-size: cover; background-position: center;">

            <!-- Título da Seção -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Nosso Equipa de Cozinha</h2>
                <p class="text-white"><b>Conheça os talentos por trás dos sabores inesquecíveis. Nossa equipe de cozinha combina paixão,
                    criatividade e tradição em cada prato servido.</b></p>
            </div><!-- Fim do Título da Seção -->

            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up"
                        data-aos-delay="100" >
                        <div class="team-member">
                            <div class="member-img">
                                <img 
                                 src="{{asset('assets/img/team/team-1.jpeg')}}" class="img-fluid" alt="Chef Principal">
                                <div class="social">
                                    <a href="#"><i class="bi bi-instagram"></i></a>
                                    <a href="#"><i class="bi bi-facebook"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>Chef Manuel Silva</h4>
                                <span>Chef Executivo</span>
                            </div>
                        </div>
                    </div><!-- Fim do Membro -->

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up"
                        data-aos-delay="200" >
                        <div class="team-member">
                            <div class="member-img">
                                <img 
                                 src="{{asset('assets/img/team/team-2.jpeg')}}" class="img-fluid" alt="Sous Chef">
                                <div class="social">
                                    <a href="#"><i class="bi bi-instagram"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>Luciana Paixão</h4>
                                <span>Sous Chef</span>
                            </div>
                        </div>
                    </div><!-- Fim do Membro -->

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up"
                        data-aos-delay="300" >
                        <div class="team-member">
                            <div class="member-img">
                                <img src="{{asset('assets/img/team/team-3.jpeg')}}" class="img-fluid"
                                    alt="Especialista em Grelhados">
                                <div class="social">
                                    <a href="#"><i class="bi bi-instagram"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>José Mário</h4>
                                <span>Especialista em Grelhados</span>
                            </div>
                        </div>
                    </div><!-- Fim do Membro -->

                </div>

            </div>

        </section><!-- /Seção da Equipe -->



        <!-- Seção de Pratos Mais Servidos -->
        <section id="pricing" class="pricing section">

            <!-- Título da Seção -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Pratos Mais Servidos</h2>
                <p>Sabores que conquistam todos os dias. Escolha seu favorito e aproveite uma experiência gastronômica
                    inesquecível.</p>
            </div><!-- Fim do Título da Seção -->

            <div class="container">

                <div class="row gy-4">

                    <div class="col-xl-3 col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="pricing-item">
                            <h3>Muamba de Galinha</h3>
                            <h4><sup>AOA</sup>4.500<span> / prato</span></h4>
                            <ul>
                                <li>Galinha temperada e cozida com óleo de palma</li>
                                <li>Acompanhada de funge ou arroz</li>
                                <li>Sabor autêntico angolano</li>
                            </ul>
                            <div class="btn-wrap">
                                <a href="#" class="btn-buy">Pedir agora</a>
                            </div>
                        </div>
                    </div><!-- Fim do Prato -->

                    <div class="col-xl-3 col-lg-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="pricing-item featured">
                            <h3>Calulu de Peixe</h3>
                            <h4><sup>AOA</sup>5.000<span> / prato</span></h4>
                            <ul>
                                <li>Peixe seco cozido com folhas, quiabos e dendê</li>
                                <li>Servido com funge ou banana pão</li>
                                <li>Perfeito para quem ama tradição</li>
                            </ul>
                            <div class="btn-wrap">
                                <a href="#" class="btn-buy">Pedir agora</a>
                            </div>
                        </div>
                    </div><!-- Fim do Prato -->

                    <div class="col-xl-3 col-lg-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="pricing-item">
                            <h3>Funge com Carne Guisada</h3>
                            <h4><sup>AOA</sup>3.800<span> / prato</span></h4>
                            <ul>
                                <li>Carne macia e bem temperada</li>
                                <li>Funge de milho branco ou bombó</li>
                                <li>Simples, delicioso e reconfortante</li>
                            </ul>
                            <div class="btn-wrap">
                                <a href="#" class="btn-buy">Pedir agora</a>
                            </div>
                        </div>
                    </div><!-- Fim do Prato -->

                    <div class="col-xl-3 col-lg-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="pricing-item">
                            <span class="advanced">Especial</span>
                            <h3>Churrasco Angolano</h3>
                            <h4><sup>AOA</sup>6.000<span> / prato</span></h4>
                            <ul>
                                <li>Carnes grelhadas com molhos típicos</li>
                                <li>Acompanhado de batatas, farofa e salada</li>
                                <li>Sabor marcante e porção generosa</li>
                            </ul>
                            <div class="btn-wrap">
                                <a href="#" class="btn-buy">Pedir agora</a>
                            </div>
                        </div>
                    </div><!-- Fim do Prato -->

                </div>

            </div>

        </section><!-- /Seção de Pratos Mais Servidos -->



        <!-- Seção de Perguntas Frequentes -->
        <section id="faq" class="faq section light-background">

            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="content px-xl-5">
                            <h3><span>Perguntas </span><strong>Frequentes</strong></h3>
                            <p>Aqui estão as respostas para as dúvidas mais comuns sobre o nosso restaurante. Se tiver
                                alguma outra dúvida, não hesite em nos contactar!</p>
                        </div>
                    </div>

                    <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">

                        <div class="faq-container">
                            <div class="faq-item faq-active">
                                <h3><span class="num">1.</span> <span>Quais são os pratos mais populares?</span>
                                </h3>
                                <div class="faq-content">
                                    <p>Entre os nossos pratos mais servidos, destacam-se a Muamba de Galinha, Calulu de
                                        Peixe, Funge com Carne Guisada e o Churrasco à Angolana. Todos são preparados
                                        com ingredientes frescos e com muito amor.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- Fim do item de FAQ-->

                            <div class="faq-item">
                                <h3><span class="num">2.</span> <span>Posso fazer pedidos online?</span></h3>
                                <div class="faq-content">
                                    <p>Sim, você pode fazer pedidos diretamente pelo nosso site ou pelo nosso
                                        aplicativo. Basta escolher os pratos, adicionar ao carrinho e escolher a forma
                                        de pagamento.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- Fim do item de FAQ-->

                            <div class="faq-item">
                                <h3><span class="num">3.</span> <span>O restaurante oferece opções
                                        vegetarianas?</span></h3>
                                <div class="faq-content">
                                    <p>Sim, temos uma seleção de pratos vegetarianos que incluem opções saborosas, como
                                        o Calulu de Tofu e os vegetais grelhados. Fique à vontade para perguntar ao
                                        nosso garçom sobre outras alternativas sem carne!</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- Fim do item de FAQ-->

                            <div class="faq-item">
                                <h3><span class="num">4.</span> <span>O restaurante oferece delivery?</span></h3>
                                <div class="faq-content">
                                    <p>Sim, realizamos entregas em toda a área de cobertura da cidade. Você pode pedir
                                        pelo nosso site ou por plataformas de entrega como Uber Eats e Glovo.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- Fim do item de FAQ-->

                            <div class="faq-item">
                                <h3><span class="num">5.</span> <span>Posso fazer uma reserva?</span></h3>
                                <div class="faq-content">
                                    <p>Sim, recomendamos fazer uma reserva para garantir seu lugar, especialmente
                                        durante os finais de semana e feriados. Você pode fazer a reserva online ou por
                                        telefone.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- Fim do item de FAQ-->

                            <div class="faq-item">
                                <h3><span class="num">6.</span> <span>Qual a política de pagamento?</span></h3>
                                <div class="faq-content">
                                    <p>Aceitamos pagamentos em dinheiro, cartões de crédito e débito, além de opções
                                        digitais como o MB Way. Para pedidos online, oferecemos também pagamento via
                                        PayPal e transferência bancária.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- Fim do item de FAQ-->

                            <div class="faq-item">
                                <h3><span class="num">7.</span> <span>O restaurante tem opções para crianças?</span>
                                </h3>
                                <div class="faq-content">
                                    <p>Sim, temos um menu especial para crianças com pratos mais leves e porções
                                        reduzidas. Também oferecemos opções de sobremesas divertidas para os pequenos.
                                    </p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- Fim do item de FAQ-->

                            <div class="faq-item">
                                <h3><span class="num">8.</span> <span>Quais são os horários de funcionamento?</span>
                                </h3>
                                <div class="faq-content">
                                    <p>Estamos abertos todos os dias das 12:00 às 23:00. Durante os finais de semana,
                                        temos uma programação especial com música ao vivo!</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- Fim do item de FAQ-->

                        </div>

                    </div>
                </div>

            </div>

        </section><!-- /Seção de Perguntas Frequentes -->

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



        <!-- Seção de Contato -->
        <section id="contact" class="contact section" style="background-image: url('{{ asset('assets/img/rest/1(1).jpg') }}'); background-size: cover; background-position: center;">

            <!-- Título da Seção -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Contacto</h2>
                <p class="text-white">Entre em contato conosco e tire suas dúvidas. Estamos prontos para ajudar!</p>
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
                                <p class="text-white">Projecto Nova Vida - Rua 50</p>
                            </div>
                        </div><!-- Fim do Item de Informações -->

                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                            <i class="bi bi-telephone flex-shrink-0"></i>
                            <div>
                                <h3>Contacte Nos</h3>
                                <p class="text-white">+244 936 743 826</p>
                            </div>
                        </div><!-- Fim do Item de Informações -->

                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
                            <i class="bi bi-envelope flex-shrink-0"></i>
                            <div>
                                <h3>Envie um E-mail</h3>
                                <p class="text-white">kblos@gmail.com</p>
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
