     <!-- Modal para visualizar itens do pedido -->
     <div wire:ignore.self class="modal fade" id="modal-view-items" data-bs-backdrop="static" tabindex="-1" role="dialog"
         aria-labelledby="modalViewItemsLabel" aria-hidden="true">
         <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="modalViewItemsLabel">
                         <i class="fa fa-list"></i> Itens do Pedido #{{ $selectedOrderId }}
                     </h5>
                     <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>

                 <div class="modal-body">
                     @if ($orderItems && count($orderItems) > 0)
                         <table class="table table-bordered align-middle">
                             <thead>
                                 <tr>
                                     <th>Tipo</th>
                                     <th>Descrição</th>
                                     <th>Preço</th>
                                     <th>Quantidade</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 @foreach ($orderItems as $item)
                                     <tr>
                                         <td>{{ $item->dish_id ? 'Prato' : 'Bebida' }}</td>
                                         <td>{{ $item->dish->description ?? ($item->drink->description ?? '-') }}</td>
                                         <td>{{ number_format($item->price, 2, ',', '.') }} kz</td>
                                         <td>{{ $item->quantity }}</td>
                                     </tr>
                                 @endforeach
                             </tbody>
                         </table>
                     @else
                         <p class="text-center my-3">Nenhum item encontrado para este pedido.</p>
                     @endif
                 </div>
             </div>
         </div>
     </div>
