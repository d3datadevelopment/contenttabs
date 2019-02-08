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

use OxidEsales\Eshop\Application as OxidApplication;

/**
 * Metadata version
 */
$sMetadataVersion = '2.0';

$sModuleId = 'd3contenttabs';

$sD3Logo = (class_exists(D3\ModCfg\Application\Model\d3utils::class) ? D3\ModCfg\Application\Model\d3utils::getInstance()->getD3Logo() : 'D&sup3;');

/**
 * Module information
 */
$aModule = array(
    'id'             => $sModuleId,
    'title'          => $sD3Logo . ' Content Tabs',
    'description'    => array(
        'de' => 'Dieses Modul bietet die M&ouml;glichkeit umfangreiche Artikelinformationen, auf der ' //
            . 'Detailseite, &uuml;bersichtlich aufzugliedern.<br>Sie sehen dieses Modul auch bei uns im Shop. ' //
            . 'Sie k&ouml;nnen z.B. bei diesem Modul zwischen den Tabs "Beschreibung", "Features" und ' //
            . '"Downloads" w&auml;hlen.',
        'en' => '',
    ),
    'thumbnail'      => 'picture.png',
    'version'        => '4.1.0.1',
    'author'         => 'D&sup3; Data Development (Inh.: Thomas Dartsch)',
    'url'            => 'http://www.shopmodule.com',
    'email'          => 'support@shopmodule.com',
    'extend'         => array(
        OxidApplication\Component\Widget\ArticleDetails::class  => \D3\Contenttabs\Modules\Application\Component\Widget\d3_oxwarticledetails_contenttabs::class,
        OxidApplication\Model\Article::class                    => \D3\Contenttabs\Modules\Application\Model\d3_oxarticle_longtexts::class,
    ),
    'controllers'   => array(
        'd3contenttabs_settings'    => \D3\Contenttabs\Application\Controller\Admin\settings::class,
        'd3contenttabs_support'     => \D3\Contenttabs\Application\Controller\Admin\support::class,
        'd3contenttabs_tablist'     => \D3\Contenttabs\Application\Controller\Admin\contentTabList::class,
        'd3contenttabs_tabs'        => \D3\Contenttabs\Application\Controller\Admin\contentTabs::class,
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
        'onActivate' => \D3\ModCfg\Application\Model\Install\d3install::class . '::checkUpdateStart',
    ),
    'blocks'         => array(
        // azure / flow blocks
        array(
            'template' => 'page/details/inc/tabs.tpl',
            'block'    => 'details_tabs_longdescription',
            'file'     => 'Application/views/blocks/details_tabs_longdescription.tpl',
        ),
    ),
    'settings' => array(
        array(
            'group'     => 'd3thememapping_module',
            'name'      => 'd3custParentThemeMappedToFlow_'.$sModuleId,
            'type'      => 'str',
            'value'     => ''
        ),
        array(
            'group'     => 'd3thememapping_module',
            'name'      => 'd3custParentThemeMappedToMobile_'.$sModuleId,
            'type'      => 'str',
            'value'     => ''
        ),
        array(
            'group'     => 'd3thememapping_module',
            'name'      => 'd3custParentThemeMappedToAzure_'.$sModuleId,
            'type'      => 'str',
            'value'     => ''
        ),
    ),
    'd3FileRegister' => array(
        'd3/contenttabs/Modules/Application/Component/Widget/d3_oxwarticledetails_contenttabs.php',
        'd3/contenttabs/Modules/Application/Model/d3_oxarticle_longtexts.php',
        'd3/contenttabs/Application/views/admin/de/d3_contenttabs_lang.php',
        'd3/contenttabs/Application/views/admin/de/module_options.php',
        'd3/contenttabs/Application/translations/de/d3_contenttabs_lang.php',
        'd3/contenttabs/Application/Controller/Admin/contentTabs.php',
        'd3/contenttabs/Application/Controller/Admin/support.php',
        'd3/contenttabs/Application/Controller/Admin/contentTabList.php',
        'd3/contenttabs/Application/Controller/Admin/settings.php',
        'd3/contenttabs/Application/Model/contentTabs.php',
        'd3/contenttabs/metadata.php',
        'd3/contenttabs/Setup/setupWizard.php',
        'd3/contenttabs/IntelliSenseHelper.php',
    ),
    'd3SetupClasses' => array(
        \D3\Contenttabs\Setup\setupWizard::class,
    ),
);
