const flashData = $('.flash-data').data('flashdata');
const Toast = Swal.mixin({
	toast: true,
	position: 'top-end',
	showConfirmButton: false,
	timer: 3000
});

if (flashData) {
	Toast.fire({
		title: 'Peringatan',
		text: flashData,
		type: 'warning'
	});
}