<?php
/**
 * This Software is the property of Data Development and is protected
 * by copyright law - it is NOT Freeware.
 *
 * Any unauthorized use of this software without a valid license
 * is a violation of the license agreement and will be prosecuted by
 * civil and criminal law.
 *
 * https://www.d3data.de
 *
 * @copyright (C) D3 Data Development (Inh. Thomas Dartsch)
 * @author    D3 Data Development - Daniel Seifert <support@shopmodule.com>
 * @link      https://www.oxidmodule.com
 */

$sModId = 'd3contenttabs';

$sD3Help_mappedTo = '<p>Unsere Module sind für die Standardthemes des '.
    'OXID-Shops vorbereitet. Sie müssen hier nichts eintragen, wenn sich das von Ihnen im Shop verwendete Theme von '.
    'einem dieser Standard-Themes ableitet (vererbt wird). Handelt es sich um ein komplett eigenes Theme, so tragen '.
    'Sie dessen Parent-Theme-ID bei dem OXID-Standard-Theme ein, dem es am nächsten kommt.</p>'.
    '<p>Weitere Informationen hierzu finden Sie in unserem <a '.
    'href="https://faq.d3data.de/allgemein/template-bloecke-dem-eigenen-theme-zuordnen/" target="FAQ">FAQ-Eintrag</a>.</p>';

$aLang = [
    'charset'                                 => 'UTF-8',

    'SHOP_MODULE_GROUP_d3thememapping_global'     => 'Template-Blöcke dem eigenen Theme zuordnen (globale Einstellungen für D3-Module)',
    'SHOP_MODULE_GROUP_d3thememapping_module'     => 'Template-Blöcke dem eigenen Theme zuordnen (Einstellung nur für dieses Modul)',
    'SHOP_MODULE_d3custParentThemeMappedToMobile_'.$sModId => 'Ist das hier eingetragene Theme aktiv, werden die "<b>Mobile</b>"-Templateblöcke des Moduls verwendet.',
    'SHOP_MODULE_d3custParentThemeMappedToAzure_'.$sModId => 'Ist das hier eingetragene Theme aktiv, werden die "<b>Azure</b>"-Templateblöcke des Moduls verwendet.',
    'SHOP_MODULE_d3custParentThemeMappedToFlow_'.$sModId => 'Ist das hier eingetragene Theme aktiv, werden die "<b>Flow</b>"-Templateblöcke des Moduls verwendet.',

    'HELP_SHOP_MODULE_d3custParentThemeMappedToMobile_'.$sModId => $sD3Help_mappedTo,
    'HELP_SHOP_MODULE_d3custParentThemeMappedToAzure_'.$sModId => $sD3Help_mappedTo,
    'HELP_SHOP_MODULE_d3custParentThemeMappedToFlow_'.$sModId => $sD3Help_mappedTo,

    //tab count
    'SHOP_MODULE_GROUP_d3ctextension_settings'      => 'Einstellungen',
    'SHOP_MODULE_d3ctextension_amount_tabs'         => 'Menge der Tabs'
];
