$(document).ready(function(){



		$("#buttonFind").click(function(){
		var val = $("#find").val();
		window.location.href = "/page/parts/szukaj.php?value="+ val;
	});



				$('*[data-animate]').addClass('hide1').each(function(){
			      $(this).viewportChecker({
			        classToAdd: 'show animated ' + $(this).data('animate'),
			        classToRemove: 'hide',
			        offset: '10%'
			      });
			    });
	})
	

