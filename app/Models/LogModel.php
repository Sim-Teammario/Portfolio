<?php
declare(strict_types=1);

namespace App\Models;

use Config\Database;

class LogModel {
    public static function logVisit(string $action): void {
        if (!isset($_COOKIE['rgpd_consent']) || $_COOKIE['rgpd_consent'] !== 'true') {
            return; // Pas de tracking sans consentement
        }

        $ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
        $hashedIp = hash('sha256', $ip . $_ENV['IP_SALT']);
        $userAgent = $_SERVER['HTTP_USER_AGENT'] ?? 'unknown';
        $timestamp = date('Y-m-d H:i:s');

        // Log SQL (si BDD dispo)
        try {
            $db = Database::getConnection();
            $stmt = $db->prepare("INSERT INTO logs (hashed_ip, action, user_agent, created_at) VALUES (?, ?, ?, ?)");
            $stmt->execute([$hashedIp, $action, $userAgent, $timestamp]);
        } catch (\Exception $e) {
            // Fallback Fichier
            $logLine = json_encode(['time' => $timestamp, 'ip' => $hashedIp, 'action' => $action, 'ua' => $userAgent]) . PHP_EOL;
            file_put_contents(__DIR__ . '/../../storage/logs/access.log', $logLine, FILE_APPEND);
        }
    }
}
