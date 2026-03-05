<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DIKEDAI POS - Admin Dashboard</title>

    <link rel="shortcut icon" href="/assets/images/favicon.png" type="image/x-icon">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-color: #56a7fe;
            --sidebar-bg: #ffffff;
            --sidebar-color: #4b5563;
            --sidebar-active-bg: #f3f9ff;
            --sidebar-active-color: #56a7fe;
            --bg-body: #f8fafc;
            --sidebar-width: 260px;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-body);
            overflow-x: hidden;
        }

        #wrapper {
            display: flex;
            width: 100%;
        }

        /* Sidebar Styles */
        #sidebar-wrapper {
            min-height: 100vh;
            width: var(--sidebar-width);
            background: var(--sidebar-bg);
            border-right: 1px solid #e2e8f0;
            transition: all 0.3s ease;
            position: fixed;
            z-index: 1000;
        }

        .sidebar-heading {
            padding: 1.5rem 1.25rem;
            display: flex;
            align-items: center;
        }

        .sidebar-heading .logo {
            width: 32px;
            height: 32px;
            background-color: var(--primary-color);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            margin-right: 10px;
            font-weight: bold;
        }

        .sidebar-heading span {
            font-weight: 700;
            color: #1e293b;
            font-size: 1.1rem;
        }

        .menu-header {
            padding: 1.25rem 1.25rem 0.5rem;
            text-transform: uppercase;
            font-size: 0.75rem;
            font-weight: 700;
            color: #94a3b8;
            letter-spacing: 0.05em;
        }

        .list-group-item {
            padding: 0.75rem 1.25rem;
            border: none;
            color: var(--sidebar-color);
            font-size: 0.95rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            transition: all 0.2s;
            background: transparent;
        }

        .list-group-item i {
            width: 20px;
            margin-right: 12px;
            text-align: center;
            font-size: 1.1rem;
        }

        .list-group-item:hover {
            color: var(--primary-color);
            background-color: var(--sidebar-active-bg);
        }

        .list-group-item.active {
            color: var(--sidebar-active-color);
            background-color: var(--sidebar-active-bg);
            border-right: 3px solid var(--primary-color);
        }

        /* Page Content Styles */
        #page-content-wrapper {
            width: 100%;
            padding-left: var(--sidebar-width);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .topbar {
            background-color: white;
            padding: 0.75rem 1.5rem;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 999;
        }

        .profile-img {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--primary-color);
        }

        .user-info {
            display: flex;
            align-items: center;
            cursor: pointer;
            padding: 4px 8px;
            border-radius: 8px;
            transition: background 0.2s;
        }

        .user-info:hover {
            background-color: #f1f5f9;
        }

        .user-email {
            font-size: 0.85rem;
            color: #64748b;
            margin-right: 10px;
            font-weight: 500;
        }

        .dropdown-menu {
            border: none;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            padding: 8px;
        }

        .dropdown-item {
            border-radius: 8px;
            padding: 8px 12px;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .dropdown-item i {
            margin-right: 8px;
        }

        /* Footer */
        footer {
            margin-top: auto;
            padding: 1.5rem;
            text-align: center;
            color: #94a3b8;
            font-size: 0.85rem;
        }

        /* Sidebar Overlay */
        #sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 998;
            display: none;
            backdrop-filter: blur(2px);
        }

        /* Desktop Toggle Logic (md and up) */
        @media (min-width: 769px) {
            #wrapper.toggled #sidebar-wrapper {
                margin-left: calc(-1 * var(--sidebar-width));
            }

            #wrapper.toggled #page-content-wrapper {
                padding-left: 0;
            }
        }

        /* Mobile Logic (sm and down) */
        @media (max-width: 768px) {
            #sidebar-wrapper {
                margin-left: calc(-1 * var(--sidebar-width));
            }

            #wrapper.toggled #sidebar-wrapper {
                margin-left: 0;
            }

            #page-content-wrapper {
                padding-left: 0;
            }

            #wrapper.toggled #sidebar-overlay {
                display: block;
            }
        }
    </style>
</head>

<body>