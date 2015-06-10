<?php
	function signinButton($pageName) {
		echo '
		<button type = "button" class="btn btn-default btn-lg" data-toggle = "modal" data-target="#signIn"> Sign In </button>
		<div class="modal fade" id="signIn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <form action="htmlspecialchars($_SERVER["PHP_SELF"])" method="post">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Sign In</h4>
		      </div>
		      <div class="modal-body">
		        <p> Enter your account information </p>
				  <div class="form-group">
				    <label for="inputUsername"> Username </label>
				    <input type="text" class="form-control" name="username" placeholder="Username">
				  </div>
				  <div class="form-group">
				    <label for="inputPassword">Password</label>
				    <input type="password" class="form-control" name="password" placeholder="Password">
				  </div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn">Sign In</button>
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      </div>
		      </form>
		    </div>
	      </div>
		</div>
		';
	}
?>