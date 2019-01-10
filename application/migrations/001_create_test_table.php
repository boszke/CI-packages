<?php

class Migration_Create_test_table extends CI_Migration
{

    public function up()
    {
        $this->db->query(
                "
            CREATE TABLE IF NOT EXISTS `test` (
            `id`   INT UNSIGNED NOT NULL AUTO_INCREMENT,
            `name` VARCHAR(255) NOT NULL,
            PRIMARY KEY (ID)
        )
          COLLATE = 'utf8_general_ci'
          ENGINE = InnoDB
          DEFAULT CHARSET = utf8;      
          "
        );
    }

    public function down()
    {
        $this->db->query(
                "
                    DROP TABLE IF EXISTS `test`;
                "
                );
    }

}
