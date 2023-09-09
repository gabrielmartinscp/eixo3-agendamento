async function deletar_avaliacao(id_avaliacoes)
{
    let query = `${config.servidor}/${config.diretorios.avaliacoes}/atualizar.php?idavaliacoes=${id_avaliacoes}`;
    //console.log(query);
    
    let res = reqHTTP(query);
    await res;
    return res.then((result) => {return result});
}

//console.log(deletar_avaliacao(0));