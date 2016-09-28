/**
 * config.js - Configures the gulp tasks
 *
 * You will want to configure up the folder structures and theme settings.
 *
 * @package     KnowTheCodeGulp
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */

module.exports = function ( themeRoot ) {

	var themeSettings = {
		package: 'ktc',
		domain: 'knowthecode.dev',
		i18n: {
			textdomain: 'ktc',
			languageFilename: 'ktc.pot',
			bugReport: 'https://knowthecode.io',
			lastTranslator: 'John Doe <hello@knowthecode.io>',
			team: 'Team <hello@knowthecode.io>'
		}
	};


	/************************************
	 * Folder Structure
	 ***********************************/

	/**
	 * Assets folder - path to the location of all the assets,
	 * i.e. images, Sass, scripts, styles, etc.
	 *
	 * @type {String}
	 */
	var assetsDir = themeRoot + 'assets/';

	/**
	 * gulp folder - path to where the gulp utils and
	 * tasks are located.
	 *
	 * @type {String}
	 */
	var gulpDir = assetsDir + 'gulp/';

	/**
	 * Distribution folder - path to where the final build, distribution
	 * files will be located.
	 *
	 * @type {String}
	 */
	var distDir = assetsDir + 'dist/';

	/**
	 * Assets folder - path to where the raw files are located.
	 *
	 * @type {Object}
	 */
	var assetDirs = {
		css: assetsDir + 'css/',
		fonts: assetsDir + 'fonts/',
		icons: assetsDir + 'icons/',
		images: assetsDir + 'images/',
		sass: assetsDir + 'sass/',
		scripts: assetsDir + 'js/'
	}

	/**
	 * Paths
	 *
	 * @type {Object}
	 */
	var paths = {
		css: ['./*.css', '!*.min.css'],
		icons: assetDirs.images + 'svg-icons/*.svg',
		images: [ assetDirs.images + '*', '!' + assetDirs.images + '*.svg' ],
		php: [ themeRoot + '*.php', themeRoot + '**/*.php'],
		sass: assetDirs.sass + '**/*.scss',
		concatScripts: assetDirs.scripts + 'concat/*.js',
		scripts: [ assetDirs.scripts + '*.js', '!' + assetDirs.scripts + '*.min.js', '!' + assetDirs.scripts + 'customizer.js' ],
		sprites: assetDirs.images + 'sprites/*.png'
	};

	/**
	 * Distribution folder - path to where the final build, distribution
	 * files will be located.
	 *
	 * @type {Object}
	 */
	var distDirs = {
		root: themeRoot,
		css: distDir + 'css/',
		scripts: distDir + 'js/'
	};

	/************************************
	 * Theme Settings
	 ***********************************/

	var stylesSettings = {
		clean: {
			src : [ distDirs.css + "*.*", themeRoot + "style.css", themeRoot + "style.min.css" ]
		},
		postcss: {
			src: [ assetDirs.sass + '*.scss' ],
			dest: distDirs.css,
			autoprefixer: {
				browsers: [
					'last 2 versions',
					'ie 9',
					'ios 6',
					'android 4'
				]
			}
		},
		cssnano: {
			src: distDirs.css + "*.css",
			dest: distDirs.css,
		},
		cssfinalize: {
			run: false,
			src: [ distDirs.css + "style.css", distDirs.css + "style.min.css" ],
			dest: themeRoot
		}
	};

	var scriptsSettings = {
		clean: {
			src : [ distDirs.scripts + "*.*" ]
		},
		concat: {
			src: assetDirs.scripts + 'concat/*.js',
			dest: distDirs.scripts,
			concatSrc: 'jquery.project.js',
		},
		uglify: {
			src: distDirs.scripts,
			dest: distDirs.scripts,
		}
	};
	
	var i18nSettings = {
		clean: {
			src : [ themeRoot + "languages/" + themeSettings.i18n.languageFilename ]
		},
		pot: {
			src: paths.php,
			wppot: {
				domain: themeSettings.i18n.textdomain,
				destFile: themeSettings.i18n.languageFilename,
				package: themeSettings.package,
				bugReport: themeSettings.i18n.bugReport,
				lastTranslator: themeSettings.i18n.lastTranslator,
				team: themeSettings.i18n.team
			},
			dest: themeRoot + "languages/"
		}
	}
	
	var iconsSettings = {
		clean: {
			src : [ assetDirs.images + "svg-icons.svg" ]
		},
		svg: {
			src: paths.icons,
			desc: assetDirs.images
		}
	}

	var spriteSettings = {
		clean: {
			src : [ assetDirs.images + "sprites.png" ]
		},
		spritesmith: {
			src: paths.sprites,
			dest: assetDirs.images
		}
	}

	var imageminSettings = {
		src: paths.images,
		dest: assetDirs.images
	}

	var watchSettings = {
		browserSync:	{
			open: false,             // Open project in a new tab?
			injectChanges: true,     // Auto inject changes instead of full reload
			proxy: themeSettings.domain,  // Use http://domainname.tld:3000 to use BrowserSync
			watchOptions: {
				debounceDelay: 1000  // Wait 1 second before injecting
			}
		}
	}


	/************************************
	 * Do not touch below this line.
	 *
	 * The following code assembles up the
	 * configuration object that is returned
	 * to gulpfile.js.
	 ***********************************/

	return {
		themeRoot: themeRoot,
		assetsDir: assetsDir,
		assetDirs: assetDirs,
		dist: distDirs,
		distDir: distDir,
		gulpDir: gulpDir,
		paths: paths,

		i18n: i18nSettings,
		icons: iconsSettings,
		images: imageminSettings,
		scripts: scriptsSettings,
		sprites: spriteSettings,
		styles: stylesSettings,
		watch: watchSettings
	};
};