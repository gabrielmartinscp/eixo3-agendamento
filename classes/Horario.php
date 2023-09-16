<?php
namespace Easybook\classes;

use DateTime;

final class Horario
{
    private int $duracao;
    private int $ordem_no_dia;
    private int $limite_de_clientes;
    private string $data;
    public function __construct(int $duracao = 15, int $ordem_no_dia, int $limite_de_clientes, string $data)
    {
        $this->duracao = $duracao;
        $this->ordem_no_dia = $ordem_no_dia;
        $this->limite_de_clientes = $limite_de_clientes;
        $this->data = $this->validar_data($data);
    }

    private function validar_data(string $d)
    {
        $ano = '1970';
        $mes = '01';
        $dia = '01';

        if(preg_match('[0-9]{4}-[0-9]{2}-[0-9]{2}', $d))
        {
            $ano = substr($d, 0, 4);
            $mes = substr($d, 5, 2);
            $dia = substr($d, 8, 2);
        }

        $numero_ano = intval($ano);
        $numero_mes = intval($mes);
        $numero_dia = intval($dia);

        $mes = $numero_mes > 12 ? '12' : $mes;

        function limitar_numero_do_dia(int $numero_do_dia, int $ultimo_dia_possivel): string
        {
            $num = $numero_do_dia > $ultimo_dia_possivel ? $ultimo_dia_possivel : $numero_do_dia;
            $string = strval($num);
            $str = strlen($string) == 2 ? $string : '0' . $string;
            return $str;
        }

        function ultimo_dia_possivel(string $mes, int $numero_ano)
        {
            $ultimo_dia_possivel = 31;
            switch($mes)
            {
                case '02':
                    $ano_bissexto = $numero_ano%4 == 0 ? true : false;
                    $ultimo_dia_possivel = $ano_bissexto ? 29 : 28;
                    break;
                case '04':
                    $ultimo_dia_possivel = 30;
                    break;
                case '06':
                    $ultimo_dia_possivel = 30;
                    break;
                case '09':
                    $ultimo_dia_possivel = 30;
                    break;
                case '11':
                    $ultimo_dia_possivel = 30;
                    break;
            }
            return $ultimo_dia_possivel;
        }
        
        $dia = limitar_numero_do_dia($numero_dia, ultimo_dia_possivel($mes, $numero_ano));

        $data_validada = $ano . '-' . $mes . '-' . $dia;
        return $data_validada;
    }

    public function getDuracao(): int
    {
        return $this->duracao;
    }

    public function getOrdemNoDia(): int
    {
        return $this->ordem_no_dia;
    }

    public function getLimiteDeClientes(): int
    {
        return $this->limite_de_clientes;
    }

    public function getData(): string
    {
        return $this->data;
    }
}

?>