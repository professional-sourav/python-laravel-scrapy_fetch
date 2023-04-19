<?php

namespace App\Http\Controllers;

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class ScrapyController extends Controller
{
    public function index()
    {
        $site = 'https://vaconference.co.uk/';
        $url = request()->fullUrl() ?? $site;

        if (str_starts_with($url, 'http://127.0.0.1:5002')) {
            $url = str_replace('http://127.0.0.1:5002', rtrim($site, '/'), $url);
        }

        info("Final URL: ", [$url]);

        // $process = new Process(['python3', '/var/www/html/python/scraping/scrapy_test1/main.py']);
        // $process = Process::fromShellCommandline('scrapy crawl spyder', '/var/www/html/python/scraping/scrapy_test1/webscrapy');
        $process = Process::fromShellCommandline(
            'scrapy fetch ' . $url,
            null,
            null,
            null,
            30
        ); # WORKING

        $process->run();
        
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        $data = $process->getOutput();

        // exec('scrapy fetch https://www.apple.com/', $data, $retrive);

        return $data;
    }
}
