<?php
/**
 * This Software is the property of Data Development and is protected
 * by copyright law - it is NOT Freeware.
 * Any unauthorized use of this software without a valid license
 * is a violation of the license agreement and will be prosecuted by
 * civil and criminal law.
 * https://www.d3data.de
 *
 * @copyright (C) D3 Data Development (Inh. Thomas Dartsch)
 * @link          https://www.oxidmodule.com
 */

use D3\Contenttabs\Application\Controller\Admin as AdminController;
use OxidEsales\Eshop\Application as OxidApplication;

/**
 * Metadata version
 */
$sMetadataVersion = '2.1';

$sModuleId = 'd3contenttabs';
$sLogo = '<img src="https://logos.oxidmodule.com/d3logo.svg" alt="(D3)" style="height:1em;width:1em"> ';

/**
 * Module information
 */
$aModule = [
    'id'             => $sModuleId,
    'title'          => $sLogo . 'Content Tabs',
    'description'    => [
        'de' => 'Dieses Modul bietet die M&ouml;glichkeit umfangreiche Artikelinformationen, auf der ' //
            . 'Detailseite, &uuml;bersichtlich aufzugliedern.<br>Sie sehen dieses Modul auch bei uns im Shop. ' //
            . 'Sie k&ouml;nnen z.B. bei diesem Modul zwischen den Tabs "Beschreibung", "Features" und ' //
            . '"Downloads" w&auml;hlen.',
        'en' => '',
    ],
    'thumbnail'      => 'picture.png',
    'version'        => '4.2.0.0',
    'author'         => 'D&sup3; Data Development (Inh.: Thomas Dartsch)',
    'url'            => 'https://www.d3data.de',
    'email'          => 'support@shopmodule.com',
    'extend'         => [
        OxidApplication\Component\Widget\ArticleDetails::class  => \D3\Contenttabs\Modules\Application\Component\Widget\d3_oxwarticledetails_contenttabs::class,
        OxidApplication\Model\Article::class                    => \D3\Contenttabs\Modules\Application\Model\d3_oxarticle_longtexts::class,
    ],
    'controllers'   => [
        'd3contenttabs_settings'    => AdminController\settings::class,
        'd3contenttabs_support'     => AdminController\support::class,
        'd3contenttabs_tablist'     => AdminController\contentTabList::class,
        'd3contenttabs_tabs'        => AdminController\contentTabs::class,
    ],
    'templates'      => [
        // Admin
        'contentTabsBase.tpl'    => 'd3/contenttabs/Application/views/admin/tpl/contentTabsBase.tpl',
        'contentTabs.tpl'        => 'd3/contenttabs/Application/views/admin/tpl/contentTabs.tpl',
        'contentTabList.tpl'     => 'd3/contenttabs/Application/views/admin/tpl/contentTabList.tpl',
        // Frontend
        'd3contenttabs_tab1.tpl' => 'd3/contenttabs/Application/views/tpl/d3contenttabs_tab1.tpl',
    ],
    'events'         => [
        'onActivate' => \D3\ModCfg\Application\Model\Install\d3install::class . '::checkUpdateStart',
    ],
    'blocks'         => [
        // azure / flow / wave blocks
        [
            'template' => 'page/details/inc/tabs.tpl',
            'block'    => 'details_tabs_longdescription',
            'file'     => 'Application/views/blocks/details_tabs_longdescription.tpl',
        ]
    ],
    'settings' => [
        [
            'group'     => 'd3thememapping_module',
            'name'      => 'd3custParentThemeMappedToFlow_'.$sModuleId,
            'type'      => 'str',
            'value'     => ''
        ],
        [
            'group'     => 'd3thememapping_module',
            'name'      => 'd3custParentThemeMappedToMobile_'.$sModuleId,
            'type'      => 'str',
            'value'     => ''
        ],
        [
            'group'     => 'd3thememapping_module',
            'name'      => 'd3custParentThemeMappedToAzure_'.$sModuleId,
            'type'      => 'str',
            'value'     => ''
        ],
    ],
];
