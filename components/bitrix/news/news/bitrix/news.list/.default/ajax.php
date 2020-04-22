<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
require_once ($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/classes/general/csv_data.php");
use Bitrix\Main\Application;
use Bitrix\Main\Web\Cookie;
if(CModule::IncludeModule("iblock")) {
	$ip = \Bitrix\Main\Service\GeoIp\Manager::getRealIp();
	global $APPLICATION;

	if($_POST['action'] == 'rating-up') {
		$id = $_POST['id'];
		$arSelect = Array("ID", "NAME", "PROPERTY_rating");
		$arFilter = Array("IBLOCK_ID" => 1, "ID" => $id);
		$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
		while ($ob = $res->GetNextElement()) {
			$arFields = $ob->GetFields();
			$currentCount = $arFields['PROPERTY_RATING_VALUE'];
		}
		$updateCount = $currentCount + 1;
		$arCoockie = explode('|', $_COOKIE['RATING']);
		if(!in_array($id, $arCoockie) ){
			CIBlockElement::SetPropertyValuesEx($id, false, array('rating' => $updateCount));
			echo $updateCount;
		}

		$arRating[] = file_get_contents( 'rating.csv' );
		$data = date( 'Y-m-d h:i:s').';'.$ip.';'.$currentCount.'+1'."\n";
		array_push($arRating, $data);
		file_put_contents('rating.csv',$arRating);
		$cook_val = '|'.$id;
		if(empty($_COOKIE['RATING'])){
			setcookie("RATING", $cook_val, time()+86400, "/");
		}
		else {
			$strCoockie = $_COOKIE['RATING'];
			$strCoockie .= $cook_val;
			setcookie("RATING", $strCoockie, time()+86400, "/");

		}
	}

	if($_POST['action'] == 'rating-down') {
		$id = $_POST['id'];
		$arSelect = Array("ID", "NAME", "PROPERTY_rating");
		$arFilter = Array("IBLOCK_ID" => 1, "ID" => $id);
		$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
		while ($ob = $res->GetNextElement()) {
			$arFields = $ob->GetFields();
			$currentCount = $arFields['PROPERTY_RATING_VALUE'];
		}
		$updateCount = $currentCount - 1;
		$arCoockie = explode('|', $_COOKIE['RATING']);
		if(!in_array($id, $arCoockie) ) {
			CIBlockElement::SetPropertyValuesEx($id, false, array('rating' => $updateCount));
			echo $updateCount;
		}

		$arRating[] = file_get_contents( 'rating.csv' );
		$data = date( 'Y-m-d h:i:s').';'.$ip.';'.$currentCount.'-1'."\n";
		array_push($arRating, $data);
		file_put_contents('rating.csv',$arRating);

		$cook_val = '|'.$id;
		if(empty($_COOKIE['RATING'])){
			setcookie("RATING", $cook_val, time()+86400, "/");
		}
		else {
			$strCoockie = $_COOKIE['RATING'];
			$strCoockie .= $cook_val;
			setcookie("RATING", $strCoockie, time()+86400, "/");

		}
	}
}
?>