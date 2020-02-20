<?php

# =========================
# Contents
#
#  =TYPEWRITER-EFFECT
#
# =========================


Route::get('/', function () {
    return view('welcome');
});

# ==TYPEWRITER-EFFECT==
Route::get('/typewriter-effect',                        'TypewriterEffectController@index');
