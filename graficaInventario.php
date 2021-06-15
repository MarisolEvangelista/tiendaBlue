<?php
 require_once('jpgraph/src/jpgraph.php');
 require_once('jpgraph/src/jpgraph_bar.php');

//Conexion a la base de datos: servidor/usuario/contraseña/base de datos
$mysqli= new mysqli("localhost","root","","blue store");

if($mysqli->connect_errno)
{
echo "Fallo al conectar a MySQL:(". $mysqli->connect_errno.")". $mysqli->connect_errno;
}

//Consulta
$resultado=$mysqli->query("SELECT precio,marca from inventario");

//arreglos donde se guardaran los resultados de la consulta.
$marcas=array();
$precios=array();

//Recorre el resultado de la consulta y los almacena en los arreglos
while($row=$resultado->fetch_assoc())
{
   $marcas[]=$row['marca'];
   $precios[]=$row['precio'];	
}

// Creamos el grafico
$grafico = new Graph(1600,660,'auto');
$grafico->SetScale("textint");
$grafico->title->Set("GRAFICA DE PRECIOS POR MARCA");
$grafico->xaxis->title->Set("MARCA");
$grafico->xaxis->SetTickLabels($marcas);
$grafico->yaxis->title->Set("PRECIO");
$barplot1 =new BarPlot($precios);
$barplot1->SetFillGradient("#40E0D0", "#EE82EE", GRAD_HOR);
$barplot1->SetWidth(50);
$grafico->Add($barplot1);
$grafico->Stroke();
?>