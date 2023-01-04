<?php
    defined('MY_CMS') or die('Permission denied');

    if (WEBSITE_LANG == 'cat') {
        // CTL_ADMIN
        define('ERROR_CHANGE_LEVEL', "Error canviant el nivell d'usuari");
        define('ERROR_DELETE_USER', "Error al suprimir l'usuari");
        define('ERROR_CANT_CHANGE_YOUR_LEVEL', "No podeu canviar el vostre propi nivell");
        define('ERORR_DELETE_FILE', "Error al suprimir el fitxer");

        // CTL_LOGIN
        define('ERROR_EMPTY_FIELDS', 'No has introduit el nom d\'usuari o la contrasenya');
        define('ERROR_PASSWORD_INCORRECT', 'La contrasenya no és correcta');
        define('ERROR_USER_NOT_FOUND', 'L\'usuari no existeix');

        // CTL_REGISTER
        define('SUCCESS_REGISTER', 'Usuari registrat correctament');
        define('ERROR_TO_REGISTER', 'Error al registrar l\'usuari');
        define('ERROR_PASSWORD_DOSENT_MATCH', 'Les contrasenyes no coincideixen');

        // CTL_POSTS
        define('ERROR_TO_EDIT_POST', 'Error al editar el post');
        define('ERROR_TO_EDIT_CATEGORY', 'Error al editar la categoria');
        define('ERROR_TO_DELETE_POST', 'Error al eliminar el post');
        define('ERROR_TO_DELETE_CATEGORY', 'Error al eliminar la categoria');

        // CTL_REPORTERS
        define('ERROR_TO_CREATE_CATEGORY', 'Error al crear la categoria');
        define('ERROR_TO_CREATE_POST', 'Error al crear el post');

        // CTL_USER
        define('SUCCESS_PASSWORD_CHANGED', 'Contrasenya canviada correctament');
        define('ERROR_PASSWORD_CHANGED', 'Error al canviar la contrasenya');
        define('ERROR_PASSWORDS_DOSENT_MATCH', 'Les contrasenyes no coincideixen');
        define('ERROR_OLD_PASSWORD_DOSENT_MATCH', 'La contrasenya antiga no és correcta');
        define('SUCCESS_UPDATE_PROFILE', 'Perfil actualitzat correctament');
        define('ERROR_UPDATE_PROFILE', 'Error al actualitzar el perfil');

        // VIEW ADMIN PANEL DASHBOARD
        define('DASHBOARD_BUTTON', 'Dashboard');
        define('USERS_BUTTON', 'Usuaris');
        define('POSTS_BUTTON', 'Publicacions');
        define('CATEGORIES_BUTTON', 'Categories');
        define('ADMINS_BUTTON', 'Administradors');
        define('INTEGRATIONS_BUTTON', 'Integracions');

        define('BREADCRUMB_HOME', 'Home');
        define('BREADCRUMB_OVERVIEW', 'Overview');

        define('DASHBOARD_TITLE', 'Dashboard');
        define('DASHBOARD_DESCRIPTION', 'Aixo es el Dashboard. aqui podras veure tots el dades de l\'empresa');

        define('DASHBOARD_USERS_CARD_TITLE', 'Usuaris Registrats');
        define('DASHBOARD_USERS_CARD_BODY', 'Usuaris Totals: ');
        define('DASHBOARD_USERS_CARD_BUTTON', 'Veure usuaris');

        define('DASHBOARD_POSTS_CARD_TITLE', 'Publicacions Creades');
        define('DASHBOARD_POSTS_CARD_BODY', 'Publicacions Totals: ');
        define('DASHBOARD_POSTS_CARD_BUTTON', 'Veure publicacions');

        define('DASHBOARD_CATEGORIES_CARD_TITLE', 'Categories existents');
        define('DASHBOARD_CATEGORIES_CARD_BODY', 'Categories totals: ');
        define('DASHBOARD_CATEGORIES_CARD_BUTTON', 'Veure categories');

        define('DASHBOARD_ADMINS_CARD_TITLE', 'Administradors');
        define('DASHBOARD_ADMINS_CARD_BODY', 'Administradors Totals: ');
        define('DASHBOARD_ADMINS_CARD_BUTTON', 'Veure administradors');

        define('DASHBOARD_CARD_BODY_POSTS', 'Ultimes publicacions');
        define('DASHBOARD_CARD_BODY_POSTS_ID', 'ID');
        define('DASHBOARD_CARD_BODY_POSTS_TITLE', 'Titol');
        define('DASHBOARD_CARD_BODY_POSTS_AUTHOR', 'Autor');
        define('DASHBOARD_CARD_BODY_POSTS_DATE', 'Data');
        define('DASHBOARD_CARD_BODY_POSTS_ACTIONS', 'Accions');
        define('DASHBOARD_CARD_BODY_POSTS_ACTIONS_VIEW', 'Veure');
        define('DASHBOARD_CARD_BODY_POSTS_ACTIONS_EDIT', 'Editar');
        define('DASHBOARD_CARD_BODY_POSTS_ACTIONS_DELETE', 'Eliminar');

        // VIEW ADMIN PANEL USERS
        define('USERS_BREADCRUMB', 'Users');

        define('USERS_CARD_BODY_TITLE', 'Usuaris registrats');
        define('USERS_CARD_BODY_ID', 'ID');
        define('USERS_CARD_BODY_USERNAME', 'Nom d\'usuari');
        define('USERS_CARD_BODY_NAME', 'Nom Complet');
        define('USERS_CARD_BODY_MAIL', 'Mail');
        define('USERS_CARD_BODY_DOB', 'Data de naixement');
        define('USERS_CARD_BODY_ROLES', 'Rols');
        define('USERS_CARD_BODY_ACTIONS', 'Accions');

        define('USERS_CARD_BODY_REPORTERS_BUTTONS', 'Set Reporter');
        define('USERS_CARD_BODY_ADMINS_BUTTONS', 'Set Admin');

        define('USERS_CARD_BODY_DELETE_BUTTONS', 'Eliminar');
        define('USERS_CARD_BODY_EDIT_BUTTONS', 'Editar');
        define('USERS_CARD_BODY_VIEW_BUTTONS', 'Veure');

        // VIEW ADMIN PANEL POSTS
        define('POSTS_BREADCRUMB', 'Posts');

        define('POSTS_CARD_TITLE', 'Publicacions');
        define('POSTS_CARD_BODY_ID', 'ID');
        define('POSTS_CARD_BODY_TITLE', 'Titol');
        define('POSTS_CARD_BODY_AUTHOR', 'Autor');
        define('POSTS_CARD_BODY_DATE', 'Data');
        define('POSTS_CARD_BODY_ACTIONS', 'Accions');

        define('POSTS_CARD_BODY_DELETE_BUTTONS', 'Eliminar');
        define('POSTS_CARD_BODY_EDIT_BUTTONS', 'Editar');
        define('POSTS_CARD_BODY_VIEW_BUTTONS', 'Veure');
        define('POSTS_CARD_BODY_DOWNLOAD_BUTTON', 'Descarregar');

        // VIEW ADMIN PANEL CATEGORIES
        define('CATEGORIES_BREADCRUMB', 'Categories');

        define('CATEGORIES_CARD_TITLE', 'Categories');
        define('CATEGORIES_CARD_BODY_ID', 'ID');
        define('CATEGORIES_CARD_BODY_NAME', 'Nom');
        define('CATEGORIES_CARD_BODY_DESCRIPTION', 'Descripcio');
        define('CATEGORIES_CARD_BODY_ACTIONS', 'Accions');

        define('CATEGORIES_CARD_BODY_DELETE_BUTTONS', 'Eliminar');
        define('CATEGORIES_CARD_BODY_EDIT_BUTTONS', 'Editar');
        define('CATEGORIES_CARD_BODY_VIEW_BUTTONS', 'Veure');

        define('CATEGORIES_CARD_BODY_EDIT_TITLE', 'Editar categoria');
        define('CATEGORIES_CARD_BODY_EDIT_NAME', 'Nom');
        define('CATEGORIES_CARD_BODY_IMG', 'Imatge');
        define('CATEGORIES_CARD_BODY_EDIT_DESCRIPTION', 'Descripcio');
        define('CATEGORIES_CARD_BODY_EDIT_BUTTON', 'Editar');

        // VIEW ADMIN PANEL ADMINS
        define('ADMINS_BREADCRUMB', 'Administradors');

        define('ADMINS_CARD_TITLE', 'Administradors');
        define('ADMINS_CARD_BODY_ID', 'ID');
        define('ADMINS_CARD_BODY_USERNAME', 'Nom d\'usuari');
        define('ADMINS_CARD_BODY_FULLNAME', 'Nom complet');
        define('ADMINS_CARD_BODY_MAIL', 'Mail');
        define('ADMINS_CARD_BODY_DOB', 'Data de naixement');
        define('ADMINS_CARD_BODY_ACTIONS', 'Accions');

        define('ADMINS_CARD_BODY_DELETE_BUTTONS', 'Eliminar');
        define('ADMINS_CARD_BODY_EDIT_BUTTONS', 'Editar');
        define('ADMINS_CARD_BODY_SET_USER_BUTTONS', 'Set User');
        define('ADMINS_CARD_BODY_SET_REPORTER', 'Set Reporter');
        define('ADMINS_CARD_BODY_SET_ADMIN', 'Set Admin');

        // VIEW ADMIN PANEL INTEGRATIONS
        define('INTEGRATIONS_BREADCRUMB', 'Integracions');

        define('FILESYSTEM_CARD_TITLE', 'Sistema de fitxers');

        define('FILESYSTEM_CARD_BODY_ID', 'ID');
        define('FILESYSTEM_CARD_BODY_NAME', 'Nom');
        define('FILESYSTEM_CARD_BODY_DATE', 'Data de modificacio');
        define('FILESYSTEM_CARD_BODY_SIZE', 'Tamany');
        define('FILESYSTEM_CARD_BODY_ACTIONS', 'Accions');

        define('FILESYSTEM_CARD_BODY_VIEW_BUTTONS', 'Veure');
        define('FILESYSTEM_CARD_BODY_DOWNLOAD_BUTTONS', 'Descarregar');
        define('FILESYSTEM_CARD_BODY_DELETE_BUTTONS', 'Eliminar');
        define('FILESYSTEM_CARD_BODY_GO_BACK_BUTTONS', 'Tornar enrere');

        define('FILESYSTEM_CARD_BODY_VIEW_ALL', 'Veure fitxers');

        // 404 PAGE
        define('PAGE_NOT_FOUND', '404');
        define('PAGE_NOT_BUTTON_GO_BACK', 'Tornar al pagina principal');

        // NAVBAR
        define('LOGO_ALT', 'Logo');
        define('NAVBAR_BUTTON_POSTS', 'Posts');
        define('NAVBAR_BUTTON_CATEGORIES', 'Categories');
        define('NAVBAR_BUTTON_REPORTERS', 'Periodistes');

        // FOOTER
        define('FOOTER_BUTTON_GO_BACK', 'Inici');

        // LOGIN
        define('LOGIN_TITLE', 'Iniciar sessio');
        define('LOGIN_USERNAME', 'Nom usuari');
        define('LOGIN_PASSWORD', 'Contrasenya');
        define('LOGIN_BUTTON', 'Iniciar sessio');

        // REGISTER
        define('REGISTER_TITLE', 'Registrar-se');
        define('REGISTER_USERNAME', 'Nom usuari');
        define('REGISTER_FULLNAME', 'Nom complet');
        define('REGISTER_DOB', 'Data de naixement');
        define('REGISTER_MAIL', 'Mail');
        define('REGISTER_PASSWORD', 'Contrasenya');
        define('REGISTER_PASSWORD_CONFIRM', 'Confirmar contrasenya');
        define('REGISTER_BUTTON', 'Registrar-se');

        // POSTS CATEGORIES
        define('POSTS_CATEGORIES_IMG_NOT_FOUND', 'Imatge no disponible');
        define('POSTS_CATEGORIES_BUTTON', 'Veure més');

        // POSTS
        define('POSTS_GO_BACK_CATEGORIES', 'Tornar a la llista de categories');
        define('POSTS_VIEW_MORE', 'Veure més');

        // POST DETAILS
        define('POST_DETAILS_GO_BACK_POSTS', ' Tornar');
        define('POST_DETAILS_EDIT_BUTTON', 'Editar');
        define('POST_DETAILS_DELETE_BUTTON', 'Eliminar');

        define('POST_DETAILS_POSTED_BY', 'Publicat per: ');
        define('POST_DETAILS_POSTED_ON', 'Publicat el: ');

        define('POSTS_DETAILS_EDIT_TITLE', 'Editar publicació');
        define('POSTS_DETAILS_EDIT_NAME', 'Títol');
        define('POSTS_DETAILS_EDIT_CONTENT', 'Contingut');
        define('POSTS_DETAILS_EDIT_IMG', 'Imatge de capçalera');
        define('POSTS_DETAILS_EDIT_TAGS', 'Tags');
        define('POSTS_DETAILS_EDIT_BUTTON', 'Editar publicació');
        define('POSTS_DETAILS_BUTTON_GO_BACK', 'Tornar enrere');

        // REPORT PANEL
        define('REPORT_PANEL_HOME_BUTTON', 'Inici');
        define('REPORT_PANEL_CONFIG_BUTTON', 'Configuracio');

        define('REPORT_PANEL_DASHBOARD_MY_POSTS', 'Visites globals de les vostres publicacions');
        define('REPORT_PANEL_DASHBOARD_MY_POSTS_VISITS', 'Conegueu les visites que les vostres publicacions han tingut al mes actual');
        define('REPORT_PANEL_DASHBOARD_MY_POSTS_VISITS_QUANTITY', '200K');

        define('REPORT_PANEL_DASHBOARD_LECTORS_TIME', 'Temps que els lectors passen llegint');
        define('REPORT_PANEL_DASHBOARD_LECTORS_TIME_VISITS', 'Conegueu el temps que els lectors passen llegint les vostres publicacions');
        define('REPORT_PANEL_DASHBOARD_LECTORS_TIME_VISITS_QUANTITY', '8h Diaries invertides');

        define('REPORT_PANEL_DASHBOARD_CREATE_POST', 'Crear publicacio');
        define('REPORT_PANEL_DASHBOARD_CREATE_POST_VISITS', 'Creeu una nova publicacio per a que els lectors puguin llegir-la');
        define('REPORT_PANEL_DASHBOARD_CREATE_POST_VISITS_QUANTITY', 'Crear publicacio');

        define('REPORT_PANEL_DASHBOARD_CREATE_CATEGORY', 'Crear categoria');
        define('REPORT_PANEL_DASHBOARD_CREATE_CATEGORY_VISITS', 'Creeu una nova categoria per a que els lectors puguin llegir-la');
        define('REPORT_PANEL_DASHBOARD_CREATE_CATEGORY_VISITS_QUANTITY', 'Crear categoria');

        define('REPORT_PANEL_DASHBOARD_CREATE_BUTTON', 'Crear');

        // REPORT PANEL - CREATE POST
        define('REPORT_PANEL_CREATE_POST_TITLE', 'Crear publicacio');
        define('REPORT_PANEL_CREATE_POST_NAME', 'Títol');
        define('REPORT_PANEL_CREATE_POST_NAME_PLACEHOLDER', 'Títol de la publicacio');
        define('REPORT_PANEL_CREATE_POST_CONTENT', 'Contingut');
        define('REPORT_PANEL_CREATE_POST_CONTENT_PLACEHOLDER', 'Pots utilitzar el format HTML per a escriure el teu contingut');
        define('REPORT_PANEL_CREATE_POST_IMG', 'Imatge');
        define('REPORT_PANEL_CREATE_POST_IMG_PLACEHOLDER', 'https://i.imgur.com/xxxxxx');
        define('REPORT_PANEL_CREATE_POST_CATEGORY', 'Categoria');
        define('REPORT_PANEL_CREATE_POST_TAGS', 'Tags');
        define('REPORT_PANEL_CREATE_POST_TAGS_PLACEHOLDER', 'Separar tags amb una coma: Tag1, Tag2, Tag3');
        define('REPORT_PANEL_CREATE_POST_BUTTON', 'Crear');

        // REPORT PANEL - CREATE CATEGORY
        define('REPORT_PANEL_CREATE_CATEGORY_TITLE', 'Crear categoria');
        define('REPORT_PANEL_CREATE_CATEGORY_NAME', 'Nom');
        define('REPORT_PANEL_CREATE_CATEGORY_NAME_PLACEHOLDER', 'Nom de la categoria');
        define('REPORT_PANEL_CREATE_CATEGORY_IMG', 'Imatge');
        define('REPORT_PANEL_CREATE_CATEGORY_IMG_PLACEHOLDER', 'https://i.imgur.com/xxxxxx');
        define('REPORT_PANEL_CREATE_CATEGORY_DESCRIPTION', 'Descripció');
        define('REPORT_PANEL_CREATE_CATEGORY_BUTTON', 'Crear');

        // REPORTERS PROFILE
        define('REPORTERS_PROFILE_TITLE', 'Veure perfil');
        define('REPORTERS_PROFILE_SEND_MAIL', 'Enviar missatge');

        // USER DETAILS
        define('USER_DETAILS_TITLE', 'Perfil');
        define('USER_DETAILS_REPORTS_BUTTON', 'Tauler del reporter');
        define('USER_DETAILS_ADMIN_PANEL_BUTTON', 'Tauler d\'administrador');
        define('USER_DETAILS_LOGOUT', 'Tancar sessio');

        // USER PROFILE
        define('USER_PROFILE_LEVEL_10', 'Admin');
        define('USER_PROFILE_LEVEL_5', 'Editor');
        define('USER_PROFILE_LEVEL_0', 'Usuari');
        define('USER_PROFILE_LEVEL_MINUS1', 'Banned');
        define('USER_PROFILE_LEVEL_MINUS2', 'Pro');

        define('USER_PROFILE_BIO', 'Biografia');
        define('USER_PROFILE_SEND_MAIL', 'Enviar missatge');
        define('USER_PROFILE_EDIT_PROFILE', 'Editar perfil');
        define('USER_PROFILE_CHANGE_PASSWORD', 'Canviar contrasenya');

        // USER PROFILE - CHANGE PASSWORD
        define('USER_PROFILE_CHANGE_PASSWORD_TITLE', 'Canviar contrasenya');
        define('USER_PROFILE_CHANGE_PASSWORD_OLD_PASSWORD', 'Contrasenya actual');
        define('USER_PROFILE_CHANGE_PASSWORD_NEW_PASSWORD', 'Nova contrasenya');
        define('USER_PROFILE_CHANGE_PASSWORD_NEW_PASSWORD_REPEAT', 'Repetir nova contrasenya');
        define('USER_PROFILE_CHANGE_PASSWORD_BUTTON', 'Canviar');

        // USER PROFILE - EDIT PROFILE
        define('USER_PROFILE_EDIT_PROFILE_TITLE', 'Editar perfil');
        define('USER_PROFILE_EDIT_DETAILS', 'Dades del Perfil');
        define('USER_PROFILE_EDIT_PROFILE_NAME', 'Nom d\'usuari');
        define('USER_PROFILE_EDIT_PROFILE_FULLNAME', 'Nom');
        define('USER_PROFILE_EDIT_PROFILE_FULLNAME_PLACEHOLDER', 'Nom i cognoms');
        define('USER_PROFILE_EDIT_PROFILE_MAIL', 'Correu');
        define('USER_PROFILE_EDIT_PROFILE_MAIL_PLACEHOLDER', 'Correu electronic');
        define('USER_PROFILE_EDIT_PROFILE_DOB', 'Data de naixement');
        define('USER_PROFILE_EDIT_PROFILE_IMG', 'Imatge');
        define('USER_PROFILE_EDIT_PROFILE_IMG_PLACEHOLDER', 'https://i.imgur.com/xxxxxx');
        define('USER_PROFILE_EDIT_PROFILE_BIO', 'Biografia');
        define('USER_PROFILE_EDIT_PROFILE_SOCIAL_TITLE', 'Xarxes socials');
        define('USER_PROFILE_EDIT_PROFILE_LINKEDIN', 'LinkedIn');
        define('USER_PROFILE_EDIT_PROFILE_LINKEDIN_PLACEHOLDER', 'https://www.linkedin.com/in/xxxxxx');
        define('USER_PROFILE_EDIT_PROFILE_TWITTER', 'Twitter');
        define('USER_PROFILE_EDIT_PROFILE_TWITTER_PLACEHOLDER', 'https://twitter.com/xxxxxx');
        define('USER_PROFILE_EDIT_PROFILE_FACEBOOK', 'Facebook');
        define('USER_PROFILE_EDIT_PROFILE_FACEBOOK_PLACEHOLDER', 'https://www.facebook.com/xxxxxx');
        define('USER_PROFILE_EDIT_PROFILE_INSTAGRAM', 'Instagram');
        define('USER_PROFILE_EDIT_PROFILE_INSTAGRAM_PLACEHOLDER', 'https://www.instagram.com/xxxxxx');
        define('USER_PROFILE_EDIT_PROFILE_GITHUB', 'GitHub');
        define('USER_PROFILE_EDIT_PROFILE_GITHUB_PLACEHOLDER', 'https;//github.com/xxxxxx');
        define('USER_PROFILE_EDIT_PROFILE_BUTTON', 'Guardar Canvis');

        // USER PROFILE - CHANGE PRIVACY
        define('USER_PROFILE_CHANGE_PRIVACY_TITLE', 'Configuració de privacitat');
        define('USER_PROFILE_CHANGE_PRIVACY_MAIL', 'Mostrar el meu correu');
        define('USER_PROFILE_CHANGE_PRIVACY_DOB', 'Mostrar la meva data de naixement');
        define('USER_PROFILE_CHANGE_PRIVACY_FULLNAME', 'Mostrar el meu nom i cognoms al meu perfil');
        define('USER_PROFILE_CHANGE_PRIVACY_BIO', 'Mostrar la meva biografia');
        define('USER_PROFILE_CHANGE_PRIVACY_SOCIAL', 'Mostrar les meves xarxes socials');
        define('USER_PROFILE_CHANGE_PRIVACY_WEB_SEND_NOTIFICATION', 'Rebre notificacions dels esdeveniments als quals assisteixo');
        define('USER_PROFILE_CHANGE_PRIVACY_BUTTON', 'Guardar Canvis');

    } elseif (WEBSITE_LANG == 'esp') {
        // TODO: Translate to Spanish

    } elseif (WEBSITE_LANG == 'en') {
        // TODO: Translate to English
    }