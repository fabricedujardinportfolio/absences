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
// function autocompletfirst_name() {
// 	var keywordfn = $('.first_name').val();
// 	$.ajax({
// 		url: 'classes/ajax_refreshfn.php',
// 		type: 'POST',
// 		data: {keywordfn:keywordfn},
// 		success:function(data){
// 			if (data==true) {				
// 			$('.first_name_list').show();
// 			$('.first_name_list').html(data);
// 			}else{
// 				alert ("aucun nom");
// 			}
// 		}
// 	});
// }
// $("#btn1").click(function(){
//   });

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
	$('.showSubmit').show(item);
	// hide proposition list
	console.log(item);
	if (item == "") {
		alert('Aucune valeurs');
		
	}
}
function set_name(item) {	
	// change input value
	$('#nameUser').val(item);
	// hide proposition list
	$('#nameUserListe').hide();	
}
  
function update(dataid,datamotif,datastart,dataend) {		
	console.log(dataid); 
	console.log(datamotif); 
	console.log(datastart); 
	console.log(dataend); 
	$(".button-absence-"+dataid).hide();	

	// let datamotifprint = datamotif;
	// echo (datamotifprint);
	if (typeof dataid === "undefined") {
		console.log("id undefined"); 
	}
	if (typeof datamotif === "undefined") {
		console.log("datamotif undefined"); 
	}
	if (typeof datastart === "undefined") {
		console.log("datastart undefined"); 
	}
	if (typeof dataend === "undefined") {
		console.log("dataend undefined"); 
	}
$(".date_start_reel_"+dataid).html(`<input  placeholder='`+datastart+`' type="text"  onfocus="(this.type='date')"
onblur="(this.type='text')" value="`+datastart+`" id="dayNow" class="form-control" name="date_start" 
>`);
$(".date_end_reel_"+dataid).html(`
	<input placeholder='`+dataend+`' type="text" value="`+dataend+`"  onfocus="(this.type='date')"
	onblur="(this.type='text')" class="form-control" name="date_end" >
		`);

$("#updateur-"+dataid).show();
$(".btn-"+dataid).hide();	
}
// *****Fonction pour choix des motifs****
// $(".motif_reel_"+dataid).html(`
// 	<select class="form-select" id="inputGroupSelect01" name="motif" type="text"  value="`+datamotif+`" placeholder='`+datamotif+`' 
// 	onblur="(this.type='text')">
// 		<option selected value="1">Ancien motif: `+datamotif+`</option>		
// 	</select>` );