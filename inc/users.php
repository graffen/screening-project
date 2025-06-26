<?php
session_start();

// Временно: массив зарегистрированных пользователей
$users = [
  [
    'email' => 'admin@example.com',
    'password' => 'admin123', // без хеширования (на время)
    'role' => 'admin'
  ],
  [
    'email' => 'user@example.com',
    'password' => 'user123',
    'role' => 'user'
  ]
];
?>
