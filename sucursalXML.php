<html>
<body bgcolor="plum">
<center>
<br>
<H1>Listado de Sucursales por Estado</H1>
<br><br>

<?php
error_reporting(E_ALL ^ E_NOTICE);
$xml = file_get_contents("sucursal.xml");
$DOM = new DOMDocument('1.0', 'utf-8');
$DOM->loadXML($xml);
$sucursal = $DOM->getElementsByTagName('table');
?>
<TABLE BORDER="1" style="color:#45678E3;front-size:150%; text-align: center">
<TR>
<TD>ESTADO</TD>
<TD>TIENDAS</TD>
<TD>DIRECCION</TD>
<TD>GERENTE</TD>
<TD>TELEFONO</TD>
</TR>
<?php
$estado=$_POST ['estado'];
$e=0;

foreach ($sucursal as $table) {
if($estado==$table->getElementsByTagName("column")->item(0)->nodeValue)
{
echo "<TR>";
echo "<TD>";
echo "  ".$table->getElementsByTagName("column")->item(0)->nodeValue;
echo "</TD>";

echo "<TD>";
echo "  ".$table->getElementsByTagName("column")->item(1)->nodeValue;
echo "</TD>";

echo "<TD>";
echo "  ".$table->getElementsByTagName("column")->item(2)->nodeValue;
echo "</TD>";

echo "<TD>";
echo "  ".$table->getElementsByTagName("column")->item(3)->nodeValue;
echo "</TD>";

echo "<TD>";
echo "  ".$table->getElementsByTagName("column")->item(4)->nodeValue;
echo "</TD>";

echo"</TR>";
$e=1;
}
}
if($e==0)
{
echo("No hay Sucursales en ese Estado");
}
?>
</TABLE>
<br><br><br>
<A HREF="buscarSucursal.html">Regresar a Busqueda</A><br><br><br>
<A HREF="indexRopa.html">Menu</A>
</center>
</body>
</html>  