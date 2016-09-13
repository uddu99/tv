<?php

class GenerateDataList
{

	function genHeader($hdrDesc)
	{
		$hdr = "<thead> ";
		$hdr .= "<tr>";
		for ($ii=0;$ii<count( $hdrDesc) ; $ii++)
		{
			$hdr .= "<th>".$hdrDesc[$ii]."</th>";	
		}
		$hdr .= "</tr>";
		$hdr .= "</thead>";
		return $hdr;
	}

	function genDetail( $colNameArray , $colTypeArray , $detData)
	{

		$obj = new SystemConfig();
		$config = $obj->unserializeObj( "SystemConfig" );

		$det = "<tbody> ";
		
		for ($row=0;$row<count( $detData) ; $row++)
		{
			$det .= "<tr>";
			for ($col=0;$col<count( $colNameArray ) ; $col++)
			{
				tracefile_debug("GenerateDataList.php" , "genDetail() : Column type >> ".$colTypeArray[$col]." Find action type >> ". strpos( $colTypeArray[$col], "action" ));
				tracefile_debug("GenerateDataList.php" , "genDetail() : getUploadPath >> ".$config->getUploadPath());
				$det .= "<td>";
				if ($colTypeArray[$col] == "text" )
				{
					$det .= $detData[$row][$colNameArray[$col]];
				}
				else if ($colTypeArray[$col] == "img" )
				{
					$det .= "<img src=\"".$config->getUploadPath().$detData[$row][$colNameArray[$col]]."\" width = \"30\" height = \"30\"> ";
				}
				else if ( strpos( $colTypeArray[$col], "action" ) == 0 )
				{
					$action = explode ( "-" ,  $colTypeArray[$col] );
					$actionType = explode ( "|" ,  $action[1] );
					for ($actionTypeRow=0;$actionTypeRow<count( $actionType );$actionTypeRow++)
					{
						if ( $actionType[$actionTypeRow] == "M" )
							$det .= "<input type=\"image\" src=\"images/moveup-arrow.png\" title=\" ��Ѻ���˹� \" onclick = \"moveUpp( '".$detData[$row]["id"]."' , '' )\">";
						if ( $actionType[$actionTypeRow] == "E" )
							$det .= "<input type=\"image\" src=\"images/icn_edit.png\" title=\"Edit\" onclick = \"editItem( '".$detData[$row]["id"]."'  )\">";
						if ( $actionType[$actionTypeRow] == "D" )
							$det .= "<input type=\"image\" src=\"images/icn_trash.png\" title=\"Trash\" onclick = \"deleteItem( '".$detData[$row]["id"]."' , '' )\">";
					}
					
				}
				$det .= "</td>";
			}
			$det .= "</tr>";
		}
		
		$det .= "</tbody>";
		return $det;
	}

	function getPageCount( $dbcon , $tableName , $condition , $recPerPage)
	{
		if (empty( $tableName ))
		{
			throw new Exception("Table name is empty.");
		}
		
		$qry = "SELECT ceil( count(*)/$recPerPage ) FROM  $tableName $condition";
		$dbcon->send_cmd($qry);
		$row=$dbcon->get_result();
		return $row[0];
	}

	function getData( $dbcon , $tableName , $condition , $columnList )
	{
		if (empty( $tableName ))
		{
			throw new Exception("Table name is empty.");
		}

		if (empty( $columnList ))
		{
			throw new Exception("Column name is empty.");
		}
		
		$cols = extractArrayToString( $columnList );
		$qry = "SELECT ".$cols." FROM  $tableName $condition";
		tracefile_debug("GenerateDataList.php" , "Data query is >> ".$qry);
		$dbcon->send_cmd($qry);
		
		$data = array(array());
		$rw = 0;
		while ($row = $dbcon->get_result())
		{
			for ($col=0;$col<count($columnList);$col++)
			{
				$data[$rw][$columnList[$col]] = $row[$col];
			}
			$rw++;
		}
		tracefile_debug("GenerateDataList.php" , "Data table is >> ".$data);
		return $data;
	}

}

?>