<?php

namespace App\Repository;

use App\Contracts\Repository\InvoiceRepositoryInterface;
use App\Models\Invoice;
use Illuminate\Database\Eloquent\Collection;

class InvoiceRepository implements InvoiceRepositoryInterface
{

    public function getInvoices(): Collection
    {
        return Invoice::all();
    }

    public function deleteInvoice(int $invoiceId): void
    {
        Invoice::destroy($invoiceId);
    }

    public function getOffsetInvoices(int $offset, int $limit): Collection
    {
        $queryBuilder = Invoice::skip($offset)
            ->take($limit);

        return $queryBuilder->get();
    }

    public function findById(int $id): ?Invoice
    {
        return Invoice::find($id);
    }

    public function save(Invoice $invoice): void
    {
        $invoice->save();
    }
}
