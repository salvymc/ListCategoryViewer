<?php

/**
 * 2007-2022 PrestaShop
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
 *  @author    PrestaShop SA <contact@prestashop.com>
 *  @copyright 2007-2022 PrestaShop SA
 *  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 *  International Registered Trademark & Property of PrestaShop SA
 *  Inserisci il seguente hook in {cartella del tema} -> templates ->
 *  {hook h="displayPrestaCategorySwitcher" category=$category}
 */

if (!defined('_PS_VERSION_')) {
    exit;
}

class ListCategoryViewer extends Module
{
    protected $config_form = false;

    public function __construct()
    {
        $this->name = 'ListCategoryViewer';
        $this->tab = 'front_office_features';
        $this->version = '1.0.1';
        $this->author = 'Salvatore Forino';
        $this->need_instance = 0;

        /**
         * Set $this->bootstrap to true if your module is compliant with bootstrap (PrestaShop 1.6)
         */
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('List Category Viewer');
        $this->description = $this->l('Il modulo permette la visualizzazione delle sottocategorie nella lista prodotti');

        $this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);
    }

    /**
     * Don't forget to create update methods if needed:
     * http://doc.prestashop.com/display/PS16/Enabling+the+Auto-Update
     */
    public function install()
    {
        return parent::install() &&
            $this->registerHook('header') &&
            $this->registerHook('backOfficeHeader') &&
            $this->registerHook('displayPrestaCategorySwitcher');
    }

    public function uninstall()
    {
        return parent::uninstall();
    }

    /**
     * Add the CSS & JavaScript files you want to be added on the FO.
     */
    public function hookHeader()
    {
        $this->context->controller->addJS($this->_path . '/views/js/front.js');
        $this->context->controller->addCSS($this->_path . '/views/css/front.css');
    }

    public function hookdisplayPrestaCategorySwitcher($category)
    {
        $parent = $category['category']['id_parent'];

        $subcatObj = new Category($parent);
        $subcatObj2 = $subcatObj->getSubCategories($this->context->language->id);
        $this->smarty->assign("category_switcher", $subcatObj2);

        return $this->display(__FILE__, 'views/templates/front/hook/displayParentCategory.tpl');
    }
}
