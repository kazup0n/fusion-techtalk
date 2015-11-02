$(function(){

	var setMessages = function(messages){
		$('#messages').empty().append(messages.map(function(msg) {
			return '<li class="list-group-item">' + msg + "</li>";
		}).join(""));
	};

	var sendMessage = function(){
		$.ajax({
			type: 'post',
			url: '/messages',
			data: JSON.stringify({message: new Date().toLocaleString() + ":" + $('#message').val()}),
			contentType: 'application/json'
		})
		.then(function(){ return $.get('/messages');})
		.done(setMessages);
		$('#message').val('');
	};

	$('#send').on('click', sendMessage);
	$('#message').on('keypress', function(e){
		if(e.which === 13){
		   	sendMessage();
			return false;
		}else{
			return true;
		}
	});

	$.get('/messages').done(setMessages);
});
