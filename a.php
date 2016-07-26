<?php 
	class PrimsAlgorithm {
		//$INT_MAX = 0x7FFFFFFF;
		const INFINITY = 100000000;

		function MinKey($key, $set, $verticesCount)
		{
			// global $INT_MAX;
			// $min = $INT_MAX;
			$min = self::INFINITY;
			$minIndex = 0;

			for ($v = 0; $v < $verticesCount; ++$v)
			{
				if ($set[$v] == false && $key[$v] < $min)
				{
					$min = $key[$v];
					$minIndex = $v;
				}
			}

			return $minIndex;
		}

		function PrintResult($parent, $graph, $verticesCount)
		{
			$sum = 0;
			$str = "Total cost of minimum spanning tree is = SUM OF (";
			echo "<pre>" . "Edge     Weight" . "</pre>";
			for ($i = 1; $i < $verticesCount; ++$i) {
				$sum = $sum + $graph[$i][$parent[$i]];
				echo "<pre>" . $parent[$i] . " - " . $i . "    " . $graph[$i][$parent[$i]] . "</pre>";
				$str .= " ".$graph[$i][$parent[$i]] ."+";
			}
			$str = rtrim($str, "+");
			$str .= ")";
			echo $str . " = " .$sum;

		}

		function Prim($graph, $verticesCount)
		{
			//global $INT_MAX;
			$parent = array();
			$key = array();
			$mstSet = array();

			for ($i = 0; $i < $verticesCount; ++$i)
			{
				//$key[$i] = $INT_MAX;
				$key[$i] = self::INFINITY;
				$mstSet[$i] = false;
			}

			$key[0] = 0;
			$parent[0] = -1;

			for ($count = 0; $count < $verticesCount - 1; ++$count)
			{
				$u = $this->MinKey($key, $mstSet, $verticesCount);
				$mstSet[$u] = true;

				for ($v = 0; $v < $verticesCount; ++$v)
				{
					if ($graph[$u][$v] && $mstSet[$v] == false && $graph[$u][$v] < $key[$v])
					{
						$parent[$v] = $u;
						$key[$v] = $graph[$u][$v];
					}
				}
			}

			$this->PrintResult($parent, $graph, $verticesCount);
		}
	}
?>