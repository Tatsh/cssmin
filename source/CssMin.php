<?php
/**
 * kate: replace-tabs false;
 * CssMin - A (simple) css minifier with benefits
 * 
 * --
 * Copyright (c) 2011 Joe Scylla <joe.scylla@gmail.com>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 * --
 * 
 * @package		CssMin
 * @link		http://code.google.com/p/cssmin/
 * @author		Joe Scylla <joe.scylla@gmail.com>
 * @copyright	2008 - 2011 Joe Scylla <joe.scylla@gmail.com>
 * @license		http://opensource.org/licenses/mit-license.php MIT License
 * @version		3.0.1
 */
class CssMin
	{
	/**
	 * Index of classes
	 * 
	 * @var array
	 */
	private static $classIndex = array(
		'CssError' => 'CssError',
		'aCssFormatter' => 'aCssFormatter',
		'CssOtbsFormatter' => 'formatter/CssOtbsFormatter',
		'CssWhitesmithsFormatter' => 'formatter/CssWhitesmithsFormatter',
		'CssMinifier' => 'minifier/CssMinifier',
		'aCssMinifierFilter' => 'minifier/filter/aCssMinifierFilter',
		'CssConvertLevel3AtKeyframesMinifierFilter' => 'minifier/filter/CssConvertLevel3AtKeyframesMinifierFilter',
		'CssConvertLevel3PropertiesMinifierFilter' => 'minifier/filter/CssConvertLevel3PropertiesMinifierFilter',
		'CssImportImportsMinifierFilter' => 'minifier/filter/CssImportImportsMinifierFilter',
		'CssRemoveCommentsMinifierFilter' => 'minifier/filter/CssRemoveCommentsMinifierFilter',
		'CssRemoveEmptyAtBlocksMinifierFilter' => 'minifier/filter/CssRemoveEmptyAtBlocksMinifierFilter',
		'CssRemoveEmptyRulesetsMinifierFilter' => 'minifier/filter/CssRemoveEmptyRulesetsMinifierFilter',
		'CssRemoveLastDelarationSemiColonMinifierFilter' => 'minifier/filter/CssRemoveLastDelarationSemiColonMinifierFilter',
		'CssSortRulesetPropertiesMinifierFilter' => 'minifier/filter/CssSortRulesetPropertiesMinifierFilter',
		'CssVariablesMinifierFilter' => 'minifier/filter/CssVariablesMinifierFilter',
		'aCssMinifierPlugin' => 'minifier/plugins/aCssMinifierPlugin',
		'CssCompressColorValuesMinifierPlugin' => 'minifier/plugins/CssCompressColorValuesMinifierPlugin',
		'CssCompressExpressionValuesMinifierPlugin' => 'minifier/plugins/CssCompressExpressionValuesMinifierPlugin',
		'CssCompressUnitValuesMinifierPlugin' => 'minifier/plugins/CssCompressUnitValuesMinifierPlugin',
		'CssConvertFontWeightMinifierPlugin' => 'minifier/plugins/CssConvertFontWeightMinifierPlugin',
		'CssConvertHslColorsMinifierPlugin' => 'minifier/plugins/CssConvertHslColorsMinifierPlugin',
		'CssConvertNamedColorsMinifierPlugin' => 'minifier/plugins/CssConvertNamedColorsMinifierPlugin',
		'CssConvertRgbColorsMinifierPlugin' => 'minifier/plugins/CssConvertRgbColorsMinifierPlugin',
		'CssUrlPrefixMinifierPlugin' => 'minifier/plugins/cssmin-3.0.1-CssUrlPrefixMinifierPlugin-issue-30',
		'CssVariablesMinifierPlugin' => 'minifier/plugins/CssVariablesMinifierPlugin',
		'CssParser' => 'parser/CssParser',
		'aCssParserPlugin' => 'parser/plugins/aCssParserPlugin',
		'CssAtCharsetParserPlugin' => 'parser/plugins/CssAtCharsetParserPlugin',
		'CssAtFontFaceParserPlugin' => 'parser/plugins/CssAtFontFaceParserPlugin',
		'CssAtImportParserPlugin' => 'parser/plugins/CssAtImportParserPlugin',
		'CssAtKeyframesParserPlugin' => 'parser/plugins/CssAtKeyframesParserPlugin',
		'CssAtMediaParserPlugin' => 'parser/plugins/CssAtMediaParserPlugin',
		'CssAtPageParserPlugin' => 'parser/plugins/CssAtPageParserPlugin',
		'CssAtVariablesParserPlugin' => 'parser/plugins/CssAtVariablesParserPlugin',
		'CssCommentParserPlugin' => 'parser/plugins/CssCommentParserPlugin',
		'CssExpressionParserPlugin' => 'parser/plugins/CssExpressionParserPlugin',
		'CssRulesetParserPlugin' => 'parser/plugins/CssRulesetParserPlugin',
		'CssStringParserPlugin' => 'parser/plugins/CssStringParserPlugin',
		'CssUrlParserPlugin' => 'parser/plugins/CssUrlParserPlugin',
		'aCssAtBlockEndToken' => 'tokens/aCssAtBlockEndToken',
		'aCssAtBlockStartToken' => 'tokens/aCssAtBlockStartToken',
		'aCssDeclarationToken' => 'tokens/aCssDeclarationToken',
		'aCssRulesetEndToken' => 'tokens/aCssRulesetEndToken',
		'aCssRulesetStartToken' => 'tokens/aCssRulesetStartToken',
		'aCssToken' => 'tokens/aCssToken',
		'CssAtCharsetToken' => 'tokens/CssAtCharsetToken',
		'CssAtFontFaceDeclarationToken' => 'tokens/CssAtFontFaceDeclarationToken',
		'CssAtFontFaceEndToken' => 'tokens/CssAtFontFaceEndToken',
		'CssAtFontFaceStartToken' => 'tokens/CssAtFontFaceStartToken',
		'CssAtImportToken' => 'tokens/CssAtImportToken',
		'CssAtKeyframesEndToken' => 'tokens/CssAtKeyframesEndToken',
		'CssAtKeyframesRulesetDeclarationToken' => 'tokens/CssAtKeyframesRulesetDeclarationToken',
		'CssAtKeyframesRulesetEndToken' => 'tokens/CssAtKeyframesRulesetEndToken',
		'CssAtKeyframesRulesetStartToken' => 'tokens/CssAtKeyframesRulesetStartToken',
		'CssAtKeyframesStartToken' => 'tokens/CssAtKeyframesStartToken',
		'CssAtMediaEndToken' => 'tokens/CssAtMediaEndToken',
		'CssAtMediaStartToken' => 'tokens/CssAtMediaStartToken',
		'CssAtPageDeclarationToken' => 'tokens/CssAtPageDeclarationToken',
		'CssAtPageEndToken' => 'tokens/CssAtPageEndToken',
		'CssAtPageStartToken' => 'tokens/CssAtPageStartToken',
		'CssAtVariablesDeclarationToken' => 'tokens/CssAtVariablesDeclarationToken',
		'CssAtVariablesEndToken' => 'tokens/CssAtVariablesEndToken',
		'CssAtVariablesStartToken' => 'tokens/CssAtVariablesStartToken',
		'CssCommentToken' => 'tokens/CssCommentToken',
		'CssNullToken' => 'tokens/CssNullToken',
		'CssRulesetDeclarationToken' => 'tokens/CssRulesetDeclarationToken',
		'CssRulesetEndToken' => 'tokens/CssRulesetEndToken',
		'CssRulesetStartToken' => 'tokens/CssRulesetStartToken',
	);
	/**
	 * The path this file is at.
	 * 
	 * @var string
	 */
	private static $path = NULL;
	/**
	 * Parse/minify errors
	 * 
	 * @var array
	 */
	private static $errors = array();
	/**
	 * Verbose output.
	 * 
	 * @var boolean
	 */
	private static $isVerbose = false;
	/**
	 * Autoload function of CssMin.
	 * 
	 * @internal
	 * 
	 * @param string $class Name of the class
	 * @return void
	 */
	public static function autoload($class)
		{
		if (isset(self::$classIndex[$class]))
			{
			require(self::$classIndex[$class] . '.php');
			}
		}
	/**
	 * Return errors
	 * 
	 * @return array of {CssError}.
	 */
	public static function getErrors()
		{
		return self::$errors;
		}
	/**
	 * Returns if there were errors.
	 * 
	 * @return boolean
	 */
	public static function hasErrors()
		{
		return count(self::$errors) > 0;
		}
	/**
	 * Returns if the SAPI has an opcode cache enabled.
	 * 
	 * @return boolean
	 */
	private static function hasOpcodeCache()
		{
		$apc              = ini_get('apc.enabled');
		$eaccelerator     = ini_get('eaccelerator.enable');
		$mmcache          = ini_get('mmcache.enable');
		$phpexpress       = function_exists('phpexpress');
		$xcache           = ini_get('xcache.size') > 0 && ini_get('xcache.cacher');
		$zend_accelerator = ini_get('zend_accelerator.enabled');
		$zend_plus        = ini_get('zend_optimizerplus.enable');
		return $apc || $eaccelerator || $mmcache || $phpexpress || $xcache || $zend_accelerator || $zend_plus;
		}
	/**
	 * Sets the path of the current file.
	 * 
	 * @return void
	 */
	private static function setPath()
		{
		if (!self::$path)
			{
			self::$path = realpath(dirname(__FILE__)) . DIRECTORY_SEPARATOR;
			}
		}
	/**
	 * Initialises CssMin.
	 * 
	 * @return void
	 */
	public static function initialise()
		{
		self::setPath();
		
		// Simple check to make sure this is not the compiled file
		if (!is_file(self::$path . 'CssError.php'))
			{
			return;
			}
		
		if (self::hasOpcodeCache() || !function_exists('spl_autoload_register'))
			{
			foreach (self::$classIndex as $path)
				{
				require self::$path . $path . '.php';
				}
			}
		else
			{
			if (function_exists('__autoload') && !spl_autoload_functions())
				{
				throw new Exception('Cannot register autoloader as there appears to be an __autoload function already defined. Please use spl_autoload_register() before including CssMin.php.');
				}
			
			spl_autoload_register(array(__CLASS__, "autoload"));
			}
		}
	/**
	 * Minifies CSS source.
	 * 
	 * @param string $source CSS source
	 * @param array $filters Filter configuration [optional]
	 * @param array $plugins Plugin configuration [optional]
	 * @return string Minified CSS
	 */
	public static function minify($source, array $filters = null, array $plugins = null)
		{
		self::$errors = array();
		$minifier = new CssMinifier($source, $filters, $plugins);
		return $minifier->getMinified();
		}
	/**
	 * Parse the CSS source.
	 * 
	 * @param string $source CSS source
	 * @param array $plugins Plugin configuration [optional]
	 * @return array Array of aCssToken
	 */
	public static function parse($source, array $plugins = null)
		{
		self::$errors = array();
		$parser = new CssParser($source, $plugins);
		return $parser->getTokens();
		}
	/**
	 * --
	 * 
	 * @param boolean $to
	 * @return boolean
	 */
	public static function setVerbose($to)
		{
		self::$isVerbose = (boolean) $to;
		return self::$isVerbose;
		}
	/**
	 * --
	 * 
	 * @param CssError $error
	 * @return void
	 */
	public static function triggerError(CssError $error)
		{
		self::$errors[] = $error;
		if (self::$isVerbose)
			{
			trigger_error((string) $error, E_USER_WARNING);
			}
		}
	}
// Initialises CssMin
CssMin::initialise();
?>