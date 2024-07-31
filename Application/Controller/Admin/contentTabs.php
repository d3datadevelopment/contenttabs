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
 * @author        D3 Data Development <support@shopmodule.com>
 * @link          https://www.oxidmodule.com
 */

namespace D3\Contenttabs\Application\Controller\Admin;

use D3\Contenttabs\Application\Model\Constants;
use D3\Contenttabs\Application\Model\contentTabs as TabsModel;
use D3\Contenttabs\Modules\Application\Model\d3_oxarticle_longtexts;
use Exception;
use OxidEsales\Eshop\Application\Controller\Admin\AdminDetailsController;
use D3\ModCfg\Application\Model\Exception\d3_cfg_mod_exception;
use D3\ModCfg\Application\Model\Exception\d3ShopCompatibilityAdapterException;
use Doctrine\DBAL\DBALException;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseErrorException;
use OxidEsales\Eshop\Core\Exception\StandardException;
use OxidEsales\Eshop\Core\Registry;
use OxidEsales\Eshop\Core\Request;
use OxidEsales\Eshop\Application\Model\Article;

/**
 * Class contentTabs
 * @package D3\Contenttabs\Application\Controller\Admin
 */
class contentTabs extends AdminDetailsController
{
    protected $_sTabsTemplate = '@'.Constants::OXID_MODULE_ID.'/admin/contentTabs';

    /**
     * Variant parent product object
     *
     * @var Article
     */
    protected $_oProductParent;

    protected $_sCurrentTabId = '';

    protected $_sActFieldTitleName = '';

    /**
     * Loads article variants data, passes it to Smarty engine and returns name of
     * template file "article_variant.tpl".
     *
     * @return string
     */
    public function render()
    {
        parent::render();

        /** @var string|null $soxId */
        $soxId       = $this->getEditObjectId();

        /** @var d3_oxarticle_longtexts $oArticle */
        $oArticle                 = oxNew(Article::class);
        $this->_aViewData["edit"] = $oArticle;

        if (isset($soxId) && $soxId != "-1") {
            // load object
            $oArticle->loadInLang($this->_iEditLang, $soxId);

            if ($oArticle->isDerived()) {
                $this->_aViewData['readonly'] = true;
            }

            $_POST["language"] = $_GET["language"] = $this->_iEditLang;

            if (0 < $oArticle->getFieldData('oxvarcount')) {
                $oVariants = $oArticle->getAdminVariants($this->_iEditLang);
                $this->_aViewData["mylist"] = $oVariants;
            }

            if ($oArticle->getFieldData('oxparentid')) {
                $this->_aViewData["parentarticle"] = $this->getProductParent($oArticle->getFieldData('oxparentid'));
            }

            /** @var TabsModel $oTabsModel */
            $oTabsModel = oxNew(TabsModel::class, $oArticle);
            $sFullLongDescField = $oTabsModel->getArticleContentFieldName($this->getSelectedTabId());
            if (false == empty($sFullLongDescField)) {
                $this->_aViewData["editor"] = $this->generateTextEditor(
                    '100%',
                    280,
                    $oArticle,
                    $sFullLongDescField,
                    'details.tpl.css'
                );
            }
        }

        return $this->_sTabsTemplate;
    }

    /**
     * Returns variant parent object
     *
     * @param string $sParentId parent product id
     *
     * @return Article
     */
    protected function getProductParent($sParentId)
    {
        if ($this->_oProductParent === null ||
            ($this->_oProductParent !== false && $this->_oProductParent->getId() != $sParentId)
        ) {
            $this->_oProductParent = false;
            $oProduct              = oxNew(Article::class);
            if ($oProduct->load($sParentId)) {
                $this->_oProductParent = $oProduct;
            }
        }

        return $this->_oProductParent;
    }

    /**
     * @return mixed|string
     */
    public function getLongDescActiveField(): string
    {
        /** @var TabsModel $oTabsModel */
        $oTabsModel = oxNew(TabsModel::class, oxNew(Article::class));
        return $oTabsModel->getArticleActiveFieldName($this->getSelectedTabId());
    }

    /**
     * @return mixed|string
     */
    public function getLongDescTitleField(): string
    {
        /** @var TabsModel $oTabsModel */
        $oTabsModel = oxNew(TabsModel::class, oxNew(Article::class));
        return $oTabsModel->getArticleTitleFieldName($this->getSelectedTabId());
    }

    /**
     * @return mixed|string
     */
    public function getLongDescContentField(): string
    {
        /** @var TabsModel $oTabsModel */
        $oTabsModel = oxNew(TabsModel::class, oxNew(Article::class));
        return $oTabsModel->getArticleContentFieldName($this->getSelectedTabId());
    }

    /**
     * @return null|string
     */
    public function getSelectedTabId()
    {
        $request              = Registry::getRequest();
        $this->_sCurrentTabId = $request->getRequestEscapedParameter('sTabId');

        if (empty($this->_sCurrentTabId)) {
            $this->_sCurrentTabId = 1;
        }

        $this->addTplParam('sCurrentTabId', $this->_sCurrentTabId);

        return $this->_sCurrentTabId;
    }

    /**
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function isActiveFieldSaveable(): bool
    {
        /** @var string|null $soxId */
        $soxId       = $this->getEditObjectId();

        $oArticle = oxNew(Article::class);
        if (isset($soxId) && $soxId != "-1") {
            $oArticle->loadInLang($this->_iEditLang, $soxId);
        }

        $sTabId = Registry::getRequest()->getRequestEscapedParameter('sTabId');
        $sTabId ??= 1;
        if (!isset($soxId)) {
            return true;
        }

        if ($soxId == "-1") {
            return true;
        }

        if (!in_array($sTabId, [1, null])) {
            return true;
        }

        return (bool) strlen($this->getLongDescTitle($oArticle, $sTabId));
    }

    /**
     * template getter for backend / admin
     *
     * @param $oArticle Article
     * @param $sTabId
     *
     * @return string
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function getLongDescTitle($oArticle, string $sTabId)
    {
        $oTabsModel = oxNew(TabsModel::class, $oArticle);
        return $this->getEditValue($oArticle, $oTabsModel->getArticleTitleFieldName($sTabId));
    }

    /**
     * @param $oArticle
     * @param $sTabId
     *
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function isLongDescActive($oArticle, $sTabId): ?bool
    {
        /** @var TabsModel $oTabsModel */
        $oTabsModel = oxNew(TabsModel::class, $oArticle);
        return $oTabsModel->isTabActive($sTabId);
    }

    /**
     * @param $oArticle
     * @param $sTabId
     *
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function tabExists($oArticle, $sTabId): bool
    {
        /** @var TabsModel $oTabsModel */
        $oTabsModel = oxNew(TabsModel::class, $oArticle);

        return !is_null($oTabsModel->isTabActive($sTabId))
            || !is_null($oTabsModel->getLongDescriptionTitleFromArticleObject($sTabId))
            || !is_null($oTabsModel->getLongDescriptionFromArticleObject($sTabId));
    }

    /**
     * template getter for backend / admin
     */
    public function getTabIdList(): array
    {
        return range(1, oxNew(TabsModel::class, oxNew(Article::class))->getTabCount());
    }

    /**
     * @throws Exception
     */
    public function save(): void
    {
        $request         = Registry::get(Request::class);
        $isAllowedToSave = $request->getRequestEscapedParameter("isPermittedToSaveData");

        if (empty($isAllowedToSave)) {
            return;
        }

        parent::save();

        $soxId = $this->getEditObjectId();
        $this->setEditObjectId($soxId);

        if ($soxId == "-1") {
            return;
        }

        /** @var d3_oxarticle_longtexts $oArticle */
        $oArticle = oxNew(Article::class);
        $oArticle->setLanguage($this->_iEditLang);

        if (false == $oArticle->load($soxId)) {
            return;
        }

        $aParams = $request->getRequestEscapedParameter("editval");
        $oArticle->assign($aParams);

        // default longdesc can parsed only, if longtext #1 is selected, all other longtext selections don't contains its value
        if (is_array($aParams) && isset($aParams['oxarticles__oxlongdesc'])) {
            $oArticle->setArticleLongDesc($this->processLongDesc($aParams['oxarticles__oxlongdesc']));
        }

        $oArticle->save();
    }

    /**
     * @throws DBALException
     * @throws DatabaseConnectionException
     */
    public function delete(): void
    {
        $request         = Registry::get(Request::class);
        $isAllowedToSave = $request->getRequestEscapedParameter("isPermittedToSaveData");

        if (empty($isAllowedToSave)) {
            return;
        }

        $aParams = $request->getRequestEscapedParameter("editval");

        $oArticle = oxNew(Article::class);
        $oArticle->load($aParams['oxarticles__oxid']);

        /** @var TabsModel $oTabsModel */
        $oTabsModel = oxNew(TabsModel::class, $oArticle);
        $oTabsModel->loadByArticleTab($aParams['oxarticles__oxid'], $this->getSelectedTabId());
        $oTabsModel->delete();
    }

    /**
     * inhaltliche Uebernahme analog Article_Main
     * wird genutzt zum Abspeichern der Artikel-Langbeschreibung
     *
     * @param $sValue
     */
    protected function processLongDesc($sValue): string|array
    {
        $aSearch  = ['&amp;nbsp;', '&amp;', '&quot;', '&lang=', '<p>&nbsp;</p>', '<p>&nbsp; </p>'];
        $aReplace = ['&nbsp;', '&', '"', '&amp;lang=', '', ''];

        return str_replace($aSearch, $aReplace, $sValue);
    }

    /**
     * Returns string which must be edited by editor
     *
     * @param Article $object object with field will be used for editing
     * @param string  $fieldName  name of editable field
     *
     * @return string
     */
    protected function getEditValue($object, $fieldName)
    {
        if ($fieldName != $object->getCoreTableName().'__oxlongdesc') {
            return parent::getEditValue($object, $fieldName);
        }

        $oDescField = $object->getLongDescription();
        return $oDescField->getRawValue();
    }

    public function getUserMessages()
    {
        return null;
    }

    public function getHelpURL()
    {
        return null;
    }
}
