module.exports = function(grunt) {
  'use strict';

  // load all grunt tasks
  require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

  grunt.initConfig({

    // SASS
    compass: {
      options: {
        basePath: 'public',
        sassDir: 'sass',
        cssDir: 'css',
        imagesDir: 'img',
        fontsDir: 'fonts',
        importPath: 'public/js/libs',
        relativeAssets: true
      },
      dev: {
        options: {
          debugInfo: true
        }
      }
    },

    // Javascript
    ngmin: {
      expand: true,
      cwd: 'test/src',
      src: [
        'js/app.js',
        'js/controllers/**/*.js',
        'js/models/**/*.js',
        'js/directives/**/*.js',
        'js/services/**/*.js'
      ],
      dest: 'test/generated'
    },

    ngtemplates: {},

    watch: {
      sass: {
        files: 'public/sass/{,*/}*.scss',
        tasks: ['compass']
      },
      scripts: {
        files: ['public/js/{,*/}*.js']
      },
      views: {
        files: ['public/{,*/}*.html']
      },
      options: {
        livereload: true
      }
    }
  });

  grunt.registerTask('default', ['compass:dev', 'watch']);
};