<?php

namespace App\Exceptions;

use RuntimeException;

/**
 * Exception ketika Gemini API mengembalikan 429 (Rate Limit Exceeded)
 * dan semua retry telah habis.
 */
class GeminiRateLimitException extends RuntimeException
{
    //
}
