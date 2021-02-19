<?php
class Tech_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

    }
    public function listDbs(){
        $this->load->dbutil();
        $dbs = $this->dbutil->list_databases();
            return $dbs;
        }

    public function getFieldsTable($table)
    {
        $fields = $this->db->field_data($table);
        return $fields;
    }
    public function checkTypes($table)
    {
        //$fields = $this->db->field_data($table);
    }
    public function listTables(){
        $tables = $this->db->list_tables();

        return $tables;

    }

}