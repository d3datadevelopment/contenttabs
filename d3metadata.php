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

use D3\Contenttabs\Setup as ModuleSetup;

/**
 * Module information
 */
$aModule = [
    'd3FileRegister' => [
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
        'd3/contenttabs/d3metadata.php',
        'd3/contenttabs/metadata.php',
        'd3/contenttabs/Setup/setupWizard.php',
        'd3/contenttabs/IntelliSenseHelper.php',
    ],
    'd3SetupClasses' => [
        ModuleSetup\setupWizard::class,
    ],
];
