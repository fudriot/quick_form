<?php
namespace Vanilla\QuickForm\Validation;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Fabien Udriot <fabien.udriot@typo3.org>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *  A copy is found in the textfile GPL.txt and important notices to the license
 *  from the author is found in LICENSE.txt distributed with these scripts.
 *
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/
use TYPO3\CMS\Vidi\Converter\Property;
use TYPO3\CMS\Vidi\Tca\TcaService;

/**
 * Tell the rule for a "NotEmpty" validation.
 */
class NotEmptyRuler extends AbstractRuler  {

	/**
	 * Tell whether the property should be validated as not empty relying on the TCA strategy.
	 *
	 * @param string $property
	 * @return bool
	 */
	protected function getRuleWithTcaStrategy($property) {
		$dataType = $this->configuration['dataType'];
		$fieldName = Property::name($property)->of($dataType)->toField();
		return TcaService::table($dataType)->field($fieldName)->isRequired();
	}

	/**
	 * Tell whether the property should be validated as not empty relying on the TypoScript strategy.
	 *
	 * @param string $property
	 * @throws \Exception
	 * @return bool
	 */
	protected function getRuleWithTypoScriptStrategy($property) {
		return parent::getRuleWithTypoScriptStrategy($property, ValidatorName::NOT_EMPTY);
	}

	/**
	 * Tell whether the property should be validated as not empty relying on the Object strategy.
	 *
	 * @param string $property
	 * @return bool
	 */
	protected function getRuleWithObjectStrategy($property) {
		return parent::getRuleWithObjectStrategy($property, ValidatorName::NOT_EMPTY);
	}

}