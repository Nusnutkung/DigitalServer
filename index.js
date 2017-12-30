var express = require('express');
var app = express();

app.get('/api',function(req,res){
	res.send("index page");
});

app.listen(3000,function(){
	console.log('Server Start port 3000')
});