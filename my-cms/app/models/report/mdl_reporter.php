<?php
    defined('MY_CMS') or die('Permission denied');

    function mdl_get_categories() {
        $stmt = db_query_fetchall('SELECT * FROM posts_categories');
        return $stmt;
    }

    function mdl_create_post($title, $tags, $content, $author, $image) {
        echo $title, $content, date('d, M, Y, H:i'), $tags, $author, $image;
        // INSERT INTO `posts` (`postID`, `postTitle`, `postDesc`, `postTime`, `postTag`, `postAuthor`, `postHeaderIMG`) VALUES (NULL, 'Eficiencia de Mascaras', 'FFP1: Es el nivel de protección más bajo.\r\n Estas máscaras no son eficientes contra gases venenosos ni fibrogénicas de polvo o aerosoles. Este nivel es apto en construcción o en industria alimentaria.\r\nFPP2: Las máscaras de gas de este nivel se utilizan en entornos de trabajo en los que las partículas nocivas y mutagénicas se pueden encontrar en el aire: por ejemplo, en la industria metalúrgica y la minería. Los trabajadores están en contacto frecuente con aerosoles, niebla y humo que se afectan a las vías respiratorias.', '2022-12-27 09:01:40', 'survival, mask', 'Survivor', 'https://i.imgur.com/ehnORnz.png')
        $stmt = db_query_prepare(
            'INSERT INTO posts (postTitle, postDesc, postTime, postTag, postAuthor, postHeaderIMG) VALUES (?, ?, ?, ?, ?, ?)',
            array($title, $content, date()
        )

        return $stmt;
    }