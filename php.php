<?php
	$matrix1;
	$p;
	for ($i = 0; $i < count($matrix); $i++)
	{
		for ($j = 0; $j < count($matrix); $j++)
		{
			$matrix1[$i][$j] = 0;
		}
	}
/**
*Функия Valid совершает проверку на валидацию. 
*@param matrix
*@return valid
*/
	function Valid($matrix, $p1, $p2)
	{
		$hight = count($matrix);
		$valid = 0;
		for ($i = 0; $i < $hight; $i++)
		{
			if ($hight != count($matrix[$i]))
			{
				$valid = 1;
			}
		}
		if (is_int($p1)) {
            $valid = 2;
        } 
        if (is_int($p2)) {
            $valid = 2;
        }
		for ($i = 0; $i < count($matrix); $i++)
		{
			for ($j = 0; $j < count($matrix); $j++)
			{
				if ($j != $k)
				{
					if($i == $j)
					{
						$matrix[$i][$j] = 0;
					}
				}
			}
		}
		return $valid;
	}
/**
*Функия CreateMatrixDos высчитывает матрицу достижимости и выводит ее на экран. 
*@param matrix
*@param p1
*@param p2
*/
	function CreateMatrix($matrix, $p1, $p2)
	{
		global $matrix1;
		for ( $k = 0; $k < count($matrix); $k++)
		{
			for ( $i = 0; $i < count($matrix[$i]); $i++)
			{
				for ( $j = 0; $j < count($matrix[$i]); $j++)
				{		
					
					if ($matrix[$i][$k] > 0 && $matrix[$k][$j] > 0)
					{
						if (($matrix[$i][$j] > $matrix[$i][$k] + $matrix[$k][$j] && $matrix[$i][$j] != 0) || $matrix[$i][$j] == 0)
						{	
							$matrix[$i][$j] = $matrix[$i][$k] + $matrix[$k][$j];
							$matrix1[$i][$j] = $k;
						}	
					}	
					else{						
						$matrix1[$i][$j] = $j;						
					}
				}
			}
		}
		/**echo "<br><h1 align = 'center'>";
		for ( $i=0; $i < count($matrix[$i]); $i++)
		{
			for ( $j=0; $j < count($matrix[$i]); $j++)
			{
				echo $matrix[$i][$j];
				echo " ";
			}
			echo "<br>";
		}
		echo "</h1><br>";
		echo "<br><h1 align = 'center'>";
		for ( $i=0; $i < count($matrix[$i]); $i++)
		{
			for ( $j=0; $j < count($matrix[$i]); $j++)
			{
				echo $matrix1[$i][$j];
				echo " ";
			}
			echo "<br>";
		}
		echo "</h1><br>";
		*/
		echo "<h1 align = 'center'>" . $matrix[$p1][$p2] . "</h1>";
		if ($matrix[$p1][$p2] != 0)
		{
			echo "<br><h1 align = 'center'>Путь:</h1>";
			echo "<h1 align = 'center'>". $p1 ."";
			while ($p1 != $p2)
			{
				echo "-". ($matrix1[$p1][$p2]) . "";
				$p1 = $matrix1[$p1][$p2];
			}
			echo "</h1>";
		}
		else 
		{
			echo "<br><h1 align = 'center'>Дороги нет!<h1><br>";
		}			
	}
	$matrix = strval($_POST["matrix"]); //Возвращает строковое значение переменной
	$matrix = explode("\n", $matrix); //Разбивает строку с помощью разделителя
	for ($i = 0; $i < count($matrix); $i++) 
	{
        $matrix[$i] = explode(" ", $matrix[$i]);
    }
	$p1 = $_POST["p1"];
    $p2 = $_POST["p2"];
	if (Valid($matrix, $p1, $p2) == 0)
	{
		
		echo "<br><h1 align = 'center'>Кратчайший путь:<h1><br>";
		echo CreateMatrix($matrix, $p1, $p2);    
			
	}
	else if(Valid($matrix, $p1, $p2) == 1)
	{
		echo "<br><h1 align = 'center'>Матрица должна быть квадратной!<h1><br>";
	}
	else if(Valid($matrix, $p1, $p2) == 2)
	{
		echo "<br><h1 align = 'center'>Введите вершины!<h1><br>";
	}
?>