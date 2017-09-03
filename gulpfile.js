var pkg = require('./package.json');

var autoprefixer = require('autoprefixer'),
    uglify = require('gulp-uglify'),
    cssnano = require('cssnano'),
    gulp = require('gulp'),
    merge  = require('merge-stream'),
    postcss = require('gulp-postcss'),
    rename = require("gulp-rename"),
    runSequence  = require('run-sequence'),
    sass = require('gulp-sass'),
    copy = require('copy'),
    source = require('vinyl-source-stream'),
    sourcemaps = require('gulp-sourcemaps'),
    buffer = require('vinyl-buffer'),
    browserify = require('browserify'),
    babelify = require('babelify'),
    zip = require('gulp-zip');

var paths = {
    mainJS: './web/assets/src/js/main.js',
    mainScss: './web/assets/src/scss/main.scss',
    styles: './web/assets/src/scss/**/*.scss',
    scripts: './web/assets/src/js/**/*.js',
};

/**
 * Compile src/main.js into dist/main.min.js
 */
gulp.task('compile_js', ['browserify'], function(){
    var main = gulp.src("./web/assets/dist/js/main.bundle.js")
        .pipe(sourcemaps.init())
        .pipe(uglify())
        .pipe(rename("main.min.js"))
        .pipe(sourcemaps.write("."))
        .pipe(gulp.dest("./web/assets/dist/js"));

    return merge(main);
});

gulp.task('browserify', function(){
    var main = browserify(paths.mainJS,{
        insertGlobals : true,
        debug: true
    })
        .transform("babelify", {presets: ["env"]}).bundle()
        .pipe(source('main.bundle.js'))
        .pipe(buffer()) //This might be not required, it works even if commented
        .pipe(gulp.dest('./web/assets/dist/js'));

    return merge(main);
});

/**
 * Copy vendors to destinations. This does not work for some reason.
 */
gulp.task('copy-js-vendors',function() {
    var cb = function(err,files){
        if(err) return console.error(err);
        files.forEach(function(file) {
            console.log("Copied: "+file.relative);
        });
    };

    //@see https://github.com/jonschlinkert/copy/tree/master/examples

    //Copy scripts
    copy([
        './node_modules/moment/min/moment-with-locales.min.js',
        './node_modules/moment-timezone/builds/moment-timezone-with-data.min.js',
    ],'./web/assets/dist/js',{flatten: true},cb);
});

gulp.task('fonts', function() {
    return gulp.src('node_modules/font-awesome/fonts/*')
        .pipe(gulp.dest('web/assets/fonts/font-awesome'))
});

/**
 *  Compile src/main.scss into dist/main.css
 */
gulp.task('compile_sass', function () {
    var processors = [
        autoprefixer({browsers: ['last 1 version']}),
        cssnano()
    ];

    var main = gulp.src(paths.mainScss)
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(postcss(processors))
        .pipe(rename('main.min.css'))
        .pipe(sourcemaps.write("."))
        .pipe(gulp.dest('./web/assets/dist/css'));

    return merge(main);
});

/**
 * Rerun the task when a file changes
 */
gulp.task('watch', function() {
    gulp.watch(paths.styles, ['compile_sass']);
    gulp.watch(paths.scripts, ['compile_js']);
});

/**
 * Default task
 */
gulp.task('setup', function(callback){
    runSequence('copy-js-vendors', ['compile_js', 'compile_sass', 'fonts'], callback);
});

/**
 * Default task
 */
gulp.task('default', function(callback){
    runSequence('copy-js-vendors', ['compile_js', 'compile_sass', 'fonts'], 'watch', callback);
});