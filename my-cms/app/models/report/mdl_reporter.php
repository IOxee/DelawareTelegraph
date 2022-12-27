<?php
    defined('MY_CMS') or die('Permission denied');

    function mdl_get_categories() {
        $stmt = db_query_fetchall('SELECT * FROM posts_categories');
        return $stmt;
    }

    function mdl_create_post($title, $tags, $content, $author, $image) {
        echo $title, $content, date("Y-m-d H:i:s"), $tags, $author, $image;
        $stmt = db_query_prepare(
            'INSERT INTO posts (postTitle, postDesc, postTime, postTag, postAuthor, postHeaderIMG) VALUES (?, ?, ?, ?, ?, ?)',
            array($title, $content, date("Y-m-d H:i:s"), $tags, $author, $image),
            'ssssss'
        );

        echo $stmt->error;

        return $stmt;
    }

    function mdl_create_category($name, $description) {
        $stmt = db_query_prepare(
            'INSERT INTO posts_categories (name, description) VALUES (?, ?)',
            array($name, $description),
            'ss'
        );
        return $stmt;
    }