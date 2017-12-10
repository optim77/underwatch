$(document).ready(function(){

		$(".push_button").click(function(){
			$("#category").toggle();
		});

		$("#buttonFind").click(function(){
		var val = $("#find").val();
		window.location.href = "http://underwatch.pl/page/parts/szukajSerialu.php?value="+ val;
	});


						$('*[data-animate]').addClass('hide1').each(function(){
			      $(this).viewportChecker({
			        classToAdd: 'show animated ' + $(this).data('animate'),
			        classToRemove: 'hide',
			        offset: '10%'
			      });
			    });
		
		
	})