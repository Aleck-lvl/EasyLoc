// autocompletion
function autocompletBien() {
	var min_length = 1; // nombre de caractère avant lancement recherch 
	var keyword = $('#bien').val();  // commune fait référence au champ de recherche puis lancement de la recherche grace ajax_refresh
	if (keyword.length >= min_length) {
		$.ajax({
			url: 'fullcalendar/ajax_refreshBien.php',
			type: 'POST',
			data: {keyword:keyword},
			success:function(data){
				$('#bien_list').show();
				$('#bien_list').html(data);
			}
		});
	} else {
		$('#bien_list').hide();
	}
}

// Lors du choix dans la liste
function set_item_bien(item) {
	// change input value
	$('#bien').val(item);
	// hide proposition list
	$('#bien_list').hide();

	id = document.getElementById('idBien2').value
	document.getElementById('idBien').value = id
}

