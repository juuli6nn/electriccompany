<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<section class="hero-section">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-8 mx-auto">
                <h1 class="display-4 fw-bold mb-4">Join Puihaha Electric</h1>
                <p class="lead">Register to access exclusive customer benefits, service history, and priority scheduling</p>
            </div>
        </div>
    </div>
</section>

<section class="section-padding bg-light-custom">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card shadow-lg border-0">
                    <div class="card-body p-5">
                        <div class="text-center mb-4">
                            <h2 class="display-6 fw-bold text-primary-custom mb-3">Create Your Account</h2>
                        </div>
                        
                        <?php if (isset($success) && $success): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fas fa-check-circle me-2"></i><?= $success ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        <?php endif; ?>

                        <?php if (isset($error) && $error): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="fas fa-exclamation-circle me-2"></i><?= $error ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        <?php endif; ?>

                        <form method="POST" action="<?= base_url('register') ?>" id="registerForm">
                            <?= csrf_field() ?>
                            
                            <!-- Personal Information -->
                            <div class="mb-4">
                                <h4 class="text-primary-custom mb-3">Personal Information</h4>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="first_name" class="form-label fw-semibold">First Name *</label>
                                        <input type="text" class="form-control form-control-lg <?= isset($validation['first_name']) ? 'is-invalid' : '' ?>" id="first_name" name="first_name" value="<?= old('first_name') ?>" required>
                                        <?php if (isset($validation['first_name'])): ?>
                                            <div class="invalid-feedback"><?= $validation['first_name'] ?></div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="last_name" class="form-label fw-semibold">Last Name *</label>
                                        <input type="text" class="form-control form-control-lg <?= isset($validation['last_name']) ? 'is-invalid' : '' ?>" id="last_name" name="last_name" value="<?= old('last_name') ?>" required>
                                        <?php if (isset($validation['last_name'])): ?>
                                            <div class="invalid-feedback"><?= $validation['last_name'] ?></div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email" class="form-label fw-semibold">Email Address *</label>
                                        <input type="email" class="form-control form-control-lg <?= isset($validation['email']) ? 'is-invalid' : '' ?>" id="email" name="email" value="<?= old('email') ?>" required>
                                        <?php if (isset($validation['email'])): ?>
                                            <div class="invalid-feedback"><?= $validation['email'] ?></div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="phone" class="form-label fw-semibold">Phone Number *</label>
                                        <input type="tel" class="form-control form-control-lg <?= isset($validation['phone']) ? 'is-invalid' : '' ?>" id="phone" name="phone" value="<?= old('phone') ?>" required>
                                        <?php if (isset($validation['phone'])): ?>
                                            <div class="invalid-feedback"><?= $validation['phone'] ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Address Information -->
                            <div class="mb-4">
                                <h4 class="text-primary-custom mb-3">Address Information</h4>
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label for="address" class="form-label fw-semibold">Street Address *</label>
                                        <input type="text" class="form-control form-control-lg <?= isset($validation['address']) ? 'is-invalid' : '' ?>" id="address" name="address" value="<?= old('address') ?>" required>
                                        <?php if (isset($validation['address'])): ?>
                                            <div class="invalid-feedback"><?= $validation['address'] ?></div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="city" class="form-label fw-semibold">City *</label>
                                        <input type="text" class="form-control form-control-lg <?= isset($validation['city']) ? 'is-invalid' : '' ?>" id="city" name="city" value="<?= old('city') ?>" required>
                                        <?php if (isset($validation['city'])): ?>
                                            <div class="invalid-feedback"><?= $validation['city'] ?></div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="state" class="form-label fw-semibold">State *</label>
                                        <select class="form-select form-select-lg <?= isset($validation['state']) ? 'is-invalid' : '' ?>" id="state" name="state" required>
                                            <option value="">Select State...</option>
                                            <option value="AL" <?= old('state') == 'AL' ? 'selected' : '' ?>>Alabama</option>
                                            <option value="AK" <?= old('state') == 'AK' ? 'selected' : '' ?>>Alaska</option>
                                            <option value="AZ" <?= old('state') == 'AZ' ? 'selected' : '' ?>>Arizona</option>
                                            <option value="CA" <?= old('state') == 'CA' ? 'selected' : '' ?>>California</option>
                                            <option value="NY" <?= old('state') == 'NY' ? 'selected' : '' ?>>New York</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="zip_code" class="form-label fw-semibold">ZIP Code *</label>
                                        <input type="text" class="form-control form-control-lg <?= isset($validation['zip_code']) ? 'is-invalid' : '' ?>" id="zip_code" name="zip_code" value="<?= old('zip_code') ?>" required>
                                        <?php if (isset($validation['zip_code'])): ?>
                                            <div class="invalid-feedback"><?= $validation['zip_code'] ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Account Security -->
                            <div class="mb-4">
                                <h4 class="text-primary-custom mb-3">Account Security</h4>
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label for="username" class="form-label fw-semibold">Username *</label>
                                        <input type="text" class="form-control form-control-lg <?= isset($validation['username']) ? 'is-invalid' : '' ?>" id="username" name="username" value="<?= old('username') ?>" required>
                                        <?php if (isset($validation['username'])): ?>
                                            <div class="invalid-feedback"><?= $validation['username'] ?></div>
                                        <?php endif; ?>
                                        <div class="form-text">Choose a unique username for logging in.</div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="password" class="form-label fw-semibold">Password *</label>
                                        <input type="password" class="form-control form-control-lg <?= isset($validation['password']) ? 'is-invalid' : '' ?>" id="password" name="password" required>
                                        <div class="form-text">Password must be at least 8 characters long</div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="confirm_password" class="form-label fw-semibold">Confirm Password *</label>
                                        <input type="password" class="form-control form-control-lg <?= isset($validation['confirm_password']) ? 'is-invalid' : '' ?>" id="confirm_password" name="confirm_password" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-4">
                                <div class="form-check">
                                    <input class="form-check-input <?= isset($validation['terms']) ? 'is-invalid' : '' ?>" type="checkbox" id="terms" name="terms" required>
                                    <label class="form-check-label" for="terms">
                                        I agree to the Terms of Service and Privacy Policy *
                                    </label>
                                </div>
                            </div>
                            
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-lg px-5">
                                    <i class="fas fa-user-plus me-2"></i>Create Account
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('registerForm');
        const submitBtn = form.querySelector('button[type="submit"]');
        const password = document.getElementById('password');
        const confirmPassword = document.getElementById('confirm_password');

        confirmPassword.addEventListener('input', function() {
            if (password.value !== confirmPassword.value) {
                confirmPassword.setCustomValidity('Passwords do not match');
            } else {
                confirmPassword.setCustomValidity('');
            }
        });

        form.addEventListener('submit', function(e) {
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Creating Account...';
            submitBtn.disabled = true;
        });
    });
</script>

<?= $this->endSection() ?>