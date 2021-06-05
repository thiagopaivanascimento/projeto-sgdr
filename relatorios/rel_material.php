<?php
ini_set ("default_charset", "ISO-8859-1");
// Conex�o com o banco de dados (alterar a senha para simonsen)
$conexao = pg_connect("host=localhost user=postgres port=5433 dbname=bd_sgdr password=postgres");

function relatorio() {
global $retorno_name,$relatorio,$arquivorel,$nomeprograma,$conexao;

require_once("../pdf/pdf.php");
	
$pdf = new PDF('P'); // Criando um relat�rio em orienta��o "retrato" --- L=paisagem
$pdf->SetName("Relatorio de Materiais","SGDR - Sistema de Gerenciamento Didatico Remoto"); // Cabe�alho Cabe�alho do Relat�rio
$pdf->Open(); // Abre um PDF
$pdf->addpage(); // Abre uma p�gina
$pdf->SetX($pdf->Getx()+10); // Aumenta a coluna em 10 posi��es
$pdf->SetTextColor(0,64,128); // Altera a cor da fonte
$pdf->SetFont('arial', 'B', 9); // Altera o formato e o tamanho da fonte
// CABE�ALHO
// Cell -> Na seguinte ordem, escreve no pdf : largura,altura,conteudo,borda,quebra de linha,alinhamento
// Na 4a posi��o configura a borda da c�lula:
// 1 => Borda superior, inferior, esquerda, direita 0 => Sem borda
// B => Borda inferior L => Borda lado esquerdo R => Borda Lado direito T => Borda superior
$pdf->Cell(50,6,'MATERIAL','B',0,'C');
$pdf->Cell(30,6,'PROFESSOR','B',0,'C');
$pdf->Cell(30,6,'DISCIPLINA','B',0,'C');
$pdf->Cell(30,6,'CURSO','B',0,'C');
$pdf->Cell(30,6,'DATA','B',1,'C');
$sql = "SELECT * from materiais";
$res = pg_query($sql);
$pdf->SetFont('arial', '', 7); // Altera o formato e o tamanho da fonte
for ($i=0; $i < pg_num_rows($res); $i++) {
// CONTE�DO DA TABELA
// Na seguinte ordem, escreve no pdf : largura,altura,conteudo,borda,quebra de linha,alinhamento
$pdf->Cell(50,6,pg_fetch_result($res,$i,'material'),1,0,'C');
$pdf->Cell(30,6,pg_fetch_result($res,$i,'professor'),1,0,'C');
$pdf->Cell(30,6,pg_fetch_result($res,$i,'disciplina'),1,0,'C');
$pdf->Cell(30,6,pg_fetch_result($res,$i,'curso'),1,0,'C');
$pdf->Cell(30,6,pg_fetch_result($res,$i,'data'),1,1,'C');
}
$pdf->Output($arquivorel); // Sa�da do relat�rio
}
relatorio(); // Executa a fun��o
?>