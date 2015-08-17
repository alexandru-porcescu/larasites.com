var tinylr = require('tiny-lr');
var liveReload = require('connect-livereload');
var chokidar = require('chokidar');
var gutil = require('gulp-util');

module.exports = function reloader (options) {

    if (!options.app || !options.app.use) {
        throw new Error('HTTP middleware app value required');
    }

    var app = options.app;
    var port = options.port || 35729;

    tinylr().listen(port, function() {

        gutil.log('Livereload listening on port %s', port);

        var watcher = chokidar.watch([
            './public/**/*.js',
            './public/**/*.css',
            './public/**/*.html'
        ]);

        watcher.on('change', function (filepath) {
            gutil.log('live-reload: %s changed', filepath.replace('./public/', ''));
            tinylr.changed(filepath);
        });
    });

    app.use(liveReload({
        port: port,
    }));
};
