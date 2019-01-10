<?php

class Migration extends CI_Controller
{

    public function index()
    {
        $this->createBasicTablesIfNeeded();

        $versionSql = 'SELECT version FROM migrations LIMIT 1';

        $queryBefore = $this->db->query($versionSql);
        $valueBefore = $queryBefore->num_rows() ? $queryBefore->row()->version : 0;

        $this->load->library('migration');
        $migrationResult = $this->migration->latest();

        $queryAfter = $this->db->query($versionSql);
        $valueAfter = $queryAfter->num_rows() ? $queryAfter->row()->version : 0;

        if ($migrationResult != true) {
            show_error($this->migration->error_string());
        }

        if ($valueBefore == $valueAfter) {
            echo '<h1>Migracja nic nie wniosła :/</h1>';
        } elseif ($valueAfter != $valueBefore) {
            echo '<h1>Migracja przebiegła pomyślnie!</h1>';
        }

        echo '<h1>' . $valueBefore . ' => ' . $valueAfter . '</h1>';
        echo '<div>';
    }

    private function createBasicTablesIfNeeded()
    {
        $this->db->query("
        CREATE TABLE IF NOT EXISTS `ci_sessions` (
          `session_id`    CHAR(32)         NOT NULL DEFAULT '0',
          `ip_address`    VARCHAR(15)      NOT NULL DEFAULT '0',
          `user_agent`    VARCHAR(120)     NOT NULL,
          `last_activity` INT(10) UNSIGNED NOT NULL DEFAULT '0',
          `user_data`     TEXT             NOT NULL,
          PRIMARY KEY (`session_id`),
          KEY `last_activity_idx` (`last_activity`)
        )
          COLLATE = 'utf8_general_ci'
          ENGINE = InnoDB
          DEFAULT CHARSET = utf8;           
    ");
        $this->db->query("
        CREATE TABLE IF NOT EXISTS `migrations` (
            `version`   INT(4)          UNSIGNED NOT NULL
        )
          COLLATE = 'utf8_general_ci'
          ENGINE = InnoDB
          DEFAULT CHARSET = utf8;         
      ");
    }

}
