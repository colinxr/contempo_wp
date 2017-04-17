// Load plugins
var gulp 				 = require('gulp');

var sass 				 = require('gulp-sass');
var concat 			 = require('gulp-concat');
var cleanCSS     = require('gulp-clean-css');
var sourcemaps   = require('gulp-sourcemaps');
var autoprefixer = require('gulp-autoprefixer');

// Styles task

gulp.task('styles', function(){
	return gulp.src('assets/styles/src/**/*.scss')
    .pipe(sourcemaps.init())
    .pipe(sass({errLogToConsole: true}))
		.pipe(cleanCSS())
    .pipe(sourcemaps.write({includeContent: false, sourceRoot: '.'}))

    .pipe(sourcemaps.init({loadMaps: true}))
    //.pipe(autoprefixer({browsers: ['last 1 version', 'iOS 6'], cascade: false}))
    .pipe(sourcemaps.write('.', {includeContent: false, sourceRoot: '../styles/src'}))

    .pipe(gulp.dest('assets/styles/build'))
});


// Watch
gulp.task('watch', function() {

	// Watch .scss files
	gulp.watch('assets/styles/src/**/*.scss', ['styles']);

});

// Default task
gulp.task('default', ['styles']);

// Handle the error
function errorHandler (error) {
  console.log(error.toString());
  this.emit('end');
}
