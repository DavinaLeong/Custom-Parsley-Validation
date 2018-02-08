const PATHS = {
    nodeModules: "node_modules/",
    vendor: "vendor/"
};

let gulp = require("gulp");
let del = require("del");
let debug = require("gulp-debug");

gulp.task("default", ["vendor"]);

gulp.task("vendor", ["clear-vendor", "copy-vendor"]);

gulp.task('copy-vendor', () => {
    // jquery
    gulp.src([
        'node_modules/jquery/dist/**'
    ])
    .pipe(debug({title: "copy jquery"}))
    .pipe(gulp.dest('vendor/jquery'));
    console.log('- copied jquery files');

    // popper.js
    gulp.src([
        'node_modules/popper.js/dist/**'
    ])
    .pipe(debug({title: "copy popper.js"}))
    .pipe(gulp.dest('vendor/popper.js'));
    console.log('- copied popper.js files');

    // bootstrap
    gulp.src([
        'node_modules/bootstrap/dist/**'
    ])
    .pipe(debug({title: "copy bootstrap"}))
    .pipe(gulp.dest('vendor/bootstrap'));
    console.log('- copied bootstrap files');

    // bootstrap
    gulp.src([
        'node_modules/parsleyjs/dist/**.js'
    ])
    .pipe(debug({title: "copy parsleyjs"}))
    .pipe(gulp.dest('vendor/parsleyjs'));
    console.log('- copied parsleyjs files');
});

gulp.task('clear-vendor', () => {
    del.sync([
        'vendor/bootstrap/**',
        'vendor/jquery/**',
        'vendor/popper.js/**',
        'vendor/parsleyjs/**',
        '!vendor'
    ]);
});