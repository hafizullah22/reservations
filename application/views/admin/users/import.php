<?php $this->load->view('admin/layout/header'); ?>

<style>
/* Modern Design Variables & Reset Overrides */
:root {
    --bg-main: #f8fafc;
    --card-bg: #ffffff;
    --text-main: #0f172a;
    --text-muted: #64748b;
    --border-color: #1c1c1d;
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
        <h4>Import Users</h4>
        <a href="<?= base_url('uploads/sample_users.csv'); ?>"
            class="btn btn-success">
            Download Sample CSV
        </a>
    </div>

<div class="form-card">

<form action="<?= site_url('admin/users/import_csv'); ?>"
      method="post"
      enctype="multipart/form-data">

    <div class="row g-3 align-items-end">

        <div class="col-md-9">
            <label class="form-label">Select CSV File</label>
            <input type="file"
                   name="csv_file"
                   accept=".csv"
                   class="form-control"
                   required>
        </div>

        <div class="col-md-3">
            <button type="submit" class="btn btn-primary w-100">
                <i class="fa fa-upload me-1"></i>
                Import Users
            </button>
        </div>

    </div>

</form>
      

</div>
</div>

<?php $this->load->view('admin/layout/footer'); ?>