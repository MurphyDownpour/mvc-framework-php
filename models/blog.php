<?php
    require_once "lib/model.class.php";
    class Blog extends Model
    {
        public function getList()
        {
            $sql = "select * from blog";

            return App::$db->query($sql);
        }

        public static function getByQuery($sql)
        {
            return App::$db->query($sql);
        }
    }