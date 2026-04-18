<!-- BOOTSTRAP -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- NAVBAR -->
<nav class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container">
        <span class="navbar-brand fw-semibold">🎓 Campus System</span>
    </div>
</nav>

<div class="container mt-5">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-dark">📋 Campus Requests</h2>

        <a href="?action=create" class="btn btn-success px-4">
            + Create Request
        </a>
    </div>

    <!-- CARD WRAPPER -->
    <div class="card border-0 shadow-sm rounded-3">
        <div class="card-body p-0">

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">

                    <thead class="table-dark">
                        <tr>
                            <th class="ps-4">ID</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th class="text-center" width="150">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php foreach ($requests as $r): ?>
                        <tr>
                            <td class="ps-4 fw-semibold"><?= $r->id ?></td>

                            <td class="fw-medium text-dark">
                                <?= htmlspecialchars($r->title) ?>
                            </td>

                            <td>
                                <span class="badge px-3 py-2 
                                    <?= $r->status == 'Pending' ? 'bg-warning text-dark' : '' ?>
                                    <?= $r->status == 'In Progress' ? 'bg-info text-dark' : '' ?>
                                    <?= $r->status == 'Done' ? 'bg-success' : '' ?>">
                                    <?= $r->status ?>
                                </span>
                            </td>

                            <td class="text-center">
                                <a href="?action=show&id=<?= $r->id ?>" 
                                   class="btn btn-sm btn-outline-primary px-3">
                                   View
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>

                </table>
            </div>

        </div>
    </div>

</div>