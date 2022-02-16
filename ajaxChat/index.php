<!DOCTYPE html>
<html>
<head>
	<title>Ajax Chat</title>
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
	<div class="row" style="margin: 20px;">
		<div class="card col-sm-4" style="height: 250px;">
	  		<div class="card-body">
				<form id="chat-form">
				  <div class="form-group">
				    <input type="text" name="nama_chat" class="form-control" id="name" placeholder="Enter Name..">
				  </div>
				  <div class="form-group" style="margin-top: 10px; margin-bottom: 10px;">
				  	<textarea class="form-control" name="text_chat" id="chat" rows="4" placeholder="Type Here.."></textarea>
				  </div>
				  <button type="button" class="btn btn-primary">Send</button>
				</form>
			</div>
		</div>
		<div class="card col-sm-8" style="height: 500px;">
	  		<div class="card-body">
	  			<div class="chat-content"></div>
	  		</div>
	  	</div>
  	</div>

</body>
</html>

<script type="text/javascript">
	$(document).ready(function()
	{
		getChat();

	  	$("button").click(function(){
		  	var values = $('#chat-form').serialize();

		  	// post
		  	$.ajax({
		        url: "PostChat.php",
		        type: "post",
		        data: values ,
		        success: function (response) { getChat(); clearInput(); },
		        error: function(jqXHR, textStatus, errorThrown) { console.log(textStatus, errorThrown); }
		    });
	  	});
	});

	function getChat()
	{
		// get
	    $.ajax({
	        url: "GetChat.php",
	        type: "get",
	        error: function(jqXHR, textStatus, errorThrown) { console.log(textStatus, errorThrown); },
	        success: function (response) {
	        	$(".chat-content").html(response);
	        }
	    });
	}

	function clearInput()
	{
		$('input').val('');
		$('textarea').val('');
	}
</script>