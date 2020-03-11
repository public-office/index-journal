const gulp = require('gulp')
const sass = require('gulp-sass')
const autoprefixer = require('gulp-autoprefixer')
const sourcemaps = require('gulp-sourcemaps')
const concat = require('gulp-concat')
const uglify = require('gulp-uglify')
const livereload = require('gulp-livereload')

gulp.task('styles', gulp.series([() =>
  gulp.src('./src/css/**/*.scss')
    .pipe(sourcemaps.init())
    .pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer())
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest('./assets/css'))
    .pipe(livereload())
]))

gulp.task('styles:watch', gulp.series([() => {
  livereload.listen()
  gulp.watch('./src/css/**/*.scss', gulp.series(['styles']))
}]))

gulp.task('dev', gulp.series(['styles', 'styles:watch']))
gulp.task('default', gulp.series(['styles']))
