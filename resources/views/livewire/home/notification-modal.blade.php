<div id="notification-modal"
    style="display: none; position: fixed; top: 10%; left: 50%; transform: translateX(-50%);
            background: white; padding: 20px; border: 1px solid #ccc; z-index: 999; width: 600px;">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Notificações Não Lidas</h4>
        <button id="close-modal" class="btn btn-sm btn-danger">&times;</button>
    </div>

    <div id="notificationAccordion" class="accordion">
        @forelse(auth()->user()->unreadNotifications as $notification)
            @if (auth()->user()->access_id == 1 || auth()->user()->access_id == 2)
                <div class="card">
                    <div class="card-header" id="heading-{{ $loop->index }}">
                        <h5 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse"
                                data-target="#collapse-{{ $loop->index }}" aria-expanded="false"
                                aria-controls="collapse-{{ $loop->index }}">
                                Pedido nº {{ $notification->data['order_id'] ?? 'Desconhecido' }}
                            </button>
                        </h5>
                    </div>

                    <div id="collapse-{{ $loop->index }}" class="collapse"
                        aria-labelledby="heading-{{ $loop->index }}" data-parent="#notificationAccordion">
                        <div class="card-body">
                            <p><strong>ID do Pedido:</strong> {{ $notification->data['order_id'] }}</p>
                            <p><strong>Telefone:</strong>
                                {{ $notification->data['custumer_phone'] ?? 'n/d' }}</p>
                            <p><strong>Local de Entrega:</strong>
                                {{ $notification->data['delivery_local'] ?? 'n/d' }}</p>
                            <p><strong>Total Pago:</strong>
                                {{ number_format($notification->data['total_price'] ?? 0, 2, ',', '.') }} kz</p>
                            <a href="{{ asset('storage/' . $notification->data['invoice']) }}" target="blank"
                                class="btn btn-sm btn-primary my-2">
                                <i class="fa fa-eye"></i> Visualizar o comprovativo
                            </a> <br>
                            <a href="#"
                                wire:click.prevent="confirm( {{ auth()->user()->id }}, {{ $notification }})"
                                wire:loading.attr="disabled" wire:target="confirm" class="btn btn-sm btn-primary">


                                <span wire:loading.remove wire:target="confirm">
                                    Confirmar
                                </span>
                                <span wire:loading wire:target="confirm">
                                    <i class="fa fa-spinner fa-spin"></i> A processar...
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            @else
                <div class="card">
                    <div class="card-header" id="heading-{{ $loop->index }}">
                        <h5 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse"
                                data-target="#collapse-{{ $loop->index }}" aria-expanded="false"
                                aria-controls="collapse-{{ $loop->index }}">
                                Pedido nº {{ $notification->data['order_id'] ?? 'Desconhecido' }}
                            </button>
                        </h5>
                    </div>

                    <div id="collapse-{{ $loop->index }}" class="collapse"
                        aria-labelledby="heading-{{ $loop->index }}" data-parent="#notificationAccordion">
                        <div class="card-body">
                            <p><strong>ID do Pedido:</strong> {{ $notification->data['order_id'] }}</p>
                            <p><strong>Mensagem:</strong>
                                {{ $notification->data['description'] ?? 'n/d' }}</p>
                            <a href="#"
                                wire:click.prevent="confirm( {{ auth()->user()->id }}, {{ $notification }})"
                                wire:loading.attr="disabled" wire:target="confirm" class="btn btn-sm btn-primary">
                                <span wire:loading.remove wire:target="confirm">
                                    Marcar Como Lido
                                </span>
                                <span wire:loading wire:target="confirm">
                                    <i class="fa fa-spinner fa-spin"></i> A processar...
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            @endif
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
