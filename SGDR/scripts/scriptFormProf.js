//Função de Máscara

//Máscara para CPF
function mascara_cpf() { 
if(document.FormProf.txtCPF.value.length == 3) { 
document.FormProf.txtCPF.value += '.'; 
} 
if(document.FormProf.txtCPF.value.length == 7) {
document.FormProf.txtCPF.value += '.'; 
}
if(document.FormProf.txtCPF.value.length == 11) { 
document.FormProf.txtCPF.value += '-'; 
}
}
//Máscara para Telefone
function mascara_telefone() {
if(document.FormProf.txtTel.value.length == 2) {
document.FormProf.txtTel.value += ' ';
}
if(document.FormProf.txtTel.value.length == 7) {
document.FormProf.txtTel.value += '-';
}
}
//Máscara para CEP
function mascara_cep() {
if(document.FormProf.txtCEP.value.length == 5) {
document.FormProf.txtCEP.value += '-';
}
}
//Máscara para Data de Nascimento
function mascara_txtNasc() {
if(document.FormProf.txtNasc.value.length == 2) {
document.FormProf.txtNasc.value += '/';
}
if(document.FormProf.txtNasc.value.length == 2) {
document.FormProf.txtNasc.value += '/';
}
if(document.FormProf.txtNasc.value.length == 5) {
document.FormProf.txtNasc.value += '/';
}
}
//Máscara para Telefone Celular
function mascara_celular() {
if(document.FormProf.txtCel.value.length == 2) {
document.FormProf.txtCel.value += ' ';
}
if(document.FormProf.txtCel.value.length == 7) {
document.FormProf.txtCel.value += '-';
}
}

//Verificar CPF
function VerificaCPF () {
if (vercpf(document.FormProf.txtCPF.value)){
	document.FormProf.submit();
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
