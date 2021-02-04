$db = db::connect();
$varBack=$_POST['varFront'];
$estado='ok';
$db->begin();
if($varBack)
	$query="UPDATE `tabla` SET `campo`=".$varBack." WHERE pkCampotabla=".$pkBack;
else
	$query = "INSERT INTO `tabla`(`campo`) VALUES ("..")";
$db->execute($query);
if($db->estado())
	$db->commit();
else{
	$estado='error';
	$db->rollback();
}
