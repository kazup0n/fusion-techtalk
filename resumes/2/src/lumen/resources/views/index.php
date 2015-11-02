<!doctype>
<html>
	<head>
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" />
		<script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
		<script src="chat.js"></script>
	</head>
	<body>
		<div class="container">
			<form class="form-inline">
  				<div class="form-group">
    				<label for="exampleInputName2">Name</label>
    				<input type="text" class="form-control" id="message" placeholder="message">
  				</div>
  				<div class="form-group">
					<button id="send" type="button" class="btn btn-default">Send</button>
				</div>
			</form>
			<div>
				<ul class="list-group" id="messages"></ul>
			</div>
		</div>
	</body>
</html>
