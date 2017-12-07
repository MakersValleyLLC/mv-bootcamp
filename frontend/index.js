
var express = require('express');

var app = express();
var port = process.env.PORT || 4000;

app.use('/', express.static(__dirname + '/public'));

app.listen(port, function(){
  console.log('MakersValley webpage is listening on port 4000!');
});
