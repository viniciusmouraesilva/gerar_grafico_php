<?php
	$host = "localhost";
	$usuario = "root";
	$senha = "";
	$banco = "mercado";
	
	$con = mysqli_connect($host,$usuario,$senha,$banco);
	
	if(mysqli_connect_errno($con)){
		echo "Erro ao se conectar com o banco";
		echo mysqli_connect_errno($con);
		exit;
	}	
	
	$query = "SELECT COUNT(id)total_produtos_categoria, categoria FROM produtos GROUP BY categoria";
	
	$resultado = mysqli_query($con,$query);
	
	$produtos = [];
	
	while($produto = mysqli_fetch_assoc($resultado)){
		$produtos[] = $produto;
	}
	
	$total_categorias = count($produtos);
	
	$i = 0;
	$total_produtos = 0;
	
	//saber o total dos produtos
	//para fazer a media e encontar
	//a porcentagem dos produtos referente
	//a categoria
	while($i<$total_categorias){
		$total_produtos += $produtos[$i]['total_produtos_categoria'];
		$i++;
	}

	$i = 0;
	$prod = [];
	
	//o array prod fica com as categorias e
	//suas respectivas quantidades de produto
	while($i<$total_categorias){
		//$prod[$i][] = $total_produtos;
		//$prod[$i][$produtos[$i]['categoria']] = $produtos[$i]['total_produtos_categoria'];
		$prod[$i][0] = $produtos[$i]['categoria'];
		$prod[$i][] = $produtos[$i]['total_produtos_categoria'];
		$i++;		
	}	
	//$i = 0;
	//print_r($prod);
	/*while($i<$total_categorias){
		print_r($prod[$i]);
		$i++;
	}*/	
	
	//$configuracao = array('cabecalho' => array('Categoria','Quantidade'),'data' => $prod);
	
	//print_r($configuracao);
	$legendas = array('biscoitos','congelados','frutas','limpeza');
	
	$settings = array('cabecalho' => array('Categoria','Quantidade'),'data' => $prod,);
	
	//print_r($prod);
	
	require_once 'vendor/autoload.php';

	require_once 'vendor/davefx/phplot/phplot/phplot.php';
	//require_once 'phplot/contrib/data_table.php';
	
	$grafico = new PHPlot(800,600);
	
	//$grafico->SetFileFormat('jpg');
	
	$grafico->SetTitle("Porcentagem dos produtos sobre a categoria");

	//valores do grafico
	$grafico->SetDataValues($prod);
		
	$grafico->SetDataType('text-data-single');	
		
	//apresentação em barras
	$grafico->SetPlotType('pie');	
		
	$grafico->SetLegend($legendas);
	
	//$grafico->SetCallback('draw_graph','draw_data_table',$configuracao);
	
	//$grafico->SetCallback('draw_graph','draw_data_table',$settings);

	//exibir gráfico
	//ImageJpeg($grafico,$arquivo);
	$grafico->DrawGraph();
?>