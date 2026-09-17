<?php

try {
    require __DIR__.'/../public/index.php';
} catch (Throwable $exception) {
    // TEMPORARY: Vercel bootstrap diagnostic. Remove after the production failure is identified.
    error_log(sprintf(
        '[Havenstone Vercel bootstrap diagnostic] %s: %s',
        $exception::class,
        str_replace(["\r", "\n"], ' ', $exception->getMessage()),
    ));

    http_response_code(500);
    header('Content-Type: text/plain; charset=UTF-8');

    echo 'Application bootstrap failed. See the Vercel function logs for the diagnostic message.';
}
