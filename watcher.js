const util = require('util');
const exec = util.promisify(require('child_process').exec);

var app   = require('express')();
var http  = require('http').Server(app);
var io    = require('socket.io')(http);
const Redis = require('ioredis');

var client = new Redis({
   host: '127.0.0.1',
   port: 6379,  
   password: 'DKDKdkdkddDD2',
   enableReadyCheck: true,
   autoResubscribe: true
})

client.on('ready', () => {
   console.log('Redis server is ready!')
})

client.subscribe('whisper.private-Whisper');

setInterval(function() {
client.ping("client-Ping").then(function (result) {
  console.log(result); 
});
}, 1500);

client.on('message', function(channel, msg) {
  console.log( `[STATUS] On Whisper received event`);
});

client.on('error', error => {
   console.log('Error in Redis server: ' + error)
   process.chdir('/var/www/html/');
	async function lsWithGrep() {
		try {
      const { stdout, stderr } = await exec('bash /var/www/html/start.sh');
      console.log('stdout:', stdout);
      console.log('stderr:', stderr);
		} catch (err) {
	console.error(err);
		};
	};
	setTimeout(function() { 
	lsWithGrep();
	console.log('Connection successfully re-established!');	
	}, 2500)
})