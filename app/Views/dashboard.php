<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="container section-padding">
    <div class="row mb-4 align-items-center">
        <div class="col-md-8">
            <h2 class="display-5 fw-bold text-primary-custom mb-0">Customer Accounts Dashboard</h2>
        </div>
        <div class="col-md-4 text-md-end mt-3 mt-md-0">
            <p class="mb-0 text-muted">
                Welcome, <strong class="text-secondary-custom"><?= esc($username ?? 'User') ?></strong> | 
                <a href="<?= base_url('logout') ?>" class="btn btn-outline-danger btn-sm ms-2">Logout</a>
            </p>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row g-4 mb-4">
        <div class="col-md-6">
            <div class="card h-100 p-4 border-0 shadow-sm bg-light-custom feature-item">
                <div class="d-flex align-items-center">
                    <div class="feature-icon mb-0 me-3" style="width: 60px; height: 60px; font-size: 1.5rem;">
                        <i class="fas fa-users"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Total Accounts</h6>
                        <h3 class="text-primary-custom mb-0 fw-bold"><?= esc($total_accounts ?? 0) ?></h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card h-100 p-4 border-0 shadow-sm bg-light-custom feature-item">
                <div class="d-flex align-items-center">
                    <div class="feature-icon mb-0 me-3" style="width: 60px; height: 60px; font-size: 1.5rem; background: linear-gradient(135deg, var(--accent-color), #34d399);">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Active Accounts</h6>
                        <h3 class="text-primary-custom mb-0 fw-bold"><?= esc($active_accounts ?? 0) ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Paginated Table -->
    <div class="card border-0 shadow-sm feature-item">
        <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
            <h5 class="mb-0 text-primary-custom fw-bold">Account List</h5>
            <a href="<?= base_url('account/create') ?>" class="btn btn-success rounded-pill px-3"><i class="fas fa-plus me-1"></i> Add Account</a>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-striped mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="py-3 px-4">ID</th>
                            <th class="py-3">Name / Details</th>
                            <th class="py-3">Status</th>
                            <th class="py-3 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($accounts) && is_array($accounts)): ?>
                            <?php foreach ($accounts as $account): ?>
                                <tr>
                                    <td class="px-4 align-middle"><?= esc($account['id'] ?? '') ?></td>
                                    <td class="align-middle">
                                        <div class="fw-bold text-dark"><?= esc($account['customer_name'] ?? 'N/A') ?></div>
                                        <div class="small text-muted"><i class="fas fa-hashtag me-1"></i><?= esc($account['account_number'] ?? '') ?></div>
                                    </td> 
                                    <td class="align-middle">
                                        <?php if(strtolower($account['status'] ?? '') === 'active'): ?>
                                            <span class="badge bg-success rounded-pill px-3 py-2">Active</span>
                                        <?php elseif(strtolower($account['status'] ?? '') === 'inactive'): ?>
                                            <span class="badge bg-secondary rounded-pill px-3 py-2">Inactive</span>
                                        <?php else: ?>
                                            <span class="badge bg-warning rounded-pill px-3 py-2 text-dark"><?= esc(ucfirst($account['status'] ?? 'N/A')) ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="align-middle text-center">
                                        <div class="btn-group shadow-sm" role="group">
                                            <a href="<?= base_url('account/view/' . ($account['id'] ?? '')) ?>" class="btn btn-sm btn-outline-primary" title="View"><i class="fas fa-eye"></i></a>
                                            <a href="<?= base_url('account/edit/' . ($account['id'] ?? '')) ?>" class="btn btn-sm btn-outline-warning" title="Edit"><i class="fas fa-edit"></i></a>
                                            <a href="<?= base_url('account/delete/' . ($account['id'] ?? '')) ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this account?');" title="Delete"><i class="fas fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" class="text-center py-4 text-muted">No accounts found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Pagination Links -->
    <?php if ($pager): ?>
    <div class="d-flex justify-content-center mt-4 mb-5 feature-item">
        <?= $pager->links('default', 'bootstrap') ?>
    </div>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>