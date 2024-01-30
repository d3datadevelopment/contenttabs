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
 * @author        D3 Data Development <support@shopmodule.com>
 * @link          https://www.oxidmodule.com
 */

namespace D3\Contenttabs\Setup;

use D3\ModCfg\Application\Model\Exception\d3_cfg_mod_exception;
use D3\ModCfg\Application\Model\Exception\d3ParameterNotFoundException;
use D3\ModCfg\Application\Model\Exception\d3ShopCompatibilityAdapterException;
use D3\ModCfg\Application\Model\Install\d3install_updatebase;
use D3\ModCfg\Application\Model\d3database;
use Doctrine\DBAL\DBALException;
use OxidEsales\Eshop\Core\DatabaseProvider;
use OxidEsales\Eshop\Core\Exception\ConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseErrorException;
use OxidEsales\Eshop\Core\Exception\StandardException;
use OxidEsales\Eshop\Core\Registry;
use OxidEsales\Eshop\Core\Exception\DatabaseException;
use ReflectionException;

/**
 * Class setupWizard
 */
class setupWizard extends d3install_updatebase
{
    public $sModKey = 'd3contenttabs';
    public $sModName = 'Content Tabs';
    public $sModVersion = '4.3.1.0';
    public $sModRevision = '4310';
    public $sBaseConf = '--------------------------------------------------------------------------------
Udiv2==bXBHRGR2NmNtSjFNMlhDME05TUU1MTVtWkt5YVlHQmY4QUxnSGdnaGU5ODd3Rm10Y29zT2VWe
jFHaExwaWVQaGhDcW9SV2duekQxaFprbStaQzVHNEZLaUVPak9PRUxtMS95d1pyR2c2UUk3NysyOURNc
TB1bE1FT1FGU2ZWM1kyZmo3b3BaWEM1Y3U5Y1lmOEREMisvbVZWT3NUM1hQa25XSFJkQnluOEJSQW5wU
DJZWUQweGpIcmJFeGt0Z1FSQ1FtN09xZnlBWC94Q016cjlKaStxcU52QTZ0R0VZYnhpR0lhdk9aWE4rS
W5MdGMrNlBEWWszamhTYkhOOU45QlpZMXcvTzAyb3cxL0pXclJaMkxMeitRVFpTZStMeGEycTB4dG1oU
TR4NkpodDdQMDZTRy9RSDNNU2N4UVZnVTlBZzh1V3VjbWFncms5RVd5a0hXRnl3PT0=
--------------------------------------------------------------------------------';
    public $sRequirements = '';
    public $sBaseValue = '';
    public $sMinModCfgVersion = '5.3.0.0'; /* minimale Modul-Connector Version */

    protected $_aUpdateMethods = [
        [ // Moduleintrag anlegen, wenn noch nicht vorhanden
               'check' => 'checkModCfgItemExist',
               'do'    => 'updateModCfgItemExist'
        ],
        [ // alte Datenbankfelder, sofern vorhanden, korrekt (um)benennen
               'check' => 'checkRenameFields',
               'do'    => 'fixRenameFields'
        ],
        [ // #5886 eigene Datenbanktabelle, legt diese an, wenn noch nicht vorhanden
               'check' => 'existContentTabTable',
               'do'    => 'addContentTabTable'
        ],
        [ // #5886 Uebernahme der Daten von oxarticles/oxartextends in die eigene Tabelle
               'check' => 'needToMigrateArticleDataToContenttabsTable',
               'do'    => 'migrateArticleDataToContenttabsTable'
        ],
        [ // #5886 alte DB-Felder nach erfolgreicher Uebernahme der Daten aus oxarticles/oxartextends entfernen
               'check' => 'needToDeleteOldContentTabDatabaseFields',
               'do'    => 'deleteOldContentTabDatabaseFields'
        ],
        [ // Datenbankfelder korrigieren, sofern notwendig
               'check' => 'checkFields',
               'do'    => 'fixFields'
        ],
        [ // alte oxconfig-Einträge vorhanden?
               'check' => 'hasOldModuleItems',
               'do'    => 'deleteOldModuleItems'
        ],
        [ // auf gueltige Modul-Dateien pruefen - see metadata.php d3FileRegister
               'check' => 'hasUnregisteredFiles',
               'do'    => 'showUnregisteredFiles'
        ],
        [ // viewusage
               'check' => 'hasContentTabViewTables',
               'do'    => 'registerContentTabViewTables'
        ],
        [ // viewusage
               'check' => 'needToRegisterContentTabViewTable',
               'do'    => 'registerContentTabViewTable'
        ],
        [ // Moduleintrag aktualisieren
               'check' => 'checkModCfgSameRevision',
               'do'    => 'updateModCfgSameRevision'
        ],
    ];

    public $aMultiLangTables = ['d3contenttabs'];

    public $aFields = [
        'OXID'        => [
            'sTableName'  => 'd3contenttabs',
            'sFieldName'  => 'OXID',
            'sType'       => 'char(32)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => 'D3 ContentTabs',
            'sExtra'      => '',
            'blMultilang' => false,
            'blAddBreak'  => false,
        ],
        'ARTICLEOXID' => [
            'sTableName'  => 'd3contenttabs',
            'sFieldName'  => 'ARTICLEOXID',
            'sType'       => 'char(32)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => 'article assignment',
            'sExtra'      => '',
            'blMultilang' => false,
            'blAddBreak'  => false,
        ],
        'OXACTIVE'    => [
            'sTableName'  => 'd3contenttabs',
            'sFieldName'  => 'OXACTIVE',
            'sType'       => 'TINYINT(1)',
            'blNull'      => false,
            'sDefault'    => '0',
            'sComment'    => 'active flag',
            'sExtra'      => '',
            'blMultilang' => false,
            'blAddBreak'  => false,
        ],
        'TABIDENT'    => [
            'sTableName'  => 'd3contenttabs',
            'sFieldName'  => 'TABIDENT', // Tab 2 , Tab 3, Tab 4, etc.
            'sType'       => 'TINYINT(1) UNSIGNED', // 0 - 255
            'blNull'      => false,
            'sDefault'    => '0',
            'sComment'    => 'tabident',
            'sExtra'      => '',
            'blMultilang' => false,
            'blAddBreak'  => false,
        ],
        'TABTITLE'    => [
            'sTableName'  => 'd3contenttabs',
            'sFieldName'  => 'TABTITLE',
            'sType'       => 'varchar(255)',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => 'title for tabs',
            'sExtra'      => '',
            'blMultilang' => true,
            'blAddBreak'  => false,
        ],
        'TABCONTENT'  => [
            'sTableName'  => 'd3contenttabs',
            'sFieldName'  => 'TABCONTENT',
            'sType'       => 'TEXT',
            'blNull'      => false,
            'sDefault'    => '',
            'sComment'    => 'D3 ContentTab content',
            'sExtra'      => '',
            'blMultilang' => true,
            'blAddBreak'  => false,
        ],
        'TIMESTAMP'   => [
            'sTableName'  => 'd3contenttabs',
            'sFieldName'  => 'OXTIMESTAMP',
            'sType'       => 'TIMESTAMP',
            'blNull'      => false,
            'sDefault'    => 'CURRENT_TIMESTAMP',
            'sComment'    => 'last change',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
    ];

    public $aIndizes = [
        'PRIMARY'      => [
            'sTableName'  => 'd3contenttabs',
            'sType'       => d3database::INDEX_TYPE_PRIMARY,
            'aFields'     => [
                'OXID' => 'OXID',
            ],
            'blMultilang' => false,
        ],
        'D3ARTICLETAB' => [
            'sTableName'  => 'd3contenttabs',
            'sType'       => d3database::INDEX_TYPE_UNIQUE,
            'sName'       => 'D3ARTICLETAB',
            'aFields'     => [
                'ARTICLEOXID' => 'ARTICLEOXID',
                'TABIDENT'    => 'TABIDENT',
            ],
            'blMultilang' => false,
        ],
        'OXACTIVE'     => [
            'sTableName'  => 'd3contenttabs',
            'sType'       => d3database::INDEX_TYPE_INDEX,
            'sName'       => 'OXACTIVE',
            'aFields'     => [
                'OXACTIVE' => 'OXACTIVE',
            ],
            'blMultilang' => false,
        ],
    ];

    // before oxid 6 > removed in oxid 6
    public $aOldTabDbFields = [
        'D3LONGDESC2'      => [
            'sTableName'  => 'oxartextends',
            'sFieldName'  => 'D3LONGDESC2', //oxlongdesc2 -> OXLONGDESC2 -> D3LONGDESC2 (Type: TEXT)
            'sType'       => 'TEXT',
            'blNull'      => false,
            'sDefault'    => false,
            'sComment'    => 'D3 ContentTabs',
            'sExtra'      => '',
            'blMultilang' => true,
            'blAddBreak'  => true,
        ],
        'D3LONGDESC3'      => [
            'sTableName'  => 'oxartextends',
            'sFieldName'  => 'D3LONGDESC3', // oxlongdesc3 -> OXLONGDESC3 -> D3LONGDESC3
            'sType'       => 'TEXT',
            'blNull'      => false,
            'sDefault'    => false,
            'sComment'    => 'D3 ContentTabs',
            'sExtra'      => '',
            'blMultilang' => true,
            'blAddBreak'  => true,
        ],
        'D3LONGDESC4'      => [
            'sTableName'  => 'oxartextends',
            'sFieldName'  => 'D3LONGDESC4', // oxlongdesc4 -> OXLONGDESC4 -> D3LONGDESC4
            'sType'       => 'TEXT',
            'blNull'      => false,
            'sDefault'    => false,
            'sComment'    => 'D3 ContentTabs',
            'sExtra'      => '',
            'blMultilang' => true,
            'blAddBreak'  => true,
        ],
        'D3LONGDESC5'      => [
            'sTableName'  => 'oxartextends',
            'sFieldName'  => 'D3LONGDESC5', // oxlongdesc5 -> OXLONGDESC5 -> D3LONGDESC5
            'sType'       => 'TEXT',
            'blNull'      => false,
            'sDefault'    => false,
            'sComment'    => 'D3 ContentTabs',
            'sExtra'      => '',
            'blMultilang' => true,
            'blAddBreak'  => true,
        ],
        'D3LONGDESCTITLE'  => [
            'sTableName'  => 'oxarticles',
            'sFieldName'  => 'D3LONGDESCTITLE', // OXLONGDESCTITLE -> D3LONGDESCTITLE
            'sType'       => 'varchar(255)',
            'blNull'      => false,
            'sDefault'    => false,
            'sComment'    => 'D3 ContentTabs',
            'sExtra'      => '',
            'blMultilang' => true,
            'blAddBreak'  => true,
        ],
        'D3LONGDESC2TITLE' => [
            'sTableName'  => 'oxarticles',
            'sFieldName'  => 'D3LONGDESC2TITLE', // oxlongdesc2title -> OXLONGDESC2TITLE -> D3LONGDESC2TITLE
            'sType'       => 'varchar(255)',
            'blNull'      => false,
            'sDefault'    => false,
            'sComment'    => 'D3 ContentTabs',
            'sExtra'      => '',
            'blMultilang' => true,
            'blAddBreak'  => true,
        ],
        'D3LONGDESC3TITLE' => [
            'sTableName'  => 'oxarticles',
            'sFieldName'  => 'D3LONGDESC3TITLE', // oxlongdesc3title -> OXLONGDESC3TITLE -> D3LONGDESC3TITLE
            'sType'       => 'varchar(255)',
            'blNull'      => false,
            'sDefault'    => false,
            'sComment'    => 'D3 ContentTabs',
            'sExtra'      => '',
            'blMultilang' => true,
            'blAddBreak'  => true,
        ],
        'D3LONGDESC4TITLE' => [
            'sTableName'  => 'oxarticles',
            'sFieldName'  => 'D3LONGDESC4TITLE', // oxlongdesc4title -> OXLONGDESC4TITLE -> D3LONGDESC4TITLE
            'sType'       => 'varchar(255)',
            'blNull'      => false,
            'sDefault'    => false,
            'sComment'    => 'D3 ContentTabs',
            'sExtra'      => '',
            'blMultilang' => true,
            'blAddBreak'  => true,
        ],
        'D3LONGDESC5TITLE' => [
            'sTableName'  => 'oxarticles',
            'sFieldName'  => 'D3LONGDESC5TITLE', // oxlongdesc5title -> OXLONGDESC5TITLE -> D3LONGDESC5TITLE
            'sType'       => 'varchar(255)',
            'blNull'      => false,
            'sDefault'    => false,
            'sComment'    => 'D3 ContentTabs',
            'sExtra'      => '',
            'blMultilang' => true,
            'blAddBreak'  => true,
        ],
    ];

    // before oxid 6, but we have to rename these fields afterward > f.e. shop/module-updates
    public $aRenameFields = [
        'D3LONGDESC2'      => [
            'sTableName'     => 'oxartextends',
            'mOldFieldNames' => ['oxlongdesc2', 'OXLONGDESC2'],
            'sFieldName'     => 'D3LONGDESC2', //oxlongdesc2 -> OXLONGDESC2 -> D3LONGDESC2
            'blMultilang'    => true,
            'blAddBreak'     => true,
        ],
        'D3LONGDESC3'      => [
            'sTableName'     => 'oxartextends',
            'mOldFieldNames' => ['oxlongdesc3', 'OXLONGDESC3'],
            'sFieldName'     => 'D3LONGDESC3', // oxlongdesc3 -> OXLONGDESC3 -> D3LONGDESC3
            'blMultilang'    => true,
            'blAddBreak'     => true,
        ],
        'D3LONGDESC4'      => [
            'sTableName'     => 'oxartextends',
            'mOldFieldNames' => ['oxlongdesc4', 'OXLONGDESC4'],
            'sFieldName'     => 'D3LONGDESC4', // oxlongdesc4 -> OXLONGDESC4 -> D3LONGDESC4
            'blMultilang'    => true,
            'blAddBreak'     => true,
        ],
        'D3LONGDESC5'      => [
            'sTableName'     => 'oxartextends',
            'mOldFieldNames' => ['oxlongdesc5', 'OXLONGDESC5'],
            'sFieldName'     => 'D3LONGDESC5', // oxlongdesc5 -> OXLONGDESC5 -> D3LONGDESC5
            'blMultilang'    => true,
            'blAddBreak'     => true,
        ],
        'D3LONGDESCTITLE'  => [
            'sTableName'     => 'oxarticles',
            'mOldFieldNames' => 'OXLONGDESCTITLE',
            'sFieldName'     => 'D3LONGDESCTITLE', // OXLONGDESCTITLE -> D3LONGDESCTITLE
            'blMultilang'    => true,
            'blAddBreak'     => true,
        ],
        'D3LONGDESC2TITLE' => [
            'sTableName'     => 'oxarticles',
            'mOldFieldNames' => ['oxlongdesc2title', 'OXLONGDESC2TITLE'],
            'sFieldName'     => 'D3LONGDESC2TITLE', // oxlongdesc2title -> OXLONGDESC2TITLE -> D3LONGDESC2TITLE
            'blMultilang'    => true,
            'blAddBreak'     => true,
        ],
        'D3LONGDESC3TITLE' => [
            'sTableName'     => 'oxarticles',
            'mOldFieldNames' => ['oxlongdesc3title', 'OXLONGDESC3TITLE'],
            'sFieldName'     => 'D3LONGDESC3TITLE', // oxlongdesc3title -> OXLONGDESC3TITLE -> D3LONGDESC3TITLE
            'blMultilang'    => true,
            'blAddBreak'     => true,
        ],
        'D3LONGDESC4TITLE' => [
            'sTableName'     => 'oxarticles',
            'mOldFieldNames' => ['oxlongdesc4title', 'OXLONGDESC4TITLE'],
            'sFieldName'     => 'D3LONGDESC4TITLE', // oxlongdesc4title -> OXLONGDESC4TITLE -> D3LONGDESC4TITLE
            'blMultilang'    => true,
            'blAddBreak'     => true,
        ],
        'D3LONGDESC5TITLE' => [
            'sTableName'     => 'oxarticles',
            'mOldFieldNames' => ['oxlongdesc5title', 'OXLONGDESC5TITLE'],
            'sFieldName'     => 'D3LONGDESC5TITLE', // oxlongdesc5title -> OXLONGDESC5TITLE -> D3LONGDESC5TITLE
            'blMultilang'    => true,
            'blAddBreak'     => true,
        ],
    ];

    protected $_aRefreshMetaModuleIds = ['d3contenttabs'];

    public $aOldModuleFiles = [];

    protected $aDeleteOldContenTabDbField = [];

    protected $aMigrateContents = [];

    /******************************************************************************************************************/
    /*** eigene Tabelle fuer Content-Tabs anlegen / Pruefen und Daten migrieren *****************************************/
    /******************************************************************************************************************/
    /**
     * @return bool
     * @throws DatabaseConnectionException
     */
    public function needToDeleteOldContentTabDatabaseFields()
    {
        // we have to delete all old fields! : $this->aOldTabDbFields
        foreach ($this->aOldTabDbFields as $aOldDbfield) {
            // mehrsprachigkeit erforderlich?
            if ($aOldDbfield['blMultilang']) {
                // je sprache ist ein subfeld zu pruefen
                for ($i = 0; count(Registry::getLang()->getLanguageArray()) > $i; $i++) {
                    // felder je sprache
                    $sAddfield = '';
                    if ($i > 0) {
                        $sAddfield = '_' . $i;
                    }

                    // check if field exist an has no content
                    $sKey    = $aOldDbfield['sTableName'] . '__' . $aOldDbfield['sFieldName'] . $sAddfield;
                    $mReturn = $this->existOldTabDatabaseFieldSql($sKey);

                    if (false === $mReturn) {
                        // skip field, we dont need to check this twice it does not exist!
                        continue;
                    }

                    if (is_string($mReturn)) {
                        // Feld existiert
                        $mReturn = $this->existOldTabDatabaseFieldSql($sKey, true);

                        if (false === $mReturn) {
                            // skip field, we dont need to check this twice its empty
                            $this->aDeleteOldContenTabDbField[$sKey] = [
                                'sTableName'         => $aOldDbfield['sTableName'],
                                'sOriginalFieldName' => $aOldDbfield['sFieldName'],
                                'sFieldName'         => $aOldDbfield['sFieldName'] . $sAddfield
                            ];
                        }
                    }
                }
            } else {
                // check if field exist and has content
                $sKey    = $aOldDbfield['sTableName'] . '__' . $aOldDbfield['sFieldName'];
                $mReturn = $this->existOldTabDatabaseFieldSql($sKey);

                if (false === $mReturn) {
                    // skip field, we dont need to check this twice it does not exist!
                    continue;
                }

                if (is_string($mReturn)) {
                    // Feld existiert
                    $mReturn = $this->existOldTabDatabaseFieldSql($sKey, true);

                    if (false === $mReturn) {
                        // skip field, we dont need to check this twice its empty
                        $this->aDeleteOldContenTabDbField[$sKey] = [
                            'sTableName'         => $aOldDbfield['sTableName'],
                            'sOriginalFieldName' => $aOldDbfield['sFieldName'],
                            'sFieldName'         => $aOldDbfield['sFieldName']
                        ];
                    }
                }
            }
        }

        if (count($this->aDeleteOldContenTabDbField) > 0) {
            return true;
        }

        return false;
    }

    /**
     * @return bool
     * @throws DatabaseConnectionException
     */
    public function deleteOldContentTabDatabaseFields()
    {
        // show message, migrate?!
        $sTranslation = Registry::getLang()->translateString('D3_CONTENT_TABS_DELETE_TABLE_FIELDS');
        foreach ($this->aDeleteOldContenTabDbField as $item) {
            $sTranslation .= "ALTER TABLE " . $item['sTableName'] . " DROP COLUMN " . $item['sFieldName'] . ";" . PHP_EOL;
        }

        if ($this->hasExecute()) {
            $oDb = DatabaseProvider::getDb();
            foreach ($this->aDeleteOldContenTabDbField as $item) {
                try {
                    // field exist if no Exception occurs
                    $oDb->execute("ALTER TABLE " . $item['sTableName'] . " DROP COLUMN " . $item['sFieldName']);
                } catch (DatabaseException $oEx) {
                    // $oEx->getCode() : 1054
                    // $oEx->getMessage() : 'Unknown column 'D3LONGDESCTEST_1' in 'field list''
                }
            }
        }

        return $this->_confirmMessage($sTranslation);
    }

    /**
     * @return bool
     * @throws DatabaseConnectionException
     */
    public function needToMigrateArticleDataToContenttabsTable()
    {
        // Pruefung existieren die alten Felder noch und sind diese gefuellt?
        $blFieldsExist = false;
        foreach ($this->aOldTabDbFields as $aOldDbfield) {
            if ($aOldDbfield['blMultilang']) {
                // mehrsprachigkeit erforderlich? wenn ja, je sprache ein subfeld
                for ($i = 0; count(Registry::getLang()->getLanguageArray()) > $i; $i++) {
                    // felder je sprache
                    $sAddfield = '';
                    if ($i > 0) {
                        $sAddfield = '_' . $i;
                    }

                    $sKey = $aOldDbfield['sTableName'] . '__' . $aOldDbfield['sFieldName'] . $sAddfield;
                    // only check if field exist
                    $mReturn = $this->existOldTabDatabaseFieldSql($sKey);
                    if (false === $mReturn) {
                        // skip field, we dont need to check this fields twice it does not exist!
                        continue;
                    }

                    // check for has content
                    $mReturn = $this->existOldTabDatabaseFieldSql($sKey, true);
                    if (false === $mReturn) {
                        // skip field, we dont need to check this fields twice it doesn't have any content
                        continue;
                    }

                    $this->aMigrateContents[$sKey] = [
                        'sTableName'         => $aOldDbfield['sTableName'],
                        'sOriginalFieldName' => $aOldDbfield['sFieldName'],
                        'sFieldName'         => $aOldDbfield['sFieldName'] . $sAddfield
                    ];
                    $blFieldsExist                 = true;
                }
            } else {
                $sKey = $aOldDbfield['sTableName'] . '__' . $aOldDbfield['sFieldName'];

                // only check if field exist
                $mReturn = $this->existOldTabDatabaseFieldSql($sKey);
                if (false === $mReturn) {
                    // skip field, we dont need to check this fields twice it does not exist!
                    continue;
                }

                // check for has content
                $mReturn = $this->existOldTabDatabaseFieldSql($sKey, true);
                if (false === $mReturn) {
                    // skip field, we dont need to check this fields twice it doesn't have any content
                    continue;
                }

                $this->aMigrateContents[$sKey] = [
                    'sTableName'         => $aOldDbfield['sTableName'],
                    'sOriginalFieldName' => $aOldDbfield['sFieldName'],
                    'sFieldName'         => $aOldDbfield['sFieldName'],
                ];
                $blFieldsExist                 = true;
            }
        }

        return $blFieldsExist;
    }

    /**
     * @param string $sKey
     * @param bool $blNotEmpty
     *
     * @return false|string
     * @throws DatabaseConnectionException
     */
    public function existOldTabDatabaseFieldSql($sKey, $blNotEmpty = false)
    {
        $aKey = explode('__', $sKey);
        if (false == is_array($aKey) && 2 != count($aKey)) {
            return false;
        }

        $oDb     = DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC);
        $sSelect = " SELECT " . $aKey[1] . " FROM " . $aKey[0];
        if ($blNotEmpty) {
            $sSelect .= " WHERE " . $aKey[1] . " != '' ";
        }
        $sSelect .= " LIMIT 1";

        try {
            // field exist if no Exception occurs, return content of the selected field
            return $oDb->getOne($sSelect);
        } catch (DatabaseException $oEx) {
            // $oEx->getCode() : 1054
            // $oEx->getMessage() : 'Unknown column 'D3LONGDESCTEST_1' in 'field list''

            return false;
        }
    }

    /**
     * @return bool
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function migrateArticleDataToContenttabsTable()
    {
        if (false == is_array($this->aMigrateContents) && empty($this->aMigrateContents)) {
            return false;
        }

        $sTableFielNames = '';
        foreach ($this->aMigrateContents as $aOldContent) {
            $sTableFielNames .= $aOldContent['sTableName'] . '__' . $aOldContent['sFieldName'] . ', ';
        }
        $sTableFielNames = substr(strtolower($sTableFielNames), 0, strlen($sTableFielNames) - 2);

        // show message, migrate?!
        $aArgs        = ['dbfieldnames' => $sTableFielNames, 'count' => count($this->aMigrateContents)];
        $sTranslation = Registry::getLang()->translateString('D3_CONTENT_TABS_MIGRATED_TABLE_FIELDS');
        $sTranslation = sprintf($sTranslation, $aArgs['dbfieldnames'], $aArgs['count']);
        $blRet        = $this->_confirmMessage($sTranslation);

        if ($this->hasExecute()) {
            // NOTE standard-langtext-inhalt bleibt in oxarticles!
            // auch wenn es einen Titel dazu gibt
            // der Langtext wird weiterhin in oxarticles abgelegt/abgeholt!!!
            // andernfalls kaeme es mit inaktivem Modul zu ....

            // ----> transfer data to new table
            $oDb = DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC);
            foreach ($this->aMigrateContents as $aOldContent) {
                //    map:
                //    d3contenttabs__OXID                 > wird vom Shop generiert
                //    d3contenttabs__ARTICLEOXID          > oxarticles__OXID bzw. oxartextends__OXID
                //    d3contenttabs__OXACTIVE             > 1 bei einer uebernahme
                //
                //    d3contenttabs__TABIDENT             > wird spannend ... > Tab 2 , Tab 3, Tab 4, etc.
                //        anhand von:
                //        -----------
                //        d3contenttabs__TABTITLE             > oxarticles__D3LONGDESCTITLE
                //                                                          D3LONGDESC2TITLE
                //                                                          D3LONGDESC3TITLE
                //                                                          D3LONGDESC4TITLE
                //                                                          D3LONGDESC5TITLE
                //
                //        d3contenttabs__TABCONTENT           > oxartextends__D3LONGDESC2
                //                                                            D3LONGDESC3
                //                                                            D3LONGDESC4
                //                                                            D3LONGDESC5
                //
                //    d3contenttabs__OXTIMESTAMP          > CURRENT_TIMESTAMP
                $sSelect = "SELECT oxid as 'oxid', " . $aOldContent['sFieldName'] . " as 'content', oxtimestamp as 'time' "
                    . " FROM " . $aOldContent['sTableName']
                    . " WHERE  " . $aOldContent['sFieldName'] . " != ''";

                $result = $oDb->getAll($sSelect);
                if (count($result) > 0) {
                    // we got min one result
                    for ($i = 0; $i < count($result); $i++) {
                        // var_dump($result[$i]['oxid'], $result[$i]['content'], $result[$i]['time']);
                        if (strpos(strtolower($aOldContent['sOriginalFieldName']), "title") !== false) {
                            // es geht um den Titel
                            $newFieldName = 'TABTITLE';
                        } else {
                            // es geht um den Langtext
                            $newFieldName = 'TABCONTENT';
                        }

                        // mehrsprachigkeit
                        if ($aOldContent['sOriginalFieldName'] != $aOldContent['sFieldName']) {
                            $newFieldName .= substr($aOldContent['sFieldName'], -2);
                        }

                        // besteht aus zwei schritten, 1. daten in die neue Tabelle rumnehmen
                        $sMigrate1 = " INSERT INTO d3contenttabs (`OXID`, `ARTICLEOXID`, `OXACTIVE`, `TABIDENT`, `" . $newFieldName . "`, `OXTIMESTAMP`) VALUES "
                            . " (" //
                            . "'" . Registry::getUtilsObject()->generateUId() . "'," //
                            . "'" . $result[$i]['oxid'] . "'," //
                            . "'1'," //
                            . "'" . $this->getContentTabId($aOldContent['sOriginalFieldName']) . "'," //
                            . "'" . $result[$i]['content'] . "'," // TABTITLE or TABCONTENT
                            . "'" . $result[$i]['time'] . "'" //
                            . ") " //
                            . " ON DUPLICATE KEY UPDATE " //
                            . $newFieldName . " = '" . $result[$i]['content'] . "'";


                        // inhalt aus altem feld entfernen...
                        $sMigrate2 = " UPDATE " . $aOldContent['sTableName'] //
                            . " SET " . $aOldContent['sFieldName'] . " = '' " //
                            . " WHERE oxid = '" . $result[$i]['oxid'] . "' ";

                        try {
                            // field exist if no Exception occurs, return content of the selected field
                            $blMigrated = $oDb->execute($sMigrate1);
                            $blUpdated  = $oDb->execute($sMigrate2);

                            if ($blUpdated && $blMigrated) {
                                $this->setActionLog('SQL', $sMigrate1, __METHOD__);
                                $this->setActionLog('SQL', $sMigrate2, __METHOD__);
                                $this->setUpdateBreak(false);
                            }
                        } catch (DatabaseException $oEx) {
                            // $oEx->getCode() : 1054
                            // $oEx->getMessage() : 'Unknown column 'D3LONGDESCTEST_1' in 'field list''
                            // do nothing, cause we like to finish the remaining data!
                        }
                    }
                }
            }
        }

        return $blRet;
    }

    public function getContentTabId($sFieldName)
    {
        switch (strtolower($sFieldName)) {
            case 'd3longdesctitle':
                return 1;
            case 'd3longdesc2title':
            case 'd3longdesc2':
                return 2;
            case 'd3longdesc3title':
            case 'd3longdesc3':
                return 3;
            case 'd3longdesc4title':
            case 'd3longdesc4':
                return 4;
            case 'd3longdesc5title':
            case 'd3longdesc5':
                return 5;
        }

        return 0; // unknown field...
    }

    /**
     * @return bool true, if table is missing
     * @return bool
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws DBALException
     */
    public function existContentTabTable()
    {
        return $this->_checkTableNotExist('d3contenttabs');
    }

    /**
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws ConnectionException
     */
    public function addContentTabTable()
    {
        $this->setInitialExecMethod(__METHOD__);
        return $this->_addTable2(
            'd3contenttabs',
            $this->aFields,
            $this->aIndizes,
            'tab configuration'
        );
    }

    /**********************************************************************/
    /*** Datei Verzeichniskontrolle ***************************************/
    /**********************************************************************/
    /**
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws d3ParameterNotFoundException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     * @throws StandardException
     * @throws ReflectionException
     */
    public function hasUnregisteredFiles()
    {
        return $this->_hasUnregisteredFiles($this->sModKey, ['blocks', 'd3FileRegister']);
    }

    /**
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     * @throws ReflectionException
     */
    public function showUnregisteredFiles()
    {
        return $this->_showUnregisteredFiles($this->sModKey, ['blocks', 'd3FileRegister']);
    }


    /**
     * @return bool
     * @throws ConnectionException
     */
    public function hasContentTabViewTables()
    {
        return $this->checkMultiLangTables('d3contenttabs');
    }

    /**
     * @return bool
     * @throws ConnectionException
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function registerContentTabViewTables()
    {
        return $this->fixRegisterMultiLangTables('d3contenttabs');
    }

    /**
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function needToRegisterContentTabViewTable()
    {
        return $this->checkConvertToMultiLangTable('d3contenttabs');
    }

    /**
     * @return bool
     * @throws ConnectionException
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function registerContentTabViewTable()
    {
        return $this->convertToMultilangTable('d3contenttabs');
    }
}
