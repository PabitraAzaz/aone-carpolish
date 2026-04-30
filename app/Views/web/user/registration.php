<?= $this->extend('web/components/assemble') ?>
<?= $this->section('content') ?>




<style>
    /* Section */
    .register-section {
        display: flex;
        align-items: center;
        justify-content: center;
        background: #ffffff;
        padding: 80px;
    }

    /* Wrap */
    .register-wrap {
        width: 100%;
        max-width: 320px;
    }

    /* Title */
    .register-title {
        font-size: 22px;
        font-weight: 600;
        color: #3e1f4a;
        margin-bottom: 25px;
    }

    /* Fields (reuse same style as login) */
    .field {
        position: relative;
        margin-bottom: 18px;
    }

    .field input {
        width: 100%;
        border: none;
        border-bottom: 1px solid #ccc;
        padding: 8px 0;
        font-size: 14px;
        outline: none;
        background: transparent;
    }

    .field label {
        position: absolute;
        left: 0;
        top: 8px;
        font-size: 13px;
        color: #999;
        transition: 0.25s;
    }

    /* Active */
    .field input:focus,
    .field input:valid {
        border-bottom: 1px solid #da6510;
    }

    .field input:focus+label,
    .field input:valid+label {
        top: -10px;
        font-size: 11px;
        color: #da6510;
    }

    /* Button */
    .register-btn {
        width: 100%;
        margin-top: 10px;
        padding: 10px 0;
        background: #da6510;
        color: #fff;
        border: none;
        font-size: 14px;
        cursor: pointer;
    }

    /* Footer */
    .register-footer {
        margin-top: 15px;
        font-size: 12px;
        color: #777;
    }

    .register-footer a {
        color: #3e1f4a;
        text-decoration: none;
        font-weight: 500;
    }

    /* Mobile */
    @media (max-width: 480px) {
        .register-wrap {
            padding: 0 15px;
        }
    }

    .error {
        display: block;
        font-size: 11px;
        color: red;
        margin-top: 4px;
    }
</style>




<!-- =========================================================== -->

<div class="banner ba-banner">
    <h1><span class="typed-text typed-ba">Login</span></h1>
</div>








<section class="register-section">
    <div class="register-wrap">

        <h2 class="register-title">Create Account</h2>

        <form action="<?= base_url('registration') ?>" method="POST">

            <div class="field">
                <input type="text" name="full_name" value="<?= old('full_name') ?>" required>
                <label>Full Name</label>
                <?php if (session('errors.full_name')): ?>
                    <small class="error"><?= session('errors.full_name') ?></small>
                <?php endif; ?>
            </div>

            <div class="field">
                <input type="email" name="email" value="<?= old('email') ?>" required>
                <label>Email</label>
                <?php if (session('errors.email')): ?>
                    <small class="error"><?= session('errors.email') ?></small>
                <?php endif; ?>
            </div>

            <div class="field">
                <input type="password" name="password" required>
                <label>Password</label>
                <?php if (session('errors.password')): ?>
                    <small class="error"><?= session('errors.password') ?></small>
                <?php endif; ?>
            </div>

            <div class="field">
                <input type="password" name="confirm_password" required>
                <label>Confirm Password</label>
                <?php if (session('errors.confirm_password')): ?>
                    <small class="error"><?= session('errors.confirm_password') ?></small>
                <?php endif; ?>
            </div>

            <button type="submit" class="register-btn">Sign Up</button>
        </form>

        <p class="register-footer">
            Already have an account? <a href="<?= base_url('login') ?>">Login</a>
        </p>

    </div>
</section>




















<!-- ===================================================================  -->

<?= $this->endSection(); ?>