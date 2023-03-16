<?php
namespace Drupal\custom_logger\services;
use Psr\Log\LoggerInterface;

class newLoggerService {
  // public function __construct(LoggerInterface $logger) {
  //   $this->logger = $logger;
  // }

  public function doStuff($message) {
    // Logs a notice.
    // $this->logger->notice($message);

    \Drupal::logger('custom_logger')->notice($message);
     // Logs an error.
    // $this->logger->error($message);
  }
}
