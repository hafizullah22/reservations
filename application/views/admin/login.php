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
            margin-bottom: 10px;
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
        input[type="password"],
        input[type="text"] {
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

        /* Prevent text overlap with the eye icon */
        .password-wrapper input {
            padding-right: 42px;
        }

        input[type="email"]:focus,
        input[type="password"]:focus,
        input[type="text"]:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1);
            outline: none;
        }

        /* Password Wrapper & Toggle Styling */
        .password-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .toggle-password {
            position: absolute;
            right: 12px;
            background: none;
            border: none;
            padding: 0;
            margin: 0;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-muted);
            transition: color 0.2s;
        }

        .toggle-password:hover {
            color: var(--primary);
        }

        .toggle-password svg {
            width: 20px;
            height: 20px;
        }

        .toggle-password .eye-off {
            display: none;
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
            <label for="email">Email Address</label>
            <input type="email" name="email" id="email" autocomplete="username" required>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <div class="password-wrapper">
                <input type="password" name="password" id="password" autocomplete="current-password" required>
                <button type="button" id="togglePassword" class="toggle-password" aria-label="Toggle password visibility">
                    <svg class="eye-on" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <svg class="eye-off" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                    </svg>
                </button>
            </div>
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
    <a href="<?=site_url('forgot-password')?>">Lost your password?</a>
    <a href="<?=site_url()?>">&larr; Go to site</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const passwordInput = document.getElementById('password');
    const toggleButton = document.getElementById('togglePassword');
    const eyeOnIcon = toggleButton.querySelector('.eye-on');
    const eyeOffIcon = toggleButton.querySelector('.eye-off');

    toggleButton.addEventListener('click', function () {
        // Toggle input type
        const isPassword = passwordInput.getAttribute('type') === 'password';
        passwordInput.setAttribute('type', isPassword ? 'text' : 'password');

        // Toggle SVG Icons
        if (isPassword) {
            eyeOnIcon.style.display = 'none';
            eyeOffIcon.style.display = 'block';
        } else {
            eyeOnIcon.style.display = 'block';
            eyeOffIcon.style.display = 'none';
        }
    });
});
</script>

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