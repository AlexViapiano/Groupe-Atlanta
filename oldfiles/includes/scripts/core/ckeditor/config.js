/*
Copyright (c) 2003-2011, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	config.extraPlugins = 'stylesheetparser';
	config.contentsCss = 'http://www.cliniquedentaireileperrot.ca/includes/templates/css/style_cms.css';
	config.stylesSet = [];	
	config.baseHref = 'http://www.cliniquedentaireileperrot.ca/';
	config.scayt_autoStartup = true;
	config.enterMode = '';
	config.toolbar_block =
	[
		{ name: 'clipboard', items : [ 'Souce', 'Cut','Copy','Paste','PasteText','PasteFromWord'] },
		{ name: 'editing', items : [ 'Scayt' ] },
		{ name: 'insert', items : [ 'Image', 'Table'] },
                '/',
		{ name: 'styles', items : [ 'Styles','Format' ] },
		{ name: 'basicstyles', items : [ 'Bold','Italic','Strike','RemoveFormat' ] },
		{ name: 'paragraph', items : [ 'NumberedList','BulletedList','Outdent','Indent','Blockquote' ] },
		{ name: 'links', items : [ 'Link','Unlink','Anchor' ] }
	];	
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
};
