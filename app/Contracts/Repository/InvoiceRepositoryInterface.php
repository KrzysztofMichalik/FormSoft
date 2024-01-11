<?php
namespace App\Contracts\Repository;

use App\Models\Invoice;
use Illuminate\Database\Eloquent\Collection;

interface InvoiceRepositoryInterface
{
    public function getInvoices(): Collection;

    public function deleteInvoice(int $invoiceId): void;

    public function getOffsetInvoices(int $offset, int $limit): Collection;

    public function findById(int $id): ?Invoice;

    public function save(Invoice $invoice): void;
}
