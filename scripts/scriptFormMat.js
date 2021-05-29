//Máscara para Data de Nascimento
function mascara_txtNasc() {
if(document.FormMat.txtNasc.value.length == 2) {
document.FormMat.txtNasc.value += '/';
}
if(document.FormMat.txtNasc.value.length == 2) {
document.FormMat.txtNasc.value += '/';
}
if(document.FormMat.txtNasc.value.length == 5) {
document.FormMat.txtNasc.value += '/';
}
}
