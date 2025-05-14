<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Message</title>
</head>
<body>
    <h2>Edit Message</h2>

    <form method="POST" action="{{ route('message.update', $message->id) }}">
        @csrf
        @method('PUT')

        <label for="name">Name:</label>
        <input type="text" name="name" value="{{ old('name', $message->name) }}" required>

        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ old('email', $message->email) }}" required>

        <label for="message">Message:</label>
        <textarea name="message" required>{{ old('message', $message->message) }}</textarea>

        <button type="submit">Update Message</button>
    </form>
</body>
</html>
