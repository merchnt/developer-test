// gulpfile.js
var gulp = require("gulp");
var sass = require("gulp-sass");

gulp.task('style', function style() {
    return (
        gulp
            .src('node_modules/bootstrap/scss/bootstrap.scss')
            .pipe(sass())
            .on("error", sass.logError)
            .pipe(gulp.dest('web/css'))
    );
});

gulp.task('javascript', function javascript() {
    return (
        gulp.src([
            'node_modules/bootstrap/dist/js/bootstrap.min.js',
            'node_modules/jquery/dist/jquery.min.js',
            'resources/script/app.js',
        ])
            .pipe(gulp.dest('web/js'))
    );
});

gulp.task('default', gulp.series('style', 'javascript'));