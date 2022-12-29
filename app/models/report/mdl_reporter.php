<?php
    defined('MY_CMS') or die('Permission denied');

    function mdl_get_categories() {
        $stmt = db_query_fetchall('SELECT * FROM posts_categories');
        return $stmt;
    }

    function mdl_create_post($title, $tags, $content, $author, $image, $category) {
        $stmt = db_query_prepare(
            'INSERT INTO posts (postTitle, postDesc, postTime, postTag, postAuthor, postHeaderIMG, postCategory) VALUES (?, ?, ?, ?, ?, ?, ?)',
            array($title, $content, date("Y-m-d H:i:s"), $tags, $author, $image, $category),
            'sssssss'
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

    function get_categories_quantity() {
        $stmt = db_query_fetchall('SELECT COUNT(*) FROM posts_categories');
        return $stmt;
    }

    function mdl_get_reporters() {
        $stmt = db_query_fetchall('SELECT * FROM users WHERE level = 5');
        return $stmt;
    }