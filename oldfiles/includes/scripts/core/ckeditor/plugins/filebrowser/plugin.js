 ﻿/*
  2 Copyright (c) 2003-2011, CKSource - Frederico Knabben. All rights reserved.
  3 For licensing, see LICENSE.html or http://ckeditor.com/license
  4 */
   /**
  7  * @fileOverview The "filebrowser" plugin, it adds support for file uploads and
  8  *               browsing.
  9  *
 10  * When file is selected inside of the file browser or uploaded, its url is
 11  * inserted automatically to a field, which is described in the 'filebrowser'
 12  * attribute. To specify field that should be updated, pass the tab id and
 13  * element id, separated with a colon.
 14  *
 15  * Example 1: (Browse)
 16  *
 17  * <pre>
 18  * {
 19  * 	type : 'button',
 20  * 	id : 'browse',
 21  * 	filebrowser : 'tabId:elementId',
 22  * 	label : editor.lang.common.browseServer
 23  * }
 24  * </pre>
 25  *
 26  * If you set the 'filebrowser' attribute on any element other than
 27  * 'fileButton', the 'Browse' action will be triggered.
 28  *
 29  * Example 2: (Quick Upload)
 30  *
 31  * <pre>
 32  * {
 33  * 	type : 'fileButton',
 34  * 	id : 'uploadButton',
 35  * 	filebrowser : 'tabId:elementId',
 36  * 	label : editor.lang.common.uploadSubmit,
 37  * 	'for' : [ 'upload', 'upload' ]
 38  * }
 39  * </pre>
 40  *
 41  * If you set the 'filebrowser' attribute on a fileButton element, the
 42  * 'QuickUpload' action will be executed.
 43  *
 44  * Filebrowser plugin also supports more advanced configuration (through
 45  * javascript object).
 46  *
 47  * The following settings are supported:
 48  *
 49  * <pre>
 50  *  [action] - Browse or QuickUpload
 51  *  [target] - field to update, tabId:elementId
 52  *  [params] - additional arguments to be passed to the server connector (optional)
 53  *  [onSelect] - function to execute when file is selected/uploaded (optional)
 54  *  [url] - the URL to be called (optional)
 55  * </pre>
 56  *
 57  * Example 3: (Quick Upload)
 58  *
 59  * <pre>
 60  * {
 61  * 	type : 'fileButton',
 62  * 	label : editor.lang.common.uploadSubmit,
 63  * 	id : 'buttonId',
 64  * 	filebrowser :
 65  * 	{
 66  * 		action : 'QuickUpload', //required
 67  * 		target : 'tab1:elementId', //required
 68  * 		params : //optional
 69  * 		{
 70  * 			type : 'Files',
 71  * 			currentFolder : '/folder/'
 72  * 		},
 73  * 		onSelect : function( fileUrl, errorMessage ) //optional
 74  * 		{
 75  * 			// Do not call the built-in selectFuntion
 76  * 			// return false;
 77  * 		}
 78  * 	},
 79  * 	'for' : [ 'tab1', 'myFile' ]
 80  * }
 81  * </pre>
 82  *
 83  * Suppose we have a file element with id 'myFile', text field with id
 84  * 'elementId' and a fileButton. If filebowser.url is not specified explicitly,
 85  * form action will be set to 'filebrowser[DialogName]UploadUrl' or, if not
 86  * specified, to 'filebrowserUploadUrl'. Additional parameters from 'params'
 87  * object will be added to the query string. It is possible to create your own
 88  * uploadHandler and cancel the built-in updateTargetElement command.
 89  *
 90  * Example 4: (Browse)
 91  *
 92  * <pre>
 93  * {
 94  * 	type : 'button',
 95  * 	id : 'buttonId',
 96  * 	label : editor.lang.common.browseServer,
 97  * 	filebrowser :
 98  * 	{
 99  * 		action : 'Browse',
100  * 		url : '/ckfinder/ckfinder.html&type=Images',
101  * 		target : 'tab1:elementId'
102  * 	}
103  * }
104  * </pre>
105  *
106  * In this example, after pressing a button, file browser will be opened in a
107  * popup. If we don't specify filebrowser.url attribute,
108  * 'filebrowser[DialogName]BrowseUrl' or 'filebrowserBrowseUrl' will be used.
109  * After selecting a file in a file browser, an element with id 'elementId' will
110  * be updated. Just like in the third example, a custom 'onSelect' function may be
111  * defined.
112  */
 ( function()
 {
 	/*
116 	 * Adds (additional) arguments to given url.
117 	 *
118 	 * @param {String}
119 	 *            url The url.
120 	 * @param {Object}
121 	 *            params Additional parameters.
122 	 */
 	function addQueryString( url, params )
 	{
 		var queryString = [];
 
 		if ( !params )
 			return url;
 		else
 		{
 			for ( var i in params )
 				queryString.push( i + "=" + encodeURIComponent( params[ i ] ) );
 		}
 
 		return url + ( ( url.indexOf( "?" ) != -1 ) ? "&" : "?" ) + queryString.join( "&" );
 	}
 
 	/*
139 	 * Make a string's first character uppercase.
140 	 *
141 	 * @param {String}
142 	 *            str String.
143 	 */
 	function ucFirst( str )
 	{
 		str += '';
 		var f = str.charAt( 0 ).toUpperCase();
 		return f + str.substr( 1 );
 	}
 
 	/*
152 	 * The onlick function assigned to the 'Browse Server' button. Opens the
153 	 * file browser and updates target field when file is selected.
154 	 *
155 	 * @param {CKEDITOR.event}
156 	 *            evt The event object.
157 	 */
 	function browseServer( evt )
 	{
 		var dialog = this.getDialog();
 		var editor = dialog.getParentEditor();
 
 		editor._.filebrowserSe = this;
 
 		var width = editor.config[ 'filebrowser' + ucFirst( dialog.getName() ) + 'WindowWidth' ]
 				|| editor.config.filebrowserWindowWidth || '80%';
 		var height = editor.config[ 'filebrowser' + ucFirst( dialog.getName() ) + 'WindowHeight' ]
 				|| editor.config.filebrowserWindowHeight || '70%';
 
 		var params = this.filebrowser.params || {};
 		params.CKEditor = editor.name;
 		params.CKEditorFuncNum = editor._.filebrowserFn;
 		if ( !params.langCode )
 			params.langCode = editor.langCode;
 
 		var url = addQueryString( this.filebrowser.url, params );
 		editor.popup( url, width, height, editor.config.fileBrowserWindowFeatures );
 	}
 
 	/*
181 	 * The onlick function assigned to the 'Upload' button. Makes the final
182 	 * decision whether form is really submitted and updates target field when
183 	 * file is uploaded.
184 	 *
185 	 * @param {CKEDITOR.event}
186 	 *            evt The event object.
187 	 */
 	function uploadFile( evt )
 	{
 		var dialog = this.getDialog();
 		var editor = dialog.getParentEditor();
 
 		editor._.filebrowserSe = this;
 
 		// If user didn't select the file, stop the upload.
 		if ( !dialog.getContentElement( this[ 'for' ][ 0 ], this[ 'for' ][ 1 ] ).getInputElement().$.value )
 			return false;
 
 		if ( !dialog.getContentElement( this[ 'for' ][ 0 ], this[ 'for' ][ 1 ] ).getAction() )
 			return false;
 
 		return true;
 	}
 
 	/*
206 	 * Setups the file element.
207 	 *
208 	 * @param {CKEDITOR.ui.dialog.file}
209 	 *            fileInput The file element used during file upload.
210 	 * @param {Object}
211 	 *            filebrowser Object containing filebrowser settings assigned to
212 	 *            the fileButton associated with this file element.
213 	 */
 	function setupFileElement( editor, fileInput, filebrowser )
 	{
 		var params = filebrowser.params || {};
 		params.CKEditor = editor.name;
 		params.CKEditorFuncNum = editor._.filebrowserFn;
 		if ( !params.langCode )
 			params.langCode = editor.langCode;
 
 		fileInput.action = addQueryString( filebrowser.url, params );
 		fileInput.filebrowser = filebrowser;
 	}
 
 	/*
227 	 * Traverse through the content definition and attach filebrowser to
228 	 * elements with 'filebrowser' attribute.
229 	 *
230 	 * @param String
231 	 *            dialogName Dialog name.
232 	 * @param {CKEDITOR.dialog.definitionObject}
233 	 *            definition Dialog definition.
234 	 * @param {Array}
235 	 *            elements Array of {@link CKEDITOR.dialog.definition.content}
236 	 *            objects.
237 	 */
 	function attachFileBrowser( editor, dialogName, definition, elements )
 	{
 		var element, fileInput;
 
 		for ( var i in elements )
 		{
 			element = elements[ i ];
 
 			if ( element.type == 'hbox' || element.type == 'vbox' )
 				attachFileBrowser( editor, dialogName, definition, element.children );
 
 			if ( !element.filebrowser )
 				continue;
 
 			if ( typeof element.filebrowser == 'string' )
 			{
 				var fb =
 				{
 					action : ( element.type == 'fileButton' ) ? 'QuickUpload' : 'Browse',
 					target : element.filebrowser
 				};
 				element.filebrowser = fb;
 			}
 
 			if ( element.filebrowser.action == 'Browse' )
 			{
 				var url = element.filebrowser.url;
 				if ( url === undefined )
 				{
 					url = editor.config[ 'filebrowser' + ucFirst( dialogName ) + 'BrowseUrl' ];
 					if ( url === undefined )
 						url = editor.config.filebrowserBrowseUrl;
 				}
 
 				if ( url )
 				{
 					element.onClick = browseServer;
 					element.filebrowser.url = url;
 					element.hidden = false;
 				}
 			}
 			else if ( element.filebrowser.action == 'QuickUpload' && element[ 'for' ] )
 			{
 				url = element.filebrowser.url;
 				if ( url === undefined )
 				{
 					url = editor.config[ 'filebrowser' + ucFirst( dialogName ) + 'UploadUrl' ];
 					if ( url === undefined )
 						url = editor.config.filebrowserUploadUrl;
 				}
 
 				if ( url )
 				{
 					var onClick = element.onClick;
 					element.onClick = function( evt )
 					{
 						// "element" here means the definition object, so we need to find the correct
 						// button to scope the event call
 						var sender = evt.sender;
 						if ( onClick && onClick.call( sender, evt ) === false )
 							return false;
 
 						return uploadFile.call( sender, evt );
 					};
 
 					element.filebrowser.url = url;
 					element.hidden = false;
 					setupFileElement( editor, definition.getContents( element[ 'for' ][ 0 ] ).get( element[ 'for' ][ 1 ] ), element.filebrowser );
 				}
 			}
 		}
 	}
 
 	/*
312 	 * Updates the target element with the url of uploaded/selected file.
313 	 *
314 	 * @param {String}
315 	 *            url The url of a file.
316 	 */
	function updateTargetElement( url, sourceElement )
 	{
 		var dialog = sourceElement.getDialog();
 		var targetElement = sourceElement.filebrowser.target || null;
 		url = url.replace( /#/g, '%23' );
 
 		// If there is a reference to targetElement, update it.
 		if ( targetElement )
 		{
 			var target = targetElement.split( ':' );
 			var element = dialog.getContentElement( target[ 0 ], target[ 1 ] );
 			if ( element )
 			{
 				element.setValue( url );
 				dialog.selectPage( target[ 0 ] );
 			}
 		}
 	}
 
 	/*
337 	 * Returns true if filebrowser is configured in one of the elements.
338 	 *
339 	 * @param {CKEDITOR.dialog.definitionObject}
340 	 *            definition Dialog definition.
341 	 * @param String
342 	 *            tabId The tab id where element(s) can be found.
343 	 * @param String
344 	 *            elementId The element id (or ids, separated with a semicolon) to check.
345 	 */
 	function isConfigured( definition, tabId, elementId )
 	{
 		if ( elementId.indexOf( ";" ) !== -1 )
 		{
			var ids = elementId.split( ";" );
 			for ( var i = 0 ; i < ids.length ; i++ )
 			{
 				if ( isConfigured( definition, tabId, ids[i] ) )
 					return true;
 			}
 			return false;
 		}
 
 		var elementFileBrowser = definition.getContents( tabId ).get( elementId ).filebrowser;
 		return ( elementFileBrowser && elementFileBrowser.url );
 	}
 
 	function setUrl( fileUrl, data )
 	{
 		var dialog = this._.filebrowserSe.getDialog(),
 			targetInput = this._.filebrowserSe[ 'for' ],
 			onSelect = this._.filebrowserSe.filebrowser.onSelect;
 
 		if ( targetInput )
 			dialog.getContentElement( targetInput[ 0 ], targetInput[ 1 ] ).reset();
 
 		if ( typeof data == 'function' && data.call( this._.filebrowserSe ) === false )
 			return;
 
 		if ( onSelect && onSelect.call( this._.filebrowserSe, fileUrl, data ) === false )
 			return;
 
 		// The "data" argument may be used to pass the error message to the editor.
 		if ( typeof data == 'string' && data )
 			alert( data );
 
 		if ( fileUrl )
 			updateTargetElement( fileUrl, this._.filebrowserSe );
 	}
 
 	CKEDITOR.plugins.add( 'filebrowser',
 	{
 		init : function( editor, pluginPath )
 		{
 			editor._.filebrowserFn = CKEDITOR.tools.addFunction( setUrl, editor );
 			editor.on( 'destroy', function () { CKEDITOR.tools.removeFunction( this._.filebrowserFn ); } );
 		}
 	} );
 
 	CKEDITOR.on( 'dialogDefinition', function( evt )
 	{
 		var definition = evt.data.definition,
 			element;
 		// Associate filebrowser to elements with 'filebrowser' attribute.
 		for ( var i in definition.contents )
 		{
 			if ( ( element = definition.contents[ i ] ) )
 			{
 				attachFileBrowser( evt.editor, evt.data.name, definition, element.elements );
 				if ( element.hidden && element.filebrowser )
 				{
 					element.hidden = !isConfigured( definition, element[ 'id' ], element.filebrowser );
 				}
 			}
		}
 	} );
 
 } )();
 
 /**
416  * The location of an external file browser, that should be launched when "Browse Server" button is pressed.
417  * If configured, the "Browse Server" button will appear in Link, Image and Flash dialogs.
418  * @see The <a href="http://docs.cksource.com/CKEditor_3.x/Developers_Guide/File_Browser_(Uploader)">File Browser/Uploader</a> documentation.
419  * @name CKEDITOR.config.filebrowserBrowseUrl
420  * @since 3.0
421  * @type String
422  * @default '' (empty string = disabled)
423  * @example
424  * config.filebrowserBrowseUrl = '/browser/browse.php';
425  */
 
 /**
428  * The location of a script that handles file uploads.
429  * If set, the "Upload" tab will appear in "Link", "Image" and "Flash" dialogs.
430  * @name CKEDITOR.config.filebrowserUploadUrl
431  * @see The <a href="http://docs.cksource.com/CKEditor_3.x/Developers_Guide/File_Browser_(Uploader)">File Browser/Uploader</a> documentation.
432  * @since 3.0
433  * @type String
434  * @default '' (empty string = disabled)
435  * @example
436  * config.filebrowserUploadUrl = '/uploader/upload.php';
437  */
 
 /**
440  * The location of an external file browser, that should be launched when "Browse Server" button is pressed in the Image dialog.
441  * If not set, CKEditor will use {@link CKEDITOR.config.filebrowserBrowseUrl}.
442  * @name CKEDITOR.config.filebrowserImageBrowseUrl
443  * @since 3.0
444  * @type String
445  * @default '' (empty string = disabled)
446  * @example
447  * config.filebrowserImageBrowseUrl = '/browser/browse.php?type=Images';
448  */
 
 /**
451  * The location of an external file browser, that should be launched when "Browse Server" button is pressed in the Flash dialog.
452  * If not set, CKEditor will use {@link CKEDITOR.config.filebrowserBrowseUrl}.
453  * @name CKEDITOR.config.filebrowserFlashBrowseUrl
454  * @since 3.0
455  * @type String
456  * @default '' (empty string = disabled)
457  * @example
458  * config.filebrowserFlashBrowseUrl = '/browser/browse.php?type=Flash';
459  */
 
 /**
462  * The location of a script that handles file uploads in the Image dialog.
463  * If not set, CKEditor will use {@link CKEDITOR.config.filebrowserUploadUrl}.
464  * @name CKEDITOR.config.filebrowserImageUploadUrl
465  * @since 3.0
466  * @type String
467  * @default '' (empty string = disabled)
468  * @example
469  * config.filebrowserImageUploadUrl = '/uploader/upload.php?type=Images';
470  */
 
 /**
473  * The location of a script that handles file uploads in the Flash dialog.
474  * If not set, CKEditor will use {@link CKEDITOR.config.filebrowserUploadUrl}.
475  * @name CKEDITOR.config.filebrowserFlashUploadUrl
476  * @since 3.0
477  * @type String
478  * @default '' (empty string = disabled)
479  * @example
480  * config.filebrowserFlashUploadUrl = '/uploader/upload.php?type=Flash';
481  */
 
 /**
484  * The location of an external file browser, that should be launched when "Browse Server" button is pressed in the Link tab of Image dialog.
485  * If not set, CKEditor will use {@link CKEDITOR.config.filebrowserBrowseUrl}.
486  * @name CKEDITOR.config.filebrowserImageBrowseLinkUrl
487  * @since 3.2
488  * @type String
489  * @default '' (empty string = disabled)
490  * @example
491  * config.filebrowserImageBrowseLinkUrl = '/browser/browse.php';
492  */
 
 /**
495  * The "features" to use in the file browser popup window.
496  * @name CKEDITOR.config.filebrowserWindowFeatures
497  * @since 3.4.1
498  * @type String
499  * @default 'location=no,menubar=no,toolbar=no,dependent=yes,minimizable=no,modal=yes,alwaysRaised=yes,resizable=yes,scrollbars=yes'
500  * @example
501  * config.filebrowserWindowFeatures = 'resizable=yes,scrollbars=no';
502  */
 
 /**
505  * The width of the file browser popup window. It can be a number or a percent string.
506  * @name CKEDITOR.config.filebrowserWindowWidth
507  * @type Number|String
508  * @default '80%'
509  * @example
510  * config.filebrowserWindowWidth = 750;
511  * @example
512  * config.filebrowserWindowWidth = '50%';
513  */
 
 /**
516  * The height of the file browser popup window. It can be a number or a percent string.
517  * @name CKEDITOR.config.filebrowserWindowHeight
518  * @type Number|String
519  * @default '70%'
520  * @example
521  * config.filebrowserWindowHeight = 580;
522  * @example
523  * config.filebrowserWindowHeight = '50%';
524  */
 