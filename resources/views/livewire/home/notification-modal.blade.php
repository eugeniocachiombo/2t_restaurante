<div id="notification-modal"
    style="display: none; position: fixed; top: 10%; left: 50%; transform: translateX(-50%);
           background: white; padding: 20px; border: 1px solid #ccc; z-index: 999;
           width: 600px; max-height: 80vh; overflow-y: auto;">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Notificações Não Lidas</h4>
        <button id="close-modal" class="btn btn-sm btn-danger">&times;</button>
    </div>

    <div id="notificationAccordion" class="accordion">
    @forelse(auth()->user()->unreadNotifications as $notification)
        @php $index = $loop->index; @endphp

        <div class="card">
            <div class="card-header" id="heading-{{ $index }}">
                <div class="d-flex justify-content-between align-items-center">
                    <!-- Botão de colapso com área 100% clicável e ícone dinâmico -->
                    <button class="btn btn-link w-100 text-left d-flex justify-content-between align-items-center toggle-collapse"
                            type="button"
                            data-toggle="collapse"
                            data-target="#collapse-{{ $index }}"
                            aria-expanded="false"
                            aria-controls="collapse-{{ $index }}">
                        <span>Pedido nº {{ $notification->data['order_id'] ?? 'Desconhecido' }}</span>
                        <i class="fa fa-chevron-down ml-2" id="icon-{{ $index }}"></i>
                    </button>
                </div>
            </div>

            <div id="collapse-{{ $index }}" class="collapse"
                 aria-labelledby="heading-{{ $index }}" data-parent="#notificationAccordion">
                <div class="card-body">
                    <p><strong>ID do Pedido:</strong> {{ $notification->data['order_id'] }}</p>

                    @if (auth()->user()->access_id == 1 || auth()->user()->access_id == 2)
                        <p><strong>Telefone:</strong> {{ $notification->data['custumer_phone'] ?? 'n/d' }}</p>
                        <p><strong>Local de Entrega:</strong> {{ $notification->data['delivery_local'] ?? 'n/d' }}</p>
                        <p><strong>Total Pago:</strong>
                            {{ number_format($notification->data['total_price'] ?? 0, 2, ',', '.') }} kz</p>

                        <a href="#" class="btn btn-sm btn-primary my-2 view-file-btn"
                           data-src="{{ asset('storage/' . $notification->data['invoice']) }}"
                           data-index="{{ $index }}">
                            <i class="fa fa-eye"></i> Visualizar o comprovativo
                        </a>

                        <br>
                        <a href="#"
                           wire:click.prevent="confirm({{ auth()->user()->id }}, {{ $notification }})"
                           wire:loading.attr="disabled" wire:target="confirm"
                           class="btn btn-sm btn-primary">
                            <span wire:loading.remove wire:target="confirm">Confirmar</span>
                            <span wire:loading wire:target="confirm">
                                <i class="fa fa-spinner fa-spin"></i> A processar...
                            </span>
                        </a>

                        <!-- Visualizador de comprovativo -->
                        <div class="file-viewer" id="file-viewer-{{ $index }}" style="display: none; margin-top: 15px;">
                            <iframe class="file-frame" id="file-frame-{{ $index }}"
                                    src="" style="width: 100%; height: 500px; border: none;"></iframe>
                        </div>
                    @else
                        <p><strong>Mensagem:</strong> {{ $notification->data['description'] ?? 'n/d' }}</p>

                        <a href="#"
                           wire:click.prevent="confirm({{ auth()->user()->id }}, {{ $notification }})"
                           wire:loading.attr="disabled" wire:target="confirm"
                           class="btn btn-sm btn-primary">
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

<script>
    document.getElementById('notification-btn').addEventListener('click', function(event) {
        event.preventDefault();
        document.getElementById('notification-modal').style.display = 'block';
    });

    document.getElementById('close-modal').addEventListener('click', function() {
        document.getElementById('notification-modal').style.display = 'none';
    });
</script>

<script>
    document.querySelectorAll('.toggle-collapse').forEach(button => {
        button.addEventListener('click', function () {
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
            }, 350); // Espera a transição do Bootstrap
        });
    });
</script>


<script>
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
