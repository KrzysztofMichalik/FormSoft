function editInvoice(id) {
    const modal = $('#invoiceModal');
    modal.find('input[name="invoiceNumber"]').val($('#invoiceNumber_' + id).text());
    modal.find('input[name="nipBuyer"]').val($('#nipBuyer_' + id).text());
    modal.find('input[name="nipSeller"]').val($('#nipSeller_' + id).text());
    modal.find('input[name="productName"]').val($('#productName_' + id).text());
    modal.find('input[name="netAmount"]').val($('#netAmount_' + id).text());
    modal.find('input[name="currency"]').val($('#currency_' + id).text());
    modal.find('input[name="issueDate"]').val($('#issueDate_' + id).text());
    modal.find('input[name="id"]').val(id);

    modal.modal('show');
}

function confirmDelete() {
    return confirm("Napewno chcesz usunąć ten wpis?");
}

function deleteInvoice(id) {
    if (confirmDelete()) {
        const url = '/invoices/delete/' + id;
        const ajaxData = {};

        ajaxData['_token'] = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: url,
            type: 'DELETE',
            data: ajaxData,
            success: function(result) {
                $('#dataTables-invoices').DataTable().ajax.reload();
            },
            error: function(result) {
                alert('Wystąpił błąd podczas usuwania faktury');
            }
        });
    }
}

$(document).ready(function(){
    $('#addInvoiceButton').on('click', function() {
        $('#invoiceModal input').val('');
        $('#invoiceModal').modal('show');

        const csrfToken = $('meta[name="csrf-token"]').attr('content');
        $('#csrf_token').val(csrfToken);
    });

    if ($('#dataTables-invoices').length) {
        const sourceUrl = $('input[name=invoicesDataSourceUrl]').val();
        const ajaxData = {};

        ajaxData['_token'] = $('meta[name="csrf-token"]').attr('content');

        $('#dataTables-invoices').DataTable({
            serverSide: true,
            searching: false,
            ordering: false,
            ajax: {
                "url": sourceUrl,
                "data": ajaxData,
                "type": "POST"
            },
            columns: [
                { data: 'invoice_number' },
                { data: 'nip_buyer' },
                { data: 'nip_seller' },
                { data: 'product_name' },
                { data: 'net_amount' },
                { data: 'currency' },
                { data: 'issue_date' },
                { data: 'edit_date' },
                {
                    data: 'actions',
                    render: function (data, type, row, meta) {
                        return '<button class="btn btn-warning" onclick="editInvoice(' + row.id  + ')">Edytuj</button>' +
                            '<button class="btn btn-danger" onclick="deleteInvoice(' + row.id  + ')">Usuń</button>';
                    }
                }
            ],
            createdRow: function (row, data, dataIndex) {
                $(row).find('td:eq(0)').attr('id', 'invoiceNumber_' + data.id);
                $(row).find('td:eq(1)').attr('id', 'nipBuyer_' + data.id);
                $(row).find('td:eq(2)').attr('id', 'nipSeller_' + data.id);
                $(row).find('td:eq(3)').attr('id', 'productName_' + data.id);
                $(row).find('td:eq(4)').attr('id', 'netAmount_' + data.id);
                $(row).find('td:eq(5)').attr('id', 'currency_' + data.id);
                $(row).find('td:eq(6)').attr('id', 'issueDate_' + data.id);
            }
        });
    }
});
