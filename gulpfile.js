// Configure Project defaults
var projectURL = 'http://localhost/underscoresass/'; // Local project URL of your already running WordPress site.

// Include the necessary modules
var gulp = require('gulp'),
	sass = require('gulp-sass'),
	autoprefixer = require('gulp-autoprefixer'),
	browserSync = require('browser-sync');

// Configure BrowserSync
gulp.task('browserSync', function() {
	var files = [
		'./style.css',
		'./css/style.css',
		'./*.php'
	];
	
	browserSync.init(files, {
		proxy: projectURL
	});
});

// Configure Sass preprocessor and reload browers with updates
gulp.task('sass', function(){
	return gulp.src('sass/*.scss')
		.pipe(sass({
			'outputStyle': 'compressed'
		}).on('error', sass.logError))
		.pipe(autoprefixer({
			browsers: ['last 2 versions'],
			cascade: false
		}))
		.pipe(gulp.dest('css'))
		.pipe(browserSync.stream());
});


gulp.task('default', ['sass', 'browserSync'], function() {
	gulp.watch('sass/**/*.scss', ['sass']);
})