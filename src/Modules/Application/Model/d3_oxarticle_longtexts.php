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

namespace D3\Contenttabs\Modules\Application\Model;

use D3\Contenttabs\Application\Model\contentTabs as TabsModel;
use D3\Contenttabs\Application\Model\contentTabs;
use D3\ModCfg\Application\Model\Exception\d3_cfg_mod_exception;
use D3\ModCfg\Application\Model\Exception\d3ShopCompatibilityAdapterException;
use Doctrine\DBAL\DBALException;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseErrorException;
use OxidEsales\Eshop\Core\Exception\StandardException;
use OxidEsales\Eshop\Core\Field;

/**
 * extends Article manager with content tab functionality
 */
class d3_oxarticle_longtexts extends d3_oxarticle_longtexts_parent
{
    protected $_aD3ContentTabsSkipSaveFields = array();

    /**
     * @param string $sOXID
     *
     * @return bool
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     */
    public function load($sOXID)
    {
        $blReturn = parent::load($sOXID);

        /** @var contentTabs $oContentTabs */
        $oContentTabs = oxNew(contentTabs::class, $this);
        $oContentTabs->addTabFields();

        return $blReturn;
    }

    /**
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function save()
    {
        $blRet = parent::save();

        /** @var contentTabs $oContentTabs */
        $oContentTabs = oxNew(contentTabs::class, $this);
        $oContentTabs->saveTabFields();

        return $blRet;
    }

    /**
     * Deletes record and other information related to this article such as images from DB,
     * also removes variants. Returns true if entry was deleted.
     *
     * @param string $sOXID Article id
     *
     * @throws \Exception
     *
     * @return bool
     */
    public function delete($sOXID = null)
    {
        if (!$sOXID) {
            $sOXID = $this->getId();
        }

        if ($sOXID) {
            oxNew( TabsModel::class, $this )->deleteAllLongtexts( $sOXID );
        }

        return parent::delete($sOXID);
    }

    protected function _skipSaveFields()
    {
        parent::_skipSaveFields();

        $this->_aSkipSaveFields = array_merge($this->_aSkipSaveFields, $this->_aD3ContentTabsSkipSaveFields);
    }

    public function getFieldNames()
    {
        /** @var contentTabs $oContentTabs */
        $oContentTabs = oxNew(contentTabs::class, $this);

        foreach ($oContentTabs->getNewArticleFields() as $sFieldName)
        {
            $this->_addField(
                $sFieldName,
                (int) $oContentTabs->isMultilingualField($oContentTabs->getTableFieldNameFromArticleField($sFieldName))
            );

            if (!in_array($sFieldName, $this->_aD3ContentTabsSkipSaveFields)) {
                $this->_aD3ContentTabsSkipSaveFields[] = $sFieldName;
            }
        }

        return parent::getFieldNames();
    }

    /**
     * @return contentTabs
     */
    public function d3GetContentTabs()
    {
        return oxNew(contentTabs::class, $this);
    }

    /**
     * Get article long description
     *
     * @return object $oField field object
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function getLongDescription()
    {
        if ($this->d3CanShowTab(1)) {
            return parent::getLongDescription();
        }

        return oxNew(Field::class);
    }

    /**
     * @param $iTab
     *
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function d3CanShowTab($iTab)
    {
        return $this->d3GetContentTabs()->canGetLongDescription($iTab);
    }

    /**
     * @param $iTab
     *
     * @return mixed|object|Field|string
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function d3GetLongDescriptionTitle($iTab)
    {
        return $this->d3GetContentTabs()->getLongDescriptionTitleFromArticleObject($iTab);
    }

    /**
     * @param $iTab
     *
     * @return mixed|object|Field
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function d3GetLongDescription($iTab)
    {
        if ($iTab == 1) {
            return $this->getLongDescription();
        }

        return $this->d3GetContentTabs()->getLongDescriptionFromArticleObject($iTab);
    }
}
