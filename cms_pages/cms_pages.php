<?php
/**
* 2007-2021 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author    jsolorzano <solorzano202009@gmail.com>
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*/



require_once(_PS_MODULE_DIR_.'cms_pages/classes/CmsPages.class.php');

if (!defined('_PS_VERSION_')) {
    exit;
}


class cms_pages extends Module
{


    protected $config_form = false;
    const PREFIX = 'cms_pages_';
    protected $err = '';

    public function __construct()
    {
    
        $this->name = 'cms_pages';
        $this->tab = 'administration';
        $this->version = '1.0.0';
        $this->author = 'José Solorzano';
        $this->need_instance = 0;

        /**
         * Set $this->bootstrap to true if your module is compliant with bootstrap (PrestaShop 1.6)
         */
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('CMS PAGES');
        $this->description = $this->l('Páginas registradas');

        $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
    }

    /**
     * Don't forget to create update methods if needed:
     * http://doc.prestashop.com/display/PS16/Enabling+the+Auto-Update
     */
    public function install()
    {
        Configuration::updateValue('CMSPAGES_LIVE_MODE', false);
        Configuration::updateValue('SLIDER_URL_PAGES', 'aviso-legal, terminos-y-condiciones-de-uso, privacidad-confidencialidad');

        return parent::install() &&
            $this->registerHook('addWebserviceResources') &&
            $this->registerHook('displayFooterPayment');
    }

    public function uninstall()
    {
        Configuration::deleteByName('CMSPAGES_LIVE_MODE');
        Configuration::deleteByName('SLIDER_URL_PAGES');

        return parent::uninstall();
    }
    
    // Función por defecto para acciones de configuración del módulo
	public function getContent()
    {
		$this->context->smarty->assign('save', false);  // Variable bandera para saber si se ha enviado el formulario
		// Actualizamos la variable instalada en caso de enviar el formulario de configuración
		if(Tools::isSubmit(submitUrls)){
			$myurls = Tools::getValue('slider_url_pages');
			Configuration::updateValue('SLIDER_URL_PAGES', $myurls);
			$this->context->smarty->assign('save', true);
		}
		// Pasamos el dato de la variable instalada al motor de plantillas smarty
		$urlvalue = Configuration::get('SLIDER_URL_PAGES');
		$this->context->smarty->assign('urlvalue', $urlvalue);
		
        return $this->display(__FILE__, 'configure.tpl');
    }

    public function setConfig($name, $value)
    {
        return Configuration::updateValue(self::PREFIX . $name, $value, TRUE);
    }
   
    public function hookAddWebserviceResources()
    {
        return array(
            'cms_pages' => array(
                'description' => 'Páginas registradas',
                'class' => 'CmsPages'
            ),
        );
    }
    
    public function hookDisplayFooterPayment($params){
		$urlvalue = Configuration::get('SLIDER_URL_PAGES');
		$this->context->smarty->assign('urlvalue', $urlvalue);
		
		return $this->display(__FILE__, 'displayFooter.tpl');
	}
   
}


