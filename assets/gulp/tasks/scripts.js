/**
 * scripts.js - Builds the distribution JavaScript and jQuery files
 *
 * @package     KnowTheCodeGulp
 * @since       1.0.0
 * @author      hellofromTonya <hellofromtonya@knowthecode.io>
 * @link        https://knowthecode.io
 * @license     GNU General Public License 2.0+
 */

'use strict';

module.exports = function ( gulp, plugins, config ) {

	var handleErrors = require( config.gulpDir + 'utils/handleErrors.js' ),
		runSequence = require('run-sequence').use(gulp);

	/**
	 * scripts task which is callable
	 *
	 * Tasks are run synchronously to ensure each step is completed
	 * BEFORE moving on to the next one.  We don't want any race situations.
	 *
	 * @since 1.0.1
	 */
	gulp.task( 'scripts', function ( callback ) {

		runSequence( 'scripts-clean',
			'scripts-minify',
// 			'scripts-finalize',
// 			'scripts-final-clean',
			callback );
	} );


	gulp.task( 'scripts-clean', function () {
		var settings = config.scripts.clean;

		return cleanScripts( settings );
	} );

	gulp.task( 'scripts-build-concat', function () {
		return concatScripts();
	} );

	gulp.task( 'scripts-minify', function () {
		var settings = config.scripts.minify;

		return minifyScripts(settings);
	} );

	gulp.task( 'scripts-finalize', function () {
// 		return stylesFinalize();
	} );

	/*******************
	 * Task functions
	 ******************/

	/**
	 * Delete the .js before we minify and optimize
	 *
	 * @since 1.0.0
	 *
	 * @param settings
	 * @returns {*}
	 */
	function cleanScripts( settings ) {
		plugins.del( settings.src ).then( function () {
			plugins.util.log( plugins.util.colors.bgGreen( 'Scripts are now clean....[cleanScripts()]' ) );
		} );
	};

	/**
	 * Concatentate the scripts into one big butt file
	 *
	 * @since 1.0.0
	 *
	 * @returns {*}
	 */
	function concatScripts() {
		var settings = config.scripts.concat;

		console.log( settings );

		return gulp.src( settings.src )

           // Deal with errors.
           .pipe( plugins.plumber( {errorHandler: handleErrors} ) )

           .pipe( plugins.sourcemaps.init() )
           .pipe( concat( settings.concatSrc ) )
           .pipe( plugins.sourcemaps.write() )

           .pipe( gulp.dest( settings.dest ) ).on( 'end', function () {
				plugins.util.log( plugins.util.colors.bgGreen( 'Scripts concat is now done....[concatScripts()]' ) );
			} )
           .pipe( plugins.browserSync.stream() );
	}
	/**
	 * Minify scripts
	 *
	 * @since 1.0.0
	 */
	function minifyScripts( settings ) {

		return gulp.src( settings.src )
	           // Deal with errors.
	           .pipe( plugins.plumber( {errorHandler: handleErrors} ) )

	           .pipe( plugins.uglify( {
		           mangle: false
	           } ) )
               .pipe( plugins.rename( {suffix: '.min'} ) )
	           .pipe( gulp.dest( settings.dest ) ).on( 'end', function () {
					plugins.util.log( plugins.util.colors.bgGreen( 'Scripts are now minified....[minifyScripts()]' ) );
				} )
	           .pipe( plugins.notify( {message: 'Scripts are built.'} ) );
	};
};