@section('title', 'Ajuda e Suporte')
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
           <div class="container">
             <!-- Seção de Perguntas Frequentes -->
             <section id="faq" class="faq section light-background">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                            <div class="content px-xl-5">
                                <h3><span>Perguntas </span><strong>Frequentes</strong></h3>
                                <p>Aqui estão as respostas para as dúvidas mais comuns sobre o nosso restaurante. Se
                                    tiver
                                    alguma outra dúvida, não hesite em nos contactar!</p>
                            </div>
                        </div>

                        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">

                            <div class="faq-container">
                                <div class="faq-item faq-active">
                                    <h3><span class="num">1.</span> <span>Quais são os pratos mais populares?</span>
                                    </h3>
                                    <div class="faq-content">
                                        <p>Entre os nossos pratos mais servidos, destacam-se a Muamba de Galinha, Calulu
                                            de
                                            Peixe, Funge com Carne Guisada e o Churrasco à Angolana. Todos são
                                            preparados
                                            com ingredientes frescos e com muito amor.</p>
                                    </div>
                                    <i class="faq-toggle bi bi-chevron-right"></i>
                                </div><!-- Fim do item de FAQ-->

                                <div class="faq-item">
                                    <h3><span class="num">2.</span> <span>Posso fazer pedidos online?</span></h3>
                                    <div class="faq-content">
                                        <p>Sim, você pode fazer pedidos diretamente pelo nosso site ou pelo nosso
                                            aplicativo. Basta escolher os pratos, adicionar ao carrinho e escolher a
                                            forma
                                            de pagamento.</p>
                                    </div>
                                    <i class="faq-toggle bi bi-chevron-right"></i>
                                </div><!-- Fim do item de FAQ-->

                                <div class="faq-item">
                                    <h3><span class="num">3.</span> <span>O restaurante oferece opções
                                            vegetarianas?</span></h3>
                                    <div class="faq-content">
                                        <p>Sim, temos uma seleção de pratos vegetarianos que incluem opções saborosas,
                                            como
                                            o Calulu de Tofu e os vegetais grelhados. Fique à vontade para perguntar ao
                                            nosso garçom sobre outras alternativas sem carne!</p>
                                    </div>
                                    <i class="faq-toggle bi bi-chevron-right"></i>
                                </div><!-- Fim do item de FAQ-->

                                <div class="faq-item">
                                    <h3><span class="num">4.</span> <span>O restaurante oferece delivery?</span></h3>
                                    <div class="faq-content">
                                        <p>Sim, realizamos entregas em toda a área de cobertura da cidade. Você pode
                                            pedir
                                            pelo nosso site ou por plataformas de entrega como Uber Eats e Glovo.</p>
                                    </div>
                                    <i class="faq-toggle bi bi-chevron-right"></i>
                                </div><!-- Fim do item de FAQ-->

                                <div class="faq-item">
                                    <h3><span class="num">5.</span> <span>Posso fazer uma reserva?</span></h3>
                                    <div class="faq-content">
                                        <p>Sim, recomendamos fazer uma reserva para garantir seu lugar, especialmente
                                            durante os finais de semana e feriados. Você pode fazer a reserva online ou
                                            por
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
                                    <h3><span class="num">7.</span> <span>O restaurante tem opções para
                                            crianças?</span>
                                    </h3>
                                    <div class="faq-content">
                                        <p>Sim, temos um menu especial para crianças com pratos mais leves e porções
                                            reduzidas. Também oferecemos opções de sobremesas divertidas para os
                                            pequenos.
                                        </p>
                                    </div>
                                    <i class="faq-toggle bi bi-chevron-right"></i>
                                </div><!-- Fim do item de FAQ-->

                                <div class="faq-item">
                                    <h3><span class="num">8.</span> <span>Quais são os horários de
                                            funcionamento?</span>
                                    </h3>
                                    <div class="faq-content">
                                        <p>Estamos abertos todos os dias das 12:00 às 23:00. Durante os finais de
                                            semana,
                                            temos uma programação especial com música ao vivo!</p>
                                    </div>
                                    <i class="faq-toggle bi bi-chevron-right"></i>
                                </div><!-- Fim do item de FAQ-->
                            </div>
                        </div>
                    </div>
                </div>
            </section><!-- /Seção de Perguntas Frequentes -->
           </div>
        </div>
    </div>
    @include('inc.footer')
</div>
