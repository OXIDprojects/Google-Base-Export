<?php
/**
 *    This file is part of Google Base Export module.
 *    
 *    Google Base Export module is free software: you can redistribute it and/or modify
 *    it under the terms of the GNU General Public License as published by
 *    the Free Software Foundation, either version 3 of the License, or
 *    (at your option) any later version.
 *
 *    You can redistribute it and/or modify it under the terms of the 
 *    GNU General Public License as published by the Free Software Foundation, 
 *    either version 3 of the License, or (at your option) any later version.
 *
 *    See <http://www.gnu.org/licenses/>.
 *
 * @link http://www.oxid-esales.com
 */

/**
 * General export class.
 */
class GoogleBase_GenExport_Do extends GoogleBase_GenExport_Do_parent
{
    public $sClass_do = "googlebase_GenExport_do";

    //output paths and files
    public $sExportFileType = "txt";
    public $sExportFileName = "googlebase";

    /**
     * Does Export line by line on position iCnt
     *
     * @param integer $iCnt export position
     *
     * @return bool
     */
    public function nextTick( $iCnt )
    {
        $myConfig = oxConfig::getInstance();
        $iExportedItems = $iCnt;
        if ( $oArticle = $this->getOneArticle( $iCnt, $blContinue ) ) {
            $smarty = oxUtilsView::getInstance()->getSmarty();
            $smarty->assign_by_ref( "linenr", $iCnt );
            $smarty->assign_by_ref( "article", $oArticle );
            $smarty->assign( "spr", $myConfig->getConfigParam( 'sCSVSign' ) );
            $smarty->assign( "encl", $myConfig->getConfigParam( 'sGiCsvFieldEncloser' ) );
            $smarty->assign( "sManufacturer", $this->_getManufactorTitle( $oArticle->oxarticles__oxmanufacturerid->value ) );
            $smarty->assign( "sPictureUrl", $this->_checkPictureUrl( $oArticle ) );
            $smarty->assign( "sCategory", $oArticle->getCategory()->oxcategories__oxtitle->value );
            $this->write( $smarty->fetch( "googlebase_genexport.tpl", $this->getViewID() ) );
            return ++$iExportedItems;
        }

        return $blContinue;
    }

    /**
     * Give the manufacture title back.
     *
     * @param string $sOxManufactureId oxid from the manufactor of the current product
     *
     * @return string
     */
    private function _getManufactorTitle( $sOxManufactureId )
    {   
        $sQuery  = "select oxtitle from `oxmanufacturers` where oxid = '".$sOxManufactureId."' LIMIT 1";
        $oResult = oxDb::getDb()->Execute($sQuery);
        return $oResult->fields[0];
    }
    
    /**
     * Check the Pic URL. If there is no pic saved, give null back.
     * 
     * @param object $oArticle Article object
     * @param int    $iIndex   Picture index number
     * 
     * @return mixed
     */             
    private function _checkPictureUrl( $oArticle, $iIndex = 1 )
    {
        $sPicUrl  = null;
        $sPicName = $oArticle->{"oxarticles__oxpic".$iIndex}->value;

        if( strpos( $sPicName, 'nopic.jpg' ) === false ) {
            $sPicUrl = $oArticle->getPictureUrl( $iIndex );
            $sPicUrl = str_replace( '/$this->sTheme/tpl/../pictures/0/nopic.jpg', "/pictures/$iIndex/$sPicName", $sPicUrl );
        }
        return $sPicUrl;
    }
}