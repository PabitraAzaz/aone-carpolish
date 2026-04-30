<?= $this->extend('web/components/assemble') ?>
<?= $this->section('content') ?>




<style>
    /* Section */
    .login-section {
        /* height: 100vh; */
        padding: 80px;
        ;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #ffffff;
    }

    /* Wrap (no heavy card look) */
    .login-wrap {
        width: 100%;
        max-width: 320px;
    }

    /* Title */
    .login-title {
        font-size: 22px;
        font-weight: 600;
        color: #3e1f4a;
        margin-bottom: 25px;
    }

    /* Fields */
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

    /* Label */
    .field label {
        position: absolute;
        left: 0;
        top: 8px;
        font-size: 13px;
        color: #999;
        transition: 0.25s;
    }

    /* Active state */
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
    .login-btn {
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
    .login-footer {
        margin-top: 15px;
        font-size: 12px;
        color: #777;
    }

    .login-footer a {
        color: #3e1f4a;
        text-decoration: none;
        font-weight: 500;
    }

    /* Mobile feel spacing */
    @media (max-width: 480px) {
        .login-wrap {
            padding: 0 15px;
        }
    }

    /* Success */
    .success-box {
        font-size: 12px;
        color: green;
        margin-top: 30px;
        margin-bottom: 30px;
    }

    /* Error box */
    .error-box {
        font-size: 12px;
        color: red;
        margin-top: 30px;
        margin-bottom: 30px;
    }

    /* Field error */
    .error {
        display: block;
        font-size: 11px;
        color: red;
        margin-top: 4px;
    }

    /* Input error */
    .input-error {
        border-bottom: 1px solid red !important;
    }
</style>




<!-- =========================================================== -->

<div class="banner ba-banner">
    <h1><span class="typed-text typed-ba">Login</span></h1>
</div>








<section class="login-section">
    <div class="login-wrap">

        <h2 class="login-title">Login</h2>

        <!-- ✅ Success Message (after registration) -->
        <?php if (session()->getFlashdata('success')): ?>
            <div class="success-box">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <!-- ❌ General Error (invalid login) -->
        <?php if (session()->getFlashdata('error')): ?>
            <div class="error-box">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('login') ?>" method="POST">

            <div class="field">
                <input type="text" name="email"
                    value="<?= old('email') ?>"
                    class="<?= session('errors.email') ? 'input-error' : '' ?>" required>
                <label>Email</label>
                <?php if (session('errors.email')): ?>
                    <small class="error"><?= session('errors.email') ?></small>
                <?php endif; ?>
            </div>

            <div class="field">
                <input type="password" name="password"
                    class="<?= session('errors.password') ? 'input-error' : '' ?>" required>
                <label>Password</label>
                <?php if (session('errors.password')): ?>
                    <small class="error"><?= session('errors.password') ?></small>
                <?php endif; ?>
            </div>

            <button type="submit" class="login-btn">Continue</button>

        </form>

        <p class="login-footer">
            New here? <a href="<?= base_url('registration') ?>">Create Account</a>
        </p>

    </div>
</section>



















<!-- ===================================================================  -->

<?= $this->endSection(); ?>