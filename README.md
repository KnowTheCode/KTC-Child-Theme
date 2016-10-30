# Know the Code Child Theme

This [Genesis-powered](http://www.studiopress.com/features/) child theme is for [Know the Code](https://KnowTheCode.io).  It handles serving up the styling and HTML markup for the site.  It's modular, Sass-ified, and [gulp](https://knowthecode.io/labs/part-3a-automating-tasks-gulp) running.  It serves up a minified version of the stylesheet to keep the assets lean and mean.  And it uses Bourbon and Neat just for fun.  

Want to build your own Genesis starter theme? No problem.  We have a [hands-on lab](https://knowthecode.io/labs-guide/lets-build-custom-developers-genesis-starter-child-theme) that walks you through the process step-by-step.  Go build your own and save yourself a ton of time and money. 

## Dependencies

This child theme is dependent upon the following:

1. The [Genesis](http://www.studiopress.com/features/) theming framework from [StudioPress](http://www.studiopress.com).

### Optional dependency plugins

This theme uses [Fulcrum](https://github.com/hellofromtonya/Fulcrum) and [Help Center](https://github.com/KnowTheCode/Must-Use/tree/master/help-center) plugins. Why? Fulcrum gives us some functions such as login page stylesheet handler, development environment, and parent-child.  The Help Center is specific to Know the Code.

Depending upon your project, you may want Fulcrum.  Typically though, you do not need these plugins.  The theme includes a checker to determine if these are loaded.  If no, it loads a dependency helper file.

## Instructions to install:

1. Open up terminal and navigate to the `themes` folder.
2. Then type: `git clone https://github.com/KnowTheCode/KTC-Child-Theme`
3. Change the folder name to `ktc`
4. Navigate into the new folder `cd ktc`
5. It will now run.

## Sass Files

To make styling changes, navigate to `assets/sass`.  There you will find each of the partial files which contain the CSS styling.

The variables are setup for our color scheme.  Therefore, you want to use the variables found in the `utilities/variables/_variables.scss` file.  For example, let's say that you want the background-color to be our branding green color.  You would use `$green` as the color.  This variable holds the hex color.

## Gulp and Sass

When you are actively making styling changes, you need to convert the Sass files into a compressed CSS file.  The first step is to make sure that you have all of the node modules installed, i.e. that are defined in the `package.json` file.  To install, you will need npm and node installed in your machine.  [Automating Tasks with Gulp](https://knowthecode.io/labs/part-3a-automating-tasks-gulp) walks you through the process.

Once everything is installed, then you type `gulp watch`.  You can now make changes to the Sass files and have them compiled into native CSS.  Two files will be stored in the theme's root directory: `style.css` and `style.min.css`.  The minified version is loaded within the theme as it's more optimized and will download faster to the viewing devices.

## Contributions

All feedback, bug reports, and pull requests are welcome.