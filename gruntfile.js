module.exports = function(grunt) {

    var baseDir = "web/";
    var source = baseDir + "source/";
    var assets = baseDir + "assets/";

    var javascript = {
        libraries: [        
            //source + "js/libraries/utilities.js"
        ],
        theme: [
            //Global Files
            source + "js/global/*.js",

            //Page Specific Files
            source + "js/pages/*.js",

            //Main is last, and should initialize the site
            source + "js/main.js"
        ],
        all: []
    };

    Array.prototype.push.apply(javascript.all,javascript.libraries);
    Array.prototype.push.apply(javascript.all,javascript.theme);

    grunt.initConfig({

            pkg: grunt.file.readJSON('package.json'),
            // This is where we configure JSHint
            jshint: {
                all: {
                    src: javascript.theme,
                    options: {
                        bitwise: true,
                        camelcase: false,
                        curly: true,
                        eqeqeq: true,
                        forin: true,
                        immed: true,
                        indent: 4,
                        latedef: false,
                        newcap: false,
                        noarg: true,
                        noempty: true,
                        nonew: true,
                        regexp: true,
                        undef: false,
                        unused: false,
                        trailing: true
                    },
                   
                }
            },
            
            concat: {
                options: {

                    process: function(src, filepath) {
                            return '\n\n// file: ' + filepath + '\n\n' + src + ';';
                        }
                },
                dist: {
                    src: javascript.all,
                    dest: assets + "scripts.js",
                },
            },

            uglify: {
                options: {
                    mangle: false,
                    preserveComments: 'some'
                },
                my_target: {
                    files: (function() {
                        var files = {};
                        files[assets + "scripts.min.js"] = [assets + "scripts.js"];
                        return files;
                    })()
                }
            },

            less: {
                development: {
                    options: {
                        compress: true,
                        yuicompress: true,
                        optimization: 2
                    },
                    files: (function() {
                        var files = {};
                        files[assets + "/css/styles.min.css"] = source + "less/main.less";
                        return files;
                    })()
                }
            },


            watch: {
                styles: {
                    files: [source + 'less/**/*.less'], // which files to watch
                    tasks: ['less'],
                    options: {
                        nospawn: true
                    }
                },
                js: {
                    files: [source + 'js/**/*.js'],
                    tasks: ['concat', 'uglify']
                }

            }
        });

grunt.loadNpmTasks('grunt-contrib-less');
grunt.loadNpmTasks('grunt-contrib-watch');
grunt.loadNpmTasks('grunt-contrib-jshint');
grunt.loadNpmTasks('grunt-contrib-concat');
grunt.loadNpmTasks('grunt-contrib-uglify');

grunt.registerTask('default', ['watch']);
};