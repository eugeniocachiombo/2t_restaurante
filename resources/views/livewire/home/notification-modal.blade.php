<div id="notification-modal"
    style="display: none; position: fixed; top: 10%; left: 50%; transform: translateX(-50%);
            background: #fff; padding: 25px 20px; border-radius: 8px; box-shadow: 0 8px 24px rgba(0,0,0,0.2);
            border: 1px solid #ddd; z-index: 9999; width: 600px; max-height: 85vh; overflow-y: auto; transition: all 0.3s ease;">

    <!-- Cabeçalho -->
    <div class="d-flex justify-content-between align-items-center mb-3 border-bottom pb-2">
        <h4 class="mb-0 text-primary"><i class="fa fa-bell mr-2"></i>Notificações Não Lidas</h4>
        <button id="close-modal" class="btn btn-sm btn-light border" title="Fechar" aria-label="Fechar modal">
            <i class="fa fa-times text-danger"></i>
        </button>
    </div>



    <!-- Lista de notificações -->
    <div id="notificationAccordion" class="accordion">
        <button type="button" wire:click.prevent='updateMessage' class="btn btn-sm btn-light border mb-4"
            title="Actualizar" aria-label="Actualizar dados modal" wire:loading.attr="updateMessage"
            wire:target="updateMessage">
            <span wire:loading.remove wire:target="updateMessage"><i class="fa fa-repeat text-primary"></i>
                Actualizar</span>
            <span wire:loading wire:target="updateMessage">
                <i class="fa fa-spinner fa-spin text-primary"></i> A processar...
            </span>
        </button> <br>

        @forelse($user->unreadNotifications as $notification)
            @php $index = $loop->index; @endphp

            <div class="card mb-2 border rounded shadow-sm">
                <div class="card-header p-2" id="heading-{{ $index }}">
                    <button
                        class="btn btn-link w-100 text-left d-flex justify-content-between align-items-center toggle-collapse"
                        type="button" data-toggle="collapse" data-target="#collapse-{{ $index }}"
                        aria-expanded="false" aria-controls="collapse-{{ $index }}"
                        style="text-decoration: none; font-weight: 600; color: #333;">
                        <span>Pedido nº {{ $notification->data['order_id'] ?? 'Desconhecido' }}</span>
                        <i class="fa fa-chevron-down ml-2 text-dark" id="icon-{{ $index }}"></i>
                    </button>
                </div>

                <div id="collapse-{{ $index }}" class="collapse" aria-labelledby="heading-{{ $index }}"
                    data-parent="#notificationAccordion">
                    <div class="card-body">
                        <p><strong>ID do Pedido:</strong> {{ $notification->data['order_id'] }}</p>

                        @if (auth()->user()->access_id == 1 || auth()->user()->access_id == 2)
                            <p><strong>Telefone:</strong> {{ $notification->data['custumer_phone'] ?? 'n/d' }}</p>
                            <p><strong>Local de Entrega:</strong> {{ $notification->data['delivery_local'] ?? 'n/d' }}
                            </p>
                            <p><strong>Total Pago:</strong>
                                {{ number_format($notification->data['total_price'] ?? 0, 2, ',', '.') }} kz</p>

                            <a href="#" class="btn btn-outline-primary btn-sm view-file-btn my-2"
                                data-src="{{ asset('storage/' . $notification->data['invoice']) }}"
                                data-index="{{ $index }}">
                                <i class="fa fa-eye"></i> Visualizar Comprovativo
                            </a> <br>

                            <a href="#"
                                wire:click.prevent="confirm({{ auth()->user()->id }}, {{ $notification }})"
                                wire:loading.attr="disabled" wire:target="confirm" class="btn btn-primary btn-sm ml-2">
                                <span wire:loading.remove wire:target="confirm">Confirmar</span>
                                <span wire:loading wire:target="confirm">
                                    <i class="fa fa-spinner fa-spin"></i> A processar...
                                </span>
                            </a>

                            <div class="file-viewer mt-3" id="file-viewer-{{ $index }}" style="display: none;">
                                <iframe class="file-frame" id="file-frame-{{ $index }}" src=""
                                    style="width: 100%; height: 400px; border: 1px solid #ccc; border-radius: 4px;"></iframe>
                            </div>
                        @elseif (auth()->user()->access_id == 6)
                            <p><strong>Mensagem:</strong> {{ $notification->data['description'] ?? 'n/d' }}</p>
                            <hr>
                            <p><strong>Cliente:</strong> {{ $notification->data['custumer_name'] ?? 'n/d' }}</p>

                            <p><strong>Telefone:</strong> {{ $notification->data['custumer_phone'] ?? 'n/d' }}</p>
                            <p><strong>Local de Entrega:</strong> {{ $notification->data['delivery_local'] ?? 'n/d' }}
                            </p>
                            <p><strong>Total Pago:</strong>
                                {{ number_format($notification->data['total_price'] ?? 0, 2, ',', '.') }} kz</p>

                            <a href="#"
                                wire:click.prevent="markAsRead({{ auth()->user()->id }}, {{ $notification }})"
                                wire:loading.attr="disabled" wire:target="confirm" class="btn btn-primary btn-sm">
                                <span wire:loading.remove wire:target="confirm">Marcar Como Lido</span>
                                <span wire:loading wire:target="confirm">
                                    <i class="fa fa-spinner fa-spin"></i> A processar...
                                </span>
                            </a>
                        @else
                            <p><strong>Mensagem:</strong> {{ $notification->data['description'] ?? 'n/d' }}</p>

                            <a href="#"
                                wire:click.prevent="markAsRead({{ auth()->user()->id }}, {{ $notification }})"
                                wire:loading.attr="disabled" wire:target="confirm" class="btn btn-primary btn-sm">
                                <span wire:loading.remove wire:target="confirm">Marcar Como Lido</span>
                                <span wire:loading wire:target="confirm">
                                    <i class="fa fa-spinner fa-spin"></i> A processar...
                                </span>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="alert alert-info">Nenhuma notificação não lida.</div>
        @endforelse
    </div>
</div>

<!-- Scripts -->
<script>
    // Abrir modal ao clicar no botão (garanta que o botão existe na sua página)
    document.getElementById('notification-btn').addEventListener('click', function(event) {
        event.preventDefault();
        document.getElementById('notification-modal').style.display = 'block';
    });

    // Fechar modal
    document.getElementById('close-modal').addEventListener('click', function() {
        document.getElementById('notification-modal').style.display = 'none';
    });

    // Toggle do ícone na expansão/colapso das notificações
    document.querySelectorAll('.toggle-collapse').forEach(button => {
        button.addEventListener('click', function() {
            const targetId = this.getAttribute('data-target').replace('#collapse-', '');
            const icon = document.getElementById('icon-' + targetId);
            const target = document.getElementById('collapse-' + targetId);

            setTimeout(() => {
                if (target.classList.contains('show')) {
                    icon.classList.remove('fa-chevron-down');
                    icon.classList.add('fa-chevron-up');
                } else {
                    icon.classList.remove('fa-chevron-up');
                    icon.classList.add('fa-chevron-down');
                }
            }, 350); // Espera a animação do Bootstrap terminar
        });
    });

    // Visualizador de comprovativo
    document.querySelectorAll('.view-file-btn').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();

            // Oculta todos os visualizadores abertos
            document.querySelectorAll('.file-viewer').forEach(viewer => {
                viewer.style.display = 'none';
            });

            const fileUrl = this.getAttribute('data-src');
            const index = this.getAttribute('data-index');
            const viewer = document.getElementById('file-viewer-' + index);
            const iframe = document.getElementById('file-frame-' + index);

            iframe.src = fileUrl;
            viewer.style.display = 'block';
        });
    });
</script>
