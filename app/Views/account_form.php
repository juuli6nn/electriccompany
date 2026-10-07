<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<?php
    $isEdit = isset($account);
    $actionUrl = $isEdit ? base_url('account/update/' . $account['id']) : base_url('account/store');
?>

<div class="container section-padding">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-lg feature-item">
                <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                    <h4 class="mb-0 text-primary-custom fw-bold"><?= $isEdit ? 'Edit Account' : 'Add New Account' ?></h4>
                    <a href="<?= base_url('dashboard') ?>" class="btn btn-outline-secondary btn-sm"><i class="fas fa-arrow-left me-1"></i> Back</a>
                </div>
                <div class="card-body p-4 p-md-5">
                    <form action="<?= $actionUrl ?>" method="post">
                        
                        <h5 class="text-secondary-custom mb-3"><i class="fas fa-info-circle me-2"></i>General Information</h5>
                        <div class="row mb-4">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-medium">Customer Name <span class="text-danger">*</span></label>
                                <input type="text" name="customer_name" class="form-control" required value="<?= esc($account['customer_name'] ?? '') ?>">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-medium">Account Number <span class="text-danger">*</span></label>
                                <input type="text" name="account_number" class="form-control" required value="<?= esc($account['account_number'] ?? '') ?>">
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label fw-medium">Address <span class="text-danger">*</span></label>
                                <textarea name="address" class="form-control" rows="2" required><?= esc($account['address'] ?? '') ?></textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-medium">Phone Number</label>
                                <input type="text" name="phone" class="form-control" value="<?= esc($account['phone'] ?? '') ?>">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-medium">Email Address</label>
                                <input type="email" name="email" class="form-control" value="<?= esc($account['email'] ?? '') ?>">
                            </div>
                        </div>

                        <h5 class="text-secondary-custom mb-3"><i class="fas fa-bolt me-2"></i>Service Details</h5>
                        <div class="row mb-4">
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-medium">Meter Number</label>
                                <input type="text" name="meter_number" class="form-control" value="<?= esc($account['meter_number'] ?? '') ?>">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-medium">Connection Type</label>
                                <select name="connection_type" class="form-select">
                                    <option value="residential" <?= ($account['connection_type'] ?? '') == 'residential' ? 'selected' : '' ?>>Residential</option>
                                    <option value="commercial" <?= ($account['connection_type'] ?? '') == 'commercial' ? 'selected' : '' ?>>Commercial</option>
                                    <option value="industrial" <?= ($account['connection_type'] ?? '') == 'industrial' ? 'selected' : '' ?>>Industrial</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-medium">Status</label>
                                <select name="status" class="form-select">
                                    <option value="active" <?= ($account['status'] ?? '') == 'active' ? 'selected' : '' ?>>Active</option>
                                    <option value="inactive" <?= ($account['status'] ?? '') == 'inactive' ? 'selected' : '' ?>>Inactive</option>
                                    <option value="suspended" <?= ($account['status'] ?? '') == 'suspended' ? 'selected' : '' ?>>Suspended</option>
                                </select>
                            </div>
                        </div>

                        <hr>
                        <div class="d-flex justify-content-end mt-4">
                            <a href="<?= base_url('dashboard') ?>" class="btn btn-light border me-2">Cancel</a>
                            <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save me-1"></i> <?= $isEdit ? 'Update Account' : 'Save Account' ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
