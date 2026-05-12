<?php

namespace App\Controllers;

use App\Core\Database;
use App\Core\Session;
use App\Core\Validation;
use App\Helpers\SEO;
use App\Helpers\Language;

class ContactController
{
    public function index(array $params = []): void
    {
        $seo = new SEO();
        $seo->setTitle('Contact - Mohamed Elhabib')
            ->setDescription('Get in touch with Mohamed Elhabib for collaboration, opportunities, or inquiries.');

        $locale = Language::getLocale();
        $dir = Language::dir();

        $success = Session::flash('contact_success');
        $errors = Session::flash('contact_errors') ?? [];

        ob_start();
        require __DIR__ . '/../../templates/pages/contact.php';
        $content = ob_get_clean();

        $seo = $seo->render();
        require __DIR__ . '/../../templates/layouts/public.php';
    }

    public function submit(array $params = []): void
    {
        $wantsJson = $this->wantsJson();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            if ($wantsJson) {
                $this->jsonResponse(['success' => false, 'errors' => ['_method' => 'Invalid request method']]);
            }
            header('Location: /contact');
            exit;
        }

        if (!Session::validateCsrfToken($_POST['csrf_token'] ?? '')) {
            if ($wantsJson) {
                $this->jsonResponse(['success' => false, 'errors' => ['_csrf' => 'Invalid security token']]);
            }
            Session::flash('contact_errors', ['_csrf' => 'Invalid security token. Please try again.']);
            header('Location: /contact');
            exit;
        }

        $honeypot = $_POST['honeypot'] ?? '';
        if ($honeypot !== '') {
            if ($wantsJson) {
                $this->jsonResponse(['success' => true]);
            }
            Session::flash('contact_success', 'Thank you for your message! I will get back to you shortly.');
            header('Location: /contact');
            exit;
        }

        $ip = $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';
        if ($this->isRateLimited($ip)) {
            if ($wantsJson) {
                $this->jsonResponse(['success' => false, 'errors' => ['_rate' => 'Please wait before sending another message.']]);
            }
            Session::flash('contact_errors', ['_rate' => 'Please wait before sending another message.']);
            header('Location: /contact');
            exit;
        }

        $validator = new Validation();
        if (!$validator->validate($_POST, [
            'name' => 'required|min:2|max:100',
            'email' => 'required|email|max:255',
            'message' => 'required|min:10|max:5000',
        ])) {
            if ($wantsJson) {
                $this->jsonResponse(['success' => false, 'errors' => $validator->getErrors()]);
            }
            Session::flash('contact_errors', $validator->getErrors());
            header('Location: /contact');
            exit;
        }

        $name = Validation::sanitize($_POST['name']);
        $email = Validation::sanitize($_POST['email']);
        $message = Validation::sanitizeAllowHtml($_POST['message']);

        $db = Database::getInstance();
        $db->insert('messages', [
            'name' => $name,
            'email' => $email,
            'message' => $message,
            'ip_address' => $ip,
            'is_read' => false,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        if ($wantsJson) {
            $this->jsonResponse(['success' => true]);
        }

        Session::flash('contact_success', 'Thank you for your message! I will get back to you shortly.');
        header('Location: /contact');
        exit;
    }

    private function wantsJson(): bool
    {
        $accept = $_SERVER['HTTP_ACCEPT'] ?? '';
        return str_contains($accept, 'application/json');
    }

    private function jsonResponse(array $data): void
    {
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }

    private function isRateLimited(string $ip): bool
    {
        $db = Database::getInstance();
        $recent = $db->fetch(
            "SELECT created_at FROM messages WHERE ip_address = ? ORDER BY created_at DESC LIMIT 1",
            [$ip]
        );

        if ($recent) {
            $lastTime = strtotime($recent['created_at']);
            if (time() - $lastTime < 300) {
                return true;
            }
        }

        return false;
    }
}
