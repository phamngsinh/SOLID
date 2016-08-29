<?php
ini_set("display_errors", 1);

interface LoggerInterface 
{
    function info($message);
}
 
class StandardLogger implements LoggerInterface
{
 
    public function info($message)
    {
        printf("[INFO] %s \n", $message);
    }
}
 
class FileLogger implements LoggerInterface 
{
 
    public function info($message) 
    {
        file_put_contents('/var/www/html/SOLID/app.log', sprintf("[INFO] %s \n", $message), FILE_APPEND);
    }
}
 
class MyLog 
{
    public $logger;
 
    public function __construct(LoggerInterface $logger) 
    {
        $this->logger = $logger;
    }
 
    public function info($string)
    {
        return $this->logger->info($string);
    }
}
// Print to standard input/output device
$myLog = new MyLog(new StandardLogger);
$myLog->info('This object depend on another object display_errors');
// Write to file
$myFileLog = new MyLog(new FileLogger);
$myFileLog->info('This object depend on another object');