<?php

$sLangName = "Deutsch";
// -------------------------------
// RESOURCE IDENTITFIER = STRING
// -------------------------------

$sModId = 'd3contenttabs';

$sD3Help_mappedTo = '<p>Unsere Module sind für die Standardthemes des '.
    'OXID-Shops vorbereitet. Sie müssen hier nichts eintragen, wenn sich das von Ihnen im Shop verwendete Theme von '.
    'einem dieser Standard-Themes ableitet (vererbt wird). Handelt es sich um ein komplett eigenes Theme, so tragen '.
    'Sie dessen Parent-Theme-ID bei dem OXID-Standard-Theme ein, dem es am nächsten kommt.</p>'.
    '<p>Weitere Informationen hierzu finden Sie in unserem <a '.
    'href="https://faq.d3data.de/allgemein/template-bloecke-dem-eigenen-theme-zuordnen/" target="FAQ">FAQ-Eintrag</a>.</p>';

return [
    'charset'                                          => 'UTF-8',
    // Navigation
    'd3mxContentTabs'                                  => "<i class='fa fa-folder'></i> Content Tabs",
    'd3mxContentTabs_settings'                         => 'Tabverwaltung',
    'd3mxContentTabs_main'                             => 'Stamm',
    // article-list-fields?!
    'GENERAL_ARTICLE_D3LONGDESCTITLE'                  => 'Titel 1 ContentTabs',
    'GENERAL_ARTICLE_D3LONGDESC2TITLE'                 => 'Titel 2 ContentTabs',
    'GENERAL_ARTICLE_D3LONGDESC3TITLE'                 => 'Titel 3 ContentTabs',
    'GENERAL_ARTICLE_D3LONGDESC4TITLE'                 => 'Titel 4 ContentTabs',
    'GENERAL_ARTICLE_D3LONGDESC5TITLE'                 => 'Titel 5 ContentTabs',
    'D3_ARTICLE_MAIN_TITLE_CONTENT_TAB_EDIT'           => 'Langtexte des Artikels',
    // Admin-Template
    'D3_CONTENT_TABS_FIRST_SELECT_ARTICLE'             => 'Bitte erst einen Artikel aus der Liste zum Editieren ausw&auml;hlen.',
    'D3_CONTENT_TABS_TITEL'                            => 'Tab-Titel',
    'D3_CONTENT_TABS_TITEL_DEFAULT'                    => 'ohne Angabe heißt der Tab "Beschreibung"',
    'D3_CONTENT_TABS_ARTICLE_VARIANTSELECT'            => 'Wechsel zu Variante <i>(Art.-Nr. -- Auswahlname)</i>',
    'D3_CONTENT_TABS_ARTICLE_PARENTARTICLE'            => 'Elternartikel',
    'D3_CONTENT_TABS_ARTICLE_GENERAL_LANGUAGE'         => 'In Sprache',
    'D3_CONTENT_TABS_ARTICLE_SELECTED_ARTICLE_TO_EDIT' => 'Aktuell editieren Sie den Artikel',
    'D3_CONTENT_TABS_FIELD'                            => 'Langtext',
    'D3_CONTENT_TABS_ARTICLE_EDITOR_PLAINTEXT_HINT'    => '<b>Anmerkung:</b><br>'
        . 'Bei verwendung eines HTML-Editors, benutzen Sie "Source" anstatt "Design", <br>'
        . 'wenn Sie Zeilenumbrüche unverändert übernehmen möchten (z. B. für plaintext E-Mail).',
    'D3_CONTENT_TABS_GENERAL_SAVE_IN'                  => 'Kopiere in Sprache',
    'D3_CONTENT_TABS_GENERAL_DELETE'                   => 'Tab löschen',
    'D3_CONTENT_TABS_ARTICLE_MAIN_ACTIVE'              => 'Aktiv',
    'D3_CONTENT_TABS_ARTICLE_MAIN_ACTIVE_HELP'         => 'Beachten Sie bitte, dass der 1. Langtext nur inaktiv ' //
        . 'gesetzt werden kann, sofern ein eigener Tab-Titel vergeben wird!',
    // Installation
    'D3_CONTENT_TABS_MIGRATED_TABLE_FIELDS'            => 'Das Modul bringt ab Version 4.0.0.0 eine eigene Datenbanktabelle \'d3contenttabs\' mit. <br>' //
        . 'In dieser werden zukünftig neue Tab-Inhalte abgelegt und ausgelesen.<br><br>' //
        . 'In Ihrer Shopdatenbank wurden alte Felder (%s) mit Inhalt registriert. ' //
        . 'Im Zuge des Updates werden Titel und/oder Content-Tab-Langtexte von %d ' //
        . "alten Feld/ern in die neue Tabelle 'd3contenttabs' migriert.<br>" //
        . 'Anschließend stehen Ihnen dann alle vorhandenen, bereits gepflegten Tab-Inhalte wieder zur Verfügung.<br><br>' //
        . 'Die alten moduleigenenen Datenbankfelder (oxarticles__* und oxartextends__*) werden im Anschluss der ' //
        . 'Datenmigration entfernt. Legen Sie bei Bedarf vor Ausführung dieses Schrittes ein Backup der beiden ' //
        . 'Datenbanktabellen an!<br><br>'
        . 'Beachten Sie bitte, dass die Migration abhängig vom Umfang der Daten einige Zeit in Anspruch nehmen kann.',
    'D3_CONTENT_TABS_DELETE_TABLE_FIELDS'              => 'In diesem Instalationsschritt wird versucht, die in der ' //
        . 'Shopdatenbank gefundenen alten Felder zu entfernen.<br><br>'
        . 'Die SQL-Querys die dabei ausgeführt werden lauten wie folgt:<br>',
    'D3_CONTENT_TABS_EXC_NOTFILLED_TITLE_CONTENT'      => "Der Langtext kann nicht gespeichert werden, da dieser keinen Titel oder Inhalt hat.",

    'INT_ARG_EXCEPTION_MESSAGE' => 'The required minimum quantity of 4 has not been reached or the maximum height 
                                    of 10 has been exceeded. Check module the settings!',

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
