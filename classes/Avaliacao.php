<?php
namespace Easybook\classes;

final class Avaliacao
{
    private int $estrelas;
    private string $texto;

    public function __construct(int $estrelas = 0, string $texto = '', private int $id_atendimento = -1, private int $id = -1)
    {
        $this->estrelas = $this->validar_estrelas($estrelas);
        $this->texto = $this->validar_texto($texto);
    }

    private function validar_estrelas(int $e): int
    {
        if($e > 5)
        {
            return 5;
        }

        if($e < 0)
        {
            return 0;
        }

        return $e;
    }

    private function validar_texto(string $t): string
    {
        return $t;
    }

    public function getIdAtendimento(): int
    {
        return $this->id_atendimento;
    }

    public function getEstrelas(): int
    {
        return $this->estrelas;
    }

    public function getTexto(): string
    {
        return $this->texto;
    }
}

?>