<?php

/**
 * @category Multibyte
 * @package Multibyte_VatFix
 * @author Roman Hutterer <info@multibyte.at>
 */
class Multiybte_VATFix_Helper_Data extends Mage_Customer_Helper_Data {

    const VAT_VALIDATION_WSDL_URL = 'http://ec.europa.eu/taxation_customs/vies/checkVatService.wsdl';

    /**
     * override the checkVatNumber from CustomerHelper
     * @param string $countryCode
     * @param string $vatNumber
     * @param string $requesterCountryCode
     * @param string $requesterVatNumber
     * @return boolean
     */
    public function checkVatNumber($countryCode, $vatNumber, $requesterCountryCode = '', $requesterVatNumber = '') {
        //@RHU take the VAT without the first two signs (which are the countrycode
        $vatNumber = substr(str_replace(' ', '', trim($vatNumber)), 2);
        return parent::checkVatNumber($countryCode, $vatNumber, $requesterCountryCode, $requesterVatNumber);
    }

}