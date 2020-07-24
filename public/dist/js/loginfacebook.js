// This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
    } 
    else 
    {
      // The person is not logged into your app or we are unable to tell.
      error2('¡Ocurrió un error al ingresar con Facebook, vuelve a intentarlo!')
    
    }
  }

$(".loginfacebook").click(function(){

	FB.login(function(response){

		checkLoginState();

	}, {scope: 'public_profile, email'})

})


function checkLoginState() {
  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });
}

 window.fbAsyncInit = function() {
    FB.init({
      appId      : '2165776403659021',
      cookie     : true,  // enable cookies to allow the server to access 
                          // the session
      xfbml      : true,  // parse social plugins on this page
      version    : 'v2.8' // use graph api version 2.8
    });

    // Now that we've initialized the JavaScript SDK, we call 
    // FB.getLoginStatus().  This function gets the state of the
    // person visiting this page and can return one of three states to
    // the callback you provide.  They can be:
    //
    // 1. Logged into your app ('connected')
    // 2. Logged into Facebook, but not your app ('not_authorized')
    // 3. Not logged into Facebook and can't tell if they are logged into
    //    your app or not.
    //
    // These three cases are handled in the callback function.

    //FB.getLoginStatus(function(response) {
     // statusChangeCallback(response);
    //});

  };


  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));


 // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() 
  {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me?fields=id,name,email,picture', function(response) {

    	if(response.email == null){

			swal({
	          title: "¡ERROR!",
	          text: "¡Para poder ingresar al sistema debe proporcionar la información del correo electrónico!",
	          type: "error",
	          confirmButtonText: "Cerrar",
	          closeOnConfirm: false
	      	},

	      	function(isConfirm){
	           	if (isConfirm) {    
	              	//window.location = localStorage.getItem("rutaActual");
	            } 
	      	});

		}
		else
		{

			var email = response.email;
			var nombre = response.name;
			var foto = "https://graph.facebook.com/"+response.id+"/picture?type=large";

			var datos = new FormData();
			datos.append("email", email);
			datos.append("nombre",nombre);
			datos.append("foto",foto);

			$.ajax({

				url:"ajax/usuarios.ajax.php",
				type:"POST",
				data:datos,
				cache:false,
				contentType:false,
				processData:false,
				dataType:"json"
			}).
			done( function(respuesta)
			{
					var res = respuesta[0].res;
					var msn = respuesta[0].msn;
					var ruta = respuesta[0].ruta;
					$('#modallo')
					console.log("Respuesta" + res);
					if(res == "ok"){
						window.location.href  = ruta;
						window.location.reload();
						//window.location = localStorage.getItem("rutaActual");					
					}
					else
					{
						error2(msn);
						setTimeout(LOGOUT(),1000);
						/*swal({
				          title: "¡ERROR!",
				          text: msn,
				          type: "error",
				          confirmButtonText: "Cerrar"				          
				      	},
				      	function(isConfirm)
				      	{
				           	if (isConfirm) {    
				              
			           		 FB.getLoginStatus(function(response){

			           		 	 if(response.status === 'connected'){     

			           		 	 	FB.logout(function(response){

			           		 	 		//deleteCookie("fblo_307504983059062");

			           		 	 		setTimeout(function(){

			           		 	 			window.location='data/logout.php';

			           		 	 		},500)

			           		 	 	});

			           		 	 	function deleteCookie(name){

			           		 	 		 document.cookie = name +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';

			           		 	 	}

			           		 	 }

			           		 })

				            } 
				      	});*/
					}

				 })
       			.fail(function( jqXHR, textStatus, errorThrown ) {
			     	if ( console && console.log ) {
			         console.log( "La solicitud a fallado: " +  textStatus);
                     result = true;
			     	}
				});

			}
		})

	}
      //console.log('Successful login for: ' + response.name);
      //document.getElementById('status').innerHTML ='Thanks for logging in, ' + response.name + '!';
  