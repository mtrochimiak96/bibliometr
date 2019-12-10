var gulp = require("gulp");
var sass = require("gulp-sass");
var del = require("del");
var concat = require("gulp-concat");

var cssFiles = ["css/**/*.css", "css/**/*.scss"],
  cssDest = "build/css";

gulp.task("styles_prod", () => {
  return gulp
    .src(cssFiles)
    .pipe(
      sass({
        outputStyle: "compressed"
      }).on("error", sass.logError)
    )
    .pipe(concat("main.css"))
    .pipe(gulp.dest(cssDest));
});

gulp.task("styles", () => {
  return gulp
    .src(cssFiles)
    .pipe(sass().on("error", sass.logError))
    .pipe(concat("main.css"))
    .pipe(gulp.dest(cssDest));
});

gulp.task("clean", () => {
  return del(["build/css/main.css"]);
});

gulp.task("default", gulp.series(["clean", "styles_prod"]));
gulp.task("dev", gulp.series(["clean", "styles"]));
