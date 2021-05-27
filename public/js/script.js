function datnow() {		
var now = new Date();
var day = ("0" + now.getDate()).slice(-2);
var month = ("0" + (now.getMonth() + 1)).slice(-2);

var today = now.getFullYear()+"-"+(month)+"-"+(day) ;
$("#dayNow").val(today);
// console.log(today);
}
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
  
function update(dataid,datamotifend,datamotifendid,datamotifstart,datamotifstartid,datastart,dataend) {		
	// id du post
	console.log(dataid); 
	//champs du motif de fin en string
	console.log(datamotifend); 
	//id champs du motif de fin en string
	console.log(datamotifendid); 
	//champs du motif de debut en string
	console.log(datamotifstart); 
	//id du champs du motif de debut en string
	console.log(datamotifstartid); 
	//date de début
	console.log(datastart); 
	//date de fin
	console.log(dataend);

	datestartString = datastart.toString();
	console.log(datestartString,"test");

	$(".button-absence-"+dataid).hide();	

	// let datamotifendprint = datamotifend;
	// echo (datamotifendprint);
	if (typeof dataid === "undefined") {
		console.log("id undefined"); 
	}
	if (typeof datamotifend === "undefined") {
		console.log("datamotifend undefined"); 
	}
	if (typeof datamotifstart === "undefined") {
		console.log("datamotifstart undefined"); 
	}
	if (typeof datastart === "undefined") {
		console.log("datastart undefined"); 
	}
	if (typeof dataend === "undefined") {
		console.log("dataend undefined"); 
	}
	// date_start
$(".date_start_reel_"+dataid).html(`<input  placeholder='`+datestartString+`' type="text"  onfocus="(this.type='date')"
onblur="(this.type='text')" value="`+datestartString+`" id="dayNow" class="form-control" name="date_start" 
>`);
	// date_end
$(".date_end_reel_"+dataid).html(`
	<input placeholder='`+dataend+`' type="text" value="`+dataend+`"  onfocus="(this.type='date')" 
	onblur="(this.type='text')" class="form-control" name="date_end" >
		`);
		
// *****Fonction pour choix des motifs****
$(".motif_start_reel"+dataid).html(`
<select class="form-select" id="inputGroupSelect01" name="motif_start_id" type="text"  placeholder='`+datamotifstart+`' 
onblur="(this.type='text')">		
<option value="`+datamotifstartid+`">Votre anciene valeur : `+datamotifstart+`</option>
	<option value="1">Journée</option>
                <option value="2">Matin</option>
                <option value="3">Après-midi</option>
</select>` );

// *****Fonction pour choix des motifs****
$(".motif_end_reel"+dataid).html(`
<select class="form-select" id="inputGroupSelect01" name="motif_end_id" type="text"  placeholder='`+datamotifend+`' 
onblur="(this.type='text')">		
<option value="`+datamotifendid+`">Votre anciene valeur : `+datamotifend+`</option>
                <option value="2">Matin</option>
                <option value="3">Après-midi</option>
</select>` );

$("#updateur-"+dataid).show();
$(".btn-"+dataid).hide();	
}