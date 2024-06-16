<!DOCTYPE html>
<html>
<head>
    <title>Costumer Login</title>
</head>
<body>
    <form method="POST" action="{{ route('customer.login') }}">
        @csrf
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
        </div>
        <button type="submit">Login</button>
    </form>
</body>
</html>
