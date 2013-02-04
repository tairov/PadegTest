<?php

namespace Service;

use Lib\Config\ConfigInterface;
use Lib\Declinatio\LangBase;

/**
 * Words case declination service
 */
class CaseService implements CaseServiceInterface {
    
    /**
     * Lang models instances
     * 
     * @var array
     */
    protected $langModels = array();
    
    /**
     * Config object
     * 
     * @var Lib\Config\ConfigInterface
     */
    protected $config = null;
    
    /**
     * Instantiate service 
     */
    public function __construct(ConfigInterface $config) {
        $this->config = $config;
    }
    
    /**
     * Decline for case a full name as:
     * [LastName FirstName]
     * 
     * @example $caseService->declineFullName('ru', 2, 'M', 'Дымба Харлампий');
     * @param string $lang
     * @param int $caseId
     * @param string $sex
     * @param string $fullName 
     * 
     * @return string $result declined full name
     */
    public function declineFullName($lang, $caseId, $sex, $fullName) {
        $nameArr = explode(' ', $fullName);
        if (count($nameArr) != 2) {
            throw new CaseServiceException('Wrong fullname');
        }
        list($lastName, $firstName) = $nameArr;
        $result = $this->declineLastName($lang, $caseId, $sex, $lastName)
                . ' ' . $this->declineFirstName($lang, $caseId, $sex, $firstName);
        return $result;
    }
    
    /**
     * Decline word as last name
     * 
     * @param string $lang
     * @param int $caseId
     * @param string $sex
     * @param string $name
     * @return string
     */
    public function declineLastName($lang, $caseId, $sex, $name) {
        return $this->declineWord(LangBase::TYPE_LASTNAME, $lang, $caseId, $sex, $name);
    }
    
    
    /**
     * Decline word as first name
     * 
     * @param string $lang
     * @param int $caseId
     * @param string $sex
     * @param string $name
     * @return string
     */
    public function declineFirstName($lang, $caseId, $sex, $name) {
        return $this->declineWord(LangBase::TYPE_FIRSTNAME, $lang, $caseId, $sex, $name);
    }
    
    /**
     * Decline for case one word
     * 
     * @param string $type LangBase::TYPE_FIRSTNAME or LangBase::TYPE_LASTNAME
     * @param string $lang
     * @param int $caseId
     * @param string $sex
     * @param string $word
     * 
     * @return string 
     */
    public function declineWord($type, $lang, $caseId, $sex, $word) {
        $result = $this->getLangModel($lang)->declineWord($type, $caseId, $sex, $word);
        return $result;
    }
    
    /**
     * Return lang model
     * 
     * @param string $lang
     * @return Lib\Declinatio\LangBase 
     */
    protected function getLangModel($lang) {
        $lang = strtolower($lang);
        if (!isset($this->langModels[$lang])) {
            $modelName = 'Lib\\Declinatio\\Lang' . ucfirst($lang);
            $config = $this->config->get('lang_' . $lang);
            $model = new $modelName($config);
            $this->langModels[$lang] = $model;
        }
        
        return $this->langModels[$lang];
    }
}