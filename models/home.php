<?php
    require_once "C:\OSPanel\domains\localhost\mvc\lib\model.class.php";
    class Home extends Model
    {
        public function getList($only_published = false)
        {
            $sql = "select * from pages where 1";

            if ($only_published)
            {
                $sql .= " and is_published = 1";
            }
            return App::$db->query($sql);
        }

        public function deleteDataById($id)
        {
            $sql = "DELETE FROM pages WHERE id = " . $id;
            if ($this->db->query($sql))
            {
                App::$db->query($sql);
            }
            else
            {
                throw new Exception("Cannot find data to delete.");
            }
        }

        public function getByAlias($alias)
        {
            $alias = $this->db->escape($alias);
            $sql = "select * from pages where alias = '{$alias}' limit 1";
            $result = App::$db->query($sql);
            return isset($result[0]) ? $result[0] : null;
        }
    }