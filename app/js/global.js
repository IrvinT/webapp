$(document).ready(function(){

	//Ajout d'une tâche

	$('body').on( "click", ".add-task", function() {
		if($('#task-description').val().length > 0){

			$.post("add-task", { pseudo: pseudo, task: $('#task-description').val()})
			.done(function(data) {
				$('.task-content .text').html($('#task-description').val());
				$('.task-content .sample').attr('id' , data);
				$('.tasks-container').append($('.task-content').html());
				$('.task-content .sample').attr('id', '');
				$('#task-description').val('');
			});

		}else{
			$.snackbar({content: 'Veuillez renseigner la description de la tâche', timeout: 3000, style: 'error'});
		}
	});

	$('body').on( "click", ".checkbox-input", function() {
	    var id = $(this).parent().parent().parent().attr('id');
		
		$.post("remove-task", { id: id})
		.done(function(data) {
			$('.sample').remove('#' + id)
		});
	});

});

function showError(info){
	$.snackbar({content: info, timeout: 3000, style: 'error'});
}

function showConfirmation(info){
	$.snackbar({content: info, timeout: 3000, style: 'confirmation'});
}

function showInformation(info){
	$.snackbar({content: info, timeout: 3000});
}