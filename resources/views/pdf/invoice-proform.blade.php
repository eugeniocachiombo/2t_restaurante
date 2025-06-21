<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <title>Factura Proforma</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fff;
            color: #333;
            font-size: 12px;
        }

        .invoice {
            max-width: 900px;
            margin: auto;
            padding: 25px;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-sizing: border-box;
            page-break-inside: avoid;
        }

        .invoice-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .logo img {
            max-width: 120px;
        }

        .invoice-title {
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            margin: 10px 0 20px;
            color: #2c3e50;
        }

        .info-section {
            display: flex;
            justify-content: space-between;

        }



        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            page-break-inside: avoid;
        }

        th,
        td {
            padding: 10px 8px;
            border: 1px solid #ccc;
            text-align: center;
            font-size: 12px;
        }

        th {
            background-color: #f5f5f5;
        }

        tfoot th {
            background-color: #f0f0f0;
            font-weight: bold;
        }

        h4 {
            margin-top: 25px;
            margin-bottom: 10px;
        }

        .reference-code {
            background: #eef6ff;
            padding: 10px;
            margin-bottom: 10px;
            border-left: 4px solid #2980b9;
            font-family: monospace;
            font-size: 12px;
        }

        p.footer-text {
            font-size: 12px;
            text-align: center;
            color: #777;
            border-top: 1px dashed #ccc;
            padding-top: 15px;
            margin-top: 20px;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        @media print {
            body {
                margin: 0;
            }

            .invoice {
                page-break-inside: avoid;
                break-inside: avoid;
            }

            .reference-code {
                page-break-inside: avoid;
            }

            table,
            tr,
            td,
            th {
                page-break-inside: avoid !important;
            }
        }
    </style>
</head>

<body>
    <div class="invoice">
        <div class="invoice-header">
            <div class="logo">
                <img src="{{ public_path('assets/images/logo/logo.png') }}" alt="Logo da Empresa" />
            </div>
            <div class="company-details">
                <h3>@include('inc.namewebsite')</h3>
                <p class="company-info">Rua 50, Nova Vida - Luanda</p>
                <p class="company-info">Email: kblos@gmail.com</p>
                <p class="company-info">NIF: n/d</p>
            </div>
        </div>


        <div class="invoice-title">Factura Proforma</div>

        <div class="info-section" style="display: flex; justify-content-center">
            <div >
                <span><strong>Cliente:</strong>
                     {{ $order->customer->first_name }} {{ $order->customer->last_name }}
                </span> <br>
                <span><strong>Endereço:</strong>
                    @if ($order->customer->address_id)
                        {{ $order->customer->getAddress->description }},
                        {{ $order->customer->getAddress->getMunicipality->description }},
                        {{ $order->customer->getAddress->getProvince->description }}
                    @else
                        n/d
                    @endif
                </span> <br>
                <span><strong>Email:</strong> {{ $order->customer->email }}  <br>
                    <strong>Tel:</strong> {{ $order->customer->phone }} </span> 
            </div>

            <div style="margin-top: 20px; margin-bottom: 20px">
                <span>
                    <span><strong>Factura Nº:</strong> {{ $order->number }}</span> <br> 
                    <span><strong>Data:</strong> {{ \Carbon\Carbon::parse($order->created_at)->format('d-m-Y') }}</span> <br>
                    <span><strong>Validade:</strong> 2 dias</span> <br>
                    <span><strong>Modo de Recebimento:</strong> <span>{{ ucwords($order->type == 'ONLINE' ? "Entrega" : "Presencial") }}</span></span> <br>
                    <span><strong>Taxa/Entrega:</strong> {{ number_format($order->delivery_tax, 2, ",", ".") }} Kz</span> <br>
                    <span><strong>Local/Entrega:</strong> {{ $order->delivery_local ?? 'n/d' }}</span> <br>
                    <span><strong>Telefone/Entrega:</strong> {{ $order->custumer_phone ?? 'n/d' }}</span>
                </span>
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Tipo</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->items as $item)
                    @php
                        $description = "";

                        if ($item->dish_id) {
                            $query = \App\Models\Dish::find($item->dish_id);
                            $description = $query->description;
                        } else {
                           $query = \App\Models\Drink::find($item->drink_id);
                            $description = $query->description;
                        }
                        
                    @endphp
                    <tr>
                        <td>{{ $item->dish_id ? 'Prato' : 'Bebida' }}</td>
                        <td>{{ $description ?? '-' }}</td>
                        <td>{{ number_format($item->price, 2, ',', '.') }} kz</td>
                        <td>{{ $item->quantity }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3" style="text-align: right;">Total</th>
                    <th colspan="2">Kz {{ number_format($order->total_price, 2, ',', '.') }}</th>
                </tr>
            </tfoot>
        </table>

        {{-- 
        <h4>Referência para Pagamento</h4>
        @foreach ($accounts as $item)
        <div class="reference-code">{{ $item->description ?? 'n/d' }} – IBAN: AO06 {{ $item->iban }}</div>
        @endforeach
        

        <p><strong>Instruções:</strong><br>
            Por favor, efetuar o pagamento com a referência da factura. A entrega será feita após confirmação.
        </p>
        --}}

        <p class="footer-text">
            Este documento não é uma factura fiscal. É apenas uma estimativa para fins de pagamento.<br />
            Obrigado pela sua preferência.
        </p>
    </div>
</body>

</html>
