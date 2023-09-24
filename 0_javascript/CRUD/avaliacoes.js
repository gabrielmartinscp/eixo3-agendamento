/*-----------------------
----------CRIAR----------
-----------------------*/

async function criar_avaliacao(id_atendimento, estrelas, texto)
{
    let resposta = '';
    function callback(res)
    {
        resposta = res;
    }
    let query = `${config.servidor}/${config.diretorios.avaliacoes}/criar.php?idatendimento=${id_atendimento}&estrelas=${estrelas}&texto="${texto}"`;
    
    reqHTTP(query, callback);
    return JSON.parse(resposta);
}

/*-----------------------
-----------LER-----------
-----------------------*/

function ler_avaliacao(id)
{
    let resposta = '';
    function callback(res)
    {
        resposta = res;
    }

    let query = `${config.servidor}/${config.diretorios.avaliacoes}/ler.php?id=${id}`;
    
    reqHTTP(query, callback);
    return JSON.parse(resposta);
}

/*-----------------------
--------ATUALIZAR--------
-----------------------*/

async function atualizar_avaliacao(id_avaliacoes, id_atendimento, estrelas, texto)
{
    let resposta = '';
    function callback(res)
    {
        resposta = res;
    }
    let query = `${config.servidor}/${config.diretorios.avaliacoes}/atualizar.php?idavaliacoes=${id_avaliacoes}&idatendimento=${id_atendimento}&estrelas=${estrelas}&texto="${texto}"`;
    
    reqHTTP(query, callback);
    return JSON.parse(resposta);
}

/*-----------------------
---------DELETAR---------
-----------------------*/

async function deletar_avaliacao(id_avaliacoes)
{
    let resposta = '';
    function callback(res)
    {
        resposta = res;
    }
    let query = `${config.servidor}/${config.diretorios.avaliacoes}/atualizar.php?idavaliacoes=${id_avaliacoes}`;
    
    reqHTTP(query, callback);
    return JSON.parse(resposta);
}