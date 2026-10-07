<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="container section-padding">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card border-0 shadow-lg feature-item">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <div class="feature-icon mx-auto mb-3" style="width: 70px; height: 70px; font-size: 1.8rem;">
                            <i class="fas fa-user-lock"></i>
                        </div>
                        <h3 class="text-primary-custom fw-bold">Welcome Back</h3>
                        <p class="text-muted">Please log in to your account</p>
                    </div>

                    <!-- Display Errors or Success Messages -->
                    <?php if(session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-circle me-2"></i><?= session()->getFlashdata('error') ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    <?php if(session()->getFlashdata('success')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i><?= session()->getFlashdata('success') ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <!-- Login Form -->
                    <form action="<?= base_url('login') ?>" method="post">
                        <div class="mb-3">
                            <label class="form-label fw-medium">Username</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="fas fa-user text-muted"></i></span>
                                <input type="text" name="username" class="form-control" placeholder="Enter your username" required>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-medium">Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="fas fa-lock text-muted"></i></span>
                                <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                            </div>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg">Login to Dashboard</button>
                        </div>
                    </form>
                    
                    <div class="text-center mt-4">
                        <p class="mb-0 text-muted">Don't have an account? <a href="<?= base_url('register') ?>" class="text-secondary-custom text-decoration-none fw-bold">Register here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>