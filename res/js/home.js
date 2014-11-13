$(function()
{

	$('.details').on("click", function()
	{
		$('#detailsModal').modal();
	});

	$('.btn-exit-detail').on("click", function()
	{
		$('#detailsModal').modal('hide');
	});

	$('.half').on("click", function()
	{
		$('.half').removeClass('active');
		$(this).addClass('active');
		if('item-description' == $(this).data("nav-info"))
		{
			$('.shipping-details').hide();
			$('.item-description').show();
		}
		else
		{
			$('.item-description').hide();
			$('.shipping-details').show();
		}
	});

});

$(document).ready(function() {
	

});