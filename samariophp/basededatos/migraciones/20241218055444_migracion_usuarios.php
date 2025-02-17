<?php

use Phinx\Migration\AbstractMigration;

final class MigracionUsuarios extends AbstractMigration {
    public function change() : void {
        $table = $this->table('usuarios');
        $table->addColumn('nombre', 'string');
        $table->addColumn('correo', 'string');
        $table->addColumn('contrasena', 'string');
        $table->addColumn('correo_verificado', 'boolean', ['default' => false]);
        $table->addColumn('token_verificacion', 'string', ['limit' => 64, 'null' => true]);
        $table->addColumn('token_recuperacion', 'string', ['limit' => 64, 'null' => true]);
        $table->addColumn('habilitar_2fa', 'boolean', ['default' => false]);
        $table->addColumn('clave_2fa', 'string', ['null' => true]);
        $table->addColumn('creado_por', 'integer', ['null' => true]);
        $table->addColumn('fecha_creacion', 'timestamp', ['default' => 'CURRENT_TIMESTAMP']);
        $table->addColumn('modificado_por', 'integer', ['null' => true]);
        $table->addColumn('fecha_modificacion', 'timestamp', ['default' => 'CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP']);
        $table->addColumn('eliminado_por', 'integer', ['null' => true]);
        $table->addColumn('fecha_eliminacion', 'timestamp', ['null' => true]);
        $table->addIndex(['nombre', 'correo'], ['unique' => true]);
        $table->create();
    }

}
