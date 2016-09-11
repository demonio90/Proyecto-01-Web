<?php
	
	$operacionesA = $_POST["operaciones"];
	$operacion = (string)$operacionesA;

	//Variables matriz A:

	$numero1A = $_POST["num1A"];
	$num1A = (int)$numero1A;

	$numero2A = $_POST["num2A"];
	$num2A = (int)$numero2A;

	$numero3A = $_POST["num3A"];
	$num3A = (int)$numero3A;

	$numero4A = $_POST["num4A"];
	$num4A = (int)$numero4A;

	$numero5A = $_POST["num5A"];
	$num5A = (int)$numero5A;

	$numero6A = $_POST["num6A"];
	$num6A = (int)$numero6A;

	$numero7A = $_POST["num7A"];
	$num7A = (int)$numero7A;

	$numero8A = $_POST["num8A"];
	$num8A = (int)$numero8A;

	$numero9A = $_POST["num9A"];
	$num9A = (int)$numero9A;

	//Variables matriz B:

	$numero1B = $_POST["num1B"];
	$num1B = (int)$numero1B;

	$numero2B = $_POST["num2B"];
	$num2B = (int)$numero2B;

	$numero3B = $_POST["num3B"];
	$num3B = (int)$numero3B;

	$numero4B = $_POST["num4B"];
	$num4B = (int)$numero4B;

	$numero5B = $_POST["num5B"];
	$num5B = (int)$numero5B;

	$numero6B = $_POST["num6B"];
	$num6B = (int)$numero6B;

	$numero7B = $_POST["num7B"];
	$num7B = (int)$numero7B;

	$numero8B = $_POST["num8B"];
	$num8B = (int)$numero8B;

	$numero9B = $_POST["num9B"];
	$num9B = (int)$numero9B;

	$numeroN = $_POST["numeroN"];
	$numN = (int)$numeroN;

	$determinante = determinanteMatrizA($num1A, $num2A, $num3A, $num4A, $num5A, $num6A, $num7A, $num8A, $num9A);

	//Switch:

	switch ($operacion) {
		case "Determinante":
				echo "La determinante de la matriz A es: ".determinanteMatrizA($num1A, $num2A, $num3A, $num4A, $num5A, $num6A, $num7A, $num8A, $num9A);
			break;
		case "MatrizTranspuesta":
				transpuestaMatrizA($num1A, $num2A, $num3A, $num4A, $num5A, $num6A, $num7A, $num8A, $num9A);
			break;
		case "MatrizInversa":
				matrizInversa($num1A, $num2A, $num3A, $num4A, $num5A, $num6A, $num7A, $num8A, $num9A,$determinante);
			break;
		case "Multiplicar":
				multiplicar($num1A, $num2A, $num3A, $num4A, $num5A, $num6A, $num7A, $num8A, $num9A, $numN);
			break;
		case "Elevar":
				potencia($num1A, $num2A, $num3A, $num4A, $num5A, $num6A, $num7A, $num8A, $num9A, $numN);
			break;

		case "SumarMatrices":
				sumaMatricesAB($num1A, $num2A, $num3A, $num4A, $num5A, $num6A, $num7A, $num8A, $num9A,    $num1B, $num2B, $num3B, $num4B, $num5B, $num6B, $num7B, $num8B, $num9B);
			break;
		case "RestarMatrices":
				restaMatricesAB($num1A, $num2A, $num3A, $num4A, $num5A, $num6A, $num7A, $num8A, $num9A,    $num1B, $num2B, $num3B, $num4B, $num5B, $num6B, $num7B, $num8B, $num9B);
			break;

		case "MultiplicarMatrices":
				multiplicacionMatricesAB($num1A, $num2A, $num3A, $num4A, $num5A, $num6A, $num7A, $num8A, $num9A,    $num1B, $num2B, $num3B, $num4B, $num5B, $num6B, $num7B, $num8B, $num9B);
			break;
		default:
				echo "El valor seleccionado no es valido";
			break;
	}

	//Determinante de la matriz:

	function determinanteMatrizA($nume1A, $nume2A, $nume3A, $nume4A, $nume5A, $nume6A, $nume7A, $nume8A, $nume9A) {
		$determinanteA = $nume1A * $nume5A * $nume9A;
		$determinanteB = $nume4A * $nume8A * $nume3A;
		$determinanteC = $nume7A * $nume2A * $nume6A;

		$determinanteD = $nume3A * $nume5A * $nume7A;
		$determinanteE = $nume6A * $nume8A * $nume1A;
		$determinanteF = $nume9A * $nume2A * $nume4A;

		$determinante1 = $determinanteA + $determinanteB + $determinanteC;
		$determinante2 = $determinanteD + $determinanteE + $determinanteF;

		$determinanteTotal = $determinante1 - $determinante2;

		return $determinanteTotal;
	} 

	//Matriz inversa:

	function matrizInversa($nume1A, $nume2A, $nume3A, $nume4A, $nume5A, $nume6A, $nume7A, $nume8A, $nume9A, $det) {
		$val1 = ($nume5A * $nume9A) - ($nume6A * $nume8A);
		$val2 = ($nume4A * $nume9A) - ($nume6A * $nume7A);
		$val3 = ($nume4A * $nume8A) - ($nume5A * $nume7A);
		$val4 = ($nume2A * $nume9A) - ($nume3A * $nume8A);

		$val5 = ($nume1A * $nume9A) - ($nume3A * $nume7A);
		$val6 = ($nume1A * $nume8A) - ($nume2A * $nume7A);
		$val7 = ($nume2A * $nume6A) - ($nume3A * $nume5A);
		$val8 = ($nume1A * $nume6A) - ($nume3A * $nume4A);
		$val9 = ($nume1A * $nume5A) - ($nume2A * $nume4A);

		$val2 *= -1;
		$val4 *= -1;
		$val6 *= -1;
		$val8 *= -1;

		$inversa;

		echo "La determinante de la matriz A es: ".$det."<br><br>";

		if($det == 0) {
			echo "No se puede realizar la inversa de la matriz ya que su determinante es cero.<br>";
		}else {
			$det1 = 1 * $val1;
			$det2 = 1 * $val2;
			$det3 = 1 * $val3;
			$det4 = 1 * $val4;
			$det5 = 1 * $val5;
			$det6 = 1 * $val6;
			$det7 = 1 * $val7;
			$det8 = 1 * $val8;
			$det9 = 1 * $val9;

			for($a = 1; $a <= 10; $a++) {
				if($det1 % $a == 0 && $det % $a == 0) {
					$det1 = $det1 / $a;
					$det = $det / $a;

					if($det2 % $a == 0 && $det % $a == 0) {
						$det2 = $det2 / $a;
						
						if($det3 % $a == 0 && $det % $a == 0) {
							$det3 = $det3 / $a;
							
							if($det4 % $a == 0 && $det % $a == 0) {
								$det4 = $det4 / $a;
								
								if($det5 % $a == 0 && $det % $a == 0) {
									$det5 = $det5 / $a;
									
									if($det6 % $a == 0 && $det % $a == 0) {
										$det6 = $det6 / $a;
										
										if($det7 % $a == 0 && $det % $a == 0) {
											$det7 = $det7 / $a;
											
											if($det8 % $a == 0 && $det % $a == 0) {
												$det8 = $det8 / $a;
												
												if($det9 % $a == 0 && $det % $a == 0) {
													$det9 = $det9 / $a;
													
												}
											}
										}	
									}
								}
							}
						}
					}
				}
			}

			echo "La inversa de la matriz A es: <br><br>".
			"<table border=1 width=10%>
				<tr align=center>
					<td>$det1/$det</td>
					<td>$det4/$det</td>
					<td>$det7/$det</td>
				</tr>
				<tr align=center>
					<td>$det2/$det</td>
					<td>$det5/$det</td>
					<td>$det8/$det</td>
				</tr>
				<tr align=center>
					<td>$det3/$det</td>
					<td>$det6/$det</td>
					<td>$det9/$det</td>
				</tr>
			</table><br>";
		}
	}

	//Transpuesta matriz A:

	function transpuestaMatrizA($nume1A, $nume2A, $nume3A, $nume4A, $nume5A, $nume6A, $nume7A, $nume8A, $nume9A) {

		echo "La transpuesta de la matriz A es: <br><br>".
		"<table border=1 width=10%>
			<tr align=center>
				<td>$nume1A</td>
				<td>$nume4A</td>
				<td>$nume7A</td>
			</tr>
			<tr align=center>
				<td>$nume2A</td>
				<td>$nume5A</td>
				<td>$nume8A</td>
			</tr>
			<tr align=center>
				<td>$nume3A</td>
				<td>$nume6A</td>
				<td>$nume9A</td>
			</tr>
		</table><br>";
	}

	//Multiplicacion de la matriz A por n:

	function multiplicar($nume1A, $nume2A, $nume3A, $nume4A, $nume5A, $nume6A, $nume7A, $nume8A, $nume9A, $numero) {
		$ele1 = $nume1A * $numero;
		$ele2 = $nume2A * $numero;
		$ele3 = $nume3A * $numero;
		$ele4 = $nume4A * $numero;
		$ele5 = $nume5A * $numero;
		$ele6 = $nume6A * $numero;
		$ele7 = $nume7A * $numero;
		$ele8 = $nume8A * $numero;
		$ele9 = $nume9A * $numero;

		echo "La multiplicacion de la matriz A por ".$numero." es: <br><br>".
		"<table border=1 width=10%>
			<tr align=center>
				<td>$ele1</td>
				<td>$ele2</td>
				<td>$ele3</td>
			</tr>
			<tr align=center>
				<td>$ele4</td>
				<td>$ele5</td>
				<td>$ele6</td>
			</tr>
			<tr align=center>
				<td>$ele7</td>
				<td>$ele8</td>
				<td>$ele9</td>
			</tr>
		</table><br>";
	}

	//Matriz A elevada a la n:

	function potencia($nume1A, $nume2A, $nume3A, $nume4A, $nume5A, $nume6A, $nume7A, $nume8A, $nume9A, $numero) {
		$ele1 = ($nume1A * $nume1A) + ($nume2A * $nume4A) + ($nume3A * $nume7A);
		$ele2 = ($nume1A * $nume2A) + ($nume2A * $nume5A) + ($nume3A * $nume8A);
		$ele3 = ($nume1A * $nume3A) + ($nume2A * $nume6A) + ($nume3A * $nume9A);

		$ele4 = ($nume4A * $nume1A) + ($nume5A * $nume4A) + ($nume6A * $nume7A);
		$ele5 = ($nume4A * $nume2A) + ($nume5A * $nume5A) + ($nume6A * $nume8A);
		$ele6 = ($nume4A * $nume3A) + ($nume5A * $nume6A) + ($nume6A * $nume9A);

		$ele7 = ($nume7A * $nume1A) + ($nume8A * $nume4A) + ($nume9A * $nume7A);
		$ele8 = ($nume7A * $nume2A) + ($nume8A * $nume5A) + ($nume9A * $nume8A);
		$ele9 = ($nume7A * $nume3A) + ($nume8A * $nume6A) + ($nume9A * $nume9A);
		
		echo "La matriz A elevada a la ".$numero." es: <br><br>".
		"<table border=1 width=10%>
			<tr align=center>
				<td>$ele1</td>
				<td>$ele2</td>
				<td>$ele3</td>
			</tr>
			<tr align=center>
				<td>$ele4</td>
				<td>$ele5</td>
				<td>$ele6</td>
			</tr>
			<tr align=center>
				<td>$ele7</td>
				<td>$ele8</td>
				<td>$ele9</td>
			</tr>
		</table><br>";
	}

	//*******************************************************************Matriz B******************************************************************

	//Sumar matrices:

	function sumaMatricesAB($nume1A, $nume2A, $nume3A, $nume4A, $nume5A, $nume6A, $nume7A, $nume8A, $nume9A, $nume1B, $nume2B, $nume3B, $nume4B, $nume5B, $nume6B, $nume7B, $nume8B, $nume9B) {

		$ele1 = $nume1A + $nume1B;
		$ele2 = $nume2A + $nume2B;
		$ele3 = $nume3A + $nume3B;
		$ele4 = $nume4A + $nume4B;
		$ele5 = $nume5A + $nume5B;
		$ele6 = $nume6A + $nume6B;
		$ele7 = $nume7A + $nume7B;
		$ele8 = $nume8A + $nume8B;
		$ele9 = $nume9A + $nume9B;

		echo "El resultado de la suma de la matriz A y la matriz B es:<br><br>".
		"<table border=1 width=10%>
			<tr align=center>
				<td>$ele1</td>
				<td>$ele2</td>
				<td>$ele3</td>
			</tr>
			<tr align=center>
				<td>$ele4</td>
				<td>$ele5</td>
				<td>$ele6</td>
			</tr>
			<tr align=center>
				<td>$ele7</td>
				<td>$ele8</td>
				<td>$ele9</td>
			</tr>
		</table><br>";
	}

	//Restar matrices:

	function restaMatricesAB($nume1A, $nume2A, $nume3A, $nume4A, $nume5A, $nume6A, $nume7A, $nume8A, $nume9A, $nume1B, $nume2B, $nume3B, $nume4B, $nume5B, $nume6B, $nume7B, $nume8B, $nume9B) {

		$ele1 = $nume1A - $nume1B;
		$ele2 = $nume2A - $nume2B;
		$ele3 = $nume3A - $nume3B;
		$ele4 = $nume4A - $nume4B;
		$ele5 = $nume5A - $nume5B;
		$ele6 = $nume6A - $nume6B;
		$ele7 = $nume7A - $nume7B;
		$ele8 = $nume8A - $nume8B;
		$ele9 = $nume9A - $nume9B;

		echo "El resultado de la resta de la matriz A y la matriz B es:<br><br>".
		"<table border=1 width=10%>
			<tr align=center>
				<td>$ele1</td>
				<td>$ele2</td>
				<td>$ele3</td>
			</tr>
			<tr align=center>
				<td>$ele4</td>
				<td>$ele5</td>
				<td>$ele6</td>
			</tr>
			<tr align=center>
				<td>$ele7</td>
				<td>$ele8</td>
				<td>$ele9</td>
			</tr>
		</table><br>";
	}

	//Multiplicar matrices:

	function multiplicacionMatricesAB($nume1A, $nume2A, $nume3A, $nume4A, $nume5A, $nume6A, $nume7A, $nume8A, $nume9A, $nume1B, $nume2B, $nume3B, $nume4B, $nume5B, $nume6B, $nume7B, $nume8B, $nume9B) {

		$ele1 = (($nume1A * $nume1B) + ($nume2A * $nume4B) + ($nume3A * $nume7B));
		$ele2 = (($nume1A * $nume2B) + ($nume2A * $nume5B) + ($nume3A * $nume8B));
		$ele3 = (($nume1A * $nume3B) + ($nume2A * $nume6B) + ($nume3A * $nume9B));

		$ele4 = (($nume4A * $nume1B) + ($nume5A * $nume4B) + ($nume6A * $nume7B));
		$ele5 = (($nume4A * $nume2B) + ($nume5A * $nume5B) + ($nume6A * $nume8B));
		$ele6 = (($nume4A * $nume3B) + ($nume5A * $nume6B) + ($nume6A * $nume9B));

		$ele7 = (($nume7A * $nume1B) + ($nume8A * $nume4B) + ($nume9A * $nume7B));
		$ele8 = (($nume7A * $nume2B) + ($nume8A * $nume5B) + ($nume9A * $nume8B));
		$ele9 = (($nume7A * $nume3B) + ($nume8A * $nume6B) + ($nume9A * $nume9B));
		

		echo "El resultado de la multiplicacion de la matriz A y la matriz B es:<br><br>".
		"<table border=1 width=10%>
			<tr align=center>
				<td>$ele1</td>
				<td>$ele2</td>
				<td>$ele3</td>
			</tr>
			<tr align=center>
				<td>$ele4</td>
				<td>$ele5</td>
				<td>$ele6</td>
			</tr>
			<tr align=center>
				<td>$ele7</td>
				<td>$ele8</td>
				<td>$ele9</td>
			</tr>
		</table><br>";
	}
?>