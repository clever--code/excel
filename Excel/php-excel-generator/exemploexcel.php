<?php
   //Incluir a classe excelwriter
   include("excelwriter.inc.php");

   //Você pode colocar aqui o nome do arquivo que você deseja salvar.
    $excel=new ExcelWriter("excel3.xls");

    if($excel==false){
        echo $excel->error;
   }

   //Escreve o nome dos campos de uma tabela
   $myArr=array('Last Name','First Name','Email');
   $excel->writeLine($myArr);

   //Seleciona os campos de uma tabela
	$conn = mysql_connect("localhost", "root", "") or die ('Não foi possivel conectar ao banco de dados! Erro: ' . mysql_error());
	if($conn)
	{
	mysql_select_db("teste", $conn);
	}
   $consulta = "select * from employees order by firstName";
   $resultado = mysql_query($consulta);
   if($resultado==true){
      while($linha = mysql_fetch_array($resultado)){
         $myArr=array($linha['lastName'],$linha['firstName'],$linha['email']);
         $excel->writeLine($myArr);
      }
   }


    $excel->close();
    echo "O arquivo foi salvo com sucesso. <a href=\"excel3.xls\">excel.xls</a>";

?>
