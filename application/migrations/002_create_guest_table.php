<?php
/**
 * Migration: create_guest_table
 *
 * Created by: Cli for CodeIgniter <https://github.com/kenjis/codeigniter-cli>
 * Created on: 2019/01/10 20:13:11
 */
class Migration_create_guest_table extends CI_Migration {

	public function up()
    {
        $this->db->query(
                "
            CREATE TABLE IF NOT EXISTS `guest` (
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
                    DROP TABLE IF EXISTS `guest`;
                "
                );
    }
}
