<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
if(!$arResult["NavShowAlways"]) {
	if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
		return;
}
$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");
?>
<div class="pagination">
	<?if ($arResult["NavPageNomer"] > 1) {?>
		<?if ($arResult["NavPageNomer"] > 2) {?>
            <a class="paginationPrevNext" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>">Назад</a>
		<?} else {?>
            <a class="paginationPrevNext" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>">Назад</a>
		<?}?>
	<?}?>
	<?$page = $arResult["nStartPage"]?>
	<?while($page <= $arResult["nEndPage"]) {?>
		<?if ($page == $arResult["NavPageNomer"]) {?>
            <span class="paginationCurrent"><?=$page?></span>
		<?} else {?>
            <a class="paginationPage" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$page?>"><?=$page?></a>
		<?}?>
		<?$page++?>
	<?}?>
	<?if($arResult["NavPageNomer"] < $arResult["NavPageCount"]) {?>
        <a class="paginationPrevNext" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>">Далее</a>
	<?}?>
</div>