<?php
namespace Easybook\classes;

class UsuarioComum
{
    private int $id;
    private string $nome;
    private string $tipo;
    private string $foto_perfil;


    public function __construct(string $nome, string $foto_perfil, string $tipo, int $id)
    {
        $this->nome = $this->validar_nome($nome);
        $this->foto_perfil = $this->validar_foto_perfil($foto_perfil);
        $this->tipo = $this->validar_tipo($tipo);
        $this->id = $this->validar_id($id);
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

    function getNome(): string
    {
        return $this->nome;
    }

    function getTipo(): string
    {
        return $this->tipo;
    }

    function getFotoPerfil(): string
    {
        return $this->foto_perfil;
    }
}

?>