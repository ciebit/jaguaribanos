import { folderCss, folderSass } from './environment'
import rename from 'gulp-rename'
import sass from 'gulp-sass'

const module = 'commons'

function taskCss(gulp)
{
    const id = 'buildCommonsCss'
    const version = '1'

    gulp.task(id, () => {
        return gulp.src([
            `${folderSass}/commons/main.sass`
        ])
        .pipe(sass({outputStyle: 'compressed'}))
        .pipe(rename(`${module}-v${version}.css`))
        .pipe(gulp.dest(folderCss))
    });

    return id
}

export default function(gulp)
{
    return {
        'css': taskCss(gulp)
    }
}
