<?php
    defined('MY_CMS') or die('Permission denied');

    if (WEBSITE_LANG == 'es') {
        include_once TRANSLATION_ES_PATH;
    } elseif (WEBSITE_LANG == 'cat') {
        include_once TRANSLATION_CAT_PATH;
    } elseif (WEBSITE_LANG == 'en') {
        include_once TRANSLATION_GB_PATH;
    } elseif (WEBSITE_LANG == 'fr') {
        include_once TRANSLATION_FR_PATH;
    }