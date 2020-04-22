<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
?>
<!DOCTYPE html>
<html>
	<head>
        <?
		    use Bitrix\Main\Page\Asset;
		    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/bootstrap.min.css");
		    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/main.css");

		    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery.min.js");
		    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/bootstrap.min.js");
        ?>
        <link href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" rel="stylesheet">

        <?$APPLICATION->ShowHead();?>
		<title><?$APPLICATION->ShowTitle();?></title>
		<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" /> 	
	</head>
	<body>
		<div id="panel">
			<?$APPLICATION->ShowPanel();?>
		</div>
        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="header-lvl-1">
                            <div class="left">
                                <div class="logo">
                                    <div class="img">
                                        <img src="<?=SITE_TEMPLATE_PATH . '/img/logo.jpg'?>" alt="">
                                    </div>
                                    <div class="title-logo">
                                        <div class="title-strong">
                                            Женский журнал
                                        </div>
                                        <div class="title">
                                            Делимся секретами, обсуждаем сплетни
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="right">
                                <ul class="header-nav">
                                    <li><a href="#">Об авторе</a></li>
                                    <li><a href="">Контакты</a></li>
                                </ul>
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                    <span class="navbar-toggler-icon"></span>
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                            </div>
                        </div>
                        <div class="menu-red">
                            <div class="row">
                                <div class="col-md-12">
									<?$APPLICATION->IncludeComponent(
									        "bitrix:menu",
                                            "menu", Array(
                                                "ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
                                                "CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
                                                "DELAY" => "N",	// Откладывать выполнение шаблона меню
                                                "MAX_LEVEL" => "1",	// Уровень вложенности меню
                                                "MENU_CACHE_GET_VARS" => array(	// Значимые переменные запроса
                                                    0 => "",
                                                ),
                                                "MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
                                                "MENU_CACHE_TYPE" => "A",	// Тип кеширования
                                                "MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
                                                "ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
                                                "USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
                                            ),
                                        false
                                    );?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

	
						