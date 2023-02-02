module.exports = function (grunt) {
	// Project configuration.
	grunt.initConfig({
		sass: {
			dist: {
				options: {
					style: 'compressed',
					sourcemap: 'none',
				},
				files: {
					'public/dist/css/single.css':
						'scss/woocommerce/single/single.scss',
					'public/dist/css/shop.css':
						'scss/woocommerce/shop/shop.scss',
					'public/dist/css/my-wishlist.css':
						'scss/woocommerce/wishlist/my-wishlist.scss',
					'public/dist/css/compare.css':
						'scss/woocommerce/compare/compare.scss',
					'public/dist/admin/message.css': 'scss/admin/message.scss',
					'public/dist/css/quick-view.css':
						'scss/woocommerce/quick-view/quick-view.scss',
					'public/dist/css/multi-step-checkout.css':
						'scss/woocommerce/multi-step-checkout/multi-step-checkout.scss',
				},
			},
		},
		uglify: {
			dist: {
				files: {
					'public/dist/admin/message.js': 'public/js/message.js',
				},
			},
		},
		watch: {
			scss: {
				files: '**/*.scss',
				tasks: ['sass'],
			},
			uglify: {
				files: 'public/js/*.js',
				tasks: ['uglify'],
			},
		},
		compress: {
			main: {
				options: {
					archive: '../shop-press.zip',
				},
				files: [
					{
						src: [
							'Admin/**',
							'public/**',
							'Elementor/**',
							'languages/**',
							'includes/**',
							'Modules/**',
							'vendor/**',
							'shop-press.php',
							'Plugin.php',
							'Settings.php',
							'readme.txt',
						],
						filter: function (filepath) {
							return (
								grunt.file.isFile(filepath) &&
								filepath.indexOf('node_modules') < 0 &&
								filepath.indexOf('yarn.lock') < 0 &&
								filepath.indexOf('package.json') < 0 &&
								filepath.indexOf('.gitignore') < 0 &&
								filepath.indexOf('Admin/App/src') < 0 &&
								filepath.indexOf('Admin/App/public') < 0 &&
								filepath.indexOf('package-lock.json') < 0
							);
						},
						dest: '/shop-press',
					},
				],
			},
		},
	});

	// Load the plugins.
	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-compress');
	grunt.loadNpmTasks('grunt-contrib-uglify');

	// Default task(s).
	grunt.registerTask('default', ['sass', 'uglify']);

	// Package task(s).
	grunt.registerTask('package', ['sass', 'uglify', 'compress']);
};
