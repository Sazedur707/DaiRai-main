<?php
$messages = [
  ['user' => 'John', 'message' => 'Hello!', 'time' => '10:00 AM'],
  ['user' => 'Jane', 'message' => 'Hi John!', 'time' => '10:02 AM'],
  ['user' => 'John', 'message' => 'How are you?', 'time' => '10:05 AM'],
];

foreach ($messages as $message) {
  echo '<div class="message">';
  echo '<span class="user">' . $message['user'] . ':</span>';
  echo '<span class="time">' . $message['time'] . '</span><br>';
  echo $message['message'];
  echo '</div>';
}
?>
