<?php
namespace Easybook\classes;

final class Agendamento
{
    private int $id_atendimentos;
    // private int $id_horario;
    // private int $id_cliente;
    private string $estado;

    public function __construct(int $id_atendimentos)
    {
        $this->id_atendimentos = $this->validar_id_atendimentos($id_atendimentos);
    }

    // validação 

    private function validar_id_atendimentos($id_atendimentos)
    {
        return $id_atendimentos;
    }

    // private function validar_id_horario($id_horario)
    // {
    //     return $id_horario;
    // }

    // private function validar_id_cliente($id_cliente)
    // {
    //     return $id_cliente;
    // }
    
    private function validar_estado($estado)
    {
        return $estado;
    }

    //get

    function getIdAtendimentos(): int
    {
        return $this->id_atendimentos;

    }

    // function getIdHorario(): int {

    //     return $this->id_horario;
    // }

    // function getIdCliente(): int
    // {
    //     return $this->id_cliente;
    // }
    
    function getEstado(): string
    {
        return $this->estado;
    }
}

?>