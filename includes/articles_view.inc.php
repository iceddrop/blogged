<?php
declare(strict_types=1);

function show_username(array $result){
    if ($result) {
        echo "Welcome back " . $result['username'] . ", create more articles.";
    } else {
        echo "User not found";
    }
};