
var tds = document.getElementsByClassName('delete-button');

for (td of tds) {
    td.setAttribute("onclick", "deletar(this)");

}

function deletar(botao) {
    var confirmarExclusao = confirm('Clique em OK para excluir o horário agendado ou em CANCELAR para não excluir.');
    if (confirmarExclusao) {
        setTimeout(function () {
            botao.parentNode.parentNode.remove();
        }, 500);
    }
}