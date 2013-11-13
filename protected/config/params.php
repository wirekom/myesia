<?php

// this contains the application parameters that can be maintained via GUI
return array(
    // this is displayed in the header section
    'title' => 'BAKRIE TELCOM',
    // this is used in error pages
    'adminEmail' => 'webmaster@wirekom.co.id',
    // the copyright information displayed in the footer section
    'copyrightInfo' => 'Copyright &copy; 2013 by WIREKOM.',
    'toolbar_editor' => array(
        array('Styles', 'Format', 'Font', 'FontSize',),
        array('Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo',),
        array('Image', 'Table', 'SpecialChar', 'HorizontalRule',),
        array('Link', 'Unlink', 'Anchor',),
        array('Maximize',),
        array('About',), '/',
        array('Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat',),
        array('NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl',),
    ),
    'uploads' => '/uploads/',
    'uploads_pictures' => '/uploads/pictures/',
    'uploads_videos' => '/uploads/videos/',
    'uploads_documents' => '/uploads/documents/'
);
