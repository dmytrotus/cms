var livereload = require('livereload');

gulp.task('watch', function () {
	var server = livereload();

});

gulp.task('default', ['watch']);