// 包装函数
module.exports = function(grunt) {

  // 任务配置
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    connect: {
      all: {
        options: {
          port: 9001,
          base: __dirname,
          //directory: 'web',
          hostname: '*',
          //keepalive: true,
          debug: true,
          middleware: function(connect) {
            return [
              require('json-proxy').initialize({
                proxy: {
                  forward: {
                    // '/api': 'http://mobile.hunantv.com/',
                    // '/video': 'http://mobile.hunantv.com/',
                    // '/Search': 'http://mobile.hunantv.com/'
                  },
                  headers: {
                    'Host': 'mobile.hunantv.com',
                    'Origin': 'http://mobile.hunantv.com',
                    'X-Requested-With': 'XMLHttpRequest',
                    'Content-Type': 'application/json'
                  }
                }
              }),
              require('connect-livereload')(),
              connect.static(__dirname)
            ]
          }
        }
      }
    },
    watch: {
      options: {
        livereload: true
      },
      scripts: {
        files: ['*.php', '*.html', 'template/*.html', 'js/**/*.js', 'css/*.css', 'less/*.less'],
        tasks: ['less:all','concat:all', 'uglify'],
        options: {
          spawn: false,
        },
      },
    },
    concat: {
      all: {
        files: [{
          src: ['js/lib/jquery.min.js', 'js/lib/angular.min.js', 'js/lib/angular-route.min.js', 'js/lib/app.js', 'js/lib/bootstrap.min.js'],
          dest: 'js/lib/lib.js'
        }, {
          src: ['js/controller/*', '!js/controller/c.js'],
          dest: 'js/controller/c.js'
        }, {
          src: ['js/directive/*', '!js/directive/d.js'],
          dest: 'js/directive/d.js'
        }, {
          src: ['js/service/*', '!js/service/s.js'],
          dest: 'js/service/s.js'
        }, {
          src: ['css/*', '!css/css.css'],
          dest: 'css/css.css'
        }]
      }
    },
    less: {
      all: {
        options: {
          paths: ["css"],
          cleancss: true,
        },
        files: {
          "css/main.css": "less/main.less"
        }
      }
    },
    uglify: {
      options: {
        mangle: false,
        compress: {
          drop_console: false
        }
      },
      my_target: {
        files: {
          'js/controller/c.js': ['js/controller/c.js'],
          'js/lib/lib.js': ['js/lib/lib.js'],
          'js/directive/d.js': ['js/directive/d.js'],
          'js/service/s.js': ['js/service/s.js']
        }
      }
    }
  });

  // 任务加载
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-connect');
  grunt.loadNpmTasks('grunt-contrib-less');

  // 自定义任务
  grunt.registerTask('default', ['connect:all', 'watch']);
  grunt.registerTask('build', ['watch']);

};
