<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <span class="navbar-brand">🎓 Campus System</span>
    </div>
</nav>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-body">
            <h3>Create Request</h3>

            <form method="POST" action="?action=store">
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input name="title" class="form-control" required>
                </div>

                <button class="btn btn-success">Submit</button>
                <a href="/campus_request/public" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>