<?php
// app/Exceptions/ApiRequestException.php
namespace App\Exceptions;

use Exception;

class ApiRequestException extends Exception
{
    public function render()
    {
        return response()->json(['error' => $this->getMessage()], 500);
    }
}