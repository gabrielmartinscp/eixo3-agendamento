<?php
namespace Easybook\classes;

final class Agendamento
{
    private string $estado;

    public function __construct(string $estado = '', private int $id_atendimentos, private int $id_horario = -1, private int $id_cliente = -1)
    {
        $this->estado = $this->validar_estado($estado);
    }

    // validação 
    
    private function validar_estado(string $e): string 
    {
        switch($e){
            case 'solicitado':
            case 'confirmado':
            case 'realizado':
            case 'cancelado':
                  return $e;
                  break;
            default:
                  return 'solicitado';
                  break;
         }

    }

    //get

    function getIdAtendimentos(): int
    {
        return $this->id_atendimentos;
    }

    function getIdHorario(): int {
        return $this->id_horario;
    }

    function getIdCliente(): int
    {
        return $this->id_cliente;
    }
    
    function getEstado(): string
    {
        return $this->estado;
    }
}

?>