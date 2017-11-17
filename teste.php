<?php 
	
	$val = 4/18;
	$val2 = 5/18;
	
	$val = number_format($val,2,'.',',');
	//$var2 = number_format($var2,2,'.',',');
	$val2 = number_format($val2,2,'.',',');
	//echo $val;
	
	$valor = explode('.',$val);

	$valor_final = $valor[1];
		
	$valor2 = explode('.',$val2);	
		
	$valor_final2 = $valor2[1];
	
	echo $valor_final + $valor_final + $valor_final2 + $valor_final2;
	
	echo "<br/>";
	//echo ceil(5.2);
?>