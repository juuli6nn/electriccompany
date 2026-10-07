<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="container section-padding">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm feature-item">
                <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 text-primary-custom fw-bold">Account Details</h5>
                    <div>
                        <a href="<?= base_url('account/edit/' . $account['id']) ?>" class="btn btn-warning btn-sm me-2"><i class="fas fa-edit me-1"></i> Edit</a>
                        <a href="<?= base_url('dashboard') ?>" class="btn btn-outline-secondary btn-sm"><i class="fas fa-arrow-left me-1"></i> Back</a>
                    </div>
                </div>
                <div class="card-body p-4 p-md-5">
                    <div class="row mb-4">
                        <div class="col-sm-4 text-muted fw-medium">Customer Name</div>
                        <div class="col-sm-8 fw-bold fs-5 text-dark"><?= esc($account['customer_name'] ?? 'N/A') ?></div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-sm-4 text-muted fw-medium">Account Number</div>
                        <div class="col-sm-8"><?= esc($account['account_number'] ?? 'N/A') ?></div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-sm-4 text-muted fw-medium">Address</div>
                        <div class="col-sm-8"><?= esc($account['address'] ?? 'N/A') ?></div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-sm-4 text-muted fw-medium">Contact</div>
                        <div class="col-sm-8">
                            <div><i class="fas fa-phone me-2 text-muted"></i> <?= esc($account['phone'] ?? 'N/A') ?></div>
                            <div><i class="fas fa-envelope me-2 text-muted"></i> <?= esc($account['email'] ?? 'N/A') ?></div>
                        </div>
                    </div>
                    <hr>
                    <div class="row mt-4 mb-4">
                        <div class="col-sm-4 text-muted fw-medium">Service Info</div>
                        <div class="col-sm-8">
                            <p class="mb-1"><strong>Meter Number:</strong> <?= esc($account['meter_number'] ?? 'N/A') ?></p>
                            <p class="mb-1"><strong>Type:</strong> <?= esc(ucfirst($account['connection_type'] ?? 'N/A')) ?></p>
                            <p class="mb-0"><strong>Status:</strong> 
                                <?php if(strtolower($account['status'] ?? '') === 'active'): ?>
                                    <span class="badge bg-success">Active</span>
                                <?php elseif(strtolower($account['status'] ?? '') === 'inactive'): ?>
                                    <span class="badge bg-secondary">Inactive</span>
                                <?php else: ?>
                                    <span class="badge bg-warning text-dark"><?= esc(ucfirst($account['status'] ?? 'N/A')) ?></span>
                                <?php endif; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
