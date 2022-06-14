<?php

$sLangName = "Deutsch";
// -------------------------------
// RESOURCE IDENTITFIER = STRING
// -------------------------------
$aLang = [
    'charset'                                          => 'UTF-8',
    // Navigation
    'd3mxContentTabs'                                  => '<i class=\'fa fa-folder\'></i> Content Tabs',
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
    'D3_CONTENT_TABS_MIGRATED_TABLE_FIELDS'            => 'Das Modul bringt ab Version 4.0.0.0 eine eigene ' //
        . 'Datenbanktabelle \'d3contenttabs\' mit. <br>' //
        . 'In dieser werden zukünftig neue Tab-Inhalte abgelegt und ausgelesen.<br><br>' //
        . 'In Ihrer Shopdatenbank wurden alte Felder (%s) mit Inhalt registriert. ' //
        . 'Im Zuge des Updates werden Titel und/oder Content-Tab-Langtexte von %d ' //
        . 'alten Feld/ern in die neue Tabelle \'d3contenttabs\' migriert.<br>' //
        . 'Anschließend stehen Ihnen dann alle vorhandenen, bereits gepflegten Tab-Inhalte wieder zur Verfügung.<br><br>' //
        . 'Die alten moduleigenenen Datenbankfelder (oxarticles__* und oxartextends__*) werden im Anschluss der ' //
        . 'Datenmigration entfernt. Legen Sie bei Bedarf vor Ausführung dieses Schrittes ein Backup der beiden ' //
        . 'Datenbanktabellen an!<br><br>'
        . 'Beachten Sie bitte, dass die Migration abhängig vom Umfang der Daten einige Zeit in Anspruch nehmen kann.',
    'D3_CONTENT_TABS_DELETE_TABLE_FIELDS'              => 'In diesem Instalationsschritt wird versucht, die in der ' //
        . 'Shopdatenbank gefundenen alten Felder zu entfernen.<br><br>'
        . 'Die SQL-Querys die dabei ausgeführt werden lauten wie folgt:<br>',
    'D3_CONTENT_TABS_EXC_NOTFILLED_TITLE_CONTENT'      => "Der Langtext kann nicht gespeichert werden, da dieser keinen Titel oder Inhalt hat.",
];
