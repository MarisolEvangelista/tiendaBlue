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
$resultado=$mysqli->query("SELECT tiendas,estado from sucursal");

//arreglos donde se guardaran los resultados de la consulta.
$estados=array();
$tienda=array();

//Recorre el resultado de la consulta y los almacena en los arreglos
while($row=$resultado->fetch_assoc())
{
   $estados[]=$row['estado'];
   $tienda[]=$row['tiendas'];	
}

// Creamos el grafico
$grafico = new Graph(1880,750,'auto');
$grafico->SetScale("textint");
$grafico->title->Set("GRAFICA DE TIENDAS EXISTENTES POR ESTADO");
$grafico->xaxis->title->Set("ESTADOS");
$grafico->xaxis->SetTickLabels($estados);
$grafico->yaxis->title->Set("NUMERO DE TIENDAS");
$barplot1 =new BarPlot($tienda);
$barplot1->SetFillGradient("#1E90FF", "#000000", GRAD_HOR);
$barplot1->SetWidth(50);
$grafico->Add($barplot1);
$grafico->Stroke();
?>