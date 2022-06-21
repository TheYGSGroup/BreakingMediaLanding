const { task, watch, src, dest, parallel } = require('gulp')
const autoprefixer = require('autoprefixer')
const postcss = require('gulp-postcss')
const postcssNested = require('postcss-nested')
const sourcemaps = require('gulp-sourcemaps')
const cssnano = require('cssnano');

function style() {  
    return (
            src('src/**/*.css')
            .pipe( sourcemaps.init() )
            .pipe( postcss([ autoprefixer(), postcssNested(), cssnano() ]) )
            .pipe( sourcemaps.write('.') )
            .pipe( dest('css/') )
    );
}

function watchTask() {
    return watch(['src/**/*.css'], parallel(style) )
}

task('default', parallel(style));

exports.style = style;
exports.watch = watchTask;