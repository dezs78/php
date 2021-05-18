<!DOCTYPE>
<html>
<head>
	<meta lang="hu">
	<meta charset="utf8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<title>Lift</title>
</head>
<body>
<?php


$balkezesek = file("balkezesek.csv");

echo '<div class="container text-success bg-light">
		<p class="text-primary">Eslő feladat</p>
		<p>A forrásállomány '. count($balkezesek) .' sorból áll!</p></br>
	</div>';



foreach($balkezesek as $balkezes){
	$result = explode(";", $balkezes);
		$record = explode("-", $result[2]);
		if(in_array(1999, $record)){
			if(in_array(10, $record)){
				$cm = 2.54*floatval($result[4]);
				echo '<div class="container bg-info">
					<p class="text-primary">Második feladat</p>
					<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>Év</th>
									<th>Hónap</th>
									<th>Név</th>
									<th>Magasság</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>'.$record[0].'</td> 
								
									<td>'.$record[1].'</td>
								
									<td>'.$result[0].'</td>
								
									<td>'.$cm.'</td>
								</tr>
							</tbody>
						
					</table>
					</div>';
			}
		}
}



echo '<div class="container bg-dark">
	<p class="text-primary">Harmadik feladat</p>
	<form action="index.php" method="get">
	<label>Adjon meg egy évszámot</label>
	<input type="text" name="szam" size="6">
	<button type="submit">Küld</button>
	</form>
	</div>';

$szam = $_GET['szam'];	
$a = 1990;
$b = 1999;

if($szam>$a && $szam<$b){
		echo '<div class="container"><p class="text-info>"Helyes szám</p></div>';
	for($i=0; $i<count($balkezesek); $i++){
		$result = explode(";", $balkezesek[$i]);
			$record = explode("-", $result[2]);
			if(in_array($_GET['szam'], $record)){
				//for($j=$result[4]; $j<count($szam); $j++)		
					echo '<pre>';
					echo "$result[4]";
					echo '</pre>';
				
			}
		}
	} else {
		echo "Helytelen szám";
}

/*foreach($balkezesek as $balkezes){
	$result = explode(';', $balkezes);
	
	$nev = $result[0];
	$elso = floatval($result[1]);
	$utolso = $result[2];
	$suly = $result[3];
	$magassag = floatval($result[4]);
	$cm = 2.54*$magassag;
	$num = 1999-10;

	
	echo '<pre>
		'.$cm.'
		</pre>';*/
 

?>
</body>
</html>
