const agendamento_01 = document.getElementById("agendamento_01");
const agendamento_02 = document.getElementById("agendamento_02");

const calendario = document.getElementById("schedule-container");

let agendamento_selecionado = null;


function agendamento01()
{
    if(p !== null)
    {
        p.style.backgroundColor = '#59b8eb';
        p.style.color = '#0b5f8b';
    }
    agendamento_selecionado = 1;
    calendario.style.display = 'flex';
}

function agendamento02()
{
    if(p !== null)
    {
        p.style.backgroundColor = '#59b8eb';
        p.style.color = '#0b5f8b';
    }
    agendamento_selecionado = 2;
    calendario.style.display = 'flex';
}

agendamento_01.addEventListener('click', () => { agendamento01() });
agendamento_02.addEventListener('click', () => { agendamento02() });


let p = null;

function alterar_horario(dia, hora, id)
{
    let agendamento_atual = null;

    if(agendamento_selecionado == 1)
    {
        agendamento_atual = {
            profissional: 'Barbearia do José',
            dia: document.getElementById("dia_01"),
            hora: document.getElementById("hora_01")
        };
    }
    else if(agendamento_selecionado == 2)
    {
        agendamento_atual = {
            profissional: 'Maria Cabeleleira',
            dia: document.getElementById("dia_02"),
            hora: document.getElementById("hora_02")
        };
    }

    if(agendamento_atual === null)
    {
        return false;
    }

    if(confirm(`Seu horário de atendimento com ${agendamento_atual.profissional} será remarcado para o dia ${dia} às ${hora}. Deseja confirmar a mudança?`))
    {
        agendamento_atual.dia.innerText = dia;
        agendamento_atual.hora.innerText = hora;


        if(p !== null)
        {
            p.style.backgroundColor = '#59b8eb';
            p.style.color = '#0b5f8b';
        }

        p = document.getElementById(id);
        p.style.backgroundColor = 'green';
        p.style.color = 'darkgreen';

        alert("Horário reagendado com sucesso!");
    }
}
