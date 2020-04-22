<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<div class="container">
    <div class="content">
        <div class="row">
            <?foreach($arResult["ITEMS"] as $arItem):?>
                <?
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                ?>
                <div class="col-md-4 col-sm-6">
                    <div class="item">
                        <div class="item-img">
                            <?if(!empty($arItem["PREVIEW_PICTURE"]["SRC"])):?>
                                <img class="desctop-img" src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="">
                            <?else:?>
                                <img class="desctop-img" src="\bitrix\templates\aft\components\bitrix\news\news\bitrix\news.list\.default\zaglushka.jpg" alt="">
							<?endif;?>
							<?if(!empty($arItem["PROPERTIES"]["mobile_detail_picture"]["VALUE"])):?>
                                <img class="mobile-img" src="<?=CFile::GetPath($arItem["PROPERTIES"]["mobile_detail_picture"]["VALUE"])?>" alt="">
                            <?endif;?>
                            <div class="rating">
                                <span class="fas fa-thumbs-up" data-id="<?=$arItem['ID']?>"></span>
                                <span class="fas fa-thumbs-down" data-id="<?=$arItem['ID']?>"></span>
                                <div class="rating-count">
                                    <?=$arItem["PROPERTIES"]["rating"]["VALUE"]?>
                                </div>
                            </div>
                        </div>
                        <div class="item-title">
                            <a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a>
                        </div>
                        <div class="item-description">
                            <?=$arItem["PREVIEW_TEXT"]?>
                        </div>
                    </div>
                </div>
            <?endforeach;?>
        </div>
        <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
            <br /><?=$arResult["NAV_STRING"]?>
        <?endif;?>
    </div>
</div>
<script>
    $( document ).ready(function() {
        $('.fa-thumbs-up').on('click', function (e) {
            var formTemplatePath = '<?=$this->GetFolder()?>';
            var data = new FormData();
            var elem = $(this);
            var id = $(this).attr('data-id');
            data.append('action', 'rating-up');
            data.append('id', id);
            $.ajax({
                url: formTemplatePath + '/ajax.php',
                data: data,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function(response) {
                    if(response){
                        elem.siblings(".rating-count").html(response);
                    }
                }
            });
        });

        $('.fa-thumbs-down').on('click', function (e) {
            var formTemplatePath = '<?=$this->GetFolder()?>';
            var data = new FormData();
            var elem = $(this);
            var id = $(this).attr('data-id');
            data.append('action', 'rating-down');
            data.append('id', id);
            $.ajax({
                url: formTemplatePath + '/ajax.php',
                data: data,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function(response) {
                    if(response){
                        elem.siblings(".rating-count").html(response);
                    }
                }
            });
        });
    });
</script>


