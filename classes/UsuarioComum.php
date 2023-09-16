<?php
namespace Easybook\classes;

class UsuarioComum
{
    private int $id;
    private string $nome;
    private string $tipo;
    private string $foto_perfil;


    public function __construct(string $nome)
    {
        $this->nome = $this->validar_nome($nome);
    }

    // validação 

    private function validar_id($id)
    {
        return $id;
    }
    private function validar_nome($nome)
    {
        return $nome;
    }
    private function validar_tipo($tipo)
    {
        return $tipo;
    }
    private function validar_foto_perfil($foto)
    {
        return $foto;
    }

    //get

    function getId(): int
    {
        return $this->id;

    }

    function getNome(): string {

        return $this->nome;
    }

    function getTipo(): string
    {
        return $this->tipo;
    }
}

?>