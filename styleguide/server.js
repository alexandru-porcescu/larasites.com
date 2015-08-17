var gulp = require('gulp');
var gulpfile = require(process.cwd() + '/gulpfile.js');
var opn = require('opn');
var ss = require('superstatic');

console.log(process.cwd() + '/public/styleguide/');

var app = ss.server({
    port: 3474,
    config: {
        root: './public'
    }
});

var reloader = require('./reloader.js');
reloader({app: app});

app.listen(function (err) {
    opn('http://localhost:3474/styleguide');
});

gulp.start('watch');
