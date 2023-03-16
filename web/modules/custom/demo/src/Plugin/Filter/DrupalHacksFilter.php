<?php
namespace Drupal\demo\Plugin\Filter;

use Drupal\filter\FilterProcessResult;
use Drupal\filter\Plugin\FilterBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides filter to CkEditor filter.
 * 
 * @Filter(
 *   id = "drupalhacks_filter",
 *   title =@Translation("DrupalHacks filter"),
 *   description = @Translation ("Replaces drupalhacks token with Hacks home page."),
 *   type = Drupal\filter\Plugin\FilterInterface::TYPE_MARKUP_LANGUAGE,
 * )
 */

class DrupalHacksFilter extends FilterBase{
    /**
     * {@inheritdoc}
     */

    public function process($text, $lagcode){
        $replace = "<span class='drupal_hacks'><a href='/abc'> Hacks Page Links </a></span>";
        $new_text = str_replace('[drupalhacks]', $replace, $text);

        $result = new FilterProcessResult($new_text);
        return $result;
    }
}