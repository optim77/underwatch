$(document).ready(function(){

		$(".push_button").click(function(){
			$("#category").toggle();
		});

		$("#buttonFind").click(function(){
		var val = $("#find").val();
		window.location.href = "http://underwatch.pl/page/parts/szukajFilmu.php?value="+ val;
	});



				$('*[data-animate]').addClass('hide1').each(function(){
			      $(this).viewportChecker({
			        classToAdd: 'show animated ' + $(this).data('animate'),
			        classToRemove: 'hide',
			        offset: '10%'
			      });
			    });

				/*
			 $(function () { 
				$('img').hide(); 
				}); 
				var i = 0; 
				var int=0; 
				$(window).bind("load", function() { 
				var int = setInterval("doThis(i)",500); 
				}); 
				function doThis() { 
				var images = $('img').length; 
				if (i >= images) { 
				clearInterval(int); 
				} 
				$('img:hidden').eq(0).fadeIn(500); 
				i++; 
			} 
				*/
	})
	

