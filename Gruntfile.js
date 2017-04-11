module.exports = function (grunt) {
    grunt.initConfig ({
        pkg: grunt.file.readJSON('package.json'),

        // non utilizzato qui
        concat: {
            dist: {
                src: [
                    'app/styles/src/*.scss',
                ],
                dest: 'app/styles/build.scss',
            }
        },

        sass: {                              // Task
            dist: {                            // Target
                options: {                       // Target options
                    style: 'expanded',
                    trace: true
                },
                files: {                         // Dictionary of files
                    './css/build.css': './css/scss/stile.scss',       // 'destination': 'source'
                }
            }
        },

        browserSync: {
            bsFiles: {
                src : [
                    './css/stile.css',
                    '*.html'
                ]
            },
            options: {
                watchTask: true,
                server: {
                    baseDir: "./",
                    //index: "index.html"
                }
            }
        },

        bsReload: {
            css: "./css/stile.css"
        },

        cssmin: {
            target: {
                files: [{
                    expand: true,
                    cwd: './css/',
                    src: ['*.css', '!*.min.css'],
                    dest: './css/',
                    ext: '.min.css'
                }]
            }
        },

        postcss: {
            options: {
                map: {
                    inline: false,
                    annotation: './css/'
                },
                processors: [
                    require('autoprefixer')({browsers: 'last 2 versions'}),
                    //require('cssnano')()
                ]
            },
            dist: {
                src: './css/stile.css'
            }
        },

        imagemin: {
            dynamic: {                         // Another target
                files: [{
                    expand: true,                  // Enable dynamic expansion
                    cwd: './img/',                   // Src matches are relative to this path
                    src: ['**/*.{png,jpg,gif}'],   // Actual patterns to match
                    dest: './img/min/'                  // Destination path prefix
                }]
            }
        },

        watch: {
            css: {
                files: './css/scss/*.scss',
                tasks: ['sass','postcss','bsReload:css']
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-postcss');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-browser-sync');
    grunt.loadNpmTasks('grunt-contrib-imagemin');

    grunt.registerTask('default', ['browserSync','watch']); //potrei aggiungere anche browserSync per il webserver

    // task per minimizzare immagini
    grunt.registerTask('finalSteps', ['imagemin','postcss','cssmin']);
}