<?php
function generateUniqueName($subject, $topic, $level, $university, $index) {
    return "{$subject}_{$topic}_Nivel{$level}_{$university}_preg{$index}";
}

function uploadFile($file, $destination) {
    return move_uploaded_file($file['tmp_name'], $destination);
}
?>