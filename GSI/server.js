    http = require('http');
    fs = require('fs');

    var csgoport = 3000;
    var webport = 8081;

    var app = require('express')();
    var express = require('http').Server(app);
    var io = require('socket.io')(express);


    app.set('view engine', 'jade');

    app.get('/', function(req, res) {
        res.render('index');
    });

    app.get('/main.js', function(req, res) {
        res.sendFile(__dirname +'/public/js/main.js');
    });

    app.get('/style.css', function(req, res) {
        res.sendFile(__dirname +'/public/css/style.css');
    });

    io.on('connection', function(socket) {
        
    });

    express.listen(webport, function() {
        console.log('\nhttp://localhost:'+webport);
    });

    server = http.createServer(function(req, res) {

        if (req.method == 'POST') {
            res.writeHead(200, {
                'Content-Type': 'text/html'
            });

            var body = '';
            req.on('data', function(data) {
                body += data;
            });
            req.on('end', function() {
                //console.log("POST payload: " + body);
                update(JSON.parse(body));
                res.end('');
            });

        } else {
            res.writeHead(200, {
                'Content-Type': 'text/html'
            });
            var html = 'yes';
            res.end(html);
        }

    });

    var map;
    var player;

    var round = {
        phase: "",
        timestart: 0,
        time: 0,
        maxTime: 0,
        bomb: {
            planted: false,
            timestart: 0,
            time: 0,
            maxTime: 40
        }
    };

    function update(json) {
        if (json.round) {
            if (!(round.phase === json.round.phase)) {
                round.timestart = json.provider.timestamp;
                round.phase = json.round.phase;
            }

            var maxTime = 0;
            if (json.round.phase === 'live') {
                maxTime = 115;
            } else if (round.phase === 'freezetime') {
                maxTime = 15;
            } else {
                maxTime = 7;
            }
            round.time = maxTime - (new Date().getTime() / 1000 - round.timestart);
            round.maxTime = maxTime;

            if (!round.bomb.planted && json.round.bomb === 'planted') {
                round.bomb.planted = true;
                round.bomb.timestart = json.provider.timestamp;
            } else if (round.bomb.planted && json.round.bomb !== 'planted') {
                round.bomb.planted = false;
            }

            if (round.bomb.planted) {
                round.bomb.time = 40 - (new Date().getTime() / 1000 - round.bomb.timestart);
            }

            json.extra = {};
            json.extra.round = round;
        }

        io.emit("update", JSON.stringify(json));
    }

    server.listen(csgoport);