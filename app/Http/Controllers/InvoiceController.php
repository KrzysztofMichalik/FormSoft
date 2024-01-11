<?php
namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Services\InvoicesService;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Validator;

class InvoiceController extends Controller
{
    public function __construct(
        private InvoicesService $invoiceService
    ) {
        //
    }

    public function index()
    {
        $invoices = $this->invoiceService->getInvoices();

        return view('invoicesList', ['invoices' => $invoices]);
    }

    public function updateOrCreate(Request $request): RedirectResponse
    {
        $request->validate([
            'invoiceNumber' => 'required|max:6',
            'nipBuyer' => 'required|max:14',
            'nipSeller' => 'required|max:14',
            'productName' => 'required|max:3',
            'netAmount' => 'required|numeric',
            'currency' => 'required|max:3',
            'issueDate' => 'required|date',
        ]);

        $this->invoiceService->updateOrCreate($request);

        Session::flash('success', 'Faktura została pomyślnie dodana i znajdziesz ją na końcu listy.');

        return redirect()->route('invoice.index');
    }

    public function delete(int $id): void
    {
        $this->invoiceService->deleteInvoice($id);
    }
}
