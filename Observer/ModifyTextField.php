<?php
/**
 * Created by PhpStorm.
 * User: tuong-linux
 * Date: 19/09/2018
 * Time: 09:49
 */
namespace Magenest\Movie\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\App\Config\MutableScopeConfigInterface;

class ModifyTextField implements ObserverInterface{
    protected $scopeConfig;
//    protected $mutableScopeConfig;
    protected $reinitConfig;
    protected $configResource;
    protected $logger;
    const TEXT_FIELD = 'movie/moviepage/text_field';
    public function __construct(
        \Psr\Log\LoggerInterface $logger,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
//        MutableScopeConfigInterface $mutableScopeConfig,
        \Magento\Config\Model\ResourceModel\Config $configResource)
    {
        $this->logger = $logger;
        $this->scopeConfig = $scopeConfig;
//        $this->mutableScopeConfig = $mutableScopeConfig;
        $this->configResource = $configResource;
    }
    public function execute(Observer $observer)
    {
        $this->logger->debug('Save movie config');
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        //$textfield = $this->scopeConfig->getValue(self::TEXT_FIELD, $storeScope);
        if ($this->scopeConfig->getValue(self::TEXT_FIELD, $storeScope) == "Ping")
        {
            $text = 'Pong';
            $this->logger->debug('Textfield equals Ping');
//            $this->mutableScopeConfig->setValue(self::TEXT_FIELD, "Pong",
//                \Magento\Framework\App\Config\ScopeConfigInterface::SCOPE_TYPE_DEFAULT,0);
            $this->configResource->saveConfig(self::TEXT_FIELD,$text,
                \Magento\Framework\App\Config\ScopeConfigInterface::SCOPE_TYPE_DEFAULT,0);
        }
        $modded = $this->scopeConfig->getValue(self::TEXT_FIELD, $storeScope);
    }
}