async function atualizar_avaliacao(id_avaliacoes, id_atendimento, estrelas, texto)
{
    let query = `${config.servidor}/${config.diretorios.avaliacoes}/atualizar.php?idavaliacoes=${id_avaliacoes}&idatendimento=${id_atendimento}&estrelas=${estrelas}&texto="${texto}"`;
    //console.log(query);
    
    let res = reqHTTP(query);
    await res;
    return res.then((result) => {return result});
}

//console.log(atualizar_avaliacao(0, 0, 4, 'teste %$abc'));