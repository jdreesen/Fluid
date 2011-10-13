<?php
namespace TYPO3\Fluid\ViewHelpers\Uri;

/*                                                                        *
 * This script belongs to the FLOW3 package "Fluid".                      *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License, either version 3   *
 *  of the License, or (at your option) any later version.                *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

use TYPO3\FLOW3\Annotations as FLOW3;

/**
 * A view helper for creating URIs to external targets.
 * Currently the specified URI is simply passed through.
 *
 * = Examples =
 *
 * <code>
 * <f:uri.external uri="http://www.typo3.org" />
 * </code>
 * <output>
 * http://www.typo3.org
 * </output>
 *
 * <code title="custom default scheme">
 * <f:uri.external uri="typo3.org" defaultScheme="ftp" />
 * </code>
 * <output>
 * ftp://typo3.org
 * </output>
 *
 * @api
 * @FLOW3\Scope("prototype")
 */
class ExternalViewHelper extends \TYPO3\Fluid\Core\ViewHelper\AbstractViewHelper {

	/**
	 * @param string $uri target URI
	 * @param string $defaultScheme scheme the href attribute will be prefixed with if specified $uri does not contain a scheme already
	 * @return string Rendered URI
	 * @author Bastian Waidelich <bastian@typo3.org>
	 * @api
	 */
	public function render($uri, $defaultScheme = 'http') {
		$scheme = parse_url($uri, PHP_URL_SCHEME);
		if ($scheme === NULL && $defaultScheme !== '') {
			$uri = $defaultScheme . '://' . $uri;
		}
		return $uri;
	}
}


?>
