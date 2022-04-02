<?php include 'header.php';?>
  <body id="login">
    <div class="container">

	<form id="login_form" name="login_form" class="form-signin" action="login.php" method="post">
        <h3 class="form-signin-heading"><i class="icon-lock"></i> Please Login</h3>

		<input type="text" class="input-block-level" id="username" name="username" placeholder="Username" required>
        <input type="password" class="input-block-level" id="password" name="password" placeholder="Password" required>

		<button type="submit" name="login" class="btn btn-info" ><i class="icon-signin icon-"></i> Sign in</button>

	</form>
	<script>

		jQuery(document).ready(function(){

			jQuery("#login_form").submit(function(e){
				e.preventDefault();
				
				let formData = $("#login_form").serialize();
				// console.log(formData);

				// let obj = {}
				// obj.username =  $('#username').val(),
				// obj.password = $('#password').val(),
				// console.log(JSON.stringify(obj));
				// console.log(obj);
				

				$.ajax({
					type: "POST",
					url: "login.php",
					// contentType: "application/json",
					// data: JSON.stringify(obj),
					data: formData,
					success: function(html){
						// console.log(html);
						if(html=="true"){
							// console.log("HTML true");
							// console.log("Correct Credentials");
							$.jGrowl("Welcome to Learning Management System", { header: 'Access Granted' });
							var delay = 2000;
							setTimeout(function(){ window.location = 'dashboard.php'  }, delay);
						} else {
							// console.log("HTML false");
							// console.log("Invalid Credentials");
							$.jGrowl("Please Check your username and Password", { header: 'Login Failed' });
						}
					},
					error: function(xhr, status, error){
						// console.log("HTML Result NOT returned")
						console.log("Error: \n", xhr);
					}

				});

				
				return false;

			});

		});
	</script>




    </div> <!-- /container -->
<?php include 'script.php';?>
  </body>
</html>