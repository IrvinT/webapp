// Generated on 2014-05-20 using generator-webapp 0.4.9
'use strict';

// # Globbing
// for performance reasons we're only matching one level down:
// 'test/spec/{,*/}*.js'
// use this if you want to recursively match all subfolders:
// 'test/spec/**/*.js'

module.exports = function (grunt) {

    // Load grunt tasks automatically
    require('jit-grunt')(grunt, {
        sprite: 'grunt-spritesmith'
    });

    // Time how long tasks take. Can help when optimizing build times
    require('time-grunt')(grunt);

    // Configurable paths
    var config = {
        app: 'app',
    };

    var timestamp = Date.now();

    // Define the configuration for all the tasks
    grunt.initConfig({

        // Project settings
        config: config,

        // Watches files for changes and runs tasks based on the changed files
        watch: {
            // js: {
            //     files: ['<%= config.app %>/js/{,*/}*.js'],
            //     tasks: ['jshint'],
            //     options: {
            //         livereload: true
            //     }
            // },
            gruntfile: {
                files: ['Gruntfile.js']
            },
            sass: {
                files: ['<%= config.app %>/sass/**/*.{scss,sass}'],
                tasks: [
                    'sass',
                    'autoprefixer'
                ],
                options: {
                    spawn: false,
                }
            },
            livereload: {
                options: {
                    livereload: '<%= connect.options.livereload %>'
                },
                files: [
                    '<%= config.app %>/**/*.tpl',
                    '<%= config.app %>/css/**/**.css',
                    '<%= config.app %>/js/**/*.js',
                    '<%= config.app %>/img/{,*/}*'
                ]
            },
            sprite: {
                files: ['<%= config.app %>/img/sprite/*.png'],
                tasks: ['sprite']
            }
        },

        // The actual grunt server settings
        connect: {
            options: {
                port: 9054,
                open: false,
                livereload: 35729,
                // Change this to '0.0.0.0' to access the server from outside
                hostname: '0.0.0.0'
            },
            livereload: {
                options: {
                    open: false,
                    base: [
                        '<%= config.app %>'
                    ]
                }
            },
        },

        cssmin: {
            minify: {
                expand: true,
                src: '<%= config.app %>/inline-css.tpl',
                dest: '.'
            }
        },

        jshint: {
            options: {
                jshintrc: '.jshintrc',
                reporter: require('jshint-stylish')
            },
            all: [
                'Gruntfile.js',
                '<%= config.app %>/js/**/*.js'
                // '!<%= config.app %>/scripts/vendor/*',
            ]
        },

        clean: {
            dist: {
                files: [{
                    dot: true,
                    src: [
                        '<%= config.app %>/img/sprite*.png',
                        '<%= config.app %>/css/*.map'
                    ]
                }]
            },
            serve: {
                files: [{
                    dot: true,
                    src: [
                        '<%= config.app %>/img/sprite*.png'
                    ]
                }]
            },
            tmp: {
                files: [{
                    dot: true,
                    src: [
                        '.tmp'
                    ]
                }]
            }
        },

        // Compiles Sass to CSS and generates necessary files if requested
        sass: {
            options: {
                includePaths: [
                    '<%= config.app %>/components'
                ],
                sourceMap: false,
                outputStyle: 'nested'
            },
            serve: {
                files: [{
                    expand: true,
                    cwd: '<%= config.app %>/sass',
                    src: ['**/*.scss'],
                    dest: '.tmp/css',
                    ext: '.css'
                }]
            }
        },

        // Add vendor prefixed styles
        autoprefixer: {
            serve: {
                options: {
                    browsers: ['> 1%', 'last 2 versions', 'Firefox ESR', 'Opera 12.1']
                },
                files: [{
                    expand: true,
                    cwd: '.tmp/css/',
                    src: '**/*.css',
                    dest: '<%= config.app %>/css',
                }]
            },
        },

        // Sprite
        sprite: {
            all: {
                src: '<%= config.app %>/img/sprite/*.png',
                destImg: '<%= config.app %>/img/sprite.' + timestamp +'.png',
                destCSS: '<%= config.app %>/sass/general/_sprites.scss',
                imgPath: '../img/sprite.' + timestamp +'.png',
                algorithm: 'binary-tree',
                cssFormat: 'css',
                padding: 20,
                cssOpts: {
                    // Some templates allow for skipping of function declarations
                    'functions': false,

                    // CSS template allows for overriding of CSS selectors
                    'cssClass': function (item) {
                        return '.sprite-' + item.name;
                    }
                },
                cssVarMap: function(sprite) {
                  sprite.name = sprite.name.replace(/\s/, '_');
                  sprite.name = sprite.name.replace('-hover', ':hover');
                }
            }
        }

        // By default, your `index.html`'s <!-- Usemin block --> will take care of
        // minification. These next options are pre-configured if you do not wish
        // to use the Usemin blocks.
        // cssmin: {
        //     dist: {
        //         files: {
        //             '<%= config.dist %>/styles/main.css': [
        //                 '.tmp/styles/{,*/}*.css',
        //                 '<%= config.app %>/styles/{,*/}*.css'
        //             ]
        //         }
        //     }
        // },
        // uglify: {
        //     dist: {
        //         files: {
        //             '<%= config.dist %>/scripts/scripts.js': [
        //                 '<%= config.dist %>/scripts/scripts.js'
        //             ]
        //         }
        //     }
        // },
        // concat: {
        //     dist: {}
        // },
    });

    grunt.registerTask('serve', function (target) {
        grunt.task.run([
            'clean:serve',
            'sass',
            'autoprefixer',
            'connect:livereload',
            'watch'
        ]);
    });

    grunt.registerTask('build', function (target) {
        grunt.task.run([
            'clean:dist',
            'concurrent:dist',
            'autoprefixer:serve',
            'autoprefixer:serve_modules',
            'cssmin',
            'clean:tmp'
        ]);
    });
};