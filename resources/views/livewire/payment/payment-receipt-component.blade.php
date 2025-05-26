<div>
    <!DOCTYPE html>
    <html lang="pt-BR">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Fatura Proforma</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
        <style>
            body {
                background: #f1f3f5;
                padding: 40px 0;
                font-family: "Segoe UI", sans-serif;
            }

            .invoice {
                background: #ffffff;
                max-width: 750px;
                margin: auto;
                padding: 40px 50px;
                border-radius: 10px;
                box-shadow: 0 0 25px rgba(0, 0, 0, 0.08);
            }

            .invoice-header {
                border-bottom: 2px solid #dee2e6;
                padding-bottom: 20px;
                margin-bottom: 30px;
            }

            .company-info {
                font-size: 0.9rem;
                color: #6c757d;
            }

            .invoice-title {
                font-size: 1.8rem;
                font-weight: bold;
                text-align: center;
                margin-bottom: 30px;
                color: #212529;
            }

            .info-label {
                font-weight: 600;
                color: #495057;
            }

            .info-value {
                color: #212529;
                font-weight: 500;
            }

            .reference-code {
                font-family: monospace;
                background: #f8f9fa;
                padding: 10px 15px;
                border-radius: 5px;
                font-size: 0.95rem;
                margin-bottom: 10px;
            }

            .table th,
            .table td {
                vertical-align: middle;
            }

            .footer-text {
                font-size: 0.8rem;
                color: #adb5bd;
                text-align: center;
                margin-top: 40px;
                font-style: italic;
            }

            .logo img {
                max-height: 60px;
            }

            @media print {
                body {
                    background: none;
                }

                .invoice {
                    box-shadow: none;
                    border: none;
                }
            }
        </style>
    </head>

    <body>

        <div class="invoice">
            <div class="d-flex justify-content-between align-items-center invoice-header">
                <div>
                    <h5 class="mb-0">@include("inc.namewebsite")</h5>
                    <p class="company-info mb-1">Rua 50, Nova Vida - Luanda</p>
                    <p class="company-info mb-1">Email: kblos@gmail.com</p>
                    <p class="company-info">NIF: 123456789</p>
                </div>
                <div class="logo">
                    <img src="{{ asset('assets/images/logo/logo.png') }}" alt="Logo da Empresa" />
                </div>
            </div>

            <h2 class="invoice-title">Fatura Proforma</h2>

            <div class="row mb-4">
                <div class="col-md-6">
                    <p><strong>Cliente:</strong> João da Silva</p>
                    <p><strong>Endereço:</strong> Av. Principal, 456 - Luanda</p>
                    <p><strong>Email:</strong> cliente@email.com</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p><strong>Fatura Nº:</strong> PF-2025-0001</p>
                    <p><strong>Data:</strong> 25/05/2025</p>
                    <p><strong>Validade:</strong> 10 dias</p>
                </div>
            </div>

            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Produto</th>
                        <th class="text-center">Qtd</th>
                        <th class="text-end">Preço Unit.</th>
                        <th class="text-end">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Hambúrguer Artesanal</td>
                        <td class="text-center">2</td>
                        <td class="text-end">Kz 2.500,00</td>
                        <td class="text-end">Kz 5.000,00</td>
                    </tr>
                    <tr>
                        <td>Refrigerante</td>
                        <td class="text-center">2</td>
                        <td class="text-end">Kz 500,00</td>
                        <td class="text-end">Kz 1.000,00</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3" class="text-end">Total</th>
                        <th class="text-end">Kz 6.000,00</th>
                    </tr>
                </tfoot>
            </table>

            <h6 class="mt-4 mb-3 text-secondary">Dados para Pagamento</h6>
            <div class="reference-code">Banco BAI – IBAN: AO06 0000 0000 0000 0000 001</div>
            <div class="reference-code">Banco Millennium – IBAN: AO06 1111 2222 3333 4444 555</div>

            <p class="mt-3">
                <strong>Instruções:</strong><br>
                Por favor, efetuar o pagamento com a referência da fatura. A entrega será feita após confirmação.
            </p>

            <p class="footer-text">
                Este documento não é uma fatura fiscal. É apenas uma estimativa para fins de pagamento.<br />
                Obrigado pela sua preferência.
            </p>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>

</div>
