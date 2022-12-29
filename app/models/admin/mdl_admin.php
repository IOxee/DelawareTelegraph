<?php
    defined('MY_CMS') or die('Permission denied');

    function get_admins_quantity() {
        $stmt = db_query_fetchall("SELECT COUNT(*) FROM users WHERE level > " . ADMIN_LEVEL - 1 . "");
        return $stmt;
    }

    function mdl_set_user($id, $level) {
        $stmt = db_query_prepare("UPDATE users SET level = ? WHERE id = ?", array($level, $id), "ii");
        return $stmt;
    }

    function mdl_delete_user($id) {
        $stmt = db_query_prepare("DELETE FROM users WHERE id = ?", array($id), "i");
        return $stmt;
    }

    function mdl_get_user_nick($id) {
        $stmt = db_query_prepare("SELECT nick FROM users WHERE id = ?", array($id), "i");
        return $stmt;
    }

    function mdl_get_user_by_id($id) {
        $stmt = db_query_fetchall("SELECT * FROM users WHERE id = " . $id);
        return $stmt;
    }