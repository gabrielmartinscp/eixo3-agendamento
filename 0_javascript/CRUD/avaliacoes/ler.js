let resposta = '';
function ler_avaliacao(id)
{
    function callback(res)
    {
        resposta = res;
    }

    let query = `${config.servidor}/${config.diretorios.avaliacoes}/ler.php?id=${id}`;
    //console.log(query);
    
    reqHTTP(query, callback);
    return JSON.parse(resposta);
}

/*
let teste = ler_avaliacao(0);
document.body.innerHTML += JSON.stringify(teste);
console.log(teste.id_atendimento);
*/