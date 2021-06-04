//Função de Máscara

//Máscara para CPF
function mascara_cpf() { 
if(document.FormAluno.txtCPF.value.length == 3) { 
document.FormAluno.txtCPF.value += '.'; 
} 
if(document.FormAluno.txtCPF.value.length == 7) {
document.FormAluno.txtCPF.value += '.'; 
}
if(document.FormAluno.txtCPF.value.length == 11) { 
document.FormAluno.txtCPF.value += '-'; 
}
}
//Máscara para Telefone
function mascara_telefone() {
if(document.FormAluno.txtTel.value.length == 2) {
document.FormAluno.txtTel.value += ' ';
}
if(document.FormAluno.txtTel.value.length == 7) {
document.FormAluno.txtTel.value += '-';
}
}
//Máscara para CEP
function mascara_cep() {
if(document.FormAluno.txtCEP.value.length == 5) {
document.FormAluno.txtCEP.value += '-';
}
}
//Máscara para Data de Nascimento
function mascara_txtNasc() {
if(document.FormAluno.txtNasc.value.length == 2) {
document.FormAluno.txtNasc.value += '/';
}
if(document.FormAluno.txtNasc.value.length == 2) {
document.FormAluno.txtNasc.value += '/';
}
if(document.FormAluno.txtNasc.value.length == 5) {
document.FormAluno.txtNasc.value += '/';
}
}
//Máscara para Telefone Celular
function mascara_celular() {
if(document.FormAluno.txtCel.value.length == 2) {
document.FormAluno.txtCel.value += ' ';
}
if(document.FormAluno.txtCel.value.length == 7) {
document.FormAluno.txtCel.value += '-';
}
}

//Verificar CPF
function VerificaCPF () {
if (vercpf(document.FormAluno.txtCPF.value)){
	document.FormAluno.submit();
 }else{
	errors="1";
   if (errors) alert('CPF NÃO VÁLIDO');
      document.retorno = (errors == '');}}
        function vercpf (cpf) 
{if (cpf.length != 11 || cpf == "00000000000" || cpf == "11111111111" || cpf == "22222222222" || cpf == "33333333333" || cpf == "44444444444" || cpf == "55555555555" || cpf == "66666666666" || cpf == "77777777777" || cpf == "88888888888" || cpf == "99999999999")
return false;
add = 0;
for (i=0; i < 9; i ++)
add += parseInt(cpf.charAt(i)) * (10 - i);
rev = 11 - (add % 11);
if (rev == 10 || rev == 11)
rev = 0;
if (rev != parseInt(cpf.charAt(9)))
return false;
add = 0;
for (i = 0; i < 10; i ++)
add += parseInt(cpf.charAt(i)) * (11 - i);
rev = 11 - (add % 11);
if (rev == 10 || rev == 11)
rev = 0;
if (rev != parseInt(cpf.charAt(10)))
return false;
return true;
}
