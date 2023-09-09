<?php
namespace Easybook\classes;

class UsuarioComum
{
    private int $id;
    private string $nome;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    private function validar_id()
    {

    }
}

?>