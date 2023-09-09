/*-----------------------
----------CRIAR----------
-----------------------*/

async function criar_avaliacao(id_atendimento, estrelas, texto)
{
    function callback(res)
    {
        return res;
    }
    let query = `${config.servidor}/${config.diretorios.avaliacoes}/criar.php?idatendimento=${id_atendimento}&estrelas=${estrelas}&texto="${texto}"`;
    
    let res = reqHTTP(query, callback);
    await res;
    return res.then((result) => {return result});
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
    function callback(res)
    {
        return res;
    }
    let query = `${config.servidor}/${config.diretorios.avaliacoes}/atualizar.php?idavaliacoes=${id_avaliacoes}&idatendimento=${id_atendimento}&estrelas=${estrelas}&texto="${texto}"`;
    
    let res = reqHTTP(query, callback);
    await res;
    return res.then((result) => {return result});
}

/*-----------------------
---------DELETAR---------
-----------------------*/

async function deletar_avaliacao(id_avaliacoes)
{
    function callback(res)
    {
        return res;
    }
    let query = `${config.servidor}/${config.diretorios.avaliacoes}/atualizar.php?idavaliacoes=${id_avaliacoes}`;
    
    let res = reqHTTP(query, callback);
    await res;
    return res.then((result) => {return result});
}