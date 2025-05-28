<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <title>Fatura Proforma</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fff;
            color: #333;
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
            font-size: 24px;
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
            font-size: 14px;
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
            font-size: 14px;
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


        <div class="invoice-title">Fatura Proforma</div>

        <div class="info-section" style="display: flex; justify-content-center">
            <div >
                <span><strong>Cliente:</strong>
                     {{ $order->customer->first_name }} {{ $order->customer->last_name }}
                </span> <br>
                <span><strong>Endereço:</strong>
                    @if ($order->customer->address_id)
                        {{ $user->getAddress->description }},
                        {{ $user->getAddress->getMunicipality->description }},
                        {{ $user->getAddress->getProvince->description }}
                    @else
                        n/d
                    @endif
                </span> <br>
                <span><strong>Email:</strong> {{ $order->customer->email }} / <strong>Tel:</strong> {{ $order->customer->phone }} </span>
            </div>

            <div style="margin-top: 10px">
                <span>
                    <span><strong>Fatura Nº:</strong> {{ $order->number }}</span> / 
                    <span><strong>Data:</strong> {{ \Carbon\Carbon::parse($order->created_at)->format('d-m-Y') }}</span> /
                    <span><strong>Validade:</strong> 2 dias</span>
                </span>
            </div>
            <hr>
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
                    <tr>
                        <td>{{ $item->dish_id ? 'Prato' : 'Bebida' }}</td>
                        <td>{{ $data->description ?? '-' }}</td>
                        <td>{{ number_format($item->price, 2, ',', '.') }} kz</td>
                        <td>{{ $item->quantity }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3" style="text-align: right;">Total</th>
                    <th colspan="2">Kz {{ $order->total_price }}</th>
                </tr>
            </tfoot>
        </table>

        <h4>Dados para Pagamento</h4>
        <div class="reference-code">Banco BAI – IBAN: AO06 0000 0000 0000 0000 001</div>
        <div class="reference-code">Banco Millennium – IBAN: AO06 1111 2222 3333 4444 555</div>

        <p><strong>Instruções:</strong><br>
            Por favor, efetuar o pagamento com a referência da fatura. A entrega será feita após confirmação.
        </p>

        <p class="footer-text">
            Este documento não é uma fatura fiscal. É apenas uma estimativa para fins de pagamento.<br />
            Obrigado pela sua preferência.
        </p>
    </div>
</body>

</html>
