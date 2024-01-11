<div class="modal fade" id="invoiceModal" tabindex="-1" role="dialog" aria-labelledby="invoiceModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Dodaj lub edytuj fakturę</h5>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="invoiceModal" method="POST" role="form" action="{{route('invoice.edit')}}">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="Priority">Nr. faktury</label>
                        <input type="text" name="invoiceNumber" required>
                    </div>
                    <div class="form-group">
                        <label for="nipBuyer">Nip Kupującego</label>
                        <input type="text" name="nipBuyer" required>
                    </div>
                    <div class="form-group">
                        <label for="nipSeller">Nip sprzedającego</label>
                        <input type="text" name="nipSeller" required>
                    </div>
                    <div class="form-group">
                        <label for="productName">Nazwa produktu</label>
                        <input type="text" name="productName" required>
                    </div>
                    <div class="form-group">
                        <label for="netAmount">Kwota netto</label>
                        <input type="number" name="netAmount" required>
                    </div>
                    <div class="form-group">
                        <label for="currency">Waluta</label>
                        <input type="text" name="currency" required value="PLN" maxlength="3">
                    </div>
                    <div class="form-group">
                        <label for="issueDate">Data wystawienia</label>
                        <input type="date" name="issueDate" required>
                    </div>
                    <input type="hidden" name="id">
                    <input type="hidden" name="_token" id="csrf_token" value="{{ csrf_token() }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="savePriceParameters">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
