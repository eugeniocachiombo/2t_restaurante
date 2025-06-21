<?php

namespace App\Models;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        "description",
        "number",
        "customer_user_id",
        "attendant_user_id",
        "type",
        "invoice",
        "status",
        "delivery_tax",
        "delivery_local",
        "total_price",
        "total_quantity",
        "total_discount",
        "custumer_phone",
    ];

    public function items()
    {
        return $this->hasMany(\App\Models\OrderItem::class);
    }
    
    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_user_id');
    }

    public function attendant()
    {
        return $this->belongsTo(User::class, 'attendant_user_id');
    }

    public function generatePdf($id)
    {
        $order = Order::find($id);

        if (!$order) {
            abort(404, "Pedido não encontrado.");
        }

        $pdf = Pdf::loadView('pdf.invoice-proform', [
            "order" => $order,
            "accounts" => BankAccount::all(),
        ]);

        $pdfDirectory = public_path("assets/pdfs");

        if (!file_exists($pdfDirectory)) {
            mkdir($pdfDirectory, 0755, true);
        }

        $fileName = "proforma_" . $order->id . ".pdf";
        $path = $pdfDirectory . DIRECTORY_SEPARATOR . $fileName;
        $pdf->save($path);

        return response()->download($path);
    }


    public function generatePdfReceive($id)
    {
        $order = Order::find($id);

        if (!$order) {
            abort(404, "Pedido não encontrado.");
        }

        $pdf = Pdf::loadView('pdf.invoice-receive', [
            "order" => $order,
            "accounts" => BankAccount::all(),
        ]);

        $pdfDirectory = public_path("assets/pdfs");

        if (!file_exists($pdfDirectory)) {
            mkdir($pdfDirectory, 0755, true);
        }

        $fileName = "factura_" . $order->id . ".pdf";
        $path = $pdfDirectory . DIRECTORY_SEPARATOR . $fileName;
        $pdf->save($path);

        return response()->download($path);
    }

}
