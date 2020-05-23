<?php

Route::get('/{any}', 'HomeController@index')->where('any', '.*');
