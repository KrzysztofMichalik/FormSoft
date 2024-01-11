<?php

namespace App\Http\Controllers;

use App\Services\InvoicePaginationService;
use App\VO\DataTableSource;
use Illuminate\Http\Request;

class InvoicePaginationController extends Controller
{
    public function __construct(
      private InvoicePaginationService $invoicePaginationService
    ) {
        //
    }

    public function invoicesData(Request $request)
    {
        $invoices = $this->invoicePaginationService->getOffsetInvoices(
            (int) $request->get('start', 0),
            (int) $request->get('length', 25)
        );

        $invoicesCount = $this->invoicePaginationService->getInvoicesCount();

        $dataTableSource = $this->invoicePaginationService->parseInvoicesDataToDataTable(
            $invoices,
            $invoicesCount
        );

        return response()->json([
            'data' => $dataTableSource->getData()->getDataArrays(),
            'recordsTotal' => $dataTableSource->getRecordsTotal(),
            'recordsFiltered' => $dataTableSource->getRecordsTotal(),
        ]);
    }
}
