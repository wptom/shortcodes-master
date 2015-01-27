jQuery(document).ready(function ($) {
	$('#wpwrap').before($('.sm-vote').slideDown());
	$('.sm-vote-action').on('click', function (e) {
		var $this = $(this);
		e.preventDefault();
		$.ajax({
			type: 'get',
			url: $this.attr('href'),
			beforeSend: function () {
				$('.sm-vote').slideUp();
				if (typeof $this.data('action') !== 'undefined') window.open($this.data('action'));
			},
			success: function (data) {}
		});
	});
});