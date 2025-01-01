<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>
    <h1>Edit User</h1>
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{ $user->name }}" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="{{ $user->email }}" required>
        </div>
        <div>
            <label for="password">Password (Leave empty to keep current):</label>
            <input type="password" name="password" id="password">
        </div>
        <div>
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" name="password_confirmation" id="password_confirmation">
        </div>
        <div>
            <label for="role">Role:</label>
            <input type="text" name="role" id="role" value="{{ $user->role }}" required>
        </div>
        <button type="submit">Update User</button>
    </form>
</body>
</html>
