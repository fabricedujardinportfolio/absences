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
	var keywordfn = $('.first_name').val();
	$.ajax({
		url: 'classes/ajax_refreshfn.php',
		type: 'POST',
		data: {keywordfn:keywordfn},
		success:function(data){
			$('.first_name_list').show();
			$('.first_name_list').html(data);
		}
	});
}
$("#btn1").click(function(){
  });

// set_item : this function will be executed when we select an item
function set_item(item) {
	// change input value
	$('#name').val(item);
	// hide proposition list
	$('#name_list').hide();
	// change input value
	$('#first_name').val(item);
	// hide proposition list
	$('#first_name_list').hide();	
}
function set_name(item) {	
	// change input value
	$('#nameUser').val(item);
	// hide proposition list
	$('#nameUserListe').hide();	
}
  
function update(data) {		
	console.log(data); 
	let fullDate = new Date();console.log(fullDate);
$(".date_start_reel_"+data).html(`<input type="date" id="dayNow" class="form-control" name="fullDate" 
>`);
$(".date_end_reel_"+data).html(`
	<input type="date" class="form-control" name="date_end">
		`);
$(".motif_reel_"+data).html(`
	<select class="form-select" id="inputGroupSelect01" name="motifs_id">
		<option selected value="1">Motif...</option>
		<option value="2">AM</option>
		<option value="3">AT</option>
		<option value="4">CP</option>
	</select>` );
$(".button-absence-"+data).hide();	
$("#updateur-"+data).show();	
// $(".button-absence-"+data).html(`
// 	<button type='button' id="button-absence-" class='btn btn-sm btn-outline-secondary ' onclick="update(`+data[]`)">Modifier</button>`);	 
}