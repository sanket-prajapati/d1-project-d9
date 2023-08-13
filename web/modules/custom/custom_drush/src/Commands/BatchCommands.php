<?php

namespace Drupal\custom_drush\Commands;
use Drush\Commands\DrushCommands;

/**
 * Drush command file.
 */
class BatchCommands extends DrushCommands{
	
	/**
   * A custom Drush command to displays the given text.
   * 
   * @command drush-command-example:print-message
	 * @param string $message is user input string
   * @option count to return count of given string.
	 * @option uppercase Uppercase the text.
   * @aliases custom-message
   */
  public function printMessage($message, $options = ['count' => FALSE, 'uppercase' => FALSE]){
		if($options['count']){
			$this->output()->writeln('The give string character count is '. strlen($message));
		}
		elseif($options['uppercase']){
			$message = strtoupper($message);
			$this->output()->writeln($message);
		}
		else{
			$this->output->writeln('The message: '. $message);
		}
	}


  /**
   * A custom Drush command to displays the given text.
   * 
   * @command drush-command-example:print-me
   * @param $text Argument with text to be printed
   * @option uppercase Uppercase the text
   * @aliases ttndrush,tthndrush-print-me
   */
  public function printMe($text = 'Hello world!', $options = ['uppercase' => FALSE]) {
    if ($options['uppercase']) {
      $text = strtoupper($text);
    }
    $this->output()->writeln($text);
  }
}