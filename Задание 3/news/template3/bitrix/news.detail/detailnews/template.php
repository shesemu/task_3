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
<div class="article-card">
	<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N"):?>
		<div class="article-card__title"><?echo $arResult["PREVIEW_TEXT"]?></div>
	<?endif;?>
	<div class="article-card__date"><?echo $arResult["DISPLAY_DATE"]?></div>
	<div class="article-card__content">
	<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
		<div class="article-card__image sticky"><img 
                                                     src="<?$arResult["DETAIL_PICTURE"]["SRC"]?>" data-object-fit="cover"/>
        </div>
	<?endif?>
	<?if($arResult["DETAIL_TEXT"]!="N"){?>
	<div class="article-card__text">
            <div class="block-content" data-anim="anim-3"><p><?echo $arResult["DETAIL_TEXT"]?></p></div>
	</div><?}?>
	<?
	if(array_key_exists("USE_SHARE", $arParams) && $arParams["USE_SHARE"] == "Y")
	{
		?>
		<div class="news-detail-share">
			<noindex>
			<?
			$APPLICATION->IncludeComponent("bitrix:main.share", "", array(
					"HANDLERS" => $arParams["SHARE_HANDLERS"],
					"PAGE_URL" => $arResult["~DETAIL_PAGE_URL"],
					"PAGE_TITLE" => $arResult["~NAME"],
					"SHORTEN_URL_LOGIN" => $arParams["SHARE_SHORTEN_URL_LOGIN"],
					"SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
					"HIDE" => $arParams["SHARE_HIDE"],
				),
				$component,
				array("HIDE_ICONS" => "Y")
			);
			?>
			</noindex>
		</div>
		<?
	}
	?>
</div>