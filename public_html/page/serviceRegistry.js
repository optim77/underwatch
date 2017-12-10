
		
		$(document).ready(function(){

			$("#name1").on('blur',function(){
				var input = $(this);
				var nameLenght = input.val().length;
				if(nameLenght >= 5 && nameLenght <= 20){
						$("#form").remove("#alert");
						$("#alert").addClass("alert alert-success").text("Wprowadzono poprawną nazwę");

						var string = 'tocheck=' + input; 

						 $.ajax({
							url: "parts/check.php",
							type: "POST",
							dataType: "json",
							data: string,
							success: function(html){
								var array = $.parseJSON(html);
								if(array == false){
									$("#alert").addClass("alert alert-warning").text("Podana nazwa już istnieje");
								}else{
									
								}

							}
						});

				}else{
					$("#alert").addClass("alert alert-warning").text("Nazwa powinna zawierać od 5 do 20 znaków");
				}
			});


			$("#email").on('blur', function(){
				var input1 = $(this);
				var pattern = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
				var isEmail = pattern.test(input1.val());
				if(isEmail){
						$("#form").remove("#alert2");
						$("#alert2").addClass("alert alert-success").text("Wprowadzono prawidłowy emaiil");

						var string = 'email=' + isEmail;
						$.ajax({
							url: "parts/checkEmail.php",
							type: "POST",
							dataType: "json",
							data: string,
							success: function(html){
								var array = $.parseJSON(html);
								if(array == true){

								}else{
									$("#alert2").addClass("alert alert-warning").text("Podana e-mail już istnieje");
								}

							}
						});



				}else{
					$("#alert2").addClass("alert alert-warning").text("Wprowadzono nie prawidłowy email");
				}
			});

			$("#password").on('blur',function(){
				var input2 = $(this);
				var passLenght = input2.val().length;
				var haslo = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%\^&*_])(?:[a-zA-Z0-9!@#$%\^&*_]{8,12})$/;
				var  isPass = haslo.test(input2.val());
				if(passLenght >= 5 && passLenght <= 20 && isPass == true){
					
						$("#form").remove("#alert1");
						$("#alert1").addClass("alert alert-success").text("Wprowadzono poprawne hasło");
					
				}else{
					$("#alert1").addClass("alert alert-warning").text("Hasło powinno zawierać od 5 do 20 znaków i posiadać małe litery jedną dużą litere jedną cyfre i jeden znak specjalny");
				}
			});


		});

