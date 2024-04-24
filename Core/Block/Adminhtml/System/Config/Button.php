<?php
/**
 * Seofeb
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the seofeb.com license that is
 * available through the world-wide-web at this URL:
 * https://seofeb.com/LICENSE.txt
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category    Seofeb
 * @package     Seofeb_Core
 * @copyright   Copyright (c) 2018 Seofeb (https://seofeb.com/)
 * @license     https://seofeb.com/LICENSE.txt
 */

namespace Seofeb\Core\Block\Adminhtml\System\Config;

use Magento\Backend\Block\Template\Context;
use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;
use Seofeb\Core\Helper\Validate;

/**
 * Class Button
 * @package Seofeb\Core\Block\Adminhtml\System\Config
 */
class Button extends Field
{
    /**
     * @var string
     */
    protected $_template = 'system/config/button.phtml';

    /**
     * @var \Seofeb\Core\Helper\AbstractData
     */
    protected $_helper;

    /**
     * Button constructor.
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Seofeb\Core\Helper\Validate $helper
     * @param array $data
     */
    public function __construct(
        Context $context,
        Validate $helper,
        array $data = []
    )
    {
        $this->_helper = $helper;
        parent::__construct($context, $data);
    }

    /**
     * Generate button html
     *
     * @return string
     */
    public function getButtonHtml()
    {
        $activeButton = $this->getLayout()->createBlock(
            'Magento\Backend\Block\Widget\Button'
        )->setData(
            [
                'id'      => 'seofeb_module_active',
                'label'   => __('Activate Now'),
                'onclick' => 'javascript:seofebModuleActive(); return false;',
            ]
        );

        $cancelButton = $this->getLayout()->createBlock(
            'Magento\Backend\Block\Widget\Button'
        )->setData(
            [
                'id'      => 'seofeb_module_update',
                'label'   => __('Update this license'),
                'onclick' => 'javascript:seofebModuleUpdate(); return false;',
            ]
        );

        return $activeButton->toHtml() . $cancelButton->toHtml();
    }

    /**
     * Render button
     *
     * @param  \Magento\Framework\Data\Form\Element\AbstractElement $element
     * @return string
     */
    public function render(AbstractElement $element)
    {
        // Remove scope label
        $element->unsScope()->unsCanUseWebsiteValue()->unsCanUseDefaultValue();

        return parent::render($element);
    }

    /**
     * Return element html
     *
     * @param  \Magento\Framework\Data\Form\Element\AbstractElement $element
     * @return string
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    protected function _getElementHtml(AbstractElement $element)
    {
        $originalData = $element->getOriginalData();
        $path = explode('/', $originalData['path']);
        $this->addData(
            [
                'mp_is_active'      => $this->_helper->isModuleActive($originalData['module_name']),
                'mp_module_name'    => $originalData['module_name'],
                'mp_module_type'    => $originalData['module_type'],
                'mp_active_url'     => $this->getUrl('seofeb_core/index/activate'),
                'mp_free_config'    => Validate::jsonEncode($this->_helper->getConfigValue('free/module') ?: []),
                'mp_module_html_id' => implode('_', $path),
                'mp_module_checkbox' => Validate::jsonEncode($this->_helper->getModuleCheckbox($originalData['module_name']))
            ]
        );

        return $this->_toHtml();
    }

    /**
     * @return string
     */
    public function getButtonUrl()
    {
        return '';
    }
}
