<?php
App::uses('HtmlHelper', 'View/Helper');
class MyHtmlHelper extends HtmlHelper {
    public function url($url = null, $full = false) {
        if(is_array($url) && !isset($url['language']) && isset($this->params['language'])) {
          $url['language'] = $this->params['language'];
        }
        return parent::url($url, $full);
   }
}