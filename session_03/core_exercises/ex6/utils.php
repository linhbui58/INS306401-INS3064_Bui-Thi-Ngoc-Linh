<?php
/**
 * Sanitize input data
 * - Trim whitespace
 * - Convert special characters to HTML entities
 */
function sanitize(string $data): string {
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

/**
 * Validate email format
 */
function validateEmail(string $email): bool {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

/**
 * Validate string length (min <= length <= max)
 */
function validateLength(string $str, int $min, int $max): bool {
    $length = strlen($str);
    return ($length >= $min && $length <= $max);
}

/**
 * Validate password
 * Rules:
 * - Minimum 8 characters
 * - At least 1 special character
 */
function validatePassword(string $pass): bool {
    if (strlen($pass) < 8) {
        return false;
    }

    // Check special character
    return preg_match('/[^a-zA-Z0-9]/', $pass) === 1;
}
