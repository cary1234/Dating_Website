(function($){
//    alert("a");
//	var SOCKET_IO = $('#SOCKET_IO').val()//"http://192.168.1.70:7777";//
	var SOCKET_IO = "http://localhost:80";//
//	var SOCKET_IO = "http://192.168.1.70:7777";//
//	var USER_ID = $('#USER_ID').val();//
//	var USER_ID = "37"//
    var USER_ID = $('#USER_ID').val();
//    alert(USER_ID);
    if(typeof io != "undefined"){

		var SOCKET = io(SOCKET_IO);
		_init();
	}

	function _init(){

		if(USER_ID){

			SOCKET.emit('users_login', { uid: USER_ID });
		}
//        alert(USER_ID);
		SOCKET.on('receiveMessageEmit', function (data){
//            alert("From:"+data.idFrom+" Message:"+data.chatMessage);
            try {
                var check = document.getElementById(data.divto);
                if(check === null){
                    genchatbox =
                        '<div id="'+data.divto+'" class="chat">'+
                            '<section class="module">'+
                            '<header class="top-bar">'+
                            '<div class="left">'+
                            '<span class="icon typicons-message"></span>'+
                            '<h1>User Id:'+data.idFrom+'</h1>'+
                            '</div>'+
                            '<div class="right">'+
                            '<span class="icon typicons-minus"></span>'+
                            '<span class="icon typicons-times"></span>'+
                            '</div>'+
                            '</header>'+
                            '<ol id="discussion-'+data.divto+'" class="discussion">'+
                            '<li class="other">'+
                            '<div class="avatar">'+
                            '<img src="http://s3-us-west-2.amazonaws.com/s.cdpn.io/5/profile/profile-80_9.jpg" />'+
                            '</div>'+
                            '<div class="messages">'+
                            data.chatMessage+
                            '<time datetime="2009-11-13T20:00">Timothy • 51 min</time>'+
                            '</div>'+
                            '</li>'+
                            '</ol>'+
                            '<textarea id="textareamsg-'+data.idFrom+'" style="width: 80%;"></textarea>'+
                            '<input class="sendMessgaebtn" data-id="'+data.idFrom+'" type="button" value="Send"/>'+
                            '</section>'+
                            '</div>';

                    $("#containerchat").prepend(genchatbox);
                    $(".sendMessgaebtn").on("click",function(){
                        var idFrom = data.idFrom;
                        var idTo = $(this).data("id");
                        var msg = $("#textareamsg-"+data.idFrom).val();
                        var appendmsgchatbox =
                            '<li class="self">'+
                                '<div class="avatar">'+
                                '<img src="http://s3-us-west-2.amazonaws.com/s.cdpn.io/3/profile/profile-80_20.jpg" />'+
                                '</div>'+
                                '<div class="messages">'+
                                msg +
                                '<time datetime="YYYY-mm-dd">xx mins</time>'+
                                '</div>'+
                                '</li>';
                        $("#discussion-"+data.divto).append(appendmsgchatbox);
//                        alert(data.divto);
                        $().sendMessage(idFrom,idTo,msg,data.divto);

                    });
                } else {
                    var appendmsgchatbox =
                        '<li class="other">'+
                            '<div class="avatar">'+
                            '<img src="http://s3-us-west-2.amazonaws.com/s.cdpn.io/3/profile/profile-80_20.jpg" />'+
                            '</div>'+
                            '<div class="messages">'+
                            data.chatMessage+
                            '<time datetime="YYYY-mm-dd">xx mins</time>'+
                            '</div>'+
                            '</li>';
                    $("#discussion-"+data.divto).append(appendmsgchatbox);
                }



            } catch(err) {


            }



		});

	}

	function chat_user_offline(){
		SOCKET.emit('user_logout', { uid: USER_ID });
	}

    window.onbeforeunload = function(){
        chat_user_offline();
    }

    $.fn.sendMessage = function(idFromget,idToget,message,divto){

        SOCKET.emit('sendMessageEmit', { idFrom:idFromget,idTo: idToget,chatMessage: message,divto:divto});
        return this;
    }

})( jQuery );