var gulp = require('gulp'),
    autoprefixer = require('gulp-autoprefixer'),
    cssnano = require('gulp-cssnano'),
    rename = require('gulp-rename'),
    concat = require('gulp-concat'),
    notify = require('gulp-notify'),
    livereload = require('gulp-livereload'),
    mainBowerFiles = require('main-bower-files'),
    size = require('gulp-size'),
    run = require('gulp4-run-sequence'),
    minify = require('gulp-minify');


// Styles
function styles() {
    var files = [
        //'js/jqueryui/jquery-ui.min.css',
        'css/reset.css',
        'css/styles.css'
    ]

    return gulp.src(files)
        .pipe(concat('main.css'))
        .pipe(gulp.dest('css'))
        .pipe(rename({ suffix: '.min' }))
        .pipe(cssnano())
        .pipe(size({ showFiles: true }))
        .pipe(size({ gzip: true, showFiles: true }))
        .pipe(gulp.dest('css'))
        .pipe(notify({ message: 'CSS completo' }));
};




// Scripts Header
function scripts_header() {
    var files = [
        'js/jquery-3.1.1.js',
        'js/jquery-migrate-3.0.0.min.js',
        'js/jquery-ui.min.js',
        'js/bootstrap.min.js',
        'js/main.js',
    ]

    return gulp.src(files)
        .pipe(concat('main.header.js'))
        .pipe(gulp.dest('js'))
        .pipe(minify({
            ext: {
                src: '-debug.js',
                min: '.js'
            },
            exclude: ['tasks'],
            ignoreFiles: ['.combo.js', '-min.js', '.min.js'],
            noSource: true
        }))
        .pipe(rename({ suffix: '.min' }))
        .pipe(size({ showFiles: true }))
        .pipe(size({ gzip: true, showFiles: true }))
        .pipe(gulp.dest('js'))
        .pipe(notify({ message: 'Header Completo' }));
};

// Scripts Footer
function scripts_footer() {
    var files = [
  
        'js/main.js'
    ]

    return gulp.src(files)
        .pipe(concat('main.js'))
        .pipe(gulp.dest('js'))
        .pipe(minify({
            ext: {
                src: '-debug.js',
                min: '.js'
            },
            exclude: ['tasks'],
            ignoreFiles: ['.combo.js', '-min.js', '.min.js'],
            noSource: true
        }))
        .pipe(rename({ suffix: '.min' }))
        .pipe(size({ showFiles: true }))
        .pipe(size({ gzip: true, showFiles: true }))
        .pipe(gulp.dest('js'))
        .pipe(notify({ message: 'Footer Completo' }));
};




// Watch files
function watchFiles() {
    // CSS
    gulp.watch([
        'css/styles.css'
    ], gulp.parallel(styles));

    // JS
    gulp.watch([
        'js/main.js',
    ], gulp.parallel(scripts_footer,scripts_header));
}

const build = gulp.series(gulp.parallel(
    styles,
    scripts_header,
    scripts_footer
), watchFiles);

// export tasks
exports.styles = styles;
exports.scripts_header = scripts_header;
exports.scripts_footer = scripts_footer;



exports.default = build;