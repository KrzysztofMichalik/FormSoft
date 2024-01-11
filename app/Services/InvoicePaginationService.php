<?php

namespace App\Services;

use App\Contracts\Repository\InvoiceRepositoryInterface;
use App\Models\Invoice;
use App\VO\DataTableSource;
use App\VO\InvoiceViewData;
use App\VO\InvoiceViewDataCollection;
use Illuminate\Database\Eloquent\Collection;

class InvoicePaginationService
{
    public function __construct(
        private InvoiceRepositoryInterface $invoiceRepository
    ) {
        //
    }

    public function getOffsetInvoices(int $offset, int $limit): Collection
    {
        return $this->invoiceRepository->getOffsetInvoices($offset, $limit);
    }

    public function getInvoicesCount()
    {
        return $this->invoiceRepository->getInvoices()->count();
    }

    public function parseInvoicesDataToDataTable(Collection $invoices, int $invoicesCount): DataTableSource
    {
        $data = [];

        /** @var Invoice $invoice */
        foreach ($invoices as $invoice) {
            $data[] = InvoiceViewData::create(
                $invoice->getId(),
                $invoice->getInvoiceNumber(),
                $invoice->getNIPBuyer(),
                $invoice->getNIPSeller(),
                $invoice->getProductName(),
                $invoice->getNetAmount(),
                $invoice->getCurrency(),
                $invoice->getDateOfIssue(),
                $invoice->getDateOfEdit()
            );
        }

        return DataTableSource::create(
            InvoiceViewDataCollection::fromArray($data),
            $invoicesCount
        );
    }
}
