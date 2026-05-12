<?php

namespace App\Core;

class Validation
{
    private array $errors = [];

    public function validate(array $data, array $rules): bool
    {
        $this->errors = [];

        foreach ($rules as $field => $fieldRules) {
            $value = $data[$field] ?? null;
            $rulesList = is_array($fieldRules) ? $fieldRules : explode('|', $fieldRules);

            foreach ($rulesList as $rule) {
                $params = [];

                if (str_contains($rule, ':')) {
                    $parts = explode(':', $rule, 2);
                    $rule = $parts[0];
                    $params = explode(',', $parts[1]);
                }

                $methodName = 'rule' . ucfirst($rule);
                if (method_exists($this, $methodName)) {
                    $this->$methodName($field, $value, $params);
                }
            }
        }

        return empty($this->errors);
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function getFirstError(): ?string
    {
        $first = reset($this->errors);
        return $first[0] ?? null;
    }

    private function addError(string $field, string $message): void
    {
        $this->errors[$field][] = $message;
    }

    private function ruleRequired(string $field, mixed $value, array $params): void
    {
        if ($value === null || $value === '' || (is_array($value) && empty($value))) {
            $this->addError($field, 'This field is required');
        }
    }

    private function ruleEmail(string $field, mixed $value, array $params): void
    {
        if ($value !== null && $value !== '' && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->addError($field, 'Invalid email address');
        }
    }

    private function ruleMin(string $field, mixed $value, array $params): void
    {
        $min = (int) ($params[0] ?? 0);
        if ($value !== null && $value !== '') {
            if (is_string($value) && mb_strlen($value) < $min) {
                $this->addError($field, "Must be at least {$min} characters");
            }
        }
    }

    private function ruleMax(string $field, mixed $value, array $params): void
    {
        $max = (int) ($params[0] ?? 0);
        if ($value !== null && $value !== '') {
            if (is_string($value) && mb_strlen($value) > $max) {
                $this->addError($field, "Must not exceed {$max} characters");
            }
        }
    }

    private function ruleNumber(string $field, mixed $value, array $params): void
    {
        if ($value !== null && $value !== '' && !is_numeric($value)) {
            $this->addError($field, 'Must be a number');
        }
    }

    private function ruleInteger(string $field, mixed $value, array $params): void
    {
        if ($value !== null && $value !== '' && !filter_var($value, FILTER_VALIDATE_INT)) {
            $this->addError($field, 'Must be an integer');
        }
    }

    private function ruleBetween(string $field, mixed $value, array $params): void
    {
        if ($value !== null && $value !== '') {
            $min = (int) ($params[0] ?? 0);
            $max = (int) ($params[1] ?? 0);
            $numeric = (float) $value;
            if ($numeric < $min || $numeric > $max) {
                $this->addError($field, "Must be between {$min} and {$max}");
            }
        }
    }

    private function ruleIn(string $field, mixed $value, array $params): void
    {
        if ($value !== null && $value !== '' && !in_array((string) $value, $params, true)) {
            $allowed = implode(', ', $params);
            $this->addError($field, "Must be one of: {$allowed}");
        }
    }

    private function ruleUrl(string $field, mixed $value, array $params): void
    {
        if ($value !== null && $value !== '' && !filter_var($value, FILTER_VALIDATE_URL)) {
            $this->addError($field, 'Invalid URL');
        }
    }

    private function ruleSlug(string $field, mixed $value, array $params): void
    {
        if ($value !== null && $value !== '' && !preg_match('/^[a-z0-9]+(?:-[a-z0-9]+)*$/', $value)) {
            $this->addError($field, 'Must be a valid slug (letters, numbers, hyphens)');
        }
    }

    private function rulePassword(string $field, mixed $value, array $params): void
    {
        if ($value !== null && $value !== '') {
            if (mb_strlen($value) < 8) {
                $this->addError($field, 'Password must be at least 8 characters');
            }
            if (!preg_match('/[A-Z]/', $value)) {
                $this->addError($field, 'Password must contain an uppercase letter');
            }
            if (!preg_match('/[a-z]/', $value)) {
                $this->addError($field, 'Password must contain a lowercase letter');
            }
            if (!preg_match('/\d/', $value)) {
                $this->addError($field, 'Password must contain a digit');
            }
            if (!preg_match('/[^a-zA-Z0-9]/', $value)) {
                $this->addError($field, 'Password must contain a special character');
            }
        }
    }

    public static function sanitize(string $input): string
    {
        return htmlspecialchars(strip_tags(trim($input)), ENT_QUOTES, 'UTF-8');
    }

    public static function sanitizeAllowHtml(string $input): string
    {
        return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
    }
}
