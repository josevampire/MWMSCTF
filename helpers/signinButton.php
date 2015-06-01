<?php
	function signinButton($pageName) {
		echo '
		<button type = "button" class="btn btn-default btn-lg" data-toggle = "modal" data-target="#signIn"> Sign In </button>
		<div class="modal fade" id="signIn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Sign In</h4>
		      </div>
		      <div class="modal-body">
		        <p> Enter your account information </p>
		        <form>
				  <div class="form-group">
				    <label for="inputUsername"> Username </label>
				    <input type="username" class="form-control" id="exampleInputUsername1" placeholder="Username">
				  </div>
				  <div class="form-group">
				    <label for="inputPassword">Password</label>
				    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
				  </div>
				</form>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn">Sign In</button>
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      </div>
		    </div>
	      </div>
		</div>
		';
	}
?>