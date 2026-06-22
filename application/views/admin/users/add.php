<?php $this->load->view('admin/layout/header'); ?>

<style>
/* Modern Design Variables & Reset Overrides */
:root {
    --bg-main: #f8fafc;
    --card-bg: #ffffff;
    --text-main: #0f172a;
    --text-muted: #64748b;
    --border-color: #babac4;
    --primary-color: #3b82f6; /* Modern blue accent */
    --radius-lg: 16px;
    --radius-md: 10px;
    --shadow-sm: 0 1px 3px 0 rgba(0, 0, 0, 0.05), 0 1px 2px -1px rgba(0, 0, 0, 0.05);
    --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -2px rgba(0, 0, 0, 0.05);
}

.main {
    padding: 2rem;
    background-color: var(--bg-main);
    min-height: 100vh;
    font-family: 'Inter', system-ui, -apple-system, sans-serif;
}

/* Page Header Styling */
.page-header {
    background: var(--card-bg);
    padding: 1.25rem 1.75rem;
    border-radius: var(--radius-lg);
    margin-bottom: 1.5rem;
    box-shadow: var(--shadow-sm);
    border: 1px solid var(--border-color);
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.page-header h4 {
    margin: 0;
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--text-main);
    letter-spacing: -0.02em;
}

/* Card Styling */
.form-card {
    background: var(--card-bg);
    border-radius: var(--radius-lg);
    padding: 2.25rem;
    box-shadow: var(--shadow-md);
    border: 1px solid var(--border-color);
}

/* Form Controls Styling */
.form-label {
    font-weight: 600;
    font-size: 0.875rem;
    margin-bottom: 0.5rem;
    color: var(--text-main);
}

.form-control,
.form-select {
    border-radius: var(--radius-md);
    border: 1px solid var(--border-color);
    padding: 0.625rem 0.875rem;
    font-size: 0.95rem;
    color: var(--text-main);
    background-color: #fff;
    transition: all 0.2s ease-in-out;
}

.form-control:focus,
.form-select:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.15);
    outline: none;
}

.form-control::placeholder {
    color: var(--text-muted);
    opacity: 0.7;
}

/* Grid spacing fix */
.form-group-wrapper {
    margin-bottom: 1.75rem;
}

/* Action Bar Styling */
.action-bar {
    border-top: 1px solid var(--border-color);
    margin-top: 2.5rem;
    padding-top: 1.5rem;
}

/* Button Customization */
.btn {
    border-radius: var(--radius-md);
    padding: 0.625rem 1.25rem;
    font-weight: 600;
    font-size: 0.95rem;
    transition: all 0.2s ease;
}

.btn-primary {
    background-color: var(--primary-color);
    border-color: var(--primary-color);
}

.btn-primary:hover {
    background-color: #1d4ed8;
    border-color: #1d4ed8;
    transform: translateY(-1px);
}

.btn-light {
    background-color: #f1f5f9;
    border-color: #f1f5f9;
    color: #475569;
}

.btn-light:hover {
    background-color: #e2e8f0;
    border-color: #e2e8f0;
    color: #334155;
    transform: translateY(-1px);
}

/* Responsive adjustments */
@media(max-width: 768px) {
    .main {
        padding: 1rem;
    }

    .form-card {
        padding: 1.5rem;
    }
    
    .action-bar .d-flex {
        flex-direction: column-reverse;
    }

    .btn {
        width: 100%;
    }
}
</style>

<div class="main">

    <div class="page-header">
        <h4>Add New User</h4>
    </div>

    <div class="form-card">

        <form action="<?= site_url('admin/users/store'); ?>" method="post">

            <div class="form-group-wrapper">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">First Name</label>
                        <input type="text"
                               name="first_name"
                               class="form-control"
                               placeholder="John"
                               required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Last Name</label>
                        <input type="text"
                               name="last_name"
                               class="form-control"
                               placeholder="Doe"
                               required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Email Address</label>
                        <input type="email"
                               name="email"
                               class="form-control"
                               placeholder="johndoe@example.com"
                               required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Phone Number</label>
                        <input type="text"
                               name="phone"
                               class="form-control"
                               placeholder="+1 (555) 000-0000"
                               required>
                    </div>
                </div>
            </div>

            <div class="form-group-wrapper mb-0">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Password</label>
                        <input type="password"
                               name="password"
                               class="form-control"
                               placeholder="••••••••"
                               required>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">User Role</label>
                        <select name="role" class="form-select" required>
                            <option value="" disabled selected>Select Role</option>
                            <option value="Admin">Administrator</option>
                            <option value="Member">Member</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Member Type</label>
                        <select name="customer_type" class="form-select">
                            <option value="" disabled selected>Select Type</option>
                            <option value="Non-Resident">Non-Resident</option>
                            <option value="Resident">Resident</option>
                        </select>
                    </div>
                </div>
            </div>

           
                <div class="d-flex gap-2 justify-content-end mt-4">
                    <a href="<?= site_url('admin/users'); ?>"
                       class="btn btn-light">
                        Cancel
                    </a>

                    <button type="submit"
                            class="btn btn-primary">
                        <i class="fa fa-save me-2"></i>Create User
                    </button>
                </div>
            

        </form>

    </div>

</div>

<?php $this->load->view('admin/layout/footer'); ?>