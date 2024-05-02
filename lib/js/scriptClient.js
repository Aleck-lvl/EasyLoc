// autocompletion
function autocompletClient() {
	var min_length = 1; // nombre de caractère avant lancement recherch 
	var keyword = $('#client').val();  // commune fait référence au champ de recherche puis lancement de la recherche grace ajax_refresh
	if (keyword.length >= min_length) {
        $.ajax({
            url: 'fullcalendar/ajax_refreshClient.php',
			type: 'POST',
			data: {keyword:keyword},
			success:function(data){
                $('#client_list').show();
				$('#client_list').html(data);
			}
		});
	} else {
		$('#client_list').hide();
	}
}

// Lors du choix dans la liste
function set_item_client(item) {

    
	// change input value
	$('#client').val(item);
	// hide proposition list
	$('#client_list').hide();

	id = document.getElementById('id').value
	document.getElementById('idClient').value = id
}
