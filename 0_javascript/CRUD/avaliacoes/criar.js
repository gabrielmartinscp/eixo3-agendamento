async function criar_avaliacao(id_atendimento, estrelas, texto)
{
    let query = `${config.servidor}/${config.diretorios.avaliacoes}/criar.php?idatendimento=${id_atendimento}&estrelas=${estrelas}&texto="${texto}"`;
    //console.log(query);
    
    let res = reqHTTP(query);
    await res;
    return res.then((result) => {return result});
}

//console.log(criar_avaliacao(0, 4, 'teste %$abc'));