<?php
class RhinoSupportHelper extends AppHelper {
	public $helpers = array('Html');

	public $username = null;

	protected $scrollerTypes = array(
		'contact' => 'contactus',
		'feedback' => 'Feedback',
	);

	protected $scrollerColors = array(
		'blue' => 2,
		'red' => 3,
		'green' => 4,
		'yellow' => 5,
		'orange' => 6,
		'black' => 7,
	);

	public function mailLink($text = 'Support', $options = array()) {
		return $this->Html->link($text, 'mailto:'.$username.'@rhinosupport.com', $options);
	}

	public function link($text = 'Contact Us', $options = array()) {
		static $onClick = "var nonwin=navigator.appName!='Microsoft Internet Explorer'?'yes':'no'; window.open(this.href,'welcome','location='+nonwin+',scrollbars=yes,width=435,height=500,menubar=no,toolbar=no'); return false;";

		$linkOptions = array(
			'onclick' => $onClick,
			'target' => '_blank',
		);

		return $this->Html->link($text, $this->_ticketUrl(), array_merge($linkOptions, $options));
	}

	public function scroller($type = 'feedback', $color = 'blue') {
		static $onClick = "var nonwin=navigator.appName!='Microsoft Internet Explorer'?'yes':'no'; window.open(this.href,'welcome','location='+nonwin+',scrollbars=yes,width=435,height=500,menubar=no,toolbar=no'); return false;";

		$imageUrl = 'https://rhinosupport.com/Images/'.$this->scrollerTypes[$type].'_0'.$this->scrollerColors[$color].'.png';

		$image = $this->Html->image($imageUrl, array('border' => 0, 'alt' => ''));

		$link = $this->Html->link($image, $this->_ticketUrl(), array('target' => '_blank', 'onclick' => $onClick));

		$output = $this->Html->div(null, $link, array('style' => array(
			'display' => 'scroll',
			'position' => 'fixed',
			'top' => '60px',
			'left' => '0px',
		)));

		return $output;
	}

	public function iframe($options = array()) {
		$iframeOptions = array(
			'width' => 400,
			'height' => 600,
			'frameborder' => 0,
			'scrolling' => 'no',
			'src' => $this->_ticketUrl(array('frames' => 'true')),
		);

		return $this->Html->tag('iframe', null, array_merge($iframeOptions, $options));
	}

	protected function _ticketUrl($params = array()) {
		return 'https://'.$this->username.'.rhinosupport.com/create-ticket.php'.$this->_buildQueryParams($params);
	}

	protected function _buildQueryParams($params = array()) {
		if (empty($params)) {
			return '';
		}

		$output = '?';

		foreach ($params as $param => $value) {
			if (strlen($output) > 1) {
				$output .= '&';
			}

			$output .= $param.'='.$value;
		}

		return $output;
	}
}
?>