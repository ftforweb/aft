<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
        <?
        foreach($arResult as $arItem):
            if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
                continue;
        ?>
            <?if($arItem["SELECTED"]):?>
                <li class="nav-item active">
                    <a class="nav-link" href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
                </li>
            <?else:?>
                <li class="nav-item">
                    <a class="nav-link" href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
                </li>
            <?endif?>

        <?endforeach?>

        </ul>
    </div>
</nav>
<?endif?>
