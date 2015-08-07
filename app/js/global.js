$(document).ready(function(){

	$('.add-task').click(function(){
		if($('#task-description').val().length > 0){
			var task = $('.task-content .text').html($('#task-description').val());
			$('.tasks-container').append($('.task-content').html());
			$.post("add-task", { pseudo: pseudo, task: $('#task-description').val()});
			$('#task-description').val('');	
		}else{
			$.snackbar({content: 'Veuillez renseigner la description de la tâche', timeout: 3000, style: 'error'});
		}
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