<?php

namespace Vanilla\QuickForm\ViewHelpers\Property;

/**
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use Vanilla\QuickForm\ViewHelpers\AbstractValidationViewHelper;

/**
 * View helper which returns an error class if the property is not valid.
 */
class ErrorClassViewHelper extends AbstractValidationViewHelper
{

    /**
     * Returns a possible error class.
     *
     * @return string
     */
    public function render()
    {

        $className = '';

        if ($this->isFormPosted()) {

            // Get the current property
            $property = $this->templateVariableContainer->get('property');

            // Get the current value for the property.
            $value = $this->getValue($property);

            // Query the Validation Engine.
            if (!$this->getValidationService()->isValid($property, $value)) {
                $className = 'has-error';
            }
        }

        return $className;
    }

}
