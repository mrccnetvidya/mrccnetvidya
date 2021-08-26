<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function xmldb_tool_uploaduser_upgrade($oldversion) {
global $DB;
$dbman = $DB->get_manager();
if ($oldversion < 2020110900.01) {
        $table = new xmldb_table('user');
        $field = new xmldb_field('userstatus', XMLDB_TYPE_INTEGER, 10, null, null, null, null);
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }
        upgrade_plugin_savepoint(true, 2020110900.01, 'tool', 'uploaduser');
    }
}