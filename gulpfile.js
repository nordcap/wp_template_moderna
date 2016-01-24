"use strict";

//var rigger = require('gulp-rigger');//concat html files

var gulp = require('gulp');
//var sass = require('gulp-sass');
var minifyCss = require('gulp-minify-css');
var autoprefixer = require('gulp-autoprefixer');
//var wiredep = require('wiredep').stream;
//var useref = require('gulp-useref');
//var gulpif = require('gulp-if');
var uglify = require('gulp-uglify');
//var imagemin = require('gulp-imagemin');
//var minifyHTML = require('gulp-minify-html');
var plumber = require('gulp-plumber');
var runSequence = require('run-sequence');
//var pagespeed = require('psi');
//var browserSync = require('browser-sync').create();
var del = require('del');
//var jshint = require('gulp-jshint');


//var cache = require('gulp-cache');
var size = require('gulp-size');
var sourcemaps = require('gulp-sourcemaps');
//var pngquant = require('imagemin-pngquant');
//var sitemap = require('gulp-sitemap');
var concat = require('gulp-concat');
var merge = require('merge-stream');
/* for use sprites
 var spritesmith = require('gulp.spritesmith');

 */


var path = {
    dist: {
        //html: './dist/',
        js: 'js/',
        css: 'css/',
        //img: 'images/',
        //fonts: './dist/fonts/'


    },
    app: {
        //bower: 'bower_components/',
        //html: './app/*.html',
        js: 'js/',
        css: 'css/',
        //scss: './app/sass/main.scss',
        //img: './app/images/**/*.*',
        //fonts: './app/fonts/**/*.*',
        // lib: './app/lib/'
//
    },
    watch: {
        /*        html: './app/!**!/!*.html',
         js: './app/js/!**!/!*.js',
         scss: './app/sass/!**!/!*.scss',
         img: './app/images/!**!/!*.*',
         fonts: './app/fonts/!**!/!*.*'*/
    }
};


var AUTOPREFIXER_BROWSERS = [
    'ie >= 10',
    'ie_mob >= 10',
    'ff >= 30',
    'chrome >= 34',
    'safari >= 7',
    'opera >= 23',
    'ios >= 7',
    'android >= 4.4',
    'bb >= 10'
];


// Lint JavaScript
/*gulp.task('jshint', function () {
 return gulp.src(path.watch.js)
 .pipe(jshint())
 .pipe(jshint.reporter('jshint-stylish'));
 });*/


//copy img files and optimize images
/*gulp.task('images', function() {
 return gulp.src(path.app.img)
 .pipe(plumber())
 // .pipe(cache(imagemin({
 //     progressive: true,
 //     interlaced: true,
 //     use: [pngquant()]
 // })))
 .pipe(gulp.dest(path.dist.img))
 .pipe(size({title: 'images'}));
 });*/

// Copy web fonts to dist
/*gulp.task('fonts', function() {
 return gulp.src(path.app.fonts)
 .pipe(plumber())
 .pipe(gulp.dest(path.dist.fonts))
 .pipe(size({title: 'fonts'}));
 });*/

//copy jquery in dest
/*
 gulp.task('jquery', function(){
 return gulp.src('./app/bower_components/jquery/dist/jquery.min.js')
 .pipe(gulp.dest(path.dist.js))
 .pipe(size({title: 'jquery'}));
 });
 */


//concat js files => error concat&minify in task 'html'
gulp.task('concat-js', function () {
    var jsVendor = gulp.src([
        path.app.js + 'jquery.js',
        path.app.js + 'jquery.easing.1.3.js',
        path.app.js + 'bootstrap.min.js',
        path.app.js + 'jquery.fancybox.pack.js',
        path.app.js + 'jquery.fancybox-media.js',
        path.app.js + 'google-code-prettify/prettify.js',
        path.app.js + 'portfolio/jquery.quicksand.js',
        path.app.js + 'portfolio/setting.js',
        path.app.js + 'jquery.flexslider.js',
        path.app.js + 'animate.js'
    ])
        .pipe(concat('vendor.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest(path.dist.js))
        .pipe(size({title: 'concat-vendor-js'}));


    var jsMain = gulp.src([
        path.app.js + 'custom.js',
        path.app.js + 'main.js'

    ])
        .pipe(concat('main.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest(path.app.js))
        .pipe(size({title: 'concat-main-js'}));

    return merge(jsVendor, jsMain);

});


//concat css files => google optimize speed
gulp.task('concat-css', function () {
    var cssVendor = gulp.src([
        path.app.css + 'bootstrap.min.css',
        path.app.css + 'fancybox/jquery.fancybox.css',
        path.app.css + 'flexslider.css'

    ])
        .pipe(concat('vendor.min.css'))
        .pipe(minifyCss())
        .pipe(size({title: 'concat-vendor-css'}))
        .pipe(gulp.dest(path.dist.css));

    var cssMain = gulp.src([
        path.app.css + 'style.css',
        'skins/default.css'
    ])
        .pipe(concat('main.min.css'))
        .pipe(minifyCss())
        .pipe(size({title: 'concat-main-css'}))
        .pipe(gulp.dest(path.dist.css));

    return merge(cssVendor, cssMain);

});

// Copy all files at the root level (app)
/*gulp.task('copy', function(){
 return gulp.src([
 'app/!*.*',
 '!app/!*.html',
 'app/.htaccess'
 ],  {  dot: true  })
 .pipe(gulp.dest(path.dist.html))
 .pipe(size({title: 'copy'}));
 });*/


//assemble html, concat css & js files + minify files
/*gulp.task('html', function() {
 var assets = useref.assets();
 var opts = {
 empty: true,
 conditionals: true,
 spare: true,
 quotes: true
 };

 return gulp.src(path.app.html)
 .pipe(plumber())
 //.pipe(rigger())

 .pipe(assets)
 // Concatenate and minify JavaScri
 .pipe(gulpif('*.js', uglify()))
 // Concatenate and minify css
 .pipe(gulpif('*.css', minifyCss()))
 .pipe(assets.restore())
 .pipe(useref())
 // Output files
 .pipe(gulp.dest(path.dist.html))
 // Minify any HTML
 .pipe(minifyHTML(opts))
 .pipe(gulp.dest(path.dist.html))
 .pipe(size({title: 'html'}));
 });*/


//wiredep
/*gulp.task('bower', function() {
 return gulp.src(path.app.html)
 .pipe(plumber())
 .pipe(wiredep({
 directory: "app/bower_components"
 }))
 .pipe(gulp.dest('./app'));
 });*/


// Clean output directory
gulp.task('clean', del.bind(null, [
    path.app.css + 'vendor.min.css',
    path.app.css + 'main.min.css',
    path.app.js + 'vendor.min.js',
    path.app.js + 'main.min.js'], {dot: true}));

//Compile and automatically prefix styleheets
/*gulp.task('sass', function () {
 return gulp.src(path.watch.scss)
 .pipe(plumber())
 .pipe(sourcemaps.init())
 .pipe(sass.sync().on('error', sass.logError))
 .pipe(autoprefixer({browsers: AUTOPREFIXER_BROWSERS}))
 .pipe(sourcemaps.write())
 .pipe(gulp.dest(path.app.css))
 .pipe(size({title: 'sass'}))
 .pipe(browserSync.stream());

 });*/

// Watch files for changes & reload
/*gulp.task('watch', function () {

 gulp.watch(path.watch.scss, ['sass']);
 gulp.watch(path.watch.html).on('change', browserSync.reload);
 gulp.watch(path.watch.js, ['jshint']).on('change', browserSync.reload);
 });*/

//browser-sync
/*gulp.task('browser-sync', function () {
 browserSync.init({
 proxy: "budaev-html5/app"
 });
 });*/

//default
/*gulp.task('default', function(callback){
 runSequence('sass','browser-sync','watch',callback);
 });*/

//gulp.task('default', ['sass', 'browser-sync', 'watch']);

//build production files
gulp.task('default', function (callback) {
    runSequence('clean',
        //  'sass', ['images', 'copy', 'fonts', 'jquery'],
        'concat-css',
        'concat-js',
        //   'html',
        //   'sitemap',
        callback);
});


//create sitemap
/*gulp.task('sitemap', function () {
 return gulp.src('./dist/!**!/!*.html')
 .pipe(sitemap({
 siteUrl: 'http://yuorsite.com',
 priority: '1.0'
 }))
 .pipe(gulp.dest(path.dist.html));
 });*/


//create sprites
/*gulp.task('sprite', function () {
 var spriteData = gulp.src('./app/images/icon/!*.png')
 .pipe(spritesmith({
 imgName: 'sprite.png',
 imgPath: '../images/sprite.png',
 cssName: 'sprite.scss',
 algorithm: 'top-down',
 padding: 10,
 }));

 var imgStream = spriteData.img.pipe(gulp.dest('./app/images/'));

 var cssStream = spriteData.css.pipe(gulp.dest('./app/sass/utils/'));

 return merge(imgStream, cssStream);

 });*/


// Run PageSpeed Insights
/*
 gulp.task('pagespeed', function (cb) {
 // Update the below URL to the public URL of your site
 pagespeed.output('yuorsite.com', {
 strategy: 'mobile',
 // By default we use the PageSpeed Insights free (no API key) tier.
 // Use a Google Developer API key if you have one: http://goo.gl/RkN0vE
 // key: 'YOUR_API_KEY'
 }, cb);
 });
 */
