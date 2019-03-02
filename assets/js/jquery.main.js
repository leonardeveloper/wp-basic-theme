jQuery(document).ready(function($) {
	// Clear Inputs
	clearInputs();
	$(document).bind('gform_post_render', function() {
		clearInputs();
	});
});

/*---- clear inputs ---*/
function clearInputs(){
	jQuery('input:text,input:password,textarea').each(function(){
		var _el = jQuery(this);
		_el.data('val', _el.val());
		_el.bind('focus', function(){
			if(_el.val() == _el.data('val')) _el.val('');
		}).bind('blur', function(){
			if(_el.val() == '') _el.val(_el.data('val'));
		});
	});
}