<?php

namespace App\Services;

use App\Contracts\Repository\InvoiceRepositoryInterface;
use App\Factory\InvoiceFactory;
use Illuminate\Http\Request;

final class InvoicesService
{
    public function __construct(
        private InvoiceRepositoryInterface $invoiceRepository
    ) {

    }

    public function getInvoices()
    {
        return $this->invoiceRepository->getInvoices();
    }

    public function deleteInvoice(int $invoiceId)
    {
        $this->invoiceRepository->deleteInvoice($invoiceId);
    }

    public function updateOrCreate(Request $request): void
    {
        if (null !== $request->get('id')) {
            $invoice = $this->invoiceRepository->findById((int)$request->get('id'));
            InvoiceFactory::update($invoice, $request);
        } else {
            $invoice = InvoiceFactory::create($request);
        }

        $this->invoiceRepository->save($invoice);
    }
}
