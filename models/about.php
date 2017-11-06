<?php
    require_once "lib/model.class.php";

    class About extends Model
    {
        public function getList()
        {
            $sql = "select * from about";

            return App::$db->query($sql);
        }
    }