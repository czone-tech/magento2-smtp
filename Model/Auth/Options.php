<?php

namespace CzoneTech\SmtpMail\Model\Auth;

use Magento\Framework\Data\OptionSourceInterface;

class Options implements OptionSourceInterface
{

    /**
     * Return array of options as value-label pairs
     *
     * @return array Format: array(array('value' => '<value>', 'label' => '<label>'), ...)
     */
    public function toOptionArray()
    {
        return [
            ['label' => __('Plain'), 'value' => 'plain'],
            ['label' => __('Login'), 'value' => 'login']
        ];
    }
}