<?php

/**
 * This Software is the property of Data Development and is protected
 * by copyright law - it is NOT Freeware.
 *
 * Any unauthorized use of this software without a valid license
 * is a violation of the license agreement and will be prosecuted by
 * civil and criminal law.
 *
 * http://www.shopmodule.com
 *
 * @copyright (C) D3 Data Development (Inh. Thomas Dartsch)
 * @author    D3 Data Development - Daniel Seifert <support@shopmodule.com>
 * @link      http://www.oxidmodule.com
 */

namespace D3\Contenttabs\Application\Controller\Admin;

use \OxidEsales\Eshop\Application\Controller\Admin\AdminController;

/**
 * Class settings
 * @package D3\ContentTabs\Application\Controller\Admin
 */
class settings extends AdminController
{
    protected $_sThisTemplate = 'contentTabsBase.tpl';

    /**
     * @return string
     */
    public function render()
    {
        $this->_aViewData['sListClass'] = contentTabList::class;
        $this->_aViewData['sMainClass'] = contentTabs::class;
        return parent::render();
    }
}
