<?php
/**
 * This Software is the property of Data Development and is protected
 * by copyright law - it is NOT Freeware.
 * Any unauthorized use of this software without a valid license
 * is a violation of the license agreement and will be prosecuted by
 * civil and criminal law.
 * http://www.shopmodule.com
 *
 * @copyright (C) D3 Data Development (Inh. Thomas Dartsch)
 * @link          http://www.oxidmodule.com
 */

/**
 * Metadata version
 */
$sMetadataVersion = '1.1';

$sD3Logo = (class_exists(d3\modcfg\Application\Model\d3utils::class) ? d3\modcfg\Application\Model\d3utils::getInstance()->getD3Logo() : 'D&sup3;');

/**
 * Module information
 */
$aModule = array(
    'id'             => 'd3contenttabs',
    'title'          => $sD3Logo . ' Content Tabs',
    'description'    => array(
        'de' => 'Dieses Modul bietet die M&ouml;glichkeit umfangreiche Artikelinformationen, auf der ' //
            . 'Detailseite, &uuml;bersichtlich aufzugliedern.<br>Sie sehen dieses Modul auch bei uns im Shop. ' //
            . 'Sie k&ouml;nnen z.B. bei diesem Modul zwischen den Tabs "Beschreibung", "Features" und ' //
            . '"Downloads" w&auml;hlen.',
        'en' => '',
    ),
    'thumbnail'      => 'picture.png',
    'version'        => '4.0.0.0',
    'author'         => 'D&sup3; Data Development (Inh.: Thomas Dartsch)',
    'url'            => 'http://www.shopmodule.com',
    'email'          => 'support@shopmodule.com',
    'extend'         => array(
        'oxwarticledetails' => 'd3/contenttabs/modules/Application/Component/Widget/d3_oxwarticledetails_contenttabs',
        'oxarticle'         => 'd3/contenttabs/modules/Application/Model/d3_oxarticle_longtexts',
    ),
    'files'          => array(
        // Admin
        \d3\contenttabs\Application\Controller\Admin\settings::class       => 'd3/contenttabs/Application/Controller/Admin/settings.php',
        \d3\contenttabs\Application\Controller\Admin\support::class        => 'd3/contenttabs/Application/Controller/Admin/support.php',
        \d3\contenttabs\Application\Controller\Admin\contentTabList::class => 'd3/contenttabs/Application/Controller/Admin/contentTabList.php',
        \d3\contenttabs\Application\Controller\Admin\contentTabs::class    => 'd3/contenttabs/Application/Controller/Admin/contentTabs.php',
        //
        \d3\contenttabs\Application\Model\contentTabs::class               => 'd3/contenttabs/Application/Model/contentTabs.php',
        \d3\contenttabs\Setup\setupWizard::class                           => 'd3/contenttabs/Setup/setupWizard.php',
    ),
    'templates'      => array(
        // Admin
        'contentTabsBase.tpl'    => 'd3/contenttabs/Application/views/admin/tpl/contentTabsBase.tpl',
        'contentTabs.tpl'        => 'd3/contenttabs/Application/views/admin/tpl/contentTabs.tpl',
        'contentTabList.tpl'     => 'd3/contenttabs/Application/views/admin/tpl/contentTabList.tpl',
        // Frontend
        'd3contenttabs_tab1.tpl' => 'd3/contenttabs/Application/views/tpl/d3contenttabs_tab1.tpl',
    ),
    'events'         => array(
        'onActivate' => \d3\modcfg\Application\Model\Install\d3install::class . '::checkUpdateStart',
    ),
    'blocks'         => array(
        // azure / flow blocks
        array(
            'template' => 'page/details/inc/tabs.tpl',
            'block'    => 'details_tabs_longdescription',
            'file'     => 'Application/views/blocks/details_tabs_longdescription.tpl',
        ),
    ),
    'settings'       => array(),
    'd3FileRegister' => array(
        'd3/contenttabs/metadata.php',
        'd3/contenttabs/Application/views/admin/de/d3_contenttabs_lang.php',
        'd3/contenttabs/Application/translations/de/d3_contenttabs_lang.php',
        'd3/contenttabs/Application/views/blocks/details_tabs_longdescription.tpl',
    ),
    'd3SetupClasses' => array(
        \d3\contenttabs\Setup\setupWizard::class,
    ),
);
