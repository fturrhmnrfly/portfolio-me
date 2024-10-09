<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    }

    nav {
        background-color: #333;
        color: #fff;
        padding: 10px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    nav ul {
        list-style: none;
        margin: 0;
        padding: 0;
        display: flex;
    }

    nav ul li {
        margin-right: 20px;
    }

    nav ul li:last-child {
        margin-right: 0;
    }

    nav a {
        color: #fff;
        text-decoration: none;
        padding: 8px 12px;
        border-radius: 4px;
        transition: background-color 0.3s;
    }

    nav a:hover {
        background-color: #555;
    }

    nav .brand {
        font-size: 24px;
        font-weight: bold;
    }

    @media (max-width: 768px) {
        nav {
            flex-direction: column;
        }

        nav ul {
            flex-direction: column;
            align-items: center;
        }

        nav ul li {
            margin: 10px 0;
        }
    }

    </style>
</head>
<body>

<nav>
    <ul>
        <li><a href="{{ route('home') }}">Home</a></li>
        <li><a href="{{ route('about') }}">About</a></li>
        <li><a href="{{ route('skill') }}">Skills</a></li>
        <li><a href="{{ route('project') }}">Projects</a></li>
        <li><a href="{{ route('certificate') }}">Certificate</a></li>
        <li><a href="{{ route('contact') }}">Contact</a></li>
    </ul>
</nav>

</body>
</html>