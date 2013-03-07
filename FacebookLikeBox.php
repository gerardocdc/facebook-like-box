<?php
/**
 * Class FacebookLikeBox
 * Creates a widget of Facebook's Like Box plugin
 * http://developers.facebook.com/docs/reference/plugins/like-box/
 *
 * @author		Gerardo Colorado Diaz-Caneja <gcdiazcaneja@diaz-caneja-consultores.com>
 * @link		http://www.diaz-caneja-consultores.com
 * @link        https://github.com/gerardocdc/facebook-like-box
 * @copyright	Copyright (c) 2012 Diaz-Caneja Consultores
 * @license		Creative Commons CC-BY-SA License (http://creativecommons.org/licenses/by-sa/3.0/)
 * @version     1.1
 * @filesource
 */

/**
 * Class FacebookLikeBox
 * Creates a widget of Facebook's Like Box plugin
 * http://developers.facebook.com/docs/reference/plugins/like-box/
 *
 * Usage:
 * <code>
 *      $facebookLikeBox = new FacebookLikeBox();
 *      $facebookLikeBox->setHref("http://www.facebook.com/my.account.name");
 *      $facebookLikeBox->render();
 * </code>
 *
 * @package		Facebook
 * @version     1.1
 * @since		Version 1.0
 */
class FacebookLikeBox
{
	/*--------------------------------------------
	|             V A R I A B L E S             |
	============================================*/

	/**
	 * URL of the Facebook Page for this Like Box.
	 *
	 * @var string
	 */
	private $href;

	/**
	 * Width of the plugin in pixels. Default width: 300px.
	 *
	 * @var integer
	 */
	private $width = 300;

	/**
	 * Height of the plugin in pixels. The default height varies based on number of faces to display, and whether the stream is displayed. With the stream displayed, and 10 faces the default height is 556px. With no faces, and no stream the default height is 63px.
	 *
	 * @var integer
	 */
	private $height;

	/**
	 * Color scheme for the plugin. Options: 'light', 'dark'
	 *
	 * @var string
	 */
	private $color_scheme = 'light';

	/**
	 * Specifies whether or not to display profile photos in the plugin. Default value: true.
	 *
	 * @var boolean
	 */
	private $show_faces = true;

	/**
	 * Specifies whether to display a stream of the latest posts from the Page's wall. Default value: true.
	 *
	 * @var boolean
	 */
	private $stream = true;

	/**
	 * Specifies whether to display the Facebook header at the top of the plugin. Default value: true.
	 *
	 * @var boolean
	 */
	private $header = true;

	/**
	 * Border color of the plugin, in hexadecimal format.
	 *
	 * @var string
	 */
	private $border_color;

	/**
	 * For Places, specifies whether the stream contains posts from the Place's wall or just checkins from friends. Default value: false.
	 *
	 * @var boolean
	 */
	private $force_wall = true;

	/*--------------------------------------------
	|           C O N S T R U C T O R           |
	============================================*/

	/**
	 * Constructor
	 */
	function __construct()
	{
	}

	/*--------------------------------------------
	|      G E T T E R S / S E T T E R S        |
	============================================*/

	/**
	 * @param string $href
	 */
	public function setHref($href)
	{
		$this->href = $href;
	}

	/**
	 * @return string
	 */
	public function getHref()
	{
		return $this->href;
	}

	/**
	 * @param int $width
	 */
	public function setWidth($width)
	{
		$this->width = $width;
	}

	/**
	 * @return int
	 */
	public function getWidth()
	{
		return $this->width;
	}

	/**
	 * @param int $height
	 */
	public function setHeight($height)
	{
		$this->height = $height;
	}

	/**
	 * @return int
	 */
	public function getHeight()
	{
		return $this->height;
	}

	/**
	 * @param string $color_scheme
	 */
	public function setColorScheme($color_scheme)
	{
		$this->color_scheme = $color_scheme;
	}

	/**
	 * @return string
	 */
	public function getColorScheme()
	{
		return $this->color_scheme;
	}

	/**
	 * @param boolean $show_faces
	 */
	public function setShowFaces($show_faces)
	{
		$this->show_faces = $show_faces;
	}

	/**
	 * @return boolean
	 */
	public function getShowFaces()
	{
		return $this->show_faces;
	}

	/**
	 * @param boolean $stream
	 */
	public function setStream($stream)
	{
		$this->stream = $stream;
	}

	/**
	 * @return boolean
	 */
	public function getStream()
	{
		return $this->stream;
	}

	/**
	 * @param boolean $header
	 */
	public function setHeader($header)
	{
		$this->header = $header;
	}

	/**
	 * @return boolean
	 */
	public function getHeader()
	{
		return $this->header;
	}

	/**
	 * @param string $border_color
	 */
	public function setBorderColor($border_color)
	{
		$this->border_color = $border_color;
	}

	/**
	 * @return string
	 */
	public function getBorderColor()
	{
		return $this->border_color;
	}

	/**
	 * @param boolean $force_wall
	 */
	public function setForceWall($force_wall)
	{
		$this->force_wall = $force_wall;
	}

	/**
	 * @return boolean
	 */
	public function getForceWall()
	{
		return $this->force_wall;
	}

	/*--------------------------------------------
	|        C L A S S   M E T H O D S          |
	============================================*/

	/**
	 * Renderizes and creates the Facebook Like Box
	 */
	public function render()
	{
		$this->calculateHeight();
		$this->calculateWidth();
		$this->renderCode();
		$this->renderJS();
	}

	/**
	 * Renderizes the javascript required for the Facebook Like Box
	 */
	public function renderJS()
	{
		$code = "<div id=\"fb-root\"></div>\r\n";
		$code .= "<script>\r\n";
		$code .= "(function(d, s, id){ \r\n";
		$code .= "\tvar js, fjs = d.getElementsByTagName(s)[0];\r\n";
		$code .= "\tif (d.getElementById(id)) return;\r\n";
		$code .= "\tjs = d.createElement(s); js.id = id;\r\n";
		$code .= "\tjs.src = \"//connect.facebook.net/es_ES/all.js#xfbml=1\";\r\n";
		$code .= "\tfjs.parentNode.insertBefore(js, fjs);\r\n";
		$code .= "\t}(document, 'script', 'facebook-jssdk'));\r\n";
		$code .= "</script>\r\n";

		echo $code;
	}

	/**
	 * Renderizes the code for the Facebook Like Box
	 */
	public function renderCode()
	{
		$code = "<div ";
		$code .= "class=\"fb-like-box\" ";
		$code .= "data-href=\"".$this->getHref()."\" ";
		$code .= "data-width=\"".$this->getWidth()."\" ";
		$code .= "data-height=\"".$this->getHeight()."\" ";
		$code .= "data-show-faces=\"".var_export($this->getShowFaces(),true)."\" ";
		$code .= "data-stream=\"".var_export($this->getStream(),true)."\" ";
		$code .= "data-header=\"".var_export($this->getHeader(),true)."\" ";
		$code .= "data-border-color=\"".$this->getBorderColor()."\" ";
		$code .= "data-colorscheme=\"".$this->getColorScheme()."\" ";
		$code .= "data-force-wall=\"".var_export($this->getForceWall(),true)."\" ";
		$code .= ">";
		$code .= "</div>\r\n";

		echo $code;
	}

	/**
	 * Calculates the height of the plugin. The default height varies based on number of faces to display, and whether
	 * the stream is displayed. With the stream displayed, and 10 faces the default height is 556px. With no faces, and
	 * no stream the default height is 63px, according to http://developers.facebook.com/docs/reference/plugins/like-box/.
	 */
	private function calculateHeight()
	{
		$height = $this->getHeight();
		if (empty($height))
		{
			if ($this->getStream() && $this->getShowFaces())
			{
				$this->setHeight(556);
			} elseif (!$this->getStream() && !$this->getShowFaces())
				$this->setHeight(63);
			} else {
			$this->setHeight(600);
		}
	}

	/**
	 * Calculates the height of the plugin. The minimum supported plugin width is 292px, according to
	 * http://developers.facebook.com/docs/reference/plugins/like-box/.
	 */
	private function calculateWidth()
	{
		$width = $this->getWidth();
		if ($width < 292)
		{
			$this->setWidth(292);
		}
	}
}