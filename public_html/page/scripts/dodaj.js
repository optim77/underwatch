	
	function Fselect(val){
			
		document.getElementById('sezon').innerHTML = '';


		var string = "id=" + val;
		var request = $.ajax({
			url:"parts/sezony.php",
			type: "POST",
			datatype: "json",
			data: string
		});

		request.done(function(html){
			var array = $.parseJSON(html);

			$("#select").after(function(){
				$("#sezon").append("<label for='nrsezon'>Sezon:</label>")
				$("#sezon").append("<select class='form-control' style='margin-bottom: 30px;' name='nrsezon' id='nrsezon'>");
				while(array >= 1){
					$("#nrsezon").append("<option>" + array + "</option>");
					array--;
				}
				$("#sezon").append("</select>");
				$("#sezon").append("<a href='kontakt.php' target='_blank' id='addSezo' >Nie ma sezonu do którego chcesz dodać odcinek ? Napisz do nas</a>");




			});

		})


	}


	$("#formFilm").hide();
	$("#formSerial").hide();
	$("#formOdcinek").hide();
	$(document).ready(function(){

		$("#filmButton").click(function(){
			$("#formFilm").toggle();
			$("#formSerial").hide();
			$("#formOdcinek").hide();
		});

		$("#serialButton").click(function(){

			$("#formSerial").toggle();
			$("#formFilm").hide();
			$("#formOdcinek").hide();

		});



		$("#odcinekButton").click(function(){
			$("#formOdcinek").toggle();
			$("#formSerial").hide();
			$("#formFilm").hide();
		})

		

	})
