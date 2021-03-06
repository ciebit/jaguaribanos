import gulp from 'gulp'
import builderCover from './sources/js/builders/cover'
import builderCommons from './sources/js/builders/commons'

let idTasks = []
idTasks.push(
    builderCover(gulp),
    builderCommons(gulp)
)

gulp.task('build-css', gulp.series(
    ...idTasks.map(item => item.css).filter(Boolean)
));

gulp.task('build', gulp.series(
    'build-css'
))

gulp.task('watch-css', function(){
    gulp.watch('sources/sass/**/*.*', gulp.series('build-css'))
})
