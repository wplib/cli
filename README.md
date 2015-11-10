# WPLib CLI
A command-line scaffolding tool for WPLib

Version 0.1.1

##Purpose
WPLib CLI is intended to be used to generate code to be used with WPLib for fast implementations of WordPress websites that use WPLib.

##Approach
WPLib CLI looks for a `wplib.json` file in the current directory and if found loads it and generates code that is indicated by the values in the file.  

There are four (4) different types of `wplib.json` files, only two of which are currently implemented.  You can see examples of each by clicking the links below:

Types|Notes
---|---
**Root**| See [`sample/wplib.json`](sample/wplib.json)
**Site**| See [`sample/www/wplib.json`](sample/www/wplib.json) _This is not used yet._
**App**| See  [`sample/www/wp-content/mu-plugins/sample-app/wplib.json`](sample/www/wp-content/mu-plugins/sample-app/wplib.json)
**Theme**| See  [`sample/www/wp-content/themes/sample-app/wplib.json`](sample/www/wp-content/themes/sample-app/wplib.json)  _This is not used yet._

##Dependencies

This project uses [JSON Loader](http://github.com/wplib/json-loader), also by the WPLib Team.

##Backward Compatibility

Since we are still in alpha phase we reserve the right to change anything about this tool and especially the format of the `wlib.json` file.

##Limitations

Currently this is known not to work with Windows.

##License

GPL v2.0+


