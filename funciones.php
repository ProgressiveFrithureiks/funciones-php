$db = db::connect();
			$pkCurso=$_POST['pkCurso'];
            $nombreLargo=$_POST['nombreLargo'];
            $nombreCorto=$_POST['nombreCorto'];
            $cuatrimestre=$_POST['cuatrimestre'];
            $fechaDesde=$_POST['fechaDesde'];
            $fechaHasta=$_POST['fechaHasta'];
			$idCategoria=$_POST['idCategoria'];
			$estado='ok';
			$db->begin();
			if($pkCurso)
				$query="UPDATE `campus_cursos` SET `nombre_largo`=".$nombreLargo.",`nombre_corto`=".$nombreCorto.",`fkcategoria`=".$idCategoria.",`fecha_inicio_curso`=".$fechaDesde.",`fecha_fin_curso`=".$fechaHasta.",`fkusuario`=".$_SESSION['ID'].",`fecha_modificacion`=".date()." WHERE pkcurso_campus=".$pkCurso;
			else
				$query = "INSERT INTO `campus_cursos`(`nombre_largo`, `nombre_corto`, `fkcategoria`, `fecha_inicio_curso`, `fecha_fin_curso`, `fkusuario`, `fecha_modificacion`) VALUES ("..","..","..","..","..","..","..")";
			$db->execute($query);
			if($db->estado())
				$db->commit();
			else{
				$estado='error';
				$db->rollback();
			}
