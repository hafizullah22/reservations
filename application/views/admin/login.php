<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clifton Park Trustee &lsaquo; Log In</title>
    <style>
        :root {
            --primary: #4f46e5;
            --primary-hover: #4338ca;
            --bg: #f8fafc;
            --card-bg: #ffffff;
            --text-main: #0f172a;
            --text-muted: #64748b;
            --border: #e2e8f0;
            --border-focus: #cbd5e1;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            background-color: var(--bg);
            /* Subtle modern background accent */
            background-image: 
                radial-gradient(at 0% 0%, rgba(79, 70, 229, 0.03) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(79, 70, 229, 0.03) 0px, transparent 50%);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            color: var(--text-main);
            padding: 24px;
            box-sizing: border-box;
        }

        .login-logo {
            /* margin-bottom: 32px; */
            margin-bottom:10px;
            text-align: center;
        }

        .login-logo a {
            color: var(--text-main);
            font-size: 28px;
            font-weight: 700;
            letter-spacing: -0.025em;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .login-logo a:hover {
            color: var(--primary);
        }

        .login-card {
            background: var(--card-bg);
            padding: 40px 32px;
            width: 100%;
            max-width: 360px;
            border-radius: 16px;
            border: 1px solid var(--border);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 10px 15px -3px rgba(0, 0, 0, 0.03);
            box-sizing: border-box;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 6px;
            color: var(--text-main);
        }

        input[type="email"],
        input[type="password"] {
            font-size: 15px;
            width: 100%;
            padding: 10px 14px;
            border: 1px solid var(--border);
            border-radius: 8px;
            color: var(--text-main);
            background-color: #fff;
            box-sizing: border-box;
            transition: all 0.2s ease;
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1);
            outline: none;
        }

        .submit-container {
            margin-top: 28px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .remember-me {
            display: flex;
            align-items: center;
            font-size: 14px;
            color: var(--text-muted);
            cursor: pointer;
            user-select: none;
        }

        .remember-me input {
            margin: 0 8px 0 0;
            width: 16px;
            height: 16px;
            border: 1px solid var(--border);
            border-radius: 4px;
            accent-color: var(--primary);
            cursor: pointer;
        }

        .btn {
            background: var(--primary);
            color: #fff;
            border: none;
            font-size: 14px;
            font-weight: 600;
            height: 40px;
            padding: 0 18px;
            cursor: pointer;
            border-radius: 8px;
            box-sizing: border-box;
            transition: background-color 0.2s ease, transform 0.1s ease;
        }

        .btn:hover {
            background: var(--primary-hover);
        }

        .btn:active {
            transform: scale(0.98);
        }

        .nav-links {
            width: 100%;
            max-width: 360px;
            margin-top: 24px;
            padding: 0 8px;
            box-sizing: border-box;
            font-size: 13px;
            display: flex;
            justify-content: space-between;
        }

        .nav-links a {
            color: var(--text-muted);
            text-decoration: none;
            transition: color 0.2s ease;
            font-weight: 500;
        }

        .nav-links a:hover {
            color: var(--primary);
        }
    </style>
</head>
<body>

<div class="login-logo">
    <a href="#">Admin Login</a>
</div>


<div class="login-card">
    <form action="<?php echo site_url('auth/authenticate'); ?>" method="post">
        <div class="form-group">
            <label for="email">Username or Email Address</label>
            <input type="email" name="email" id="email" autocomplete="username" required>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" autocomplete="current-password" required>
        </div>

        <div class="submit-container">
            <label class="remember-me">
                <input name="rememberme" type="checkbox" id="rememberme" value="forever"> Remember me
            </label>
            <button type="submit" class="btn">Log In</button>
        </div>
    </form>
</div>

<div class="nav-links">
    <a href="#">Lost your password?</a>
    <a href="#">&larr; Go to site</a>
</div>
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if ($this->session->flashdata('msg_type')): ?>

<script>
document.addEventListener('DOMContentLoaded', function () {

    Swal.fire({
        icon: '<?= $this->session->flashdata("msg_type"); ?>',
        
        title: '<?= $this->session->flashdata("msg_title"); ?>',

        text: '<?= $this->session->flashdata("msg_text"); ?>',

        toast: true,
        position: 'top-end',

        showConfirmButton: false,
        timer: 4000,
        timerProgressBar: true,

        background: '#ffffff',
        color: '#2c3e50',

        customClass: {
            popup: 'shadow-lg rounded-4 border-0',
            title: 'fw-bold',
            htmlContainer: 'text-black'
        },

        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer);
            toast.addEventListener('mouseleave', Swal.resumeTimer);
        }
    });

});
</script>

<?php endif; ?>
</body>
</html>