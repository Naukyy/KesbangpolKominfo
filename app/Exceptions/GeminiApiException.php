<?php

namespace App\Exceptions;

use RuntimeException;

/**
 * Exception umum ketika Gemini API mengembalikan error
 * selain 429/503 (tidak bisa di-retry).
 */
class GeminiApiException extends RuntimeException
{
    //
}
