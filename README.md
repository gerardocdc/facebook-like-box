Facebook Like Box Widget
========================

Purpose
-------
Creates a widget of Facebook's Like Box plugin.
http://developers.facebook.com/docs/reference/plugins/like-box/

Configuration
-------------
No previous configuration required.

Usage
-----
	$facebookLikeBox = new FacebookLikeBox();
	$facebookLikeBox->setHref("http://www.facebook.com/my.account.name");
	$facebookLikeBox->render();

Optional configuration:

* Width:   $facebookLikeBox->setWidth(111);
* Height:   $facebookLikeBox->setHeight(111);
* Color scheme (light,dark):        $facebookLikeBox->setColorScheme('light');
* Show profile photos (true,false): $facebookLikeBox->setShowFaces(true);
* Display stream (true,false):      $facebookLikeBox->setStream(true);
* Display header (true,false):      $facebookLikeBox->setHeader(true);
* Border color (color en hex code): $facebookLikeBox->setBorderColor('000000');
* Stream with post from Place's wall (true,false):  $facebookLikeBox->setForceWall(false);

Copyright
---------
Creative Commons CC-BY-SA License (http://creativecommons.org/licenses/by-sa/3.0/)

Copyright (c) 2012-3 Diaz-Caneja Consultores

Contact
--------
Gerardo Colorado Diaz-Caneja   gcdiazcaneja@diaz-caneja-consultores.com

Github: https://github.com/gerardocdc/facebook-like-box (feel free to contribute)