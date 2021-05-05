// autocomplet : this function will be executed every time we change the text
function autocomplet() {
	var keyword = $('#name').val();
	$.ajax({
		url: 'classes/ajax_refresh.php',
		type: 'POST',
		data: {keyword:keyword},
		success:function(data){
			$('#name_list').show();
			$('#name_list').html(data);
		}
	});
}
function autocompletfirst_name() {
	var keywordfn = $('#first_name').val();
	$.ajax({
		url: 'classes/ajax_refreshfn.php',
		type: 'POST',
		data: {keywordfn:keywordfn},
		success:function(data){
			$('#first_name_list').show();
			$('#first_name_list').html(data);
		}
	});
}


// set_item : this function will be executed when we select an item
function set_item(item) {
	// change input value
	$('#name').val(item);
	// hide proposition list
	$('#name_list').hide();
}
function set_item2(item2) {
	// change input value
	$('#first_name').val(item2);
	// hide proposition list
	$('#first_name_list').hide();
}