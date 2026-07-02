<?php $this->load->view('admin/layout/header'); ?>

<style>
.main{
    padding:25px;
    background:#f5f7fb;
    min-height:100vh;
    font-family:Inter, sans-serif;
}

.page-title{
    font-size:22px;
    font-weight:700;
    color:#0f172a;
    margin-bottom:20px;
}

/* UPLOAD CARD */
.upload-card{
    background:#fff;
    border-radius:14px;
    padding:20px;
    box-shadow:0 4px 10px rgba(0,0,0,0.05);
    margin-bottom:20px;
}

/* FORM */
.form-group{
    margin-bottom:12px;
}

.form-control{
    width:100%;
    padding:10px 12px;
    border-radius:10px;
    border:1px solid #e5e7eb;
    outline:none;
}

.form-control:focus{
    border-color:#3b82f6;
    box-shadow:0 0 0 3px rgba(59,130,246,0.15);
}

.btn{
    padding:10px 14px;
    border:none;
    border-radius:10px;
    cursor:pointer;
    font-weight:600;
}

.btn-primary{
    background:#3b82f6;
    color:#fff;
}

.btn-primary:hover{
    background:#2563eb;
}

/* TABLE STYLE */
.table-wrap{
    background:#fff;
    border-radius:14px;
    padding:15px;
    box-shadow:0 4px 10px rgba(0,0,0,0.05);
}

table{
    width:100%;
    border-collapse:collapse;
}

thead{
    background:#111827;
    color:#fff;
}

th, td{
    padding:12px;
    text-align:left;
    border-bottom:1px solid #e5e7eb;
    font-size:14px;
}

tr:hover{
    background:#f1f5f9;
}

.file-link{
    color:#1e3a8a;
    font-weight:600;
    text-decoration:none;
}

.file-link:hover{
    text-decoration:underline;
}

.badge{
    padding:5px 10px;
    border-radius:8px;
    font-size:12px;
    background:#e0f2fe;
    color:#0369a1;
}
</style>

<div class="main">

    <!-- TITLE -->
    <div class="page-title">
       Minutes of Trustee Meetings 
    </div>

    <!-- UPLOAD FORM -->
    <div class="upload-card">

        <form action="<?= site_url('admin/uploads/upload_file'); ?>" 
              method="post" 
              enctype="multipart/form-data">

            <div class="form-group">
                <input type="text" name="file_name" class="form-control" placeholder="File Title" required>
            </div>

            <div class="form-group">
                <select name="file_type" class="form-control" required>
                    <option value="meeting">Meeting</option>
                </select>
            </div>
            <div class="form-group">
               <input type="date" name="meeting_date" class="form-control">
            </div>

            <div class="form-group">
                <input type="file" name="file" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">
                Upload File
            </button>

        </form>

    </div>

    <!-- FILE TABLE -->
    <div class="table-wrap">

        <table>

            <thead>
                <tr>
                    <th>#</th>
                    <th>File Name</th>
                    <th>Year</th>
                    <th>Report</th>
                    <th>view</th>
                    <th>Delete</th>
                </tr>
            </thead>

            <tbody>

            <?php if (!empty($files)) : ?>
                <?php $i = 1; foreach ($files as $file) : ?>

                    <tr>
                        <td><?= $i++; ?></td>

                        <td>
                            <?= $file->file_name; ?>
                        </td>

                        <td>
                            <?= $file->year; ?>
                        </td>

                        <td>
                            <span class="badge">
                                <?= $file->file_type; ?>
                            </span>
                        </td>

                        <td>
                            <a class="file-link" href="<?= base_url($file->file_path); ?>" target="_blank">
                                View
                            </a>
                        </td>

                       <td>
                        <a class="file-link"
                        href="<?= site_url('admin/uploads/delete/' . $file->id); ?>"
                        onclick="return confirm('Are you sure you want to delete this file?');">
                            Delete
                        </a>
                    </td>
                    </tr>

                <?php endforeach; ?>
            <?php else: ?>

                <tr>
                    <td colspan="4">No files found</td>
                </tr>

            <?php endif; ?>

            </tbody>

        </table>

    </div>

</div>

<?php $this->load->view('admin/layout/footer'); ?>