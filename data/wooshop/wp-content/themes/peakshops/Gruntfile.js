'use strict';
module.exports = function(grunt) {

  grunt.initConfig({
			theme_slugname: 'peakshops',
      // let us know if our JS is sound
      jshint: {
	      options: {
          "bitwise": true,
          "browser": true,
          "curly": true,
          "eqeqeq": true,
          "eqnull": true,
          "immed": true,
          "jquery": true,
          "latedef": true,
          "newcap": true,
          "noarg": true,
          "node": true,
          "strict": false,
          "undef": false,
					"esversion": 8
	      },
	      all: [
	        'Gruntfile.js',
	        'assets/js/plugins/app.js',
	        'assets/js/plugins/admin-meta.js',
	        'assets/js/plugins/admin-vc.js',
          'assets/js/vendor/jquery.hotspot.js'
	      ]
      },

      // concatenation and minification all in one
      uglify: {
	      dist: {
	        files: {
	        	'assets/js/admin-vc.min.js': [
	        		'assets/js/plugins/admin-vc.js'
	        	],
						'assets/js/admin-meta.min.js': [
							'assets/js/plugins/admin-meta.js'
						],
						'assets/js/vendor.min.js': [
							'assets/js/vendor/*.js'
						],
						'assets/js/app.min.js': [
							'assets/js/plugins/app.js'
						]
	        }
	      }
      },

			concat: {
				options: {
					stripBanners: true
				},
				dist: {
					src: 'assets/js/vendor/*.js',
					dest: 'assets/js/vendor.min.js',
				},
			},

      // style (Sass) compilation via Compass
      compass: {
        options: {
          importPath: ['node_modules/foundation-sites/scss'],
          raw: "Sass::Script::Number.precision = 6\n"
        },
        dist: {
          options: {
            sassDir: 'assets/sass',
            cssDir: 'assets/css',
						noLineComments: true,
						outputStyle: 'compressed'
          }
        },
				dev: {
					options: {
						sassDir: 'assets/sass',
						cssDir: 'assets/css',
						noLineComments: true,
						outputStyle: 'expanded'
					}
				}
      },

      // watch our project for changes
      watch: {
	      scss: {
          files: [
            'assets/sass/*',
            'assets/sass/*/*'
          ],
          tasks: ['compass:dist']
	      },
	      js: {
          files: [
              '<%= jshint.all %>'
          ],
          tasks: ['uglify']
	      }
      },
      // copy folder
      copy: {
        main: {
          expand: true,
          src: ['**', '!**/node_modules/**'],
          dest: '/Users/anteksiler/Desktop/themeforest/<%= theme_slugname %>/<%= theme_slugname %>',
        },
      },

      // clean folder
      clean: {
      	options: {
    	    'force': true
    	  },
				dest: [
					'/Users/anteksiler/Desktop/themeforest/<%= theme_slugname %>/<%= theme_slugname %>/**/*',
				],
        build: [
        	'/Users/anteksiler/Desktop/themeforest/<%= theme_slugname %>/<%= theme_slugname %>/**/.git',
        	'/Users/anteksiler/Desktop/themeforest/<%= theme_slugname %>/<%= theme_slugname %>/**/.gitignore',
        	'/Users/anteksiler/Desktop/themeforest/<%= theme_slugname %>/<%= theme_slugname %>/**/.sass-cache',
        	'/Users/anteksiler/Desktop/themeforest/<%= theme_slugname %>/<%= theme_slugname %>/<%= theme_slugname %>-wp.esproj',
        	'/Users/anteksiler/Desktop/themeforest/<%= theme_slugname %>/<%= theme_slugname %>/**/.DS_Store',
        	'/Users/anteksiler/Desktop/themeforest/<%= theme_slugname %>/<%= theme_slugname %>/node_modules',
        	'/Users/anteksiler/Desktop/themeforest/<%= theme_slugname %>/<%= theme_slugname %>/assets/demo',
        	'/Users/anteksiler/Desktop/themeforest/<%= theme_slugname %>/<%= theme_slugname %>/admin/assets/theme-mode',
        	'/Users/anteksiler/Desktop/themeforest/<%= theme_slugname %>/<%= theme_slugname %>/inc/plugins/<%= theme_slugname %>-plugin',
        	'/Users/anteksiler/Desktop/themeforest/<%= theme_slugname %>/<%= theme_slugname %>/inc/admin/imports/one-click-demo-import/docs',
        	'/Users/anteksiler/Desktop/themeforest/<%= theme_slugname %>/<%= theme_slugname %>/inc/admin/imports/one-click-demo-import/tests',
					'/Users/anteksiler/Desktop/themeforest/<%= theme_slugname %>/<%= theme_slugname %>/vendor',
					'/Users/anteksiler/Desktop/themeforest/<%= theme_slugname %>/<%= theme_slugname %>/package-lock.json',
					'/Users/anteksiler/Desktop/themeforest/<%= theme_slugname %>/<%= theme_slugname %>/composer.lock'
        ],
      },

      // Check textdomain errors.
  		checktextdomain: {
  			options:{
  				text_domain: 'peakshops',
  				keywords: [
  					'__:1,2d',
  					'_e:1,2d',
  					'_x:1,2c,3d',
  					'esc_html__:1,2d',
  					'esc_html_e:1,2d',
  					'esc_html_x:1,2c,3d',
  					'esc_attr__:1,2d',
  					'esc_attr_e:1,2d',
  					'esc_attr_x:1,2c,3d',
  					'_ex:1,2c,3d',
  					'_n:1,2,4d',
  					'_nx:1,2,4c,5d',
  					'_n_noop:1,2,3d',
  					'_nx_noop:1,2,3c,4d'
  				]
  			},
  			theme: {
  				src: [
  					'**/*.php',
  					'!node_modules/**',
            '!inc/admin/plugins/class-tgm-plugin-activation.php',
            '!woocommerce/**',
						'!vendor/**',
						'!dokan/**'
  				],
  				expand: true
  			}
  		},

			// Compress
			compress: {
				plugin: {
				  options: {
				    archive: '/Users/anteksiler/Desktop/themeforest/<%= theme_slugname %>/<%= theme_slugname %>/inc/plugins/<%= theme_slugname %>-plugin.zip'
				  },
				  files: [
				    {
				    	expand: true,
				    	cwd: '/Users/anteksiler/Desktop/themeforest/<%= theme_slugname %>/<%= theme_slugname %>/inc/plugins/',
				    	src: ['<%= theme_slugname %>-plugin/**/*']
				    }
				  ]
				},
			  theme: {
			    options: {
			      archive: '/Users/anteksiler/Desktop/themeforest/<%= theme_slugname %>/<%= theme_slugname %>.zip'
			    },
			    files: [
			      {
			      	expand: true,
			      	cwd: '/Users/anteksiler/Desktop/themeforest/<%= theme_slugname %>/',
			      	src: ['<%= theme_slugname %>/**/*']
			      }
			    ]
			  },
			  all_files: {
			    options: {
			      archive: '/Users/anteksiler/Desktop/themeforest/<%= theme_slugname %>/<%= theme_slugname %>-all.zip'
			    },
			    files: [
			      {
			      	expand: true,
			      	cwd: '/Users/anteksiler/Desktop/themeforest/<%= theme_slugname %>/',
			        src: [
			          '<%= theme_slugname %>.zip',
			          '<%= theme_slugname %>-child.zip',
			          'PSD.zip',
			          'Plugins.zip',
			          'Documentation.zip',
			          'icon-reference.zip'
			        ]
			      },
			    ]
			  }
			}
  });

  // load tasks
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-compass');
  grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-strip-code');
	grunt.loadNpmTasks('grunt-contrib-copy');
	grunt.loadNpmTasks('grunt-contrib-clean');
	grunt.loadNpmTasks('grunt-contrib-compress');
  grunt.loadNpmTasks('grunt-checktextdomain');

  // register task
  grunt.registerTask('default', [
    'jshint',
    'compass:dev'
  ]);

	grunt.registerTask('release', [
    'jshint',
    'compass:dist',
    'uglify',
    'watch'
  ]);

  grunt.registerTask('pack', [
    'checktextdomain:theme',
		'clean:dest',
  	'copy',
  	'compress:plugin',
  	'clean:build',
  	'compress:theme',
  	'compress:all_files'
  ]);
};