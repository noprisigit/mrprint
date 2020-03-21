$('.btn-detail-user').on('click', function () {
	$('.modal-body .detail-nama').empty();
	$('.modal-body .detail-email').empty();
	$('.modal-body .detail-username').empty();
	$('.modal-body .detail-akses').empty();
	$('.modal-body .detail-akun').empty();
	$('.modal-body .detail-provinsi').empty();
	$('.modal-body .detail-kabupaten').empty();
	$('.modal-body .detail-address').empty();
	$('.modal-body .detail-link').empty();
	$('.modal-body .detail-telphone').empty();

	$('')

	$('.modal-body .detail-nama').html(": " + $(this).data('nama'));
	$('.modal-body .detail-shop').html(': ' + $(this).data('print_shop'));
	$('.modal-body .detail-email').html(": " + $(this).data('email'));
	$('.modal-body .detail-username').html(': ' + $(this).data('username'));
	$('.modal-body .detail-akses').html(': ' + $(this).data('akses'));
	$('.modal-body .detail-provinsi').html(': ' + $(this).data('provinsi'));
	$('.modal-body .detail-kabupaten').html(': ' + $(this).data('kabupaten'));
	$('.modal-body .detail-address').html(': ' + $(this).data('address'));
	$('.modal-body .detail-link').html(': ' + $(this).data('link'));
	$('.modal-body .detail-telphone').html(': ' + $(this).data('telphone'));
	if ($(this).data('akun') == 0) {
		$('.modal-body .detail-akun').html(': Not Active');
		// $('.modal-body .detail-akun').addClass('text-danger');
	} else {
		$('.modal-body .detail-akun').html(': Active');
		// $('.modal-body .detail-akun').addClass('text-success');
	}
});

$('.custom-file-input').on('change', function () {
	let filename = $(this).val().split('\\').pop();
	$(this).next('.custom-file-label').addClass('selected').html(filename);
});

$('form[name="transaction_printing"]').validate({
	rules: {
		file: 'required',
		tgl_pengambilan: 'required',
		jmlh_halaman: 'required',
		jam_pengambilan: 'required'
	},
	messages: {
		file: 'Pilih file yang akan diprint',
		tgl_pengambilan: 'Tanggal pengambilan harus diisi',
		jmlh_halaman: 'Jumlah halaman harus diisi',
		jam_pengambilan: 'Jam pengambilan harus diisi'
	},
	submitHandler: function (form) {
		form.submit();
	}
});

$('.btn-detail-transaction').on('click', function () {
	$('.modal-body input[name="id_transaction"]').empty();
	$('.modal-body input[name="invoice_number"]').empty();
	$('.modal-body input[name="id_transaction"]').attr('value', $(this).data('id_transaction'));
	$('.modal-body input[name="invoice_number"]').attr('value', $(this).data('invoice'));
});

$('#wallet').keyup(function () {
	if ($(this).val().length != 0)
		$('#btn-isi-dompet').attr('disabled', false);
	else
		$('#btn-isi-dompet').attr('disabled', true);
});
