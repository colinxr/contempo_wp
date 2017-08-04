// Load plugins
var gulp 				 = require('gulp');

var sass 				 = require('gulp-sass'),
		concat 			 = require('gulp-concat'),
		cleanCSS     = require('gulp-clean-css'),
		sourcemaps   = require('gulp-sourcemaps'),
		autoprefixer = require('gulp-autoprefixer'),
		image 			 = require('gulp-image'),
		watch 			 = require('gulp-watch'),
		svgSprite	 	 = require('gulp-svg-sprites'),
		uglify			 = require('gulp-uglify');
		rename 			 = require('gulp-rename');

// ... variables
var input = './assets/styles/src/**/*.scss';
var output = './assets/styles/build';
var autoprefixerOptions = {
		  browsers: ['last 2 versions', '> 5%', 'Firefox ESR']
		};

// Sprites task
gulp.task('sprites', function(){
	return gulp.src('assets/imgs/svg/**/*.svg')
		.pipe(svgSprite({mode: 'symbols'}))
		.pipe(gulp.dest('assets/svg'));
});

// Styles task
gulp.task('styles', function(){
	return gulp.src(input)
    .pipe(sourcemaps.init())
    .pipe(sass({errLogToConsole: true}))
		.pipe(cleanCSS())
		.pipe(autoprefixer(autoprefixerOptions))
    .pipe(sourcemaps.write({includeContent: false, sourceRoot: '.'}))

    .pipe(sourcemaps.init({loadMaps: true}))
    //.pipe(autoprefixer({browsers: ['last 1 version', 'iOS 6'], cascade: false}))
    .pipe(sourcemaps.write('.', {includeContent: false, sourceRoot: '../styles/src'}))

    .pipe(gulp.dest(output))
});

gulp.task('vendor', function(){
	return gulp.src('./assets/js/src/vendor/**/*.js')
		.pipe(concat('vendor.js'))
		.pipe(gulp.dest('./assets/js/build'))
		.pipe(rename('vendor.min.js'))
		.pipe(uglify())
		.pipe(gulp.dest('./assets/js/build'))
});

gulp.task('scripts', function(){
	return gulp.src('./assets/js/src/*.js')
		.pipe(sourcemaps.init())
		.pipe(gulp.dest('./assets/js/build'))
		.pipe(rename('app.min.js'))
		.pipe(uglify().on('error', function(e){
            console.log(e);
         }))
		.pipe(gulp.dest('./assets/js/build'))
})

gulp.task('watch', function(){
	return gulp.watch(input, ['sprites','styles', 'vendor', 'scripts'])
		.on('change', function(event){
			console.log('File ' + event.path + ' was ' + event.type + ', running tasks... 🚴')
		});

});

// Default task
gulp.task('default', ['sprites', 'styles', 'vendor', 'scripts', 'watch']);

// Handle the error
function errorHandler (error) {
  console.log(error.toString());
  this.emit('end');
}
