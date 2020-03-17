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

	$('.modal-body  .detail-nama').attr('value', $(this).data('nama'));
	$('.modal-body .detail-email').attr('value', $(this).data('email'));
	$('.modal-body .detail-username').attr('value', $(this).data('username'));
	$('.modal-body .detail-akses').attr('value', $(this).data('akses'));
	$('.modal-body .detail-provinsi').attr('value', $(this).data('provinsi'));
	$('.modal-body .detail-kabupaten').attr('value', $(this).data('kabupaten'));
	$('.modal-body .detail-address').attr('value', $(this).data('address'));
	$('.modal-body .detail-link').attr('value', $(this).data('link'));
	$('.modal-body .detail-telphone').attr('value', $(this).data('telphone'));
	if ($(this).data('akun') == 0)
		$('.modal-body .detail-akun').attr('value', 'Not Active');
	else
		$('.modal-body .detail-akun').attr('value', 'Active');

});
