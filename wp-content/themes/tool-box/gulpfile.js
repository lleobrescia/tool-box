/**
 * Configuration.
 *
 * Project Configuration for gulp tasks.
 *
 */

var themeFolder       = 'tool-box'; // Theme folder name
var dist              = './dist' // Distribution folder


var styleSRC          = './sass/style.scss'; // Path to main .scss file
var styleDestination  = './'; // Path to place the compiled CSS file
var styleWatchFiles   = './sass/**/*.scss'; // Path to all *.scss files inside css folder and inside them

var phpSRC            = './**/*.php'; // Path to all PHP files

var imagesSRC         = './images/**/*'; // Path to all images files
var imagesDestination = dist + '/images'; // Path to images destination

var filesDestination  = ['./screenshot.png', './languages/**/*', './js/**/*'] // Files to copy to destination folder


/**
 * Load Plugins.
 *
 * Load gulp plugins and assign them semantic names.
 */
var gulp          = require('gulp'); // Gulp of-course

// CSS related plugins.
var sass          = require('gulp-sass'); // Gulp pluign for Sass compilation
var autoprefixer  = require('gulp-autoprefixer'); // Autoprefixing magic
var postcss       = require('gulp-postcss');
var assets        = require('postcss-assets'); // Is an asset manager for CSS. It isolates stylesheets from environmental changes, gets image sizes and inlines files.

// Utility related plugins.
var sourcemaps    = require('gulp-sourcemaps'); // Maps code in a compressed file (E.g. style.css) back to it’s original position in a source file (E.g. structure.scss, which was later combined with other css files to generate style.css)
var notify        = require('gulp-notify'); // Sends message notification to you
var imagemin      = require('gulp-imagemin');
var del           = require('del');
var vinylPaths    = require('vinyl-paths');
var browsersync   = require('browser-sync');

/**
 * Task: styles
 *
 * Compiles Sass, Autoprefixes it, use PostCSS to automatically
 * add asset references, apply vendor prefixes,
 * pack media queries together and force a Browsersync CSS reload
 *
 */
gulp.task('styles', function () {
  gulp.src(styleSRC)
    .pipe(sourcemaps.init())
    .pipe(sass({
      errLogToConsole: true,
      outputStyle: 'expanded',
      precision: 3,
      imagePath: '/wp-content/themes/' + themeFolder + '/images/'
    }))
    .pipe(sourcemaps.write({
      includeContent: false
    }))
    .pipe(sourcemaps.init({
      loadMaps: true
    }))
    .pipe(postcss(
      [
        assets({
          loadPaths: ['images/'],
          basePath: '/wp-content/themes/' + themeFolder,
          baseUrl: '/wp-content/themes/' + themeFolder
        }),
        require("css-mqpacker")()
      ]
    ))
    .pipe(autoprefixer(
      'last 2 version',
      '> 1%',
      'safari 5',
      'ie 8',
      'ie 9',
      'opera 12.1',
      'ios 6',
      'android 4'))
    .pipe(sourcemaps.write(styleDestination))

    .pipe(gulp.dest('./'))
    .pipe(notify({
      message: 'TASK: "styles" Completed!',
      onLast: true
    }));
});

/**
 * Task: copy:css
 *
 * Copys css main file to Distribution folder
 */
gulp.task('copy:css', function () {
  return gulp.src(['./style.css'])
    .pipe(gulp.dest(dist))
    .pipe(notify({
      message: 'TASK: "copy:css" Completed!',
      onLast: true
    }));
});


/**
 * Task: copy:php
 *
 * Copys PHP files to Distribution folder
 */
gulp.task('copy:php', function () {
  return gulp.src(phpSRC)
    .pipe(gulp.dest(dist))
    .pipe(notify({
      message: 'TASK: "copy:php" Completed!',
      onLast: true
    }));
});

/**
 * Task: copy:images
 *
 * Copys images files to Distribution folder
 */
gulp.task('copy:images', () => {
  return gulp.src(imagesSRC)
    .pipe(imagemin())
    .pipe(gulp.dest(imagesDestination));
});

/**
 * Task: copy:files
 *
 * Copys theme files to Distribution folder
 */
gulp.task('copy:files', () => {
  return gulp.src(filesDestination)
    .pipe(imagemin())
    .pipe(gulp.dest(dist));
});

/**
 * Task: clean:dist
 *
 * Removes all files from Distribution folder
 */
gulp.task('clean:dist', function () {
  return gulp.src(dist + '/*')
    .pipe(vinylPaths(del));
});

/**
 * Task: build
 *
 * Copys all files to Distribution folder
 */
gulp.task('build', ['clean:dist', 'copy:files', 'copy:images', 'copy:php', 'copy:css']);


gulp.task('browsersync', () => {
  browsersync.create();
  browsersync.init({
    proxy: 'localhost/tool-box',
    files: ['*.css', '**/*.php', '**/*.js', '!node_modules/**/*.*', '!bower_components*.*'],
    open: false,
    notify: false,
    ghostMode: false,
    ui: {
      port: 8001
    }
  });
});

/**
 * Watch Tasks.
 *
 * Watches for file changes and runs specific tasks.
 */
gulp.task('watch', ['styles', 'browsersync'], function () {
  gulp.watch(styleWatchFiles, ['styles'], browsersync.reload);
  gulp.watch(phpSRC, [], browsersync.reload);
  gulp.watch(imagesSRC, [], browsersync.reload);
});

/**
 * Default Task.
 *
 */
gulp.task('default', ['watch']);
