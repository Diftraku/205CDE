<?php date_default_timezone_set('UTC'); ?>
<?php foreach ($chat as $message): ?>

    <p><?php echo date('G:i:s', $message['posted']); ?> &lt;<?php echo $message['nickname']; ?>&gt; <?php echo htmlspecialchars($message['message']); ?></p>

<?php endforeach; ?>

<?php echo form_open('chat/send'); ?>

<label for="nickname">Nickname</label>
<input type="text" name="nickname" /><br />

<label for="message">Message</label>
<textarea name="message"></textarea><br />

<input type="submit" name="submit" value="Chat" />

<?php echo form_close(); ?>
