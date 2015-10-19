<?php
namespace Vanilla\QuickForm\Component;

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

/**
 * A hidden form component to be rendered in a Quick Form.
 */
class HiddenComponent extends GenericComponent {

	/**
	 * Constructor
	 *
	 * @param string $property
	 * @param string $value
	 */
	public function __construct($property, $value = '') {
		$partialName = 'Form/Hidden';
		$arguments['property'] = $property;
		$arguments['value'] = $value;
		parent::__construct($partialName, $arguments);
	}

	/**
	 * @return array
	 */
	public function getArguments() {
		return $this->arguments;
	}

	/**
	 * @return string
	 */
	public function getPartialName() {
		return $this->partialName;
	}
}
