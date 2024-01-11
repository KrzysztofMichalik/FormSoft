<?php

namespace App\Factory;

use App\Models\Invoice;
use Carbon\Carbon;
use Illuminate\Http\Request;

final class InvoiceFactory
{
    public static function create(
        Request $request
    ): Invoice {
        $invoice = new Invoice();

        return self::update($invoice, $request);
    }

    public static function update(
        Invoice $invoice,
        Request $request
    ): Invoice {
        $invoice->setInvoiceNumber($request->get('invoiceNumber') ?? '');
        $invoice->setNIPBuyer($request->get('nipBuyer') ?? '');
        $invoice->setNIPSeller($request->get('nipSeller') ?? '');
        $invoice->setProductName($request->get('productName') ?? '');
        $invoice->setNetAmount((float)$request->get('netAmount') ?? '');
        $invoice->setCurrency($request->get('currency') ?? '');
        $invoice->setDateOfIssue($request->get('issueDate') ?? '');
        $invoice->setDateOfEdit(Carbon::now());

        return $invoice;
    }
}
