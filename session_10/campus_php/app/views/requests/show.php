
<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <span class="navbar-brand">🎓 Campus System</span>
    </div>
</nav>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-body">
            <h3 class="card-title"><?= $request->title ?></h3>

            <p>
                Status:
                <span class="badge bg-primary"><?= $request->status ?></span>
            </p>

            <form method="POST" action="?action=update" class="mt-3">
                <input type="hidden" name="id" value="<?= $request->id ?>">

                <div class="mb-3">
                    <label class="form-label">Update Status</label>
                    <select name="status" class="form-select">
                        <option>Pending</option>
                        <option>In Progress</option>
                        <option>Done</option>
                    </select>
                </div>

                <button class="btn btn-warning">Update</button>
            </form>

            <a href="/campus-request/public" class="btn btn-secondary mt-3">Back</a>
        </div>
    </div>
</div>