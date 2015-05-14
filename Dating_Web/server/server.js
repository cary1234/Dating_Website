

console.log("----------------Server Start----------------");
console.log("----------------Server Info-----------------");
console.log("HOST: localhost--------------------------");
console.log("PORT: 7777----------------------------------");


var mysql      = require('mysql');
var connection = mysql.createConnection({
    host     : 'localhost',
    user     : 'root',
    password : '',
    database: 'dating_website'
});
// var oxr = require('open-exchange-rates'),fx = require('money');
// oxr.set({ app_id: getforexAPIiD })

var io = require('socket.io')(7777);
var clients = {};
var offlineclients = {};

io.sockets.on('connection', function (socket) {
  
	socket.on('users_login', function(data){
	if(data.uid)
	{

		var obj = {uid: data.uid, socketid: socket.id};
		clients[data.uid] = obj;

		console.log("---------------------------ONLINE USER------------------------------");
		console.log(clients);
		console.log("-----------------------------------------------------------------------------");
		
		if(data.uid in offlineclients){
			console.log(clients);
			delete offlineclients[data.uid];
		}
	}
	});

	socket.on('user_logout', function(data){
	if(data.uid in clients)
	{
		/* delete clients[data.uid]; */ //delete for separation of online and offline

		console.log("--------------------------------LOGOUT--------------------------------");
		console.log(clients);
		console.log("User ID: " + data.uid + " leave");
		console.log("---------------------------------------------------------------------------");
		offlineclients[data.uid] = {uid: data.uid};
		delete clients[data.uid];
	}

	});

    socket.on('sendMessageEmit', function (data) {
		var idTo = data.idTo;
		var idFrom = data.idFrom;
		var chatMessage = data.chatMessage;
		var divto = data.divto;
		if(data.idTo in clients) {
			try
			{
//                console.log("-----------------------------aaaaaa----------------------------------------------");
				io.sockets.connected[clients[idTo].socketid].emit('receiveMessageEmit', { divto:divto,idFrom:idFrom,idTo:idTo,chatMessage: chatMessage });

			}
			catch(Exception)
			{
				offlineclients[data.idTo] = {uid: idTo};
			}
		}
		else{
			offlineclients[data.idTo] = {uid: idTo};
		}
	});
});