<?php

declare(strict_types=1);

require_once __DIR__.'/vendor/autoload.php';

return function (array $event, Bref\Context\Context $context): array {
    static $momento;

    if (null === $momento) {
        $momento = new Momento\Cache\CacheClient(
        	Momento\Config\Configurations\InRegion::v1(
            	new Momento\Logging\StderrLoggerFactory(),
            ),
        	new Momento\Auth\StringMomentoTokenProvider(
        		$_SERVER['MOMENTO_AUTH_TOKEN'],
        	),
        	61,
        );
    }

    $result = $momento->increment(
    	$_SERVER['MOMENTO_CACHE_NAME'],
    	$_SERVER['MOMENTO_CACHE_KEY'],
    );

    $error = $result->asError();

    if (null !== $error) {
        throw $error->innerException();
    }

    return [
    	'value' => $result->asSuccess()->value(),
    ];
};
